<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    protected $user = null;
    protected $booking = null;

    public function __construct(User $user, Bookings $booking)
    {
        $this->user = $user;
        $this->booking = $booking;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()) {
            return redirect('/login');
        }
        $guide_info = User::orderBy('id', 'DESC')->where('status', 'Active')->where('role', 'guide')->pluck('username', 'id');
        $this->booking = $this->booking->orderby('id', 'DESC')->with('user_info')->with('package_info')->with('trek_info')->where('user_id', Auth()->user()->id)->get();
        return view('front.user.profile')->with('booking_data', $this->booking)->with([
            'guide_info' => $guide_info
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->user = $this->user->find($id);
        if (!$this->user) {
            //message
            notify()->error('This user doesnot exists !!');
            return redirect()->route('profile.index');
        }
        return view('front.user.profile')
            ->with('user_data', $this->user);
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
        $this->user = $this->user->find($id);
        if (!$this->user) {
            notify()->error('This user doesnot exists !!');
            redirect()->route('profile.index');
        }

        $rules = $this->user->getRules('update');
        $request->validate($rules);
        $data = $request->except(['_token', 'photo']);
        if ($request->has('photo')) {
            $photo = $request->photo;
            $file_name = uploadImage($photo, 'user', '125x125');
            if ($file_name) {
                if ($this->user->photo != null && file_exists(public_path() . '/uploads/user/' . $this->user->photo)) {
                    unlink(public_path() . '/uploads/user/' . $this->user->photo);
                    unlink(public_path() . '/uploads/user/Thumb-' . $this->user->photo);
                }
                $data['photo'] = $file_name;
            }
        }

        if (isset($request->oldPassword) && $request->oldPassword != null) {
            if (!password_verify($request->oldPassword, $data['password'])) {
                notify()->error("Old password didn't matched.");
                return redirect()->back();
            }
        }

        if (isset($request->oldPassword) && $request->oldPassword != null && isset($request->newPassword) && $request->newPassword != null) {
            if ($request->oldPassword == $request->newPassword) {
                notify()->error("Old password and New cannot be same.");
                return redirect()->back();
            }
        }


        if (isset($request->newPassword) && $request->newPassword != null) {
            if (isset($request->retypeNewPassword) && $request->retypeNewPassword != null) {
                if ($request->newPassword == $request->retypeNewPassword) {
                    $data['password'] = Hash::make($request->newPassword);
                } else {
                    notify()->error("Password conformation failed as new and confirm password didnt matched.");
                    return redirect()->route('profile.index');
                }
            }
        }

        $this->user->fill($data);

        $status = $this->user->save();
        if ($status) {
            notify()->success('Details updated successfully');
        } else {
            notify()->error('Sorry! There was problem in updating details');
        }
        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Booking cancel request
    public function destroy($id, Request $request)
    {
        DB::table('bookings')
        ->where('id', $id)
        ->update(array('trip_status' => 'Cancelled'));

        notify()->success('Trip cancelled sucessfully!! It was really sad to see you cancel the trip🥲');
        return redirect()->route('profile.index');
    }
}
