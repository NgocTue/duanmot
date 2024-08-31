<?php 
session_start();

    
        include("../../../config.php");
        include("../../models/AdminModel/binhluan.php");
        include("../../models/AdminModel/danhmuc.php");
        include("../../models/AdminModel/sanpham.php");
        include("../../models/AdminModel/donhang.php");
        include("../../models/AdminModel/nhanvien.php");
        include("../../models/AdminModel/quyen.php");
        include("../../models/AdminModel/taikhoan.php");
        include("../../models/AdminModel/khuyenmai.php");


        include("layout/header.php");
        include("../../controllers/AdminController/AdminController.php");
        include("layout/footer.php");
    


?>