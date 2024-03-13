<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\visitorsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[visitorsController::class,'index'])->name('home');
Route::get('/about',[visitorsController::class,'about'])->name('about');
Route::get('/feature',[visitorsController::class,'feature'])->name('feature');
Route::get('/courses',[visitorsController::class,'courses'])->name('visitors_courses');
Route::get('/contact',[visitorsController::class,'contact'])->name('contact');
Route::get('/register',[visitorsController::class,'register'])->name('register');


// admin controller
Route::get('/admin/login',[adminController::class,'login'])->name('admin_login');
Route::get('/admin/dashboard',[adminController::class,'index'])->name('dashboard');
Route::get('/admin/site-setting',[adminController::class,'siteSetting'])->name('site_setting');
Route::get('/admin/home-about',[adminController::class,'homeAbout'])->name('home_about');
Route::get('/admin/home-why-choose-us',[adminController::class,'homeWhyChooseUs'])->name('home_why_choose_us');
Route::get('/admin/category',[adminController::class,'category'])->name('category');
Route::get('/admin/category/form',[adminController::class,'categoryForm'])->name('category_form');
Route::post('/admin/category/form/submit',[adminController::class,'categoryFormSubmit'])->name('category_form_submit');
Route::get('/admin/courses',[adminController::class,'courses'])->name('courses');
Route::get('/admin/courses/form',[adminController::class,'coursesForm'])->name('admin_course_form');
Route::get('/admin/disount-form',[adminController::class,'discountForm'])->name('discount_form');
Route::get('/admin/instructors',[adminController::class,'instructors'])->name('instructors');
Route::get('/admin/instructors/form',[adminController::class,'instructorsForm'])->name('admin_instructors_form');
Route::get('/admin/testimonials',[adminController::class,'testimonials'])->name('testimonials');
Route::get('/admin/testimonials/form',[adminController::class,'testimonialsForm'])->name('admin_testimonials_form');