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
                        <td></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Điện thoại</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Phương thức thanh toán</td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="row mb">
                <h1>ĐƠN HÀNG</h1>
                <table border="1" >
                    <tr>
                        <th>STT</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>&ensp;&ensp;Hình</th>
                        <th>Số lượng</th>
                        <th>Thành tiền ($)</th>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>
</div>
@stop