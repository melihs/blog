<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BlogPost;

class PostController extends Controller
{
    /**
     *
     * @return view posts list
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the post create form
     *
     * @return  admin.post.create
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create',compact('categories')) ;
    }

    /**
     * @param BlogPost $request
     *
     * @return RedirectResponse alert
     */
    public function store(BlogPost $request)
    {
        $validated = $request->validated();
        $post =new Post();
        $post->user_id = 1;
        $post->fill($validated);

        $image_valid = new  SettingController();
        $image_valid->logo($post,'image');
        $post->save();
        alert()->success('Başarılı', 'içerik kaydedildi')->autoClose('2000');
        return back();
    }


    /**
     * Show the post edit page
     *
     * @param   $post
     * @return admin.post.edit
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::where('id','!=',$post->category_id)->get();
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPost $request, $id)
    {
        $validated = $request->validated();
        $post = Post::find($id);
        $post->fill($validated);

        $image_valid = new  SettingController();
        $image_valid->logo($post,'image');
        $post->save();
        alert()->success('Başarılı', 'içerik güncellendi')->autoClose('2000');
        return redirect()->route('yazilar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        alert()->success('Başarılı', 'içerik silindi')->autoClose('2000');
        return redirect()->route('yazilar.index');
    }
}
