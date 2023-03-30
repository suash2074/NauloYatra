<?php

namespace App\Http\Controllers;

use App\Models\Package_details;
use App\Models\Packages;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $package_detail_infos = Package_details::inRandomOrder()->where('status', 'Active')->with('package_info')->Where("price_per_person", 'LIKE', "%$search%")->orWhere("days", 'LIKE', "%$search%")->orWhere("trek_type", 'LIKE', "%$search%")->get();
        } else {
            $package_detail_infos = Package_details::inRandomOrder()->where('status', 'Active')->with('package_info')->get();
        }
        $packages_infos = Packages::orderBy('id', 'DESC')->where('status', 'Active')->with('user_info')->with('trek_info')->get();

        // return $packages;
        return view('front/packages/packages')->with([
            'package_detail_infos' => $package_detail_infos,
            'packages_infos' => $packages_infos
        ])->with('search', $search);
    }

    public function book($id, Request $request)
    {
        
        $packages = Package_details::where('id', $id)->get();
        dd($packages);
    }
}
