<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;
use Otus\Mvc\Core\Route;
use Otus\Mvc\Models\Eloquent\Todo;
use Otus\Mvc\Core\Session;
class TodoController
{
    public function list() {
        View::render('todo/list', [
            'todoList' => Todo::getByUser(Session::get('id'))
        ]);
    }

    public function add() {
        Todo::add($_POST['title'], $_POST['description'], Session::get('id'));
        Route::redirect('/Todo/list');
    }

    public function delete() {
        Todo::remove($_GET['todo_id']);
        Route::redirect('/Todo/list');
    }

    public function complete() {
        Todo::complete($_GET['todo_id']);
        Route::redirect('/Todo/list');
    }
}