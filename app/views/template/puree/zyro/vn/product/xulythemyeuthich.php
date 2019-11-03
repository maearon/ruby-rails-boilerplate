<?php
session_start();
$id=$_GET['slot'];
$email=$_SESSION["email"];
$coon=mysqli_connect("localhost", "id11399066_root", "password", "id11399066_adidas");
mysqli_query($coon,"SET NAMES utf8");
$result=mysqli_query($coon, "SELECT count(idtrongbangsp) AS total FROM yeuthich
WHERE idtrongbangsp='$id' and EMAIL='$email'");
$row=mysqli_fetch_assoc($result); $total_records=$row[ 'total'];


if($total_records!=0)
{
	$sql = "DELETE FROM yeuthich WHERE idtrongbangsp='$id' and EMAIL='$email'";
    $query =mysqli_query($coon,$sql);
}
else
{

$sql = "insert into yeuthich (idtrongbangsp,EMAIL) values ('$id','$email')";
$query =mysqli_query($coon,$sql);

}
/*if ($query == true) {
header("location:/vn/product?slot=$id");
}
else{
header("location:/vn/product?slot=$id");
}*/
?>
<!DOCTYPE html>
<html>
<body>

<?php

$result=mysqli_query($coon, "SELECT count(idtrongbangsp) AS total FROM yeuthich
WHERE idtrongbangsp='$id' and EMAIL='$email'");
$row=mysqli_fetch_assoc($result); $total_records=$row[ 'total'];


if($total_records!=0)
echo '<span class="gl-icon icon icon-heart icon--size-m"></span>';

else
echo '<span class="gl-icon icon icon-heart-empty icon--size-m"></span>';

?>
</body>
</html>

<!--
INSERT INTO `user`(`id`, `FirstName`, `LastName`, `Age`, `Hometown`, `Job`) VALUES ('1','Peter','Griffin','41','Quahog','Brewery')
('2', 'Lois',    'Griffin', '40' , 'Newport', 'Piano', 'Teacher')
-->
