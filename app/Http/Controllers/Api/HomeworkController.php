<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use Illuminate\Support\Facades\Auth;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $lessons = $user->group->lessons()->whereNotNull('homework_id')
            ->whereNotNull('homework_send_time')->orderBy('homework_send_time');

        return LessonResource::collection($lessons->get());
    }
}