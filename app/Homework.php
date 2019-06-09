<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Homework extends Model
{
    protected $fillable = [
        'file', 'name'
    ];

    public function getActiveLesson()
    {
        return $this->hasMany(Lesson::class, 'homework_id')
            ->where('homework_send_time', '<>', null)
            ->whereHas('group', function ($query) {
                $query->whereHas('students', function ($query) {
                    $query->where('users.id', Auth::id());
                });
            })->first();
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
