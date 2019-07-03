<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Login</title>

    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="/nifty/css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="/nifty/css/nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="/nifty/css/demo/nifty-demo-icons.min.css" rel="stylesheet">


    <!--=================================================-->


    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="/nifty/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="/nifty/plugins/pace/pace.min.js"></script>
    <link href="/nifty/plugins/animate-css/animate.min.css" rel="stylesheet">

        
    <!--Demo [ DEMONSTRATION ]-->
    <link href="/nifty/css/demo/nifty-demo.min.css" rel="stylesheet">

    

        
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
    <div id="container" class="cls-container" style='background: url({{ asset('images/background.gif') }}) no-repeat;background-size: cover;'>
        
        <!-- BACKGROUND IMAGE -->
        <!--===================================================-->
        <div id="bg-overlay"></div>
        
        
        <!-- LOGIN FORM -->
        <!--===================================================-->
        <div class="cls-content">
            <div class="cls-content-sm panel">
                <div class="panel-body">
                    <div class="mar-ver pad-btm">
                        <h1 class="h3">管理后台</h1>
                        <!-- <p>Sign In to your account</p> -->
                    </div>
                    <form action="{{ route('login') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control"  name="email" placeholder="Email" autofocus value="admin@qq.com">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control"  name="password" placeholder="Password" value="admin">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="checkbox pad-btm text-left">
                            <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox">
                            <label for="demo-form-checkbox">Remember me</label>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
                    </form>
                </div>
        
                <div class="pad-all">
                    <a href="#" class="btn-link mar-rgt">Forgot password ?</a>
                    <a href="{{ route('register') }}" class="btn-link mar-lft">Create a new account</a>
                </div>
            </div>
        </div>
        <!--===================================================-->
        
        
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->


        
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="/nifty/js/jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="/nifty/js/bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="/nifty/js/nifty.min.js"></script>
    <script src="/js/comment.js"></script>
    <!--=================================================-->
    
    <script type="text/javascript">
        @if (session()->get('errors'))         
            @if(is_array(json_decode(session()->get('errors'), true)))
                notify('danger' ,"登陆失败","{!! implode('', session()->get('errors')->all(':message<br/>')) !!}")
            @else
                notify('danger',"登陆失败","{!! session()->get('errors') !!}")
            @endif
        @endif
    </script>

</body>
</html>
