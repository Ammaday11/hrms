<!doctype html>
<html lang="en">
 
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>HRMS</title>
        <link rel="icon" type="image/x-icon" href="https://www.floratechnology.net/wp-content/uploads/2017/03/hrms_icon-250x250.png">
        <!-- Bootstrap CSS -->
        <!-- <link rel="stylesheet" href= "../resources/assets/assets/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href= "../resources/assets/assets/vendor/fonts/circular-std/style.css">
        <link rel="stylesheet" href= "../resources/assets/assets/libs/css/style.css">
        <link rel="stylesheet" href= "../resources/assets/assets/vendor/fonts/fontawesome/css/fontawesome-all.css"> -->
        
        <link rel="stylesheet" href= "{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href= "{{asset('assets/vendor/fonts/circular-std/style.css')}}">
        <link rel="stylesheet" href= "{{asset('assets/libs/css/style.css')}}">
        <link rel="stylesheet" href= "{{asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
        @yield('style')
    </head> 

    <body>
        <!-- ============================================================== -->
        <!-- main wrapper -->
        <!-- ============================================================== -->
        <div class="dashboard-main-wrapper">
        
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
            @include('include.header')
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
            @include('include.sidebar')
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
            @yield('content')
        </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->

        <!-- Optional JavaScript -->
        <!-- <script src="../resources/assets/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
        <script src="../resources/assets/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <script src="../resources/assets/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
        <script src="../resources/assets/assets/libs/js/main-js.js"></script> -->

        <script src="{{asset('assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
        <script src="{{asset('assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('assets/libs/js/main-js.js')}}"></script>
        @yield('script')
    </body>
    
    

</html>