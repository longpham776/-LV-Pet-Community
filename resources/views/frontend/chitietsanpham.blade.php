@extends('frontend.masterview')
@section('content')
<!-- Open Content -->
<section class="bg-light">
    @foreach($getSP as $sp)
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="{{url('public')}}/frontend/img/{{$sp->hinh}}" alt="Card image cap" id="product-detail">
                    </div>
                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{url('public')}}/frontend/img/{{$sp->hinh}}" alt="Product Image 1">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{url('public')}}/frontend/img/{{$sp->hinh}}" alt="Product Image 2">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{url('public')}}/frontend/img/{{$sp->hinh}}" alt="Product Image 3">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.First slide-->

                                <!--Second slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{url('public')}}/frontend/img/{{$sp->hinh}}" alt="Product Image 4">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{url('public')}}/frontend/img/{{$sp->hinh}}" alt="Product Image 5">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{url('public')}}/frontend/img/{{$sp->hinh}}" alt="Product Image 6">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Second slide-->
                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{$sp->tensp}}</h1>
                            <p class="h3 py-2">{{$sp->gia}}<u>đ</u></p>
                            @if(!isset($_SESSION['user']))
                                <div id="rateYo1"></div>
                                <p class="py-2">
                                    <span class="list-inline-item text-dark">
                                        Rating {{$sp->danhgia}} | {{count($getBl)}} Comments
                                    </span>
                                </p>
                            @else
                                <div id="rateYo"></div>
                                <p class="py-2">
                                    <span class="list-inline-item text-dark">
                                        Rating {{$sp->danhgia}} | {{count($getBl)}} Comments
                                        <form class="form-inline" id="formrating" action="{{route('rating')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="hidden" name="rating_star" id="rating_star">
                                                <input type="hidden" name="masp" value="{{$sp->masp}}">
                                                <input type="hidden" name="username" value="{{$_SESSION['user'][0]->username}}">
                                            </div>
                                        </form> 
                                    </span>
                                </p>
                            @endif
                            
                            
                            
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Brand:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>
                                        @foreach ($getTH as $th)
                                            @if($th->math == $sp->math)
                                            {{$th->tenth}}
                                            @endif
                                        @endforeach
                                    </strong></p>
                                </li>
                            </ul>

                            <h6>Mô tả</h6>
                            <p>{{$sp->mota}}</p>
                            <!-- <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Avaliable Color :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>White / Black</strong></p>
                                </li>
                            </ul> -->

                            <h6>Với công thức vượt trội giúp:</h6>
                            <ul class="list-unstyled pb-3">
                                <li>{{$sp->congdung}}</li>
                            </ul>

                            <form action="{{route('postcart')}}" method="post">
                                @csrf
                                <input type="hidden" name="product-title" value="">
                                <input type="hidden" name="masp" value=" {{$sp->masp}} "/>
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Số lượng
                                                <input type="hidden" name="soluong" id="product-quanity" value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Mua</button>
                                    </div>
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="addcart" value="addcart">Thêm vào giỏ</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                   
                    </div>
                </div>
            </div>
        </div>
        @endforeach
</section>
<!-- Close Content -->
<div class="container">
    <div class="be-comment-block">
        <h1 class="comments-title">Comments ({{count($getBl)}})</h1>
        @foreach($getBl as $bl)
        <div class="be-comment">
            <div class="be-img-comment">	
                <a href="#" style="text-decoration:none;">
                    @if(!$_SESSION['user'][0]->hinh)
                    <img src="https://secure.gravatar.com/avatar/3dbbb7b9f09bd1f312374056bb92b3e1?s=96&d=https%3A%2F%2Fstatic.teamtreehouse.com%2Fassets%2Fcontent%2Fdefault_avatar-ea7cf6abde4eec089a4e03cc925d0e893e428b2b6971b12405a9b118c837eaa2.png&r=pg" alt="" class="be-ava-comment">
                    @else
                    <img src="{{url('public')}}/frontend/avatar/{{$_SESSION['user'][0]->hinh}}" alt="" class="be-ava-comment">
                    @endif
                    
                </a>
            </div>
            <div class="be-comment-content">
                
                    <span class="be-comment-name">
                        <a href="#" style="text-decoration:none;">{{$bl->username}}</a>
                        </span>
                    <span class="be-comment-time">
                        <i class="fa fa-clock-o"></i>
                        {{$bl->create_at}}
                    </span>

                <p class="be-comment-text">
                    {{$bl->mota}}
                </p>
            </div>
        </div>
        @endforeach
        @if(isset($_SESSION['user']))
        <form class="form-block" action="{{route('binhluansp')}}" method="post">
            @csrf
            <div class="row">
                <input type="hidden" name="masp" value="{{$getSP[0]->masp}}">
                <input type="hidden" name="username" value="{{$_SESSION['user'][0]->username}}">
                @error('mota')
                     <span style="color: red;">{{ $message }}</span>
                @enderror
                <div class="col-xs-12">									
                    <div class="form-group">
                        <textarea class="form-input" name="mota" placeholder="Your text"></textarea>
                    </div>
                </div>
                <button class="btn btn-primary pull-right">submit</button>
            </div>
        </form>
        @else
        <form class="form-block" id="form-comment" action="" method="">
            <div class="row">
                <div class="col-xs-12">									
                    <div class="form-group">
                        <textarea class="form-input" readonly name="mota" placeholder="Your text"></textarea>
                    </div>
                </div>
                <a class="btn btn-primary pull-right">submit</a>
            </div>
        </form>
        @endif
    </div>
</div>
<!-- Start Article -->
<section class="py-5">
    <div class="container">
        <div class="row text-left p-2 pb-3">
            <h4>Sản phẩm tương tự</h4>
        </div>

        <!--Start Carousel Wrapper-->
        <div id="carousel-related-product">
            @foreach($getAll as $sp1)
                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="{{url('public')}}/frontend/img/{{$sp1->hinh}}">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <form action="#" method="post">
                                        <input type="text" name="math" hidden value="{{$sp1->math}}">
                                        <input type="text" name="masp" hidden value="{{$sp1->masp}}">
                                        <li><i class="btn btn-success text-white mt-2 far fa-heart"><input type="submit" class="btn btn-success far fa-heart" name="submit" value="Thích"></i></li>
                                    </form>
                                    <form action="{{route('chitietsanpham',['id'=>$sp1->masp])}}" method="get">
                                        <input type="text" name="math" hidden value="{{$sp1->math}}">
                                        <input type="text" name="masp" hidden value="{{$sp1->masp}}">
                                        <li><i class="btn btn-success text-white mt-2 far fa-eye"><input type="submit" class="btn btn-success far fa-eye" name="submit" value="Xem"></i></li>
                                    </form>
                                    <form action="{{route('postcart')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="soluong" id="product-quanity" value="1">
                                        <input type="text" name="masp" hidden value="{{$sp1->masp}} ">
                                        <li><i class="btn btn-success text-white mt-2 fas fa-cart-plus"><input type="submit" class="btn btn-success fas fa-cart-plus" name="submit" value="Thêm"></i></li>
                                    </form>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="{{route('chitietsanpham',['id'=>$sp1->masp])}}" class="h3 text-decoration-none">{{$sp1->tensp}}</a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <!-- <li>M/L/X/XL</li> -->
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
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                            </ul>
                            <p class="text-center mb-0">{{$sp1->gia}}<u>đ</u></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Article -->
<style type="text/css">
    body{
        margin-top:20px;
        background-color:#e9ebee;
    }

    .be-comment-block {
        margin-bottom: 50px !important;
        border: 1px solid #edeff2;
        border-radius: 2px;
        padding: 50px 70px;
        border:1px solid #ffffff;
    }

    .comments-title {
        font-size: 16px;
        color: #262626;
        margin-bottom: 15px;
        font-family: 'Conv_helveticaneuecyr-bold';
    }

    .be-img-comment {
        width: 60px;
        height: 60px;
        float: left;
        margin-bottom: 15px;
    }

    .be-ava-comment {
        width: 60px;
        height: 60px;
        border-radius: 50%;
    }

    .be-comment-content {
        margin-left: 80px;
    }

    .be-comment-content span {
        display: inline-block;
        width: 49%;
        margin-bottom: 15px;
    }

    .be-comment-name {
        font-size: 13px;
        font-family: 'Conv_helveticaneuecyr-bold';
    }

    .be-comment-content a {
        color: #383b43;
    }

    .be-comment-content span {
        display: inline-block;
        width: 49%;
        margin-bottom: 15px;
    }

    .be-comment-time {
        text-align: right;
    }

    .be-comment-time {
        font-size: 11px;
        color: #b4b7c1;
    }

    .be-comment-text {
        font-size: 13px;
        line-height: 18px;
        color: #7a8192;
        display: block;
        background: #f6f6f7;
        border: 1px solid #edeff2;
        padding: 15px 20px 20px 20px;
    }

    .form-group.fl_icon .icon {
        position: absolute;
        top: 1px;
        left: 16px;
        width: 48px;
        height: 48px;
        background: #f6f6f7;
        color: #b5b8c2;
        text-align: center;
        line-height: 50px;
        -webkit-border-top-left-radius: 2px;
        -webkit-border-bottom-left-radius: 2px;
        -moz-border-radius-topleft: 2px;
        -moz-border-radius-bottomleft: 2px;
        border-top-left-radius: 2px;
        border-bottom-left-radius: 2px;
    }

    .form-group .form-input {
        font-size: 13px;
        line-height: 50px;
        font-weight: 400;
        color: #b4b7c1;
        width: 100%;
        height: 50px;
        padding-left: 20px;
        padding-right: 20px;
        border: 1px solid #edeff2;
        border-radius: 3px;
    }

    .form-group.fl_icon .form-input {
        padding-left: 70px;
    }

    .form-group textarea.form-input {
        height: 150px;
    }
</style>
<script>
    //Make sure that the dom is ready
    $(function () {
        let rateAvg = {{$getSP[0]->danhgia}};
        $("#rateYo").rateYo({
            rating: rateAvg
        }).on("rateyo.set", function (e, data) {
            $('#rating_star').val(data.rating);
            $('#formrating').submit();
        });

        $("#rateYo1").rateYo({
            rating: rateAvg
        }).on("rateyo.set", function (e, data) {
            alert("Vui lòng đăng nhập để được đánh giá!");
        });
    });
</script>
<script>
    //Make sure that the dom is ready
    $(function () {
        $("#form-comment").on("click", function () {
            alert("Vui lòng đăng nhập để được bình luận!");
        });
    });
</script>
@stop
