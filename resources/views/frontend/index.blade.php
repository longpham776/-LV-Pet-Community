@extends('frontend.masterview')
@section('content')
<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="{{url('public')}}/frontend/img/banner_img_01.png" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-success"><b>PET</b> Community</h1>
                            <h3 class="h2">ĐĂNG KÝ LÀM TNV VỚI CHÚNG MÌNH NHÉ!</h3>
                            <p>
                                Nhóm chúng mình có tổ chức giúp đỡ, bảo vệ chó mèo lang thang, bị bạo hành, đánh đập. Nhóm cũng hỗ trợ chuyển chủ để cung cấp cho các em thú cưng hoặc thú hoang một cuộc sống mới…<br>
                                <a class="btn btn-secondary" href="https://www.facebook.com/Pet-Community-102604329136085" target="_blank" rel="noreferrer" aria-label="Đọc thêm" aria-labelledby="Đọc thêm">Đọc thêm</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="{{url('public')}}/frontend/img/banner_img_02.png" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">GHÉ THỊ TRẤN THÚ CƯNG CHƠI NHÉ CÁC BẠN!</h1>
                            <h3 class="h2">Group của nhóm nhằm chia sẻ kinh nghiệm nuôi và cứu hộ thú cưng.</h3>
                            <p>
                                <a class="btn btn-secondary" href="https://www.facebook.com/Pet-Community-102604329136085" target="_blank" rel="noreferrer" aria-label="Đọc thêm" aria-labelledby="Đọc thêm">Đọc thêm</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="{{url('public')}}/frontend/img/banner_img_03.png" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">HÃY NHẬN NUÔI, ĐỪNG XUA ĐUỔI!</h1>
                            <h3 class="h2">CÙNG THAM GIA GROUP YÊU THÚ CƯNG NHA! </h3>
                            <p>
                                Loài vật cũng có tri giác và cảm xúc, chúng cũng biết đau, biết sợ hãi, biết yêu thương và muốn được yêu thương.<br>
                                <a class="btn btn-secondary" href="https://www.facebook.com/Pet-Community-102604329136085" target="_blank" rel="noreferrer" aria-label="Đọc thêm" aria-labelledby="Đọc thêm">Đọc thêm</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->
<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">@lang('lang.product')</h1>
            <p>

            </p>
        </div>
    </div>
    <section class="services  service-service" id="service-service-0">
        <div class="row">
            <section class="pt-5 pb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="mb-3">@lang('lang.productportfolio')</h3>
                        </div>
                        <div class="col-6 text-right">
                            <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                <i class="fa fa-arrow-left"></i>
                            </a>
                            <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="col-12">
                            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @for($i=0;$i<=count($getSP);$i++) @if($i<=3) <div class="carousel-item active">
                                        <div class="row">
                                            @for($i=0;$i < 3;$i++) <div class="col-md-4">
                                                <div class="card mb-4 product-wap rounded-0">
                                                    <div class="card rounded-0">
                                                        <img class="card-img rounded-0 img-fluid" src="{{url('public')}}/frontend/img/{{$getSP[$i]->hinh}}">
                                                        <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <a href="{{route('chitietsanpham',['id'=>$getSP[$i]->masp])}}" class="h3 text-decoration-none">{{$getSP[$i]->tensp}}</a>
                                                        <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                                            <li class="pt-2">
                                                                <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                                                <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                                                <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                                                <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                                                <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                                            </li>
                                                        </ul>
                                                        @if($getSP[$i]->danhgia <= 1) <ul class="list-unstyled d-flex justify-content-center mb-1">
                                                            <li>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-secondary"></i>
                                                                <i class="fa fa-star text-secondary"></i>
                                                                <i class="fa fa-star text-secondary"></i>
                                                                <i class="fa fa-star text-secondary"></i>
                                                            </li>
                                                            </ul>
                                                            @elseif($getSP[$i]->danhgia <= 2) <ul class="list-unstyled d-flex justify-content-center mb-1">
                                                                <li>
                                                                    <i class="fa fa-star text-warning"></i>
                                                                    <i class="fa fa-star text-warning"></i>
                                                                    <i class="fa fa-star text-secondary"></i>
                                                                    <i class="fa fa-star text-secondary"></i>
                                                                    <i class="fa fa-star text-secondary"></i>
                                                                </li>
                                                                </ul>
                                                                @elseif($getSP[$i]->danhgia <= 3) <ul class="list-unstyled d-flex justify-content-center mb-1">
                                                                    <li>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-secondary"></i>
                                                                        <i class="fa fa-star text-secondary"></i>
                                                                    </li>
                                                                    </ul>
                                                                    @elseif($getSP[$i]->danhgia <= 4) <ul class="list-unstyled d-flex justify-content-center mb-1">
                                                                        <li>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                            <i class="fa fa-star text-secondary"></i>
                                                                        </li>
                                                                        </ul>
                                                                        @elseif($getSP[$i]->danhgia <= 5) <ul class="list-unstyled d-flex justify-content-center mb-1">
                                                                            <li>
                                                                                <i class="fa fa-star text-warning"></i>
                                                                                <i class="fa fa-star text-warning"></i>
                                                                                <i class="fa fa-star text-warning"></i>
                                                                                <i class="fa fa-star text-warning"></i>
                                                                                <i class="fa fa-star text-warning"></i>
                                                                            </li>
                                                                            </ul>
                                                                            @endif
                                                                            <p class="text-center mb-0">{{$getSP[$i]->gia}}<u>đ</u></p>
                                                    </div>
                                                </div>
                                        </div>
                                        @endfor
                                </div>
                            </div>
                            @else
                            <div class="carousel-item">
                                <div class="row">
                                    @for($i=3;$i < count($getSP);$i++) <div class="col-md-4">
                                        <div class="card mb-4 product-wap rounded-0">
                                            <div class="card rounded-0">
                                                <img class="card-img rounded-0 img-fluid" src="{{url('public')}}/frontend/img/{{$getSP[$i]->hinh}}">
                                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <a href="{{route('chitietsanpham',['id'=>$getSP[$i]->masp])}}" class="h3 text-decoration-none">{{$getSP[$i]->tensp}}</a>
                                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                                    <li class="pt-2">
                                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                                    </li>
                                                </ul>
                                                @if($getSP[$i]->danhgia <= 1) <ul class="list-unstyled d-flex justify-content-center mb-1">
                                                    <li>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                    </li>
                                                    </ul>
                                                    @elseif($getSP[$i]->danhgia <= 2) <ul class="list-unstyled d-flex justify-content-center mb-1">
                                                        <li>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                        </li>
                                                        </ul>
                                                        @elseif($getSP[$i]->danhgia <= 3) <ul class="list-unstyled d-flex justify-content-center mb-1">
                                                            <li>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-secondary"></i>
                                                                <i class="fa fa-star text-secondary"></i>
                                                            </li>
                                                            </ul>
                                                            @elseif($getSP[$i]->danhgia <= 4) <ul class="list-unstyled d-flex justify-content-center mb-1">
                                                                <li>
                                                                    <i class="fa fa-star text-warning"></i>
                                                                    <i class="fa fa-star text-warning"></i>
                                                                    <i class="fa fa-star text-warning"></i>
                                                                    <i class="fa fa-star text-warning"></i>
                                                                    <i class="fa fa-star text-secondary"></i>
                                                                </li>
                                                                </ul>
                                                                @elseif($getSP[$i]->danhgia <= 5) <ul class="list-unstyled d-flex justify-content-center mb-1">
                                                                    <li>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                    </li>
                                                                    </ul>
                                                                    @endif
                                                                    <p class="text-center mb-0">{{$getSP[$i]->gia}}<u>đ</u></p>
                                            </div>
                                        </div>
                                </div>
                                @endfor
                            </div>
                            @endif
                            @endfor
                        </div>
                    </div>
                </div>
        </div>
        </div>
    </section>
    </div>
</section>
</section>
<!-- End Categories of The Month -->
<!-- Start Featured Product -->

<!-- End Featured Product -->
<style type="text/css">
    .btn-primary {
        background-color: #17A45A;
    }

    .btn-primary:hover {
        background-color: #555;
    }
</style>
@stop