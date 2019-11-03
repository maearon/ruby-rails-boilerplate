<?php
session_start();?>
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
<link rel="stylesheet" href="/css/register/register.css"> <!-- css đăng nhập -->
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
<?php include('server.php') ?>
<div class="rbk-breadcrumbs-wrapper">
<div class="breadcrumb">
    <a href="/" title="Home">Trang chủ</a>
    <span class="divider">/</span><a href="/vn/login/" title="Login and Register">Đăng nhập và Đăng ký</a>
    <span class="divider">/</span><a href="/vn/register/" title="Register">Đăng ký</a>
</div>
<!-- END: breadcrumb -->
</div>

<div class="accountlogin ssojs col-6 left clearfix">


<form method="post" action="index.php"  autocomplete="off">


    <h2>ĐĂNG KÝ</h2>
    <h2>TÊN CỦA BẠN</h2>
    <br>


    <label for="dwfrm_login_username" class="materialize-element-label"> Tên </label>
    <input class="materialize-element-field" id="dwfrm_login_username" type="text"     name="name" required="required">

    <br>
    <br>
    <br>

    <label for="dwfrm_login_lastname"class="materialize-element-label"> Họ </label>
    <input class="materialize-element-field" id="dwfrm_login_lastname" type="text"     name="lastname" required="required">


    <br>
    <h2>THÔNG TIN ĐĂNG NHẬP</h2>

    <br>


    <label for="dwfrm_login_username" class="materialize-element-label"> Địa chỉ email </label>
    <input class="materialize-element-field" type="email" id="dwfrm_login_username" name="email" type="text" required="required"
    pattern='^[^\s@.]+(\.[^\s@.]+)*@[A-Za-z\d]([\w\-]*([A-Za-z0-9]\.[A-Za-z0-9])*)*([A-Za-z0-9]\.[A-Za-z]{2,})$' >

    <br>
    <br>
    <br>

    <label for="dwfrm_login_password"class="materialize-element-label"> Mật khẩu mới</label>
    <input class="materialize-element-field" type="password" id="dwfrm_login_password" name="password" type="text" required="required" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" >
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
    <span>Vui lòng đảm bảo mật khẩu của bạn chứa tối thiểu một chữ in hoa, một chữ cái, một số (hoặc kí tự đặc biệt) và dài ít nhất 8 ký tự<div>


    <input class="materialize-input" type="checkbox" id="dwfrm_login_rememberme" name="dwfrm_login_rememberme" value="true"/>
    <label for="dwfrm_login_rememberme" class="materialize-element-box"> Vâng, Tôi đã 13 tuổi *
    </label>
    <br>
    <input class="materialize-input" type="checkbox" id="dwfrm_login_rememberme" name="dwfrm_login_rememberme" value="true"/>
    <label for="dwfrm_login_rememberme" class="materialize-element-box"> Tôi muốn cập nhật thông tin từ adidas </label>
    <br>
    <input class="materialize-input" type="checkbox" id="dwfrm_login_rememberme" name="dwfrm_login_rememberme" value="true" />
    <label for="dwfrm_login_rememberme" class="materialize-element-box">Tôi đã đọc và chấp nhận <a href="#">Điều khoản &amp; Điều kiện</a> và Tuyên bố về <a href="#">Quyền Riêng Tư</a> của Adidas</label>
    <div>
    <br>
    <br>
    <div style="width: 304px; height: 78px;"><div>

    <div class="g-recaptcha" data-sitekey="6Ldpd2kUAAAAAFuUuuAovnREDmycK6zAn_BMIhoI"></div>

    </div>
    <textarea id="g-recaptcha-response" name="g-recaptcha-response"
    class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px;
    padding: 0px; resize: none;  display: none; ">
    </textarea></div></div>

    <button class="materialize-btn materialize-btn-blue login-btn" type="submit" value="Gửi đi" name="Submit"><span>GỬI ĐI</span></button>

</form>




</div>

<div class="col-6 right logincreate block logincustomers-wrapper ssojs">
    <h2>ĐĂNG NHẬP TOÀN CẦU CỦA BẠN SẼ CHO PHÉP BẠN TRUY CẬP VÀO:</h2>
    <div class="createaccount">
        <div class="createbenefits clear para-normal">
        <ul style="margin-top: 20px;">
            <li><span style="color: #4ecb68;">&#10003;</span> Tìm kiếm &amp; theo dõi đơn đặt hàng của bạn</li>
            <li><span style="color: #4ecb68;">&#10003;</span> Đăng nhập một lần cho các sản phẩm và dịch vụ của adidas</li>
            <li><span style="color: #4ecb68;">&#10003;</span> Lịch sử đơn hàng</li>
            <li><span style="color: #4ecb68;">&#10003;</span> Thanh toán nhanh hơn</li>
        </ul>
        </div>
    </div>
</div>

<!-- EO: rbk_content_wrapper -->

</div>




<div w3-include-html="/vn/include/footer.html"></div>

<script>
includeHTML();
</script>


</body>
</html>
