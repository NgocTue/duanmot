
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Thêm Nhân viên</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Mã Nhân viên</label>
                <input type="text" class="form-control" required id="exampleInputEmail1" name="ma_nhan_vien" placeholder="Mã Nhân viên">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tên Nhân viên</label>
                <input type="text" class="form-control" required name="ten_nhan_vien" id="exampleInputPassword1" placeholder="Tên Nhân viên">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" class="form-control" required id="exampleInputEmail1" name="email" placeholder="Email Nhân viên">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Avatar</label>
                <input type="file" class="form-control" required id="exampleInputEmail1" name="avt" placeholder="Ảnh đại diện Nhân viên">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Số điện thoại</label>
                <input type="text" class="form-control" required id="exampleInputEmail1" name="so_dien_thoai" placeholder="Số điện thoại Nhân viên">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mô tả</label>
                <input type="text" class="form-control" required id="exampleInputEmail1" name="mo_ta" placeholder="Kinh nghiệm Nhân viên">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Năm sinh</label>
                <input type="date" class="form-control" required id="exampleInputEmail1" name="nam_sinh" placeholder="Năm sinh của Nhân viên">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="addnhanvien" class="btn btn-primary">Thêm nhân viên</button>
        </div>
    </form>
</div>