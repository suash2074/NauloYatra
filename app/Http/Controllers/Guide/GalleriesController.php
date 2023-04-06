<?php

namespace App\Http\Controllers\Guide;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Gallery_detail;
use App\Models\Trek;
use Illuminate\Http\Request;

class GalleriesController extends Controller
{
    protected $gallery = null;
    public function __construct(Gallery $gallery)
    {
        $this->gallery = $gallery;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->gallery = $this->gallery->orderBy('id', 'DESC')->with('trek_info')->with('gallery_info')->whereHas('gallery_info', function ($gallery) {
            $gallery->where('user_id', auth()->id());
        })->paginate(6);
        return view('guide.galleries.galleries.galleries')->with('gallery_data', $this->gallery);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        $gallery_info = Gallery_detail::orderBy('id', 'DESC')->where('status', 'Active')->where('user_id', auth()->user()->id)->pluck('image_caption', 'id');
        return view('guide.galleries.galleries.galleriesForm')->with([
            'trek_info' => $trek_info,
            'gallery_info' => $gallery_info
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
        $rules = $this->gallery->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);
        $this->gallery->fill($data);
        $status = $this->gallery->save();
        if ($status) {
            notify()->success('Gallery added successfully !');
        } else {
            notify()->error('Sorry! There was problem while adding gallery.');
        }

        return redirect()->route('guide.gallery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->gallery = $this->gallery->find($id);
        $gallery_info = Gallery_detail::orderBy('id', 'DESC')->where('status', 'Active')->where('user_id', auth()->user()->id)->pluck('image_caption', 'id');
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        if (!$this->gallery) {
            //message
            notify()->error('This gallery doesnot exists !!');
            return redirect()->route('guide.healthKit.index');
        }
        return view('guide.galleries.galleries.galleriesView')->with('gallery_data', $this->gallery)->with([
            'trek_info' => $trek_info,
            'gallery_info' => $gallery_info
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
        $this->gallery = $this->gallery->find($id);
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        $gallery_info = Gallery_detail::orderBy('id', 'DESC')->where('status', 'Active')->where('user_id', auth()->user()->id)->pluck('image_caption', 'id');
        if (!$this->gallery) {
            //message
            notify()->error('This gallery doesnot exists !!');
            return redirect()->route('guide.healthKit.index');
        }
        return view('guide.galleries.galleries.galleriesForm')->with('gallery_data', $this->gallery)->with([
            'trek_info' => $trek_info,
            'gallery_info' => $gallery_info
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
        $this->gallery = $this->gallery->find($id);
        $trek_info = Trek::orderBy('id', 'Desc')->where('status', 'Active')->pluck('trek_name', 'id');
        $gallery_info = Gallery_detail::orderBy('id', 'DESC')->where('status', 'Active')->pluck('image_caption', 'id');

        if (!$this->gallery) {
            notify()->error('This gallery doesnot exists !!');
            return redirect()->route('guide.gallery.index');
        }

        $rules = $this->gallery->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);
        $this->gallery->fill($data);

        $status = $this->gallery->save();
        if ($status) {
            notify()->success('Gallery updated successfully !');
        } else {
            notify()->error('Sorry! There was problem in updating gallery.');
        }

        return redirect()->route('guide.gallery.index')->with([
            'trek_info' => $trek_info,
            'gallery_info' => $gallery_info
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

        $this->gallery = $this->gallery->find($id);
        if (!$this->gallery) {
            notify()->error('This gallery doesnot exists !!');
            return redirect()->route('guide.gallery.index');
        }
        $del = $this->gallery->delete();
        if ($del) {
            //message
            notify()->success('Gallery deleted successfully !');
        } else {
            //message
            notify()->error('Sorry! there was problem in deleting data.');
        }

        return redirect()->route('guide.gallery.index');
    }
}
