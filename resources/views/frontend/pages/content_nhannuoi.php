<?php 
$mapet = isset($_GET['mapet'])?$_GET['mapet']:'';
$sql="select * from thucung where mapet='$mapet'";//2 
$objStatament = $objPDO->prepare($sql);
$objStatament->execute();
$data = $objStatament->fetchAll(PDO::FETCH_OBJ);

$sql="select * from lienhenhannuoi where mapet='$mapet' and xoa=0";//2 
$objStatament = $objPDO->prepare($sql);
$objStatament->execute();
$datal = $objStatament->fetchAll(PDO::FETCH_OBJ);
?>
<section class="bg-light">
<?php 
    foreach($data as $pet)
    {
        ?>
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="assets/img/<?php echo $pet->hinh ?>" alt="Card image cap" id="product-detail">
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2"><strong><?php echo $pet->tenpet ?><strong></h1>
                            <hr>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Giới tính:</h6>
                                </li>
                                <?php echo $pet->gioitinh ?>
                            </ul>
                            <hr>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Tuổi:</h6>
                                </li>
                                <?php echo $pet->tuoi ?>
                            </ul>
                            <hr>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Tiêm phòng:</h6>
                                </li>
                                <?php if($pet->tiemphong==0){echo "Chưa rõ";} else{echo "Có";} ?>
                            </ul>
                            <hr>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Mã:</h6>
                                </li>
                                <?php echo $pet->mapet ?>
                            </ul>
                            <hr>
                            <h6>Thông tin liên hệ nhận nuôi:</h6>
                            <ul class="list-unstyled pb-3">
                                <li>
                                <div class="row no-gutters mt-2 contact-adoption">
                                    <?php
                                        foreach($datal as $lh){
                                            ?>
                                            <div class="col-3 col-sm-3 col-md-4 col-lg-2 mb-2 pr-2 text-center">
                                                <a href="<?php echo $lh->facebook ?>" target="_blank" rel="noreferrer">
                                                    <img data-src="resources/images/<?php echo $lh->hinh ?>" alt="" class="img-fluid rounded img-lazy-load" src="resources/images/<?php echo $lh->hinh ?>">
                                                </a>
                                                <p class="mb-0 mt-2">
                                                    <a href="<?php echo $lh->facebook ?>" style="text-decoration:none;" target="_blank" rel="noreferrer" class="text-center text-break"><?php echo $lh->hoten ?></a>
                                                </p>
                                            </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
?>
</section>