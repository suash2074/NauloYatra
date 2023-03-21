<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth()->user()->role == 'guide'){
            return redirect()->route(request()->user()->role.'.'.request()->user()->role);
        }
        else{
            return redirect()->route(request()->user()->role);
        }
    }

    public function admin()
    {
        return redirect()->route('adminHome');
    }

    // public function adminBlog()
    // {
    //     return view('front/Home/home');
    // }

    public function user()
    {
        return view('front/Home/home');
    }

    public function guide()
    {
        return redirect()->route('guide.guideHome');
    }
}
