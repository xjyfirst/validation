<?php namespace Tx;

use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Validation\ValidatesWhenResolved;
use Illuminate\Validation\Factory;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\MessageSelector;

class Validation {

    /**
     * @var Illuminate\Container\Container
     */
    protected $container;

    /**
     * @var Illuminate\View\Factory
     */
    protected $instance;

    public function __construct(){
        $this->container = new Container;
		$this->registerTranslator();

		$this->registerValidationResolverHook();
		$this->instance = $this->registerValidationFactory();
    }

    public function registerTranslator()
    {
        $this->container->bindShared('translator', function(){
            return new Translator('en_US', new MessageSelector());
        });
    }

	/**
	 * Register the "ValidatesWhenResolved" container hook.
	 *
	 * @return void
	 */
	protected function registerValidationResolverHook()
	{
		$this->container->afterResolving(function(ValidatesWhenResolved $resolved)
		{
			$resolved->validate();
		});
	}

	/**
	 * Register the validation factory.
	 *
	 * @return void
	 */
	protected function registerValidationFactory()
	{
        $validator = new Factory($this->container['translator'], $this->container);

        // The validation presence verifier is responsible for determining the existence
        // of values in a given data collection, typically a relational database or
        // other persistent data stores. And it is used to check for uniqueness.
        if (isset($this->container['validation.presence']))
        {
            $validator->setPresenceVerifier($this->container['validation.presence']);
        }

        return $validator;
	}

    /**
     * @brief getValidator
     *
     * @return validator
     */
    public function getValidator(){
       return  $this->instance;
    }

}
