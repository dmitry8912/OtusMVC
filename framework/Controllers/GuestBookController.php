<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\GuestBookMessage;
use Illuminate\Database\Capsule\Manager as DB;
class GuestBookController
{
    public function index() {
        View::render('guestbook',[
            'messages' => GuestBookMessage::all()->where('is_hidden','=',0)->toArray()
        ]);

    }

    public function insecure() {
        // http://otus.mvc:8080/guestbook/insecure?condition=test%%27%20or%20%27%%27=%27
        // т.е. condition=test%' or '%'='
        // http://otus.mvc:8080/guestbook/insecure?condition=test%%27%20or%20%27%%27=%27%%27%20union%20select%20id,%20username,%20password,%20id,%20id%20from%20users%20where%20%27%%27=%27
        // этот запрос позволяет вывести сообщения + пользователей
        // condition=test%' or '%' = '%' union select id, username, password, id, id from users where '%'='
        $messages = DB::table('gb_messages')
            ->select()->whereRaw("is_hidden = 0 and message_text like '%{$_GET['condition']}%'")
            ->get()->toArray();
        View::render('guestbook',[
            'messages' => $messages
        ]);
    }

    public function addMessage() {
        header('Location: /GuestBook');
        if(!empty($_POST['message'])) {
            $newGbMessage = new GuestBookMessage();
            $newGbMessage->message_text = $_POST['message'];
            if(!empty($_FILES)) {
                if(!empty($_FILES['photo']) && !empty($_FILES["photo"]['name']))
                {
                    $name = uniqid().'_'.basename($_FILES["photo"]['name']);
                    $ext = pathinfo($name,PATHINFO_EXTENSION);
                    if(move_uploaded_file($_FILES["photo"]['tmp_name'], "Storage/$name"))
                    {
                        $newGbMessage->file_path="/Storage/$name";
                    }
                }
            }
            $newGbMessage->save();
        }
    }
}
