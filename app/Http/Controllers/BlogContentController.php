<?php

namespace App\Http\Controllers;

use App\Models\About_section;
use App\Models\Culture;
use App\Models\Health_kit;
use App\Models\Map;
use App\Models\Trek;
use Illuminate\Http\Request;

class BlogContentController extends Controller
{
    public function index($id)
    {



        $trek_info = Trek::where('id', $id)->orderBy('id', 'DESC')->where('status', 'Active')->with('user_info')->get();
        $about_info = About_section::where('id', $id)->orderBy('id', 'DESC')->where('status', 'Active')->get();
        $culture_info = Culture::where('id', $id)->orderBy('id', 'DESC')->where('status', 'Active')->get();
        $health_kit_info = Health_kit::where('id', $id)->orderBy('id', 'DESC')->where('status', 'Active')->with('medicine_info')->get();
        $map_infos = Map::where('id', $id)->orderBy('id', 'DESC')->where('status', 'Active')->with('trek_info')->get();
        // dd($map_infos);
        return view('front/Blog/blog_content')->with([
            'trek_info' => $trek_info,
            'about_info' => $about_info,
            'culture_info' => $culture_info,
            'health_kit_info' => $health_kit_info,
            'map_infos' => $map_infos
        ]);
    }
}
