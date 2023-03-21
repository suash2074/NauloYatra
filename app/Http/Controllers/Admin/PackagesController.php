<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Packages;
use App\Models\Trek;
use App\Models\User;
use Illuminate\Http\Request;

class PackagesController extends Controller
{

    protected $package = null;
    public function __construct(Packages $package)
    {
        $this->package = $package;
    }

    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $this->package = $this->package->orderBy('id', 'DESC')->with('user_info')->with('trek_info')->where('package_name', 'LIKE', "%$search%")->paginate(6);
        } else {
            $this->package = $this->package->orderBy('id', 'DESC')->with('user_info')->with('trek_info')->paginate(6);
        }
        return view('admin.packageSection.package.package')->with('package_data', $this->package)->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_info = User::orderBy('id', 'DESC')->where('status', 'Active')->pluck('username', 'id');
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        return view('admin.packageSection.package.packageForm')->with([
            'user_info' => $user_info,
            'trek_info' => $trek_info
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
        $rules = $this->package->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);
        $data['user_id'] = auth()->user()->id;
        $this->package->fill($data);
        $status = $this->package->save();
        if ($status) {
            notify()->success('Package added successfully !');
        } else {
            notify()->error('Sorry! There was problem while adding package.');
        }

        return redirect()->route('package.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->package = $this->package->find($id);
        $user_info = User::orderBy('id', 'DESC')->where('status', 'Active')->pluck('username', 'id');
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        if (!$this->package) {
            //message
            notify()->error('This package doesnot exists !!');
            return redirect()->route('package.index');
        }
        return view('admin.packageSection.package.packageView')
            ->with('package_data', $this->package)->with([
                'user_info' => $user_info,
                'trek_info' => $trek_info
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
        $this->package = $this->package->find($id);
        $user_info = User::orderBy('id', 'DESC')->where('status', 'Active')->pluck('username', 'id');
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        if (!$this->package) {
            //message
            notify()->error('This package doesnot exists !!');
            return redirect()->route('package.index');
        }
        return view('admin.packageSection.package.packageForm')
            ->with('package_data', $this->package)->with([
                'user_info' => $user_info,
                'trek_info' => $trek_info
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
        $this->package = $this->package->find($id);
        $user_info = User::orderBy('id', 'Desc')->where('status', 'Active')->pluck('username', 'id');
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        if (!$this->package) {
            notify()->error('This package doesnot exists !!');
            return redirect()->route('package.index');
        }
        $rules = $this->package->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);
        $this->package->fill($data);

        $status = $this->package->save();
        if ($status) {
            notify()->success('Package updated successfully !');
        } else {
            notify()->error('Sorry! There was problem in updating package.');
        }

        return redirect()->route('package.index')->with([
            'user_info' => $user_info,
            'trek_info' => $trek_info
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
        $this->package = $this->package->find($id);
        if (!$this->package) {
            notify()->error('This package doesnot exists !!');
            return redirect()->route('package.index');
        }
        $del = $this->package->delete();
        if ($del) {
            //message
            notify()->success('Package deleted successfully !');
        } else {
            //message
            notify()->error('Sorry! there was problem in deleting data.');
        }

        return redirect()->route('package.index');
    }
}
