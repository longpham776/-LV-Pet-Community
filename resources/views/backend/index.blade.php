@extends('backend.masterview')
@section('title','Quản lý sản phẩm')
@section('content')
<div class="main-content">
<section id="main-content">
	<section class="wrapper">
		<div class="container py-5">
  <div class="panel panel-default">
    <div class="panel-heading">
    
      <span class="tools pull-right">
      <a class="btn btn-primary" href="{{route('ad.listdelete')}}">Sản phẩm đã xóa</a>
    </span>
    <span class="tools pull-left">
      <a class="btn btn-primary" href="{{route('ad.addsp')}}">Thêm</a>
    </span>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
        <tr>
           
            <th>ID</th>
            <th>Hình</th>
            <th>Tên sản phẩm</th>
            <th>Loại sản phẩm</th>
            <th>Giá</th>
            <th>Nội dung</th>
            <th>Sửa</th>
            <th>Xóa</th>
            <th>Bình luận</th>
          </tr>

        </thead>
        <tbody>
          @foreach($getSP as $sp)
          <form action="{{route('ad.edit_pro')}}" method="get">
              @csrf
            <input type="hidden" value="{{ $sp->masp }}" name="masp">
            
            <td>{{$sp->masp}}</td>
            <td><img src="{{url('public')}}/frontend/img/{{$sp->hinh}}" 
                weight=200px height=200px class="image_pro"></td>
            <td>{{$sp->tensp}}</td>
            <td>
              @foreach($getLoai as $data)
                @if($data->maloai == $sp->loaisp)
                  {{$data->tenloai}}
                @endif
              @endforeach
            </td>
            <td>{{$sp->gia}}VNĐ</td>
            <td>
              {{$sp->mota}}
            </td>
            <td><button class="btn btn-primary">Sửa</button></td>
            </form>
            <td> <form action="{{route('ad.delete_pro')}}" method="get">
            <input type="hidden" value="{{ $sp->masp }}" name="masp">
            <button class="btn btn-primary">Xóa</button>
                </form>
            </td>
            <td>
              <form action="{{route('ad.listBinhLuan')}}" method="get">
              <input type="hidden" value="{{ $sp->masp }}" name="masp">
              <button class="btn btn-primary">Bình luận</button>
              </form>
            </td>
          </tr>
          
          <tr>
          @endforeach
        </tbody>
      </table>
      <br>
    </div>
    @php $i=0 @endphp
                <div div="row">
                    <ul class="pagination pagination-lg justify-content-end">
                        @foreach($getSP->links()->elements[0] as $page)
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="{{$page}}" tabindex="-1">@php echo $i+=1 @endphp</a>  
                        @endforeach
                    </ul>
                </div>
    
  </div>
</div>
</section>
</div>
            @stop