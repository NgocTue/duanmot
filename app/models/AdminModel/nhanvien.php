<?php 

function addnhanvien($id_nhan_vien,$ma_nhan_vien,$ten_nhan_vien,$email,$avt,$so_dien_thoai,$mo_ta,$nam_sinh) {
    $sql = "INSERT INTO nhan_vien(id_nhan_vien,ma_nhan_vien,ten_nhan_vien,email,avt,so_dien_thoai,mo_ta,nam_sinh) VALUES ('$id_nhan_vien','$ma_nhan_vien','$ten_nhan_vien','$email','$avt','$so_dien_thoai','$mo_ta','$nam_sinh')";
    pdo_execute($sql);
}
function editnhanvien($id_nhan_vien,$ma_nhan_vien,$ten_nhan_vien,$email,$avt,$so_dien_thoai,$mo_ta,$nam_sinh) {
    $sql = "UPDATE nhan_vien  SET `id_nhan_vien`='$id_nhan_vien',`ten_nhan_vien`='$ten_nhan_vien',`ma_nhan_vien`='$ma_nhan_vien',`email`='$email',`avt`='$avt',`so_dien_thoai`='$so_dien_thoai',`mo_ta`='$mo_ta',`nam_sinh`='$nam_sinh' WHERE id_nhan_vien = '$id_nhan_vien'";
    pdo_execute($sql);

}
?>