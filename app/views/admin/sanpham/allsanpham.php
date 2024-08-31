<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Mã Sản phẩm</th>
            <th scope="col">Tên Sản phẩm</th>
            <th scope="col">AVT</th>
            <th scope="col">Giá</th>
            <th scope="col">Mô Tả</th>
            <th scope="col">Số Lượt Xem</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Mã Nhân Viên</th>
            <th scope="col">Danh Mục</th>
            <th scope="col">Slideshow</th>
            <th scope="col">Điểm TB</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sanpham = sanpham();
        foreach($sanpham as $row):
        extract($row); ?>
        <tr>
            <th scope="row"><?=$id_san_pham ?></th>
            <td><?=$ten_san_pham ?></td>
            <td><img style="width:100px;height:80px" src="../../../public/images/<?=$avt ?>" alt=""></td>
            <td><?=$gia ?></td>
            <td><?=$mo_ta ?></td>
            <td><?=$so_luot_xem ?></td>
            <td><?=$trang_thai ?></td>
            <td><?=$ma_nhan_vien ?></td>
            <td><?=$ten_danh_muc ?></td>       
            <td><?=$slideshow ?></td>       
            <td><?php if ($avg_rate != ""):echo number_format($avg_rate, 1);else:echo "5";endif; ?> <i class="fa fa-star" style="color: #f5cd3d;"></i> </td>       
            <td><a href="index.php?act=editsanpham&table=san_pham&id=id_san_pham&id_edit=<?=$id_san_pham;?>"><button class="btn btn-warning">Sửa</button></a>
                <a href="index.php?act=delete&header=allsanpham&table=san_pham&id=id_san_pham&iddl=<?=$id_san_pham;?>"><button class="btn btn-danger">Xóa</button></a>
            </td>       
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</body>
</html>