<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'name', 'group_id', 'teacher_id',
        'lesson_date', 'lesson_time', 'room',
        'homework_id', 'homework_send_time'
    ];

    protected $dates = [
        'lesson_date',
        'homework_send_time'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'attendances', 'lesson_id', 'student_id')->withTimestamps();
    }

    public function homework()
    {
        return $this->belongsTo(Homework::class);
    }
}
