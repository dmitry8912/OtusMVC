<?php

namespace Otus\Mvc\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    public static function authenticate($username, $password) {
        $result = self::all()
            ->where('username','=',$username)
            ->where('password','=', md5($password))->first();
        return $result;
    }


}
