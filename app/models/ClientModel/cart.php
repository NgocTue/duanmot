<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addcart'])) {
    // Lấy thông tin sản phẩm từ form
  // Giả sử bạn đã có các giá trị cho các biến này
$id_san_pham = $_POST['id_san_pham'];
$ten_san_pham = $_POST['ten_san_pham'];
$gia_gh = $_POST['gia_gh']; // Cung cấp giá trị thực cho giá sản phẩm
$so_luong_gh = $_POST['so_luong_gh']; // Cung cấp số lượng thực tế
$avt_gh = $_POST['avt_gh']; // Cung cấp đường dẫn hoặc URL hình ảnh

// Gọi hàm addtocart() với tất cả các đối số cần thiết
addtocart($id_san_pham, $ten_san_pham, $gia_gh, $so_luong_gh, $avt_gh);

    // Lấy các thông tin khác của sản phẩm

    // Gọi hàm addtocart để thêm sản phẩm vào giỏ hàng
addtocart($id_san_pham, $ten_san_pham, $gia_gh, $so_luong_gh, $avt_gh);
    
    // Chuyển hướng người dùng về trang giỏ hàng hoặc trang chi tiết sản phẩm
    header("location: index.php?act=cart"); // hoặc đến trang chi tiết sản phẩm
    exit;
}
function viewcart($del) {
    global $img_path;
    $tong = 0;
    $i = 0;

    if ($del == 1) {
        $xoasp_th = '<th>Thao tac</th>';
        $xoasp_td2 = '<td></td>';
    } else {
        $xoasp_th = '';
        $xoasp_td2 = '';
    }

    echo '<tr>
            <th>Hình </th>
            <th>Tên sản phẩm </th>   
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            ' . $xoasp_th . '
          </tr>';

    if (isset($_SESSION['mycart']) && is_array($_SESSION['mycart'])) {
        foreach ($_SESSION['mycart'] as $cart) {
            if (isset($cart[2], $cart[1], $cart[3], $cart[4])) {
                $avt = $img_path . $cart[2];
                $thanh_tien = floatval($cart[3]) * floatval($cart[4]);
                $tong += $thanh_tien;

                if ($del == 1) {
                    $xoasp_td = '<td><a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Hủy đơn hàng"></a></td>';
                } else {
                    $xoasp_td = '';
                }

                echo '<tr>
                        <td><img src="' . $avt . '" alt="" height="80px" width="40%"></td>
                        <td>' . $cart[1] . '</td>
                        <td>' . $cart[3] . '</td>
                        <td>' . $cart[4] . '</td>
                        <td>' . $thanh_tien . '</td>
                        ' . $xoasp_td . '
                      </tr>';
                $i += 1;
            }
        }
    }
    $tong = 0;
    $xoasp_td2 = ''; // hoặc gán giá trị mặc định khác tùy theo logic của bạn
  

    if (isset($_SESSION['mycart']) && is_array($_SESSION['mycart'])) {
        foreach ($_SESSION['mycart'] as $cart) {
            if (isset($cart[3], $cart[4])) {
                $thanh_tien = floatval($cart[3]) * floatval($cart[4]);
                $tong += $thanh_tien; // Cộng thành tiền của từng sản phẩm vào tổng
            }
        }
    }
    
    echo '<tr>
    <td colspan="4"> Tổng đơn hàng</td>
    <td>' . $tong . '</td>
    ' . $xoasp_td2 . '
  </tr>';
}


function tong_don_hang() {
    $tong = 0;

    if (isset($_SESSION['mycart']) && is_array($_SESSION['mycart'])) {
        foreach ($_SESSION['mycart'] as $cart) {
            if (isset($cart[3], $cart[4])) {
                $thanh_tien = floatval($cart[3]) * floatval($cart[4]);
                $tong += $thanh_tien;
            }
        }
    }
    
    return $tong;
}

// ... (Các hàm khác có thể cần kiểm tra và xử lý tương tự)


function addtocart($id_san_pham, $ten_san_pham, $gia_gh, $so_luong_gh, $avt_gh){
    // Kiểm tra xem session giỏ hàng đã được khởi tạo chưa
    if (!isset($_SESSION['mycart'])) {
        $_SESSION['mycart'] = array();
    }

    // Tạo một mảng mới chứa thông tin sản phẩm
    $cart = array($id_san_pham, $ten_san_pham, $avt_gh, $gia_gh, $so_luong_gh);

    // Thêm sản phẩm vào giỏ hàng
    array_push($_SESSION['mycart'], $cart);
}

function insert_gio_hang($name_gh,$email_gh,$address_gh,$tel_gh, $pttt, $ngay_mua_hang, $tong_don_hang)
{
    $sql = "insert into gio_hang (name_gh,pttt,ngay_mua_hang,tong_don_hang,address_gh,email_gh,tel_gh) 
    values ('$name_gh','$pttt','$ngay_mua_hang','$tong_don_hang','$address_gh','$email_gh','$tel_gh')";
    return pdo_execute_lastInsertID($sql);
}
function insert_cart($id_tai_khoan, $id_san_pham, $avt, $ten_san_pham, $gia, $so_luong, $thanh_tien, $id_gio_hang)
{
    $sql = "insert into cart (id_tai_khoan,id_san_pham,avt,ten_san_pham,gia,so_luong,thanh_tien,id_gio_hang) 
    values ('$id_tai_khoan','$id_san_pham','$avt','$ten_san_pham','$gia','$so_luong','$thanh_tien', '$id_gio_hang')";
    pdo_execute($sql);
}
function loadall_bills($id_tai_khoan){
    $sql = "SELECT * FROM  gio_hang WHERE id_tai_khoan='$id_tai_khoan'";
    $result = pdo_query($sql);
    return $result;
}
function loadone_bill($id_gio_hang)
{
    $sql = "select * from gio_hang where id_gio_hang=" . $id_gio_hang;
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadone_cart($id)
{
    $sql = "select * from cart where id=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadall_cart($id_gio_hang)
{
    $sql = "select * from cart where id_gio_hang=" . $id_gio_hang;
    $bill = pdo_query($sql);
    return $bill;
}
function loadall_cart_count($id_gio_hang)
{
    $sql = "select * from cart where id_gio_hang=" . $id_gio_hang;
    $bill = pdo_query($sql);
    return sizeof($bill);
}

function loadall_bill($kyw = "", $id_tai_khoan = 0)
{
    $sql = "select * from id_gio_hang where 1";
    if ($id_tai_khoan > 0)
        $sql .= " AND id_tai_khoan=" . $id_tai_khoan;
    if ($kyw != "")
        $sql .= " AND id like '%" . $kyw . "%' ";
    $sql .= " order by id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}
// function loadall_thongke()
// {
//     $sql = "select danhmuc.id as madm,danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice ";
//     $sql .= " from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
//     $sql .= " group by danhmuc.id order by danhmuc.id desc";
//     $listtk = pdo_query($sql);
//     return $listtk;
// }
function delete_bill($id_gio_hang)
{
    $delete = "delete from bill where id_gio_hang =" . $id_gio_hang;
    pdo_execute($delete);
}
function get_ttdh($n){
    switch($n){
        case '0':
            $tt = "Đang chờ xác nhận";
            break;
        case '1':
            $tt = "Đang chuẩn bị hàng";
            break;
        case '2':
            $tt = "Đang giao hàng";
            break;
        case '3':
            $tt = "Hoàn thành";
            break;
            case '4':
                $tt = "Hủy đơn";
                break;
        default:
        $tt="Đang chờ xác nhận";
    }
    return $tt;
}
?>