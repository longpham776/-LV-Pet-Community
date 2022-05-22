@extends('frontend.masterview')
@section('content')
<section class="bg-success py-5">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-md-8 text-white">
                <h1>About Us</h1>
                <p>
                <b>PET (Pet Emotional Trust)</b> <br>
                Chúng tôi là một nhóm trẻ gồm tình nguyện viên Việt Nam, cùng hoạt động vì tình yêu chó mèo. Tôn chỉ hoạt động của chúng tôi là không từ bỏ nỗ lực với bất kỳ con vật nào, dù bé có ốm yếu hay tàn tật tới đâu, bởi mỗi thú cưng đều cần có cơ hội hi vọng vào một tương lai tốt đẹp. Chúng tôi cố gắng chăm sóc tốt nhất có thể, phần nào bù đắp lại những tổn thương cho các bé được cứu hộ về dù là hoang, lạc, bị bỏ rơi hay bạo hành. Ngoài ra, chúng tôi cũng luôn nỗ lực tìm mái ấm yêu thương các bé trọn đời . Và cuối cùng, chúng tôi giúp nâng cao nhận thức về trách nhiệm của chủ nuôi thông qua mạng xã hội và các hoạt động thiện nguyện.
                </p>
            </div>
            <div class="col-md-4">
                <img src="{{url('public')}}/frontend/img/about.png" alt="About Hero">
            </div>
        </div>
    </div>
</section>
@stop