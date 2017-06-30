<?php
namespace Cosmonaut\Utils;

class Singleton
{
    protected static $instance = null;

    protected function __construct(){}

    protected function __clone(){}

    public static function getInstance()
    {
        if(!isset(self::$instance[get_called_class()]))
        {
            $obj = get_called_class();
            self::$instance[get_called_class()] = new $obj;
        }
        return self::$instance[get_called_class()];
    }
}