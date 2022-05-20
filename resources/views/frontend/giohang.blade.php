@extends('frontend.masterview')
@section('content')
<div class="container py-5">
    <div class="row mb ">
    <form method="post" action="{{route('postcheckout')}}">
        @csrf
        <div class="box mr" id="bill">
            <div class="row" >
                <h1>THÔNG TIN NHẬN HÀNG</h1>
                <table class="thongtinnhanhang">
                @if(isset($_SESSION['user']))
                                            @foreach($_SESSION['user'] as $u)
                                            <tr>
                        <td width="20%"><b>Họ tên</b></td>
                        <td><input type="text" name="hoten" placeholder="Nhập họ tên người nhận" required value="{{$u->hoten}}" class="form-control"></td>
                    </tr>
                    @foreach ($getDC as $dc)
                    <tr>
                        <td><b>Địa chỉ</b></td>
                        <td><input type="text" name="diachi" placeholder="Nhập địa chỉ giao hàng" required class="form-control" value="{{$dc->diachi}}"></td>
                    </tr>
                    <tr>
                        <td><b>Điện thoại</b></td>
                        <td><input type="text" name="dienthoai" placeholder="Nhập số điện thoại liên lạc" required class="form-control" value="0{{$dc->sdt}}"></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td><b>Email</b></td>
                        <td><input type="email" name="email" placeholder="Nhập địa chỉ Email" required class="form-control"value="{{$u->email}}"></td>
                    </tr>
                    <tr>
                        <td><b>Phương thức thanh toán</b></td>
                        <td><select id="sterilizations" name="pttt" class="form-control">
                            <option value="0">Thanh toán khi nhận hàng</option>
                            <option value="1">Thanh toán online</option>
                        </select></td>
                    </tr> 

                                            @endforeach
                    @else
                    <tr>
                        <td width="20%"><b>Họ tên</b></td>
                        <td><input type="text" name="hoten" placeholder="Nhập họ tên người nhận" required class="form-control"></td>
                    </tr>
                    <tr>
                        <td><b>Địa chỉ</b></td>
                        <td><input type="text" name="diachi" placeholder="Nhập địa chỉ giao hàng" required class="form-control"></td>
                    </tr>
                    <tr>
                        <td><b>Điện thoại</b></td>
                        <td><input type="text" name="dienthoai" placeholder="Nhập số điện thoại liên lạc" required class="form-control"></td>
                    </tr>
                    <tr>
                        <td><b>Email</b></td>
                        <td><input type="email" name="email" placeholder="Nhập địa chỉ Email" required class="form-control"></td>
                    </tr>
                    <tr>
                        <td><b>Phương thức thanh toán</b></td>
                        <td><select id="sterilizations" name="pttt" class="form-control">
                            <option value="0">Thanh toán khi nhận hàng</option>
                            <option value="1">Thanh toán online</option>
                        </select></td>
                    </tr>
                 @endif
                  
                </table>
            </div>
            <div class="row mb">
                <h1>GIỎ HÀNG</h1>
                <table border="1" >
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>&ensp;&ensp;&ensp;Hình</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền (VNĐ)</th>
                        <th>Xóa</th>
                    </tr>
                    @php $i=0 @endphp
                    @foreach(Cart::content() as $sp)
                    <tr>
                        <td>{{$i+=1}}</td>
                        <td><a href="{{route('chitietsanpham',['id'=>$sp->id])}}" style="text-decoration: none"><font color="black">{{$sp->name}}</font></a></td>
                        <td><a href="{{route('chitietsanpham',['id'=>$sp->id])}}"><img src="{{url('public')}}/frontend/img/{{$sp->options->images}}" style="width:100px;height:100px;" alt=""></a></td>
                        <td>{{$sp->price}}</td>
                        <td>
                            <input type="text" size="1" style="text-align:center" value="{{$sp->qty}}">
                            <!-- <a href="{{route('upcart',['id'=>$sp->id,'qty'=>$sp->qty])}}" style="text-decoration: none">Update</a> -->
                        </td>
                        <td><div>{{number_format($sp->price*$sp->qty)}} VNĐ</div></td>
                        <td><a href="{{route('delcart',['id'=>$sp->rowId])}}" style="text-decoration: none">X</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <br/>
            <div class="row mb">
                <h2>Tổng tiền</h2>
                <table border="1" >
                    <tr>
                        <th colpan=""></th>
                        <th>Subtotal: {{Cart::subtotal()}}VNĐ</th>
                    </tr>
                    <tr>
                        <th colpan=""></th>
                        <th>Tax: {{Cart::tax()}}VNĐ</th>
                    </tr>
                    <tr>
                        <th colspan=""></th>
                        <th>Total: {{Cart::total()}}VNĐ</th>
                    </tr>
                </table>
            </div>
            <div class="row mb">
                <input type="submit" value="ĐỒNG Ý ĐẶT HÀNG" name="submitcart">
            </div>
        </div>
    </form>
    </div>
    <br>
    <form method="POST" action="{{route('momo_payment')}}">
        @csrf
        <input type="hidden" name="total_momo" value="">
        <button type="submit" name="payUrl">Thanh Toán MOMO</button>
    </form>
    <br>
    <form method="POST" action="{{route('vn_payment')}}">
        @csrf
        <input type="hidden" name="total_momo" value="">
        <button type="submit" name="redirect">Thanh Toán VNPay</button>
    </form>
    <br>
    <a href="{{route('sanpham')}}"><input type="button" value="TIẾP TỤC ĐẶT HÀNG"></a>
    <a href="{{route('destroycart')}}"><input type="button" value="XÓA GIỎ HÀNG"></a>
</div>
@stop