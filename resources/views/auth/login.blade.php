
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="/template/assets/img/icon.ico" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="/template/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/template/assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="/template/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/template/assets/css/atlantis.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <style>
    img {

    }
    .login-bg {
        background: url('https://images.pexels.com/photos/1229183/pexels-photo-1229183.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940') no-repeat; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

</style>
</head>
<body class="login">
    <div class="wrapper wrapper-login wrapper-login-full p-0">
        <div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center login-bg">
            <div class="owl-carousel owl-theme owl-img-responsive">


            </div>
        </div>
        <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white bubble-shadow">
            <div class="container container-login container-transparent animated fadeIn">
                <div class="text-center">
                    <img src="/template/assets/img/examples/logo2.png" width="80%" alt="">
                </div>
                
                

                <h3 class="text-center mt-5">Welcome Back </h3>

                @if (session('message'))
                <div class="alert {{session('class')}}">
                    {{ session('message') }}
                </div>
                @endif

                <form method="POST" action="/">
                @csrf
                <div class="login-form">
                    <div class="form-group">
                        <label for="username" class=""><b>Username</b></label>
                        <input id="username" name="username" type="text" class="form-control" required>
                    </div>
                    <div class="form-group mt-4 mb-4">
                        <label for="password" class=""><b>Password</b></label>
                        <a href="#" class="link float-right">Forget Password ?</a>
                        <div class="position-relative">
                            <input id="password" name="password" type="password" class="form-control" required>
                            <div class="show-password">
                                <i class="icon-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-action-d-flex mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberme">
                            <label class="custom-control-label m-0" for="rememberme">Remember Me</label>
                        </div>
                        <button class="btn btn-warning col-md-5 float-right mt-3 mt-sm-0 fw-bold">Sign In</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    
    <script src="/template/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="/template/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="/template/assets/js/core/popper.min.js"></script>
    <script src="/template/assets/js/core/bootstrap.min.js"></script>
    <script src="/template/assets/js/atlantis.min.js"></script>
    <script src="/template/assets/js/plugin/carousel/carousel.min.js"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            items:1,
            lazyLoad:true,
            loop:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            dots: false,
        })
    </script>
</body>
</html>