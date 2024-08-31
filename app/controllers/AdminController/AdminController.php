<?php 
    if(isset($_GET["act"])){
        $act = $_GET['act'];
        switch ($act) {
            case 'alldanhmuc':
                include('../../views/admin/danhmuc/alldanhmuc.php');
                break;
            case 'adddanhmuc':
                include('../../views/admin/danhmuc/adddanhmuc.php');
                if(isset($_POST['adddanhmuc'])){
                    if(isset($_POST['adddanhmuc'])){
                        $trang_thai = $_POST['trang_thai'];
                        $mo_ta = $_POST['mo_ta'];
                        $ten_danh_muc = $_POST['ten_danh_muc'];
                        if($_FILES['anh']['name'] != ""){
                            $anh = basename($_FILES["anh"]["name"]);
                            $target_dir = "../../../public/images/";
                            $target_file = $target_dir . $anh;
                            move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);  
                        }else{
                            $anh ="";
                        }
                        adddanhmuc($ten_danh_muc,$mo_ta,$trang_thai,$anh);
                        header("location:index.php?act=alldanhmuc&table=danh_muc_san_pham");
                        $sql = "INSERT INTO danh_muc_san_pham(ten_danh_muc, mo_ta, trang_thai, anh) VALUES ('$ten_danh_muc','$mo_ta','$trang_thai','$anh')";                   

                }
            }           
                break;
            case 'editdanhmuc':
                include('../../views/admin/danhmuc/editdanhmuc.php');
                if (isset($_POST["editdanhmuc"])) {
                    $id_danh_muc = $_POST['id_danh_muc'];
                    $trang_thai = $_POST['trang_thai'];
                    $mo_ta = $_POST['mo_ta'];
                    $ten_danh_muc = $_POST['ten_danh_muc'];
                  
                    if($_FILES['anh']['name'] != ""){
                        $anh = basename($_FILES["anh"]["name"]);
                        $target_dir = "../../../public/images/";
                        $target_file = $target_dir . $anh;
                        move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);  
                    }else{
                        $anh ="";   
                    }
                    editdanhmuc($id_danh_muc,$ten_danh_muc,$mo_ta,$trang_thai,$anh);
                    header("location:index.php?act=alldanhmuc&table=danh_muc_san_pham");
                }
                break;
            case 'allsanpham':
                include('../../views/admin/sanpham/allsanpham.php');
                break;
                case 'alldonhang':
                    include('../../views/admin/donhang/alldonhang.php');
                    break;
                case 'chitietdonhang':
                    include('../../views/admin/donhang/chitietdonhang.php');
                    break;
            case 'khtheodm':
                include('../../views/admin/sanpham/khtheodm.php');
                break;
            case 'addsanpham':
                include('../../views/admin/sanpham/addsanpham.php');
                if (isset($_POST["addsanpham"])) {
                    $trang_thai = $_POST['trang_thai'];
                    $mo_ta = $_POST['mo_ta'];
                    $ten_san_pham = $_POST['ten_san_pham'];
                    $id_san_pham = $_POST['id_san_pham'];
                    $ghi_chu = $_POST['ghi_chu'];
                    if($_FILES['avt']['name'] != ""){
                        $avt = basename($_FILES["avt"]["name"]);
                        $target_dir = "../../../public/images/";
                        $target_file = $target_dir . $avt;
                        move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);  
                    }else{
                        $avt ="";
                    }
                    $tien_hoc = $_POST['tien_hoc'];
                    $gia = $_POST['gia'];
                    $id_nhan_vien = $_POST['id_nhan_vien'];
                    $id_danh_muc = $_POST['id_danh_muc'];
                    $slideshow = $_POST['slideshow'];
                    addsanpham($id_san_pham,$ten_san_pham,$avt,$gia,$mo_ta,$ghi_chu,$trang_thai,$id_nhan_vien,$id_danh_muc,$slideshow);
                        $sql = "INSERT INTO san_pham(id_san_pham,ten_san_pham, avt, gia, mo_ta,ghi_chu ,trang_thai, id_nhan_vien, id_danh_muc, slideshow) VALUES ('$id_san_pham','$ten_san_pham','$avt','$gia','$mo_ta','$ghi_chu','$trang_thai','$id_nhan_vien','$id_danh_muc','$slideshow')";                    header("location:index.php?act=allsanpham&table=sanpham");
                }
                break;
            case 'editsanpham':
                include('../../views/admin/sanpham/editsanpham.php');
                if (isset($_POST["editsanpham"])) {
                    $trang_thai = $_POST['trang_thai'];
                    $id_san_pham = $_POST['id_san_pham'];
                    $mo_ta = $_POST['mo_ta'];
                    $ten_san_pham = $_POST['ten_san_pham'];
                    if($_FILES['avt']['name'] != ""){
                        $avt = basename($_FILES["avt"]["name"]);
                        $target_dir = "../../../public/images/";
                        $target_file = $target_dir . $avt;
                        move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);  
                    }else{
                        $avt ="";   
                    }
                    $gia = $_POST['gia'];
                    $id_nhan_vien = $_POST['id_nhan_vien'];
                    $id_danh_muc = $_POST['id_danh_muc'];
                    $slideshow = $_POST['slideshow'];
                    editsanpham($id_san_pham,$ten_san_pham,$avt,$gia,$mo_ta,$ghi_chu,$trang_thai,$id_nhan_vien,$id_danh_muc,$slideshow);
                    header("location:index.php?act=allsanpham&table=sanpham");
                }
                break;
            case 'allnhanvien':
                include('../../views/admin/nhanvien/allnhanvien.php');
                break;
                
            case 'addnhanvien':
                include('../../views/admin/nhanvien/addnhanvien.php');
                if (isset($_POST["addnhanvien"])) {
                    $ma_nhan_vien = $_POST['ma_nhan_vien'];
                    $ten_nhan_vien = $_POST['ten_nhan_vien'];
                    $email = $_POST['email'];
                    $nam_sinh = $_POST['nam_sinh'];
                    $so_dien_thoai = $_POST['so_dien_thoai'];
                    if($_FILES['avt']['name'] != ""){
                        $avt = basename($_FILES["avt"]["name"]);
                        $target_dir = "../../../public/images/";
                        $target_file = $target_dir . $avt;
                        move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);  
                    }else{
                        $avt ="";
                    }
                    $mo_ta = $_POST['mo_ta'];
                    addnhanvien($id_nhan_vien,$ma_nhan_vien,$ten_nhan_vien,$email,$avt,$so_dien_thoai,$mo_ta,$nam_sinh);
                    header("location:index.php?act=allnhanvien&table=nhan_vien");
                }
                break;
            case 'editnhanvien':
                include('../../views/admin/nhanvien/editnhanvien.php');
                if (isset($_POST["editnhanvien"])) {
                    $id_nhan_vien = $_POST['id_nhan_vien'];
                    $ma_nhan_vien = $_POST['ma_nhan_vien'];
                    $ten_nhan_vien = $_POST['ten_nhan_vien'];
                    $email = $_POST['email'];
                    $nam_sinh = $_POST['nam_sinh'];
                    $so_dien_thoai = $_POST['so_dien_thoai'];
                    if($_FILES['avt']['name'] != ""){
                        $avt = basename($_FILES["avt"]["name"]);
                        $target_dir = "../../../public/images/";
                        $target_file = $target_dir . $avt;
                        move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);  
                    }else{
                        $avt ="";
                    }
                    $mo_ta = $_POST['mo_ta'];
                    editnhanvien($id_nhan_vien,$ma_nhan_vien,$ten_nhan_vien,$email,$avt,$so_dien_thoai,$mo_ta,$nam_sinh);
                    header("location:index.php?act=allnhanvien&table=nhan_vien");
                }
                break;
            case 'allbinhluan':
                include('../../views/admin/binhluan/allbinhluan.php');
                break;
            case 'addrole':
                include('../../views/admin/quyennguoitruycap/addrole.php');
                if (isset($_POST["addrole"])) {
                    $name_role = $_POST['name_role'];
                    $mo_ta = $_POST['mo_ta'];
                    addrole($id_role,$name_role,$mo_ta);
                    header("location:index.php?act=allrole&table=role");
                }
                break;
            case 'allrole':
                include('../../views/admin/quyennguoitruycap/allrole.php');
                break;
            case 'editrole':
                include('../../views/admin/quyennguoitruycap/editrole.php');
                if (isset($_POST["editrole"])) {
                    $id_role=$_POST['id_role'];
                    $name_role = $_POST['name_role'];
                    $mo_ta = $_POST['mo_ta'];
                    editrole($id_role,$name_role,$mo_ta);
                    header("location:index.php?act=allrole&table=role");
                }
                break;
            case 'alllienhe':
                include('../../views/admin/lienhe/alllienhe.php');
                break;
            case 'allkhuyenmai':
                include('../../views/admin/khuyenmai/allkhuyenmai.php');
                break;
            case 'addkhuyenmai':
                include('../../views/admin/khuyenmai/addkhuyenmai.php');
                if (isset($_POST["addkhuyenmai"])) {
                    $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
                    $ngay_bat_dau = $_POST['ngay_bat_dau'];
                    $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
                    $noi_dung = $_POST['noi_dung'];
                    addkhuyenmai($id_khuyen_mai,$ngay_bat_dau,$ngay_ket_thuc,$ten_khuyen_mai,$noi_dung) ;
                    header("location:index.php?act=allkhuyenmai&table=khuyen_mai");
                }
                break;
            case 'editkhuyenmai':
                include('../../views/admin/khuyenmai/editkhuyenmai.php');
                if (isset($_POST["editkhuyenmai"])) {
                    $id_khuyen_mai = $_POST['id_khuyen_mai'];
                    $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
                    $ngay_bat_dau = $_POST['ngay_bat_dau'];
                    $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
                    $noi_dung = $_POST['noi_dung'];
                    editkhuyenmai($id_khuyen_mai,$ngay_bat_dau,$ngay_ket_thuc,$ten_khuyen_mai,$noi_dung);
                    header("location:index.php?act=allkhuyenmai&table=khuyen_mai");
                }
                break;
            case 'alltaikhoan':
                include('../../views/admin/taikhoan/alltaikhoan.php');
                break;
            case 'addtaikhoan':
                include('../../views/admin/taikhoan/addtaikhoan.php');
                if (isset($_POST["addtaikhoan"])) {
                    $ten_tai_khoan = $_POST['ten_tai_khoan'];
                    $email = $_POST['email'];
                    $so_dien_thoai = $_POST['so_dien_thoai'];
                    $ho_va_ten = $_POST['ho_va_ten'];
                    $mat_khau = $_POST['mat_khau'];
                    if($_FILES['avt']['name'] != ""){
                        $avt = basename($_FILES["avt"]["name"]);
                        $target_dir = "../../../public/images/";
                        $target_file = $target_dir . $avt;
                        move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);  
                    }else{
                        $avt ="";
                    }
                    $nam_sinh = $_POST['nam_sinh'];
                    $mo_ta = $_POST['mo_ta'];
                    $id_role = $_POST['id_role'];
                    addtaikhoan($id_tai_khoan,$ten_tai_khoan,$email,$nam_sinh,$avt,$so_dien_thoai,$id_role,$ho_va_ten,$mat_khau);  
                    header("location:index.php?act=alltaikhoan&table=tai_khoan");
                }
                break;
            case 'edittaikhoan':
                include('../../views/admin/taikhoan/edittaikhoan.php');
                if (isset($_POST["edittaikhoan"])) {
                    $id_tai_khoan = $_POST["id_tai_khoan"];
                    $ten_tai_khoan = $_POST['ten_tai_khoan'];
                    $email = $_POST['email'];
                    $mat_khau = $_POST['mat_khau'];
                    $so_dien_thoai = $_POST['so_dien_thoai'];
                    $ho_va_ten = $_POST['ho_va_ten'];
                    if($_FILES['avt']['name'] != ""){
                        $avt = basename($_FILES["avt"]["name"]);
                        $target_dir = "../../../public/images/";
                        $target_file = $target_dir . $avt;
                        move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);  
                    }else{
                        $avt ="";
                    }
                    $nam_sinh = $_POST['nam_sinh'];
                    $mo_ta = $_POST['mo_ta'];
                    $id_role = $_POST['id_role'];
                    edittaikhoan($id_tai_khoan,$ten_tai_khoan,$email,$nam_sinh,$avt,$so_dien_thoai,$id_role,$ho_va_ten,$mat_khau);
                    header("location:index.php?act=alltaikhoan&table=tai_khoan");
                }
                break;
            case 'contact':
                include('../../views/admin/layout/contact.php');
                break;
            case 'delete':
                include('../../models/adminmodel/delete.php');
                break; 
        }
    }else{
        include("layout/home.php");
    }
?>