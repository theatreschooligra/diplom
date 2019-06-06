<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\StudentsField;
use App\TeachersField;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $role_id = ($request->role == null) ? 3 : $request->role;

        $users = User::where('role_id', $role_id)->get()
            ->sortBy(function ($query) {
                $query->fields->surname;
            });

        $role = Role::find($role_id);

        if ($request->view == 2)
            return view('admin.user.index2', compact('users', 'role'));

        return view('admin.user.index', compact('users', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $view = ($request->view == null) ? 1 : $request->view;
        $role_id = ($request->role == null) ? 3 : $request->role;
        $role = Role::find($role_id);

        return view('admin.user.create', compact('role', 'view'));
    }

    /**
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateUserRequest $request)
    {
        $img = null;
        $password = str_random(8);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $img = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $img);
        }

        $user = User::create([
            'role_id'       => $request->role_id,
            'email'         => $request->email,
            'password'      => bcrypt($password),
            'image'         => $img
        ]);

        $user_fields = [
            'user_id'       => $user->id,
            'surname'       => $request->surname,
            'name'          => $request->name,
            'birthday'      => ($request->birthday == null) ? null : Carbon::createFromFormat('d.m.Y', $request->birthday),
            'gender'        => $request->gender,
            'phone_number'  => $request->phone_number,
            'address'       => $request->address,
            'image'         => $img
        ];

        if ($request->role_id == 3) {
            $user_fields['parent_surname'] = $request->parent_surname;
            $user_fields['parent_name']    = $request->parent_name;
            $user_fields['group_id']       = $request->group;

            StudentsField::create($user_fields);

        } else if ($request->role_id == 2){
            $user_fields['experience'] = $request->experience;
            $user_fields['profession'] = $request->profession;
            $user_fields['about']      = $request->about;

            TeachersField::create($user_fields);
        }

        Mail::send('email.to_client', ['user' => $user, 'password' => $password], function($message) use ($user) {
            $message->to($user->email, $user->fields->surname .' '. $user->fields->name)->subject
            ('Регистрация пользователя');
            $message->from('NRGruslan@gmail.com','Театральный школы "Игра"');
        });

        return redirect()->route('admin.user.index', ['role' => $request->role_id, 'view' => $request->view]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, User $user)
    {
        $view = ($request->view == null) ? 1 : $request->view;

        return view('admin.user.edit', compact('user', 'view'));
    }

    /**
     * @param UpdateUserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->only(['email']));

        $user_fields = [
            'surname'       => $request->surname,
            'name'          => $request->name,
            'birthday'      => ($request->birthday == null) ? null : Carbon::createFromFormat('d/m/Y', $request->birthday),
            'gender'        => $request->gender,
            'phone_number'  => $request->phone_number,
            'address'       => $request->address,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $img = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $img);
            if (File::exists('img/' . $user->fields->image)) {
                File::delete('img/'. $user->fields->image);
            }
            $user_fields['image'] = $img;
        }

        if ($user->role_id == 3) {

            $user_fields['parent_surname'] = $request->parent_surname;
            $user_fields['parent_name']    = $request->parent_name;
            $user_fields['group_id']       = $request->group;

        } else if ($user->role_id == 2){

            $user_fields['experience'] = $request->experience;
            $user_fields['profession'] = $request->profession;
            $user_fields['about']      = $request->about;

        }

        $user->fields->update($user_fields);


        return redirect()->route('admin.user.index', ['role' => $user->role_id, 'view' => $request->view]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index', ['role' => $user->role_id, 'view' => $request->view]);
    }
}
