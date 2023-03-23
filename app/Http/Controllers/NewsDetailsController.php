<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\News_details;
use Illuminate\Http\Request;

class NewsDetailsController extends Controller
{
    public function index($id)
    {
        $news_info = News::where('id', $id)->orderBy('id', 'DESC')->where('status', 'Active')->with('user_info')->get();
        $news_details_info = News_details::where('news_id', $id)->orderBy('id', 'DESC')->where('status', 'Active')->get();
        return view('front/news/news_details')->with([
            'news_info' => $news_info,
            'news_details_info' => $news_details_info
        ]);
    }
}
