<?php
// initializing variables
// khởi tạo biến
session_start();
$postid=$_GET['id'];
$email=$_SESSION["email"];

$author= $_SESSION['name'].' '.$_SESSION['lastname'];

$body    = "";

$date= $_GET['date'];


// connect to the database
// kết nối với cơ sở dữ liệu
$coon=mysqli_connect( "localhost", "id11399066_root", "password", "id11399066_adidas");
mysqli_query($coon, "SET NAMES utf8");

// REGISTER USER
// GHI DANH NGƯỜI DÙNG
if (isset($_POST['Submit'])) {
	$coon=mysqli_connect("localhost", "id11399066_root", "password", "id11399066_adidas");
mysqli_query($coon,"SET NAMES utf8");
$result=mysqli_query($coon, "SELECT count(EMAIL) AS total FROM comments
WHERE EMAIL='$email' and postid='$postid'");
$row=mysqli_fetch_assoc($result); $total_records=$row[ 'total'];


if($total_records!=0)
{
	echo $total_records;
}
else
{




  // receive all input values from the form
  // nhận tất cả các giá trị đầu vào từ biểu mẫu
  $body = mysqli_real_escape_string($coon, $_POST['body']);


  $result=mysqli_query($coon, " INSERT INTO comments VALUES ('$postid','$author','$email','$body','$date') ");
  }

}
else
{
die("Fill out everything please. Mkay.");
}
header("location:/vn/product?slot=$postid");
?>
