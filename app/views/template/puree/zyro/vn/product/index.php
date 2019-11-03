<?php
echo '<br>';
session_start();
$conn=mysqli_connect( "localhost", "id11399066_root", "password", "id11399066_adidas");
mysqli_query($conn, "SET NAMES utf8");
$id=$_GET['slot'];
//RECENTLY VIEWED ITEMS
/* unset cookies

if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}
echo'<br><br><br><br><br><br><br><br><br>';echo'<br><br><br><br><br><br><br><br><br>';
for ($x = 0; $x <= 11; $x++) {
    if(empty($_COOKIE[$x])) setcookie($x, '0', time() + (86400 * 30), "/"); // 86400 = 1 day
}
echo $_COOKIE[11].'<br>';
$a=array($_COOKIE[0],$_COOKIE[1],$_COOKIE[2],$_COOKIE[3],$_COOKIE[4],$_COOKIE[5],$_COOKIE[6],$_COOKIE[7],$_COOKIE[8],$_COOKIE[9],$_COOKIE[10],$_COOKIE[11]);

echo $_COOKIE[1].'<br>';
echo $id.'<br>';
echo $a[0].'<br>';
var_dump($a);
if($id!==$a[0]) {
array_push($a,$id);
for ($x = 0; $x <= 11; $x++) {
    setcookie($x, $a[$x], time() + (86400 * 30), "/");
}
}

print_r($a);*/

if ($_COOKIE[1]!=$id){
$cookie11="";$cookie10="";$cookie9="";$cookie8="";$cookie7="";$cookie6="";$cookie5="";$cookie4="";$cookie3="";$cookie2="";$cookie1="";
if(isset($_COOKIE[11])) $cookie11=$_COOKIE[11];
setcookie('12', $cookie11, time() + (86400 * 30), "/"); // 86400 = 1 day
if(isset($_COOKIE[10])) $cookie10=$_COOKIE[10];
setcookie('11', $cookie10, time() + (86400 * 30), "/"); // 86400 = 1 day
if(isset($_COOKIE[9])) $cookie9=$_COOKIE[9];
setcookie('10', $cookie9, time() + (86400 * 30), "/"); // 86400 = 1 day
if(isset($_COOKIE[9])) $cookie9=$_COOKIE[9];
setcookie('10', $cookie9, time() + (86400 * 30), "/"); // 86400 = 1 day
if(isset($_COOKIE[8])) $cookie8=$_COOKIE[8];
setcookie('9', $cookie8, time() + (86400 * 30), "/"); // 86400 = 1 day
if(isset($_COOKIE[7])) $cookie7=$_COOKIE[7];
setcookie('18', $cookie7, time() + (86400 * 30), "/"); // 86400 = 1 day
if(isset($_COOKIE[6])) $cookie6=$_COOKIE[6];
setcookie('7', $cookie6, time() + (86400 * 30), "/"); // 86400 = 1 day
if(isset($_COOKIE[5])) $cookie5=$_COOKIE[5];
setcookie('6', $cookie5, time() + (86400 * 30), "/"); // 86400 = 1 day
if(isset($_COOKIE[4])) $cookie4=$_COOKIE[4];
setcookie('5', $cookie4, time() + (86400 * 30), "/"); // 86400 = 1 day
if(isset($_COOKIE[3])) $cookie3=$_COOKIE[3];
setcookie('4', $cookie3, time() + (86400 * 30), "/"); // 86400 = 1 day
if(isset($_COOKIE[2])) $cookie2=$_COOKIE[2];
setcookie('3', $cookie2, time() + (86400 * 30), "/"); // 86400 = 1 day
if(isset($_COOKIE[1])) $cookie1=$_COOKIE[1];
setcookie('2', $cookie1, time() + (86400 * 30), "/"); // 86400 = 1 day

setcookie('1', $id, time() + (86400 * 30), "/"); // 86400 = 1 day

}
$sql="select * from sanpham where IDSP=$id";
$query=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($query))
{
    if(!empty ($row['TENSP'])) $TENSP = $row['TENSP'] ;
    if(!empty ($row['COLOR'])) $COLOR = $row['COLOR'] ;
    if(!empty ($row['COLORDT'])) $COLORDT = $row['COLORDT'] ;
    if(!empty ($row['GENDER'])) $GENDER = $row['GENDER'] ;
    if(!empty ($row['AGE'])) $AGE = $row['AGE'] ;
    if(!empty ($row['FRANCHISE'])) $FRANCHISE = $row['FRANCHISE'] ;
    if(!empty ($row['PRODUCTTYPE'])) $PRODUCTTYPE = $row['PRODUCTTYPE'] ;
    if(!empty ($row['BRAND'])) $BRAND = $row['BRAND'] ;
    if(!empty ($row['CATEGORY'])) $CATEGORY = $row['CATEGORY'] ;
    if(!empty ($row['SPORTS'])) $SPORTS = $row['SPORTS'] ;
    if(!empty ($row['DESCRIPTION_H5'])) $DESCRIPTION_H5 = $row['DESCRIPTION_H5'] ;else $DESCRIPTION_H5="";
    if(!empty ($row['DESCRIPTION_P'])) $DESCRIPTION_P = $row['DESCRIPTION_P'] ;else $DESCRIPTION_P="";
    if(!empty ($row['SPECIFICATIONS'])) $SPECIFICATIONS = $row['SPECIFICATIONS'] ;else $SPECIFICATIONS="";

    if(!empty ($row['CARE'])) $CARE = $row['CARE'] ;else $CARE="";


    $ANHCHITIET=$row['ANHCHITIET'];
    $giaban=$row['GIABAN'];
    $giagoc=$row['GIAGOC'];
date_default_timezone_set("Asia/Bangkok");
    $date1=date_create($row['NGAYPHATHANH']);
$date2=new DateTime();
$diff=date_diff($date1,$date2);
$day=$diff->format("%R%a");

}
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">

<title>adidas <?php echo $TENSP ?><?php if( !empty ($COLOR)) echo ' - '.$COLOR ?> | adidas VN</title>

<!--Ví dụ 1 - Xác định từ khóa cho công cụ tìm kiếm:-->
<meta name="keywords" content="HTML, CSS, XML, XHTML, JavaScript">
<!--Ví dụ 2 - Xác định mô tả trang web của bạn:-->
<meta name="description" content="Free Web tutorials on HTML and CSS">
<!--Ví dụ 3 - Xác định tác giả của một trang:-->
<meta name="author" content="John Doe">
<!--Ví dụ 4 - Làm mới tài liệu sau mỗi 3600 giây:-->
<meta http-equiv="refresh" content="3600">
<!--Ví dụ 5 - Đặt chế độ xem để làm cho trang web của bạn trông đẹp trên tất cả các thiết bị:-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="/css/foundation.css"> <!-- css chung -->
<link rel="stylesheet" href="/css/menu.css"> <!-- css cho menu -->
<link rel="stylesheet" href="/css/animatedSearchBar.css"> <!-- css cho thanh tìm kiếm linh hoạt-->
<link rel="stylesheet" href="/css/product/products.css"> <!-- css cho nhieu sanpham -->
<link rel="stylesheet" href="/css/product/product.css"> <!-- css cho nhieu sanpham -->
<link rel="stylesheet" href="/css/calloutbar.css"> <!-- css cho o goi lai -->
<link rel="stylesheet" href="/css/container.css"> <!-- css cho footer -->
<link rel="stylesheet" href="/css/footerBottom.css"> <!-- css cho footer -->
<link rel="stylesheet" href="/css/footer.css"> <!-- css cho footer -->

<link rel="icon" href="/images/0/img/adidas-favicon.ico" />
</head>

<script src="/js/include.js"></script>

<body>



<div id="topdiv">
<div w3-include-html="/vn/include/menu.php"></div>
<div class="usp-bar-area">
    <div class="usp-header-placeholder">
        <div class="callout-bars">
            <div class="callout-bar last slot-content-contain clearfix ">
                <img src="/images/0/img/adidas_USP_delivery.png" width="88" height="88" class="base lazyload" />
                <div class="callout-bar-copy">
                    <span id="readmore" class="dialog-forgotpassword clear">MIỄN PHÍ VẬN CHUYỂN VÀ MIỄN PHÍ TRẢ LẠI</span>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="ui-dialog ui-widget ui-widget-content ui-corner-all popup-scale-in" style="display: none; z-index: 1003; outline: 0px; height: 516px; width: 450px; font-size: 14px;color: #000;top: 50%;left: 50%; margin-top: -258px;margin-left: -225px;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);position: fixed;background: white;">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span class="ui-dialog-title" id="ui-dialog-title-dialogcontainer"<span class="ui-dialog-title" id="ui-dialog-title-dialogcontainer" style="border-bottom: 1px solid #c8cbcc;padding: 18px 45px 18px 20px;font: 700 17px/16px ;text-transform: uppercase;display: block;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-weight: bold;text-transform: uppercase;">MIỄN PHÍ VẬN CHUYỂN VÀ MIỄN PHÍ TRẢ LẠI</span>
            <a href="#" id="ui-dialog-titlebar-close" class="ui-corner-all" role="button">
                <span class="ui-icon ui-icon-closethick"style="position: absolute;top: 20px;right: 20px;" >X</span></a></div>
                    <div id="dialogcontainer" class="ui-dialog-content ui-widget-content" scrolltop="0" scrollleft="0" style="width: auto; min-height: 53px; height: auto; max-height: 437.4px;padding: 10px 45px 18px 20px;">
                            <span class="callout-bar-body">
                                <p>MIỄN PHÍ VẬN CHUYỂN VÀ MIỄN PHÍ TRẢ LẠI </p>
                                <p>Ưu đãi giao hàng miễn phí có giới hạn thời gian này rất tốt cho giao hàng miễn phí, giảm giá khi thanh toán. Xem phương thức phân phối khi thanh toán cho ngày giao hàng dự kiến. Ưu đãi không áp dụng cho thẻ quà tặng adidas và tùy chỉnh mi adidas. Chỉ có hiệu lực đối với các đơn đặt hàng ở Hoa Kỳ trong nước. Adidas có quyền thay đổi hoặc kết thúc chương trình khuyến mãi bất cứ lúc nào .. </p>
                                <p>Nếu bạn không hoàn toàn hài lòng với việc mua hàng adidas.com của mình, vì bất kỳ lý do gì, chúng tôi sẽ cung cấp cho bạn khoản hoàn trả miễn phí trong vòng 30 ngày kể từ ngày mua. </p>
                                <p>*Vì các sản phẩm mi adidas tùy chỉnh và được cá nhân hóa chỉ dành riêng cho bạn nên chúng không thể trả về được. </p>
                                <p>Xin lưu ý để sử dụng lợi tức miễn phí trên adidas.com, gói phải được gửi từ thực tế tại Hoa Kỳ. Xin lưu ý rằng nhãn trả lại không hợp lệ thông qua USPS cho lợi tức của APO / FPO. Hãy xem <a href="/us/help-topics-returning.html" manual_cm_sp="header-promo-callout-_-USP-header_promo_free_shipping_returns-_-Return Policy"> Chính sách trả lại </a> của chúng tôi để biết thêm chi tiết. </p>
                            </span>

                    </div>
    </div>

</div>





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
<script src="/js/calloutbar.js"></script>
</div>

<div id="topdivv">

</div>


<div data-auto-id="glass-breadcrumbs" class="gl-hidden-s-m breadcrumb___2DviW">
    <div class="container breadcrumb_container___1L_9x">
        <ol vocab="http://schema.org" typeof="BreadcrumbList">
            <li class="back___28hlc gl-body--small gl-no-margin-bottom"><span class="gl-icon icon icon-arrow-left-circle back-icon___9qTR7 icon--size-m"></span><span class="gl-link" onclick="goBack()">Trở lại</span></li>
<script>
function goBack() {
    window.history.back();
}
</script>
            <li property="itemListElement" typeof="ListItem"><span class="spacer___19Hw0 gl-body--small">|</span><a property="item" typeof="WebPage" href="/" class="gl-link gl-body--small"><span property="name">Trang chủ</span></a>
                <meta property="position" content="1">
            </li>
<?php if(!empty ($GENDER))
echo '
            <li property="itemListElement" typeof="ListItem"><span class="gl-icon icon icon-arrow-right caret___1VEpD icon--size-xs"></span><a class="gl-link gl-body--small" property="item" typeof="WebPage" href="/vn/?'.$GENDER.'" manual_cm_sp="breadcrumb-_-usmen"><span property="name">'.$GENDER.'</span></a>
                <meta
                    property="position" content="2">
            </li>
'?>
<?php if(!empty ($AGE))
echo '
            <li property="itemListElement" typeof="ListItem"><span class="gl-icon icon icon-arrow-right caret___1VEpD icon--size-xs"></span><a class="gl-link gl-body--small" property="item" typeof="WebPage" href="/vn/?'.$AGE.'" manual_cm_sp="breadcrumb-_-usmen"><span property="name">'.$AGE.'</span></a>
                <meta
                    property="position" content="2">
            </li>
'?>
<?php if(!empty ($FRANCHISE))
echo '
            <li property="itemListElement" typeof="ListItem"><span class="gl-icon icon icon-arrow-right caret___1VEpD icon--size-xs"></span><a class="gl-link gl-body--small" property="item" typeof="WebPage" href="/vn/?'.$FRANCHISE.'" manual_cm_sp="breadcrumb-_-usmen"><span property="name">'.$FRANCHISE.'</span></a>
                <meta
                    property="position" content="2">
            </li>
'?>
<?php if(!empty ($BRAND))
echo '
            <li property="itemListElement" typeof="ListItem"><span class="gl-icon icon icon-arrow-right caret___1VEpD icon--size-xs"></span><a class="gl-link gl-body--small" property="item" typeof="WebPage" href="/vn/?'.$BRAND.'" manual_cm_sp="breadcrumb-_-usmen"><span property="name">'.$BRAND.'</span></a>
                <meta
                    property="position" content="2">
            </li>
'?>
<?php if(!empty ($SPORTS))
echo '
            <li property="itemListElement" typeof="ListItem"><span class="gl-icon icon icon-arrow-right caret___1VEpD icon--size-xs"></span><a class="gl-link gl-body--small" property="item" typeof="WebPage" href="/vn/?'.$SPORTS.'" manual_cm_sp="breadcrumb-_-usmen"><span property="name">'.$SPORTS.'</span></a>
                <meta
                    property="position" content="2">
            </li>
'?>
<?php if(!empty ($PRODUCTTYPE))
echo '
            <li property="itemListElement" typeof="ListItem"><span class="gl-icon icon icon-arrow-right caret___1VEpD icon--size-xs"></span><a class="gl-link gl-body--small" property="item" typeof="WebPage" href="/vn/?'.$PRODUCTTYPE.'" manual_cm_sp="breadcrumb-_-usmen"><span property="name">'.$PRODUCTTYPE.'</span></a>
                <meta
                    property="position" content="2">
            </li>
'?>
<?php if(!empty ($PARNER))
echo '
            <li property="itemListElement" typeof="ListItem"><span class="gl-icon icon icon-arrow-right caret___1VEpD icon--size-xs"></span><a class="gl-link gl-body--small" property="item" typeof="WebPage" href="/vn/?'.$PARNER.'" manual_cm_sp="breadcrumb-_-usmen"><span property="name">'.$PARNER.'</span></a>
                <meta
                    property="position" content="2">
            </li>
'?>
<?php if(!empty ($CATEGORY))
echo '
            <li property="itemListElement" typeof="ListItem"><span class="gl-icon icon icon-arrow-right caret___1VEpD icon--size-xs"></span><a class="gl-link gl-body--small" property="item" typeof="WebPage" href="/vn/?'.$CATEGORY.'" manual_cm_sp="breadcrumb-_-usmen-_-apparel"><span property="name">'.$CATEGORY.'</span></a>
                <meta
                    property="position" content="3">
            </li>
'?>
<?php if(!empty ($MIADIDAS))
echo '
            <li property="itemListElement" typeof="ListItem"><span class="gl-icon icon icon-arrow-right caret___1VEpD icon--size-xs"></span><a class="gl-link gl-body--small" property="item" typeof="WebPage" href="/vn/?'.$MIADIDAS.'" manual_cm_sp="breadcrumb-_-usmen-_-apparel"><span property="name">'.$MIADIDAS.'</span></a>
                <meta
                    property="position" content="3">
            </li>
'?>
<?php if(!empty ($TENSP))
echo '
            <li><span class="gl-icon icon icon-arrow-right caret___1VEpD icon--size-xs"></span><span class="gl-body--small">'.$TENSP.'</span></li>
'?>
        </ol>
    </div>
</div>

<!------------------------------------------------------------------------------------------ -->

<div data-auto-id="glass-image-viewer" class="glass_image_viewer___3pD5T" style="background-color: #eceef0;
    background-size: 50% 100%!important;">

<script src="/js/zoom.js"></script>
<div data-auto-id="images_container" class="images_container___3KxTB " onclick="zoom()" style="margin-left: -250px">
<img onclick="changecursor()" id="expandedImg" class="performance-item" alt="<?php echo $TENSP?> Black <?php echo $id?>" src="/images/<?php echo $id?>/<?php echo $id?>dt1.jpg">
<div id="myresult" class="img-zoom-result" style="display:none">
</div>

<script>
function changecursor() {
    document.getElementById("expandedImg").style.cursor = 'url(/images/0/glass/assets/img/icon-adidas-cursor-zoomed.png) 24 24,auto';
    document.getElementById("expandedImg").setAttribute("onclick", "restorecursor()");
}
function restorecursor() {
    document.getElementById("expandedImg").style.cursor = 'url(/images/0/glass/assets/img/icon-adidas-cursor-zoom.png) 24 24,auto';
    document.getElementById("expandedImg").setAttribute("onclick", "changecursor()");
}
</script>

<script>
function zoom() {
    var x = document.getElementById("myresult");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
// Initiate zoom effect:
imageZoom("expandedImg", "myresult");
}
</script>


<!--
<div class="complete_the_look_flex_container___26oDy" style="display:inline!important;">
    <h4 class="gl-heading--regular" style="display:inline!important;">complete the look</h4>
    <div class="content_container___3oyqo" style="display:inline!important;">
        <div class="list_container___5ewV6" style="display:inline!important;">
            <div class="card_container___1t4Qk" style="display:inline!important;">
                <div class="product_image___XXt3A " style="display:inline!important;"><img style="display:inline!important;" class="img-normal" src="https://www.adidas.com/dis/dw/image/v2/aaqx_prd/on/demandware.static/-/Sites-adidas-products/en_US/dwf73d38b1/zoom/DB1881_01_standard.jpg?sh=295&amp;strip=false&amp;sw=295"></div>
                <div class="price___15lLR " style="display:inline!important;">
                    <div class="gl-price-container" style="display:inline!important;"><span style="display:inline!important;" class="gl-price">$75</span></div>
                </div>
            </div>
            <div class="card_container___1t4Qk" style="display:inline!important;">
                <div class="product_image___XXt3A " style="display:inline!important;"><img style="display:inline!important;" class="img-normal" src="https://www.adidas.com/dis/dw/image/v2/aaqx_prd/on/demandware.static/-/Sites-adidas-products/en_US/dwf73d38b1/zoom/DB1881_01_standard.jpg?sh=295&amp;strip=false&amp;sw=295"></div>
                <div class="price___15lLR " style="display:inline!important;">
                    <div class="gl-price-container" style="display:inline!important;"><span style="display:inline!important;" class="gl-price">$75</span></div>
                </div>
            </div>
            <div class="card_container___1t4Qk" style="display:inline!important;">
                <div class="product_image___XXt3A " style="display:inline!important;"><img style="display:inline!important;" class="img-normal" src="https://www.adidas.com/dis/dw/image/v2/aaqx_prd/on/demandware.static/-/Sites-adidas-products/en_US/dwf73d38b1/zoom/DB1881_01_standard.jpg?sh=295&amp;strip=false&amp;sw=295"></div>
                <div class="price___15lLR " style="display:inline!important;">
                    <div class="gl-price-container" style="display:inline!important;"><span style="display:inline!important;" class="gl-price">$75</span></div>
                </div>
            </div>
        </div>
        <div></div>
    </div>
</div>
-->
<!--
<div class="complete_the_look_flex_container___26oDy" style="display:inline!important;">
    <h4 class="gl-heading--regular" style="display:inline!important;">complete the look</h4>
    <div class="content_container___3oyqo" style="display:inline!important;">
        <div class="list_container___5ewV6" style="display:inline!important;">
            <div class="card_container___1t4Qk" style="display:inline!important;">
                <div class="product_image___XXt3A " style="display:inline!important;"><img style="display:inline!important;" class="img-normal" src="https://www.adidas.com/dis/dw/image/v2/aaqx_prd/on/demandware.static/-/Sites-adidas-products/en_US/dwf73d38b1/zoom/DB1881_01_standard.jpg?sh=295&amp;strip=false&amp;sw=295"></div>
                <div class="price___15lLR " style="display:inline!important;">
                    <div class="gl-price-container" style="display:inline!important;"><span style="display:inline!important;" class="gl-price">$75</span></div>
                </div>
            </div>
            <div class="card_container___1t4Qk" style="display:inline!important;">
                <div class="product_image___XXt3A " style="display:inline!important;"><img style="display:inline!important;" class="img-normal" src="https://www.adidas.com/dis/dw/image/v2/aaqx_prd/on/demandware.static/-/Sites-adidas-products/en_US/dwf73d38b1/zoom/DB1881_01_standard.jpg?sh=295&amp;strip=false&amp;sw=295"></div>
                <div class="price___15lLR " style="display:inline!important;">
                    <div class="gl-price-container" style="display:inline!important;"><span style="display:inline!important;" class="gl-price">$75</span></div>
                </div>
            </div>
            <div class="card_container___1t4Qk" style="display:inline!important;">
                <div class="product_image___XXt3A " style="display:inline!important;"><img style="display:inline!important;" class="img-normal" src="https://www.adidas.com/dis/dw/image/v2/aaqx_prd/on/demandware.static/-/Sites-adidas-products/en_US/dwf73d38b1/zoom/DB1881_01_standard.jpg?sh=295&amp;strip=false&amp;sw=295"></div>
                <div class="price___15lLR " style="display:inline!important;">
                    <div class="gl-price-container" style="display:inline!important;"><span style="display:inline!important;" class="gl-price">$75</span></div>
                </div>
            </div>
        </div>
        <div></div>
    </div>
</div>
-->
</div>

<div class="gl-badge gl-badge--large gl-badge--urgent" style="top: 170px;left: 40px; <?php
if (empty($giagoc)&&($day>31)) echo 'display: none;';
?>">
<?php
if ($giaban<$giagoc) echo '-'.(100-$giaban/$giagoc*100).' % ';
if ($day<=31&&$day>=0) echo 'mới';
if ($day<0) echo 'sắp có';
?>
</div>

<div data-abtest-atp-1231="control" class="thumbnails___b-juv thumbnails__control">

<div>
    <div class="gl-vspacing-l thumbnails_container___3SJWq thumbnails_container__control" style="left:35px;width: 80px; max-height: 320px;overflow-y: scroll;">



<div class="thumbnail___3g19J thumbnail__control" style="transform: translate(0px, 0px);border-bottom: 2px solid #000;">
<img data-auto-id="image" src="/images/<?php echo $id?>/<?php echo $id?>dt1.jpg" id="thumbnail_1" alt="" onclick="myFunction(this);"></div>

<div class="thumbnail___3g19J thumbnail__control " style="transform: translate(0px, 0px);">
<img data-auto-id="image" src="/images/<?php echo $id?>/<?php echo $id?>dt2.jpg" id="thumbnail_2" alt="" onclick="myFunction(this);"></div>

<div class="thumbnail___3g19J thumbnail__control" style="transform: translate(0px, 0px);">
<img data-auto-id="image" src="/images/<?php echo $id?>/<?php echo $id?>dt3.jpg" id="thumbnail_3" alt="" onclick="myFunction(this);"></div>

<div class="thumbnail___3g19J thumbnail__control" style="transform: translate(0px, 0px);">
<img data-auto-id="image" src="/images/<?php echo $id?>/<?php echo $id?>dt4.jpg" id="thumbnail_4" alt="" onclick="myFunction(this);"></div>

<div class="thumbnail___3g19J thumbnail__control" style="transform: translate(0px, 0px);">
<img data-auto-id="image" src="/images/<?php echo $id?>/<?php echo $id?>dt5.jpg" id="thumbnail_5" alt="" onclick="myFunction(this);"></div>

<div class="thumbnail___3g19J thumbnail__control" style="transform: translate(0px, 0px);">
<img data-auto-id="image" src="/images/<?php echo $id?>/<?php echo $id?>dt6.jpg" id="thumbnail_6" alt="" onclick="myFunction(this);"></div>

<div class="thumbnail___3g19J thumbnail__control" style="transform: translate(0px, 0px);">
<img data-auto-id="image" src="/images/<?php echo $id?>/<?php echo $id?>dt7.jpg" id="thumbnail_7" alt="" onclick="myFunction(this);"></div>

<div class="thumbnail___3g19J thumbnail__control" style="transform: translate(0px, 0px);">
<img data-auto-id="image" src="/images/<?php echo $id?>/<?php echo $id?>dt8.jpg" id="thumbnail_8" alt="" onclick="myFunction(this);"></div>

<div class="thumbnail___3g19J thumbnail__control" style="transform: translate(0px, 0px);">
<img data-auto-id="image" src="/images/<?php echo $id?>/<?php echo $id?>dt9.jpg" id="thumbnail_9" alt="" onclick="myFunction(this);"></div>

<div class="thumbnail___3g19J thumbnail__control" style="transform: translate(0px, 0px);">
<img data-auto-id="image" src="/images/<?php echo $id?>/<?php echo $id?>dt10.jpg" id="thumbnail_10" alt="" onclick="myFunction(this);"></div>


</div>



</div>
<script>
function myFunction(imgs) {
    var expandImg = document.getElementById("expandedImg");
    expandImg.src = imgs.src;
    document.getElementById("thumbnail_1").parentNode.setAttribute("style", "");
    document.getElementById("thumbnail_2").parentNode.setAttribute("style", "");
    document.getElementById("thumbnail_3").parentNode.setAttribute("style", "");
    document.getElementById("thumbnail_4").parentNode.setAttribute("style", "");
    document.getElementById("thumbnail_5").parentNode.setAttribute("style", "");
    document.getElementById("thumbnail_6").parentNode.setAttribute("style", "");
    document.getElementById("thumbnail_7").parentNode.setAttribute("style", "");
    document.getElementById("thumbnail_8").parentNode.setAttribute("style", "");
    document.getElementById("thumbnail_9").parentNode.setAttribute("style", "");
    document.getElementById("thumbnail_10").parentNode.setAttribute("style", "");


    imgs.parentNode.setAttribute("style", "border-bottom: 2px solid #000");
// Initiate zoom effect:
imageZoom("expandedImg", "myresult");
}
</script>
</div>
</div>
<div></div>
</div>

<div class="order_information___z33d1 col-s-12 col-l-8 col-hg-7" >
<div class="zoom_container___3OlJd "></div>
<div data-auto-id="product-information" class="row" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="<?php echo $TENSP?>">
<meta itemprop="image" content="https:dw51c0a0a9/zoom/BS3693_21_model.jpg">
<meta itemprop="description" content="Train hard. Stay cool. These men's soccer training pants help you warm up without overheating. Featuring ventilated climacool® and mesh inserts for maximum breathability, they keep the air moving while you stay on the pitch. A slim fit promotes easy footwork.">
<meta itemprop="sku" content="BS3693">
<div itemprop="brand" itemscope="" itemtype="http://schema.org/Brand">
<meta itemprop="name" content="adidas"></div>
<div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
<meta itemprop="ratingValue" content="4.6">
<meta itemprop="reviewCount" content="2264"></div>
<div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="USD">
<meta itemprop="price" content="45">
<link itemprop="availability" href="http://schema.org/inStock">
<meta itemprop="url" content="https://www.adidas.com/us/tiro-17-training-pants/BS3693.html"></div>
<div class="product_information___1Tt1L gl-vspacing-m">
    <div class="product_rating_starts_container gl-vspacing-s">
<!-------------------------------------------------------------------------------------------------->
<?php
$sql="SELECT count(postid) as totalreviews FROM comments WHERE postid='$id'";
  $result=mysqli_query($conn,$sql);


    $row=mysqli_fetch_assoc($result);
  $total_reviews=$row[ 'totalreviews'];
?>
        <div class="product_reviews___IhPrB">

        <span data-auto-id="product-rating-review-count">
        <a class="gl-hidden-s-m gl-link gl-body--small gl-no-margin-bottom" onclick="scrollWin()">
<script>
function scrollWin() {
    window.scrollTo(0,1250);
}
</script>

<?php
if(!empty($total_reviews)) echo 'Đọc tất cả '.$total_reviews.' đánh giá';else  echo 'Viết Đánh Giá';
?>
</a></span></div></div><div data-auto-id="product-category">
<!-------------------------------------------------------------------------------------------------->
        <div class="subtitle___2z5HL gl-label gl-label--large">
        <?php

        if(empty($AGE) or $AGE!='infant_toddler'){
            if(!empty($GENDER)) {
            if ($GENDER=="kids"){echo $GENDER.' unisex ';} else {
                if ($GENDER!="" && $GENDER!="boys" && $GENDER!="girls") echo  $GENDER.'\'s'.' '; else echo  $GENDER.' ';}
        } }
        else {
            echo 'infants ';}
        if(!empty($BRAND)) echo $BRAND.' ';
        if(!empty($SPORTS)) echo $SPORTS;
        ?>
        </div></div>

        <h1 data-auto-id="product-title" class="product_information_title___2rG9M product_title gl-heading gl-heading--m gl-heading--black"><?php echo $TENSP?></h1>

        <div class="gl-price-container"><span class="gl-price"
        <?php if(!empty($giagoc)) echo "style=\"color: red\""?>>

        <?php  echo number_format($giaban*23000,0,".",","),"₫"?>

        </span><strike><?php if(!empty($giagoc))  echo number_format($giagoc*23000,0,".",","),"₫"?></strike></div></div>



    </div>
<!------------------------------------------------------------------------------------------ -->
    <div data-auto-id="color-chooser" class="gl-vspacing-l wrapper___2M6MI">
        <h5 class="color_variation_title___2Zf7T">MÀU SẮC CÓ SẴN</h5>
        <div class="gl-label gl-label--large gl-vspacing-s color_text___mgoYV">
            <?php if (!empty($COLORDT)) echo $COLORDT?>
        </div>
        <div class="wrapper-full-width___1NpMw" data-abtest-atp-1231="control">
            <div class="wrapper-inner___I9yBh">
                <?php
                    if(empty($GENDER)) $GENDER="";
                    $sql="SELECT * FROM sanpham WHERE TENSP='$TENSP' AND GENDER='$GENDER'";
                    $result=mysqli_query($conn,$sql);
                    while ($row=mysqli_fetch_assoc($result)) {
                ?>
                <div class="color_variation___3RVtF active___14GDh">
                    <a href="/vn/product/?slot=<?php echo $row['IDSP'] ?>">
                        <div class="image_holder___1vNhb" style="background-image: url(&quot;/images/<?php echo $row['IDSP']?>/<?php echo $row['IDSP']?>dt1.jpg&quot;);<?php if($id==$row['IDSP']) echo 'border-bottom: 2px solid #000;'?>">
                        </div>
                    </a>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
<!------------------------------------------------------------------------------------------ -->
    <div>

    </div>

    <!-- old form -->
    <div class="add_to_bag_form___227O2" style="<?php if ($day<0) echo 'display:none;'?>" >
    <!--
    <div class="sizechart_link___dRZCk">
        <div class="gl-link"><span class="gl-icon icon icon-ruler ruler_icon___GgvPD icon--size-m"></span>size chart</div>
    </div>
    <div class="row no-gutters size_quantity_row___1pgH7">

                    <select class="gl-dropdown__select label dropdown-select" data-abtest-atp-1200="variant1" class="gl-dropdown__select-element" aria-label="Select size">
                        <option style="display:none">chọn kích cỡ</option>

                        </option><option value="0">XS</option><option value="1">S</option>
                        <option value="2">M</option><option value="3">L</option>
                        <option value="4">XL</option><option value="5">2XL</option>
                    </select>

<select class="gl-dropdown__select label dropdown-select" data-abtest-atp-1200="variant1" class="gl-dropdown__select-element" aria-label="Select size">
                    <option style="display:none">số lượng</option>
    <option value="0">1</option>
    <option value="1">2</option>
    <option value="2">3</option>
    <option value="3">4</option>
    <option value="4">5</option>
    <option value="5">6</option>
    <option value="6">7</option>
    <option value="7">8</option>
    <option value="8">9</option>
    <option value="9">10</option>
    <option value="10">11</option>
    <option value="11">12</option>
    <option value="12">13</option>
    <option value="13">14</option>
    <option value="14">15</option>
</select>

    </div>-->
    <div class="row no-gutters add_to_bag_container___16ts0">


<?php if(empty ($_SESSION["email"])) echo '<form action="/vn/myaccount/login/" method="post">'?>
<script>
function showUserr(str) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.open("GET","xulythem.php?slot="+str,true);
  xmlhttp.send();
}
</script>
        <button type="submit" onclick="showUserr(<?php echo $id?>)" aria-label="Add To Bag" class="gl-cta btn-bag gl-cta--primary gl-cta--full-width">
                Thêm vào túi
            <span class="gl-icon icon icon-arrow-right-long gl-cta__icon icon--size-l"></span>
        </button>
<?php if(empty ($_SESSION["email"])) echo '</form>'?>




<?php if(empty ($_SESSION["email"])) echo '<form action="/vn/myaccount/login/" method="post">'?>
<script>
function showUser(str) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementsByClassName("gl-cta gl-cta--icon wishlist___31HQW")[0].innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","xulythemyeuthich.php?slot="+str,true);
  xmlhttp.send();
}
</script>
<button type="submit">
<div class="gl-cta gl-cta--icon wishlist___31HQW" onclick="showUser(<?php echo $id?>)">
                <span class="gl-icon icon <?php
                $email=$_SESSION["email"];
                $coon=mysqli_connect("localhost", "id11399066_root", "password", "id11399066_adidas");
                mysqli_query($coon,"SET NAMES utf8");
                $result=mysqli_query($coon, "SELECT count(idtrongbangsp) AS total FROM yeuthich
                WHERE idtrongbangsp='$id' and EMAIL='$email'");
                $row=mysqli_fetch_assoc($result); $total_records=$row[ 'total'];
                $sql = "insert into yeuthich (idtrongbangsp,EMAIL) values ('$id','$email')";
                if($total_records!=0) echo
                'icon-heart'; else echo
                'icon-heart-empty';
                ?> icon--size-m"></span>
</div>
</button>

<?php if(empty ($_SESSION["email"])) echo '</form>'?>


    </div>

    <div style="cursor: pointer;">
    <div class="sizechart_link___dRZCk">

            <span class="gl-icon icon icon-delivery icon--size-l"></span>
        <br>
        <div class="gl-label gl-label--large" >MIỄN PHÍ VẬN CHUYỂN VÀ MIỄN PHÍ TRẢ LẠI</div>

<script>
          // Get the modal
  var modal = document.getElementsByClassName("ui-corner-all popup-scale-in")[0];
    var overlay = document.getElementsByClassName("ui-widget-overlay")[0];

  // Get the button that opens the modal
  var btn = document.getElementsByClassName("gl-label gl-label--large")[2];

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
    </div>
    </div>
    <!--end old form -->
</div>

        <span data-abtest-atp-1203="control" style="<?php if ($day>=0) echo 'display:none;'?>" >
            <div class="gl-vspacing-l promotion_callout_wrapper___3cKf9">
                <div class="promotion_callout___3FSI3" data-auto-id="callout_top_stack">
                    <div class="">
                        <div class="" style="font-weight: 700; background: silver; padding: 15px;">
                        <?php
                        //https://www.w3schools.com/php/func_date_date_format.asp
                            if ($day<0) echo "COMING SOON<br><br>Available<br><br>".$date1->format('l F dS h:i:sa').' '.date_default_timezone_get();
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </span>
</div>

<!------------------------------------------------------------------------------------------ -->

<div class="col-s-12 offset-l-1 col-l-22 col-xl-20 offset-xl-2 offset-hg-3 col-hg-18" style=" margin-left: 10%;margin-top:-220px;margin-bottom:120px;">
    <h3 class="gl-vspacing-l">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;thông tin chi tiết sản phẩm</h3>
    <div class="row">
        <ul id="myDIV">
            <li class="btn active"
            onclick="getElementById('1').style.display='';
            getElementById('2').style.display='none';
            getElementById('3').style.display='none';
            ">miêu tả</li>
            <!-- https://www.w3schools.com/howto/howto_js_active_element.asp
          https://www.w3schools.com/howto/howto_js_alert.asp-->
            <li class="btn"
            onclick="getElementById('1').style.display='none';
            getElementById('2').style.display='';
            getElementById('3').style.display='none';
            ">thông số kỹ thuật</li>
            <li class="btn" style="display: none;"
            onclick="getElementById('1').style.display='none';
            getElementById('2').style.display='none';
            getElementById('3').style.display='';
            ">chú ý</li>
        </ul>

<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>


        <div class="container no-gutters">
            <div style="" id="1">
                <div class="desktop_product_details___m49F0">
                    <div class="wrapper___1HYKp col-l-12 no-gutters">
                        <h4><?php echo $TENSP?></h4>
                        <h5><?php echo $DESCRIPTION_H5?></h5>
                        <p><?php echo $DESCRIPTION_P?></p>
                    </div>
                    <div class="product_media___240a0 offset-l-2 col-l-11 offset-hg-1 col-hg-12 no-gutters"><img src="/images/<?php echo $id?>/<?php echo $id?>dt5.jpg" class="description_img___3nrC6" alt="<?php echo $TENSP?>"></div>
                </div>
            </div>
            <div style="display: none;" id="2">
                <div class="container row tab_container___3cvLR">
                    <pre class="col-l-12" style="width: 100%">
                        <ul class="no_bullets___3QQYt flex___28BXU">
                            <?php echo$SPECIFICATIONS?>
                            <li class="gl-vspacing-m">Màu sản phẩm: <?php echo$COLORDT?></li>
                            <li class="gl-vspacing-m">Mã sản phẩm: <?php echo$id?></li>
                        </ul>
                    </pre>
                </div>
            </div>
            <div style="display: none;" id="3">
                <?php echo$CARE?>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------------------------------------------------->

<div class="col-s-12 offset-l-1 col-l-22 col-xl-20 offset-xl-2 offset-hg-3 col-hg-18" style=" margin-left: 10%;margin-top:-50px;margin-bottom:120px;">

        <h3 class="gl-vspacing-l" style="padding-left:300px">XẾP HẠNG VÀ ĐÁNH GIÁ</h3>
<?php
$result=mysqli_query($coon, "SELECT * FROM comments WHERE postid='$id'");
//0 should be the current post's id
while ($row=mysqli_fetch_assoc($result))
{
?>
<div class="comment">
<?php echo $row['author']; echo '   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
'.$row['date']; ?>
<p style="width: 1000; height: 45px;     border-style: solid;background-color: #ffffff;line-height: 16px !important;">
<?php echo$row['body']; ?>
</p>
</div>
<?php
}
?>
<h1>Đánh giá *:</h1>
<form action="
<?php if (!empty($_SESSION['email']))
//https://www.w3schools.com/php/func_date_date.asp
echo 'insertcomment.php?id='.$id.'&date='.date("Y-m-d");
else echo '/vn/myaccount/login/';
?>
" method="post">
<!-- Here the shit they must fill out -->
<input required="required" id="myInput" oninput="myFunctionn()" type="text" name="body" autocomplete="off" minlength="50" style="width: 818; height: 45px;



resize: none;
border-style: solid;background-color: #ffffff;line-height: 16px !important;
height: 45px;
    line-height: 1.28571;
    color: #363738;
    border-color: #c8cbcc;
    font-size: 14px;
    padding: 9px 0;
    border-width: 0 0 1px 0;
    outline: 0;
" >  <!--pattern=".{50,}"-->


<script>
function myFunctionn() {
    var x = document.getElementById("myInput").value;
    if (x.length == 0 ) {
        document.getElementById("demo").removeAttribute("style");
        document.getElementById("demo").innerHTML = 'Bài đánh giá của bạn phải có ít nhất 50 ký tự.';
    }
    if (x.length > 0 && x.length <50 ) {
    document.getElementById("demo").removeAttribute("style");
    document.getElementById("demo").innerHTML = 'Các ký tự bắt buộc tối thiểu còn lại ' + (50 - x.length) + '.';}
    if (x.length >= 50 ) {
        document.getElementById("demo").innerHTML = '&#10003; Đã đạt đến mức tối thiểu.';
        document.getElementById("demo").setAttribute("style", "color:green");
    }
}
</script>
<button type="submit" value="Submit" name="Submit" style="background: #0286cd url(button_bg.png) no-repeat scroll 87% center!important;

text-align: center;
    padding: 0 50px 0 15px !important;
    cursor: pointer;
    line-height: 42px;
    background-size: 16px 14px !important;
    width: auto !important;"><span style="color: #ffff; font-weight: bold;text-transform: uppercase;font-size: 16px;">GỬI ĐÁNH GIÁ</span></button>
</form>
<div id="demo">Bài đánh giá của bạn phải có ít nhất 50 ký tự.</div>
</div>

<!-------------------------------------------------------------------------------------------------->

        <div w3-include-html="/vn/include/footer.html"></div>

                <script>
                  includeHTML();
                </script>

            </body>
            </html>
