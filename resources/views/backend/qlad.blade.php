@extends('backend.masterview')
@section('content')
<div class="main-content">
<section id="main-content">
	<section class="wrapper">
		<div class="container py-5">
  <div class="panel panel-default">
  @foreach($_SESSION['admin'] as $a)
    @if($a->quyen == 3)
    <div class="panel-heading">
      <span class="tools pull-right">
      <a class="btn btn-primary" href="{{route('ad.add_ad')}}">Thêm</a>
      </span>
    </div>
    @endif
    @endforeach
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
        <tr>
            <th>Username</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Level</th>
            <th>Delete</th>
          </tr>

        </thead>
        <tbody>
          @foreach($getAdmin as $ad)
          <form action="{{route('ad.delete_ad')}}" method="get">
              @csrf
            <input type="hidden" value="{{ $ad->email }}" name="email">
            <td>{{$ad->username}}</td>
            <td>{{$ad->hoten}}</td>
            <td>{{$ad->email}}</td>
            <td>
                 @if ($ad->quyen ==2)
                    admin
                    @endif
                @if ($ad->quyen ==3)
                    master
                @endif
            </td>
            </form>
            <td>
            <input type="hidden" value="{{ $ad->username }}" name="username">
            <button>Delete</button>
           
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