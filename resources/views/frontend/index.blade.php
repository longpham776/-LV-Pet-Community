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
                                <a class="btn btn-secondary" href="https://www.facebook.com/profile.php?=75548495" target="_blank" rel="noreferrer" aria-label="Đọc thêm" aria-labelledby="Đọc thêm">Đọc thêm</a>
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
                                <a class="btn btn-secondary" href="https://www.facebook.com/profile.php?=75548495 " target="_blank" rel="noreferrer" aria-label="Đọc thêm" aria-labelledby="Đọc thêm">Đọc thêm</a>
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
                                <a class="btn btn-secondary" href="https://www.facebook.com/profile.php?=75548495 " target="_blank" rel="noreferrer" aria-label="Đọc thêm" aria-labelledby="Đọc thêm">Đọc thêm</a>
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
            <h1 class="h1">Sản phẩm</h1>
            <p>
                
            </p>
        </div>
    </div>
    <section class="services  service-service" id="service-service-0">
    <div class="row">
                    @foreach($getSP as $sp)
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid" src="{{url('public')}}/frontend/img/{{$sp->hinh}}">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <form action="#" method="post">
                                                <li><i class="btn btn-success text-white mt-2 far fa-heart"><input type="submit" class="btn btn-success far fa-heart" name="submit" value="Thích"></i></li>
                                            </form>
                                            <form action="#" method="post">
                                                <input type="text" name="math" hidden value="{{$sp->math}}">
                                                <input type="text" name="masp" hidden value="{{$sp->masp}}">
                                                <li><i class="btn btn-success text-white mt-2 far fa-eye"><input type="submit" class="btn btn-success far fa-eye" name="submit" value="Xem"></i></li>
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{route('chitietsanpham',['id'=>$sp->masp])}}" class="h3 text-decoration-none">{{$sp->tensp}}</a>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <li class="pt-2">
                                            <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                                        <li>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <p class="text-center mb-0">{{$sp->gia}}<u>đ</u></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
    </section>
</section>
<!-- End Categories of The Month -->
<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Sản Phẩm Nổi Bật</h1>
                <p>
                Phụ kiện chó mèo, thú cưng là những sản phẩm giúp nuôi và hỗ trợ chăm sóc vật nuôi mà mỗi người nuôi đều cần phải quan tâm. Vậy sản phẩm phụ kiện cho chó mèo và vật nuôi gồm những gì? Hãy cùng PET Shop – Siêu thị thú cưng tìm hiểu để biết được phải mua những đồ dùng nào cần thiết, giá rẻ chất lượng cho thú cưng nhà mình nhé.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <a href="shop-single.html">
                        <img src="" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                            </li>
                            <li class="text-muted text-right">0<u>đ</u></li>
                        </ul>
                        <a href="shop-single.html" class="h2 text-decoration-none text-dark">ten san pham</a>
                        <p class="card-text">
                        mo ta
                        </p>
                        <p class="text-muted">Reviews (24)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Featured Product -->
@stop