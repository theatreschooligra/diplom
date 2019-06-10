<?php

namespace App\Http\Controllers\Api;

use App\Group;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('group_id')) {
            $group = Group::find($request->group_id);
            return UserResource::collection($group->teachers);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $group_id = ($request->group_id == 0) ? null : $request->group_id;

        if ($user->role_id == 3) {
            $kpi = $user->group->getCurrentKPI->first();
            $kpi->increment('left_amount');
            $user->student->update(['group_id' => $group_id]);
        }
        return response()->json('', 200);
    }
}
