@extends('frontend.masterview')
@section('content')
<div class="table-responsive">
      <table class="mx-auto" style="width:400px; " >      
            @foreach($getSP as $sp)
            {
            <tr>
            <td style=" text-align: center"><img src="{{url('public')}}/frontend/img/{{$sp->hinh}}" width="300px" ></td>
            </tr>
            <tr>
              <td style=" text-align: center; font-size: 30px">
                <b>{{$sp->tensp}} </b>
              </td>
            </tr>
            <tr >
                <td style=" text-align: center; font-size: 20px; ">
                <form method="get" action="{{route('upbinhluan')}}">
                <div class="form-group">
                  <label>Đánh giá</label>
                  <input type="hidden" name="id_sp" value="{{$sp->masp}}">
                  <input type="hidden" name="id" value="{{$id}}">
                  <input type="range" class="form-control" min="0" max="5" name="danhgia" value="0">
                  <p>0-5</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nhận xét</label>
                  <textarea class=" form-control" id="cname" name="nhanxet" minlength="2" type="text" value="" rows="8" cols="50" ></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Đánh giá</button>
              </form>
                </td>
            </tr>
            @endforeach
      </table>
      <br>
    </div>
@stop