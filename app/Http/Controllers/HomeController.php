<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Post::where('slider','=',1)->get();
        $posts = Post::where('category_id',6)->take(4)->skip(1)->get();
        $singlePost = Post::where('category_id',6)->first();
        $newPosts = Post::latest()->take(5)->get();
        $comments = Comment::whereStatus('1')->take(5)->get();
        return view('homepage.index',compact('sliders','posts','singlePost','newPosts','comments'));
    }

    public function postDetail($id)
    {
        $post = Post::find($id);
        $similars = Post::where('id','!=', $id)->take(3)->get();
        return view('homepage.detail',compact('post','similars'));
    }
}
