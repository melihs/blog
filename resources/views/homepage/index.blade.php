@extends('homepage.template')
@section('content')
    <section id="page-content" class="page-wrapper">
        <!-- Start Popular News [layout A+D]  -->
        <div class="zm-section bg-white ptb-70">
            <div class="container">
                <div class="row mb-40">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                        <div class="section-title">
                            <h2 class="h6 header-color inline-block uppercase">Popüler Haberler</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12 col-lg-6">
                        <div class="zm-posts">
                            <article class="zm-post-lay-a">
                                <div class="zm-post-thumb">
                                    <a href="/yazi/{{ $singlePost->id }}/{{ $singlePost->slug }}"><img src="/{{ $singlePost->image }}" alt="img" height="400"></a>
                                </div>
                                <div class="zm-post-dis">
                                    <div class="zm-post-header">
                                        <div class="zm-category"><a href="/kategori/{{ $singlePost->category->id }}/{{ $singlePost->category->slug }}" class="bg-cat-1 cat-btn">{{ $singlePost->category->title }}</a></div>
                                        <h2 class="zm-post-title h2"><a href="/yazi/{{ $singlePost->id }}/{{ $singlePost->slug }}">{{ $singlePost->title }}</a></h2>
                                        <div class="zm-post-meta">
                                            <ul>
                                                <li class="s-meta zm-author">{{ $singlePost->user->name }}</li>
                                                <li class="s-meta zm-date">{{ date_format($singlePost->created_at,'d m Y')}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="zm-post-content">
                                        <p>{{str_limit(strip_tags($singlePost->content),$limit = 150,$end = "...") }}</p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12 col-lg-6">
                        <div class="zm-posts">
                            <!-- Start single post layout D -->
                            @foreach( $posts as $post)
                                <article class="zm-post-lay-d clearfix">
                                    <div class="zm-post-thumb f-left">
                                        <a href="/yazi/{{ $post->id }}/{{ $post->slug }}"><img src="/{{ $post->image }}" alt="img" height="150"></a>
                                    </div>
                                    <div class="zm-post-dis f-right">
                                        <div class="zm-post-header">
                                            <div class="zm-category"><a href="/kategori/{{ $post->category->id }}/{{ $post->category->slug }}" class="bg-cat-2 cat-btn">{{ $post->category->title }}</a></div>
                                            <h2 class="zm-post-title"><a href="/yazi/{{ $post->id }}/{{ $post->slug }}">{{ $post->title }}</a></h2>
                                            <div class="zm-post-meta">
                                                <ul>
                                                    <li class="s-meta zm-author">{{ $post->user->name }}</li>
                                                    <li class="s-meta zm-date">{{ date_format($post->created_at,'d m Y') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                            <!-- End single post layout D -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Popular News [layout A+D]  -->
        <div class="zm-section bg-white pt-20 pb-40">
            <div class="container">
                <div class="row">
                    <!-- Start left side -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 columns">
                        <div class="row mb-40">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="section-title">
                                    <h2 class="h6 header-color inline-block uppercase">Yeni Haberler</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="zm-posts">

                                    @foreach($newPosts as $newPost)
                                        <article class="zm-post-lay-c zm-single-post clearfix">
                                            <div class="zm-post-thumb f-left"><a href="/yazi/{{ $newPost->id }}/{{ $newPost->slug}}"><img src="{{ $newPost->image }}" alt="img" height="200"></a></div>
                                            <div class="zm-post-dis f-right">
                                                <div class="zm-post-header">
                                                    <div class="zm-category"><a href="/kategori/{{ $newPost->category->id }}/{{ $newPost->category->slug }}" class="bg-cat-1 cat-btn">{{ $newPost->category->title }}</a></div>
                                                    <h2 class="zm-post-title"><a href="/yazi/{{ $newPost->id }}/{{ $newPost->slug }}">{{ $newPost->title }}</a></h2>
                                                    <div class="zm-post-meta">
                                                        <ul>
                                                            <li class="s-meta zm-author">{{ $newPost->user->name }}</li>
                                                            <li class="s-meta zm-date">{{ date_format($newPost->created_at,'d m Y') }}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="zm-post-content"><p>{{str_limit(strip_tags($newPost->content),$limit = 150,$end = "...") }}</p></div>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End left side -->
                    <!-- Start Right sidebar -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 sidebar-warp columns">
                        <div class="row">
                            <!-- Start post layout E -->
                            <aside class="zm-post-lay-e-area col-xs-12 col-sm-6 col-md-6 col-lg-12 mt-60 hidden-md">
                                <div class="row mb-40">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="section-title">
                                            <h2 class="h6 header-color inline-block uppercase">En Fazla Yorum Alanlar</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="zm-posts">

                                            @foreach($comments as $comment)
                                                <article class="zm-post-lay-e zm-single-post clearfix">
                                                    <div class="zm-post-thumb f-left">
                                                        <a href="/yazi/{{ $comment->post->id }}/{{ $comment->post->slug}}"><img src="{{ $comment->post->image }}" alt="img" height="80"></a>
                                                    </div>
                                                    <div class="zm-post-dis f-right">
                                                        <div class="zm-post-header">
                                                            <h2 class="zm-post-title"><a href="/yazi/{{ $comment->post->id }}/{{ $comment->post->slug }}">{{ $comment->post->title }}</a></h2>
                                                            <div class="zm-post-meta">
                                                                <ul>
                                                                    <li class="s-meta zm-author">{{ $comment->user->name }}</li>
                                                                    <li class="s-meta zm-date">{{ date_format($comment->created_at,'d m Y') }}</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </aside>
                            <!-- Start post layout E -->
                        </div>
                    </div>
                    <!-- End Right sidebar -->
                </div>
                <!-- Start Advertisement -->
                <div class="advertisement">
                    <div class="row mt-40">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <a href="#"><img src="homepage/images/ad/2.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
