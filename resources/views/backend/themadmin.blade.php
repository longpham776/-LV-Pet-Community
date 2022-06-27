@extends('backend.masterview')
@section('content')
<div class="main-content">
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
 
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-body">
                <div class="login-form" >
                            <form action="{{route('ad.insert_ad')}}" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                     <input class="au-input au-input--full" type="text" name="username" placeholder="Username">
                                     @error('username')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>Fullname</label>
                                    <input class="au-input au-input--full" type="text" name="fullname" placeholder="fullname">
                                     @error('fullname')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                               
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                    @error('email')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                    @error('password')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Hình</label>
                                    <div class="col-lg-6">   
                                        <input type="file" name="image"  id="chooseFile"  >
                                    </div>
                                </div>
                                <div class="form-group">
                                <label>Level</label>
                                <select name="quyen">
                                           
                                           <option value="2">
                                              Admin
                                           </option>
                                           <option value="3">
                                             Master
                                           </option>
                                       </select>
                                </div> 
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Thêm</button>
                               
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