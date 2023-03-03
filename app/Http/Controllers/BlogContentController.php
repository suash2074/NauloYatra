<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogContentController extends Controller
{
    public function index(){
        return view('front/Blog/blog_content');
    }
}
