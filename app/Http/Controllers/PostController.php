<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create',compact('categories')) ;
    }

    /**
     * @param PostRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(PostRequest $request)
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
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::where('id','!=',$post->category_id)->get();
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * @param PostRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(PostRequest $request, $id)
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
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy($id)
    {
        Post::destroy($id);
        alert()->success('Başarılı', 'içerik silindi')->autoClose('2000');
        return redirect()->route('yazilar.index');
    }
}
