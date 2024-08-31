<section class="section" id="men">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <?php
                    foreach ($dsdm as $dm) {
                    ?>
                        <h2><?php 
                            if (!isset($_GET['iddm'])) {
                                echo 'Tất cả sản phẩm';
                                break;
                            } else if ($dm['id_danh_muc'] == $_GET['iddm']){
                                echo $dm['ten_danh_muc'];
                            }
                     ?></h2>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
 
                        <?php
                        foreach ($dssp as $sp) {
                           extract($sp);
                            $linksp = "index.php?act=sanphamct&idsp=" . $id_san_pham;
                            $hinh = $img_path . $avt;
                            if(isset($_SESSION['ten_tai_khoan'])){

                            echo '<div class="item">
                                    <div class="thumb">
                                        <div class="hover-content">
                                            <ul>
                                                <li><a href="'.$linksp.'"><i class="fa fa-eye"></i></a></li>
                                                
                                                <form action="index.php?act=addtocart" method="post">
                                                <input type="hidden" name="id_san_pham" value="'.$id_san_pham.'">
                                                <input type="hidden" name="ten_san_pham" value="'.$ten_san_pham.'">
                                                <input type="hidden" name="avt" value="'.$avt.'">
                                                <input type="hidden" name="gia" value="'.$gia.'">
                                                <input type="submit" name="addtocart" value="Thêm vào giỏ hàng">
                                                
                                                
                                             </form>
                                              
                                            </ul>
                                        </div>
                                        <a href="' . $linksp . '"><img src="' . $hinh . '" alt=""></a>
                                    </div>
                                    <div class="down-content">
                                        <h4><a href="' . $linksp . '">' . $ten_san_pham . '</a></h4>
                                        <span>$' . $gia . '</span>
                                        <ul class="stars">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>';}
                                if(!isset($_SESSION['ten_tai_khoan'])){

                                    echo '<div class="item">
                                            <div class="thumb">
                                                <div class="hover-content">
                                                    <ul>
                                                        <li><a href="'.$linksp.'"><i class="fa fa-eye"></i></a></li>
                                                        
                                                        <form action="index.php?act=addtocart" method="post">
                                                        <input type="hidden" name="id_san_pham" value="'.$id_san_pham.'">
                                                        <input type="hidden" name="ten_san_pham" value="'.$ten_san_pham.'">
                                                        <input type="hidden" name="avt" value="'.$avt.'">
                                                        <input type="hidden" name="gia" value="'.$gia.'">
                                                        <input type="button" value="Đăng nhập để mua hàng">
                                                        
                                                        
                                                     </form>
                                                      
                                                    </ul>
                                                </div>
                                                <a href="' . $linksp . '"><img src="' . $hinh . '" alt=""></a>
                                            </div>
                                            <div class="down-content">
                                                <h4><a href="' . $linksp . '">' . $ten_san_pham . '</a></h4>
                                                <span>$' . $gia . '</span>
                                                <ul class="stars">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>';}
                        }
                        ?>

                   
</section>
<style>
    /* Men Area */
    
#men {
    padding: 80px 0;
}

.section-heading h2 {
    font-size: 36px;
    margin-bottom: 30px;
}

.men-item-carousel {
    margin-top: 50px;
}

.owl-men-item {
    display: flex;
    flex-wrap: wrap;
}

.owl-men-item .item {
    margin-right: 20px;
    margin-bottom: 30px;
    position: relative;
}

.owl-men-item .item:last-child {
    margin-right: 0;
}

.thumb {
    position: relative;
}

.thumb img {
    width: 100%;
    border-radius: 8px;
}

.hover-content {
    position: absolute;
    bottom: 10px;
    right: 10px;
    background-color: rgba(255, 255, 255, 0.8);
    padding: 5px;
    border-radius: 50%;
}

.hover-content ul {
    padding: 0;
    margin: 0;
    list-style-type: none;
}

.hover-content ul li {
    display: inline-block;
    margin-right: 5px;
}

.hover-content ul li a {
    color: #333;
}

.hover-content ul li a:hover {
    color: #ff6f61;
}

.down-content {
    text-align: center;
}

.down-content h4 {
    font-size: 22px;
    margin-bottom: 10px;
}

.down-content span {
    display: block;
    font-size: 18px;
    color: #888;
    margin-bottom: 15px;
}

.stars {
    display: flex;
    justify-content: center;
    margin-bottom: 10px;
}

.stars li {
    color: #ffcc00;
    font-size: 18px;
}

.stars li + li {
    margin-left: 5px;
}

</style>
<!-- ***** Men Area Ends ***** -->