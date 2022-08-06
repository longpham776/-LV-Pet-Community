@extends('frontend.masterview')
@section('content')
<br>
<section class="container aos-init aos-animate" data-aos="zoom-in">
    <div class="row">
        <div class="col-sm-8 col-md-8 col-lg-8">
            <h3 class="text-capitalize">@lang('lang.iwantdonate')</h3>
            <hr class="small-divider left">
            <p class="mt-4 text-justify">
                @lang('lang.donatecontent1')
                <br><br>@lang('lang.donatecontent2')
                <br><br>@lang('lang.donatecontent3')
                <br><br>🗳️ @lang('lang.donatecontent4') 
                <br>PET World Saigon @lang('lang.number') 180 Cao lỗ HCM
                <br>@lang('lang.clinic') Animal Care: @lang('lang.house') 20 ngõ 424 Xuân Thùy
            </p>

            <a href="{{route('contact')}}" class="btn btn-primary mt-4 ml-1 text-uppercase" aria-label="Ủng hộ ngay" aria-labelledby="Ủng hộ ngay">Ủng hộ ngay</a>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4 res-margin">
                <img data-src="https://www.hanoipetadoption.com/admin/user-content/256b940f-9028-443d-8fcf-f39f5f1618af.jpg" class="rounded img-fluid img-lazy-load" alt="Tôi muốn ủng hộ" src="https://www.hanoipetadoption.com/admin/user-content/256b940f-9028-443d-8fcf-f39f5f1618af.jpg">
        </div>
    </div>
</section>
<br>
<style type="text/css">
        .btn-primary {
            background-color: #17A45A;
        }
        .btn-primary:hover {
            background-color: #555;
        }
    </style>
@stop