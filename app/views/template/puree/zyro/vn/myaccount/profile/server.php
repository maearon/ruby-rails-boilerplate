<?php


// initializing variables
// khởi tạo biến
$name= $_SESSION["name"];
$lastname= $_SESSION["lastname"];
$email    = $_SESSION["email"];
$password= $_SESSION["password"];

$newname= "";
$newlastname= "";
$newemail    = "";
$oldpassword= "";
$newpassword= "";
$confirmnewpassword= "";
$errors = array();
/*
echo '-------------------------------------------------';
echo 'sau khi gán'.'<br>';
echo 'session email: '.$_SESSION["email"].'<br>';
echo 'session password: '.$_SESSION["password"].'<br>';
echo 'session name: '.$_SESSION["name"].'<br>';
echo 'session lastname: '.$_SESSION["lastname"].'<br><br>';

echo 'email: '.$email.'<br>';
echo 'passwoard: '.$password.'<br>';
echo 'name: '.$name.'<br>';
echo 'lastname: '.$lastname.'<br><br>';


echo 'newemail: '.$newemail.'<br>';
echo 'oldpasswoard: '.$oldpassword.'<br>';
echo 'newpasswoard: '.$newpassword.'<br>';
echo 'confirmnewpassword: '.$confirmnewpassword.'<br>';
echo 'newname: '.$newname.'<br>';
echo 'newlastname: '.$newlastname.'<br>';
echo '-------------------------------------------------';*/

// connect to the database
// kết nối với cơ sở dữ liệu
$coon=mysqli_connect( "localhost", "id11399066_root", "password", "id11399066_adidas");
mysqli_query($coon, "SET NAMES utf8");
$coon->query("set names 'utf8'"); $coon->set_charset("utf8");

// REGISTER USER
// GHI DANH NGƯỜI DÙNG
if (isset($_POST['Submit'])) {
  // receive all input values from the form
  // nhận tất cả các giá trị đầu vào từ biểu mẫu
  $newname = mysqli_real_escape_string($coon, $_POST['firstName']);
  $newlastname = mysqli_real_escape_string($coon, $_POST['lastName']);
  $newemail = mysqli_real_escape_string($coon, $_POST['email']);
  $oldpassword = mysqli_real_escape_string($coon, $_POST['oldPassword']);
  $newpassword = mysqli_real_escape_string($coon, $_POST['newPassword']);
  $confirmnewpassword = mysqli_real_escape_string($coon, $_POST['confirmNewPwd']);

  if ($_SESSION["name"] != $newname) {
    $sql = "UPDATE taikhoan
    SET name = '$newname'
    WHERE EMAIL = '$email'";
    $query =mysqli_query($coon,$sql);
    $_SESSION["name"] = $newname;
    header("location:/vn/myaccount/login/login_success.php");
  }
  if ($_SESSION["lastname"] != $newlastname) {
    $sql = "UPDATE taikhoan
    SET lastname = '$newlastname'
    WHERE EMAIL = '$email'";
    $query =mysqli_query($coon,$sql);
    $_SESSION["lastname"] = $newlastname;
    header("location:/vn/myaccount/login/login_success.php");
  }
  if ($_SESSION["email"] != $newemail) {
    if ($_SESSION["password"] != $oldpassword) {
      echo 'Mật Khẩu Không Đúng';
    }
    if ($_SESSION["password"] == $oldpassword){
    $sql = "UPDATE taikhoan
    SET EMAIL = '$newemail'
    WHERE EMAIL = '$email'";
    $query =mysqli_query($coon,$sql);
    $_SESSION["email"] = $newemail;
    $email = $newemail;
    header("location:/vn/myaccount/login/login_success.php");
  }
  }

  /*if ($_SESSION["email"] != $newemail && $_SESSION["password"] != $oldpassword && !empty($oldpassword)) {
      echo 'Vui lòng đảm bảo mật khẩu của bạn chứa tối thiểu một chữ cái, một số và dài ít nhất 8 ký tự';
  }*/

  if (
  $_SESSION["password"] == $oldpassword
  && $newpassword == $confirmnewpassword
  && !empty($newpassword)
  && !empty($confirmnewpassword)
  ) {
    $sql = "UPDATE taikhoan
    SET PASSWORD = '$newpassword'
    WHERE EMAIL = '$email'";
  $query =mysqli_query($coon,$sql);
  $_SESSION["password"] = $newpassword;
  header("location:/vn/myaccount/login/login_success.php");
  }
  if (
    $_SESSION["password"] != $oldpassword
    && $newpassword == $confirmnewpassword
    && !empty($newpassword)
    && !empty($confirmnewpassword)
    ) {
      echo '<div class="alert alert-warning hidden title-only" data-component="common/Alert" data-type="warning" id="login-warning-alert" style="display: block;">
      <div class="alert-title">Mật Khẩu Không Đúng.</div>
      <div class="alert-content"></div>
      </div>';
  }
  if (
    $_SESSION["password"] == $oldpassword
    && $newpassword != $confirmnewpassword
    && !empty($newpassword)
    && !empty($confirmnewpassword)
    ) {
      echo '<div class="alert alert-warning hidden title-only" data-component="common/Alert" data-type="warning" id="login-warning-alert" style="display: block;">
      <div class="alert-title">Mật Khẩu Mới Không Khớp Với Mật Khẩu Xác Nhận.</div>
      <div class="alert-content"></div>
      </div>';
  }
  if (
    $_SESSION["password"] != $oldpassword
    && $newpassword != $confirmnewpassword
    && !empty($newpassword)
    && !empty($confirmnewpassword)
    ) {
      echo '<div class="alert alert-warning hidden title-only" data-component="common/Alert" data-type="warning" id="login-warning-alert" style="display: block;">
      <div class="alert-title">Mật Khẩu Không Đúng và Mật Khẩu Mới Không Khớp Với Mật Khẩu Xác Nhận.</div>
      <div class="alert-content"></div>
      </div>';
  }
}

// ...
