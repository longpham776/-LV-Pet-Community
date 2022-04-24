<?php 
// $item_per_page=isset($_GET['per_page'])?$_GET['per_page']:8;
// $current_page=isset($_GET['page'])?$_GET['page']:1;
// $offset=($current_page-1)*$item_per_page;
// $sql="select * from thucung where xoa=0 order by mapet asc limit ".$item_per_page." offset ".$offset." ";//2 
// $objStatament = $objPDO->prepare($sql);
// $objStatament->execute();
// $data = $objStatament->fetchAll(PDO::FETCH_OBJ);
// $n = $objStatament->rowCount();
// $totalpage=ceil($n/$item_per_page);

// $data = $objStatament->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';print_r($totalpage);
$kw=isset($_POST['kw'])?$_POST['kw']:'';
// $gt=isset($_POST['gioitinh'])?$_POST['gioitinh']:'';
// $tuoi=isset($_POST['tuoi'])?$_POST['tuoi']:'';
// $tp=isset($_POST['tiemphong'])?$_POST['tiemphong']:0;
if ($kw!=NULL){
    $item_per_page=isset($_GET['per_page'])?$_GET['per_page']:8;
    $current_page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($current_page-1)*$item_per_page;
    $sql="select * from thucung where tenpet like ? order by mapet asc limit ".$item_per_page." offset ".$offset." ";
    $a =["%$kw%"];
    $objStatement= $objPDO->prepare($sql);//return B
    $objStatement->execute($a);//ket qua truy van
    $data = $objStatement->fetchAll(PDO::FETCH_OBJ );
    $n = $objStatement->rowCount();
    $totalpage=ceil($n/$item_per_page);
}
else{
    $item_per_page=isset($_GET['per_page'])?$_GET['per_page']:8;
    $current_page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($current_page-1)*$item_per_page;
    $sql="select * from thucung where tenpet like ? order by mapet asc limit ".$item_per_page." offset ".$offset." ";
    $a =["%$kw%"];
    $objStatement= $objPDO->prepare($sql);//return B
    $objStatement->execute($a);//ket qua truy van
    $data = $objStatement->fetchAll(PDO::FETCH_OBJ );
    $n = $objStatement->rowCount();
    $totalpage=ceil($n/$item_per_page);
}
?>
<br><br>
<section class="container aos-init aos-animate" data-aos="zoom-in">
    <div class="row">
            <div class="col-sm-8 col-md-8 col-lg-8">
                <h3 class="text-capitalize">quy trình nhận nuôi</h3>
                <hr class="small-divider left">
                <p class="mt-4 text-justify">
                    Trước khi quyết định nhận nuôi bé chó hay mèo nào, bạn hãy tự hỏi bản thân rằng mình đã sẵn sàng để chịu trách nhiệm cả đời cho bé chưa, cả về tài chính, nơi ở cũng như tinh thần. Việc nhận nuôi cần được sự đồng thuận lớn từ bản thân bạn cũng như gia đình và những người liên quan. Xin cân nhắc kỹ trước khi liên hệ với HPA về việc nhận nuôi.<br><br>
                    Bạn đã sẵn sàng? Hãy thực hiện các bước sau đây nhé:<br><br>
                    1️⃣ Tìm hiểu về thú cưng bạn muốn nhận nuôi trên trang web của HPA.<br>
                    2️⃣ Liên hệ với Tình nguyện viên phụ trách bé để tìm hiểu thêm về bé.<br>
                    3️⃣ Tham gia phỏng vấn nhận nuôi. <br>
                    4️⃣ Chuẩn bị cơ sở vật chất, ký giấy tờ nhận nuôi và đóng tiền vía để đón bé về. <br>
                    5️⃣ Thường xuyên cập nhật về tình hình của bé, đặc biệt là khi có sự cố để được tư vấn kịp thời.<br><br>
                </p>

            </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="card bg-light">
                    <h5 class="text-capitalize">điều kiện nhận nuôi</h5>
                    <ul class="custom pl-0 font-weight-bold">
                            <li class="row no-gutters">
                                <div class="col-1"><label class="m-0"></label></div>
                                <div class="col-10"><span>Tài chính tự chủ và ổn định.
</span></div>
                            </li>
                            <li class="row no-gutters">
                                <div class="col-1"><label class="m-0"></label></div>
                                <div class="col-10"><span>Chỗ ở cố định, ưu tiên tại Hà Nội
</span></div>
                            </li>
                            <li class="row no-gutters">
                                <div class="col-1"><label class="m-0"></label></div>
                                <div class="col-10"><span>Cam kết tiêm phòng và triệt sản .</span></div>
                            </li>
                    </ul>
                </div>
            </div>
    </div>
</section>
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">TÌM THÚ CƯNG</h1>
            <form action="nhannuoi.php" method="post">
            <p>
                <div class="row pt-4">
                    <!-- <div class="col-6 col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>Giới tính</label>
                            <select id="gender" name="gioitinh" class="form-control">
                                <option value="">Tất cả</option>
                                <option value="Đực">Đực</option>
                                <option value="Cái">Cái</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>Độ tuổi</label>
                            <select id="age" name="tuoi" class="form-control">
                                <option value="">Tất cả</option>
                                    <option value="Trẻ">Trẻ</option>
                                    <option value="Trưởng thành">Trưởng thành</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>Tiêm phòng</label>
                            <select id="sterilizations" name="tiemphong" class="form-control">
                                <option value="">Tất cả</option>
                                <option value="1">Có</option>
                                <option value="0">Chưa rõ</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="col-6 col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" id="name" name="kw" class="form-control">
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-4 col-lg-4 justify-content-center align-self-center text-center">
                        <div class="form-group mb-0 pt-lg-2">
                            <button id="btnSearch" class="btn btn-secondary aos-init aos-animate" aria-label="Tìm kiếm" aria-labelledby="Tìm kiếm">Tìm kiếm</button>
                        </div>
                    </div>
                </div>
            </p>
        </form>
        </div>
    </div>
    <section class="services  service-service" id="service-service-0">
        <ul class="services-list">
        <?php 
                foreach($data as $pet)
                {
                    ?>
                    <li class="col-12 col-md-4 p-5 mt-3">
                        <a href="#"><img class="" src="./admin/resources/images/<?php echo $pet->hinh ?>" alt="" /></a>
                        <hr>
                        <h3><?php echo $pet->tenpet ?></h3>
                        <hr>
                        <i class="fas fa-h2">Giới tính: <?php echo $pet->gioitinh ?></i>
                        <div class="text"><hr></div>
                        <i class="fas fa-h2">Tuổi: <?php echo $pet->tuoi ?></i>
                        <div class="text"><hr></div>
                        <i class="fas fa-h2">Tiêm phòng: <?php if($pet->tiemphong==0){echo "Chưa rõ";} else{echo "Có";} ?></i>
                        <br><br>
                        <a class="btn btn-secondary" href="nhannuoi-single.html?mapet=<?php echo $pet->mapet?>" target="_blank" rel="noreferrer" aria-label="Nhận nuôi" aria-labelledby="Nhận nuôi">Nhận nuôi</a>
                    </li>
                    <?php
                }
        ?>
        </ul>
    </section>
    <div div="row">
        <ul class="pagination pagination-lg justify-content-end">
            <?php 
            for($i=0;$i<=$totalpage;$i++){
                ?>
                <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="?per_page=8&page=<?php echo$i+1 ?>" tabindex="-1"><?php echo $i+1 ?></a>
                <?php
            }
            ?>
        </ul>
    </div>
    
</section>