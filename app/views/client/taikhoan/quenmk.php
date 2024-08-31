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
    <b>Quên mật khẩu</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <!-- <p class="login-box-msg">Quên mật khẩu</p> -->

      <form action="index.php?act=quenmk" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" required name="email" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            
            <!-- /.col -->
                <div class="col-4">
                    <button type="submit" name="guiemail" class="btn btn-primary btn-block">Gửi</button>
                </div>
            <!-- /.col -->
            </div>
      </form>
        <?php
            if(isset($thongbao)&&($thongbao!="")){
                echo $thongbao;
            }
        ?>

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