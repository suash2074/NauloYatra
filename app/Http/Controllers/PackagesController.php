<?php

namespace App\Http\Controllers;

use App\Models\Package_details;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function index(Request $request){
        $search = $request['search'] ?? "";
        if ($search != "") {
            $package_infos = Package_details::orderBy('id', 'DESC')->where('status', 'Active')->with('package_info')->Where("price_per_person", 'LIKE', "%$search%")->orWhere("days", 'LIKE', "%$search%")->Where("trek_type", 'LIKE', "%$search%")->get();
        } else {
            $package_infos = Package_details::orderBy('id', 'DESC')->where('status', 'Active')->with('package_info')->get();
        }
        return view('front/packages/packages')->with([
            'package_infos' => $package_infos,
            // 'about_info' => $about_info
        ])->with('search', $search);
    }
}
