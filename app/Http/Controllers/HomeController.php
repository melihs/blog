<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Category;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Newsletter;

class HomeController extends Controller
{
    /**
     * @param Post $post
     * @param Comment $comment
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Post $post, Comment $comment)
    {
        $sliders = $post->getSlider();
        $posts = $post->getCategoryRelated();
        $singlePost = $post->getSingle();
        $newPosts = $post->getNew();
        $comments = $comment->getConfirm();
        $populers = $this->sortPopuler();
        return view('homepage.index',compact('sliders','posts','singlePost','newPosts','comments','populers'));
    }

    /**
     * @param Counter $counter
     * @param Post $post
     * @param Comment $comment
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function post(Post $post,Comment $comment, $id)
    {
        $post = Post::find($id);
        $similars = $post->getSimilars($id);
        $comments = $comment->getPostRelated($id);
        views($post)->record();
        $viewCount = $this->getViews($post);
        list($recentComments,$mostComments) = $this->comments();
        return view('homepage.post',compact('post','similars','comments','mostComments','recentComments','viewCount'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * @param Post $post
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(Post $post,$id)
    {
        $category = Category::find($id);
        $posts = $post->postPaginate($id);
        list($recentComments,$mostComments) = $this->comments();
        return view('homepage.category',compact('category','posts','mostComments','recentComments'));
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function page($id)
    {
        $page = Page::find($id);
        list($recentComments,$mostComments) = $this->comments();
        return view('homepage.page', compact('page','mostComments','recentComments'));
    }

    /**
     * @param Post $post
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function search(Post $post,Request $request)
    {
        $word = request('word');
        if(empty($word))
        {
            alert()->warning('Uyarı', 'lütfen arama yapmak için kelime girin')->autoClose('3000');
            return back();
        }
        $results = $post->scopeSearch($word);
        list($recentComments,$mostComments) = $this->comments();
        return view('homepage.search',['results' => $results,'mostComments' => $mostComments,'recentComments' => $recentComments,'word' => $word]);

    }

    /**
     * @return array
     */
    public function comments()
    {
       $post = new Post();
       $comment = new Comment();
       $recentComments = $comment->getRecent();
       $mostComments = $post->getMost();
       return [ $recentComments,$mostComments ];
    }

    /**
     * @param $object
     *
     * @return mixed
     */
    public function getViews($object)
    {
        return views($object)->unique()->count();
    }

    /**
     * @return mixed
     */
    public function sortPopuler()
    {
        $all = Post::take(5)->get();
        $populers = $all->sortByDesc(function ($all) {
            return views($all)->unique()->count();
        });
        return $populers;
    }

    public function subscribe(Request $request)
    {
       $isSubscribe = Newsletter::isSubscribed($request->email);
        if($isSubscribe)
        {
            alert()->error('Hata', 'E-posta adresiniz zaten kayıtlı')->autoClose('2000');
            return back();
        }else
        {
          $subscribe = Newsletter::subscribe($request->email);
          if($subscribe)
          {
              alert()->success('Teşekkürler', 'E-posta adresiniz kaydedildi')->autoClose('2000');
              return back();
          }
        }
    }
}
