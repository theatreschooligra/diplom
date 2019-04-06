<?php

namespace App\Helpers;

use App\Group;
use App\StudentsField;
use App\User;

class Dict
{
    public static function groups()
    {
        return Group::all();
    }

    public static function teachers()
    {
        return User::where('role_id', 2)->get()
            ->sortBy(function ($query) {
                return $query->teacher->surname;
            });
    }

    public static function rooms()
    {
        return [
            '1' => 'Стеклянный зал',
            '2' => 'зал 2',
            '3' => 'зал 3',
            '4' => 'зал 4',
        ];
    }

    public static function listOfStudentsToGroup($id = null)
    {
        return User::query()->where('role_id', 3)->whereHas('student', function ($query) use ($id) {
            $query->where('group_id', $id);
        })->get()
            ->sortBy(function ($query) {
                return $query->student->surname;
            });
    }
}
