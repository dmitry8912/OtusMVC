<?php

namespace Otus\Mvc\Core;
use Illuminate\Database\Capsule\Manager as Capsule;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Database
{
    public static function bootEloquent(Config $config)
    {
        $capsule = new Capsule();
        $capsule->addConnection([
            "driver" => $config->get("driver"),
            "host" => $config->get("host"),
            "port" => $config->get("port"),
            "database" => $config->get("db"),
            "username" => $config->get("user"),
            "password" => $config->get("password")
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
