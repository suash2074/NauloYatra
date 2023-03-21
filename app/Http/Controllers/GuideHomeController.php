<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuideHomeController extends Controller
{
    public Function getHomeData(){
        return view('guide.Home.guideHome');
    }
}
