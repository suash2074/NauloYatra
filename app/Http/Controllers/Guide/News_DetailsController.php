<?php

namespace App\Http\Controllers\Guide;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\News_details;
use Illuminate\Http\Request;

class News_DetailsController extends Controller
{
    protected $news_detail = null;
    public function __construct(News_details $news_detail)
    {
        $this->news_detail = $news_detail;
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
            $this->news_detail = $this->news_detail->orderBy('id', 'DESC')->with('news_info')->with('news_info')->whereHas('news_info', function ($news) {
                $news->where('user_id', auth()->id());
            })->where('sub_headline', 'LIKE', "%$search%")->orwhere('description', 'LIKE', "%$search%")->paginate(6);
        } else {
            $this->news_detail = $this->news_detail->orderBy('id', 'DESC')->with('news_info')->whereHas('news_info', function ($news) {
                $news->where('user_id', auth()->id());
            })->paginate(6);
        }
        return view('guide.newsSection.news_detail.news_detail')->with('news_detail_data', $this->news_detail)->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news_info = News::orderBy('id', 'DESC')->where('status', 'Active')->pluck('headline', 'id');
        return view('guide.newsSection.news_detail.news_detailForm')->with('news_info', $news_info);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->news_detail->getRules();
        $request->validate($rules);
        $data = $request->except(['_token', 'image']);
        if ($request->has('image')) {
            $photo = $request->image;
            $file_name = uploadImage($photo, 'news_detail', '125x125');
            if ($file_name) {
                $data['image'] = $file_name;
            }
        }
        $this->news_detail->fill($data);
        $status = $this->news_detail->save();
        if ($status) {
            notify()->success('News details added successfully !');
        } else {
            notify()->error('Sorry! There was problem while adding news details.');
        }

        return redirect()->route('guide.newsDetail.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->news_detail = $this->news_detail->find($id);
        $news_info = News::orderBy('id', 'DESC')->where('status', 'Active')->pluck('headline', 'id');
        if (!$this->news_detail) {
            //message
            notify()->error('This news detail doesnot exists !!');
            return redirect()->route('guide.newsDetail.index');
        }
        return view('guide.newsSection.news_detail.news_detailView')
            ->with('news_detail_data', $this->news_detail)->with('news_info', $news_info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->news_detail = $this->news_detail->find($id);
        $news_info = News::orderBy('id', 'DESC')->where('status', 'Active')->pluck('headline', 'id');
        if (!$this->news_detail) {
            //message
            notify()->error('This news detail doesnot exists !!');
            return redirect()->route('guide.newsDetail.index');
        }
        return view('guide.newsSection.news_detail.news_detailForm')
            ->with('news_detail_data', $this->news_detail)->with('news_info', $news_info);
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
        $this->news_detail = $this->news_detail->find($id);
        $news_info = News::orderBy('id', 'Desc')->where('status', 'Active')->pluck('headline', 'id');
        if (!$this->news_detail) {
            notify()->error('This news detils doesnot exists !!');
            return redirect()->route('guide.newsDetail.index');
        }

        $rules = $this->news_detail->getRules();
        $request->validate($rules);
        $data = $request->except(['_token', 'image']);
        if ($request->has('image')) {
            $photo = $request->image;
            $file_name = uploadImage($photo, 'news_detail', '125x125');
            if ($file_name) {
                if ($this->news_detail->iamge != null && file_exists(public_path() . '/uploads/news_detail/' . $this->news_detail->image)) {
                    unlink(public_path() . '/uploads/news_detail/' . $this->news_detail->image);
                    unlink(public_path() . '/uploads/news_detail/Thumb-' . $this->news_detail->image);
                }
                $data['image'] = $file_name;
            }
        }

        $this->news_detail->fill($data);

        $status = $this->news_detail->save();
        if ($status) {
            notify()->success('News detail updated successfully !');
        } else {
            notify()->error('Sorry! There was problem in updating news detail.');
        }

        return redirect()->route('guide.newsDetail.index')->with('$news_info', $news_info);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->news_detail = $this->news_detail->find($id);
        if (!$this->news_detail) {
            notify()->error('This news detail doesnot exists !!');
            return redirect()->route('guide.newsDetail.index');
        }
        $del = $this->news_detail->delete();
        $photo = $this->news_detail->image;
        if ($del) {
            if ($photo != null && file_exists(public_path() . '/uploads/news_detail/' . $photo)) {
                unlink(public_path() . '/uploads/news_detail/' . $photo);
                unlink(public_path() . '/uploads/news_detail/Thumb-' . $photo);
                //message
                notify()->success('News detail deleted successfully !');
            } else {
                //message
                notify()->error('Sorry! there was problem in deleting data.');
            }

            return redirect()->route('guide.newsDetail.index');
        }
    }
}
