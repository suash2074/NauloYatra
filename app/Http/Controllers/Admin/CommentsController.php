<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Trek;
use App\Models\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    protected $comment = null;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != ""){
            $this->comment = $this->comment->orderBy('id', 'DESC')->with('trek_info')->with('user_info')->where('text', 'LIKE', "%$search%")->paginate(6);
        }else{
            $this->comment = $this->comment->orderBy('id', 'DESC')->with('trek_info')->with('user_info')->paginate(6);
        }
        return view('admin.comment.comment')->with('comment_data', $this->comment)->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        $user_info = User::orderBy('id', 'DESC')->where('status', 'Active')->pluck('username', 'id');
        return view('admin.comment.commentForm')->with([
            'trek_info' => $trek_info,
            'user_info' => $user_info
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
        $rules = $this->comment->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);
        $this->comment->fill($data);
        $status = $this->comment->save();
        if($status){
            notify()->success('Comment added successfully !');
        }else{
            notify()->error('Sorry! There was problem while adding comment.');
        }

        return redirect()->route('comment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->comment = $this->comment->find($id);
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        $user_info = User::orderBy('id', 'DESC')->where('status', 'Active')->pluck('username', 'id');
        if (!$this->comment) {
            //message
            notify()->error('This comment doesnot exists !!');
            return redirect()->route('comment.index');
        }
        return view('admin.comment.commentView')->with('comment_data', $this->comment)->with([
            'trek_info' => $trek_info,
            'user_info' => $user_info
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
        $this->comment = $this->comment->find($id);
        $trek_info = Trek::orderBy('id', 'DESC')->where('status', 'Active')->pluck('trek_name', 'id');
        $user_info = User::orderBy('id', 'DESC')->where('status', 'Active')->pluck('username', 'id');
        if (!$this->comment) {
            //message
            notify()->error('This comment doesnot exists !!');
            return redirect()->route('comment.index');
        }
        return view('admin.comment.commentForm')->with('comment_data', $this->comment)->with([
            'trek_info' => $trek_info,
            'user_info' => $user_info
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
        $this->comment = $this->comment->find($id);
        $trek_info = Trek::orderBy('id', 'Desc')->where('status', 'Active')->pluck('trek_name', 'id');
        $user_info = User::orderBy('id', 'DESC')->where('status', 'Active')->pluck('username', 'id');

        if (!$this->comment) {
            notify()->error('This comment doesnot exists !!');
            return redirect()->route('comment.index');
        }

        $rules = $this->comment->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);
        $this->comment->fill($data);

        $status = $this->comment->save();
        if($status){
            notify()->success('Comment updated successfully !');
        }else{
            notify()->error('Sorry! There was problem in updating comment.');
        }

        return redirect()->route('comment.index')->with([
            'trek_info' => $trek_info,
            'user_info' => $user_info
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
        $this->comment = $this->comment->find($id);
        if (!$this->comment) {
            notify()->error('This comment doesnot exists !!');
            return redirect()->route('comment.index');
        }
        $del = $this->comment->delete();
        if ($del) {
            //message
            notify()->success('Comment deleted successfully !');
        } else {
            //message
            notify()->error('Sorry! there was problem in deleting data.');
        }

        return redirect()->route('comment.index');
    }
}
