<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'email', 'about', 'address', 'phone_number', 'map',
        'url_to_youtube', 'url_to_youtube', 'url_to_facebook', 'url_to_instagram'
    ];
}
