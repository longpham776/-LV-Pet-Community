@extends('frontend.masterview')
@section('content')
<br>
<section class="signup page_customer_account">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-main-acount">
				<div id="parent" class="row">
					<div id="a" class="col-xs-12 col-sm-12 col-lg-9 col-left-account">
						<div class="form-signup name-account m992">
							<p><b>@lang('lang.hello'), <a style="color:#cc9966;">
										@foreach($_SESSION['user'] as $a)
										{{$a->hoten}}
										@endforeach
									</a>&nbsp;!</b></p>
						</div>
						@if (session('fail_cancelorder'))
							<div class="alert alert-warning" role="alert">
									{{ session('fail_cancelorder') }}
							</div>
						@endif
						@if (session('warn_cancelorder'))
							<div class="alert alert-danger" role="alert">
									{{ session('warn_cancelorder') }}
							</div>
						@endif
						@if (session('success_cancelorder'))
							<div class="alert alert-success" role="alert">
									{{ session('success_cancelorder') }}
							</div>
						@endif
						<div class="col-xs-12 col-sm-12 col-lg-12 no-padding">

							<div class="my-account">
								<div class="dashboard">

									<div class="recent-orders">
										<div class="table-responsive tab-all" style="overflow-x:auto;">
											<table class="table table-cart" id="my-orders-table">
												<thead class="thead-default">
													<tr>
														<th>@lang('lang.idorder')</th>
														<th>@lang('lang.address')</th>
														<th>@lang('lang.totalprice')</th>
														<th>@lang('lang.paymentmethods')</th>
														<th>@lang('lang.status')</th>
														<th>@lang('lang.detail')</th>
														<th></th>
													</tr>
												</thead>

												<tbody>
													@if($donhang == "null")
													<tr>
														<td colspan="6">
															<p>Không có đơn hàng nào.</p>
														</td>
													</tr>
													@else
													@foreach($donhang as $dh)
													<form action="{{route('chitietDH')}}" method="get">
														@csrf
														<input type="hidden" value="{{ $dh->madon }}" name="id">

														<td>{{ $dh->madon}}</td>
														<td>{{$dh->diachi}}</td>
														<td>{{$dh->thanhtien}}</td>
														@if($dh->pttt == 0)
														<td>COD</td>
														@else
														<td>Online</td>
														@endif
														@if($dh->trangthai == 0)
														<td>@lang('lang.waitforconfirmation')</td>
														@elseif($dh->trangthai == 1)
														<td>@lang('lang.waitingforthegoods')</td>
														@elseif($dh->trangthai == 2)
														<td>@lang('lang.indelivery')</td>
														@elseif($dh->trangthai == 3)
														<td>@lang('lang.delivered')</td>
														@elseif($dh->trangthai == 4)
														<td>@lang('lang.cancelorder')</td>
														@endif
														<td><button class="btn btn-primary">@lang('lang.detail')</button></td>
													</form>
														@if($dh->trangthai < 3)
														<td>
															<form action="{{route('cancelorder')}}" method="post">
																@csrf
																<input type="hidden" value="{{ $dh->madon }}" name="madon">
																<input type="hidden" value="{{ $dh->trangthai }}" name="status">
																<button class="btn btn-primary" type="submit">Hủy đơn</button>
															</form>
														</td>
														@else
														<td></td>
														@endif
													</tr>
													@endforeach
													@endif
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
								<p><i class="fa fa-user"></i> <strong style="line-height: 20px;">@lang('lang.fullname'): </strong>{{$a->hoten}}</p>
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
<style type="text/css">
	.btn-primary {
		background-color: #17A45A;
	}
	.btn-primary:hover {
		background-color: #555;
	}
</style>
@stop