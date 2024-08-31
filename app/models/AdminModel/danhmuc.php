<?php 
        function adddanhmuc($ten_danh_muc,$mo_ta,$trang_thai,$anh) {
                $sql = "INSERT INTO danh_muc_san_pham(ten_danh_muc, mo_ta, trang_thai, anh) VALUES ('$ten_danh_muc','$mo_ta','$trang_thai','$anh')";
                pdo_execute($sql);
        }
        function editdanhmuc($id_danh_muc,$ten_danh_muc,$mo_ta,$trang_thai,$anh) {
                $sql = "UPDATE danh_muc_san_pham SET id_danh_muc='$id_danh_muc', ten_danh_muc='$ten_danh_muc',mo_ta='$mo_ta',trang_thai='$trang_thai', anh='$anh' WHERE id_danh_muc = '$id_danh_muc'";
                pdo_execute($sql);
        }
        
                     

?>