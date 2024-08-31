    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>Chúng tôi là  Hexashop</h4>
                                <span>đây là mẫu áo tuyệt vời bạn có thể xem thử </span>
                                <div class="main-border-button">
                                    <a href="index.php?act=sanpham">Mua Ngay!</a>
                                </div>
                            </div>
                            <img src="assets/images/gucci1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <?php



                ?>
                <div class="col-lg-6"> 
                    <div class="right-content">
                        <div class="row">
                        <?php
                            foreach ($dsdm as $dm) :
                                extract($dm);
                                $ten_danh_muc = $dm['ten_danh_muc'];
                                $mo_ta = $dm['mo_ta'];
                        ?>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4><?php echo $ten_danh_muc ?></h4>
                                            <span> đây là sản phẩm <?php echo $ten_danh_muc ?> đẹp nhất</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4><?php echo $ten_danh_muc ?></h4>
                                                <div class="main-border-button">
                                                    <a href="index.php?act=sanpham">Khám phá thêm!</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="../../../public/images/<?=$anh?>" alt="">

                                        
                                    </div>
                                </div>
                            </div>
                        <?php
                            endforeach;
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
 
            <?php foreach ($dsdm as $dm) : ?>
                <?php
                    extract($dm);
                    $ten_danh_muc = $dm['ten_danh_muc'];
                    $iddm = $dm['id_danh_muc']; // Lấy ID danh mục

                    // Load sản phẩm thuộc ID danh mục cụ thể
                    $sanpham_theo_danhmuc = loadall_sanpham($kyw, $iddm);

                ?>
     <section class="section" id="kids">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2><?php echo $ten_danh_muc ?><h2>
                        <span>Chi tiết đến từng chi tiết là điều khiến Hexashop khác biệt so với các chủ đề khác.</span>
                        <div class="owl-kid-item owl-carousel">
                        <?php foreach ($sanpham_theo_danhmuc as $row) : ?>
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <!-- <li><a href="index.php"><i class="fa fa-star"></i></a></li> -->
                                        <?php if(isset($row['id_san_pham'])) : ?>
                                            <li><a href="index.php?act=sanphamct&idsp=<?php echo $row['id_san_pham']?>"><i class="fa fa-shopping-cart"></i></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <img src="../../../public/images/<?= $row['avt'] ?>" alt="">
                            </div>
                            <div class="down-content">
                                <h4><?= $row['ten_san_pham'] ?></h4>
                                <span><?= $row['gia'] ?>$</span>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach ?>

                        
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div> 

<style>
    /* Main Banner Area */
.main-banner {
    background-color: #f8f8f8;
    padding: 80px 0;
}

.left-content,
.right-content {
    padding: 20px;
}

.left-content .thumb img {
    width: 100%;
    border-radius: 8px;
}

.right-content .right-first-image .thumb img {
    width: 100%;
    border-radius: 8px;
    margin-bottom: 15px;
}

.main-border-button a {
    display: inline-block;
    padding: 12px 24px;
    background-color: #ff6f61;
    color: #fff;
    text-decoration: none;
    border-radius: 25px;
    transition: background-color 0.3s ease-in-out;
}

.main-border-button a:hover {
    background-color: #e35b4b;
}

.right-content .right-first-image .thumb:hover .hover-content {
    opacity: 1;
    visibility: visible;
}

/* Product Section */
.section-heading h2 {
    font-size: 36px;
    margin-bottom: 20px;
    text-transform: uppercase;
    font-weight: bold;
}

.section-heading span {
    display: block;
    margin-bottom: 40px;
    color: #888;
}

.owl-kid-item .item {
    margin: 0 5px;
}

.owl-kid-item .item .thumb img {
    width: 100%;
    border-radius: 8px;
}

.down-content h4 {
    font-size: 24px;
    margin: 10px 0;
}

.down-content span {
    font-size: 18px;
    color: #ff6f61;
    font-weight: bold;
    display: block;
    margin-bottom: 10px;
}

.stars {
    list-style: none;
    padding: 0;
    margin: 10px 0;
}

.stars li {
    display: inline-block;
    color: #ffcc00;
}

.stars li i {
    font-size: 18px;
}

</style>

        
 
    <!-- ***** Kids Area Ends ***** -->