@extends('backend.masterview')
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
            <th>User</th>
            <th>Nội dung</th>
            <th>Thời gian</th>
            <th>Xóa bình luận</th>
          </tr>

        </thead>
        <tbody>
          @foreach($binhluans as $data)
          <form action="{{route('ad.xoaBinhLuan')}}" method="get">
              @csrf
            <td>{{$data->username}}</td>
            <td>{{$data->binhluan}}</td>
            <td> 
                {{$data->create_at}}
            </td>
            <td>
            <input type="hidden" value="{{ $data->mabl }}" name="mabl">
            <button type="submit" class="btn btn-primary">Xóa</button>
            </form>
            </td>
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