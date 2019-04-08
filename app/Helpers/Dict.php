<?php

namespace App\Helpers;

use App\Group;
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
    public static function lesson_times()
    {
        return [
            '1' => '09:00 - 09:50',
            '2' => '10:00 - 10:50',
            '3' => '11:00 - 11:50',
            '4' => '12:00 - 12:50',
            '5' => '13:00 - 13:50',
            '6' => '14:00 - 14:50',
            '7' => '15:00 - 15:50',
            '8' => '16:00 - 16:50',
            '9' => '17:00 - 17:50',
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
