<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $setting->description}}">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/admin/assets/images/favicon.png">
    <title>{{ $setting->title }}</title>
    <!-- Custom CSS -->
    <link href="/admin/assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/admin/dist/css/style.min.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
    @yield('css')
</head>
<body>
<div id="main-wrapper">
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                <!-- Logo -->
                <a class="navbar-brand" href="{{ route('admin.index') }}">
                    <span class="logo-text">
                        <h3 class="text-warning">Yönetim Paneli</h3>
                    </span>
                </a>
                <!-- Toggle which is visible on mobile only -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
            </div>
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <!-- toggle and nav items -->
                <ul class="navbar-nav float-left mr-auto">
                    <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                </ul>
                <!-- Right side toggle and nav items -->
                <ul class="navbar-nav float-right">
                    <li style="position: relative; top:50%; transform:translateY(35%);" class="text-light">{{ Auth::user()->name }}</li>
                    <!-- User profile and search -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/admin/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated">
                            <a class="dropdown-item" href="{{ route('kullanicilar.edit',Auth::user()->id ) }}"><i class="ti-user m-r-5 m-l-5"></i> Profilim</a>
                            <a class="dropdown-item" href="{{ route('homepage') }}"><i class="ti-home m-r-5 m-l-5"></i> Anasayfa</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('user.userLogout') }}"><i class="fa fa-power-off m-r-5 m-l-5"></i> Çıkış</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <!-- User profile and search -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- End Topbar header -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav" class="p-t-30">
                    <li class="sidebar-item active"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.index')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Yönetici Paneli</span></a></li>

                    @can('users.admin')
                        <li class="sidebar-item active"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('kullanicilar.index')}}" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Kullanıcı Yönetimi</span></a></li>
                        <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('ayarlar.index')}}" aria-expanded="false"><i class="mdi mdi-wrench"></i><span class="hide-menu">Site Ayarları</span></a></li>
                    @endcan
                    @can('users.common')
                        <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('kategoriler.index')}}" aria-expanded="false"><i class="mdi mdi-format-list-bulleted"></i><span class="hide-menu">Kategori Yönetimi</span></a></li>
                        <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('yazilar.index')}}" aria-expanded="false"><i class="mdi mdi-border-color"></i><span class="hide-menu">İçerik Yönetimi</span></a></li>
                        <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('sayfalar.index')}}" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Sayfa Yönetimi</span></a></li>
                        <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('yorumlar.index')}}" aria-expanded="false"><i class="mdi mdi-comment-account-outline"></i><span class="hide-menu">Yorum Yönetimi</span></a></li>
                    @endcan
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb and right sidebar toggle -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            @yield('content')
        </div>
        <!-- End Container fluid  -->
        <!-- footer -->
        <footer class="footer text-center">
            Laravel 5.7 blog app <a href="https://melihsahin.com">Melih Şahin</a>.
        </footer>
        <!-- End footer -->
    </div>
    <!-- End Page wrapper  -->
</div>
<!-- End Wrapper -->
<!-- All Jquery -->
<script src="/admin/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="/admin/assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="/admin/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="/admin/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="/admin/dist/js/custom.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
@include('sweetalert::alert')
@yield('js')
</body>
</html>