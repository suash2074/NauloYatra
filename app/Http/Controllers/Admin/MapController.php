<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Map;
use App\Models\Trek;
use Illuminate\Http\Request;

class MapController extends Controller
{
    protected $map = null;
    public function __construct(Map $map)
    {
        $this->map = $map;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->map = $this->map->orderBy('id', 'DESC')->with('trek_info')->paginate(6);
        return view('admin.map.map')->with('map_data', $this->map);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        return view('admin.map.mapForm')->with('trek_info', $trek_info);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->map->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);

        $this->map->fill($data);
        $status = $this->map->save();
        if ($status) {
            notify()->success('Map detail added successfully !');
        } else {
            notify()->error('Sorry! There was problem while adding Map.');
        }

        return redirect()->route('map.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->map = $this->map->find($id);
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        if (!$this->map) {
            //message
            notify()->error('This map detail doesnot exists !!');
            return redirect()->route('map.index');
        }
        return view('admin.map.mapView')
            ->with('map_data', $this->map)->with('trek_info', $trek_info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->map = $this->map->find($id);
        $trek_info = Trek::orderBy('id', 'Desc')->where('status', 'Active')->pluck('trek_name', 'id');
        if (!$this->map) {
            //message
            notify()->error('This map detail doesnot exists !!');
            return redirect()->route('map.index');
        }
        return view('admin.map.mapForm')
            ->with('map_data', $this->map)->with('trek_info', $trek_info);
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
        $this->map = $this->map->find($id);
        $trek_info = Trek::orderBy('id', 'Desc')->where('status', 'Active')->pluck('trek_name', 'id');
        if (!$this->map) {
            notify()->error('This map doesnot exists');
            redirect()->route('map.index');
        }

        $rules = $this->map->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);

        $this->map->fill($data);

        $status = $this->map->save();
        if ($status) {
            notify()->success('Map detail updated successfully !');
        } else {
            notify()->error('Sorry! There was problem in updating details.');
        }

        return redirect()->route('map.index')->with('$trek_info', $trek_info);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->map = $this->map->find($id);
        if (!$this->map) {
            notify()->error('This map detail doesnot exists !!');
            return redirect()->route('about.index');
        }
        $del = $this->map->delete();
        if ($del) {
            //message
            notify()->success('map details deleted successfully !');
        } else {
            //message
            notify()->error('Sorry! there was problem in deleting data.');
        }
        return redirect()->route('map.index');
    }
}
