<div class="container">
    <div class="row">
        <?php
        $host = 'localhost';
        $dbname = 'admin3';
        $username = 'root';
        $password = '';
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Kết nối đến cơ sở dữ liệu thất bại: " . $e->getMessage();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_gio_hang = $_GET['id_gio_hang'];
            $trang_thai = $_POST['trang_thai'];
            $update_query = "UPDATE gio_hang SET trang_thai = :trang_thai WHERE id_gio_hang = :id_gio_hang";
            $stmt = $pdo->prepare($update_query);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':id_gio_hang', $id_gio_hang);
            if ($stmt->execute()) {
                header('location:index.php?act=alldonhang&table=gio_hang');
                exit();
            } else {
                echo "Lỗi khi cập nhật trạng thái đơn hàng";
            }
        }
        $id_gio_hang = $_GET['id_gio_hang'];
        $don_hang = select_don_hang_by_id($id_gio_hang); // Hàm này truy vấn thông tin đơn hàng dựa trên id

                if ($don_hang) {
                    // Hiển thị thông tin cho đơn hàng cụ thể
                    $ngay_mua_hang = $don_hang['ngay_mua_hang'];
                    $tong_don_hang = $don_hang['tong_don_hang'];
                    $pttt = $don_hang['pttt'];
                    $name_gh = $don_hang['name_gh'];
                    $address_gh = $don_hang['address_gh'];
                    $email_gh = $don_hang['email_gh'];
                    $tel_gh = $don_hang['tel_gh'];
                    $trang_thai = $don_hang['trang_thai'];

                if(isset($_POST['trang_thai'])){
                    $trang_thai = $_POST['trang_thai'];
                    $update_query = "UPDATE gio_hang SET trang_thai = $trang_thai WHERE id = $id_gio_hang";
                    header('location:index.php?act=alldonhang&table=gio_hang');
                }
        ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Thông tin khách hàng</h3>
            </div>
            <div class="panel-body text-left">
                <!-- Hiển thị thông tin khách hàng từ dữ liệu -->
                <p>Người đặt hàng: <?php echo $name_gh ?></p>
                <p>Địa chỉ: <?php echo $address_gh ?></p>
                <p>Email: <?php echo $email_gh ?></p>
                <p>Số điện thoại: <?php echo $tel_gh ?></p>
                <p>Trạng thái đơn hàng:</p>
             <span class="label bg-<?php echo ($trang_thai == 0) ? 'red' : (($trang_thai == 1) ? 'yellow' : (($trang_thai == 2) ? 'blue' : (($trang_thai == 3) ? 'green' : 'red'))) ?>">        <?php
                    if ($trang_thai == 0) {
                        echo 'Đang chờ xác nhận';
                    } elseif ($trang_thai == 1) {
                        echo 'Đã chuẩn bị hàng';
                    } elseif ($trang_thai == 2) {
                        echo 'Đang giao';
                    } elseif ($trang_thai == 3) {
                        echo 'Hoàn thành';
                    } elseif ($trang_thai == 4) {
                        echo 'Hủy đơn';
                    }
                    ?>
                </span>
                
            </div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Thông tin đơn hàng</h3>
            </div>
            <div class="panel-body text-left">
                <p>Mã đơn hàng: <?php echo $id_gio_hang ?></p>
                <p>Ngày đặt hàng: <?php echo $ngay_mua_hang ?></p>
                <p>Thành tiền: <?php echo $tong_don_hang ?></p>
                <p>Phương thức thanh toán: <?php echo $pttt ?></p>

                <!-- Dropdown Trạng thái đơn hàng -->
                <form action="" method="POST" class="form-inline" role="form">
                    <label for="trang_thai">Trạng thái đơn hàng:</label>
                    <select name="trang_thai" id="trang_thai" class="form-control" required="required">
                        <option value="0">Đang chờ xác nhận</option>
                        <option value="1">Đã chuẩn bị hàng</option>
                        <option value="2">Đang giao</option>
                        <option value="3">Hoàn thành</option>
                        <option value="4">Hủy đơn</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
        <?php
            }
        
        ?>
    </div>
</div>

    <style>
        /* Các phần tử panel */
        .panel {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: none;
        }

        .panel-title {
            font-size: 18px;
        }

        .panel-body {
            padding: 15px;
        }

        /* Thẻ p trong panel */
        .panel-body p {
            margin-bottom: 5px;
        }

        /* Dropdown */
        .form-inline {
            margin-bottom: 15px;
        }

        /* Nút cập nhật */
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        /* Container và row */
        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .row {
            margin-right: -15px;
            margin-left: -15px;
        }

        /* CSS cho table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }

        /* CSS cho các label trạng thái */
        .label {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 14px;
            font-weight: bold;
        }
        .bg-red {
            background-color: #ff4d4d;
            color: #fff;
        }
        .bg-green {
            background-color: #2ecc71;
            color: #fff;
        }
        .bg-yellow {
            background-color: #f1c40f;
            color: #fff;
        }
        .bg-blue {
            background-color: #3498db;
            color: #fff;
        }

        /* CSS cho button */
        .btn {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .btn-success {
            background-color: #28a745;
            color: #fff;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .fa {
            margin-right: 5px;
        }
    </style>