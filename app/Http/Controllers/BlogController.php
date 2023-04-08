<?php

namespace App\Http\Controllers;

use App\Models\About_section;
use App\Models\Trek;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        $search = $request['search'] ?? "";
        if ($search != "") {
            $trek_info = Trek::inRandomOrder()->orderBy('id', 'DESC')->where('status', 'Active')->with('user_info')->Where("trek_name", 'LIKE', "%$search%")->get();
        } else {
            $trek_info = Trek::inRandomOrder()->where('status', 'Active')->with('user_info')->get();
        }
        // dd($trek_info);
        $about_info = About_section::where('status', 'Active')->with('trek_info')->get();
        return view('front/Blog/blog')->with([
            'trek_info' => $trek_info,
            'about_info' => $about_info
        ])->with('search', $search);
    }
}
