<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Post::whereSlider(1)->get();
        $posts = Post::whereCategory_id(6)->take(4)->skip(1)->get();
        $singlePost = Post::whereCategory_id(6)->first();
        $newPosts = Post::latest()->take(5)->get();
        $comments = Comment::whereStatus('1')->take(5)->get();
        return view('homepage.index',compact('sliders','posts','singlePost','newPosts','comments'));
    }

    public function postDetail($id)
    {
        $post = Post::find($id);
        $similars = Post::where('id','!=', $id)->take(3)->get();
        $comments = Comment::whereStatus('1')->wherePost_id($id)->get();
        $mostComments = Post::withCount('comments')->orderBy('comments_count','desc')->take(5)->get();
        $recentComments= Comment::whereStatus('1')->orderBy('created_at','desc')->take(5)->get();
        return view('homepage.detail',compact('post','similars','comments','mostComments','recentComments'));
    }

    public function sendComment(request $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->comment = request('comment');
        $comment->post_id = request('post');
        $comment->status = '0';
        $comment->save();
        alert()->success('Teşekkürler', 'Yorumunuz Onay Bekliyor')->autoClose('3000');
        return back();
    }
}
