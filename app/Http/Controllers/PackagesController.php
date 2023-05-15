<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Package_details;
use App\Models\Packages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $booking_infos = Bookings::where('user_id', auth()->user()->id)->get();
        // return $packages;
        return view('front/packages/packages')->with([
            'package_detail_infos' => $package_detail_infos,
            'packages_infos' => $packages_infos,
            'booking_infos' => $booking_infos
        ])->with('search', $search);
    }

    protected $booking = null;
    public function __construct(Bookings $booking)
    {
        $this->booking = $booking;
    }


    public function book(Request $request)
    {
        $packages = Package_details::where('id', $request->package_id)->get();
        $rules = $this->booking->getRules();
        $data = $request->except(['_token']);
        $data['user_id'] = auth()->user()->id;
        $data['number'] = rand(99999, 999999); //oid for payment
        $data['total_amount'] = $request->price_per_person * $request->number_of_people;
        $data['advance_payment'] = $data['total_amount'] * 0.2;
        $data['payment_status'] = 'Unpaid';
        $this->booking->fill($data);
        $status = $this->booking->save();
        
        if ($status) {
            notify()->success('Package booking done sucessfully !');
        } else {
            notify()->error('Sorry! There was problem in booking of package.');
        }

        return redirect()->route('esewa-pay', $this->booking->id);
        // return redirect()->back();
    }
}
