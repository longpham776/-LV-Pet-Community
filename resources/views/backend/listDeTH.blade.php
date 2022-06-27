@extends('backend.masterview')
@section('content')
<div class="main-content">
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="container py-5">
    <div class="panel-heading">
      <span class="tools pull-right">
      <form action="{{route('ad.addhang')}}" method="get">
      <input name="tenhang" minlength="2" type="text" placeholder="Tên hãng mới" >
      <button class="btn btn-primary" >Thêm</button>
      </form>
    </span>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên hãng</th>
            <th>Khôi phục</th>
          </tr>

        </thead>
        <tbody>
          @foreach($getDeTH as $th)
          <form action="{{route('ad.restore_hang')}}" method="get">
              @csrf
            <input type="hidden" value="{{ $th->math }}" name="math">
            <td>{{$th->math}}</td>
            <td>{{$th->tenth}}</td>
            <td><button>Khôi phục</button></td>
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