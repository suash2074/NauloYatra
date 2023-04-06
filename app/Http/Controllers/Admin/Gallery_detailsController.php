<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery_detail;
use Illuminate\Http\Request;

class Gallery_detailsController extends Controller
{

    protected $gallery_detail = null;
    public function __construct(Gallery_detail $gallery_detail)
    {
        $this->gallery_detail = $gallery_detail;
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
            $this->gallery_detail = $this->gallery_detail->orderBy('id', 'DESC')->where('image_caption', 'LIKE', "%$search%")->orWhere("season", 'LIKE', "%$search%")->paginate(6);
        } else {
            $this->gallery_detail = $this->gallery_detail->orderBy('id', 'DESC')->paginate(6);
        }
        return view('admin.galleries.gallery_detail.gallery_detail')->with('gallery_detail_data', $this->gallery_detail)->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galleries.gallery_detail.gallery_detailForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->gallery_detail->getRules();
        $request->validate($rules);
        $data = $request->except(['_token', 'gallery_image']);
        if ($request->has('gallery_image')) {
            $photo = $request->gallery_image;
            $file_name = uploadImage($photo, 'gallery', '125x125');
            if ($file_name) {
                $data['gallery_image'] = $file_name;
            }
        }
        $data['user_id'] = auth()->user()->id;
        $this->gallery_detail->fill($data);
        $status = $this->gallery_detail->save();
        if ($status) {
            notify()->success('Gallery details added successfully !');
        } else {
            notify()->error('Sorry! There was problem while adding gallery details.');
        }

        return redirect()->route('galleryDetail.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->gallery_detail = $this->gallery_detail->find($id);
        if (!$this->gallery_detail) {
            //message
            notify()->error('This gallery detail doesnot exists !!');
            return redirect()->route('galleryDetail.index');
        }
        return view('admin.galleries.gallery_detail.gallery_detailView')
            ->with('gallery_detail_data', $this->gallery_detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->gallery_detail = $this->gallery_detail->find($id);
        if (!$this->gallery_detail) {
            //message
            notify()->error('This gallery detail doesnot exists !!');
            return redirect()->route('galleryDetail.index');
        }
        return view('admin.galleries.gallery_detail.gallery_detailForm')
            ->with('gallery_detail_data', $this->gallery_detail);
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
        $this->gallery_detail = $this->gallery_detail->find($id);
        if (!$this->gallery_detail) {
            notify()->error('This gallery detail doesnot exists !!');
            return redirect()->route('galleryDetail.index');
        }

        $rules = $this->gallery_detail->getRules();
        $request->validate($rules);
        $data = $request->except(['_token', 'gallery_image']);
        if ($request->has('gallery_image')) {
            $photo = $request->gallery_image;
            $file_name = uploadImage($photo, 'gallery', '125x125');
            if ($file_name) {
                if ($this->gallery_detail->gallery_iamge != null && file_exists(public_path() . '/uploads/gallery/' . $this->gallery_detail->gallery_image)) {
                    unlink(public_path() . '/uploads/gallery/' . $this->gallery_detail->gallery_image);
                    unlink(public_path() . '/uploads/gallery/Thumb-' . $this->gallery_detail->gallery_image);
                }
                $data['gallery_image'] = $file_name;
            }
        }

        $this->gallery_detail->fill($data);

        $status = $this->gallery_detail->save();
        if ($status) {
            notify()->success('Gallery details updated successfully !');
        } else {
            notify()->error('Sorry! There was problem in updating details.');
        }

        return redirect()->route('galleryDetail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->gallery_detail = $this->gallery_detail->find($id);
        if (!$this->gallery_detail) {
            notify()->error('This gallery detail doesnot exists !!');
            return redirect()->route('galleryDetail.index');
        }
        $del = $this->gallery_detail->delete();
        $photo = $this->gallery_detail->gallery_image;
        if ($del) {
            if ($photo != null && file_exists(public_path() . '/uploads/gallery/' . $photo)) {
                unlink(public_path() . '/uploads/gallery/' . $photo);
                unlink(public_path() . '/uploads/gallery/Thumb-' . $photo);
                //message
                notify()->success('Gallery details deleted successfully !');
            } else {
                //message
                notify()->error('Sorry! there was problem in deleting data.');
            }

            return redirect()->route('galleryDetail.index');
        }
    }
}
