<?php

namespace App\Http\Controllers;

use App\Models\categoriesModel;
use App\Models\categoryModel;
use App\Models\courseCategoryModel;
use App\Models\enrollmentModel;
use App\Models\programModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    //
    public function index()
    {
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        return view('admin.index', compact('user'));
    }
    public function login()
    {
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        return view('admin.login', compact('user'));
    }
    public function siteSetting()
    {
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        return view('admin.siteSetting', compact('user'));
    }
    public function homeAbout()
    {
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        return view('admin.homeAbout', compact('user'));
    }
    public function homeWhyChooseUs()
    {
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        return view('admin.homeWhyChooseUs', compact('user'));
    }
    public function category()
    {
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        return view('admin.category', compact('user'));
    }
    public function categoryForm()
    {
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        return view('admin.categoryForm', compact('user'));
    }
    public function categoryFormSubmit(Request $request)
    {
        if (auth()->user()->is_admin) {
            return redirect()->route('dashboard'); // Redirect admin to dashboard
        }
        $category = new categoryModel();
        $category->name = $request->category;
        return redirect()->back()->with('success', 'Category added successfully.');
    }
    public function courses()
    {
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        $course = programModel::get();
        return view('admin.courses', compact('user', 'course'));
    }
    public function coursesForm()
    {

        $category = categoryModel::get();
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        return view('admin.coursesForm', compact('category', 'user'));
    }
    public function coursesFormSubmit(Request $request)
    {
        $courses = new programModel();
        $courses->title = $request->title;
        $image_path = '';
        if ($request->image) {
            $image_path = rand(0, 9999) . time() . '.' . $request->image->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $image_path);
        }
        $courses->image = $image_path;
        $courses->description = $request->description;
        $courses->lectures = $request->lectures;
        $courses->durations = $request->durations;
        $courses->skill = $request->skill;
        $courses->language = $request->language;
        $courses->price = $request->price;
        $courses->category_id = $request->category;
        $courses->instructor_id = $request->instructor_id;
        $courses->save();
        return redirect()->route('lecture', ['id' => $courses->id]);
    }
    public function instructors()
    {
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        return view('admin.instructors', compact('user'));
    }
    public function instructorsForm()
    {
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        return view('admin.instructorsForm', compact('user'));
    }
    public function testimonials()
    {
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        return view('admin.testimonials', compact('user'));
    }
    public function testimonialsForm()
    {
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        return view('admin.testimonialsForm', compact('user'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/'); // Redirect to the home page after logout
    }
    public function profile()
    {

        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        return view('admin.profile', compact('user'));
    }
    public function profileFormSubmit(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->skill = $request->skill;

        $image_path = '';
        if ($request->image) {
            $image_path = rand(0, 9999) . time() . '.' . $request->image->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $image_path);
        }
        $user->image = $image_path;
        $user->update();
        return redirect()->back();
    }
    public function checkout(Request $request)
    {
        $userId = auth()->user()->id;
        $enrollment = new enrollmentModel;
        $enrollment->course_id = $request->course_id;
       
        $enrollment->user_id = $userId;
        $enrollment->save();
        $enrollmentCourse = enrollmentModel::where('course_id', $request->course_id)->first();
        return view('visitors.checkout', compact('enrollmentCourse'));
    }
  
}
