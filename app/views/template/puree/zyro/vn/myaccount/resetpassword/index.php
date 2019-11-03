<?php
$conn=mysqli_connect( "localhost", "id11399066_root", "password", "id11399066_adidas");
mysqli_query($conn, "SET NAMES utf8");
$resetpasswordtoken=$_GET['resetpasswordtoken'];

?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">

<title>adidas Official Website | adidas VN</title>

<!--Ví dụ 1 - Xác định từ khóa cho công cụ tìm kiếm:-->
<meta name="keywords" content="HTML, CSS, XML, XHTML, JavaScript">
<!--Ví dụ 2 - Xác định mô tả trang web của bạn:-->
<meta name="description" content="Free Web tutorials on HTML and CSS">
<!--Ví dụ 3 - Xác định tác giả của một trang:-->
<meta name="author" content="John Doe">
<!--Ví dụ 4 - Làm mới tài liệu sau mỗi 30 giây:
<meta http-equiv="refresh" content="30">-->
<!--Ví dụ 5 - Đặt chế độ xem để làm cho trang web của bạn trông đẹp trên tất cả các thiết bị:-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="/css/foundation.css"> <!-- css chung -->
<link rel="stylesheet" href="/css/menu.css"> <!-- css cho menu -->
<link rel="stylesheet" href="/css/animatedSearchBar.css"> <!-- css cho thanh tìm kiếm linh hoạt-->
<link rel="stylesheet" href="/css/slideshow.css"> <!-- css cho slideshow -->
<link rel="stylesheet" href="/css/text-center.css"> <!-- ad -->
<link rel="stylesheet" href="/css/login/login.css"> <!-- css đăng nhập -->
<link rel="stylesheet" href="/css/container.css"> <!-- css cho footer -->
<link rel="stylesheet" href="/css/footerBottom.css"> <!-- css cho footer -->
<link rel="stylesheet" href="/css/footer.css"> <!-- css cho footer -->


<link rel="icon" href="/images/0/img/adidas-favicon.ico" />
<!-- https://www.google.com/recaptcha/admin#site/342456169?setup -->
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<script src="/js/include.js"></script>

<body>

<div id="topdiv">
<div w3-include-html="/vn/include/menu.php"></div>
</div>

<div id="topdivvv">

</div>


<div id="main">
<?php include('checklogin.php') ?>
<div class="rbk-breadcrumbs-wrapper">

<div class="breadcrumb">
    <a href="/" title="Home">Trang chủ</a>
    <span class="divider">/</span><a href="/vn/myaccount-create-or-login/" title="Login and Register">Đăng nhập và Đăng ký</a>
</div>
<!-- END: breadcrumb -->
</div>

<div class="accountlogin ssojs col-6 left clearfix">


    <br>
    <br>
    <br>

    <h2>ĐẶT MẬT KHẨU MỚI</h2>









    <br>
<form name="form1" method="post" action="server.php?resetpasswordtoken=<?php echo $resetpasswordtoken?>">
<p>Bên dưới, bạn có thể đặt mật khẩu mới và sau đó bạn sẽ đăng nhập vào tài khoản của mình</p>
    <input class="materialize-element-field" type="password" id="dwfrm_login_password" name="newPassword" type="text" required="required" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" >
    <span class="materialize-element-btn" onclick="myFunction()"></span>
    <script>
        function myFunction() {
        var x = document.getElementById("dwfrm_login_password");
        if (x.type === "password") {
        x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
    <div class="labelwithcaption">
	<span class="caption">Vui lòng đảm bảo mật khẩu của bạn chứa tối thiểu một chữ in hoa, một chữ cái, một số (hoặc kí tự đặc biệt) và dài ít nhất 8 ký tự</span>
    </div>



    <button class="materialize-btn materialize-btn-blue login-btn" type="submit" value="Đăng nhập" name="Submit"><span>Cập nhật mật khẩu</span></button>

</form>



</div>



<!-- EO: rbk_content_wrapper -->
</div>




<div w3-include-html="/vn/include/footer.html"></div>

<script>
includeHTML();
</script>


</body>
</html>
