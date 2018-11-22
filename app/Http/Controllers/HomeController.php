<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(  )
    {
        $name="melih";
        return view('laravel',compact('name'));
    }
}
