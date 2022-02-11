<?php

namespace Otus\Mvc\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class GuestBookMessage extends Model
{
    public $timestamps = false;
    protected $table = 'gb_messages';
}
