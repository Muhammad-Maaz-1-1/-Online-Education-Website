<?php

namespace App\Http\Controllers;

use App\Models\categoryModel;
use App\Models\programModel;
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
        $course = programModel::where('instructor_id', $userId)->get();
        return view('instructor.courses', compact('user','course'));
    }
    public function instructorCourseForm()
    {
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        $category = categoryModel::get();
        return view('instructor.coursesForm', compact('user', 'category'));
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
