@extends('backend.masterview')
@section('content')
<div class="main-content">
<section id="main-content">
	<section class="wrapper">
		<div class="container py-5">
  <div class="panel panel-default">
    <div class="panel-heading">
    
     <h3>Danh sách sản phẩm đã xóa</h3>

    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
        <tr>
            <th>ID</th>
            <th>Hình</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Nội dung</th>
            <th>Khôi phục</th>
          </tr>

        </thead>
        <tbody>
          @foreach($getSP as $sp)
          <form action="{{route('ad.remove_pro')}}" method="get">
              @csrf
            <input type="hidden" value="{{ $sp->masp }}" name="masp">
            <td>{{$sp->masp}}</td>
            <td><img src="{{url('public')}}/frontend/img/{{$sp->hinh}}" 
                weight=200px height=200px></td>
            <td>{{$sp->tensp}}</td>
            <td>{{$sp->gia}}VNĐ</td>
            <td>
              {{$sp->mota}}
            </td>
            <td><button>Khôi phục</button></button></td>
            </form>
           
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