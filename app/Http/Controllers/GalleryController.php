<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index($id){
        $gallery_infos = Gallery::where('trek_id', $id)->orderBy('id', 'DESC')->where('status', 'Active')->with('trek_info')->with('gallery_info')->get();
        return view('front/gallery/gallery')->with([
            'gallery_infos' => $gallery_infos
        ]);
    }
}
