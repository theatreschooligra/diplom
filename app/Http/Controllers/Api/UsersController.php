<?php

namespace App\Http\Controllers\Api;

use App\Http\Filters\UserGroupFilter;
use App\Http\Filters\UserNameFilter;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\Filter;
use Spatie\QueryBuilder\QueryBuilder;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $users = QueryBuilder::for(User::class)
            ->allowedFilters(
                Filter::exact('role_id'),
                Filter::custom('group_id', UserGroupFilter::class),
                Filter::custom('name',     UserNameFilter::class)
            )
            ;
        if (isset(request()->get('filter')['role_id'])) {
            $role_id = request()->get('filter')['role_id'];
            $user = Auth::user();
            if ($role_id == 2 && $user->role_id == 3) {
                $users->whereHas('groups', function ($query) use ($user) {
                    $query->whereHas('students', function ($query) use ($user) {
                        $query->where('users.id', $user->id);
                    });
                });
            }
            $users = $users->get();
            if ($role_id != 1)
                $users = $users->sortBy(function ($query) {
                    return $query->fields->surname;
                });
        }
        return UserResource::collection($users);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return UserResource
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return UserResource
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->only(['name', 'surname', 'birthday', 'phone_number', 'address']));
        if ($user->role_id == 3)  $user->fields->update($request->only(['parent_name', 'parent_surname']));
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
