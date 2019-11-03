<?php
session_start();
$name= $_SESSION["name"];
$lastname= $_SESSION["lastname"];
$email    = $_SESSION["email"];
$password= $_SESSION["password"];

$coon=mysqli_connect( "localhost", "id11399066_root", "password", "id11399066_adidas");
mysqli_query($coon, "SET NAMES utf8");
$coon->query("set names 'utf8'"); $coon->set_charset("utf8");

$result=mysqli_query($coon, "SELECT * FROM taikhoan WHERE EMAIL = '$email'");
?>
<!DOCTYPE html>
<html>

<head>
<meta data-react-helmet="true" id="meta-http-content-type" http-equiv="Content-Type" content="text/html;charset=utf-8"/>

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
<link rel="stylesheet" href="/css/build-COMMON/build-COMMON.css"> <!-- css đăng nhập xong -->
<link rel="stylesheet" href="/css/build-COMMON/profile.css"> <!-- css profile -->
<link rel="stylesheet" href="/css/container.css"> <!-- css cho footer -->
<link rel="stylesheet" href="/css/footerBottom.css"> <!-- css cho footer -->
<link rel="stylesheet" href="/css/footer.css"> <!-- css cho footer -->



<link rel="icon" href="/images/0/img/adidas-favicon.ico" />
</head>

<script src="/js/include.js"></script>

<body>

<div id="topdiv">
<div w3-include-html="/vn/include/menu.php"></div>
</div>

<div id="topdivvv">

</div>

<div id="main">

<?php include('serverforadd.php') ?>


<div class="rbk-breadcrumbs-wrapper">
    <div class="breadcrumb">
        <a href="/" title="Home">Trang chủ</a>
            <span class="divider">/</span><a href="/vn/myaccount/login/login_success.php" title="Tài Khoản Của Tôi">Tài Khoản Của Tôi</a>
            <span class="divider">/</span><a href="<?php echo$_SERVER['HTTP_REFERER']?>" title="Địa Chỉ Đặt Trước">Địa Chỉ Đặt Trước</a>
    </div><!-- END: breadcrumb -->
</div>




<div class="rbk-content-wrapper">


<div id="leftcolumn">
    <div class="styled_nav universe_link ">
        <div class="contentasset" data-contentasset-id="account-navigation" data-contentasset="account-navigation">
            <ul class="adi-myaccout-redesign">
                <li class="navgroup"><a class="nav-title personal_information_link" title="Tài Khoản Của Tôi" href="/vn/myaccount/login/login_success.php">Tài Khoản Của Tôi</a></li>
                <li class="navgroup"><a class="nav-title " title="Personal Information" href="/vn/myaccount/profile/profile.php">Thông Tin Cá Nhân</a></li>
                <li class="navgroup"><a class="nav-title your_preferences_link" title="Your Preferences" href="#">Tùy Chọn Của Bạn</a></li>
                <li class="navgroup"><a class="nav-title universe_link address_book_link" title="Address Book" href="/vn/myaccount/address/address.php">Địa Chỉ Đặt Trước</a></li>
                <li class="navgroup"><a class="nav-title order_history_link" title="Order History" href="#">Lịch Sử Đặt Hàng</a></li>
                <li class="navgroup"><a class="nav-title wishlist_link" title="Wish List" href="#">Danh Sách Yêu Thích</a></li>
            </ul>
        </div>
        <div class="contentasset" data-contentasset-id="account-navigation-mi" data-contentasset="account-navigation-mi">
            <ul>
                <li class="navgroup nav-miadidas"><a class="nav-title mi_adidas_link" title="mi adidas" href="#">mi adidas</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="accountcenter">
    <form method="post" action="address.php">

    <div class="formfields_container">
        <h2>SỬA ĐỊA CHỈ</h2>
        <p class="account_info">Vui lòng cập nhật thông tin địa chỉ của bạn</p>
        <div class="formfield_onerow">
            <div class="formfield addressname">
                <div class="value">
<?php
$result=mysqli_query($coon, "SELECT * FROM taikhoan WHERE EMAIL = '$email'");
while ($row=mysqli_fetch_assoc($result)) {?>
                    <input required="required" class="textinput required" id="profile_customer_firstname" type="text" name="addressname"  maxlength="50" value="<?php echo $row['addressname'];?>" placeholder="* Tên Địa Chỉ">
                </div>
                <div class="labelwithcaption">
					<span class="caption">Ví Dụ: Nhà, văn phòng...</span>
				</div>
            </div>
            <div class="formfield street">
                <div class="value">
                    <input required="required" class="textinput required" id="profile_customer_lastname" type="text" name="street"  maxlength="50" value="<?php echo $row['street'];?>" placeholder="* Đường">
                </div>
            </div>
            <div class="formfield type">
                <div class="value">
                    <input class="textinput required" id="profile_customer_lastname" type="text" name="type"  maxlength="50" value="<?php echo $row['type'];?>" placeholder="Căn hộ, Dãy, Phòng, Tòa Nhà, Trung Cư(Không Bắt Buộc)">
                </div>
            </div>
            <div class="formfield citytown">
                <div class="value">
                    <input required="required" class="textinput required" id="profile_customer_lastname" type="text" name="citytown"  maxlength="50" value="<?php echo $row['citytown'];?>" placeholder="* Thành phố/Thị Xã">
                </div>
            </div>
            <div class="formfield state">
                <div class="value">
                    <input required="required" class="textinput required" id="profile_customer_lastname" type="text" name="state"  maxlength="50" value="<?php echo $row['state'];?>" placeholder="* Tỉnh">
                </div>
            </div>
            <div class="formfield zipcode">
                <div class="value">
                    <input required="required" class="textinput required" id="profile_customer_lastname" type="text" name="zipcode"  maxlength="50" value="<?php echo $row['zipcode'];?>" placeholder="* Mã Zip">
                </div>
                <div class="labelwithcaption">
					<span class="caption">dạng như 20500</span>
				</div>
            </div>
            <div class="formfield country">
                <div class="value">
                    <input required="required" class="textinput required" id="profile_customer_lastname" type="text" name="country"  maxlength="50" value="<?php echo 'Việt Nam';?>" value="<?php echo $row[''];?>" placeholder="* Quốc Gia">
                </div>
            </div>
            <div class="formfield phonenumber">
                <div class="value">
                    <input required="required" class="textinput required" id="profile_customer_lastname" type="text" name="phonenumber"  maxlength="50" value="<?php echo $row['phonenumber'];?>" placeholder="* Số Di Động">
<?php } ?>
                </div>
                <div class="labelwithcaption">
					<span class="caption">Ví Dụ: 333-333-3333</span>
				</div>
            </div>

        </div>
    </div>

    <input class="materialize-input" type="checkbox" id="dwfrm_login_rememberme" name="dwfrm_login_rememberme" value="true" checked="checked"/>
    <label for="dwfrm_login_rememberme" class="materialize-element-box"> Đặt địa chỉ này làm địa chỉ chính của tôi </label>

    <br><br><br>

    <div class="formactions">
        <button id="pisubmitid" class="btn_primary" type="submit" value="Submit" title="Gửi đi" name="Submit"><span>Cập nhật địa chỉ đặt trước</span></button>
    </div>

    <br>

    </form>





    <div class="quick_links clear clearfix">
    <div class="contentasset" data-contentasset-id="account-quicklinks" data-contentasset="account-quicklinks">
        <h4>Đường Dẫn Nhanh</h4>
        <ul>
        <li><a href="#">Định Vị Cửa Hàng</a></li>
        <li><a title="Customer Service" href="#">Dịch Vụ Khách Hàng</a></li>
        <li><a title="View privacy policy" href="#">Chính Sách Bảo Mật</a></li>
        <li><a title="Secure shopping" href="#">Mua Sắm An Toàn</a></li>
        <li><a href="#">Thông Tin Giao Hàng</a></li>
        <li><a href="#">Chính Sách Hoàn Trả</a></li>
        </ul>
    </div>
    <!-- End contentasset -->
    </div>

</div><!-- End acconuntcenter-->

</div><!-- EO: rbk_content_wrapper -->
</div><!-- EO: main -->


<div w3-include-html="/vn/include/footer.html"></div>

<script>
includeHTML();
</script>


</body>
</html>
