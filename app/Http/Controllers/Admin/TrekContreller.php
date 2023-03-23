<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trek;
use App\Models\User;
use Illuminate\Http\Request;

class TrekContreller extends Controller
{

    protected $trek = null;
    public function __construct(Trek $trek)
    {
        $this->trek = $trek;
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
            $this->trek = $this->trek->orderby('id','DESC')->with('user_info')->where('trek_name', 'LIKE', "%$search%")->orWhere("trek_type", 'LIKE', "%$search%")->orWhere("best_season", 'LIKE', "%$search%")->paginate(6);
        }else{
            $this->trek = $this->trek->orderby('id','DESC')->with('user_info')->paginate(6);
        }
        return view('admin.Trek.trek')->with('trek_data', $this->trek)->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_info = User::orderBy('id', 'DESC')->where('status', 'Active')->pluck('username', 'id');
        return view('admin.Trek.trekForm')->with('user_info', $user_info);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->trek->getRules();
        $request->validate($rules);
        $data = $request->except(['_token', 'background_image']);
        if ($request->has('background_image')) {
            $photo = $request->background_image;
            $file_name = uploadImage($photo, 'trek', '125x125');
            if ($file_name) {
                $data['background_image'] = $file_name;
            }
        }

        $data['user_id'] = auth()->user()->id;
        // dd($data['user_data']);
        $this->trek->fill($data);
        $status = $this->trek->save();
        if($status){
            notify()->success('Trek added successfully !');
        }else{
            notify()->error('Sorry! There was problem while adding trek.');
        }
        
        return redirect()->route('about.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->trek = $this->trek->find($id);
        if (!$this->trek) {
            //message
            notify()->error('This trek doesnot exists !!');
            return redirect()->route('trek.index');
        }

        return view('admin.Trek.trekView')->with('trek_data', $this->trek);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->trek = $this->trek->find($id);
        if(!$this->trek){
            // notify()->error('This trek doesnot exists');
            return redirect()->route('trek.index');
        }
        return view('admin.Trek.trekForm')
        ->with('trek_data', $this->trek);
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
        $this->trek = $this->trek->find($id);
        if (!$this->trek) {
            notify()->error('This trek doesnot exists !!');
            redirect()->route('trek.index');
        }
        $rules = $this->trek->getRules('update');
        $request->validate($rules);
        $data = $request->except(['_token', 'background_image']);
        if ($request->has('background_image')) {
            $photo = $request->background_image;
            $file_name = uploadImage($photo, 'trek', '125x125');
            if ($file_name) {
                if ($this->trek->background_image != null && file_exists(public_path() . '/uploads/trek/' . $this->trek->background_image)) {
                    unlink(public_path() . '/uploads/trek/' . $this->trek->background_image);
                    unlink(public_path() . '/uploads/trek/Thumb-' . $this->trek->background_image);
                }
                $data['background_image'] = $file_name;
            }
        }
        $this->trek->fill($data);

        $status = $this->trek->save();
        if($status){
            notify()->success('Trek updated successfully !');
        }else{
            notify()->error('Sorry! There was problem in updating trek.');
        }
        return redirect()->route('trek.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->trek = $this->trek->find($id);
        if(!$this->trek){
            notify()->error('This trek doesnot exists !!');
            return redirect()->route('trek.index');
        }
        $del = $this->trek->delete();
        $photo = $this->trek->background_image;
        if ($del) {
            if ($photo != null && file_exists(public_path() . '/uploads/trek/' . $photo)) {
                unlink(public_path() . '/uploads/trek/' . $photo);
                unlink(public_path() . '/uploads/trek/Thumb-' . $photo);
                //message
                notify()->success('Trek deleted successfully !');
            } else {
                //message
                notify()->error('Sorry! there was problem in deleting data.');
            }

            return redirect()->route('trek.index');
        }
    }
}
