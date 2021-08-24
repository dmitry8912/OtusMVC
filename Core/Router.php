<?php

require_once 'View.php';

class Router
{
    public static function Route()
    {
        $url = explode('?', $_SERVER['REQUEST_URI']);
        $path_components = explode('/', $url[0]);
        $controller_name = "{$path_components[1]}Controller";
        $action_name = $path_components[2];

        $controller_path = implode(DIRECTORY_SEPARATOR,[$_SERVER['DOCUMENT_ROOT'],
            'Controllers', "$controller_name.php"]);
        // Check controller exists.
        if(!file_exists($controller_path)) {
            //redirect to 404
            View::render('404');
        }

        require_once $controller_path;

        if(!method_exists($controller_name, $action_name)) {
            //redirect to 404
            View::render('404');
        }

        $controller = new $controller_name();
        $controller->$action_name();
    }
}
