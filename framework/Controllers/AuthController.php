<?php

namespace Otus\Mvc\Controllers;
use Otus\Mvc\Core\Route;
use \Otus\Mvc\Core\View;
use \Otus\Mvc\Models\Eloquent\User;
class AuthController
{
    public function index() {
        View::render('auth/auth');
    }

    public function auth() {
        session_start();
        $result = User::authenticate($_POST['user'], $_POST['password']);
        if($result == null) {
            View::render('auth/auth', [
                'error' => 'Wrong username or password!'
            ]);
        }

        $_SESSION['username'] = $_POST['user'];
        $_SESSION['id'] = $result->id;
        Route::redirect('/Todo/list');
    }
}