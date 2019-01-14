<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Post::where('slider','=','1')->get();
        return view('homepage.index',compact('sliders'));
    }
}
