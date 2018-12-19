<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create',compact('categories')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = new Post();
        $post->title = request('title');
        $post->content = request('content');
        $post->user_id = 1;
        $post->category_id = request('up_id');

        if ($request->hasFile('image'))
        {
            $this->validate( request(), [ 'image' => 'image|mimes:png,jpg,jpeg,gif|max:2048' ]);
            $image = $request->image;
            $file_name = 'image-' . time() . '.' . $image->extension();

            if ($image->isValid())
            {
                $target_directory = 'uploads/files';
                $file_path = $target_directory . '/' .$file_name;
                $image->move($target_directory , $file_name);
                $post->image = $file_path;
            }
            if (!$post->save())
            {
                alert()->error('Hata','işlem başarısız')->autoClose('2000');
                return back();
            }
            alert()->success('Başarılı', 'içerik kaydedildi')->autoClose('2000');return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
