<?php

namespace Otus\Mvc\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public $timestamps = false;
    public static function getByUser($user_id) {
        return self::all()->where('user_id','=', $user_id)->toArray();
    }

    public static function add($title, $description, $user_id) {
        $todo = new self();
        $todo->title = $title;
        $todo->description = $description;
        $todo->user_id = $user_id;
        $todo->save();
        return $todo;
    }

    public static function remove($todoId) {
        $todo = self::all()->where('id', '=', $todoId)
            ->first();
        if($todo !== null) {
            $todo->delete();
            return $todoId;
        }
        return null;
    }

    public static function complete($todoId) {
        $todo = self::all()->where('id', '=', $todoId)
            ->first();
        if($todo !== null) {
            $todo->is_completed = 1;
            $todo->save();
            return $todoId;
        }
        return null;
    }
}
