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
						<div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
							
							<div class="my-account">
								<div class="dashboard">
									
									<div class="recent-orders">
										<div class="table-responsive tab-all"style="overflow-x:auto;">
											<table class="table table-cart" id="my-orders-table">
												<thead class="thead-default">
													<tr>
														<th>@lang('lang.idorder')</th>
														<th>@lang('lang.address')</th>
														<th>@lang('lang.totalprice')</th>
														<th>@lang('lang.paymentmethods')</th>													
														<th>@lang('lang.status')</th>
                                                        <th>@lang('lang.detail')</th>
													</tr>
												</thead>

												<tbody>
													@if($donhang == "null")
													<tr>
														<td colspan="6"><p>Không có đơn hàng nào.</p></td>
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
                                                            @else
                                                            <td>@lang('lang.delivered')</td>
                                                            @endif
                                                            <td><button class="btn btn-primary">@lang('lang.detail')</button></td>
                                                        </form>
                                                        
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
					<div id="b" class="col-xs-12 col-sm-12 col-lg-3 col-right-account margin-top-20">
						<div class="block-account">
							<div class="block-title-account"><h5>@lang('lang.myaccount')</h5></div>
							<div class="block-content form-signup">
                            @foreach($diachi as $dc)
								<p>@lang('lang.fullname'): <strong style="line-height: 20px;"> 
                                    @foreach($dataUser as $a)
                                                {{$a->hoten}}
                                            @endforeach</strong></p>
								<p><i class="fa fa-home font-some" aria-hidden="true"></i>  <span>@lang('lang.address'): {{$dc->diachi}} </span></p>
								<p><i class="fa fa-mobile font-some" aria-hidden="true"></i> <span>@lang('lang.phone'):0{{$dc->sdt}} </span> </p>
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

@stop