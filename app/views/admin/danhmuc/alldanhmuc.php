
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
            <th scope="col">Mã Danh Mục</th>
            <th scope="col">Tên Danh Mục sản phẩm</th>
            <th scope="col">Mô Tả</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Ảnh</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $danhmuc = select_all_table();
        foreach($danhmuc as $row):
        extract($row); ?>
        <tr>
            <th scope="row"><?=$id_danh_muc ?></th>
            <td><a href="index.php?act=khtheodm&id_danh_muc=<?=$id_danh_muc;?>"><?=$ten_danh_muc ?></a></td>
            <td><?=$mo_ta ?></td>
            <td><?=$trang_thai ?></td>       
            <td><img style="width:100px;height:80px" src="../../../public/images/<?=$anh ?>" alt=""></td>
            <td><a href="index.php?act=editdanhmuc&id=id_danh_muc&table=danh_muc_san_pham&id_edit=<?=$id_danh_muc?>"><button class="btn btn-warning">Sửa</button></a>
                <a href="index.php?act=delete&header=alldanhmuc&id=id_danh_muc&table=danh_muc_san_pham&iddl=<?=$id_danh_muc;?>"><button class="btn btn-danger">Xóa</button></a>
            </td>       
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</body>
</html>