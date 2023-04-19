<?php

namespace App\Http\Controllers\Guide;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    protected $news = null;
    public function __construct(News $news)
    {
        $this->news = $news;
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
            $this->news = $this->news->orderBy('id', 'DESC')->with('user_info')->where('user_id', Auth()->user()->id)->where('headline', 'LIKE', "%$search%")->orwhere('short_description', 'LIKE', "%$search%")->paginate(6);
        } else {
            $this->news = $this->news->orderBy('id', 'DESC')->with('user_info')->where('user_id', Auth()->user()->id)->paginate(6);
        }
        return view('guide.NewsSection.News.news')->with('news_data', $this->news)->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_info = User::orderBy('id', 'DESC')->where('status', 'Active')->pluck('username', 'id');
        return view('guide.newsSection.news.newsForm')->with('user_info', $user_info);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->news->getRules();
        $request->validate($rules);
        $data = $request->except(['_token', 'image']);
        if ($request->has('image')) {
            $photo = $request->image;
            $file_name = uploadImage($photo, 'news', '125x125');
            if ($file_name) {
                $data['image'] = $file_name;
            }
        }

        $data['user_id'] = auth()->user()->id;
        $this->news->fill($data);
        $status = $this->news->save();
        if ($status) {
            notify()->success('News added successfully !');
        } else {
            notify()->error('Sorry! There was problem while adding news.');
        }

        return redirect()->route('guide.news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->news = $this->news->find($id);
        $user_info = User::orderBy('id', 'DESC')->where('status', 'Active')->pluck('username', 'id');
        if (!$this->news) {
            //message
            notify()->error('This news doesnot exists !!');
            return redirect()->route('guide.news.index');
        }
        return view('guide.newsSection.news.newsView')
            ->with('news_data', $this->news)->with('user_info', $user_info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->news = $this->news->find($id);
        $user_info = User::orderBy('id', 'DESC')->where('status', 'Active')->pluck('username', 'id');
        if (!$this->news) {
            //message
            notify()->error('This news doesnot exists !!');
            return redirect()->route('guide.news.index');
        }
        return view('guide.newsSection.news.newsForm')
            ->with('news_data', $this->news)->with('user_info', $user_info);
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
        $this->news = $this->news->find($id);
        $user_info = User::orderBy('id', 'Desc')->where('status', 'Active')->pluck('username', 'id');
        if (!$this->news) {
            notify()->error('This news doesnot exists !!');
            return redirect()->route('guide.news.index');
        }

        $rules = $this->news->getRules();
        $request->validate($rules);
        $data = $request->except(['_token', 'image']);
        if ($request->has('image')) {
            $photo = $request->image;
            $file_name = uploadImage($photo, 'news', '125x125');
            if ($file_name) {
                if ($this->news->iamge != null && file_exists(public_path() . '/uploads/news/' . $this->news->image)) {
                    unlink(public_path() . '/uploads/news/' . $this->news->image);
                    unlink(public_path() . '/uploads/news/Thumb-' . $this->news->image);
                }
                $data['image'] = $file_name;
            }
        }

        $this->news->fill($data);

        $status = $this->news->save();
        if ($status) {
            notify()->success('News updated successfully !');
        } else {
            notify()->error('Sorry! There was problem in updating news.');
        }

        return redirect()->route('guide.news.index')->with('$user_info', $user_info);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->news = $this->news->find($id);
        if (!$this->news) {
            notify()->error('This news doesnot exists !!');
            return redirect()->route('guide.news.index');
        }
        $del = $this->news->delete();
        $photo = $this->news->image;
        if ($del) {
            if ($photo != null && file_exists(public_path() . '/uploads/news/' . $photo)) {
                unlink(public_path() . '/uploads/news/' . $photo);
                unlink(public_path() . '/uploads/news/Thumb-' . $photo);
                //message
                notify()->success('News deleted successfully !');
            } else {
                //message
                notify()->error('Sorry! there was problem in deleting data.');
            }

            return redirect()->route('guide.news.index');
        }
    }
}
