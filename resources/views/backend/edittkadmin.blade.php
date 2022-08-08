@extends('backend.masterview')
@section('content')
<div class="main-content">
<section id="main-content">
	<section class="wrapper">
		<div class="container py-5">
  <div class="panel panel-default">
 
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-body">
                <div class="login-form" >
                            <form action="{{route('ad.update_ad')}}" method="post" enctype="multipart/form-data">
                                @foreach($getAdmin as $ad)
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                     <input class="au-input au-input--full" type="text" name="username"  value="{{$ad->username}}">
                                     @error('username')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>Fullname</label>
                                    <input class="au-input au-input--full" type="text" name="fullname" value="{{$ad->hoten}}" >
                                     @error('fullname')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                               
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" value="{{$ad->email}}">
                                    @error('email')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Hình</label>
                                    <div class="col-lg-6">   
                                        <input type="file" name="image"  id="chooseFile"  >
                                    </div>
                                    <input type="hidden" name="image_old" value="{{ $ad->hinh }}">
                                </div>
                                @foreach($_SESSION['admin'] as $a)

                                <input type="hidden" name="quyen" value="{{ $a->quyen }}">
                                @endforeach
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Update</button>
                               @endforeach
                            </form>
                            
                        </div>
                </div>
            </section>
        </div>
    </div>
  </div>
</div>
</section>
</div>
@stop()