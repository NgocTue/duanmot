
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['
'])) {
    // Lấy thông tin từ form
    $name_gh = $_POST['name_gh'];
    $address_gh = $_POST['address_gh'];
    $email_gh = $_POST['email_gh'];
    $tel_gh = $_POST['tel_gh'];
    $pttt = $_POST['pttt'];
}
?>
<div class="body1">
        <div class="o1">
            <h2 style="font-size:30px"></h2>
            <br>
              <div class="camon" >  
                  <h3>Cảm ơn quý khách đã đặt hàng</h3>
              </div>
        </div>
        <hr>
        <?php
// print_r($_POST); // In ra tất cả dữ liệu gửi từ form để kiểm tra xem liệu nó đã được gửi thành công hay không
?>
        <?php
          if (isset($bill) && (is_array($bill))) {
              extract($bill);
          }
        ?>
        <br>
        <div class="o2">
           <div class=""><h2>THÔNG TIN ĐƠN HÀNG</h2></div>
           <div class="tto2">
           
        -Mã Đơn Hàng: <?=$bill['id_gio_hang'];?><br>
        
        
       -Ngày đặt hàng: <?=$bill['ngay_mua_hang'];?><br>
        
        
        -Tổng đơn hàng: <?=$bill['tong_don_hang'];?><br>
        
        
        -Phương thức thanh toán: <?=$bill['pttt'];?><br>
        
        </div>
        <hr>
        
<br>
    <div class="o3">
                <div class="ttkh" style="font-size:30px">THÔNG TIN CỦA KHÁCH ĐẶT HÀNG</div>
                <div class="chuo3">
                    <table class="tbo3" style="width:60%">
                <tr>
                <td class="cot">Người đặt hàng: </td>
                <td><?= $bill['name_gh'] ?></td>
                </tr>

            <tr>
                <td>Địa chỉ:</td>
                <td><?= $bill['address_gh'] ?></td>
            </tr>

            <tr>
                <td>Email:</td>
                <td><?= $bill['email_gh'] ?></td>
                </tr>

            <tr>
                <td>Số điện thoại:</td>
                <td><?= $bill['tel_gh'] ?></td>
            </tr>

        </table>
        </div>
    </div>
    <hr>
<br>
 

    </div>

    <style>
 /* Sample CSS styles for the sections */
.body1 {
    font-family: Arial, sans-serif;
    max-width: 1400px;
    margin: 0 auto;
    padding: 120px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.o1,
.o2,
.o3 {
    margin-bottom: 20px;
}

.ttkh {
    margin-bottom: 10px;
    font-size: 24px;
}

.tbo3 {
    border-collapse: collapse;
    width: 100%;
}

.tbo3 td {
    padding: 8px;
    border-bottom: 1px solid #ccc;
}

.cot {
    font-weight: bold;
    width: 40%;
}

    </style>