<?php

namespace Otus\Mvc\Controllers;
use \Otus\Mvc\Core\View;
class RegistrationController
{
    public function index() {
        View::render('registration/registration');
    }

    public function register() {

    }
}