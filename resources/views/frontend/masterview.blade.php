<!DOCTYPE html>
<html lang="en">

<head>
    <title>PET Community</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

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

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <style>
        .services .services-list {
            margin: 0 -1px
        }

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
            .services .services-list li .detail h3 {
                font-size: 260%
            }
        }

        @media (min-width: 1600px) {
            .services .services-list li .detail h3 {
                font-size: 285%
            }
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

        .text hr {
            border: none;
            border-top: 1px dotted #000000;
            color: #000000;
            background-color: #fff;
            height: 1px;
            width: 100%;
        }

        .line-through p {
            -webkit-text-decoration-line: line-through;
            /* Safari */
            text-decoration-line: line-through;
        }
    </style>
    <style>
        /* định dạng cho button */
        #myBtn {
            display: none;
            /* Mặc định button sẽ được ẩn*/
            position: fixed;
            bottom: 100px;
            right: 31px;
            z-index: 99;
            /* button được ưu tiên hiển thị đè lên các phần khác*/
            border: none;
            outline: none;
            background-color: #17A45A;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 10px;
        }

        #myBtn:hover {
            background-color: #555;
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
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">petcommunity@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">090-020-0340</a>
                </div>
                <div class="dropdown">
                    <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                        @lang('lang.language')
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('lang/vn')}}"><img width="20px" height="13px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Vietnam.svg/2560px-Flag_of_Vietnam.svg.png"></a>
                        <a class="dropdown-item" href="{{url('lang/en')}}"><img width="20px" height="13px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/88/Flag_of_the_United_States_%28bordered%29.svg/1200px-Flag_of_the_United_States_%28bordered%29.svg.png"></a>
                    </div>
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

            <a class="navbar-brand text-success logo h1 align-self-center" href="{{route('home')}}">
                PET
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}">@lang('lang.home')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('news')}}">@lang('lang.news')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('donate')}}">@lang('lang.donate')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('about')}}">@lang('lang.about')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('sanpham')}}">@lang('lang.product')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact')}}">@lang('lang.contact')</a>
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
                            @lang('lang.hello'),
                            <a href="{{route('account')}}" title="@lang('lang.account')" style="text-decoration:none;">
                                @if(isset($_SESSION['user']))
                                @foreach($_SESSION['user'] as $a)
                                {{$a->hoten}}|
                                @endforeach
                                @endif
                            </a>
                        </i>
                        <a href="{{route('logout')}}" title="@lang('lang.signout')" style="text-decoration:none;">@lang('lang.signout')</a>
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
            <form action="{{route('sanpham')}}" autocomplete="off" method="get" class="modal-content modal-body border-0 p-0">
                @csrf
                <div class="input-group mb-2">

                    <input type="text" class="form-control" id="inputModalSearch" name="kw" placeholder="Search ...">
                    

                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
                <div id="search_ajax"></div>
            </form>
        </div>
    </div>
    <!--End Modal-->
    @yield('content')
    <button id="myBtn" title="Go to top"><i class="bi bi-caret-up-fill"></i></button>
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
                            <a class="text-decoration-none" href="tel:010-020-0340">090-020-0340</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">petcommunity@gmail.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">@lang('lang.aboutus')</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="https://www.facebook.com/Pet-Community-102604329136085/">@lang('lang.aboutusdescript')</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">@lang('lang.furtherinfo')</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="{{route('home')}}">@lang('lang.home')</a></li>
                        <li><a class="text-decoration-none" href="{{route('news')}}">@lang('lang.news')</a></li>
                        <li><a class="text-decoration-none" href="{{route('donate')}}">@lang('lang.donate')</a></li>
                        <li><a class="text-decoration-none" href="{{route('about')}}">@lang('lang.about')</a></li>
                        <li><a class="text-decoration-none" href="{{route('sanpham')}}">@lang('lang.product')</a></li>
                        <li><a class="text-decoration-none" href="{{route('contact')}}">@lang('lang.contact')</a></li>
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
                    <div class="fb-page" data-href="https://www.facebook.com/Pet-Community-102604329136085/" data-tabs="timeline" data-width="430" data-height="130" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/Pet-Community-102604329136085/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Pet-Community-102604329136085/">Pet Community</a></blockquote>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2021 PET Community
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>
    <script type="text/javascript">
        $('#inputModalSearch').keyup(function(){
            var query = $(this).val();
            if(query != ''){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/autocomplete-ajax')}}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                });
            }else{
                $('#search_ajax').fadeOut();
            }
        });
        $(document).on('click','.li_search_ajax',function(){
            $('#inputModalSearch').val($(this).text());
            $('#search_ajax').fadeOut();
        });
    </script>
    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "102604329136085");
        chatbox.setAttribute("attribution", "install_email");
        chatbox.setAttribute("attribution_version", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v13.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
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
    <script>
        //Khi người dùng cuộn chuột thì gọi hàm scrollFunction
        window.onscroll = function() {
            scrollFunction()
        };
        // khai báo hàm scrollFunction
        function scrollFunction() {
            // Kiểm tra vị trí hiện tại của con trỏ so với nội dung trang
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                //nếu lớn hơn 50px thì hiện button
                document.getElementById("myBtn").style.display = "block";
            } else {
                //nếu nhỏ hơn 50px thì ẩn button
                document.getElementById("myBtn").style.display = "none";
            }
        }
        //gán sự kiện click cho button
        document.getElementById('myBtn').addEventListener("click", function() {
            //Nếu button được click thì nhảy về đầu trang
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0" nonce="huzrWHyZ"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <!-- End Slider Script -->
</body>
</html>