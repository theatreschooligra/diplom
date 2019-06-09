<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeachersField extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'experience', 'profession', 'about'
    ];
}
