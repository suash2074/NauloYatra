<?php

namespace App\Http\Controllers;

use App\Models\About_section;
use App\Models\Comment;
use App\Models\Culture;
use App\Models\Gallery;
use App\Models\Health_kit;
use App\Models\Map;
use App\Models\News;
use App\Models\News_details;
use App\Models\Trek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $comment = null;
    public function __construct(Comment $comment)
    {
        $this->middleware('auth');
        $this->comment = $comment;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth()->user()->role == 'guide') {
            return redirect()->route(request()->user()->role . '.' . request()->user()->role);
        } else {
            return redirect()->route(request()->user()->role);
        }
    }

    public function admin()
    {
        return redirect()->route('adminHome');
    }

    public function adminBlog()
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $trek_info = Trek::inRandomOrder()->orderBy('id', 'DESC')->where('status', 'Active')->with('user_info')->Where("trek_name", 'LIKE', "%$search%")->get();
        } else {
            $trek_info = Trek::inRandomOrder()->where('status', 'Active')->with('user_info')->get();
        }
        // dd($trek_info);
        $about_info = About_section::where('status', 'Active')->with('trek_info')->get();
        return view('front/Blog/blog')->with([
            'trek_info' => $trek_info,
            'about_info' => $about_info
        ])->with('search', $search);
    }

    public function adminBlogContent($id)
    {
        $trek_info = Trek::where('id', $id)->orderBy('id', 'DESC')->where('status', 'Active')->with('user_info')->get();
        $about_info = About_section::where('trek_id', $id)->orderBy('id', 'ASC')->where('status', 'Active')->get();
        $culture_info = Culture::where('trek_id', $id)->orderBy('id', 'DESC')->where('status', 'Active')->get();
        $health_kit_info = Health_kit::where('trek_id', $id)->orderBy('id', 'DESC')->where('status', 'Active')->with('medicine_info')->get();
        $map_infos = Map::where('trek_id', $id)->orderBy('id', 'DESC')->where('status', 'Active')->with('trek_info')->get();
        $gallery_infos = Gallery::inRandomOrder()->where('trek_id', $id)->where('status', 'Active')->with('trek_info')->with('gallery_info')->limit(3)->get();
        $comment_infos = Comment::where('trek_id', $id)->orderBy('id', 'DESC')->with('trek_info')->with('user_info')->get();
        return view('front/Blog/blog_content')->with([
            'trek_info' => $trek_info,
            'about_info' => $about_info,
            'culture_info' => $culture_info,
            'health_kit_info' => $health_kit_info,
            'gallery_infos' => $gallery_infos,
            'map_infos' => $map_infos,
            'comment_infos' => $comment_infos
        ]);
    }

    public function adminBlogGallery($id)
    {
        $trek_infos = Trek::where('id', $id)->orderBy('id', 'DESC')->where('status', 'Active')->get();
        $gallery_infos = Gallery::where('trek_id', $id)->orderBy('id', 'DESC')->where('status', 'Active')->with('trek_info')->with('gallery_info')->get();
        return view('front/gallery/gallery')->with([
            'gallery_infos' => $gallery_infos,
            'trek_infos' => $trek_infos
        ]);
    }


    public function adminBlogPostComment(Request $request)
    {
        $rules = $this->comment->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);
        $data['user_id'] = auth()->user()->id;
        $this->comment->fill($data);
        $status = $this->comment->save();
        if ($status) {
            notify()->success('Comment added successfully !');
        } else {
            notify()->error('Sorry! There was problem while adding comment.');
        }

        return redirect()->back();
    }

    public function user()
    {
        $news_info = News::inRandomOrder()->where('status', 'Active')->get();
        $news_details_info = News_details::orderBy('id', 'DESC')->where('status', 'Active')->get();

        return view('front/Home/home')->with([
            'news_info' => $news_info,
            'news_details_info' => $news_details_info
        ]);
    }

    public function about_us()
    {
        return view('front/about_us/about_us');
    }

    public function guide()
    {
        return redirect()->route('guide.guideHome');
    }
}
