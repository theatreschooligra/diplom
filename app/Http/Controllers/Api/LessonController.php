<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\LessonResource;
use App\Lesson;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\Filter;
use Spatie\QueryBuilder\QueryBuilder;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $lessons = QueryBuilder::for(Lesson::class)
            ->allowedFilters([
                Filter::exact('lesson_date')
            ])
            ->orderBy('lesson_date')
            ->orderBy('lesson_time')
        ;
        if (Auth::user()->role_id == 2) {
            $lessons->where('teacher_id', Auth::id());
        } else if (Auth::user()->role_id == 3) {
            $lessons->whereHas('group', function ($query) {
                $query->whereHas('students', function ($query) {
                    $query->where('users.id', Auth::id());
                });
            });
        }

        return LessonResource::collection($lessons->get());
    }

    /**
     * Display the specified resource.
     *
     * @param Lesson $lesson
     * @return LessonResource
     */
    public function show(Lesson $lesson)
    {
        return new LessonResource($lesson);
    }
}
