<?php

namespace App\Http\Controllers\Guide;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuideProfileController extends Controller
{

    protected $user = null;

    public function __construct(User $user)
    {
        $this->user = $user;
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
        return view('guide.user.profile');
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
            return redirect()->route('guide.profile.index');
        }
        return view('guide.user.profile')
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
            redirect()->route('guide.profile.index');
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
                    notify()->error("Password conformation failed.");
                    return redirect()->route('guide.profile.index');
                }
            }
        }

        $this->user->fill($data);

        $status = $this->user->save();
        if ($status) {
            notify()->success('Details updated successfully !');
        } else {
            notify()->error('Sorry! There was problem in updating details.');
        }
        return redirect()->route('profile.index');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
