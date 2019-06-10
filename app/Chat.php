<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'to', 'from',
        'message'
    ];

    public function userFrom()
    {
        return $this->belongsTo(User::class, 'from');
    }

    public function userTo()
    {
        return $this->belongsTo(User::class, 'to');
    }
}
