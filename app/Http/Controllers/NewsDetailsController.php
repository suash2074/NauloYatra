<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsDetailsController extends Controller
{
    public function index(){
        return view('front/news/news_details');
    }
}
