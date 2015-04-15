<?php
use \Tx\Validation;
use \Tx\Validator;
class ValidationTest extends TestCase{
    public $v;

    public function __construct(){
        $v = new Validation();
        $this->v = $v->getValidator();
    }

    public function testValidation(){
        $v = $this->v->make(
            ['name' => 'Day'],
            ['name' => 'required|min:5'],
            ['name.min' => 'who are u']
        );
        if ($v->fails()){
            var_dump($v->messages());
        }
    }

    public function testValidator(){
        $v = Validator::make(
            ['name' => 'Day'],
            ['name' => 'required|min:5'],
            ['name.min' => 'who are u']
        );
        if ($v->fails()){
            var_dump($v->messages());
        }

        $v = Validator::make(
            ['name' => 'Day007'],
            ['name' => 'required|max:5'],
            ['name.max' => 'who are u 007']
        );
        if ($v->fails()){
            var_dump($v->messages());
        }
    }
}

