<div class="giohang">
    <h3>Giỏ hàng</h3>
    <table>
        <?php viewcart(1); ?> <!-- Gọi hàm viewcart để hiển thị thông tin giỏ hàng -->
    </table>
    <div class="bill">
        <a href="index.php?act=bill"> <input type="button" value="Tiếp tục đặt hàng"></a>
        <a href="index.php?act=delcart"><input type="button" value="Xoá giỏ hàng"></a>
    </div>
</div>


<style>
 /* Your existing CSS styles */
.giohang {
    position: relative;
    top: 80px;
    width: 80%; /* Adjust the width as needed */
    margin: 0 auto; /* Center the content horizontally */
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.giohang h3 {
    font-size: 24px;
    margin-bottom: 20px;
}

.giohang table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.giohang table,
.giohang table th,
.giohang table td {
    border: 1px solid #ddd;
}

.giohang table th,
.giohang table td {
    padding: 10px;
    text-align: left;
}

.giohang .bill {
    text-align: center;
}

.giohang .bill input[type="button"] {
    margin: 0 10px;
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    background-color: #3498db;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.giohang .bill input[type="button"]:hover {
    background-color: #2980b9;
}

</style>