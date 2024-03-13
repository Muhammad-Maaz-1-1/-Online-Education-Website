<?php

namespace App\Http\Controllers;

use App\Models\categoriesModel;
use App\Models\categoryModel;
use App\Models\courseCategoryModel;
use Illuminate\Http\Request;

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
        $category = new categoryModel();
        $category->name = $request->category;
        $category->save();
        dd($category);
    }
    public function courses()
    {
        return view('admin.courses');
    }
    public function coursesForm()
    {
        return view('admin.coursesForm');
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
}
