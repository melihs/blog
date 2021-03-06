<!DOCTYPE html>
<html class="no-js" lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $setting->title }}</title>
    <meta name="description" content="{{ $setting->description }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="/homepage/images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.html">
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="/homepage/css/bootstrap.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="/homepage/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="/homepage/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="/homepage/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="/homepage/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="/homepage/css/custom.css">
    <!-- Style customizer (Remove these lines please) -->
    <link rel="stylesheet" href="/homepage/css/style-customizer.css">
    <link rel="stylesheet" href="/css/fontawesome.css">
    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
</head>
<body>
<div class="wrapper">
    <!-- Start of header area -->
    @include('homepage.header')
    <!-- End of header area -->
@if(request()->route()->getName()=='homepage')
    <!-- Start slider area -->
    @include('homepage.slider')
    <!-- End slider area -->
@endif
    <!-- Start page content -->
    @yield('content')
    <!-- End page content -->
    <!-- Start footer area -->
    @include('homepage.footer')
    <!-- End footer area -->
</div>
<!-- jquery latest version -->
<script src="/homepage/js/vendor/jquery-1.12.1.min.js"></script>
<!-- Bootstrap framework js -->
<script src="/homepage/js/bootstrap.min.js"></script>
<!-- All js plugins included in this file. -->
<script src="/homepage/js/owl.carousel.min.js"></script>
<script src="/homepage/js/plugins.js"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="/homepage/js/main.js"></script>
<!-- Modernizr JS -->
<script src="/homepage/js/vendor/modernizr-2.8.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
@include('sweetalert::alert')
</body>
</html>