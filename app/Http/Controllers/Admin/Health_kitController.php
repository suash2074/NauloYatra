<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Health_kit;
use App\Models\Medicine;
use App\Models\Trek;
use Illuminate\Http\Request;

class Health_kitController extends Controller
{

    protected $health_kit = null;
    public function __construct(Health_kit $health_kit)
    {
        $this->health_kit = $health_kit;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->health_kit = $this->health_kit->orderBy('id', 'DESC')->with('trek_info')->with('medicine_info')->paginate(6);
        return view('admin.health_kit.health_kit')->with('health_kit_data', $this->health_kit);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        $medicine_info = Medicine::orderBy('id', 'DESC')->where('status', 'Active')->pluck('medicine_name', 'id');
        return view('admin.health_kit.health_kitForm')->with([
            'trek_info' => $trek_info,
            'medicine_info' => $medicine_info
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
        $rules = $this->health_kit->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);
        $this->health_kit->fill($data);
        $status = $this->health_kit->save();
        if($status){
            notify()->success('Health kit added successfully !');
        }else{
            notify()->error('Sorry! There was problem while adding health kit.');
        }

        return redirect()->route('healthKit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->health_kit = $this->health_kit->find($id);
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        $medicine_info = Medicine::orderBy('id', 'DESC')->where('status', 'Active')->pluck('medicine_name', 'id');
        if (!$this->health_kit) {
            //message
            notify()->error('This health kit doesnot exists !!');
            return redirect()->route('healthKit.index');
        }
        return view('admin.health_kit.health_kitView')->with('health_kit_data', $this->health_kit)->with([
            'trek_info' => $trek_info,
            'medicine_info' => $medicine_info
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
        $this->health_kit = $this->health_kit->find($id);
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        $medicine_info = Medicine::orderBy('id', 'DESC')->where('status', 'Active')->pluck('medicine_name', 'id');
        if (!$this->health_kit) {
            //message
            notify()->error('This health kit doesnot exists !!');
            return redirect()->route('healthKit.index');
        }
        return view('admin.health_kit.health_kitForm')->with('health_kit_data', $this->health_kit)->with([
            'trek_info' => $trek_info,
            'medicine_info' => $medicine_info
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
        $this->health_kit = $this->health_kit->find($id);
        $trek_info = Trek::orderBy('id', 'Desc')->where('status', 'Active')->pluck('trek_name', 'id');
        $medicine_info = Medicine::orderBy('id', 'DESC')->where('status', 'Active')->pluck('medicine_name', 'id');

        if (!$this->health_kit) {
            notify()->error('This hhealth kit doesnot exists !!');
            return redirect()->route('healthKit.index');
        }

        $rules = $this->health_kit->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);
        $this->health_kit->fill($data);

        $status = $this->health_kit->save();
        if($status){
            notify()->success('Health kit updated successfully !');
        }else{
            notify()->error('Sorry! There was problem in updating health kit.');
        }

        return redirect()->route('healthKit.index')->with([
            'trek_info' => $trek_info,
            'medicine_info' => $medicine_info
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
        $this->health_kit = $this->health_kit->find($id);
        if (!$this->health_kit) {
            notify()->error('This health kit doesnot exists !!');
            return redirect()->route('healthKit.index');
        }
        $del = $this->health_kit->delete();
        if ($del) {
            //message
            notify()->success('Health kit deleted successfully');
        } else {
            //message
            notify()->error('Sorry! there was problem in deleting data.');
        }

        return redirect()->route('healthKit.index');
    }
}
