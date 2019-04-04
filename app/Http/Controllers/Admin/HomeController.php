<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function user_search(Request $request)
    {
        $name           = $request->name;
        $email          = $request->email;
        $parent_name    = $request->parent_name;
        $group_id       = $request->group_id;
        $gender         = $request->gender;
        $birthday_from  = $request->birthday_from;
        $birthday_to    = $request->birthday_to;
        $phone_number   = $request->phone_number;

        $user = User::query()->where('role_id', 3);

        if ($email != null && $email != '')
            $user = $user->where('email', 'LIKE', '%'. $email .'%');


        $user = $user->whereHas('student',
            function ($query) use ($name, $email, $parent_name, $group_id, $gender, $birthday_from, $birthday_to, $phone_number) {

            if ($name != null && $name != '')                   $query->WhereRaw("concat(surname, ' ', name) like '%". $name ."%'");
            if ($parent_name != null && $parent_name != '')     $query->WhereRaw("concat(parent_surname, ' ', parent_name) like '%". $parent_name ."%'");
            if ($group_id != null && $group_id != 0)            $query->where('group_id', $group_id);
            if ($gender != null && $gender != '')               $query->where('gender', $gender);
            if ($birthday_from != null && $birthday_from != '') $query->where('birthday', '>=', $birthday_from);
            if ($birthday_to != null && $birthday_to != '')     $query->where('birthday', '<=', $birthday_to);
            if ($phone_number != null && $phone_number != '')   $query->where('phone_number', 'LIKE', $phone_number .'%');
        });

        return response()->json($user->with('student.group')->get());
    }
}
