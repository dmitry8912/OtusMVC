<?php

namespace Otus\Mvc\Core;

class Route
{
    public static function redirect($to) {
        header("Location: $to");
    }
}