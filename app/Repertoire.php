<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repertoire extends Model
{
    protected $fillable = [
        'name', 'image', 'time', 'age_limit', 'price'
    ];
}
