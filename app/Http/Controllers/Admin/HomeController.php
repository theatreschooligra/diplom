<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Dict;
use App\Http\Resources\UserResource;
use App\Lesson;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function user_search(Request $request)
    {
        $user = User::query()->where('role_id', $request->role_id);
        $role = '';

        if ($request->role_id == 3)     $role = 'student';
        if ($request->role_id == 2)     $role = 'teacher';

        if ($request->email != null && $request->email != '')
            $user = $user->where('email', 'LIKE', '%'. $request->email .'%');
        if ($request->name != null && $request->name != '')
            $user = $user->WhereRaw("concat(surname, ' ', name) like '%". $request->name ."%'");
        if ($request->gender != null && $request->gender != '')
            $user = $user->where('gender', $request->gender);

        if ($request->birthday_from != null && $request->birthday_from != '')
            $user = $user->whereDate('birthday', '>=', Carbon::createFromFormat('d/m/Y', $request->birthday_from));

        if ($request->birthday_to != null && $request->birthday_to != '')
            $user = $user->whereDate('birthday', '<=', Carbon::createFromFormat('d/m/Y', $request->birthday_to));

        if ($request->phone_number != null && $request->phone_number != '')
            $user = $user->where('phone_number', 'LIKE', $request->phone_number .'%');

        if ($role != '') {
            $user = $user->whereHas($role,
                function ($query) use ($request) {

                    if ($request->parent_name != null && $request->parent_name != '')
                        $query->WhereRaw("concat(parent_surname, ' ', parent_name) like '%" . $request->parent_name . "%'");

                    if ($request->group_id != null && $request->group_id != 0)
                        $query->where('group_id', $request->group_id);
                });
        }
        return UserResource::collection(
            $user->orderBy('surname')->get()
        );
    }

    public function lesson_room(Request $request)
    {
        if ($request->has('lesson_date') && Carbon::createFromFormat('d/m/Y', $request->lesson_date) !== false) {
            $lesson_date = Carbon::createFromFormat('d/m/Y', $request->lesson_date);

            $rooms = Dict::rooms();

            $lessons = Lesson::whereDate('lesson_date', '=', $lesson_date->format('Y-m-d'))
                ->where('lesson_time', $request->lesson_time)
                ->get()->pluck('room');

            foreach ($lessons as $lesson)
                unset($rooms[$lesson]);

            return response()->json($rooms);
        }
    }
}
