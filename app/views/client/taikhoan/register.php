<?php
include("../../../../config.php");
$err = $success= "";
if(isset($_POST['register'])){
  $ten_tai_khoan = $_POST['ten_tai_khoan'];
  $ho_va_ten = $_POST['ho_va_ten'];
  $email = $_POST['email'];
  $nam_sinh = $_POST['nam_sinh'];
  $so_dien_thoai = $_POST['so_dien_thoai'];
  $adress = $_POST['adress'];
  $mat_khau = $_POST['mat_khau'];
  $id_role = $_POST['id_role'];
  $xn_mat_khau = $_POST['xn_mat_khau'];
  if($mat_khau === $xn_mat_khau){
    $sql = "INSERT INTO tai_khoan(ten_tai_khoan, ho_va_ten, email, nam_sinh, so_dien_thoai, adress, mat_khau,id_role) VALUES ('$ten_tai_khoan', '$ho_va_ten','$email', '$nam_sinh', '$so_dien_thoai', '$adress', '$mat_khau','$id_role')";
    pdo_execute($sql);
    $_COOKIE['ten_tai_khoan'] = $ten_tai_khoan;
    $success = "Register Success";  
  }else{
    $err = "Password Confirmation Error";
  }

}
  ?>
  <style>
    body {
        background-image: url( https://demoda.vn/wp-content/uploads/2022/01/hinh-nen-4k-laptop-va-pc-toi-gian-800x500.jpg);
        background-color: #cccccc;
        /* background-repeat: no-repeat; */
        background-size: cover;
    }
  </style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>| Đăng ký</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b>Register</b>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" required name="ten_tai_khoan" placeholder="User Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" required name="ho_va_ten" placeholder="Full Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" required name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="date" class="form-control" required name="nam_sinh" placeholder="Năm sinh">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" required name="so_dien_thoai" placeholder="Số điện thoại">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" required name="adress" placeholder="Địa chỉ">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" required name="mat_khau" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" required name="xn_mat_khau" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span style="color:red"><?php echo $err ;?></span> <span style="color:green;"><?php echo $success;?></span>
        <input type="hidden" name="id_role" value="1">
        <div class="row">
          <div class="col-4">
           
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- <a href="./login.php" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i style="color:blue" class="font-sm feather-user-plus mr-3 text-blue-500"></i><span>login</span></a></li> -->
          <a href="./login.php" class="nav-content-bttn open-font h-auto pt-2 pb-2"><span>login</span></a></li>
          <!-- /.col -->
        </div>
      </form>

     

     
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../admin/dist/js/adminlte.min.js"></script>
</body>
</html>