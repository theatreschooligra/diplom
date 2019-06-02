<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function lesson_time()
    {
        return now()->hour - 8;
    }
}