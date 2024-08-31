<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Trang chủ</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <!-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> -->
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <nav class="main-nav flex justify-between items-center pt-2">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">
                            <img src="assets/images/logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->

                        <ul class="nav">

                            <li class="scroll-to-section"><a href="index.php" class="active">Trang chủ</a></li>
                            <li class="scroll-to-section submenu">
                                <a href="index.php?act=sanpham">Danh mục</a>
                                <ul>
                                    <?php
                                    foreach ($dsdm as $dm) {
                                        extract($dm);
                                        $linkdm = "index.php?act=sanpham&iddm=" . $id_danh_muc;
                                        echo '<li><a href="' . $linkdm . '">' . $ten_danh_muc . '</a></li>';
                                    }
                                    ?>
                                    <!-- <li><a href="">áo</a></li>
                                    <li><a href="">quần</a></li> -->
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="index.php?act=gioithieu">Giới thiệu</a></li>
                            <li class="scroll-to-section"><a href="index.php">Liên hệ</a></li>

                            <div class="tk">
                                <form class="flex justify-between items-center " action="index.php?act=sanpham" method="post">

                                    <input class=" timkiem border border-lg" type="text" name="timkiem" placeholder="Tìm kiếm">

                                    <button class="pl-1" type="submit" name="timkiem"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                        </svg></button>

                                </form>
                            </div>
                            <!-- Giỏ Hàng -->
                            <li class="scroll-to-section">
                                <a class="cart" href="index.php?act=addtocart">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1M8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
                                    </svg>
                                </a>
                            </li>
                            <!-- Đăng nhập -->
                            <?php
                                if (isset($_SESSION['ten_tai_khoan'])) {
                                    // Lấy tên tài khoản từ session
                                    $ten_tai_khoan = $_SESSION['ten_tai_khoan'];

                                    // Kiểm tra vai trò người dùng, nếu là admin thì hiển thị link đến trang quản trị
                                    if (isset($_SESSION['id_role']) && $_SESSION['id_role'] == 3) {
                                        $ad = "<li><a href='../admin/index.php'>Đăng nhập admin</a></li>";
                                    } else {
                                        $ad = "";
                                    }

                                    // Hiển thị liên kết "Đơn hàng của tôi" và liên kết đăng xuất
                                    echo '<li class="submenu">
                                            Xin chào, <b>' . $ten_tai_khoan . '!</b>
                                            <ul>' . $ad . '
                                                <li><a href="index.php?act=mybill">Đơn hàng của tôi</a></li> <!-- Liên kết đến trang hiển thị đơn hàng của người dùng -->
                                                <li><a href="./taikhoan/logout.php">Đăng xuất</a></li>

                                            </ul>
                                        </li>';
                                } else {
                                    // Hiển thị liên kết "Đăng nhập" và "Đăng ký" nếu chưa đăng nhập
                                    echo '<li class="submenu">
                                            <a href="javascript:;" class="user"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                            </svg></a>
                                            <ul>
                                                <li><a href="./taikhoan/login.php">Đăng nhập</a></li>
                                                <li><a href="./taikhoan/register.php">Đăng ký</a></li>
                                            </ul>
                                        </li>';
                                }
                            ?>



                        </ul>
                        <!-- ***** Menu End ***** -->
                    </nav>

                </div>

            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    <?php
    ?>