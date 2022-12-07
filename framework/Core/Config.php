<?php

namespace Otus\Mvc\Core;

class Config
{
    private $params;

    private static $_instance;

    private function __construct() {
        $this->params = require implode(DIRECTORY_SEPARATOR,[$_SERVER['DOCUMENT_ROOT'],'config','database.php']);
    }

    public static function getInstance() {
        if(self::$_instance == null)
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function get($param, $default = '')
    {
        if (array_key_exists($param, $this->params))
            return $this->params[$param];

        return $default;
    }
}