<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name', 'course_id'
    ];

    public function studentsFields()
    {
        return $this->hasMany(StudentsField::class)->with('user');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'students_fields')->orderBy('surname');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'group_teacher')->withTimestamps();
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
