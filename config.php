<?php
    function pdo_get_connection() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "admin3";
        try {
            $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connect;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
?>

<?php 
function pdo_execute($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $connect=pdo_get_connection();
        $stmt=$connect->prepare($sql);
        $stmt->execute($sql_args);
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($connect);
    }
}
function pdo_execute_lastInsertID($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $conn->lastInsertId();
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
function pdo_query($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $connect = pdo_get_connection();
        $stmt= $connect->prepare($sql);
        $stmt->execute($sql_args);
        $rows=$stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($connect);
    }
}
function pdo_query_one($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $connect = pdo_get_connection();
        $stmt= $connect->prepare($sql);
        $stmt->execute($sql_args);
        $rows=$stmt->fetch(PDO::FETCH_ASSOC);
        return $rows;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($connect);
    }
}
function select_all_table() {
    if(isset($_GET['table'])){
        $table = $_GET['table'];
        $sql = "SELECT * FROM $table";
        $result = pdo_query($sql);
        return $result;
    }
}
function select_all_table_fetch_one() {
    if(isset($_GET['table']) && isset($_GET['id']) && isset($_GET['id_edit'])){
        $id = $_GET['id'];
        $id_edit = $_GET['id_edit'];
        $table = $_GET['table'];
        $sql = "SELECT * FROM $table WHERE $id = '$id_edit'";
        $result = pdo_query_one($sql);
        return $result;
    }
}
function delete() {
    if(isset($_GET["table"])&& isset($_GET['id'])&& isset($_GET['iddl'])){
        $table = $_GET['table'];
        $id = $_GET['id'];
        $iddl = $_GET['iddl'];
        $sql = "DELETE FROM $table WHERE $id = '$iddl'";
        pdo_execute($sql);
    }
}
function danh_muc(){
    $sql = "SELECT * FROM danh_muc_san_pham";
    $result = pdo_query($sql);
    return $result;
}
function chitietnhanvien() {
    $id_nhan_vien = $_GET['id_nhan_vien'];
    $sql = "SELECT * FROM nhan_vien WHERE id_nhan_vien = '$id_nhan_vien'";
    $result = pdo_query($sql);
    return $result;
}

function nhan_vien() {
    $sql = "SELECT * FROM nhan_vien";
    $result = pdo_query($sql);
    return $result;
}
function chitietsanpham(){
    $id_sanpham = $_GET['id_sanpham'];
    $sql = "SELECT * FROM sanpham WHERE id_sanpham = '$id_sanpham'";
    $result = pdo_query($sql);
    return $result;
}
?>