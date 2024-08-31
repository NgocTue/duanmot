<?php 
    function all_binh_luan() {
        $sql = "SELECT * FROM binh_luan 
        JOIN tai_khoan ON binh_luan.id_tai_khoan = tai_khoan.id_tai_khoan
        JOIN san_pham ON  binh_luan.id_san_pham = san_pham.id_san_pham";
        $result = pdo_query($sql);
        return $result;
    }
        
?>