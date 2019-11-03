<?php
session_start();
$id=$_GET['slot'];
$email=$_SESSION["email"];
$coon=mysqli_connect("localhost", "id11399066_root", "password", "id11399066_adidas");
mysqli_query($coon,"SET NAMES utf8");
$result=mysqli_query($coon, "SELECT count(idtrongbangsp) AS total FROM yeuthich
WHERE idtrongbangsp='$id' and EMAIL='$email'");
$row=mysqli_fetch_assoc($result); $total_records=$row[ 'total'];
echo $total_records;
$sql = "DELETE FROM yeuthich WHERE idtrongbangsp='$id' and EMAIL='$email'";
if($total_records!=0)
{echo 'co roi';
    $query =mysqli_query($coon,$sql);
    header("location:/vn/product?slot=$id");
}
else
{
echo 'chua co';

header("location:/vn/product?slot=$id");
}
/*if ($query == true) {
header("location:/vn/product?slot=$id");
}
else{
header("location:/vn/product?slot=$id");
}*/
?>
