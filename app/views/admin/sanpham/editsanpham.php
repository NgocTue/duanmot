
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Sửa sản phẩm</h3>
    </div>
    <?php
        $editsp = select_all_table_fetch_one();
        extract($editsp); 
    ?>
    <form method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="text" class="form-control"  id="exampleInputEmail1" required name="ten_san_pham" value="<?=$ten_san_pham;?>" placeholder="Tên sản phẩm">
                <input type="hidden" class="form-control" id="exampleInputEmail1" required value="<?=$id_san_pham;?>" name="id_san_pham" placeholder="Tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Giá</label>
                <input type="number" class="form-control" name="gia" value="<?=$gia;?>" required id="exampleInputPassword1" placeholder="giá">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Ảnh</label>
                <input type="file" class="form-control" name="avt" id="exampleInputPassword1" required placeholder="ảnh đại diện sản phẩm">
            </div>
            Ảnh hiện tại<img style="width: 100px;height:80px;" src="../../../public/images/<?=$avt?>" alt="">
            <div class="form-group">
                <label for="exampleInputEmail1">Mô tả</label>
                <input type="text" class="form-control" value="<?=$mo_ta;?>" id="exampleInputEmail1" required name="mo_ta" placeholder="Mô tả sản phẩm">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Trạng thái</label>
                <select name="trang_thai" id="">
                    <option value="<?=$trang_thai;?>">Shop còn sản phẩm không </option>
                    <option value="yes">Còn sản phẩm</option>
                    <option value="no">Không còn sản phẩm</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nhân viên viên</label>
                <select name="id_nhan_vien" id="">
                    <?php
                        $nvkh = nhan_vien();
                        foreach($nvkh as $row):
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
            <button type="submit" name="editsanpham" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
</div>