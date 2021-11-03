<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\Database;
use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\User as EloquentUser;
use Otus\Mvc\Models\OtusORM\Users as OtusORMUsers;
class IndexController
{
    public function index() {
        /*$user = new EloquentUser();
        $user->username = 'test';
        $user->email='test@test.ru';
        $user->info='created from controller';
        $user->save();*/

        //var_dump(EloquentUser::all()->first());
        /*foreach(Database::bootDoctrine()->getRepository('Otus\Mvc\Models\Doctrine\User')->findAll() as $u)
        {
            echo $u->getName();
        }*/

        /*$user = OtusORMUsers::get('id',1);
        $user->info = "Not a default admin";
        $user->save();
        var_dump($user);*/

        View::render('info',[
            'title' => 'Index page',
            'name' => 'Anonymous user'
        ]);
    }
}
