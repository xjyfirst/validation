<?php namespace Tx;

class Validator{
    protected static  $_instance;

    private function __construct(){}

    protected static function _init(){
        if(self::$_instance !== null){
            return;
        }
        $v = new Validation();
        self::$_instance = $v->getValidator();
    }

    public static function __callStatic($name, array $args){
        self::_init();
        return call_user_func_array([self::$_instance, $name], $args);
    }
}
