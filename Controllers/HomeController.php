<?php

require_once implode(DIRECTORY_SEPARATOR, [$_SERVER['DOCUMENT_ROOT'], 'Core', 'View.php']);
require_once implode(DIRECTORY_SEPARATOR, [$_SERVER['DOCUMENT_ROOT'], 'Models', 'Users.php']);

class HomeController
{
    public function Info() {
        $me = new Users();
        $me->username = 'test'.rand();
        $me->password='12345';
        $me->email='555';
        $me->bio='test@';
        $me->save();
        View::render('info',[
            'title' => 'InfoPage',
            'name' => "$me->username, ID=$me->id"
        ]);
    }
}
