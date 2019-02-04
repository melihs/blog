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

                                        <span class="login-btn uppercase topbar-sblock"><a href="{{ route('login') }}">Oturum Aç</a></span>
                                        <span class="register-btn uppercase topbar-sblock"><a href="{{ route('register') }}">Kayıt Ol</a></span>
                                    @else
                                        @cannot('users.standart',User::class)
                                            <span class="login-btn uppercase topbar-sblock"><a href="{{ route('admin.index') }}">Yönetim Paneli</a></span>
                                        @endcannot
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
                                        <a href="{{ route('homepage') }}"><img src="/{{ $setting->logo }}" class="" height="100" width="150" alt="main logo"></a>
                                        <p class="site-desc">{{ $setting->title }}</p>
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
                                        <a href="#" class="block"><img src="/homepage/images/ad/1.jpg" alt="ad img"></a>
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

                                                @foreach($categories as $category)
                                                    <li class="current drop">
                                                        <a href="#">{{ $category->title }}</a>

                                                        @if($category->downCategory->count())

                                                            <ul class="dropdown">

                                                            @foreach($category->downCategory as $down_category)
                                                                <li>
                                                                    <a href="#">{{ $down_category->title }}</a>
                                                                </li>
                                                            @endforeach

                                                            </ul>

                                                        @endif
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
