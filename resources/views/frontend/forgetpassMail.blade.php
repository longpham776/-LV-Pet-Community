<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <i class="fas fa-h2">Chào bạn, chúng tôi gửi bạn</i>
    <div class="container-fluid">
    <h1>Thông tin account</h1>
    <div class="row">
        <div class="col-sm-2" style="background-color:lavender;"><b>Username:</b></div>
        <div class="col-sm-8" style="background-color:lavenderblush;">{{$thongtin[0]->username}}</div>
    </div>
    <div class="row">
        <div class="col-sm-2" style="background-color:lavender;"><b>Password:</b></div>
        <div class="col-sm-8" style="background-color:lavenderblush;">{{$thongtin[0]->password}}</div>
    </div>
    <div class="row">
        <div class="col-sm-2" style="background-color:lavender;"><b>Họ tên:</b></div>
        <div class="col-sm-8" style="background-color:lavenderblush;">{{$thongtin[0]->hoten}}</div>
    </div>
    <div class="row">
        <div class="col-sm-2" style="background-color:lavender;"><b>E-mail:</b></div>
        <div class="col-sm-8" style="background-color:lavenderblush;">{{$thongtin[0]->email}}</div>
    </div>
    <div class="row">
        <div class="col-sm-2" style="background-color:lavender;"><b>Hình:</b></div>
        <div class="col-sm-8" style="background-color:lavenderblush;">{{$thongtin[0]->hinh}}</div>
    </div>
    <div class="row">
        <div class="col-sm-2" style="background-color:lavender;"><b>Đổi Password vui lòng nhấp liên kết dưới:</b></div>
        <div class="col-sm-8" style="background-color:lavenderblush;">
            <a href="{{route('changepass',['email'=>$thongtin[0]->email])}}">Quên mật khẩu?</a>
        </div>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>