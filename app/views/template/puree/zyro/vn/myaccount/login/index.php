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




    <h2>ĐĂNG NHẬP</h2>
    <form name="form0" method="post" action="/vn/login/forgot/forgot.php">
    <a href="javascript:void(0)" class="dialog-forgotpassword clear" data-title="Forgot Your Password?" style="color: #226ebb;">Quên Mật Khẩu Của Bạn?</a>

    <div class="ui-dialog ui-widget ui-widget-content ui-corner-all popup-scale-in"
    style="
    display: none;

    z-index: 1003;
    outline: 0px;
    height: 376px;
    width: 450px;

    top: 50%;
    left: 50%;

    margin-top: -188px;
    margin-left: -225px;


    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);

    position: fixed;

    background: white;


    " tabindex="-1" role="dialog" aria-labelledby="ui-dialog-title-dialogcontainer"><div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
    <span class="ui-dialog-title" id="ui-dialog-title-dialogcontainer" style="
    border-bottom: 1px solid #c8cbcc;
    padding: 18px 45px 18px 20px;
    font: 700 17px/16px ;
    text-transform: uppercase;
    display: block;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    font-weight: bold;
    text-transform: uppercase;
    ">Quên Mật Khẩu Của Bạn?</span><a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button">

    <span class="ui-icon ui-icon-closethick"

    style="
    position: absolute;
    top: 20px;
    right: 20px;

    " >X</span></a></div>

    <div id="dialogcontainer" data-component="common/Dialog" class="ui-dialog-content ui-widget-content" style="width: auto; min-height: 53px; height: auto; max-height: 529.6px;padding: 10px 45px 18px 20px;" scrolltop="0" scrollleft="0"><div class="ssojs forgotten-password hidden" style="display: block;">
<form action="https://www.adidas.com/us/myaccount-create-or-login?dwcont=C1308972483" method="post" id="dwfrm_requestpassword" novalidate="" data-component="account/SSOJS" data-mode="forgotpassword" data-view="materialize">
<div class="errorform errormessage hidden" data-ssojs-error="general" data-error-title="general"></div>
<fieldset>
<p>Nhập địa chỉ email của bạn bên dưới và nếu tài khoản tồn tại, chúng tôi sẽ gửi cho bạn liên kết để đặt lại mật khẩu của bạn.</p>
                <div class="materialize-element materialize-email materialize-textinput  formfield value username forgotpassword  required not-empty">
                    <div class="materialize-element-box"><br>
                    <label for="dwfrm_requestpassword_email" class="materialize-element-label"> Email </label>
    <input class="materialize-element-field" type="email" id="dwfrm_requestpassword_email" name="dwfrm_requestpassword_email" value="" type="text" required="required"
    pattern='^[^\s@.]+(\.[^\s@.]+)*@[A-Za-z\d]([\w\-]*([A-Za-z0-9]\.[A-Za-z0-9])*)*([A-Za-z0-9]\.[A-Za-z]{2,})$' >
	                </div><br>
                    <div class="materialize-element-message errormessage" style="display: none;"></div>
                 <div class="help-block-mailcheck mailcheck hidden"></div></div>
                <div class="materialize-element materialize-recaptcha   formfield recaptcha  required ">
                    <div class="materialize-element-box">
                            <div>
                            <div style="width: 304px; height: 78px;"><div>
                            <div class="g-recaptcha" data-sitekey="6Ldpd2kUAAAAAFuUuuAovnREDmycK6zAn_BMIhoI"></div>
                            </div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea>
                            </div></div>
	                </div>
                    <div class="materialize-element-message errormessage"></div>
                 </div>
<!--googleoff: all--><noindex>
	<div class="hidden" data-component="pagecontext/Context">%7B%22session%22%3A%7B%7D%2C%22ajaxCall%22%3Afalse%2C%22_MAX_DEPTH_LEVEL%22%3A3%2C%22_MAX_OBJECT_PROPS%22%3A10%2C%22events%22%3A%5B%5D%7D</div>
</noindex><!--googleon: all-->
<div class="formactions clearfix">
<button class="materialize-btn materialize-btn-blue" type="submit" value="Reset password" name="dwfrm_requestpassword_send">Đặt lại mật khẩu</button>
</div>
</fieldset>
</form>
</div><div class="ssojs forgotten-password-thank-you-container hidden">
<p>Nhập địa chỉ email của bạn bên dưới và nếu tài khoản tồn tại, chúng tôi sẽ gửi cho bạn liên kết để đặt lại mật khẩu của bạn.</p>
<div class="alert alert-success " data-component="common/Alert" data-type="success">
<div class="alert-title">Đã gửi liên kết đặt lại mật khẩu</div>
<div class="alert-content">Vui lòng kiểm tra email của bạn để biết liên kết để đặt lại mật khẩu của bạn.</div>
</div>
<button class="materialize-btn materialize-btn-blue cancel" type="button" value="Close" name="dwfrm_requestpassword_cancel">Close</button>
</form>
</div></div></div>

<div class="ui-widget-overlay" style="
    display: none;
    z-index: 1002;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0,0,0,0.5);
"></div>



    <script>
	// Get the modal
	var modal = document.getElementsByClassName("ui-corner-all popup-scale-in")[0];
    var overlay = document.getElementsByClassName("ui-widget-overlay")[0];

	// Get the button that opens the modal
	var btn = document.getElementsByClassName("dialog-forgotpassword")[0];

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("ui-icon-closethick")[0];

	// When the user clicks the button, open the modal
	btn.onclick = function() {
    modal.style.display = "block";
    overlay.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
    modal.style.display = "none";
    overlay.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        overlay.style.display = "none";
    }
	}
	</script>

    <br>
<form name="form1" method="post" action="index.php">
    <label for="dwfrm_login_username" class="materialize-element-label"> Địa chỉ email </label>
    <input class="materialize-element-field" type="email" id="dwfrm_login_username" name="email" type="text" required="required"
    pattern='^[^\s@.]+(\.[^\s@.]+)*@[A-Za-z\d]([\w\-]*([A-Za-z0-9]\.[A-Za-z0-9])*)*([A-Za-z0-9]\.[A-Za-z]{2,})$' >

    <br>
    <br>
    <br>

    <label for="dwfrm_login_password"class="materialize-element-label"> Mật khẩu </label>
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






    <br>

    <input class="materialize-input" type="checkbox" id="dwfrm_login_rememberme" name="dwfrm_login_rememberme" value="true"/><!-- checked="checked"-->
    <label for="dwfrm_login_rememberme" class="materialize-element-box"> Nhớ tôi </label>

    <button class="materialize-btn materialize-btn-blue login-btn" type="submit" value="Đăng nhập" name="Submit"><span>Đăng nhập</span></button>

</form>

<div id="social-login" data-component="account/SsoSocial" class="clearfix">


<span class="social-login-desc">Bạn cũng có thể đăng nhập bằng một trong các tài khoản này</span>

<a href="https://cp.adidas.com/idp/startSSO.ping?PartnerSpId=sp:demandware&amp;method=facebookadiUS&amp;TargetResource=https%3A%2F%2Fwww.adidas.com%2Fon%2Fdemandware.store%2FSites-adidas-US-Site%2Fen_US%2FMyAccount-ResumeLogin%3Ftarget%3Daccount&amp;InErrorResource=https%3A%2F%2Fwww.adidas.com%2Fon%2Fdemandware.store%2FSites-adidas-US-Site%2Fen_US%2Fnull"
    title="Facebook" id="social-login-facebook" class="materialize-btn social-btn facebook-btn notranslate">

<img class="button-image" src="/images/0/static/login/facebook.svg" alt="Facebook" />



Facebook

</a>

<a href="https://cp.adidas.com/idp/startSSO.ping?PartnerSpId=sp:demandware&amp;method=googleadiUS&amp;TargetResource=https%3A%2F%2Fwww.adidas.com%2Fon%2Fdemandware.store%2FSites-adidas-US-Site%2Fen_US%2FMyAccount-ResumeLogin%3Ftarget%3Daccount&amp;InErrorResource=https%3A%2F%2Fwww.adidas.com%2Fon%2Fdemandware.store%2FSites-adidas-US-Site%2Fen_US%2Fnull"
    title="Google" id="social-login-google" class="materialize-btn social-btn google-btn notranslate">

<img class="button-image" src="/images/0/static/login/google.svg" alt="Google" />



Google

</a>

</div>

</div>

<div class="col-6 right logincreate block logincustomers-wrapper ssojs">
    <h2>Tạo một tài khoản</h2>
    <div class="createaccount">
        <div class="createbenefits clear para-normal">
        <p>Tận hưởng những lợi ích khi có tài khoản, như:</p>
        <ul style="margin-top: 20px;">
            <li><span style="color: #4ecb68;">&#10003;</span> Tìm kiếm &amp; theo dõi đơn đặt hàng của bạn</li>
            <li><span style="color: #4ecb68;">&#10003;</span> Đăng nhập một lần cho các sản phẩm và dịch vụ của adidas</li>
            <li><span style="color: #4ecb68;">&#10003;</span> Lịch sử đơn hàng</li>
            <li><span style="color: #4ecb68;">&#10003;</span> Thanh toán nhanh hơn</li>
        </ul>
        </div>
    <a href="/vn/myaccount/register/" class="materialize-btn materialize-btn-black" type="submit" value="Đăng ký" name="dwfrm_createaccount_register"><span>Đăng ký</span></a>
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
