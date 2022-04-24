<?php
$sql='select * from sanpham';//2 
$objStatament = $objPDO->prepare($sql);
$objStatament->execute();
$n = $objStatament->rowCount();
// echo "Co $n ket qua";
$data = $objStatament->fetchAll(PDO::FETCH_OBJ);
// $data = $objStatament->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';print_r($data);
?>
<section class="py-5">
    <div class="container">
        <div class="row text-left p-2 pb-3">
            <h4>Sản phẩm tương tự</h4>
        </div>

        <!--Start Carousel Wrapper-->
        <div id="carousel-related-product">
        <?php 
            foreach($data as $sp)
            {
                ?>
                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="assets/img/<?php echo $sp->hinh ?>">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <form action="shop-single.php" method="post">
                                        <input type="text" name="math" hidden value="<?php echo $sp->math?>">
                                        <input type="text" name="masp" hidden value="<?php echo $sp->masp?>">
                                        <li><i class="btn btn-success text-white mt-2 far fa-heart"><input type="submit" class="btn btn-success far fa-heart" name="submit" value="Thích"></i></li>
                                    </form>
                                    <form action="shop-single.php" method="post">
                                        <input type="text" name="math" hidden value="<?php echo $sp->math?>">
                                        <input type="text" name="masp" hidden value="<?php echo $sp->masp?>">
                                        <li><i class="btn btn-success text-white mt-2 far fa-eye"><input type="submit" class="btn btn-success far fa-eye" name="submit" value="Xem"></i></li>
                                    </form>
                                    <form action="shop-single.php" method="post">
                                        <input type="text" name="masp" hidden value="<?php echo $sp->masp ?>">
                                        <li><i class="btn btn-success text-white mt-2 fas fa-cart-plus"><input type="submit" class="btn btn-success fas fa-cart-plus" name="submit" value="Thêm"></i></li>
                                    </form>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="shop-single.html" class="h3 text-decoration-none"><?php echo $sp->tensp ?></a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <!-- <li>M/L/X/XL</li> -->
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                            </ul>
                            <p class="text-center mb-0"><?php echo $sp->gia ?><u>đ</u></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
        </div>


    </div>
</section>