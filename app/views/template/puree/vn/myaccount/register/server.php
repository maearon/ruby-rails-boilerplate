<?php


// initializing variables
// khởi tạo biến
$name= "";
$lastname= "";
$email    = "";
$password= "";
$errors = array();

// connect to the database
// kết nối với cơ sở dữ liệu
$coon=mysqli_connect( "localhost", "id11399066_root", "password", "id11399066_adidas");
mysqli_query($coon, "SET NAMES utf8");

// REGISTER USER
// GHI DANH NGƯỜI DÙNG
if (isset($_POST['Submit'])) {
  // receive all input values from the form
  // nhận tất cả các giá trị đầu vào từ biểu mẫu
  $name = mysqli_real_escape_string($coon, $_POST['name']);
  $lastname = mysqli_real_escape_string($coon, $_POST['lastname']);
  $email = mysqli_real_escape_string($coon, $_POST['email']);
  $password = mysqli_real_escape_string($coon, $_POST['password']);

  $result=mysqli_query($coon, "SELECT count(EMAIL) AS total FROM taikhoan
  WHERE EMAIL='$email'");
  $row=mysqli_fetch_assoc($result); $total_records=$row[ 'total'];


  if($total_records!=0)
  {echo '<div class="alert alert-warning hidden title-only" data-component="common/Alert" data-type="warning" id="login-warning-alert" style="display: block;">
    <div class="alert-title">Tạo tài khoản không thành công. email này đã được sử dụng cho tài khoản đã tạo.</div>
    <div class="alert-content"></div>
    </div>';
  }
  else
  {
  echo '<div class="alert alert-success " data-component="common/Alert" data-type="success">
  <div class="alert-title">TÀI KHOẢN ĐÃ ĐƯỢC TẠO</div>
  <div class="alert-content">Chào mừng bạn đến với adidas. Bên dưới bạn có thể xem các đơn đặt hàng mới nhất, chi tiết cá nhân và chi tiết tài khoản khác của bạn.</div>
  </div>';
  $sql = "insert into taikhoan (EMAIL,PASSWORD,name,lastname)  values ('$email', '$password', '$name', '$lastname')";
  $query =mysqli_query($coon,$sql);
  $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;
        $_SESSION["name"] = $name;
    $_SESSION["lastname"] = $lastname;

  }
}

// ...
