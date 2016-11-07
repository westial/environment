<?php

namespace Environment;


abstract class Singleton
{
    public static function Instance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new static();
        }
        return $instance;
    }

    protected function __construct() {}
}