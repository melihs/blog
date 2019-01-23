<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Post::where('slider','=',1)->get();
        $posts = Post::where('category_id',5)->take(4)->skip(1)->get();
        $single_post = Post::where('category_id',5)->first();
        return view('homepage.index',compact('sliders','posts','single_post'));
    }
}
