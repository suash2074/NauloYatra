<?php

namespace App\Http\Controllers;

use App\Models\About_section;
use App\Models\Comment;
use App\Models\Culture;
use App\Models\Gallery;
use App\Models\Health_kit;
use App\Models\Map;
use App\Models\Trek;
use Illuminate\Http\Request;

class BlogContentController extends Controller
{
    protected $comment = null;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function index($id)
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

    public function postComment(Request $request){
        $rules = $this->comment->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);
        $data['user_id'] = auth()->user()->id;
        $this->comment->fill($data);
        $status = $this->comment->save();
        if($status){
            notify()->success('Comment posted successfully !');
        }else{
            notify()->error('Sorry! There was problem while adding comment.');
        }

        return redirect()->back();
    }
    
}
