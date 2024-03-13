<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class visitorsController extends Controller
{
    //
    public function index(){
        return view('visitors.index');
    }
    public function about(){
        return view('visitors.about');
    }
    public function feature(){
        return view('visitors.feature');
    }
    public function courses(){
        return view('visitors.courses');
    }
    public function contact(){
        return view('visitors.contact');
    }
    public function register(){
        return view('visitors.register');
    }
}
