<?php
$addressname= "";
$street= "";
$type    = "";
$citytown= "";
$state= "";
$zipcode= "";
$country= "";
$phonenumber= "";

while ($row=mysqli_fetch_assoc($result)) 
{
$addressname= $row['addressname'];
$street= $row['street'];
$type    = $row['type'];
$citytown= $row['citytown'];
$state= $row['state'];
$zipcode= $row['zipcode'];
$country= $row['country'];
$phonenumber= $row['phonenumber'];
}

$newaddressname= "";
$newstreet= "";
$newtype    = "";
$newcitytown= "";
$newstate= "";
$newzipcode= "";
$newcountry= "";
$newphonenumber= "";

if (isset($_POST['Submit'])) {

  
if(!empty($_POST['addressname'])) $newaddressname= mysqli_real_escape_string($coon, $_POST['addressname']);
if(!empty($_POST['street'])) $newstreet= mysqli_real_escape_string($coon, $_POST['street']);
if(!empty($_POST['type'])) $newtype    = mysqli_real_escape_string($coon, $_POST['type']);
if(!empty($_POST['citytown'])) $newcitytown= mysqli_real_escape_string($coon, $_POST['citytown']);
if(!empty($_POST['state'])) $newstate= mysqli_real_escape_string($coon, $_POST['state']);
if(!empty($_POST['zipcode'])) $newzipcode= mysqli_real_escape_string($coon, $_POST['zipcode']);
if(!empty($_POST['country'])) $newcountry= mysqli_real_escape_string($coon, $_POST['country']);
if(!empty($_POST['phonenumber'])) $newphonenumber= mysqli_real_escape_string($coon, $_POST['phonenumber']);
  
  if ($addressname != $newaddressname) {
    $sql = "UPDATE taikhoan
    SET addressname = '$newaddressname'
    WHERE EMAIL = '$email'";
    $query =mysqli_query($coon,$sql);
  }
  if ($street != $newstreet) {
    $sql = "UPDATE taikhoan
    SET street = '$newstreet'
    WHERE EMAIL = '$email'";
    $query =mysqli_query($coon,$sql);
  }
  if ($type != $newtype) {
    $sql = "UPDATE taikhoan
    SET type = '$newtype'
    WHERE EMAIL = '$email'";
    $query =mysqli_query($coon,$sql);
  }
  if ($citytown != $newcitytown) {
    $sql = "UPDATE taikhoan
    SET citytown = '$newcitytown'
    WHERE EMAIL = '$email'";
    $query =mysqli_query($coon,$sql);
  }
  if ($state != $newstate) {
    $sql = "UPDATE taikhoan
    SET state = '$newstate'
    WHERE EMAIL = '$email'";
    $query =mysqli_query($coon,$sql);
  }
  if ($zipcode != $newzipcode) {
    $sql = "UPDATE taikhoan
    SET zipcode = '$newzipcode'
    WHERE EMAIL = '$email'";
    $query =mysqli_query($coon,$sql);
  }
  if ($country != $newcountry) {
    $sql = "UPDATE taikhoan
    SET country = '$newcountry'
    WHERE EMAIL = '$email'";
    $query =mysqli_query($coon,$sql);
  }
  if ($phonenumber != $newphonenumber) {
    $sql = "UPDATE taikhoan
    SET phonenumber = '$newphonenumber'
    WHERE EMAIL = '$email'";
    $query =mysqli_query($coon,$sql);
  }
}