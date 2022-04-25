@extends('backend.masterview')
@section('content')
<div class="main-content">
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      <span class="tools pull-right">
      <form action="{{route('ad.addloai')}}" method="get">
      <input name="tenloai" minlength="2" type="text" placeholder="Tên loại mới" >
      <button class="btn btn-primary" >Thêm</button>
      </form>
    </span>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên loại</th>
            <th>Xóa</th>
          </tr>

        </thead>
        <tbody>
          @foreach($getLoai as $loai)
          <form action="{{route('ad.delete_loai')}}" method="get">
              @csrf
            <input type="hidden" value="{{ $loai->maloai }}" name="maloai">
            <td>{{$loai->maloai}}</td>
            <td>{{$loai->tenloai}}</td>
            <td><button>Xóa</button></td>
            </form>
           
          </tr>
          
          <tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
  </div>
</div>
</section>
</div>
            @stop