<?php



$name= "";
$lastname= "";
$email    = "";
$password= "";


$coon=mysqli_connect("localhost", "id11399066_root", "password", "id11399066_adidas");
mysqli_query($coon, "SET NAMES utf8");
$coon->query("set names 'utf8'"); $coon->set_charset("utf8");
if (isset($_POST['Submit'])) {
    // receive all input values from the form
    // nhận tất cả các giá trị đầu vào từ biểu mẫu

    if (!empty($_POST['email'])) $email = mysqli_real_escape_string($coon, $_POST['email']);
    if (!empty($_POST['password'])) $passwordpassword = mysqli_real_escape_string($coon, $_POST['password']);

$sql="SELECT * FROM taikhoan WHERE EMAIL='$email'";
$result=mysqli_query($coon,$sql);
$a=0;
while($row=mysqli_fetch_array($result))
{
if($email==$row['EMAIL']&&($password==$row['PASSWORD'])&&(!empty($_POST['email']))&&(!empty($_POST['password'])))

$a=1;


$name=$row['name'];

$lastname=$row['lastname'];



}

if($a==0&&(!empty($_POST['email']))&&(!empty($_POST['password'])))
{
    echo '<div class="alert alert-warning hidden title-only" data-component="common/Alert" data-type="warning" id="login-warning-alert" style="display: block;">
    <div class="alert-title">Có vẻ như địa chỉ email hoặc mật khẩu của bạn không chính xác. Muốn thử lại không?</div>
    <div class="alert-content"></div>
    </div>';
//header("location:/vn/login/");
}
if($a==0&&(!empty($_POST['email']))&&(!empty($_POST['password']))){
// Start the session
session_start();


$_SESSION["email"] = $email;
$_SESSION["password"] = $password;
$_SESSION["name"] = $name;
$_SESSION["lastname"] = $lastname;
header("Location: login_success.php");


}}

?>
