@extends('frontend.masterview')

@section('content')
<section>
    <br>
    <div class="container page_address margin-bottom-20">
        <div class="row">
            <div class="col-xs-12 col-lg-12 adr_title">
                <a class="f-right a_address" href="{{route('account')}}" style="text-decoration:none;color:#17A45A;" alt="">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i><strong style="line-height: 30px;">Quay lại trang tài khoản</strong>
                </a>
            </div>
        </div>
    </div>
    <div class="container light-style flex-grow-1 container-p-y">

        <h4 class="font-weight-bold py-3 mb-4">
            Account settings
        </h4>

        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">@lang('lang.address')</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">

                        <div class="tab-pane fade active show" id="account-general">
                            <form action="{{route('editInfo')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @foreach($dataUser as $u)
                                <div class="card-body media align-items-center">
                                    @if(!$u->hinh)
                                    <img id="img-preview" src="https://secure.gravatar.com/avatar/3dbbb7b9f09bd1f312374056bb92b3e1?s=96&d=https%3A%2F%2Fstatic.teamtreehouse.com%2Fassets%2Fcontent%2Fdefault_avatar-ea7cf6abde4eec089a4e03cc925d0e893e428b2b6971b12405a9b118c837eaa2.png&r=pg" alt="" class="d-block ui-w-80">
                                    @else
                                    <img id="img-preview" src="{{url('public')}}/frontend/avatar/{{$u->hinh}}" alt="" class="d-block ui-w-80">
                                    @endif
                                    <div class="media-body ml-4">
                                        <label class="btn btn-outline-primary">
                                            Upload new photo
                                            <input accept="image/*" type="file" id="file-input" name="image" class="account-settings-fileinput">
                                        </label> &nbsp;
                                        <button type="button" id="resetimg" class="btn btn-default md-btn-flat">Reset</button>

                                        <div class="text-light small mt-1">Allowed JPG or PNG</div>
                                        <input type="hidden" readonly id="hinh" name="hinh" value="{{$u->hinh}}">
                                    </div>
                                </div>
                                <hr class="border-light m-0">
                                
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="username" readonly class="form-control mb-1" value="{{$u->username}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">@lang('lang.fullname')</label>
                                        <input type="text" name="hoten" class="form-control" value="{{$u->hoten}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">@lang('lang.password')</label>
                                        <input type="password" id="unvisiblepass" readonly class="form-control" value="{{$u->password}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">E-mail</label>
                                        <input type="text" readonly name="email" class="form-control mb-1" value="{{$u->email}}">
                                        @if($u->trangthai == 1)
                                        <div class="alert alert-warning mt-3">
                                            Your email is not confirmed. Please check your inbox.<br>
                                            <a href="javascript:void(0)">Resend confirmation</a>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="text-right mt-3">
                                        <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
                                    </div>
                                </div>
                                @endforeach
                            </form>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <form action="{{route('settingpass')}}" method="post">
                                @csrf
                                @foreach($dataUser as $u)
                                <div class="card-body pb-2">
                                    @if (session('fail'))
                                        <div class="alert alert-danger" role="alert">
                                                {{ session('fail') }}
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success" role="alert">
                                                {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="form-label">@lang('lang.oldpassword')</label>
                                        <input type="password" id="unvisibleoldpass" readonly name="oldpassword" value="{{$u->password}}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">@lang('lang.newpassword')</label>
                                        <input type="password" name="newpassword" class="form-control">
                                        @error('newpassword')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">@lang('lang.repeatnewpassword')</label>
                                        <input type="password" name="confirmpassword" class="form-control">
                                        @error('confirmpassword')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="email" value="{{$u->email}}">
                                    <div class="text-right mt-3">
                                        <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
                                    </div>
                                </div>
                                @endforeach
                            </form>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                @if (session('fail_updateaddress'))
                                    <div class="alert alert-danger" role="alert">
                                            {{ session('fail_updateaddress') }}
                                    </div>
                                @endif
                                @if (session('success_updateaddress'))
                                    <div class="alert alert-success" role="alert">
                                            {{ session('success_updateaddress') }}
                                    </div>
                                @endif
                                @if($diachi->isEmpty())
                                    <div class="form-group">
                                        <label class="form-label">@lang('lang.phone')</label>
                                        <input type="number" readonly class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">@lang('lang.address')</label>
                                        <input type="text" readonly class="form-control">
                                    </div>
                                @else
                                <form action="{{route('editaddress')}}" method="post">
                                    @csrf
                                    @foreach($diachi as $dc)
                                    @if($dc->trangthai == 1)
                                    <div class="form-group">
                                        <label class="form-label">@lang('lang.phone')</label>
                                        <input type="number" name="phone" class="form-control" value="0{{$dc->sdt}}">
                                        @error('phone')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">@lang('lang.address')</label>
                                        <input type="text" name="address" class="form-control" value="{{$dc->diachi}}">
                                        @error('address')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @endif
                                    @endforeach
                                    <input type="hidden" name="username" class="form-control" value="{{$dataUser[0]->username}}">
                                    <div class="text-right mt-3">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                                @endif
                            </div>
                            <hr class="border-light m-0">
                            <div class="row my-1 mx-3">
                                @if (session('notification'))
                                    <div class="alert alert-warning" role="alert">
                                            {{ session('notification') }}
                                    </div>
                                @endif
                                @if (session('success_changedefault'))
                                    <div class="alert alert-success" role="alert">
                                            {{ session('success_changedefault') }}
                                    </div>
                                @endif
                                <table border="1" >
                                    <tr>
                                        <th>username</th>
                                        <th>@lang('lang.phone')</th>
                                        <th>@lang('lang.address')</th>
                                        <th>@lang('lang.status')</th>
                                    </tr>
                                    @foreach($diachi as $dc)
                                    <tr>
                                        <td>{{$dc->username}}</td>
                                        <td>0{{$dc->sdt}}</td>
                                        <td>{{$dc->diachi}}</td>
                                        <td>
                                            <form action="{{route('defaultaddress')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="username" class="form-control" value="{{$dc->username}}">
                                                <input type="hidden" name="phone" class="form-control" value="{{$dc->sdt}}">
                                                <input type="hidden" name="status" class="form-control" value="{{$dc->trangthai}}">
                                                @if($dc->trangthai == 1)
                                                <button type="submit" class="btn btn-primary">@lang('lang.default')</button>
                                                @else
                                                <button type="submit" class="btn btn-primary">@lang('lang.notdefault')</button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>

                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                @if (session('fail_newaddress'))
                                    <div class="alert alert-danger" role="alert">
                                            {{ session('fail_newaddress') }}
                                    </div>
                                @endif
                                @if (session('warn_newaddress'))
                                    <div class="alert alert-warning" role="alert">
                                            {{ session('warn_newaddress') }}
                                    </div>
                                @endif
                                @if (session('success_newaddress'))
                                    <div class="alert alert-success" role="alert">
                                            {{ session('success_newaddress') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label>Location:</label>
                                    <input type="text" class="form-control" id="search_input" placeholder="Type address..." />
                                </div>
                                <form action="{{route('newaddress')}}" method="post">
                                    @csrf
                                    <h4 class="mb-4">@lang('lang.newaddress')</h4>
                                    <div class="form-group">
                                        <label class="form-label">@lang('lang.phone')</label>
                                        <input type="text" name="newphone" class="form-control" placeholder="+84 (123) 456 7891">
                                        @error('newphone')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">@lang('lang.address')</label>
                                        <input type="text" name="newaddress" class="form-control" placeholder="Street, Dictrict, City">
                                        @error('newaddress')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="text-right mt-3">
                                        <button type="submit" class="btn btn-primary">Add new</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br><br>
    <style type="text/css">
        body {
            background: #f5f5f5;
        }
        .btn-primary {
            background-color: #17A45A;
        }
        .btn-primary:hover {
            background-color: #555;
        }
        .ui-w-80 {
            width: 80px !important;
            height: auto;
        }

        .btn-default {
            border-color: #17A45A;
            background: rgba(0, 0, 0, 0);
            color: #17A45A;
        }

        label.btn {
            margin-bottom: 0;
        }

        .btn-outline-primary {
            border-color: #17A45A;
            background: transparent;
            color: #17A45A;
        }
        .btn-outline-primary:hover {
            background-color: #555;
        }

        .btn {
            cursor: pointer;
        }

        .text-light {
            color: #babbbc !important;
        }

        .btn-facebook {
            border-color: rgba(0, 0, 0, 0);
            background: #3B5998;
            color: #fff;
        }

        .btn-instagram {
            border-color: rgba(0, 0, 0, 0);
            background: #000;
            color: #fff;
        }

        .card {
            background-clip: padding-box;
            box-shadow: 0 1px 4px rgba(24, 28, 33, 0.012);
        }

        .row-bordered {
            overflow: hidden;
        }

        .account-settings-fileinput {
            position: absolute;
            visibility: hidden;
            width: 1px;
            height: 1px;
            opacity: 0;
        }

        .account-settings-links .list-group-item.active {
            font-weight: bold !important;
        }

        html:not(.dark-style) .account-settings-links .list-group-item.active {
            background: transparent !important;
        }

        .account-settings-multiselect~.select2-container {
            width: 100% !important;
        }

        .light-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }

        .light-style .account-settings-links .list-group-item.active {
            color: #4e5155 !important;
        }

        .material-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }

        .material-style .account-settings-links .list-group-item.active {
            color: #4e5155 !important;
        }

        .dark-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(255, 255, 255, 0.03) !important;
        }

        .dark-style .account-settings-links .list-group-item.active {
            color: #fff !important;
        }

        .light-style .account-settings-links .list-group-item.active {
            color: #4E5155 !important;
        }

        .light-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }
    </style>

    <script>
        const input = document.getElementById("file-input");
        const image = document.getElementById("img-preview");

        input.addEventListener("change", (e) => {
            if (e.target.files.length) {
                const src = URL.createObjectURL(e.target.files[0]);
                image.src = src;
            }
        });

        const reset = document.getElementById("resetimg");
        const hinh = document.getElementById("hinh");

        reset.addEventListener("click", ()=> {
            image.src = "https://secure.gravatar.com/avatar/3dbbb7b9f09bd1f312374056bb92b3e1?s=96&d=https%3A%2F%2Fstatic.teamtreehouse.com%2Fassets%2Fcontent%2Fdefault_avatar-ea7cf6abde4eec089a4e03cc925d0e893e428b2b6971b12405a9b118c837eaa2.png&r=pg";
            hinh.value = "";
        });

        const unvisiblepass = document.querySelector("#unvisiblepass");

        unvisiblepass.addEventListener("mouseover", ()=>{
            unvisiblepass.setAttribute('type', 'text');
        });
        unvisiblepass.addEventListener("mouseout", ()=>{
            unvisiblepass.setAttribute('type', 'password');
        });

        const unvisibleoldpass = document.querySelector("#unvisibleoldpass");

        unvisibleoldpass.addEventListener("mouseover", ()=>{
            unvisibleoldpass.setAttribute('type', 'text');
        });
        unvisibleoldpass.addEventListener("mouseout", ()=>{
            unvisibleoldpass.setAttribute('type', 'password');
        });
    </script>
    <script>
        var searchInput = 'search_input';

        $(document).ready(function () {
        var autocomplete;
        autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
            types: ['geocode'],
            /*componentRestrictions: {
            country: "USA"
            }*/
        });

        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var near_place = autocomplete.getPlace();
        });
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyA66KwUrjxcFG5u0exynlJ45CrbrNe3hEc"></script>

    @stop