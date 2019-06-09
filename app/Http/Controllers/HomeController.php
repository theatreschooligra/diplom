<?php

namespace App\Http\Controllers;

use App\Company;
use App\Course;
use App\Http\Requests\MailRequest;
use App\Repertoire;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $repertoire = Repertoire::where('time', '>', (string)now())->orderBy('time')->limit(3)->get();
        $teachers = User::query()->where('role_id', 2)->limit(3)->get();
        return view('home', compact('repertoire', 'teachers'));
    }

    public function about()
    {
        $company = Company::first();
        return view('about', compact('company'));
    }

    public function courses()
    {
        $courses = Course::all();
        return view('courses', compact('courses'));
    }

    public function team()
    {
        $teachers = User::where('role_id', 2)
            ->orderBy('surname')
            ->get();
        return view('team', compact('teachers'));
    }

    public function repertoire()
    {
        $repertoire = Repertoire::where('time', '>', (string)now())->get()->sortBy('time');
        return view('repertoire', compact('repertoire'));
    }

    public function blogs()
    {
        return view('blogs');
    }

    public function blog($id)
    {
        return view('blog');
    }

    public function contact()
    {
        $company = Company::first();
        return view('contact', compact('company'));
    }

    public function sendMail(MailRequest $request)
    {
        Mail::send('email.to_system', $request->validated(), function($message) {
            $message->to('NRGruslan@gmail.com', 'Театральный школы "Игра"')->subject
            ('Запрос на бесплатное занятие');
//            $message->from('NRGruslan@gmail.com','Театральный школы "Игра"');
        });

        return redirect()->back();
    }
}
