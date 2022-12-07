<?php

namespace Otus\Mvc\Core;

class Session
{
    public static function get($param, $default='') {
        session_start();
        if(array_key_exists($param, $_SESSION)) {
            return $_SESSION[$param];
        }
        return $default;
    }
}