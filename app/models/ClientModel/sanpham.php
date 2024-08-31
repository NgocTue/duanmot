<?php 

function sanpham() {
    $sql = "SELECT *,san_pham.id_san_pham,san_pham.mo_ta, san_pham.trang_thai,san_pham.avt, avg(binh_luan.danh_gia) as avg_rate
    FROM san_pham
    JOIN danh_muc_san_pham ON san_pham.id_danh_muc = danh_muc_san_pham.id_danh_muc
    LEFT JOIN binh_luan ON binh_luan.id_san_pham = san_pham.id_san_pham
    JOIN nhan_vien ON nhan_vien.id_nhan_vien = san_pham.id_nhan_vien GROUP BY san_pham.id_san_pham";
    $result = pdo_query($sql);
    return $result;
}
function loadall_sanpham_home()
{
    $sql = "SELECT * FROM san_pham where 1 order by id_san_pham desc limit 0,8";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham($kyw, $iddm)
{
    $sql = "SELECT * FROM san_pham where 1";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and id_danh_muc = '" . $iddm . "'";
    }
    $sql .= " order by id_san_pham desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}


$kyw = '';


function loadsp($id){
    $sql = "SELECT * FROM san_pham where id_san_pham= $id";
    $listsanpham = pdo_query_one($sql);
    return $listsanpham;
}
function sanphamcungloai($id,$iddm){
    $sql = "SELECT * FROM san_pham where id_san_pham <> $id and id_danh_muc = $iddm";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}


