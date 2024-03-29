@extends('frontend.masterview')
@section('content')
<div class="container py-5">
    <div class="row mb ">
    <form id="form-delivery" method="post" action="{{route('postcheckout')}}">
        @csrf
        <div class="box mr" id="bill">
            <div class="row" >
                <h1>@lang('lang.deliveryinfomation')</h1>
                <table class="thongtinnhanhang">
                @if(isset($_SESSION['user']))
                    @foreach($_SESSION['user'] as $u)
                    <tr>
                        <td width="20%"><b>@lang('lang.fullname')</b></td>
                        <td><input type="text" id="hoten" name="hoten" placeholder="@lang('lang.enterfullname')" required value="{{$u->hoten}}" class="form-control"></td>
                    </tr>
                    @if($getDC->isEmpty())
                    <tr>
                        <td><b>@lang('lang.address')</b></td>
                        <td><input type="text" id="diachi" name="diachi" placeholder="@lang('lang.enteraddress')" required class="form-control"></td>
                    </tr>
                    <tr>
                        <td><b>@lang('lang.phone')</b></td>
                        <td><input type="text" id="dienthoai" name="dienthoai" placeholder="@lang('lang.enterphone')" required class="form-control"></td>
                    </tr>
                    @else
                    <tr>
                        <td><b>@lang('lang.address')</b></td>
                        <td><select id="diachi" name="diachi" class="form-control">
                            @foreach ($getDC as $dc)
                            <option value="{{$dc->diachi}}">{{$dc->diachi}}</option>
                            @endforeach
                        </select></td>
                    </tr>
                    <tr>
                        <td><b>@lang('lang.phone')</b></td>
                        <td><select id="dienthoai" name="dienthoai" class="form-control">
                            @foreach ($getDC as $dc)
                            <option value="0{{$dc->sdt}}">0{{$dc->sdt}}</option>
                            @endforeach
                        </select></td>
                    </tr>
                    @endif
                    <tr>
                        <td><b>Email</b></td>
                        <td><input type="email" readonly id="email" name="email" placeholder="@lang('lang.enteremail')" required class="form-control"value="{{$u->email}}"></td>
                    </tr>
                    <tr>
                        <td><b>@lang('lang.paymentmethods')</b></td>
                        <td><input type="text" readonly id="pttt" name="pttt" class="form-control"></td>
                    </tr> 

                    @endforeach
                    @else
                    <tr>
                        <td width="20%"><b>@lang('lang.fullname')</b></td>
                        <td><input type="text" id="hoten" name="hoten" placeholder="@lang('lang.enterfullname')" required class="form-control"></td>
                    </tr>
                    <tr>
                        <td><b>@lang('lang.address')</b></td>
                        <td><input type="text" id="diachi" name="diachi" placeholder="@lang('lang.enteraddress')" required class="form-control"></td>
                    </tr>
                    <tr>
                        <td><b>@lang('lang.phone')</b></td>
                        <td><input type="text" id="dienthoai" name="dienthoai" placeholder="@lang('lang.enterphone')" required class="form-control"></td>
                    </tr>
                    <tr>
                        <td><b>Email</b></td>
                        <td><input type="email" id="email" name="email" placeholder="@lang('lang.enteremail')" required class="form-control"></td>
                    </tr>
                    <tr>
                        <td><b>@lang('lang.paymentmethods')</b></td>
                        <td><select id="pttt" name="pttt" class="form-control">
                            <option value="0">@lang('lang.paymentondelivery')</option>
                            <option value="1">@lang('lang.onlinepayment')</option>
                        </select></td>
                    </tr>
                 @endif
                  
                </table>
            </div>
            <div class="row mb">
                <h1>@lang('lang.cart')</h1>
                <table border="1" >
                    <tr>
                        <th>STT</th>
                        <th>@lang('lang.nameproduct')</th>
                        <th>&ensp;&ensp;&ensp;@lang('lang.image')</th>
                        <th>@lang('lang.price')</th>
                        <th>@lang('lang.quantity')</th>
                        <th>@lang('lang.subprice')</th>
                        <th>@lang('lang.delete')</th>
                    </tr>
                    @php $i=0 @endphp
                    @foreach(Cart::content() as $sp)
                    <tr>
                        <td>{{$i+=1}}</td>
                        <td><a href="{{route('chitietsanpham',['id'=>$sp->id])}}" style="text-decoration: none"><font color="black">{{$sp->name}}</font></a></td>
                        <td><a href="{{route('chitietsanpham',['id'=>$sp->id])}}"><img src="{{url('public')}}/frontend/img/{{$sp->options->images}}" style="width:100px;height:100px;" alt=""></a></td>
                        <td>{{$sp->price}}</td>
                        <td>
                            <input type="text" size="1" readonly style="text-align:center" value="{{$sp->qty}}">
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
                <h2>@lang('lang.totalprice')</h2>
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
                <input type="submit" class="btn btn-primary" id="btnOrderOff" value="@lang('lang.acceptorder')" name="submitcart">
            </div>
        </div>
    </form>
    </div>
    <!-- <br>
    <form method="POST" action="{{route('momo_payment')}}">
        @csrf
        <input type="hidden" name="total_momo" value="">
        <button type="submit" name="payUrl">@lang('lang.payment')</button>
    </form> -->
    <br>
    <form id="form-payment" method="POST" action="{{route('vn_payment')}}">
        @csrf
        <button type="submit" class="btn btn-primary" id="btnOrderOn" onclick="formDelivery()" name="redirect">@lang('lang.vnpaypayment')</button>
    </form>
    <br>
    <a href="{{route('sanpham')}}"><input type="button" class="btn btn-primary" value="@lang('lang.continue')"></a>
    <a href="{{route('destroycart')}}"><input type="button" class="btn btn-primary" value="@lang('lang.deletecart')"></a>
</div>
<script>
    //Make sure that the dom is ready
    function formDelivery(){
        // alert("Data!"+$('#hoten').val()+$('#diachi').val()+$('#dienthoai').val()+$('#email').val()+$('#pttt').val());
        sessionStorage.setItem('hoten',$('#hoten').val());
        sessionStorage.setItem('diachi',$('#diachi').val());
        sessionStorage.setItem('dienthoai',$('#dienthoai').val());
        sessionStorage.setItem('email',$('#email').val());
        sessionStorage.setItem('pttt',$('#pttt').val());
    }
</script>
<style type="text/css">
    .btn-primary {
        background-color: #17A45A;
    }
    .btn-primary:hover {
        background-color: #555;
    }
</style>
<script>
        const btnOrderOff = document.querySelector("#btnOrderOff");
        const btnOrderOn = document.querySelector("#btnOrderOn");
        const pttt = document.getElementById('pttt');

        btnOrderOff.addEventListener("mouseover", ()=>{
            pttt.value = "Thanh toán khi nhận hàng";
        });
        btnOrderOn.addEventListener("mouseover", ()=>{
            pttt.value = "Thanh toán online";
        });
    </script>
@stop