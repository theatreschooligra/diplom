<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AttendanceRequest;
use App\Http\Resources\AttendanceResource;
use App\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendanceController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Lesson $lesson
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show(Lesson $lesson)
    {
        return AttendanceResource::collection($lesson->attendance);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Lesson $lesson
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function update(Request $request, Lesson $lesson)
    {
        $data = [];
        foreach ($request->all() as $key => $value) {
            $data[$key] = ['is_exist' => $value];
        }
        $lesson->students()->sync($data);
        return AttendanceResource::collection($lesson->attendance);
    }
}
