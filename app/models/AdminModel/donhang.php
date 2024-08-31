<?php 
    function all_don_hang() {
        $sql = "SELECT * ,gio_hang.id_gio_hang ,gio_hang.ngay_mua_hang,gio_hang.trang_thai,gio_hang.tong_don_hang,gio_hang.pttt,gio_hang.name_gh,gio_hang.address_gh,gio_hang.email_gh,gio_hang.tel_gh 
        FROM gio_hang
        JOIN san_pham ON gio_hang.id_san_pham = san_pham.id_san_pham
";
        $result = pdo_query($sql);
        return $result;
    }
  
// Trong AdminController.php hoặc một file tương tự

function select_don_hang_by_id($id_gio_hang) {
    // Kết nối cơ sở dữ liệu và thực hiện truy vấn
    // Ví dụ sử dụng PDO
    $pdo = new PDO("mysql:host=localhost;dbname=admin3", "root", "");

    $stmt = $pdo->prepare("SELECT * FROM gio_hang WHERE id_gio_hang = :id");
    $stmt->bindParam(':id', $id_gio_hang);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

