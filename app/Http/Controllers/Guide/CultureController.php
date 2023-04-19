<?php

namespace App\Http\Controllers\Guide;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use App\Models\Trek;
use Illuminate\Http\Request;

class CultureController extends Controller
{

    protected $culture = null;
    public function __construct(Culture $culture)
    {
        $this->culture = $culture;
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
            $this->culture = $this->culture->orderBy('id', 'DESC')->whereHas('trek_info', function ($trek) {
                $trek->where('user_id', auth()->id());
            })->with('trek_info')->where('title', 'LIKE', "%$search%")->orWhere("description", 'LIKE', "%$search%")->paginate(6);
        } else {
            $this->culture = $this->culture->orderBy('id', 'DESC')->whereHas('trek_info', function ($trek) {
                $trek->where('user_id', auth()->id());
            })->with('trek_info')->paginate(6);
        }
        return view('guide.culture.culture')->with('culture_data', $this->culture)->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->where('user_id', auth()->user()->id)->pluck('trek_name', 'id');
        return view('guide.culture.cultureForm')->with('trek_info', $trek_info);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->culture->getRules();
        $request->validate($rules);
        $data = $request->except(['_token', 'image']);
        if ($request->has('image')) {
            $photo = $request->image;
            $file_name = uploadImage($photo, 'culture', '125x125');
            if ($file_name) {
                $data['image'] = $file_name;
            }
        }
        $this->culture->fill($data);
        $status = $this->culture->save();
        if ($status) {
            notify()->success('Culture detail added successfully !');
        } else {
            notify()->error('Sorry! There was problem while adding culture.');
        }

        return redirect()->route('guide.medicine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->culture = $this->culture->find($id);
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        if (!$this->culture) {
            //message
            notify()->error('This culture detail doesnot exists !!');
            return redirect()->route('guide.culture.index');
        }
        return view('guide.culture.cultureView')
            ->with('culture_data', $this->culture)->with('trek_info', $trek_info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->culture = $this->culture->find($id);
        $trek_info = Trek::orderBy('id', 'Desc')->where('status', 'Active')->where('user_id', auth()->user()->id)->pluck('trek_name', 'id');
        if (!$this->culture) {
            //message
            notify()->error('This culture detail doesnot exists !!');
            return redirect()->route('guide.culture.index');
        }
        return view('guide.culture.cultureForm')
            ->with('culture_data', $this->culture)->with('trek_info', $trek_info);
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
        $this->culture = $this->culture->find($id);
        $trek_info = Trek::orderBy('id', 'Desc')->where('status', 'Active')->where('user_id', auth()->user()->id)->pluck('trek_name', 'id');
        if (!$this->culture) {
            notify()->error('This culture doesnot exists');
            redirect()->route('guide.about.index');
        }

        $rules = $this->culture->getRules();
        $request->validate($rules);
        $data = $request->except(['_token', 'image']);
        if ($request->has('image')) {
            $photo = $request->image;
            $file_name = uploadImage($photo, 'culture', '125x125');
            if ($file_name) {
                if ($this->culture->iamge != null && file_exists(public_path() . '/uploads/culture/' . $this->culture->image)) {
                    unlink(public_path() . '/uploads/culture/' . $this->culture->image);
                    unlink(public_path() . '/uploads/culture/Thumb-' . $this->culture->image);
                }
                $data['image'] = $file_name;
            }
        }

        $this->culture->fill($data);

        $status = $this->culture->save();
        if ($status) {
            notify()->success('Culture detail updated successfully !');
        } else {
            notify()->error('Sorry! There was problem in updating details.');
        }

        return redirect()->route('guide.culture.index')->with('$trek_info', $trek_info);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->culture = $this->culture->find($id);
        if (!$this->culture) {
            notify()->error('This culture detail doesnot exists !!');
            return redirect()->route('guide.about.index');
        }
        $del = $this->culture->delete();
        $photo = $this->culture->image;
        if ($del) {
            if ($photo != null && file_exists(public_path() . '/uploads/culture/' . $photo)) {
                unlink(public_path() . '/uploads/culture/' . $photo);
                unlink(public_path() . '/uploads/culture/Thumb-' . $photo);
                //message
                notify()->success('Culture details deleted successfully !');
            } else {
                //message
                notify()->error('Sorry! there was problem in deleting data.');
            }

            return redirect()->route('guide.culture.index');
        }
    }
}
