<?php
$newpassword= "";
$resetpasswordtoken=$_GET['resetpasswordtoken'];
$coon=mysqli_connect( "localhost", "id11399066_root", "password", "id11399066_adidas");
mysqli_query($coon, "SET NAMES utf8");
$coon->query("set names 'utf8'"); $coon->set_charset("utf8");
if (isset($_POST['Submit'])) {
  // receive all input values from the form
  	// nhận tất cả các giá trị đầu vào từ biểu mẫu
	$newpassword = $_POST["newPassword"];
  $result=mysqli_query($coon, "SELECT count(token) AS total FROM taikhoan
  WHERE token='$resetpasswordtoken'");
  $row=mysqli_fetch_assoc($result); $total_records=$row[ 'total'];
  echo $total_records;
  if($total_records!=0)
{echo 'phat hien token';

    $sql = "UPDATE taikhoan SET PASSWORD = '$newpassword' WHERE token = '$resetpasswordtoken'";
$query =mysqli_query($coon,$sql);

  header("location:/vn/login");
}

}
