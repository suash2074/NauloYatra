<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class AdminHomeController extends Controller
{
    public Function getHomeData(){
        return view('admin.Home.adminHome');
    }
}
