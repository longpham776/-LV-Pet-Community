<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PET Community</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
        <!-- Bootstrap Font Icon CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <link rel="apple-touch-icon" href="{{url('public')}}/frontend/img/apple-icon.png">
        <link rel="shortcut icon" type="image/x-icon" href="{{url('public')}}/frontend/img/PET.png">
        
        <link rel="stylesheet" href="{{url('public')}}/frontend/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('public')}}/frontend/css/templatemo.css">
        <link rel="stylesheet" href="{{url('public')}}/frontend/css/custom.css">

        <!-- Load fonts style after rendering the layout styles -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
        <link rel="stylesheet" href="{{url('public')}}/frontend/css/fontawesome.min.css">
        
        <!-- Slick -->
        <link rel="stylesheet" type="text/css" href="{{url('public')}}/frontend/css/slick.min.css">
        <link rel="stylesheet" type="text/css" href="{{url('public')}}/frontend/css/slick-theme.css">
        <style>
            .services .services-list {margin: 0 -1px}
            .services .services-list:after {
                display: block;
                content: "";
                clear: both
            }
            .services .services-list li {
                position: relative;
                overflow: hidden
            }
            @media (min-width: 992px) {
                .services .services-list li {
                    float: left;
                    width: 24%;
                    width: -webkit-calc(25% - 2px);
                    width: calc(25% - 2px);
                    margin: 1px
                }
            }
            .services .services-list li img {
                width: 100%;
                -webkit-transition: -webkit-transform .3s ease-out;
                transition: -webkit-transform .3s ease-out;
                transition: transform .3s ease-out;
                transition: transform .3s ease-out, -webkit-transform .3s ease-out
            }
            .services .services-list li .detail {
                position: absolute;
                width: 100%;
                top: 50%;
                left: 0;
                -webkit-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
                text-align: center
            }
            .services .services-list li .detail h3 {
                margin: 0;
                font-size: 225%;
                color: #FFFFFF;
                text-transform: uppercase;
                font-family: UTMBebas, sans-serif
            }
            @media (min-width: 1400px) {
                .services .services-list li .detail h3 {font-size: 260%}
            }
            @media (min-width: 1600px) {
                .services .services-list li .detail h3 {font-size: 285%}
            }
            .services .services-list li .detail a {
                display: inline-block;
                margin: 8px auto 0;
                color: #FFFFFF;
                border-bottom: 1px solid #FFFFFF;
                -webkit-transition: all .2s;
                transition: all .2s
            }
            .services .services-list li .detail a:hover {
                color: #FFF444;
                border-bottom-color: #FFF444
            }
            .services .services-list li:hover img {
                -webkit-transform: scale(1.15);
                -ms-transform: scale(1.15);
                transform: scale(1.15)
            }
            .text hr{
                border:none;
            border-top:1px dotted #000000;
            color:#000000;
            background-color:#fff;
            height:1px;
            width:100%;
            }
            /////
            .line-through p{
            -webkit-text-decoration-line: line-through; /* Safari */
            text-decoration-line: line-through; 
            }
        </style>
    </head>

    <body>
        <!-- Start Top Nav -->
        <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
            <div class="container text-light">
                <div class="w-100 d-flex justify-content-between">
                    <div>
                        <i class="fa fa-envelope mx-2"></i>
                        <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                        <i class="fa fa-phone mx-2"></i>
                        <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                    </div>
                    <div>
                        <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                        <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                        <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                        <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Close Top Nav -->


        <!-- Header -->
        <nav class="navbar navbar-expand-lg navbar-light shadow">
            <div class="container d-flex justify-content-between align-items-center">

                <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                    PET
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                    <div class="flex-fill">
                        <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home')}}">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="ungho.html">Ủng Hộ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.html">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('sanpham')}}">Sản Phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('contact')}}">Liên Hệ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="navbar align-self-center d-flex">
                        <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                            <div class="input-group">
                                <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                                <div class="input-group-text">
                                    <i class="fa fa-fw fa-search"></i>
                                </div>
                            </div>
                        </div>
                        <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                            <i class="fa fa-fw fa-search text-dark mr-2"></i>
                        </a>
                        <a class="nav-icon position-relative text-decoration-none" href="{{route('giohang')}}">
                            <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                            <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">{{Cart::count()}}</span>
                        </a>
                        @php if(!isset($_SESSION['user'])){ @endphp
                            <a class="nav-icon position-relative text-decoration-none" href="{{route('ad.login')}}">
                    <i class="fa fa-fw fa-user text-dark mr-3"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                </a>
                            @php }else{ @endphp
                            <div class="header__top__right__auth">
                                <i class="fa fa-user">
                                    Hello,
                                    <a href="#" style="text-decoration:none;">
                                        @if(isset($_SESSION['user']))
                                            @foreach($_SESSION['user'] as $a)
                                                {{$a->hoten}}|
                                            @endforeach
                                        @endif
                                    </a>
                                </i>
                                <a href="{{route('logout')}}" title="Sign Out" style="text-decoration:none;">Sign Out</a>
                            </div>
                            @php } @endphp
                    </div>
                </div>

            </div>
        </nav>
        <!-- Close Header -->

        <!-- Modal -->
        <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="w-100 pt-1 mb-5 text-right">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('sanpham')}}" method="get" class="modal-content modal-body border-0 p-0">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="inputModalSearch" name="kw" placeholder="Search ...">
                        <button type="submit" class="input-group-text bg-success text-light">
                            <i class="fa fa-fw fa-search text-white"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!--End Modal-->
        @yield('content')
        <!-- Start Footer -->
        <footer class="bg-dark" id="tempaltemo_footer">
            <div class="container">
                <div class="row">

                    <div class="col-md-4 pt-5">
                        <h2 class="h2 text-success border-bottom pb-3 border-light logo">PET eCommunity</h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li>
                                <i class="fas fa-map-marker-alt fa-fw"></i>
                                180 Cao Lỗ, Phường 4, Quận 8, TP.Hồ Chí Minh
                            </li>
                            <li>
                                <i class="fa fa-phone fa-fw"></i>
                                <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope fa-fw"></i>
                                <a class="text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-4 pt-5">
                        <h2 class="h2 text-light border-bottom pb-3 border-light">About Us</h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li><a class="text-decoration-none" href="https://www.facebook.com/profile.php?=75548495 ">Nhóm trẻ tình nguyện viên Việt Nam và quốc tế, hoạt động vì tình yêu chó mèo.</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4 pt-5">
                        <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li><a class="text-decoration-none" href="#">Trang Chủ</a></li>
                            <li><a class="text-decoration-none" href="#">Nhận Nuôi</a></li>
                            <li><a class="text-decoration-none" href="#">Ủng Hộ</a></li>
                            <li><a class="text-decoration-none" href="#">About Us</a></li>
                            <li><a class="text-decoration-none" href="#">Sản Phẩm</a></li>
                            <li><a class="text-decoration-none" href="#">Liên hệ</a></li>
                        </ul>
                    </div>

                </div>

                <div class="row text-light mb-4">
                    <div class="col-12 mb-3">
                        <div class="w-100 my-3 border-top border-light"></div>
                    </div>
                    <div class="col-auto me-auto">
                        <ul class="list-inline text-left footer-icons">
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <label class="sr-only" for="subscribeEmail">Email address</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                            <div class="input-group-text btn-success text-light">Subscribe</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-100 bg-black py-3">
                <div class="container">
                    <div class="row pt-2">
                        <div class="col-12">
                            <p class="text-left text-light">
                                Copyright &copy; 2021 Company Name 
                                | Designed by <a rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->

        <!-- Start Script -->
        <script src="{{url('public')}}/frontend/js/jquery-1.11.0.min.js"></script>
        <script src="{{url('public')}}/frontend/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="{{url('public')}}/frontend/js/bootstrap.bundle.min.js"></script>
        <script src="{{url('public')}}/frontend/js/templatemo.js"></script>
        <script src="{{url('public')}}/frontend/js/custom.js"></script>
        <!-- End Script -->

        <!-- Start Slider Script -->
        <script src="{{url('public')}}/frontend/js/slick.min.js"></script>
        <script>
            $('#carousel-related-product').slick({
                infinite: true,
                arrows: false,
                slidesToShow: 4,
                slidesToScroll: 3,
                dots: true,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 3
                        }
                    }
                ]
            });
        </script>
        <!-- End Slider Script -->
    </body>
</html>
