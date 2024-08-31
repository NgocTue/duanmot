
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Thêm Sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên Sản phẩm</label>
                <input type="text" class="form-control" id="exampleInputEmail1" required name="ten_san_pham" placeholder="Tên Sản phẩm">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Giá</label>
                <input type="number" class="form-control" name="gia" required id="exampleInputPassword1" placeholder="Giá sản phẩm">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Ảnh </label>
                <input type="file" class="form-control" name="avt" id="exampleInputPassword1" placeholder="ảnh sản phẩm">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mô tả</label>
                <input type="text" class="form-control" id="exampleInputEmail1" required name="mo_ta" placeholder="mô tả sản phẩm ">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ghi chú</label>
                <input type="text" class="form-control" id="exampleInputEmail1" required name="ghi_chu" placeholder="ghi chú ">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Trạng thái</label>
                <select name="trang_thai" id="">
                    <option value="yes">Shop còn sản phẩm</option>
                    <option value="no">Shop không còn sản phẩm</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nhân viên</label>
                <select name="id_nhan_vien" id="">
                    <?php
                        $nv = nhan_vien();
                        foreach($nv as $row):
                        extract($row);?>
                        <option value="<?=$id_nhan_vien;?>"><?=$ma_nhan_vien;?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Danh Mục</label>
                <select name="id_danh_muc" id="">
                    <?php
                        $danhmuc = danh_muc();
                        foreach($danhmuc as $row):
                        extract($row);?>
                        <option value="<?=$id_danh_muc;?>"><?=$ten_danh_muc;?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Show slide</label>
                <select name="slideshow" id="">
                    <option value="show">Show</option>
                    <option value="none">None</option>
                </select>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="addsanpham" class="btn btn-primary">Thêm sản phẩm</button>
        </div>
    </form>
</div>