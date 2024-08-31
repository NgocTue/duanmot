<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>

</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Tổng đơn hàng</th>
                <th scope="col">Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $all_don_hang = select_all_table(); 
            foreach($all_don_hang as $row):
            ?>
                <tr>
                    <th scope="row"><?= $row['id_gio_hang'] ?></th>
                    <td><?= $row['name_gh'] ?></td>  
                    <td><?= $row['tong_don_hang'] ?></td>  
                    <td>
                        <?php if(isset($row['trang_thai']) && $row['trang_thai'] == 0): ?>
                            <span class="label bg-red">Đang chờ xác nhận</span>
                        <?php elseif(isset($row['trang_thai']) && $row['trang_thai'] == 1): ?>
                            <span class="label bg-yellow">Đã chuẩn bị hàng</span>
                        <?php elseif(isset($row['trang_thai']) && $row['trang_thai'] == 2): ?>
                            <span class="label bg-blue">Đang giao</span>
                        <?php elseif(isset($row['trang_thai']) && $row['trang_thai'] == 3): ?>
                            <span class="label bg-green">Hoàn thành</span>
                        <?php elseif(isset($row['trang_thai']) && $row['trang_thai'] == 4): ?>
                        <span class="label bg-red">Hủy đơn</span>
                        <?php endif; ?>
                    </td>
                    <td>
                         <a href="index.php?act=chitietdonhang&table=gio_hang&id_gio_hang=<?= $row['id_gio_hang'] ?>" title="Xem chi tiết" class="btn btn-success"><i class="fa fa-fw fa-edit"></i>Xem chi tiết</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

<style>
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
</html>
