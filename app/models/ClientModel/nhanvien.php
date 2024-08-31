<?php 
function top_5_nhan_vien() {
    $sql = "SELECT * FROM nhan_vien order by id_nhan_vien DESC LIMIT 5";
    $result = pdo_query($sql);
    return $result;
}