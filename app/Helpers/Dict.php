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

    public static function listOfStudentsNotIncludedGroup()
    {
        return StudentsField::query()->where('group_id', null)->get();
    }

    public static function listOfStudentsIncludedGroup($id = null)
    {
        return User::query()->where('role_id', 3)->whereHas('students', function ($query) use ($id) {
            $query->where('group_id', $id);
        })->get();
    }
}
