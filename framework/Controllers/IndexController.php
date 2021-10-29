<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;

class IndexController
{
    public function index() {
        View::render('info',[
            'title' => 'Index page',
            'name' => 'Anonymous user'
        ]);
    }
}
