<?php

require_once implode(DIRECTORY_SEPARATOR, [$_SERVER['DOCUMENT_ROOT'], 'Core', 'View.php']);

class HomeController
{
    public function Info() {
        View::render('info',[
            'title' => 'InfoPage',
            'name' => 'Dmitry'
        ]);
    }
}
