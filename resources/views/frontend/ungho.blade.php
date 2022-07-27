@extends('frontend.masterview')
@section('content')
<br>
<section class="container aos-init aos-animate" data-aos="zoom-in">
    <div class="row">
        <div class="col-sm-8 col-md-8 col-lg-8">
            <h3 class="text-capitalize">tôi muốn ủng hộ</h3>
            <hr class="small-divider left">
            <p class="mt-4 text-justify">
                Mọi hoạt động cứu hộ của Pet Community hoàn toàn dựa trên các khoản quyên góp từ cộng đồng. Chi phí trung bình hàng tháng của nhóm rơi vào khoảng 70 triệu đồng, bao gồm tiền thuê nhà, tiền viện phí, thức ăn, điện, nước, thuốc men và đồ dùng, bỉm tã, lương hỗ trợ các bạn tnv dọn dẹp... Nhóm rất cần sự giúp đỡ của các bạn để có thể duy trì nhà chung cũng như đội cứu hộ. Chỉ cần cố định 50k - 100k hàng tháng là các bạn đã giúp đỡ được cho nhóm và cách bé rất nhiều!
                <br><br>Chi phí sẽ được chia đều cho các bé khác còn nằm viện và gây dựng nhà chung. Ngoài ra Nhóm cũng tiếp nhận quyên góp bằng hiện vật như quần áo cũ (để lót chuồng), bỉm, găng tay y tế, thức ăn, cát vệ sinh v.v... 
                <br><br>*Lưu ý: nhóm không dùng zalo và KHÔNG BAO GIỜ yêu cầu Mạnh Thường Quân cung cấp thông tin thẻ hoặc mã OTP
                <br><br>🗳️ Địa điểm đặt hòm quyên góp: 
                <br>PET World Saigon số 180 Cao lỗ HCM
                <br>Phòng khám Animal Care: nhà 20 ngõ 424 Xuân Thùy
            </p>

            <a href="{{route('contact')}}" class="btn btn-primary mt-4 ml-1 text-uppercase" aria-label="Ủng hộ ngay" aria-labelledby="Ủng hộ ngay">Ủng hộ ngay</a>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4 res-margin">
                <img data-src="https://www.hanoipetadoption.com/admin/user-content/256b940f-9028-443d-8fcf-f39f5f1618af.jpg" class="rounded img-fluid img-lazy-load" alt="Tôi muốn ủng hộ" src="https://www.hanoipetadoption.com/admin/user-content/256b940f-9028-443d-8fcf-f39f5f1618af.jpg">
        </div>
    </div>
</section>
<br>
@stop