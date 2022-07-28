@extends('backend.masterview')
@section('content')
<div class="main-content">
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="container py-5">
 
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-body">
                    <div class=" form">
                       
                        <form method="post" action="{{route('ad.update_pro')}}"  enctype="multipart/form-data">
                        @csrf
                        @foreach($getSP as $sp)
                                <div class="form-group ">
                                    <label class="control-label col-lg-3" >Mã sản phẩm</label>
                                    <div class="col-lg-6">
                                        <input class="au-input au-input--full"  id="cname" name="masp" minlength="2" type="text" value="{{ $sp->masp }}">
                                     </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-3" >Tên sản phẩm</label>
                                    <div class="col-lg-6">
                                        <input class="au-input au-input--full"  id="cname" name="tensp" minlength="2" type="text" value="{{ $sp->tensp }}">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Loại sản phẩm</label>
                                    <div class="col-lg-6">
                                    <select name="loaisp" >
                                        
                                    @foreach ($getLoai as $lsp)
                                           
                                            @if ($lsp->maloai==$sp->loaisp)
                                                <option value="{{ $lsp->maloai }}">{{ $lsp->tenloai }}</option>
                                            @endif
                                        @endforeach
                                        @foreach ($getLoai as $lsp)
                                               <option value="{{ $lsp->maloai }}">{{ $lsp->tenloai }}</option>
                                       @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Hãng</label>
                                    <div class="col-lg-6">
                                    <select name="hang">

                                            @foreach ($getTH as $th)
                                            
                                                @if ($th->math==$sp->math)
                                                    <option value="{{ $th->math }}">{{ $th->tenth }}</option>
                                                @endif
                                            @endforeach
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
                                        <input class=" form-control" id="cname" name="gia" minlength="2" type="text" value="{{ $sp->gia }} ">

                                    </div>
                                </div>
                                
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Hình</label>
                                    <div class="col-lg-6">   
                                        <input type="file" name="image"  id="chooseFile"  >
                                    </div>
                                    <input type="hidden" name="image_old" value="{{ $sp->hinh }}">
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Mô tả</label>
                                    <div class="col-lg-6">
                                        <textarea class=" form-control" id="cname" name="mota" minlength="2" type="text" value="{{ $sp->mota }}" rows="8" cols="50">{{ $sp->mota }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Công dụng</label>
                                    <div class="col-lg-6">
                                        <textarea class=" form-control" id="cname" name="congdung" minlength="2" type="text" value="{{ $sp->congdung }}" rows="8" cols="50" >{{ $sp->congdung }}
                                            </textarea>
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
                                        <button class="btn btn-primary" type="submit">cập nhật</button>
                                    </div>
                                </div>
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