<?php 
session_start();
unset($_SESSION['ten_tai_khoan']);
unset($_SESSION['id_role']);
setcookie('remember', '', time() - 1, '/');
header('location: ../index.php');
?>