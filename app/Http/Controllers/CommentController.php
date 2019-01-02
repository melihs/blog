<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @return comments index page
     */
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index',compact('comments'));
    }

    /**
     * confirm comments
     * @param $id
     * @return admin.content.index view
     */
    public function confirm($id)
    {
        return $this->status($id,'1');
    }

    /**
     * Don't confirm comments
     * @param $id
     * @return admin.content.index view
     */
    public function dontConfirm($id)
    {
        return $this->status($id,'0');
    }

    /**
     * @param $id
     * @param $value
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function status($id,$value)
    {
        $comment = Comment::find($id);
        $comment->status = $value;
        $comment->save();
        alert()->success('Başarılı','Durum güncellendi')->autoClose('2000');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('admin.comments.edit',compact('comment'));
    }

    /**
     * @param CommentRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CommentRequest $request,$id)
    {
        $validated = $request->validated();
        Comment::find($id)->update($validated);
        alert()->success('Başarılı', 'Yorum güncellendi')->autoClose('2000');
        return back();
    }

    /** commnets remove
     * @param $id
     * @return  admin/comments/index.blade.php
     */
    public function destroy($id)
    {
        Comment::destroy($id);
        alert()->success('Başarılı', 'Yorum silindi')->autoClose('2000');
        return redirect()->route('yorumlar.index');
    }
}
