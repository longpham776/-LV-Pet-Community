@extends('backend.masterview')
@section('title','Chi tiết đơn hàng')
@section('content')
<div class="main-content">
<section id="main-content">
	<section class="wrapper">
		<div class="container py-5">
  <div class="panel panel-default">
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
        <tr>
           
            <th>ID sản phẩm</th>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Hình</th>
            <th>Số Lượng</th>
            <th>Thành tiền</th>
            <th>Trạng thái</th>
          </tr>

        </thead>
        <tbody>
          @foreach($getCTD as $ct)
          <form action="{{route('ad.edit_pro')}}" method="get">
              @csrf
            <input type="hidden" value="{{ $ct->stt }}" name="id">
            
            <td>{{$ct->masp}}</td>
            <td>{{$ct->tensp}}</td>
            <td>{{$ct->gia}}VNĐ</td>
            <td><img src="{{url('public')}}/frontend/assets/img/{{$ct->hinh}}" 
                weight=200px height=200px></td>
             <td>
              {{$ct->soluong}}
            </td>
            <td>{{$ct->thanhtien}}</td>
            @if($ct->trangthai == 0)
            <td>Chưa chuẩn bị</td>
            @elseif($ct->trangthai == 1)
            <td>Đã chuẩn bị</td>
            @endif
            
            </form>
            
          </tr>
          
          <tr>
          @endforeach
        </tbody>
      </table>
      <br>
    </div>
   
    
  </div>
</div>
</section>
</div>
            @stop