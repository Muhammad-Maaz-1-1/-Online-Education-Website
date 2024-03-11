<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class visitorsController extends Controller
{
    //
    public function index(){
        return view('visitors.index');
    }
}
