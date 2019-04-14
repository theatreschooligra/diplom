<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Http\Requests\GroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\User;
use App\Http\Controllers\Controller;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        return view('admin.group.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        $student_id = explode(',', $request->students_id);

        $group = Group::create([
            'name'      => $request->name
        ]);

        if ($student_id[0] != null) {
            foreach ($student_id as $key => $value)
                User::find($value)->fields->update([
                    'group_id' => $group->id
                ]);
        }
        $group->teachers()->sync($request->teachers);

        return redirect()->route('admin.group.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Group $group
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Group $group)
    {
        return view('admin.group.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateGroupRequest  $request
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        $group->update($request->only('name'));

        $group->teachers()->sync($request->teachers);

        return redirect()->route('admin.group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Group $group
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('admin.group.index');
    }
}
