<?php
session_start();
/*
Một số biến được xác định trước trong PHP là "superglobals-toàn cục",
có nghĩa là chúng luôn có thể truy cập, bất kể phạm vi -
và bạn có thể truy cập chúng từ bất kỳ hàm,
lớp hoặc tệp nào mà không phải thực hiện bất kỳ điều gì đặc biệt.
Các biến superglobal PHP là:
$GLOBALS
$_SERVER
$_REQUEST
$_POST
$_GET
$_FILES
$_ENV
$_COOKIE
$_SESSION
*/
$_SESSION['breadcrumb_title_1']="Tài Khoản Của Tôi";

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
<!--Ví dụ 4 - Làm mới tài liệu sau mỗi 30 giây:-->
<meta http-equiv="refresh" content="30">
<!--Ví dụ 5 - Đặt chế độ xem để làm cho trang web của bạn trông đẹp trên tất cả các thiết bị:-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="/css/foundation.css"> <!-- css chung -->
<link rel="stylesheet" href="/css/menu.css"> <!-- css cho menu -->
<link rel="stylesheet" href="/css/animatedSearchBar.css"> <!-- css cho thanh tìm kiếm linh hoạt-->
<link rel="stylesheet" href="/css/slideshow.css"> <!-- css cho slideshow -->
<link rel="stylesheet" href="/css/text-center.css"> <!-- ad -->
<link rel="stylesheet" href="/css/build-COMMON/build-COMMON.css"> <!-- css đăng nhập -->
<link rel="stylesheet" href="/css/container.css"> <!-- css cho footer -->
<link rel="stylesheet" href="/css/footerBottom.css"> <!-- css cho footer -->
<link rel="stylesheet" href="/css/footer.css"> <!-- css cho footer -->

<link rel="icon" href="/img/adidas-favicon.ico" />
</head>

<script src="/js/include.js"></script>

<body>

  <div w3-include-html="/vn/include/menu.php"></div>

<div id="main">
<div class="rbk-breadcrumbs-wrapper">




<div class="breadcrumb">



<a href="/" title="Home">Trang chủ</a>




<span class="divider">/</span><a href="<?php echo$_SERVER['HTTP_REFERER']?>" title="Tài Khoản Của Tôi">Tài Khoản Của Tôi</a>





</div><!-- END: breadcrumb -->
</div>




<div class="rbk-content-wrapper">


<div id="leftcolumn">
	<div class="styled_nav universe_link ">
		<div class="contentasset" data-contentasset-id="account-navigation" data-contentasset="account-navigation">
			<ul class="adi-myaccout-redesign">
				<li class="navgroup"><a class="nav-title universe_link account_overview_link" title="Tài Khoản Của Tôi" href="/vn/myaccount/login/login_success.php">Tài Khoản Của Tôi</a></li>
				<li class="navgroup"><a class="nav-title personal_information_link" title="Personal Information" href="/vn/myaccount/profile/profile.php">Thông Tin Cá Nhân</a></li>
				<li class="navgroup"><a class="nav-title your_preferences_link" title="Your Preferences" href="#">Tùy Chọn Của Bạn</a></li>
				<li class="navgroup"><a class="nav-title address_book_link" title="Address Book" href="/vn/myaccount/address/address.php">Địa Chỉ Đặt Trước</a></li>
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
	<div class="accountwelcome">
		<h1>XIN CHÀO,<?php echo $_SESSION["name"];?></h1>

		<div class="not_user">
			Không phải <span class="username"><?php echo $_SESSION["name"];?>?</span> <a title="Đăng xuất" href="/vn/myaccount/login/logout.php">Đăng xuất</a>
		</div>
	</div>


	<div class="accountlanding">
		<div class="carousel_wrap account-landing-slot">
			<div class="contentstack clearfix contentstack-productcarousel ">
				<div class="carousel-content-inner owl-carousel-content-inner clearfix threefourth" data-contentasset='account-page_product_recommendations' data-contentassetid='account-page_product_recommendations'>
					<h3 class="carousel-title ">được đề xuất cho bạn</h3>
				</div>

				<div data-certonazoneid="account_rr" class="owlcarousel-wrapper product-carousel-owl threefourth" data-component="productlist/Plp">
					<div class="owl-carousel owl-theme" data-component="common/OwlCarousel" data-prop-nesteditemselector="hockeycard" data-prop-nav="true" data-prop-items="3.0" data-prop-slideBy="3.0" data-prop-margin="10">

						<!-- show loading icon. -->

						<img class="loading-small" src="/img/loading-small.gif" alt="" style="display: none;" />

						<div id="account_rr">
							<!-- ---------------------------------------------------------------------------------------------------------------------------- -->

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="/css/login/custom.css" rel="stylesheet">
<div class="stack" <?php if (empty($_COOKIE[1])){ echo 'style="display: none"';} ?> ><div class="container"><div class="row">

<h4 class="title___37UkT">CÁC MỤC ĐÃ XEM GẦN ĐÂY</h4>
    <div id="exampleSlider">
       <div class="MS-content">
<?php

for ($x = 1; $x <= 12; $x++) {
    if(isset($_COOKIE[$x])) {$COOKIE=$_COOKIE[$x];
    } else {
        $COOKIE=0;
    }

    $conn=mysqli_connect( "localhost", "id11399066_root", "password", "id11399066_adidas");
mysqli_query($conn, "SET NAMES utf8");
$sql="select * from sanpham where IDSP=$COOKIE";
$query=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($query))
{ // Mở PHP
		$giaban=$row['GIABAN'];
		$giagoc=$row['GIAGOC'];
?>
<div class="item"><div class="items">
                  <a href="/vn/product/?slot=<?php echo $row['IDSP'] ?>" data-auto-id="glass-hockeycard-link">
                  <img class="gl-product-card__image" src="/images/<?php echo $row['IDSP']?>/<?php echo $row['ANH'] ?>" alt="<?php echo $row['TENSP'];?>" height="240" width="240">
                  <div class="gl-product-card__details">
                  <div class="gl-product-card__details-top">
                  <div class="gl-product-card__category gl-label--medium" title="Performance">
                  <?php
        if(empty($row['AGE']) or $row['AGE']!='infant_toddler'){
            if ($row['GENDER']=="kids"){echo $row['GENDER'].' unisex ';} else {
                if ($row['GENDER']!="" && $row['GENDER']!="boys" && $row['GENDER']!="girls") echo  $row['GENDER'].'\'s'.' '; else echo  $row['GENDER'].' ';}
        }
        else {
            echo 'infants ';}
        if(!empty($row['BRAND'])) echo $row['BRAND'].' ';
        if(!empty($row['SPORTS'])) echo $row['SPORTS'];
        ?>
                  </div>
                  </div>
                  <div class="gl-product-card__details-main">
                  <div class="gl-product-card__name gl-label gl-label--medium" title="<?php echo $row['TENSP'];?>"><?php echo $x.'.'.$row['TENSP'];?></div>
                  <div class="gl-price-container"><span id="red"
        <?php if(!empty($giagoc)) echo "style=\"color: red\""?>>
        <?php  echo number_format($giaban*23000,0,".",","),"₫"?>
        </span><strike><?php if(!empty($giagoc))  echo number_format($giagoc*23000,0,".",","),"₫"?></strike>
    </span></div>
                  </div>
                  <div class="gl-product-card__details-bottom">
                  <div class="gl-product-card__reviews-number">
                  <?php
                  $idsp=$row['IDSP'];
                  $sql="SELECT count(postid) as totalreviews FROM comments WHERE postid='$idsp'";
                  $result=mysqli_query($conn,$sql);
                  $row=mysqli_fetch_assoc($result);
                  $total_reviews=$row[ 'totalreviews'];
                  echo $total_reviews;
                  ?>
                  </div>
                  </div>
                  </div>
                  </a>
</div></div>
<?php
}}
?>
       </div>
       <div class="MS-controls" <?php if (empty($_COOKIE[5])){ echo 'style="display: none"';} ?>>
           <button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
           <button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
       </div>
   </div>

    <!-- Include jQuery -->
    <script src="/slider/multislider/js/jquery-2.2.4.min.js"></script>

    <!-- Include Multislider -->
    <script src="/slider/multislider/js/multislider.min.js"></script>

    <!-- Initialize element with Multislider -->
    <script>
    $('#exampleSlider').multislider({
        interval: 0,
        slideAll: true,
        duration: 100
    });
    </script>

</div></div></div>

<!-- ---------------------------------------------------------------------------------------------------------------------------- -->

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


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

<!-- EO: rbk_content_wrapper -->
</div>

<div w3-include-html="/vn/include/footer.html"></div>

<script>
includeHTML();
</script>


</body>
</html>
