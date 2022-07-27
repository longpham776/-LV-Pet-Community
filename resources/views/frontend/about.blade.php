@extends('frontend.masterview')
@section('content')
<section class="bg-success py-5">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-md-8 text-white">
                <h1>@lang('lang.about')</h1>
                <p>
                <b>PET (Pet Emotional Trust)</b> <br>
                @lang('lang.aboutcontent')

            </div>
            <div class="col-md-4">
                <img src="{{url('public')}}/frontend/img/about.png" alt="About Hero">
            </div>
        </div>
    </div>
</section>
@stop