@extends('homepage.template')
@section('content')
    <section id="page-content" class="page-wrapper">
        <div class="zm-section bg-white pt-30 xs-pt-30 pb-40">
            <div class="container">
                <div class="row">
                    <!-- Start left side -->
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 columns">
                        <div class="row mb-40">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="section-title">
                                    <h2 class="h6 header-color inline-block uppercase">{{ $category->title }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="zm-posts clearfix">
                                <!-- Start single post layout A1 -->
                                @foreach($posts as $post)
                                    <div class="col-md-12">
                                    <article class="zm-post-lay-a">
                                        <div class="zm-post-thumb">
                                            <a href="/yazi/{{ $post->id }}/{{ $post->slug }}"><img src="/{{ $post->image }}" alt="img" height="400"></a>
                                        </div>
                                        <div class="zm-post-dis">
                                            <div class="zm-post-header">
                                                <div class="zm-category"><a href="/kategori/{{ $post->category->id }}/{{ $post->category->slug }}" class="bg-cat-5 cat-btn">{{ $post->category->title }}</a></div>
                                                <h2 class="zm-post-title h2"><a href="/yazi/{{ $post->id }}/{{ $post->slug }}">{{ $post->title }}</a></h2>
                                                <div class="zm-post-meta">
                                                    <ul>
                                                        <li class="s-meta zm-author">{{ $post->user->name }}</li>
                                                        <li class="s-meta zm-date">{{ date_format($post->created_at, 'd m Y') }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="zm-post-content">
                                                <p>{{ str_limit(strip_tags($post->content),$limit = 150,$end = '...' ) }}</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                                <!-- End single post layout A1 -->
                            </div>
                        </div>
                    </div>
                    <!-- End left side -->
                    <!-- Start Right sidebar -->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 sidebar-warp columns">
                        <div class="row">
                            <!-- Start post layout E -->
                            <aside class="zm-post-lay-e-area col-sm-6 col-md-12 col-lg-12">
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

                                            @foreach($mostComments as $mostComment)
                                                <article class="zm-post-lay-e zm-single-post clearfix">
                                                    <div class="zm-post-thumb f-left">
                                                        <a href="/yazi/{{ $mostComment->id }}/{{ $mostComment->slug }}"><img src="/{{ $mostComment->image }}" alt="img" height="100"></a>
                                                    </div>
                                                    <div class="zm-post-dis f-right">
                                                        <div class="zm-post-header">
                                                            <h2 class="zm-post-title"><a href="/yazi/{{ $mostComment->id }}/{{ $mostComment->slug }}">{{ $mostComment->title }}</a></h2>
                                                            <div class="zm-post-meta">
                                                                <ul>
                                                                    <li class="s-meta zm-author">{{ $mostComment->user->name }}</li>
                                                                    <li class="s-meta zm-date">{{ date_format($mostComment->created_at , 'd m Y') }}</li>
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
                            <!-- End post layout E -->
                            <aside class="zm-post-lay-f-area col-sm-6 col-md-12 col-lg-12 mt-70">
                                <div class="row mb-40">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="section-title">
                                            <h2 class="h6 header-color inline-block uppercase">Son Yorumlar</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="zm-posts">

                                            @foreach($recentComments as $recentComment)
                                                <div class="zm-post-lay-f zm-single-post clearfix">
                                                    <div class="zm-post-dis">
                                                        <p>
                                                            <a href="/yazi/{{ $recentComment->post->id }}/{{ $recentComment->post->slug }}">{{ $recentComment->user->name }}</a> - <em>“ {{ $recentComment->comment }} ” </em>
                                                            <a href="/yazi/{{ $recentComment->post->id }}/{{ $recentComment->post->slug }}"><strong>{{ $recentComment->post->title }}</strong></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                    <!-- End Right sidebar -->
                </div>
                <!-- Start pagination area -->
                <div class="row hidden-xs">
                    <div class="zm-pagination-wrap mt-70">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <nav class="zm-pagination ptb-40 text-center">
                                        <ul class="page-numbers">
                                            {{ $posts->links() }}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End pagination area -->
                <!-- Start Advertisement -->
                <div class="advertisement">
                    <div class="row mt-40">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <a href="#"><img src="/homepage/images/ad/5.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
                <!-- End Advertisement -->
            </div>
        </div>
    </section>
@endsection
@section('css')

@endsection
@section('js')

@endsection