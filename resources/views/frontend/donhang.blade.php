@extends('frontend.masterview')
@section('content')
<div class="container py-5">
    <div class="row mb ">
        <div class="box mr" id="bill">
            <div class="row" >
                <h1>THÔNG TIN ĐƠN HÀNG</h1>
                <table class="thongtinnhanhang">
                    <tr>
                        <td width="20%">Họ tên</td>
                        <td>{{$thongtin['hoten']}}</td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td>{{$thongtin['diachi']}}</td>
                    </tr>
                    <tr>
                        <td>Điện thoại</td>
                        <td>{{$thongtin['dienthoai']}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$thongtin['email']}}</td>
                    </tr>
                    <tr>
                        <td>Phương thức thanh toán</td>
                        <td>{{$thongtin['pttt']}}</td>
                    </tr>
                </table>
            </div>
            <div class="row mb">
                <h1>ĐƠN HÀNG</h1>
                <table border="1" >
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>&ensp;&ensp;&ensp;Hình</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền (VNĐ)</th>
                    </tr>
                    @php $i=0 @endphp
                    @foreach(Cart::content() as $sp)
                    <tr>
                        <td>{{$i+=1}}</td>
                        <td><a href="{{route('chitietsanpham',['id'=>$sp->id])}}" style="text-decoration: none"><font color="black">{{$sp->name}}</font></a></td>
                        <td><a href="{{route('chitietsanpham',['id'=>$sp->id])}}"><img src="{{url('public')}}/frontend/img/{{$sp->options->images}}" style="width:100px;height:100px;" alt=""></a></td>
                        <td>{{$sp->price}}</td>
                        <td>
                            <input type="text" size="1" style="text-align:center" readonly value="{{$sp->qty}}">
                            <!-- <a href="{{route('upcart',['id'=>$sp->id,'qty'=>$sp->qty])}}" style="text-decoration: none">Update</a> -->
                        </td>
                        <td><div>{{number_format($sp->price*$sp->qty)}} VNĐ</div></td>
                    </tr>
                    @endforeach
                    {{Cart::destroy()}}
                </table>
            </div>
        </div>
    </div>
</div>
@stop