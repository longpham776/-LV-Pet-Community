@extends('frontend.masterview')
@section('content')
<div class="container py-5">
    <div class="row mb ">
    <form method="post" action="{{route('postcheckout')}}">
        @csrf
        <div class="box mr" id="bill">
            <div class="row" >
                <h1>@lang('lang.deliveryinfomation')</h1>
                <table class="thongtinnhanhang">
                @if(isset($_SESSION['user']))
                                            @foreach($_SESSION['user'] as $u)
                                            <tr>
                        <td width="20%"><b>@lang('lang.fullname')</b></td>
                        <td><input type="text" name="hoten" placeholder="@lang('lang.enterfullname')" required value="{{$u->hoten}}" class="form-control"></td>
                    </tr>
                    @foreach ($getDC as $dc)
                    <tr>
                        <td><b>@lang('lang.address')</b></td>
                        <td><input type="text" name="diachi" placeholder="@lang('lang.enteraddress')" required class="form-control" value="{{$dc->diachi}}"></td>
                    </tr>
                    <tr>
                        <td><b>@lang('lang.phone')</b></td>
                        <td><input type="text" name="dienthoai" placeholder="@lang('lang.enterphone')" required class="form-control" value="0{{$dc->sdt}}"></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td><b>Email</b></td>
                        <td><input type="email" name="email" placeholder="@lang('lang.enteremail')" required class="form-control"value="{{$u->email}}"></td>
                    </tr>
                    <tr>
                        <td><b>@lang('lang.paymentmethods')</b></td>
                        <td><select id="sterilizations" name="pttt" class="form-control">
                            <option value="0">@lang('lang.paymentondelivery')</option>
                            <option value="1">@lang('lang.onlinepayment')</option>
                        </select></td>
                    </tr> 

                                            @endforeach
                    @else
                    <tr>
                        <td width="20%"><b>@lang('lang.fullname')</b></td>
                        <td><input type="text" name="hoten" placeholder="@lang('lang.enterfullname')" required class="form-control"></td>
                    </tr>
                    <tr>
                        <td><b>@lang('lang.address')</b></td>
                        <td><input type="text" name="diachi" placeholder="@lang('lang.enteraddress')" required class="form-control"></td>
                    </tr>
                    <tr>
                        <td><b>@lang('lang.phone')</b></td>
                        <td><input type="text" name="dienthoai" placeholder="@lang('lang.enterphone')" required class="form-control"></td>
                    </tr>
                    <tr>
                        <td><b>Email</b></td>
                        <td><input type="email" name="email" placeholder="@lang('lang.enteremail')" required class="form-control"></td>
                    </tr>
                    <tr>
                        <td><b>@lang('lang.paymentmethods')</b></td>
                        <td><select id="sterilizations" name="pttt" class="form-control">
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
                <input type="submit" value="@lang('lang.acceptorder')" name="submitcart">
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
    <form method="POST" action="{{route('vn_payment')}}">
        @csrf
        <input type="hidden" name="total_momo" value="">
        <button type="submit" name="redirect">@lang('lang.vnpaypayment')</button>
    </form>
    <br>
    <a href="{{route('sanpham')}}"><input type="button" value="@lang('lang.continue')"></a>
    <a href="{{route('destroycart')}}"><input type="button" value="@lang('lang.deletecart')"></a>
</div>
@stop