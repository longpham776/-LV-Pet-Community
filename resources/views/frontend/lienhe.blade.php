@extends('frontend.masterview')
@section('content')
<div class=""> 
    <iframe width="100%" height="300" class="lazy mb-5 loaded show" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.9541599824643!2d106.67568071443705!3d10.73801649234761!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fad027e3727%3A0x2a77b414e887f86d!2zMTgwIMSQxrDhu51uZyBDYW8gTOG7lywgUGjGsOG7nW5nIDQsIFF14bqtbiA4LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1608368431152!5m2!1svi!2s" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.9541599824643!2d106.67568071443705!3d10.73801649234761!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fad027e3727%3A0x2a77b414e887f86d!2zMTgwIMSQxrDhu51uZyBDYW8gTOG7lywgUGjGsOG7nW5nIDQsIFF14bqtbiA4LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1608368431152!5m2!1svi!2s" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" data-lazied="IMG"></iframe> 
</div> 
<section class="container">
	<div class="row">
		<div class="col-sm-7 col-md-7 col-lg-7 aos-init aos-animate" data-aos="zoom-in">
			<h3 class="text-capitalize">Thông tin liên hệ</h3>
			<ul class="list-unstyled mt-3 list-contact colored-icons">
				<li><i class="fa fa-envelope margin-icon"></i>&ensp;<a href="mailto:lpham776@gmail.com" rel="noreferrer" aria-label="lpham776@gmail.com" aria-labelledby="lpham776@gmail.com" style="text-decoration: none">lpham776@gmail.com</a></li>
				<li><i class="fa fa-phone margin-icon"></i>&ensp;<a href="tel:0971126374" rel="noreferrer" aria-label="0971126374" aria-labelledby="0971126374" style="text-decoration: none">(+84)971126374</a></li>
				<li><i class="fa fa-map-marker margin-icon"></i>Sài Gòn - Việt Nam</li>
			</ul>
			<h3 data-aos="zoom-in" class="text-capitalize aos-init aos-animate">
				Tài khoản quyên góp
			</h3>
			<p class="mt-2">Chi phí sẽ được chia đều cho các bé khác còn nằm viện và gây dựng nhà chung.</p>
			<div class="row">
				<div class="col-sm-12 col-md-3 col-lg-6">
					<ul class="list-unstyled colored-icons">
						<li><i class="fas fa-university margin-icon"></i><b>Vietcombank</b></li>
						<li>Phạm Đức Long</li>
						<li>01234567890</li>
						<li>Sở giao dịch Vietcombank</li>
					</ul>
				</div>
				<div class="col-sm-12 col-md-3 col-lg-6">
					<ul class="list-unstyled colored-icons">
						<li><i class="fas fa-university margin-icon"></i><b>BIDV</b></li>
						<li>Phạm Đức Long</li>
						<li>01234567890</li>
						<li>Chi Nhánh Sài Gòn</li>
					</ul>
				</div>
				<div class="col-sm-12 col-md-3 col-lg-6">
					<ul class="list-unstyled colored-icons">
						<li><i class="fas fa-university margin-icon"></i><b>Techcombank</b></li>
						<li>Phạm Đức Long</li>
						<li>01234567890</li>
						<li>Chi Nhánh Sài Gòn</li>
					</ul>
				</div>
				<div class="col-sm-12 col-md-3 col-lg-6">
					<ul class="list-unstyled colored-icons">
						<li><i class="fab fa-paypal margin-icon"></i><b>Paypal</b></li>
						<li class="text-break">lpham776@gmail.com</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-sm-5 col-md-5 col-lg-5 contact-info aos-init aos-animate" data-aos="zoom-in">
			<h3 class="text-capitalize">Gửi góp ý</h3>
			@if (session('success'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Cảm ơn bạn!</strong> {{ session('success') }}
				</div>
			@endif
			<form method="post" action="{{route('sendmail')}}">
				@csrf
                <div class="container py-5">
                    <div class="row py-5">
                    <form class="col-md-9 m-auto" method="post" role="form">
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="inputname">Tên</label>
                            <input type="text" class="form-control mt-1" id="name" name="hoten" placeholder="Họ và tên">
							@error('hoten')
							<span style="color: red;">{{ $message }}</span>
							@enderror
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="inputemail">Email</label>
                            <input type="email" class="form-control mt-1" id="email" name="email" placeholder="@gmail.com,@yahoo.com">
							@error('email')
							<span style="color: red;">{{ $message }}</span>
							@enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputsubject">Tiêu đề</label>
                        <input type="text" class="form-control mt-1" id="subject" name="tieude" placeholder="Nhập tiêu đề">
						@error('tieude')
						<span style="color: red;">{{ $message }}</span>
						@enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputmessage">Lời nhắn</label>
                        <textarea class="form-control mt-1" id="message" name="noidung" placeholder="Xin vui lòng đóng góp ý kiến" rows="8"></textarea>
						@error('noidung')
						<span style="color: red;">{{ $message }}</span>
						@enderror
					</div>
                    <div class="row">
                        <div class="col text-end mt-2">
                            <button type="submit" class="btn btn-success btn-lg px-3">Gửi ý kiến</button>
                        </div>
                    </div>
                    </form>
                </div>
            </form>
		</div>
	</div>
</section>
@stop