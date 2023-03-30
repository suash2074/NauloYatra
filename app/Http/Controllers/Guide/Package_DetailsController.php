<?php

namespace App\Http\Controllers\Guide;

use App\Http\Controllers\Controller;
use App\Models\Package_details;
use App\Models\Packages;
use Illuminate\Http\Request;

class Package_DetailsController extends Controller
{
    protected $package_detail = null;
    public function __construct(Package_details $package_detail)
    {
        $this->package_detail = $package_detail;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $this->package_detail = $this->package_detail->orderBy('id', 'DESC')->with('package_info')->whereHas('package_info', function ($package) {
                $package->where('user_id', auth()->id());
            })->where('trek_type', 'LIKE', "%$search%")->orwhere('days', 'LIKE', "%$search%")->orwhere('price_per_person', 'LIKE', "%$search%")->paginate(6);
        } else {
            $this->package_detail = $this->package_detail->orderBy('id', 'DESC')->with('package_info')->whereHas('package_info', function ($package) {
                $package->where('user_id', auth()->id());
            })->paginate(6);
        }
        return view('guide.packageSection.package_detail.package_detail')->with('package_detail_data', $this->package_detail)->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $package_info = Packages::orderBy('id', 'DESC')->where('status', 'Active')->pluck('package_name', 'id');
        return view('guide.packageSection.package_detail.package_detailForm')->with('package_info', $package_info);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->package_detail->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);
        $this->package_detail->fill($data);
        $status = $this->package_detail->save();
        if ($status) {
            notify()->success('Package details added successfully !');
        } else {
            notify()->error('Sorry! There was problem while adding package details.');
        }

        return redirect()->route('guide.packageDetail.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->package_detail = $this->package_detail->find($id);
        $package_info = Packages::orderBy('id', 'DESC')->where('status', 'Active')->pluck('package_name', 'id');
        if (!$this->package_detail) {
            //message
            notify()->error('This package detail doesnot exists !!');
            return redirect()->route('guide.packageDetail.index');
        }
        return view('guide.packageSection.package_detail.package_detailView')
            ->with('package_detail_data', $this->package_detail)->with('package_info', $package_info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->package_detail = $this->package_detail->find($id);
        $package_info = Packages::orderBy('id', 'DESC')->where('status', 'Active')->pluck('package_name', 'id');
        if (!$this->package_detail) {
            //message
            notify()->error('This package detail doesnot exists !!');
            return redirect()->route('guide.packageDetail.index');
        }
        return view('guide.packageSection.package_detail.package_detailForm')
            ->with('package_detail_data', $this->package_detail)->with('package_info', $package_info);
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
        $this->package_detail = $this->package_detail->find($id);
        $package_info = Packages::orderBy('id', 'Desc')->where('status', 'Active')->pluck('package_name', 'id');
        if (!$this->package_detail) {
            notify()->error('This package detail doesnot exists !!');
            return redirect()->route('guide.packageDetail.index');
        }

        $rules = $this->package_detail->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);

        $this->package_detail->fill($data);

        $status = $this->package_detail->save();
        if ($status) {
            notify()->success('Package detail updated successfully !');
        } else {
            notify()->error('Sorry! There was problem in updating package detail.');
        }

        return redirect()->route('guide.packageDetail.index')->with('$package_info', $package_info);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->package_detail = $this->package_detail->find($id);
        if (!$this->package_detail) {
            notify()->error('This package detail doesnot exists !!');
            return redirect()->route('guide.packageDetail.index');
        }
        $del = $this->package_detail->delete();
        if ($del) {
            //message
            notify()->success('Package detail deleted successfully !');
        } else {
            //message
            notify()->error('Sorry! there was problem in deleting data.');
        }

        return redirect()->route('guide.packageDetail.index');
    }
}
