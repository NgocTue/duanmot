
     <form action="index.php?act=billconfirm" method="post">
    <div class="formdathang">
        <h3 class="hieu">Thông tin Cá Nhân đặt hàng</h3>
        <table class="user">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name_gh = $_POST['name_gh'];
                $address_gh = $_POST['address_gh'];
                $email_gh = $_POST['email_gh'];
                $tel_gh = $_POST['tel_gh'];
                $trang_thai	 = "đang chuẩn bị hàng";

            } else {
                $name_gh = "";
                $address_gh = "";
                $email_gh = "";
                $tel_gh = "";
            }
            ?>
            <tr>
                <td>Người đặt hàng</td> <br>
                <td><input class="input1" type="text" name="name_gh" value="<?= $name_gh ?>" required></td>
            </tr>

            <tr>
                <td>Địa chỉ</td><br>
                <td><input class="input1" type="text" name="address_gh" value="<?= $address_gh ?>" required></td>
            </tr> 

            <tr>
                <td>Email</td><br>
                <td><input class="input1" type="email" name="email_gh" value="<?= $email_gh ?>" required></td>
            </tr>

            <tr>
                <td>Số điện thoại</td><br>
                <td><input class="input1" type="number" name="tel_gh" value="<?= $tel_gh ?>" required></td>
            </tr>
        </table>
    </div>
       

    </div>
    <br>
    <br><br>

    <div class="pt_thanhtoan">
        <p class="chuphuongthuc">Phương thức thanh toán</p>

        <tr>
            <td><input type="radio" value="1" name="pttt" id="" checked>Trả tiền khi nhận hàng</td>
            <!-- <td><input type="radio" value="2" name="pttt" id="">Chuyển khoản ngân hàng</td> -->
            <!-- <td><input type="radio" value="3" name="pttt" id="">Thanh toán online</td> -->
        </tr>

    </div> <br> <br><br>


    <div class="">
  <h3>Thông tin sản phẩm</h3>
  
  <table >
    
        <?php
    viewcart(0);
        ?>
  </table>
  <div class="dongydathang">
        <input type="submit" value="Đồng ý đặt hàng" name="dongydathang">
    </div>
</form>
    
  </div>
  
</div>


</form>
<br>
<script>
  function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

document.querySelector("form").addEventListener("submit", function(event) {
    var emailInput = document.querySelector("input[name='email_gh']");
    var email = emailInput.value.trim();

    if (!validateEmail(email)) {
        alert("Vui lòng nhập địa chỉ email hợp lệ.");
        event.preventDefault();
    }
});

function validatePhoneNumber(phoneNumber) {
    var regex = /^\d{10}$/; // Số điện thoại gồm 10 chữ số
    return regex.test(phoneNumber);
}

document.querySelector("form").addEventListener("submit", function(event) {
    var phoneInput = document.querySelector("input[name='tel_gh']");
    var phoneNumber = phoneInput.value.trim();

    if (!validatePhoneNumber(phoneNumber)) {
        alert("Vui lòng nhập số điện thoại hợp lệ (10 chữ số).");
        event.preventDefault();
    }
});

</script>
<style>
 /* Global reset and default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

/* Form styles */
.formdathang {
    margin-top: 50px; 
    max-width: 800px;
    margin: 0 auto; 
    padding: 120px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h3 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table th,
table td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}

table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f2f2f2;
}

table.user {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}


table.user td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

input.input1 {
    width: calc(100% - 20px);
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.pt_thanhtoan {
    text-align: center;
    margin-bottom: 30px;
}

.pt_thanhtoan input {
    margin: 5px;
}

.dongydathang {
    text-align: center;
    margin-top: 20px;
}

.dongydathang input[type="submit"] {
    padding: 10px 20px;
    font-size: 18px;
    color: #fff;
    background-color: #3498db;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.dongydathang input[type="submit"]:hover {
    background-color: #2980b9;
}

/* Additional styles can be added as needed */

    </style>