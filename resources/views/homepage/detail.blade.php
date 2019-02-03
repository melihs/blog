@extends('homepage.template')
@section('content')
    <div id="page-content" class="page-wrapper">
        <div class="zm-section single-post-wrap bg-white ptb-70 xs-pt-30">
            <div class="container">
                <div class="row">
                    <!-- Start left side -->
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 columns">
                        {{--<div class="row mb-40">--}}
                            {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">--}}
                                {{--<div class="section-title">--}}
                                    {{--<h2 class="h6 header-color inline-block uppercase">{{ $post->title }}</h2>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
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
                                                <ul>
                                                    <li class="s-meta"><a href="#" class="zm-author">{{ $post->user->name }}</a></li>
                                                    <li class="s-meta">{{ date_format($post->created_at,'d m Y') }}</li>
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
                                                    <img src="/{{ $comment->user->avatar }}" height="75" width="75" alt="avatar">
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
                                    <a href="{{ route('login') }}" class="btn btn-block btn-lg btn-success">Yorum yapmak için giriş yapın</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- End left side -->
                    <!-- Start Right sidebar -->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 sidebar-warp columns">
                        <div class="row">
                            <!-- Start Subscribe From -->
                            <div class="col-md-12 col-lg-12 col-sm-6 mt-60 sm-mb-50">
                                <aside class="subscribe-form bg-dark text-center sidebar">
                                    <h3 class="uppercase zm-post-title">Get Email Updates</h3>
                                    <p>Join 80,000+ awesome subscribers and update yourself with our exclusive news.</p>
                                    <form action="#">
                                        <input placeholder="Enter your full name" type="text">
                                        <input placeholder="Enter email address" required="" type="email">
                                        <input value="Subscribe" type="submit">
                                    </form>
                                </aside>
                            </div>
                            <!-- End Subscribe From -->
                            <!-- Start post layout E -->
                            <aside class="zm-post-lay-e-area col-sm-6 col-md-12 col-lg-12">
                                <div class="row mb-40">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="section-title">
                                            <h2 class="h6 header-color inline-block uppercase">Most Commented</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="zm-posts">
                                            <!-- Start single post layout E -->
                                            <article class="zm-post-lay-e zm-single-post clearfix">
                                                <div class="zm-post-thumb f-left">
                                                    <a href="blog-single-image.html"><img src="images/post/e/5.jpg" alt="img"></a>
                                                </div>
                                                <div class="zm-post-dis f-right">
                                                    <div class="zm-post-header">
                                                        <h2 class="zm-post-title"><a href="blog-single-image.html">Magna aliqua ut enim ad minim veniam quis nostrud.</a></h2>
                                                        <div class="zm-post-meta">
                                                            <ul>
                                                                <li class="s-meta"><a href="#" class="zm-author">Thomson Smith</a></li>
                                                                <li class="s-meta"><a href="#" class="zm-date">April 18, 2016</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <!-- Start single post layout E -->
                                            <!-- Start single post layout E -->
                                            <article class="zm-post-lay-e zm-single-post clearfix">
                                                <div class="zm-post-thumb f-left">
                                                    <a href="blog-single-image.html"><img src="/images/post/e/2.jpg" alt="img"></a>
                                                </div>
                                                <div class="zm-post-dis f-right">
                                                    <div class="zm-post-header">
                                                        <h2 class="zm-post-title"><a href="blog-single-image.html">Enim ad minim veniam nostrud xercitation ullamco.</a></h2>
                                                        <div class="zm-post-meta">
                                                            <ul>
                                                                <li class="s-meta"><a href="#" class="zm-author">Thomson Smith</a></li>
                                                                <li class="s-meta"><a href="#" class="zm-date">April 18, 2016</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <!-- Start single post layout E -->
                                            <!-- Start single post layout E -->
                                            <article class="zm-post-lay-e zm-single-post clearfix">
                                                <div class="zm-post-thumb f-left">
                                                    <a href="blog-single-image.html"><img src="/images/post/e/6.jpg" alt="img"></a>
                                                </div>
                                                <div class="zm-post-dis f-right">
                                                    <div class="zm-post-header">
                                                        <h2 class="zm-post-title"><a href="blog-single-image.html">Enim ad minim veniam nostrud xercitation ullamco.</a></h2>
                                                        <div class="zm-post-meta">
                                                            <ul>
                                                                <li class="s-meta"><a href="#" class="zm-author">Thomson Smith</a></li>
                                                                <li class="s-meta"><a href="#" class="zm-date">April 18, 2016</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <!-- Start single post layout E -->
                                            <!-- Start single post layout E -->
                                            <article class="zm-post-lay-e zm-single-post hidden-md clearfix">
                                                <div class="zm-post-thumb f-left">
                                                    <a href="blog-single-image.html"><img src="/images/post/e/7.jpg" alt="img"></a>
                                                </div>
                                                <div class="zm-post-dis f-right">
                                                    <div class="zm-post-header">
                                                        <h2 class="zm-post-title"><a href="blog-single-image.html">Laboris nisi ut aliquip dolor in elit reprehenderit velit esse.</a></h2>
                                                        <div class="zm-post-meta">
                                                            <ul>
                                                                <li class="s-meta"><a href="#" class="zm-author">Thomson Smith</a></li>
                                                                <li class="s-meta"><a href="#" class="zm-date">April 18, 2016</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <!-- Start single post layout E -->
                                            <!-- Start single post layout E -->
                                            <article class="zm-post-lay-e zm-single-post hidden-md clearfix">
                                                <div class="zm-post-thumb f-left">
                                                    <a href="blog-single-image.html"><img src="/images/post/e/8.jpg" alt="img"></a>
                                                </div>
                                                <div class="zm-post-dis f-right">
                                                    <div class="zm-post-header">
                                                        <h2 class="zm-post-title"><a href="blog-single-image.html">Duis aute irure dolor in velit esse cillum fugiat nulla.</a></h2>
                                                        <div class="zm-post-meta">
                                                            <ul>
                                                                <li class="s-meta"><a href="#" class="zm-author">Thomson Smith</a></li>
                                                                <li class="s-meta"><a href="#" class="zm-date">April 18, 2016</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <!-- Start single post layout E -->
                                            <!-- Start single post layout E -->
                                            <article class="zm-post-lay-e zm-single-post hidden-md clearfix">
                                                <div class="zm-post-thumb f-left">
                                                    <a href="blog-single-image.html"><img src="images/post/e/3.jpg" alt="img"></a>
                                                </div>
                                                <div class="zm-post-dis f-right">
                                                    <div class="zm-post-header">
                                                        <h2 class="zm-post-title"><a href="blog-single-image.html">Laboris nisi ut aliquip dolor in elit reprehenderit velit esse.</a></h2>
                                                        <div class="zm-post-meta">
                                                            <ul>
                                                                <li class="s-meta"><a href="#" class="zm-author">Thomson Smith</a></li>
                                                                <li class="s-meta"><a href="#" class="zm-date">April 18, 2016</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <!-- Start single post layout E -->
                                            <!-- Start single post layout E -->
                                            <article class="zm-post-lay-e zm-single-post hidden-sm hidden-md clearfix">
                                                <div class="zm-post-thumb f-left">
                                                    <a href="blog-single-image.html"><img src="images/post/e/2.jpg" alt="img"></a>
                                                </div>
                                                <div class="zm-post-dis f-right">
                                                    <div class="zm-post-header">
                                                        <h2 class="zm-post-title"><a href="blog-single-image.html">Duis aute irure dolor in velit esse cillum fugiat nulla.</a></h2>
                                                        <div class="zm-post-meta">
                                                            <ul>
                                                                <li class="s-meta"><a href="#" class="zm-author">Thomson Smith</a></li>
                                                                <li class="s-meta"><a href="#" class="zm-date">April 18, 2016</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <!-- Start single post layout E -->
                                        </div>
                                    </div>
                                </div>
                            </aside>
                            <!-- End post layout E -->
                            <aside class="zm-post-lay-f-area col-sm-6 col-md-12 col-lg-12 mt-70">
                                <div class="row mb-40">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="section-title">
                                            <h2 class="h6 header-color inline-block uppercase">Recent Commented</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="zm-posts">
                                            <!-- Start single post layout F -->
                                            <div class="zm-post-lay-f zm-single-post clearfix">
                                                <div class="zm-post-dis">
                                                    <p><a href="#"> Nasir Uddin </a> - <em>“ Ut enim ad minim veniam, quis nostrud, sed do eiusmod tempor...” </em>  <strong>on Magna aliqua ut enim ad minim veniam quis nostrud.</strong></p>
                                                </div>
                                            </div>
                                            <!-- Start single post layout F -->
                                            <!-- Start single post layout F -->
                                            <div class="zm-post-lay-f zm-single-post clearfix">
                                                <div class="zm-post-dis">
                                                    <p><a href="#"> Sayeed Ahmad </a> - <em> “ Ut enim ad minim veniam, quis nostrud, sed do eiusmod tempor...” </em> <strong>on Magna aliqua ut enim ad minim veniam quis nostrud.</strong></p>
                                                </div>
                                            </div>
                                            <!-- Start single post layout F -->
                                            <!-- Start single post layout F -->
                                            <div class="zm-post-lay-f zm-single-post clearfix">
                                                <div class="zm-post-dis">
                                                    <p><a href="#"> ThemeHook </a> - <em> “ Ut enim ad minim veniam, quis nostrud, sed do eiusmod tempor...” </em> <strong>on Magna aliqua ut enim ad minim veniam quis nostrud.</strong></p>
                                                </div>
                                            </div>
                                            <!-- Start single post layout F -->
                                            <!-- Start single post layout F -->
                                            <div class="zm-post-lay-f zm-single-post clearfix">
                                                <div class="zm-post-dis">
                                                    <p><a href="#"> Nasir Uddin </a> - <em> “ Ut enim ad minim veniam, quis nostrud, sed do eiusmod tempor...” </em> <strong>on Magna aliqua ut enim ad minim veniam quis nostrud.</strong></p>
                                                </div>
                                            </div>
                                            <!-- Start single post layout F -->
                                            <!-- Start single post layout F -->
                                            <div class="zm-post-lay-f zm-single-post clearfix">
                                                <div class="zm-post-dis">
                                                    <p><a href="#"> Sayeed Ahmad </a> - <em> “ Ut enim ad minim veniam, quis nostrud, sed do eiusmod tempor...” </em> <strong>on Magna aliqua ut enim ad minim veniam quis nostrud.</strong></p>
                                                </div>
                                            </div>
                                            <!-- Start single post layout F -->
                                            <!-- Start single post layout F -->
                                            <div class="zm-post-lay-f zm-single-post clearfix">
                                                <div class="zm-post-dis">
                                                    <p><a href="#"> ThemeHook </a> - <em> “ Ut enim ad minim veniam, quis nostrud, sed do eiusmod tempor...” </em> <strong>on Magna aliqua ut enim ad minim veniam quis nostrud.</strong></p>
                                                </div>
                                            </div>
                                            <!-- Start single post layout F -->
                                            <!-- Start single post layout F -->
                                            <div class="zm-post-lay-f zm-single-post clearfix">
                                                <div class="zm-post-dis">
                                                    <p><a href="#"> Nasir Uddin </a> - <em> “ Ut enim ad minim veniam, quis nostrud, sed do eiusmod tempor...” </em> <strong>on Magna aliqua ut enim ad minim veniam quis nostrud.</strong></p>
                                                </div>
                                            </div>
                                            <!-- Start single post layout F -->
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