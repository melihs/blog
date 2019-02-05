@extends('homepage.template')
@section('content')
    <div id="page-content" class="page-wrapper">
        <div class="zm-section single-post-wrap bg-white ptb-70 xs-pt-30">
            <div class="container">
                <div class="row">
                    <!-- Start left side -->
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 columns">
                        <div class="row mb-40">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="section-title">
                                    <h2 class="h6 header-color inline-block uppercase">{{ $post->title }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Start single post image formate-->
                            <div class="col-md-12">
                                <article class="zm-post-lay-single">
                                    <div class="zm-post-thumb">
                                        <img src="/{{ $post->image }}" alt="img" height="400">
                                    </div>
                                    <div class="zm-post-dis">
                                        <div class="zm-post-header">
                                            <h2 class="zm-post-title h2">{{ $post->title }}</h2>
                                            <div class="zm-post-meta">
                                                <ul class="list-unstyled">
                                                    <li class="s-meta"><i class="fa fa-user"></i> {{ $post->user->name }}</li>
                                                    <li class="s-meta"><i class="fa fa-calendar"></i> {{ date_format($post->created_at,'d m Y') }}</li>
                                                    <li class="s-meta"><i class="fa fa-eye"></i> {{ Counter::showAndCount($post->slug), $post->id }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="zm-post-content">
                                            {!! $post->content !!}
                                            <div class="entry-meta-small clearfix ptb-40 mtb-40 border-top border-bottom">
                                                <div class="meta-list pull-left">
                                                    <span class="post-title">Tags</span>
                                                    <a href="#">Travel</a>,<a href="#">Nature</a>,<a href="#">Environment</a>,<a href="#">Entertainment</a>
                                                </div>
                                                <div class="share-social-link pull-right">
                                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                                    <a href="#"><i class="fa fa-rss"></i></a>
                                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        {{--<div class="administrator-info clearfix">--}}
                                            {{--<div class="administrator-avatar">--}}
                                                {{--<img alt="administrator" src="images/post/single/author/1.jpg">--}}
                                            {{--</div>--}}
                                            {{--<div class="administrator-description">--}}
                                                {{--<h4 class="post-title"><a href="#">About Thomson Smith</a></h4>--}}
                                                {{--<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit. </p>--}}
                                                {{--<div class="share-social-link">--}}
                                                    {{--<a href="#"><i class="fa fa-facebook"></i></a>--}}
                                                    {{--<a href="#"><i class="fa fa-twitter"></i></a>--}}
                                                    {{--<a href="#"><i class="fa fa-google-plus"></i></a>--}}
                                                    {{--<a href="#"><i class="fa fa-rss"></i></a>--}}
                                                    {{--<a href="#"><i class="fa fa-dribbble"></i></a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                </article>
                            </div>
                            <!-- End single post image formate -->
                            {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">--}}
                                {{--<nav class="zm-pagination ptb-40 mtb-40 text-center border-bottom border-top">--}}
                                    {{--<ul class="page-numbers clearfix">--}}
                                        {{--<li class=" pull-left"><a class="prev page-numbers" href="#">Previous</a></li>--}}
                                        {{--<li class="pull-right"><a class="next page-numbers" href="#">Next</a></li>--}}
                                    {{--</ul>--}}
                                {{--</nav>--}}
                            {{--</div>--}}
                            <!--Start Similar post -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <aside class="zm-post-lay-a2-area">
                                    <div class="post-title mb-40">
                                        <h2 class="h6 inline-block">İlginizi Çekebilir</h2>
                                    </div>
                                    <div class="row">
                                        <div class="zm-posts clearfix">

                                            @foreach($similars as $similar)
                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                                <article class="zm-post-lay-a2">
                                                    <div class="zm-post-thumb">
                                                        <a href="/yazi/{{ $similar->id }}/{{ $similar->slug }}"><img src="/{{ $similar->image }}" alt="img" height="150"></a>
                                                    </div>
                                                    <div class="zm-post-dis">
                                                        <div class="zm-post-header">
                                                            <h2 class="zm-post-title h2"><a href="/yazi/{{ $similar->id }}/{{ $similar->slug }}">{{ $similar->title }}</a></h2>
                                                            <div class="zm-post-meta">
                                                                <ul>
                                                                    <li class="s-meta"><a href="#" class="zm-author">{{ $similar->user->name }}</a></li>
                                                                    <li class="s-meta"><a href="#" class="zm-date">{{ date_format($similar->created_at ,'d m Y') }}</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </aside>
                            </div>
                            <!-- End similar post -->
                            <!-- Start Comment box  -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="review-area mt-50 ptb-70 border-top">
                                    <div class="post-title mb-40">
                                        <h2 class="h6 inline-block">Toplam Yorum Sayısı {{ $post->comments->count() }}</h2>
                                    </div>
                                    <div class="review-wrap">
                                        <div class="review-inner">
                                            <!-- Start Single Review -->
                                            @foreach($comments as $comment)
                                            <div class="single-review clearfix">
                                                <div class="reviewer-img">
                                                    <img src="/{{ $comment->user->avatar }}" height="60" width="60" alt="avatar">
                                                </div>
                                                <div class="reviewer-info">
                                                    <h4 class="reviewer-name"><a href="#">{{ $comment->user->name }}</a></h4>
                                                    <span class="date-time">{{ date_format($comment->created_at , 'd m Y') }}</span>
                                                    <p class="reviewer-comment">{{ $comment->comment }}</p>
                                                    {{--<a href="#" class="reply-btn">Reply</a>--}}
                                                </div>
                                            </div>
                                            @endforeach
                                            <!-- End Single Review -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Comment box  -->
                            @if(Auth::check())
                                <!-- Start comment form -->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="comment-form-area">
                                    <div class="post-title mb-40">
                                        <h2 class="h6 inline-block">Yorum Yaz</h2>
                                    </div>
                                    <div class="form-wrap">
                                        <form action="{{ route('comment.send') }}" method="POST">
                                            @csrf
                                            <div class="form-inner clearfix">
                                                <div class="single-input">
                                                    <input type="hidden" value="{{ $post->id }}" name="post">
                                                    <textarea class="textarea" name="comment" placeholder="Yorum girin..."></textarea>
                                                </div>
                                                <button class="submit-button" type="submit">Gönder</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                                <!-- End comment form -->
                            @else
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    Yorum yapabilmek için <a href="{{ route('login') }}" class="text-danger">Giriş</a> yapın
                                    ya da <a href="{{ route('register') }}" class="text-danger">Kayıt</a> olun.
                                </div>
                            @endif
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
            </div>
        </div>
    </div>
@endsection