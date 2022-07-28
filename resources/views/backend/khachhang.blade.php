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
            <th>Fullname</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Reset Password</th>
          </tr>

        </thead>
        <tbody>
          @foreach($kh as $data)
          <form action="{{route('ad.resetPass')}}" method="get">
              @csrf
            <input type="hidden" value="{{ $data->email }}" name="email">
            <td>{{$data->hoten}}</td>
            <td>{{$data->email}}</td>
            <td> 
              @foreach($phones as $phone)
                @if($phone->username == $data->username && $phone->trangthai == 0)
                {{$phone->sdt}}
                @endif
              @endforeach
            </td>
            <td>
            <input type="hidden" value="{{ $data->username }}" name="username">
            <button type="submit" class="btn btn-primary">Reset</button>
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