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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws AuthorizationExceptionAlias
     */
    public function create()
    {
        $this->authorize('posts.create');
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
        $post->user_id = Auth::user()->id;
        $post->fill($validated);
        $post->slug = str_slug($request->title);
        $this->imageValidate($post,'image');
        $post->save();
        alert()->success('Başarılı', 'içerik kaydedildi')->autoClose('2000');
        return back();
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id)
    {
        $this->authorize('posts.update');
        $post = Post::find($id);
        $categories = Category::where('id','!=',$post->category_id)->get();
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws AuthorizationExceptionAlias
     */
    public function destroy($id)
    {
        $this->authorize('posts.delete');
        Post::destroy($id);
        alert()->success('Başarılı', 'içerik silindi')->autoClose('2000');
        return redirect()->route('yazilar.index');
    }

    /**
     * @param PostRequest $request
     * @param $id
     *
     * @return update post
     */
    public function update(PostRequest $request, $id)
    {
        $validated = $request->validated();
        $post = Post::find($id);
        $user = $post->user_id;
        $post->user_id = $user;
        $post->fill($validated);
        $post->slug = str_slug($request->title);
        $this->imageValidate($post,'image');
        $post->save();
        alert()->success('Başarılı', 'içerik güncellendi')->autoClose('2000');
        return redirect()->route('yazilar.index');
    }
}
