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
                    <div class=" form">
                        <form method="post" action="{{route('ad.insert_pro')}}"  enctype="multipart/form-data">
                        @csrf 
                                <div class="form-group ">
                                    <label class="control-label col-lg-3" >Mã sản phẩm</label>
                                    <div class="col-lg-6">
                                        <input class="au-input au-input--full"  id="cname" name="masp" minlength="2" type="text" >
                                        @error('masp')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-3" >Tên sản phẩm</label>
                                    <div class="col-lg-6">
                                        <input class="au-input au-input--full"  id="cname" name="tensp" minlength="2" type="text" >
                                        @error('tensp')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Loại sản phẩm</label>
                                    <div class="col-lg-6">
                                    <select name="loaisp">
                                            @foreach ($getLoai as $lsp)
                                                <option value="{{$lsp->maloai }}">
                                                    {{$lsp->tenloai }} 
                                                </option>
                                            @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Hãng</label>
                                    <div class="col-lg-6">
                                    <select name="hang">
                                            @foreach ($getTH as $th)
                                                <option value="{{$th->math }}">
                                                    {{$th->tenth }} 
                                                </option>
                                            @endforeach
                                            </select>
                                    </div>
                                </div>
                            
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Giá sản phẩm</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="cname" name="gia" minlength="2" type="text" >
                                        @error('gia')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Hình</label>
                                    <div class="col-lg-6">
                                       
                                        <input type="file" name="img"  id="chooseFile" >
                                        @error('img')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                        
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Mô tả</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="cname" name="mota" minlength="2" type="text" >
                                        @error('mota')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Công dụng</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="cname" name="congdung" minlength="2" type="text" >
                                        @error('congdung')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
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
</div>
@stop()