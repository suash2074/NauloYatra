<?php

namespace App\Http\Controllers\Guide;

use App\Http\Controllers\Controller;
use App\Models\About_section;
use App\Models\Trek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutSectionController extends Controller
{
    protected $about_section = null;

    public function __construct(About_section $about_section)
    {
        $this->about_section = $about_section;
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
            $this->about_section = $this->about_section->orderBy('id', 'DESC')->whereHas('trek_info', function ($trek) {
                $trek->where('user_id', auth()->id());
            })->with('trek_info')->where('title', 'LIKE', "%$search%")->orWhere("description", 'LIKE', "%$search%")->paginate(6);
        } else {
            $this->about_section = $this->about_section->orderBy('id', 'DESC')->whereHas('trek_info', function ($trek) {
                $trek->where('user_id', auth()->id());
            })->with('trek_info')->paginate(6);
        }
        return view('guide.about_section.about_section')->with('about_section_data', $this->about_section)->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->where('user_id', auth()->user()->id)->pluck('trek_name', 'id');
        return view('guide.About_section.about_SectionForm')->with('trek_info', $trek_info);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->about_section->getRules();
        $request->validate($rules);
        $data = $request->except(['_token', 'image']);
        if ($request->has('image')) {
            $photo = $request->image;
            $file_name = uploadImage($photo, 'about_section', '125x125');
            if ($file_name) {
                $data['image'] = $file_name;
            }
        }
        $this->about_section->fill($data);
        $status = $this->about_section->save();
        if ($status) {
            notify()->success('Trek detail added successfully !');
        } else {
            notify()->error('Sorry! There was problem in while adding the details !');
        }

        return redirect()->route('guide.culture.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->about_section = $this->about_section->find($id);
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        if (!$this->about_section) {
            //message
            notify()->error('This trek detail doesnot exists !!');
            return redirect()->route('guide.about.index');
        }
        return view('guide.about_section.about_sectionView')
            ->with('about_section_data', $this->about_section)->with('trek_info', $trek_info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->about_section = $this->about_section->find($id);
        $trek_info = Trek::orderBy('id', 'Desc')->where('status', 'Active')->where('user_id', auth()->user()->id)->pluck('trek_name', 'id');
        if (!$this->about_section) {
            //message
            notify()->error('This trek detail doesnot exists !!');
            return redirect()->route('guide.about.index');
        }
        return view('guide.about_section.about_sectionForm')
            ->with('about_section_data', $this->about_section)->with('trek_info', $trek_info);
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
        $this->about_section = $this->about_section->find($id);
        $trek_info = Trek::orderBy('id', 'Desc')->where('status', 'Active')->pluck('trek_name', 'id');
        if (!$this->about_section) {
            notify()->error('This trek detail doesnot exists !!');
            return redirect()->route('guide.about.index');
        }

        $rules = $this->about_section->getRules();
        $request->validate($rules);
        $data = $request->except(['_token', 'image']);
        if ($request->has('image')) {
            $photo = $request->image;
            $file_name = uploadImage($photo, 'about_section', '125x125');
            if ($file_name) {
                if ($this->about_section->iamge != null && file_exists(public_path() . '/uploads/about_section/' . $this->about_section->image)) {
                    unlink(public_path() . '/uploads/about_section/' . $this->about_section->image);
                    unlink(public_path() . '/uploads/about_section/Thumb-' . $this->about_section->image);
                }
                $data['image'] = $file_name;
            }
        }

        $this->about_section->fill($data);

        $status = $this->about_section->save();
        if ($status) {
            notify()->success('Trek detail updated successfully !');
        } else {
            notify()->error('Sorry! There was problem in updating details !!');
        }

        return redirect()->route('guide.about.index')->with('$trek_info', $trek_info);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->about_section = $this->about_section->find($id);
        if (!$this->about_section) {
            notify()->error('This trek details doesnot exists');
            return redirect()->route('guide.about.index');
        }
        $del = $this->about_section->delete();
        $photo = $this->about_section->image;
        if ($del) {
            if ($photo != null && file_exists(public_path() . '/uploads/about_section/' . $photo)) {
                unlink(public_path() . '/uploads/about_section/' . $photo);
                unlink(public_path() . '/uploads/about_section/Thumb-' . $photo);
                //message
                notify()->error('Sorry! there was problem in deleting detail');
            } else {
                //message
                notify()->success('Trek detail deleted successfully !');
            }

            return redirect()->route('guide.about.index');
        }
    }
}
