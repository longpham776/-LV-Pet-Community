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
							<p><b>Xin chào, <a style="color:#cc9966;">
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
														<th>Mã đơn</th>
														<th>Địa chỉ</th>
														<th>Giá trị đơn hàng</th>
														<th>Tình trạng thanh toán</th>													
														<th>Trạng thái</th>
                                                        <th>Chi tiết</th>
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
                                                            <td>Chờ xác nhận</td>
                                                            @elseif($dh->trangthai == 1)
                                                            <td>Chờ lấy hàng</td>
                                                            @elseif($dh->trangthai == 2)
                                                            <td>Đang giao</td>
                                                            @else
                                                            <td>Đã giao</td>
                                                            @endif
                                                            <td><button class="btn btn-primary">Chi tiết đơn</button></td>
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
							<div class="block-title-account"><h5>Tài khoản của tôi</h5></div>
							<div class="block-content form-signup">
                            @foreach($diachi as $dc)
								<p>Tên tài khoản: <strong style="line-height: 20px;">     @foreach($_SESSION['user'] as $a)
                                                {{$a->hoten}}
                                            @endforeach</strong></p>
								<p><i class="fa fa-home font-some" aria-hidden="true"></i>  <span>Địa chỉ: {{$dc->diachi}} </span></p>
								<p><i class="fa fa-mobile font-some" aria-hidden="true"></i> <span>Điện thoại: {{$dc->sdt}} </span> </p>
								<p><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i> <span> Email: 
                                    @foreach($_SESSION['user'] as $a) 
                                    {{$a->email}} @endforeach </span></p>
								<p style="margin-top:20px;"><a href="/account/addresses" class="btn btn-full btn-primary">Sổ địa chỉ (0)</a></p>
                                @endforeach

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>

@stop