<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != ""){
            $this->user = $this->user->orderBy('id', 'DESC')->where('first_name', 'LIKE', "%$search%")->orWhere("last_name", 'LIKE', "%$search%")->orWhere("username", 'LIKE', "%$search%")->paginate(6);
        }else{
            $this->user = $this->user->orderBy('id', 'DESC')->paginate(6);
        }
        return view('admin.User.user')->with('user_data', $this->user)->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.User.userForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->user->getRules();
        $request->validate($rules);
        $data = $request->except(['_token', 'photo']);
        if ($request->has('photo')) {
            $photo = $request->photo;
            $file_name = uploadImage($photo, 'user', '125x125');
            if ($file_name) {
                $data['photo'] = $file_name;
            }
        }
        $data['password'] = Hash::make($data['password']);
        $this->user->fill($data);
        $status = $this->user->save();
        if($status){
            notify()->success('User added successfully !');
        }else{
            notify()->error('Sorry! There was problem while adding user.');
        }
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $test = $this->user->orderBy('id', 'DESC')->get();
        $this->user = $this->user->find($id);
        if (!$this->user) {
            return redirect()->route('user.index');
        }

        return view('admin.User.userProfileView')->with('user_data', $this->user);
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
        if(!$this->user){
            notify()->error('This user doesnot exists');
            return redirect()->route('user.index');
        }
        return view('admin.User.userForm')
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
            redirect()->route('user.index');
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
        if ($data['password'] != $request->password) {

            $data['password'] = Hash::make($request->password);
        }

        $this->user->fill($data);

        $status = $this->user->save();
        if($status){
            notify()->success('User updated successfully !');
        }else{
            notify()->error('Sorry! There was problem in updating user.');
        }
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user = $this->user->find($id);
        if(!$this->user){
            notify()->error('This user doesnot exists !!');
            return redirect()->route('user.index');
        }
        $del = $this->user->delete();
        $photo = $this->user->photo;
        if ($del) {
            if ($photo != null && file_exists(public_path() . '/uploads/user/' . $photo)) {
                unlink(public_path() . '/uploads/user/' . $photo);
                unlink(public_path() . '/uploads/user/Thumb-' . $photo);
                //message
                notify()->success('user deleted successfully !');
            } else {
                //message
                notify()->error('Sorry! there was problem in deleting data.');
            }

            return redirect()->route('user.index');
        }

    }
}
