<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\GuestBookMessage;
class GuestBookController
{
    public function index() {
        View::render('guestbook',[
            'messages' => GuestBookMessage::all()->where('is_hidden','=',0)->toArray()
        ]);

    }

    public function insecure() {
        View::render('guestbook',[
            'messages' => GuestBookMessage::all()->where('is_hidden','=',0)
                ->where('message_text','like',"%{$_GET['condition']}%")->toArray()
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
