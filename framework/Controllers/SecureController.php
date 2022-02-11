<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\User;
class SecureController
{
    public function fileInject() {
        if(!empty($_GET['file'])) {
            $filename = $_GET['file'];
            require $filename;
        }
    }

    public function codeInject() {
        if(!empty($_GET['message'])) {
            eval("echo {$_GET['message']};");
        }
    }

    public function auth() {
        if(!empty($_POST['username'])) {
            $user = User::all()->where('username','=',$_POST['username'])->first();
            if($user == null) {
                View::render('auth',['result' =>  'no user']);
                return;
            }
            if($user->attempt > 5) {
                View::render('auth',['result' =>  'Blocked']);
                return;
            }
            if($user->password === $_POST['password']) {
                session_start();
                $_SESSION['user'] = $user;
                View::render('auth',['result' =>  'Authenticated!']);
                $user->attempt = 0;
                $user->save();
            } else {
                $user->attempt += 1;
                $user->save();
                View::render('auth',['result' =>  'Bad password!']);
            }

        }
        View::render('auth');
    }
}
