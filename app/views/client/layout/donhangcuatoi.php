
<div class="page-heading about-page-heading" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-content">
            <h2>Đơn hàng của tôi</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4 main-web" style="text-align: center; display: flex; justify-content: center;">
    <div class="col-md-9">
      <div class="card mt-5">
        <div class="card-header" style="background-color: black">
          <p style="color: white; font-size: 20px;">Đơn hàng của tôi</p>
        </div>
        
        <table class="table">
          <thead>
            <tr>
             
              <th scope="col">Mã đơn hàng</th>
              <th scope="col">Ngày đặt hàng</th>
              <th scope="col">Tổng giá trị đơn hàng</th>
              <th scope="col">Tình trạng đơn hàng</th>
             
            </tr>
          </thead>
          <tbody>
            <?php 
             if(is_array($list_bill)){
                foreach($list_bill as $row):
                    extract($row);
                    $tt = get_ttdh($row['trang_thai']);
                    // $so_luong = loadall_cart_count($row['id_gio_hang']);
            ?>
            <tr>
              <th scope="row"><?php echo $row['id_gio_hang']?></th>
              <td>
              <span class="font-weight-bold"><?php echo $row['ngay_mua_hang'];?></span>
              <?php echo $row['ngay_mua_hang']?> 
              </td>
              <td><?php echo $row['tong_don_hang']?></td>
             <td><?php echo $tt;?></td>
              
            </tr>
            
            <?php endforeach; }?>
                
          </tbody>
        </table>
      </div>
    </div>
  </div>

  