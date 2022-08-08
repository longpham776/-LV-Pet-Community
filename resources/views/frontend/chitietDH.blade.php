@extends('frontend.masterview')
@section('content')
<br>
<section class="signup page_customer_account">
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
										<div class="table-responsive tab-all"style="overflow-x:auto;">
											<table class="table table-cart" id="my-orders-table">
												<thead class="thead-default">
                                                <tr>
                                                <th>ID @lang('lang.product')</th>
                                                <th>@lang('lang.product')</th>
                                                <th>@lang('lang.price')</th>
                                                <th>@lang('lang.image')</th>
                                                <th>@lang('lang.quantity')</th>
                                                <th>@lang('lang.subprice')</th>
                                                </tr>
												</thead>

												<tbody>
                                                 @foreach($getCTD as $ct)
                                                <form action="{{route('danhgia')}}" method="get">
                                                    @csrf
                                                    <input type="hidden" value="{{ $ct->stt }}" name="id">
                                                    <input type="hidden" value="{{ $ct->masp }}" name="id_sp">
                                                    <input type="hidden" value="{{ $ct->trangthai }}" name="tt">
                                                    
                                                    <td>{{$ct->masp}}</td>
                                                    <td>{{$ct->tensp}}</td>
                                                    <td>{{$ct->gia}}VNĐ</td>
                                                    <td><img src="{{url('public')}}/frontend/img/{{$ct->hinh}}" 
                                                        style="width: 100px;"></td>
                                                    <td>
                                                    {{$ct->soluong}}
                                                    </td>
                                                    <td>{{$ct->thanhtien}}</td>
																										<!-- <td>
																											<button class="btn btn-primary" type="submit">Đánh giá</button>
																										</td> -->
                                                    </form>
                                                    
                                                </tr>
                                                
                                                <tr>
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
					<div id="b" class="col-xs-12 col-sm-12 col-lg-3 col-right-account margin-top-20">
						<div class="block-account">
							<div class="block-title-account"><h5>@lang('lang.myaccount')</h5></div>
							<div class="block-content form-signup">
								@foreach($diachi as $dc)
									<p>@lang('lang.fullname'): <strong style="line-height: 20px;">     @foreach($dataUser as $a)
													{{$a->hoten}}
												@endforeach</strong></p>
									<p><i class="fa fa-home font-some" aria-hidden="true"></i>  <span>@lang('lang.address'): {{$dc->diachi}} </span></p>
									<p><i class="fa fa-mobile font-some" aria-hidden="true"></i> <span>@lang('lang.phone'): {{$dc->sdt}} </span> </p>
									<p><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i> <span> Email: 
										@foreach($dataUser as $a) 
										{{$a->email}} @endforeach </span></p>
									
									@endforeach

							</div>
							<div>								
								<a class="btn btn-primary" href="{{route('edit-account')}}">@lang('lang.editaccount')</a>															
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
<br>

@stop