<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Traits\ImageValidation;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use ImageValidation;

    /**
     * @return posts list page
     */

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * @return create post
     */

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create',compact('categories')) ;
    }

    /**
     * @param PostRequest $request
     * @return  save post
     */

    public function store(PostRequest $request)
    {
        $validated = $request->validated();
        $post =new Post();
        $post->user_id = Auth::user()->id;
        $post->fill($validated);
        $this->imageValidate($post,'image');
        $post->save();
        alert()->success('Başarılı', 'içerik kaydedildi')->autoClose('2000');
        return back();
    }

    /**
     * @param $id
     * @return edit post
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
     * @return update post
     */

    public function update(PostRequest $request, $id)
    {
        $validated = $request->validated();
        $post = Post::find($id);
        $user = $post->user_id;
        $post->user_id = $user ;
        $post->fill($validated);
        $this->imageValidate($post,'image');
        $post->save();
        alert()->success('Başarılı', 'içerik güncellendi')->autoClose('2000');
        return redirect()->route('yazilar.index');
    }

    /**
     * @param $id
     * @return delete post
     */

    public function destroy($id)
    {
        Post::destroy($id);
        alert()->success('Başarılı', 'içerik silindi')->autoClose('2000');
        return redirect()->route('yazilar.index');
    }
}
