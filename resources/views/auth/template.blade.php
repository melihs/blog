<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $setting->description}}">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/admin/assets/images/favicon.png">
    <title>{{ $setting->title }}</title>
    <!-- Custom CSS -->
    <link href="/admin/dist/css/style.min.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>
<body>
    @yield('content')
</body>
<script src="/admin/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="/admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script>

//    $('[data-toggle="tooltip"]').tooltip();
//    $(".preloader").fadeOut();
//    // ==============================================================
//    // Login and Recover Password
//    // ==============================================================
//    $('#to-recover').on("click", function() {
//        $("#loginform").slideUp();
//        $("#recoverform").fadeIn();
//    });
//    $('#to-login').click(function(){
//
//        $("#recoverform").hide();
//        $("#loginform").fadeIn();
//    });
</script>

</body>

</html>