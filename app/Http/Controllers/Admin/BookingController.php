<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bookings;
use App\Models\Package_details;
use App\Models\Packages;
use App\Models\Trek;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    protected $booking = null;
    public function __construct(Bookings $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->booking = $this->booking->orderby('id', 'DESC')->with('user_info')->with('package_info')->with('trek_info')->paginate(6);
        return view('admin.booking.booking')->with('booking_data', $this->booking);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_info = User::orderBy('id', 'DESC')->where('status', 'Active')->where('role', 'User')->pluck('username', 'id');
        $guide_info = User::orderBy('id', 'DESC')->where('status', 'Active')->where('role', 'guide')->pluck('username', 'id');
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        $package_info = Packages::orderBy('id', 'DESC')->where('status', 'Active')->pluck('package_name', 'id');
        return view('admin.booking.bookingForm')->with([
            'user_info' => $user_info,
            'guide_info' => $guide_info,
            'trek_info' => $trek_info,
            'package_info' => $package_info
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->booking->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);
        $this->booking->fill($data);
        $status = $this->booking->save();
        if ($status) {
            notify()->success('Package booking done sucessfully !');
        } else {
            notify()->error('Sorry! There was problem in booking of package.');
        }

        return redirect()->route('booking.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->booking = $this->booking->find($id);
        $user_info = User::orderBy('id', 'DESC')->where('status', 'Active')->pluck('username', 'id');
        $guide_info = User::orderBy('id', 'DESC')->where('status', 'Active')->where('role', 'guide')->pluck('username', 'id');
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        $package_info = Packages::orderBy('id', 'DESC')->where('status', 'Active')->pluck('package_name', 'id');
        if (!$this->booking) {
            //message
            notify()->error('This booking doesnot exists !!');
            return redirect()->route('packageDetail.index');
        }
        return view('admin.booking.bookingView')
            ->with('booking_data', $this->booking)->with([
                'user_info' => $user_info,
                'guide_info' => $guide_info,
                'trek_info' => $trek_info,
                'package_info' => $package_info
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->booking = $this->booking->find($id);
        $user_info = User::orderBy('id', 'DESC')->where('status', 'Active')->where('role', 'User')->pluck('username', 'id');
        $guide_info = User::orderBy('id', 'DESC')->where('status', 'Active')->where('role', 'guide')->pluck('username', 'id');
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        $package_info = Packages::orderBy('id', 'DESC')->where('status', 'Active')->pluck('package_name', 'id');
        $package_detail_info = Package_details::orderBy('id', 'DESC')->where('status', 'Active')->get();
        if (!$this->booking) {
            notify()->error('This booking doesnot exists !!');
            return redirect()->route('booking.index');
        }
        return view('admin.booking.bookingForm')
            ->with('booking_data', $this->booking)->with([
                'user_info' => $user_info,
                'guide_info' => $guide_info,
                'trek_info' => $trek_info,
                'package_info' => $package_info,
                'package_detail_info' => $package_detail_info
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->booking = $this->booking->find($id);
        $user_info = User::orderBy('id', 'DESC')->where('status', 'Active')->where('role', 'User')->pluck('username', 'id');
        $guide_info = User::orderBy('id', 'DESC')->where('status', 'Active')->where('role', 'guide')->pluck('username', 'id');
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        $package_info = Packages::orderBy('id', 'DESC')->where('status', 'Active')->pluck('package_name', 'id');
        $package_detail_info = Package_details::orderBy('id', 'DESC')->where('status', 'Active')->get();
        if (!$this->booking) {
            notify()->error('This booking doesnot exists !!');
            return redirect()->route('booking.index');
        }

        $rules = $this->booking->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);

        $this->booking->fill($data);

        $status = $this->booking->save();
        if ($status) {
            notify()->success('Booking updated successfully.');
        } else {
            notify()->error('Sorry! There was problem in updating data');
        }

        return redirect()->route('booking.index')->with([
            'user_info' => $user_info,
            'guide_info' => $guide_info,
            'trek_info' => $trek_info,
            'package_info' => $package_info,
            'package_detail_info' => $package_detail_info
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->booking = $this->booking->find($id);
        if (!$this->booking) {
            // notify()->error('This booking doesnot exists');
            return redirect()->route('booking.index');
        }
        $del = $this->booking->delete();
        if ($del) {
            //message
            notify()->success('Booking deleted successfully !');
        } else {
            //message
            notify()->error('Sorry! there was problem in deleting data.');
        }

        return redirect()->route('booking.index');
    }
}
