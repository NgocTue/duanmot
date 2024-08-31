<?php
$thongbao = "";
if (isset($_GET['idsp'])) {
    $id = $_GET['idsp'];
    $sp = loadsp($id);
    $spcl = sanphamcungloai($id, $sp['id_danh_muc']);

    // Lấy giá trị số lượng từ form
    $sl = isset($_POST['so_luong']) ? $_POST['so_luong'] : 1;

    // Tiến hành thêm vào giỏ hàng
    if (isset($_POST['addtocart'])) {
        if (empty($_POST['size'])) {
            $thongbao = "Chưa chọn size!";
        } else {
            $size = $_POST['size'];
            $i = 0;
            $check = 0;
            foreach ($_SESSION['cart'] as $cart) {
                if ($cart[0] == $id && $cart[4] == $size) {
                    $sl = $sl + $cart[5];
                    $check = 1;
                    $_SESSION['cart'][$i][5] = $sl;
                }
                $i++;
            }
            if ($check == 0) {
                $cart = [$id, $img, $name, $price, $size, $sl];
                array_push($_SESSION['cart'], $cart);
            }
            header("location:index.php?act=cart");
        }
    }
}
?>



<!-- ***** Main Banner Area End ***** -->


<!-- ***** Product Area Starts ***** -->
<section class="section" id="product">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="left-images">
                    <img src="../../../public/images/<?php echo $sp['avt'] ?>" alt="">

                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-content">
                    <h4>Tên sản phẩm : <?php echo $sp['ten_san_pham'] ?></h4>
                    
                    <!-- <ul class="stars"> 
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul> -->
                    <span>
                    Mô tả : <?php echo $sp['mo_ta'] ?></span>
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <p>Điều rất quan trọng là khách hàng phải tuân theo quy trình huấn luyện, nhưng tôi sẽ cung cấp cho anh ta một bản mod.</p>
                    </div>
                    <div class="quantity-content">
                        <div class="left-content">
                            <h6>Số đơn đặt hàng </h6>
                        </div>
                        <div class="right-content">
                            <div class="quantity buttons_added">
                                <input type="button" value="-" class="minus" id="decrease">
<input type="number" step="1" min="1" max="30" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="" id="quantity">
                                <input type="button" value="+" class="plus" id="increase">
                            </div>
                        </div>
                    </div>
                    <script>
                       document.addEventListener("DOMContentLoaded", function () {
                        const quantityInput = document.getElementById('quantity');
                        const increaseBtn = document.getElementById('increase');
                        const decreaseBtn = document.getElementById('decrease');
                        const totalPriceElement = document.getElementById('totalPrice');
                        const pricePerItem = <?php echo $sp['gia']; ?>; // Giá của mỗi sản phẩm

                        function updateTotalPrice(quantity) {
                            const totalPrice = pricePerItem * quantity;
                            totalPriceElement.innerText = 'Tổng Tiền: ' + totalPrice;
                        }

                        increaseBtn.addEventListener('click', function () {
                            let currentValue = parseInt(quantityInput.value);
                            const maxValue = parseInt(quantityInput.getAttribute('max')) || 30;

                            if (currentValue < maxValue) {
                                currentValue++;
                                quantityInput.value = currentValue;
                                updateTotalPrice(currentValue);
                            }
                        });

                        decreaseBtn.addEventListener('click', function () {
                            let currentValue = parseInt(quantityInput.value);
                            const minValue = parseInt(quantityInput.getAttribute('min')) || 1;

                            if (currentValue > minValue) {
                                currentValue--;
                                quantityInput.value = currentValue;
                                updateTotalPrice(currentValue);
                            }
                        });

                        // Mặc định, cập nhật tổng tiền dựa trên số lượng sản phẩm khi trang được tải lần đầu
                        updateTotalPrice(parseInt(quantityInput.value));
                    });
                    </script>
                    <div class="total">
                    <h4 id="totalPrice">Tổng Tiền: <?php echo $sp['gia'] ?></h4>
                    <div class="main-border-button">
                    
                    <!-- Thêm vào giỏ hàng -->
                    <form method="post" action="index.php?act=addtocart">
            <!-- Các input cho thông tin sản phẩm -->
            <input type="hidden" name="id_san_pham" value="<?php echo $sp['id_san_pham'] ?>">
            <input type="hidden" name="ten_san_pham" value="<?php echo $sp['ten_san_pham'] ?>">
            <input type="hidden" name="gia" value="<?php echo $sp['gia'] ?>">
            <input type="hidden" name="avt" value="<?php echo $sp['avt']; ?>">
           
            <?php if(isset($_SESSION['ten_tai_khoan'])) :?>
        <input type="submit" name="addtocart"  value="Mua Hàng">
        <?php endif ?>
        <?php if(!isset($_SESSION['ten_tai_khoan'])) :?>
        <a href="./taikhoan/login.php"> <input type="button" value="Đăng nhập để mua hàng"></a>
        <?php endif ?>
            <!-- Thêm các trường thông tin sản phẩm khác -->
            <!-- <input type="submit" value="Thêm vào giỏ hàng" name="addcart" > -->
        </form>

</div>
                </div>
            </div>

        </div>
</div>

</section>
<p>

<div class=" mb">
    <div class="box_title">SẢN PHẨM CÙNG LOẠI</div>
    <div class="box_content">
    <?php foreach ($spcl as $row) : ?>
    <li><a href="index.php?act=sanphamct&id=<?php echo $row['id_san_pham'] ?>"><?php echo $row['ten_san_pham'] ?></a></li>
<?php endforeach ?>
    </div>
</div>


<style>
    
</style>
<!-- ***** Product Area Ends ***** -->