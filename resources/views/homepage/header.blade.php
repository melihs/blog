<header  class="header-area header-wrapper bg-white clearfix">
        <!-- Start Sidebar Menu -->
        <div class="sidebar-menu">
            <div class="sidebar-menu-inner"></div>
            <span class="fa fa-remove"></span>
        </div>
        <!-- End Sidebar Menu -->
        <div class="header-top-bar bg-dark ptb-10">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7  hidden-xs">
                        <div class="header-top-left">
                            <nav class="header-top-menu zm-secondary-menu">
                                <ul>
                                    <li><a href="{{ route('homepage') }}">Anasayfa</a></li>

                                    @foreach($pages as $page)
                                        <li><a href="/sayfa/{{ $page->id }}/{{ $page->slug }}">{{ $page->title }}</a></li>
                                    @endforeach

                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                        <div class="header-top-right clierfix text-right">
                            <div class="header-social-bookmark topbar-sblock">
                                <ul>
                                    <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                </ul>
                            </div>
                            <div class="user-accoint topbar-sblock">

                                @if(!Auth::check())

                                <span class="login-btn uppercase">Oturum Aç</span>
                                <div class="login-form-wrap bg-white">
                                    <form method="POST" action="{{ route('login') }}" class="zm-signin-form text-left">
                                        @csrf
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="e-posta adresiniz" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif

                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="şifreniz" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
&nbsp;
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Beni Hatırla <br>
                                        <div class="zm-submit-box clearfix  mt-20">
                                            <input type="submit" value="Giriş">
                                            <a href="{{ route('register') }}">Kayıt</a>
                                        </div>
                                        <a href="#" class="zm-forget">Şifremi Unuttum</a>
                                        <div class="zm-login-social-box">
                                            <a href="#" class="social-btn bg-facebook block"><span class="btn_text"><i class="fa fa-facebook"></i>Login with Facebook</span></a>
                                            <a href="#" class="social-btn bg-twitter block"><span class="btn_text"><i class="fa fa-twitter"></i>Login with Twitter</span></a>
                                        </div>
                                    </form>
                                </div>

                                    @else
                                    @if(Auth::user()->role == 'admin')
                                        <span class="login-btn uppercase topbar-sblock"><a href="{{ route('admin.index') }}">Yönetim Paneli</a></span>
                                    @endif
                                        <span class="login-btn uppercase topbar-sblock"><a href="{{ route('kullanicilar.edit', Auth::user()->id) }}">Profilim</a></span>
                                        <span class="login-btn uppercase topbar-sblock"><a href="{{ route('user.userLogout') }}">Çıkış Yap</a></span>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-5 col-xs-12 header-mdh">
                        <div class="global-table">
                            <div class="global-row">
                                <div class="global-cell">
                                    <div class="logo">
                                        <a href="index.html">
                                            <img src="homepage/images/logo/1.png" alt="main logo">
                                        </a>
                                        <p class="site-desc">News blog & Magazine Template</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-7 col-sm-7 col-xs-12 col-lg-offset-1 header-mdh hidden-xs">
                        <div class="global-table">
                            <div class="global-row">
                                <div class="global-cell">
                                    <div class="advertisement text-right">
                                        <a href="#" class="block"><img src="homepage/images/ad/1.jpg" alt="ad img"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom-area hidden-sm hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="menu-wrapper  bg-theme clearfix">
                            <div class="row">
                                <div class="col-md-11">
                                    <button class="sidebar-menu-btn">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                    <div class="mainmenu-area">
                                        <nav class="primary-menu uppercase">
                                            <ul class="clearfix">
                                                <li class="current drop"><a href="#">Home</a>
                                                    <ul class="dropdown">
                                                        <li class="drop"><a href="#">Newspaper</a>
                                                            <ul class="dropdown level2">
                                                                <li><a href="index.html">Newspaper 1</a></li>
                                                                <li><a href="index-3.html">Newspaper 2</a></li>
                                                                <li><a href="index-7.html">Newspaper 3</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="drop"><a href="#">Magazine</a>
                                                            <ul class="dropdown level2">
                                                                <li><a href="index-2.html">Magazine 1</a></li>
                                                                <li><a href="index-7.html">Magazine 2</a></li>
                                                                <li><a href="index-10.html">Magazine 3</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="drop"><a href="#">Blogs</a>
                                                            <ul class="dropdown level2">
                                                                <li><a href="index-5.html">Blog demo 1</a></li>
                                                                <li><a href="index-6.html">Blog demo 2</a></li>
                                                                <li><a href="index-8.html">Blog demo 3</a></li>
                                                                <li><a href="index-9.html">Blog demo 4</a></li>
                                                                <li><a href="index-11.html">Blog demo 5</a></li>
                                                                <li><a href="index-12.html">Blog demo 6</a></li>
                                                                <li><a href="index-13.html">Blog demo 7</a></li>
                                                                <li><a href="index-14.html">Blog demo 8</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="index-15.html">Travel</a></li>
                                                        <li><a href="index-16.html">Lifestyle</a></li>
                                                        <li><a href="index-17.html">Sports</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="index-3.html">Fashion</a></li>
                                                <li><a href="index-2.html">Lifestyle</a></li>
                                                <li class="mega-parent drop"><a href="#">MegaMenu</a>
                                                    <div class="mega-menu-area dropdown clearfix">
                                                        <div class="zm-megamenu-sub-cats">
                                                            <ul class="zm-megamenu-sub-tab" role="tablist">
                                                                <li role="presentation">
                                                                    <a href="#allnews" aria-controls="allnews" role="tab" data-toggle="tab">All News</a>
                                                                </li>
                                                                <li role="presentation" class="active">
                                                                    <a href="#travel" aria-controls="travel" role="tab" data-toggle="tab">Travel Tips</a>
                                                                </li>
                                                                <li role="presentation">
                                                                    <a href="#communication" aria-controls="communication" role="tab" data-toggle="tab">Communication</a>
                                                                </li>
                                                                <li role="presentation">
                                                                    <a href="#besuness" aria-controls="besuness" role="tab" data-toggle="tab">Besuness News</a>
                                                                </li>
                                                                <li role="presentation">
                                                                    <a href="#love" aria-controls="love" role="tab" data-toggle="tab">Love & Relation</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="zm-megamenu-content">
                                                            <div class="tab-content">
                                                                <div role="tabpanel" class="tab-pane fade" id="allnews">
                                                                    <div class="mega-caro-wrap zm-posts clearfix">
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/1.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/2.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/3.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/4.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div role="tabpanel" class="tab-pane fade  in active" id="travel">
                                                                    <div class="mega-caro-wrap zm-posts clearfix">
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/1.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/2.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/3.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/4.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div role="tabpanel" class="tab-pane fade" id="communication">
                                                                    <div class="mega-caro-wrap zm-posts clearfix">
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/2.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/1.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/4.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/3.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div role="tabpanel" class="tab-pane fade" id="besuness">
                                                                    <div class="mega-caro-wrap zm-posts clearfix">
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/4.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/3.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/2.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/4.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div role="tabpanel" class="tab-pane fade" id="love">
                                                                    <div class="mega-caro-wrap zm-posts clearfix">
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/1.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/2.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/4.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                        <div class="single-mega-post">
                                                                            <article class="zm-mega-post zm-post-lay-a2">
                                                                                <div class="zm-post-thumb">
                                                                                    <a href="blog-single-image.html"><img src="homepage/images/post/mega/3.jpg" alt="img"></a>
                                                                                </div>
                                                                                <div class="zm-post-dis">
                                                                                    <div class="zm-post-header">
                                                                                        <h2 class="zm-post-title h2"><a href="blog-single-image.html">Magna aliqua enimad minim veniam.</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li><a href="index-15.html">Travel</a></li>
                                                <li><a href="index-16.html">Business</a></li>
                                                <li><a href="index-17.html">Sports</a></li>
                                                <li class="drop"><a href="#">Blog</a>
                                                    <ul class="dropdown">
                                                        <li><a href="blog-single-image.html">Single Blog image 1</a></li>
                                                        <li><a href="blog-single-image-2.html">Single Blog image 2</a></li>
                                                        <li><a href="blog-single-video.html">Single Blog Video 1</a></li>
                                                        <li><a href="blog-single-video-2.html">Single Blog Video 2</a></li>
                                                        <li><a href="blog-single-audio.html">Single Blog Audio 1</a></li>
                                                        <li><a href="blog-single-audio-2.html">Single Blog Audio 2</a></li>
                                                    </ul>
                                                </li>
                                                <li class="drop"><a href="#">Pages</a>
                                                    <ul class="dropdown arrow-left">
                                                        <li class="drop"><a href="#">Blog</a>
                                                            <ul class="dropdown level2">
                                                                <li><a href="blog-single-image.html">Single Blog image 1</a></li>
                                                                <li><a href="blog-single-image-2.html">Single Blog image 2</a></li>
                                                                <li><a href="blog-single-video.html">Single Blog Video 1</a></li>
                                                                <li><a href="blog-single-video-2.html">Single Blog Video 2</a></li>
                                                                <li><a href="blog-single-audio.html">Single Blog Audio 1</a></li>
                                                                <li><a href="blog-single-audio-2.html">Single Blog Audio 2</a></li>

                                                            </ul>
                                                        </li>
                                                        <li><a href="archive.html">Archive 1</a></li>
                                                        <li><a href="archive-2.html">Archive 2</a></li>
                                                        <li><a href="contact.html">Contact 1</a></li>
                                                        <li><a href="contact-2.html">Contact 2</a></li>
                                                        <li><a href="registration.html">Registration</a></li>
                                                        <li><a href="404.html">Page Not found (404)</a></li>
                                                    </ul>
                                                </li>
                                                <li class="drop"><a href="#">Shop</a>
                                                    <ul class="dropdown arrow-left">
                                                        <li><a href="shop.html">Shop</a></li>
                                                        <li><a href="shop-details.html">Shop Details</a></li>
                                                        <li><a href="cart.html">Cart page</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="contact.html">Contact</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="search-wrap pull-right">
                                        <div class="search-btn"><i class="fa fa-search"></i></div>
                                        <div class="search-form">
                                            <form action="#">
                                                <input type="search" placeholder="Search">
                                                <button type="submit"><i class='fa fa-search'></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
