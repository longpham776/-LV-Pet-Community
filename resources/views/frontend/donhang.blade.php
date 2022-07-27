@extends('frontend.masterview')
@section('content')
<div class="container py-5">
    <div class="row mb ">
        <div class="box mr" id="bill">
            <div class="row" >
                <h1>@lang('lang.orderinformation')</h1>
                <table class="thongtinnhanhang">
                    <tr>
                        <td width="20%">@lang('lang.fullname')</td>
                        <td>{{$thongtin['hoten']}}</td>
                    </tr>
                    <tr>
                        <td>@lang('lang.address')</td>
                        <td>{{$thongtin['diachi']}}</td>
                    </tr>
                    <tr>
                        <td>@lang('lang.phone')</td>
                        <td>{{$thongtin['dienthoai']}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$thongtin['email']}}</td>
                    </tr>
                    <tr>
                        <td>@lang('lang.paymentmethods')</td>
                        <td>{{$thongtin['pttt']}}</td>
                    </tr>
                </table>
            </div>
            <div class="row mb">
                <h1>@lang('lang.order')</h1>
                <table border="1" >
                    <tr>
                        <th>STT</th>
                        <th>@lang('lang.nameproduct')</th>
                        <th>&ensp;&ensp;&ensp;@lang('lang.image')</th>
                        <th>@lang('lang.price')</th>
                        <th>@lang('lang.quantity')</th>
                        <th>@lang('lang.subprice')</th>
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