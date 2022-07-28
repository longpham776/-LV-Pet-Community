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
                            <!-- <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                            </p> -->
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
                            <hr>
                            <table class="table">
                                <thead>
                                <tr>
                                    <h3><b>Đánh giá sản phẩm</b></h3>
                                </tr>
                                <tr>
                                    <th>User</th>
                                    <th>Đáng giá</th>
                                    <th>Nội dung</th>
                                    <th>Thời gian</th>
                                </tr>

                                </thead>
                                <tbody>
                                @foreach($binhluans as $data)
                                    @csrf
                                    <td>{{$data->username}}</td>
                                    <td>{{$data->danhgia}}/5</td>
                                    <td>{{$data->binhluan}}</td>
                                    <td> 
                                        {{$data->create_at}}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                   
                    </div>
                </div>
            </div>
        </div>
        @endforeach
</section>
<!-- Close Content -->

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
@stop