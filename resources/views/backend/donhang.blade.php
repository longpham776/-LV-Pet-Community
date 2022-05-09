@extends('backend.masterview')
@section('title','Quản lý đơn hàng')
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
           
            <th>ID</th>
            <th>Họ tên</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Phương thức thanh toán</th>
            <th>Tổng tiền</th>
            <th>Trạng thái đơn</th>
            <th>Xem chi tiết</th>
            
          </tr>

        </thead>
        <tbody>
          @foreach($getDH as $dh)
          <form action="{{route('ad.chitietDH')}}" method="get">
              @csrf
            <input type="hidden" value="{{ $dh->madon }}" name="id">
            
            <td>{{ $dh->madon}}</td>
            <td>{{ $dh->hoten}}</td>
            <td>{{$dh->diachi}}</td>
            <td>{{$dh->dienthoai}}</td>
            @if($dh->pttt == 0)
                <td>COD</td>
            @else
                <td>Online</td>
            @endif
            <td>{{$dh->thanhtien}}</td>
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
          <td>
          @foreach($getDH as $dh)
            <form >

            </form>
            @endforeach
          </td>
          </tr>
          

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