<?php
include("../../../../config.php");
session_start();

$err = "";
  if(isset($_POST["login"])){
    $ten_tai_khoan = $_POST['ten_tai_khoan'];
    $mat_khau = $_POST['mat_khau'];
    $sql = " SELECT * FROM tai_khoan WHERE ten_tai_khoan = '$ten_tai_khoan' AND mat_khau = '$mat_khau'";
    // SELECT * FROM tai_khoan WHERE ten_tai_khoan = '$ten_tai_khoan' AND mat_khau = '$mat_khau'
    $result = pdo_query_one($sql);
    if(is_array($result)){
      $_SESSION['id_role']=$result['id_role'];
      $_SESSION['ten_tai_khoan']=$result['ten_tai_khoan'];
      if(isset($_POST['remember'])){
        setcookie('remember', $mat_khau, time()+60*60*24*365,"/") ;
      }
      header("location:../index.php");
    }else{
      $err = "UserName or Password isn't true";
    } 
  }
?>
<style>
    body {
        background-image: url( https://24hstore.vn/upload_images/images/2023/hinh-nen-may-tinh/1-1-hinh-nen-may-tinh-chill-win-10-1.jpg);
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
  <title>| Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Log In</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

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
          <input type="password" class="form-control" required name="mat_khau" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span style="color:red"><?php echo $err;?></span>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- <a href="./quenmk.php">Quên mật khẩu</a> -->
          <!-- /.col -->
        </div>
        <a href="./quenmk.php">Quên mật khẩu</a><br>
        <a href="./register.php">Bạn chưa có tài khoản ?</a>
      </form>

    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../admin/dist/js/adminlte.min.js"></script>
</body>
</html>