<?php 
function sanpham() {
    $sql = "SELECT *,san_pham.id_san_pham,san_pham.mo_ta, san_pham.trang_thai,nhan_vien.ma_nhan_vien,san_pham.avt, avg(binh_luan.danh_gia) as avg_rate
    FROM san_pham
    JOIN danh_muc_san_pham ON san_pham.id_danh_muc = danh_muc_san_pham.id_danh_muc
    LEFT JOIN binh_luan ON binh_luan.id_san_pham = san_pham.id_san_pham
    JOIN nhan_vien ON nhan_vien.id_nhan_vien = san_pham.id_nhan_vien GROUP BY san_pham.id_san_pham";
    $result = pdo_query($sql);
    return $result;
}
function kh_theo_dm(){
    if(isset($_GET['id_danh_muc'])){
        $id_danh_muc = $_GET['id_danh_muc'];
        $sql = "SELECT * FROM san_pham WHERE id_danh_muc = '$id_danh_muc'";
        $result = pdo_query($sql);
        return $result;
    }
}
function loadsphone($id_san_pham)
{
    $sql = "SELECT * FROM sanpham WHERE id_san_pham = '$id_san_pham';";
    $sp = pdo_query($sql);
    return $sp;
}
function dem_san_pham() {
    $sql = "SELECT COUNT(id_san_pham) as so_luong FROM san_pham";
    $rows =pdo_query_one($sql);
    $so_luong = $rows['so_luong'];
    return $so_luong;
}
function addsanpham($id_san_pham,$ten_san_pham,$avt,$gia,$mo_ta,$ghi_chu,$trang_thai,$id_nhan_vien,$id_danh_muc,$slideshow) {
        $sql = "INSERT INTO san_pham(id_san_pham,ten_san_pham, avt, gia, mo_ta,ghi_chu ,trang_thai, id_nhan_vien, id_danh_muc, slideshow) VALUES ('$id_san_pham','$ten_san_pham','$avt','$gia','$mo_ta','$ghi_chu','$trang_thai','$id_nhan_vien','$id_danh_muc','$slideshow')";
        pdo_execute($sql); 
}
function editsanpham($id_san_pham,$ten_san_pham,$avt,$gia,$mo_ta,$ghi_chu,$trang_thai,$id_nhan_vien,$id_danh_muc,$slideshow){
    $sql = "UPDATE san_pham SET ten_san_pham='$ten_san_pham', id_san_pham='$id_san_pham', avt='$avt', gia='$gia', mo_ta='$mo_ta',ghi_chu='$ghi_chu', trang_thai='$trang_thai', id_nhan_vien='$id_nhan_vien', id_danh_muc='$id_danh_muc', slideshow='$slideshow' WHERE id_san_pham ='$id_san_pham'";
    pdo_execute($sql);
}
// function loadone_sanpham($id)
// {
//     $sql = "SELECT * FROM san_pham where id = " . $id;
//     $sp =  pdo_query_one($sql);
//     return $sp;
// }

?>