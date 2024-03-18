<?php

namespace App\Http\Controllers;

use App\Models\enrollmentModel;
use App\Models\User;
use Illuminate\Http\Request;

class studentController extends Controller
{
    //
    public function index()
    {
        $userId = auth()->user()->id;
        $enrollment = enrollmentModel::where('user_id', $userId)->where('status', true)->get();
        $user = User::where('id', $userId)->first();
        return view('student.index', compact('enrollment', 'user'));
    }
    public function courses()
    {
        $userId = auth()->user()->id;
        $enrollment = enrollmentModel::where('user_id', $userId)->where('status', true)->get();
        $user = User::where('id', $userId)->first();
        return view('student.courses', compact('enrollment', 'user'));
    }
    public function studentLecture($id)
    {
        $courseId = $id;
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        // dd($courseId);
        $enrollment = enrollmentModel::where('user_id', $userId)
            ->where('status', true)->where('course_id', $courseId)
            ->get();
        // $enrollment = enrollmentModel::where('course_id', $courseId)->get();
        return view('student.lecture', compact('user', 'enrollment'));
    }
}
