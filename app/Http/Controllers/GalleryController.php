<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Trek;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index($id){
        $trek_infos = Trek::where('id', $id)->orderBy('id', 'DESC')->where('status', 'Active')->get();
        $gallery_infos = Gallery::where('trek_id', $id)->orderBy('id', 'DESC')->where('status', 'Active')->with('trek_info')->with('gallery_info')->get();
        return view('front/gallery/gallery')->with([
            'gallery_infos' => $gallery_infos,
            'trek_infos' => $trek_infos
        ]);
    }
}
