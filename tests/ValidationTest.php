<?php
use \Tx\Validation;
class ValidationTest extends TestCase{
    public $v;

    public function __construct(){
        $v = new Validation();
        $this->v = $v->getValidator();
    }

    public function testView(){
        $v = $this->v->make(
            ['name' => 'Day'],
            ['name' => 'required|min:5'],
            ['name.min' => 'who are u']
        );
        if ($v->fails()){
            var_dump($v->messages());
        }
    }
}

