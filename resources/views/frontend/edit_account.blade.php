@extends('frontend.masterview')

@section('content')
<section>
    <br>
    <div class="container page_address margin-bottom-20">
        <div class="row">
            <div class="col-xs-12 col-lg-12 adr_title">
                <a class="f-right a_address" href="{{route('account')}}" style="text-decoration:none;" alt=""><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại trang tài khoản</a>
            </div>
        </div>
        <div class="login-form">
            <form action="{{route('update-address')}}" method="post">
                @csrf
                @foreach($diachi as $dc)
                @foreach($dataUser as $a)
                <input type="hidden" type="text" name="username" value="{{ $a->username }}">
                <div class="form-group">

                    <label>Fullname</label>
                    <input class="form-control" type="text" name="fullname" value="{{$a->hoten}}">
                    @error('fullname')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input class="form-control" type="email" name="email" value="{{$a->email}}">
                    @error('email')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                @endforeach
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" type="number" name="phone" value="{{$dc->sdt}}">
                    @error('phone')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" type="text" name="address" value="{{$dc->diachi}}">
                    @error('address')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Update</button>
                @endforeach
            </form>
        </div>
    </div>
</section>
<br>

@stop