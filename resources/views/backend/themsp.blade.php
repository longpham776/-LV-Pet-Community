@extends('backend.masterview')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thêm sản phẩm
    </div>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-body">
                    <div class=" form">
                        <form class="cmxform form-horizontal" id="commentForm" method="post" action="#"  enctype="multipart/form-data">
                        @csrf 
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Tên sản phẩm</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="cname" name="tensanpham" minlength="2" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Loại sản phẩm</label>
                                    <div class="col-lg-6">
                                    <select name="loaisanpham">
                                            @foreach ($getLoai as $lsp)
                                                <option value="{{$lsp->maloai }}">
                                                    {{$lsp->tenloai }} 
                                                </option>
                                            @endforeach
                                            </select>
                                    </div>
                                </div>
                            
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Giá sản phẩm</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="cname" name="gia" minlength="2" type="text" required="">
                                    </div>
                                </div>
                                
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Hình</label>
                                    <div class="col-lg-6">
                                        <!-- <input class=" form-control" id="cname" name="name" minlength="2" type="text" required=""> -->
                                        <input type="file" name="avatar" class="custom-file-input" id="chooseFile" required="image">
                                        
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Mô tả</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="cname" name="mota" minlength="2" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Trạng thái</label>
                                    <div class="col-lg-6">
                                    <select name="status">
                                           
                                                <option value="0">
                                                   Active
                                                </option>
                                                <option value="1">
                                                   Unactive
                                                </option>
                                            </select>
                                    </div>
                                </div>
                                
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" type="submit">Thêm</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
  </div>
</div>
</section>
@stop()