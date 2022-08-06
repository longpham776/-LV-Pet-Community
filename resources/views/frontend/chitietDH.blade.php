@extends('frontend.masterview')
@section('content')
<br>
<section class="signup page_customer_account">
	<div class="container page_address margin-bottom-20">
		<div class="row">
			<div class="col-xs-12 col-lg-12 adr_title">
				<a class="f-right a_address" href="{{route('account')}}" style="text-decoration:none;color:#17A45A;" alt="">
					<i class="fa fa-arrow-left" aria-hidden="true"></i><strong style="line-height: 30px;">Quay lại trang tài khoản</strong>
				</a>
			</div>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-main-acount">
				<div id="parent" class="row">
					<div id="a" class="col-xs-12 col-sm-12 col-lg-9 col-left-account">
						<h1>@lang('lang.detailorder')</h1>
						<div class="col-xs-12 col-sm-12 col-lg-12 no-padding">

							<div class="my-account">
								<div class="dashboard">

									<div class="recent-orders">
										<div class="table-responsive tab-all" style="overflow-x:auto;">
											<table class="table table-cart" id="my-orders-table">
												<thead class="thead-default">
													<tr>
														<th>ID @lang('lang.product')</th>
														<th>@lang('lang.product')</th>
														<th>@lang('lang.price')</th>
														<th>@lang('lang.image')</th>
														<th>@lang('lang.quantity')</th>
														<th>@lang('lang.subprice')</th>
														<th></th>
													</tr>
												</thead>

												<tbody>
													@foreach($getCTD as $ct)
													<tr>
														<td>{{$ct->masp}}</td>
														<td>{{$ct->tensp}}</td>
														<td>{{$ct->gia}}VNĐ</td>
														<td><img src="{{url('public')}}/frontend/img/{{$ct->hinh}}" style="width: 100px;"></td>
														<td>
															{{$ct->soluong}}
														</td>
														<td>{{$ct->thanhtien}}</td>
														<td>
															<button class="btn btn-primary" type="submit"> <a href="{{route('chitietsanpham',['id'=>$ct->masp])}}" style="text-decoration:none;color:white;" method="get">Đánh giá</a> </button>
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
										<div class="paginate-pages pull-right page-account text-right col-xs-12 col-sm-12 col-md-12 col-lg-12">

										</div>
									</div>
								</div>

							</div>

						</div>
					</div>
					@foreach($dataUser as $a)
					<div id="b" class="col-xs-12 col-sm-12 col-lg-3 col-right-account margin-top-20">
						<div class="block-account">
							<div class="block-title-account">
								<h5>@lang('lang.myaccount')</h5>
							</div>
							@if($diachi->isEmpty())
							<div class="block-content form-signup">
								<p><i class="fa fa-user"></i> <strong style="line-height: 20px;">@lang('lang.fullname'):</strong> {{$a->hoten}}</p>
								<p><i class="fa fa-home font-some" aria-hidden="true"></i> <strong style="line-height: 20px;">@lang('lang.address'): </strong></p>
								<p><i class="fa fa-mobile font-some" aria-hidden="true"></i> <strong style="line-height: 20px;">@lang('lang.phone'): </strong> </p>
								<p><i class="fa fa-envelope margin-icon"></i> <strong style="line-height: 20px;"> Email:</strong> {{$a->email}}</p>
							</div>
							@else
							<div class="block-content form-signup">
								@foreach($diachi as $dc)
								@if($dc->trangthai == 1)
								<p><i class="fa fa-user"></i> <strong style="line-height: 20px;">@lang('lang.fullname'): {{$a->hoten}}</strong></p>
								<p><i class="fa fa-home font-some" aria-hidden="true"></i> <strong style="line-height: 20px;">@lang('lang.address'): {{$dc->diachi}} </strong></p>
								<p><i class="fa fa-mobile font-some" aria-hidden="true"></i> <strong style="line-height: 20px;">@lang('lang.phone'): </strong>0{{$dc->sdt}} </p>
								<p><i class="fa fa-envelope margin-icon"></i> <strong style="line-height: 20px;">Email: </strong>{{$a->email}}</p>
								@endif
								@endforeach
							</div>
							@endif
							<div>
								<a class="btn btn-primary" href="{{route('account_settings')}}">@lang('lang.editaccount')</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
<br>
<style type="text/css">
	.btn-primary {
		background-color: #17A45A;
	}
	.btn-primary:hover {
		background-color: #555;
	}
</style>
@stop