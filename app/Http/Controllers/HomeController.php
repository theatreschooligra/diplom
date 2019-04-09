<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        $company = Company::first();
        return view('about', compact('company'));
    }

    public function contact()
    {
        $company = Company::first();
        return view('contact', compact('company'));
    }

    public function courses()
    {
        return view('courses');
    }

    public function repertoire()
    {
        return view('repertoire');
    }

    public function blogs()
    {
        return view('blogs');
    }

    public function blog($id)
    {
        return view('blog');
    }
}
