<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nifty </title>

    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href={{ asset('nifty/css/bootstrap.min.css') }} rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="/nifty/css/nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="/nifty/css/demo/nifty-demo-icons.min.css" rel="stylesheet">

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="/nifty/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="/nifty/plugins/pace/pace.min.js"></script>


    <!--Demo [ DEMONSTRATION ]-->
    <link href="/nifty/css/demo/nifty-demo.min.css" rel="stylesheet">

    <!--Custom scheme [ OPTIONAL ]-->
    <link href="/nifty/css/themes/type-c/theme-navy.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="/robot.jpg" type="image/x-icon" />
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        
        <!--NAVBAR-->
        @include('layouts.header')
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <div id="content-container" style="background-color:#ecf0f5">
                <!--Page content-->
                @yield('content')
                <!--End page content-->
            </div>
            <!--END CONTENT CONTAINER-->
            @include('layouts.sidebar')

        </div>

        
        <!-- FOOTER -->
        @include('layouts.footer')
        <!-- END FOOTER -->


        <!-- SCROLL PAGE BUTTON -->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>

    </div>
    <!-- END OF CONTAINER -->


    
    
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="/nifty/js/jquery.min.js"></script>

    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="/nifty/js/bootstrap.min.js"></script>

    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="/nifty/js/nifty.min.js"></script>

    <!--Demo script [ DEMONSTRATION ]-->
    {{-- <script src="/nifty/js/demo/nifty-demo.min.js"></script> --}}
    @yield('scripts')

</body>
</html>
