@extends('frontend.masterview')
@section('content')
<!-- Start Content -->
<div class="container py-5">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="h2 pb-4">@lang('lang.category')</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            @lang('lang.kindofproduct')
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse show list-unstyled pl-3">
                        @foreach($getLoai as $lsp)
                            <li><a class="text-decoration-none" href="{{route('locLoai',['id'=>$lsp->maloai])}}">{{$lsp->tenloai}}</a></li>
                        @endforeach
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            @lang('lang.brand')
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                        @foreach($getTH as $th)
                            <li><a class="text-decoration-none" href="{{route('locTH',['id'=>$th->math])}}">{{$th->tenth}}</a></li>
                        @endforeach
                        </ul>
                    </li>
                    
                </ul>
            </div>

            <div class="col-lg-9">
               
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
                                            <form action="{{route('chitietsanpham',['id'=>$sp->masp])}}" method="get">
                                                <li><i class="btn btn-success text-white mt-2 far fa-eye"><input type="submit" class="btn btn-success far fa-eye" name="submit" value="Xem"></i></li>
                                            </form>
                                            <form action="{{route('postcart')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="soluong" value="1">
                                                <input type="hidden" name="masp" value="{{$sp->masp}}">
                                                <li><i class="btn btn-success text-white mt-2 fas fa-cart-plus"><input type="submit" class="btn btn-success fas fa-cart-plus" name="submit" value="Thêm"></i></li>
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
                                    @if($sp->danhgia <= 1)
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                                        <li>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                        </li>
                                    </ul>
                                    @elseif($sp->danhgia <= 2)
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                                        <li>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                        </li>
                                    </ul>
                                    @elseif($sp->danhgia <= 3)
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                                        <li>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                        </li>
                                    </ul>
                                    @elseif($sp->danhgia <= 4)
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                                        <li>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                        </li>
                                    </ul>
                                    @elseif($sp->danhgia <= 5)
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                                        <li>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </li>
                                    </ul>
                                    @endif
                                    <p class="text-center mb-0">{{$sp->gia}}<u>đ</u></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @php $i=0 @endphp
                <div div="row">
                    <ul class="pagination pagination-lg justify-content-end">
                        @foreach($getSP->links()->elements[0] as $page)
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="{{$page}}" tabindex="-1">@php echo $i+=1 @endphp</a>  
                        @endforeach
                    </ul>
                </div>
                
            </div>

        </div>
    </div>
    <!-- End Content -->
<section class="bg-light py-5">
    <div class="container my-4">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Thương hiệu thức ăn thú cưng</h1>
                <p>
                Trên thị trường hiện nay có rất nhiều thương hiệu bán các loại phụ kiện chó mèo, thú cưng cho bạn lựa chọn.
                </p>
            </div>
            <div class="col-lg-9 m-auto tempaltemo-carousel">
                <div class="row d-flex flex-row">
                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="prev">
                            <i class="text-light fas fa-chevron-left"></i>
                        </a>
                    </div>
                    <!--End Controls-->

                    <!--Carousel Wrapper-->
                    <div class="col">
                        <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="templatemo-slide-brand" data-bs-ride="carousel">
                            <!--Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{url('public')}}/frontend/img/logo_brand_1.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{url('public')}}/frontend/img/logo_brand_2.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{url('public')}}/frontend/img/logo_brand_3.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{url('public')}}/frontend/img/logo_brand_4.png" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End First slide-->

                                <!--Second slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{url('public')}}/frontend/img/logo_brand_5.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{url('public')}}/frontend/img/logo_brand_6.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{url('public')}}/frontend/img/logo_brand_7.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{url('public')}}/frontend/img/logo_brand_8.png" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End Second slide-->

                                <!--Third slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{url('public')}}/frontend/img/logo_brand_9.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{url('public')}}/frontend/img/logo_brand_10.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{url('public')}}/frontend/img/logo_brand_11.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{url('public')}}/frontend/img/logo_brand_12.png" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End Third slide-->

                            </div>
                            <!--End Slides-->
                        </div>
                    </div>
                    <!--End Carousel Wrapper-->

                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="next">
                            <i class="text-light fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
        </div>
    </div>
</section>

@stop