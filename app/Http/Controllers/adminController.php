<?php

namespace App\Http\Controllers;

use App\Models\categoriesModel;
use App\Models\categoryModel;
use App\Models\courseCategoryModel;
use App\Models\programModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function siteSetting()
    {
        return view('admin.siteSetting');
    }
    public function homeAbout()
    {
        return view('admin.homeAbout');
    }
    public function homeWhyChooseUs()
    {
        return view('admin.homeWhyChooseUs');
    }
    public function category()
    {
        return view('admin.category');
    }
    public function categoryForm()
    {
        return view('admin.categoryForm');
    }
    public function categoryFormSubmit(Request $request)
    {
        if (auth()->user()->is_admin) {
            return redirect()->route('dashboard'); // Redirect admin to dashboard
        }
        $category = new categoryModel();
        $category->name = $request->category;
        $category->save();
        return redirect()->back()->with('success', 'Category added successfully.');
    }
    public function courses()
    {
        return view('admin.courses');
    }
    public function coursesForm()
    {
        $category = categoryModel::get();
        return view('admin.coursesForm', compact('category'));
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
        return redirect()->back()->with('sucess', 'course uploaded successfully');
    }
    public function instructors()
    {
        return view('admin.instructors');
    }
    public function instructorsForm()
    {
        return view('admin.instructorsForm');
    }
    public function testimonials()
    {
        return view('admin.testimonials');
    }
    public function testimonialsForm()
    {
        return view('admin.testimonialsForm');
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
}
