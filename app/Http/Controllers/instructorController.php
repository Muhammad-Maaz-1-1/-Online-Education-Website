<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class instructorController extends Controller
{
    //
    public function index()
    {
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        return view('instructor.index', compact('user'));
    }
    public function instructorCourse()
    {
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        return view('instructor.courses', compact('user'));
    }
    public function instructorCourseForm()
    {
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        return view('instructor.coursesForm', compact('user'));
    }
    public function instructorCategory()
    {
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();

        return view('instructor.category', compact('user'));
    }
    public function instructorCategoryForm()
    {
        $userId = auth()->user()->id;

        $user = User::where('id', $userId)->first();

        return view('instructor.categoryForm', compact('user'));
    }
}
