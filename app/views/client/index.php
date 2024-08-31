<?php
session_start();

if(isset($_SESSION['giohang'])) $_SESSION['giohang']=[];
if(isset($_SESSION['ten_tai_khoan']))
ob_start();
include("../../models/ClientModel/cart.php");
include "../../../config.php";
include "../client/global.php";
include "../../models/ClientModel/danhmuc.php";



$dsdm = loadall_danhmuc();
// $onedm=loadone_danhmuc($id_danh_muc);
// include "../../models/ClientModel/sanpham.php";

include "../client/layout/header.php";
$onedm=loadone_danhmuc($id_danh_muc);
include "../../models/ClientModel/sanpham.php";
$spnew = loadall_sanpham_home();
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {

        case 'sanpham':
          
            //Tìm kiếm sản phẩm
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
            $kyw = $_POST['kyw'];
            } else {
            $kyw = "";
             }
            if (isset($_POST['kyw']) && $_POST['kyw'] > 0) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham("$kyw", $iddm);
            $dsdm = loadall_danhmuc();
            // $tendm = load_ten_danhmuc($iddm);
            include '../client/layout/sanpham.php';
            break;
            
            case 'addtocart':
                if(!isset($_SESSION['ten_tai_khoan'])){
                    header("location:taikhoan/login.php");
                }
                if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                    $id_san_pham = $_POST['id_san_pham'];
                    $ten_san_pham = $_POST['ten_san_pham'];
                    $avt = $_POST['avt'];
                    $gia = $_POST['gia'];
                    // Kiểm tra nếu giỏ hàng chưa được khởi tạo
                    if (!isset($_SESSION['mycart'])) {
                        $_SESSION['mycart'] = array();
                    }
                    $product_exists = false;
                    // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
                    foreach ($_SESSION['mycart'] as $key => $product) {
                        // So sánh id sản phẩm để xác định sản phẩm trong giỏ hàng
                        if ($product[0] === $id_san_pham) {
                            // Nếu sản phẩm đã tồn tại, tăng số lượng và cập nhật giá tiền
                            $_SESSION['mycart'][$key][4]++; // Tăng số lượng
                            $_SESSION['mycart'][$key][5] = $_SESSION['mycart'][$key][4] * $_SESSION['mycart'][$key][3]; // Cập nhật giá tiền
                            $product_exists = true;
                            break;
                        }
                    }
                    // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm sản phẩm mới vào giỏ hàng
                    if (!$product_exists) {
                        $so_luong = 1;
                        $thanh_tien = $so_luong * $gia;
                        $spadd = [$id_san_pham, $ten_san_pham, $avt, $gia, $so_luong, $thanh_tien];
                        array_push($_SESSION['mycart'], $spadd);
                    }
                }
                 include "../../views/client/cart/viewcart.php";
                 break;
          
            case 'delcart':
                if (isset($_GET['idcart'])) {
                    array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
                } else {
                    $_SESSION['mycart'] = [];
                }
                header('location:index.php?act=viewcart');
                break;
    
            case 'viewcart':
                include "../client/cart/viewcart.php";
                break;
    
     
            case 'bill':
                include "../client/cart/bill.php";
                break;
    
            case 'billconfirm':
                    if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                        $name_gh = $_POST['name_gh'];
                        $email_gh = $_POST['email_gh'];
                        $address_gh = $_POST['address_gh'];
                        $tel_gh = $_POST['tel_gh'];
                        $pttt = $_POST['pttt'];
                        $ngay_mua_hang = date('Y-m-d H:i:s'); // Lấy ngày và giờ hiện tại theo định dạng chuẩn MySQL
                        $tong_don_hang = tong_don_hang();
                        $id_gio_hang = insert_gio_hang($name_gh, $email_gh,$address_gh,$tel_gh, $pttt, $ngay_mua_hang, $tong_don_hang);
                        $_SESSION['mycart'] = [];
                    }
                $bill = loadone_bill($id_gio_hang);
                $billct = loadall_cart($id_gio_hang);
                include '../../views/client/cart/billcomfirm.php';
                break;

            case 'sanphamct':
                include '../client/layout/chitietsp.php';
                break;

            case 'gioithieu':
                include '../client/layout/gioithieu.php';
                break;

            case "mybill":
                $id_tai_khoan=$_SESSION['taikhoan']['id_tai_khoan'];
                $list_bill=loadall_bills($id_tai_khoan);
                include '../client/layout/donhangcuatoi.php';                       
                break;

            case 'quenmk':
                if(isset($_POST['guiemail'])&&($_POST['guiemail'])){
                    $email=$_POST['email'];
                    $checkemail=checkemail($email);
                    if(is_array($checkemail)){
                    $thongbao="Mật khẩu của bạn là: ".$checkemail['mat_khau'];
                    }else{
                        $thongbao="Email không tồn tại.!! Vui lòng kiểm tra lại";
                    }
                }
                include "../client/taikhoan/quenmk.php";
                break; 
            default:
            break;
    }
}else{
include "../client/layout/main.php";
}

include "../client/layout/sale.php";
include "../client/layout/footer.php";


?>
