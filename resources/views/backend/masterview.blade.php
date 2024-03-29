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
    @yield('title')
    


    <!-- Fontfaces CSS-->
    <link href="{{url('public')}}/backend/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{url('vendor')}}/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{url('vendor')}}/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{url('vendor')}}/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    
    <!-- Bootstrap CSS-->
    <link href="{{url('vendor')}}/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- vendor CSS-->
    <link href="{{url('vendor')}}/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="{{url('vendor')}}/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="{{url('vendor')}}/wow/animate.css" rel="stylesheet" media="all">
    <link href="{{url('vendor')}}/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="{{url('vendor')}}/slick/slick.css" rel="stylesheet" media="all">
    <link href="{{url('vendor')}}/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{url('vendor')}}/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="{{url('vendor')}}/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{url('public')}}/backend/css/theme.css" rel="stylesheet" media="all">

  
</head>

<body class="animsition">
    <div class="page-wrapper">
        
            

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                   <h1><b class="text-success">PET </b></h1><h3>Community</h3>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Quản lý cửa hàng</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{route('ad.home')}}">Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="{{route('ad.thuonghieu')}}">Hãng</a>
                                </li>
                                <li>
                                    <a href="{{route('ad.loaisp')}}">Quản lý loại</a>
                                </li>
                                <li>
                                    <a href="{{route('ad.donhang')}}">Quản đơn hàng</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li>
                            @foreach($_SESSION['admin'] as $a)
                            <a href="{{route('ad.qlad')}}">
                                <i class="zmdi zmdi-account"></i>Quản lý nhân viên</a>
                            @endforeach
                        </li>
                        <li>
                            @foreach($_SESSION['admin'] as $a)
                                <a href="{{route('ad.khachhang')}}"><i class="zmdi zmdi-account"></i>Quản lý khách hàng</a>
                            @endforeach
                        </li>
                        <!-- <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="{{route('ad.home')}}" method="get">
                                <input class="au-input au-input--xl" type="text" name="kw" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <!-- <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="{{url('public')}}/backend/images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="{{url('public')}}/backend/images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="{{url('public')}}/backend/images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="{{url('public')}}/backend/images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="{{url('public')}}/backend/images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                        @foreach($_SESSION['admin'] as $a)  <div class="image">
                                                   
                                                        <img src="{{url('public')}}/backend/avatar/{{$a->hinh}}" alt="John Doe" />
                                                    
                                                    @endforeach
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">@php if(isset($_SESSION['admin'])){foreach($_SESSION['admin'] as $a){echo $a->hoten;}} @endphp</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                            @foreach($_SESSION['admin'] as $a)  <div class="image">
                                                    <a href="#">
                                                        <img src="{{url('public')}}/backend/avatar/{{$a->hinh}}" alt="John Doe" />
                                                    </a>
                                                    @endforeach
                                                </div>
                                                
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">@php if(isset($_SESSION['admin'])){foreach($_SESSION['admin'] as $a){echo $a->hoten;}} @endphp</a>
                                                    </h5>
                                                    <span class="email">@php if(isset($_SESSION['admin'])){foreach($_SESSION['admin'] as $a){echo $a->email;}} @endphp</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{route('ad.edittkadmin',['email'=>$_SESSION['admin'][0]->email])}}">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{route('ad.logout')}}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            @yield('content')
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <!-- <script src="{{url('vendor')}}/jquery-3.2.1.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 
    <!-- Bootstrap JS-->
    <script src="{{url('vendor')}}/bootstrap-4.1/popper.min.js"></script>
    <script src="{{url('vendor')}}/bootstrap-4.1/bootstrap.min.js"></script>

    <script src="{{url('vendor')}}/slick/slick.min.js">
    </script>
    <script src="{{url('vendor')}}/wow/wow.min.js"></script>
    <script src="{{url('vendor')}}/animsition/animsition.min.js"></script>
    <script src="{{url('vendor')}}/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="{{url('vendor')}}/counter-up/jquery.waypoints.min.js"></script>
    <script src="{{url('vendor')}}/counter-up/jquery.counterup.min.js">
    </script>
    <script src="{{url('vendor')}}/circle-progress/circle-progress.min.js"></script>
    <script src="{{url('vendor')}}/perfect-scrollbar/perfect-scrollbar.js"></script>
    <!-- <script src="{{url('vendor')}}/chartjs/Chart.bundle.min.js"></script> -->
    <script src="{{url('vendor')}}/select2/select2.min.js">
    </script>
    <!-- Main JS-->
    <script src="{{url('public')}}/backend/js/main.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    
    
</body>

</html>
<!-- end document-->
