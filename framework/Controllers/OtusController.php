<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;

class OtusController
{
    public function lesson() {
        if(rand() % 2 == 0)
        {
            View::render('lesson_info', [
                'title' => 'Уроки в OTUS',
                'lesson_name' => 'Знакомимся с MVC',
                'lesson_duration' => '1,5 часа'
            ]);
        } else {
            phpinfo();
        }

    }
}
