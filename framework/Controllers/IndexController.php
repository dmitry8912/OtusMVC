<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\Database;
use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\User as EloquentUser;
use Otus\Mvc\Models\OtusORM\Users as OtusORMUsers;
use Otus\Mvc\Models\Doctrine\User as DoctrineUser;
use PDO;
class IndexController
{
    public function index() {
        View::render('info',[
            'title' => 'Index page',
            'name' => 'Anonymous user'
        ]);
    }
}
