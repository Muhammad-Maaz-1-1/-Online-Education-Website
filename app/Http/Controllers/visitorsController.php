<?php

namespace App\Http\Controllers;

use App\Models\programModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class visitorsController extends Controller
{
    //
    public function index()
    {
        return view('visitors.index');
    }
    public function about()
    {
        return view('visitors.about');
    }
    public function feature()
    {
        return view('visitors.feature');
    }
    public function courses()
    {
        $courses = programModel::get();
        return view('visitors.courses', compact('courses'));
    }
    public function coursesDetail($id)
    {
        $courses = programModel::where('id', $id)->first();
        return view('visitors.detail', compact('courses'));
    }
    public function contact()
    {
        return view('visitors.contact');
    }
    public function register()
    {
        return view('visitors.register');
    }
    public function registerSubmit(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->save();
        return redirect()->route('login');
    }
    public function login()
    {
        return view('visitors.login');
    }
    public function loginSubmit(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->is_admin == '1') {
                return redirect()->route('dashboard'); // Redirect admin to dashboard
            }
            if (auth()->user()->role == 'instructor') {
                return redirect()->route('instructor'); // Redirect instructor to instructor panel
            }
            return redirect()->route('home');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
