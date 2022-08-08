<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Change Password</title>

    <!-- Fontfaces CSS-->
    <link href="{{url('public')}}/backend/css/font-face.css" rel="stylesheet" media="all">
    <link href="http://petcommunity.net/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="http://petcommunity.net/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="http://petcommunity.net/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="http://petcommunity.net/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="http://petcommunity.net/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="http://petcommunity.net/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="http://petcommunity.net/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="http://petcommunity.net/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="http://petcommunity.net/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="http://petcommunity.net/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="http://petcommunity.net/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{url('public')}}/backend/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                        <h1><b class="text-success">PET </b></h1><h3>Community</h3>
                        </div>
                        <div class="login-form" >
                            <form action="{{route('postchangepass')}}" method="post">
                                @csrf
                                @if (session('fail'))
                                    <div class="alert alert-danger" role="alert">
                                            {{ session('fail') }}
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" readonly type="email" name="email" value="{{$email}}">
                                    @error('email')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input class="au-input au-input--full" type="password" name="newpassword" placeholder="New password">
                                    @error('newpassword')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Confirm New Password</label>
                                    <input class="au-input au-input--full" type="password" name="confirmpassword" placeholder="Confirm new password">
                                    @error('confirmpassword')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Change Password</button>
                               
                            </form>
                            <div class="register-link">
                                <p>
                                    Already remember account?
                                    <a href="{{route('ad.login')}}">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="http://petcommunity.net/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="http://petcommunity.net/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="http://petcommunity.net/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="http://petcommunity.net/vendor/slick/slick.min.js">
    </script>
    <script src="http://petcommunity.net/vendor/wow/wow.min.js"></script>
    <script src="http://petcommunity.net/vendor/animsition/animsition.min.js"></script>
    <script src="http://petcommunity.net/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="http://petcommunity.net/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="http://petcommunity.net/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="http://petcommunity.net/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="http://petcommunity.net/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="http://petcommunity.net/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="http://petcommunity.net/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="{{url('public')}}/backend/js/main.js"></script>

</body>

</html>
<!-- end document-->