<?php namespace Tx;

class Validator{
    protected static $provider;

    private function __construct(){}

    protected static function _init(){
        if(self::$provider !== null){
            return;
        }
        self::$provider = new ValidatorProvider();
    }

    public static function __callStatic($name, array $args){
        self::_init();
        return call_user_func_array([self::$provider->getInstance(), $name], $args);
    }
}
