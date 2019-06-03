<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Dict;
use App\Http\Requests\CreateLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Lesson;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();
        return view('admin.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lesson.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateLessonRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLessonRequest $request)
    {
        $lesson = Lesson::create([
            'name'          => $request->name,
            'group_id'      => $request->group_id,
            'lesson_date'   => Carbon::createFromFormat('d/m/Y', $request->lesson_date),
            'lesson_time'   => $request->lesson_time,
            'room'          => $request->room,
            'teacher_id'    => $request->teacher_id
        ]);

        $lesson->students()->sync($lesson->group->students->pluck('id')->toArray());

        return redirect()->route('admin.lesson.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $lessons = Lesson::whereDate('lesson_date', '=', Carbon::createFromFormat('Y-m-d', $lesson->lesson_date)->format('Y-m-d'))
            ->where('lesson_time', $lesson->lesson_time)
            ->get();

        $rooms = Dict::rooms();

        foreach ($lessons as $row)
            if ($lesson->id != $row->id)
                unset($rooms[$row->room]);

        return view('admin.lesson.edit', compact('lesson', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateLessonRequest $request
     * @param  Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $update_arr = $request->only([
            'name', 'teacher_id', 'lesson_time', 'room'
        ]);
        $update_arr['lesson_date'] = Carbon::createFromFormat('d/m/Y', $request->lesson_date);

        $lesson->update($update_arr);

        return redirect()->route('admin.lesson.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('admin.lesson.index');
    }
}
