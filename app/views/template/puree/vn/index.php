<?php
echo ("<br>");
/*
men->jerseys
echo $_SERVER['REQUEST_URI'];
echo ("<br>");
echo $tu;
echo ("<br>");
  echo var_dump($m);
  echo ("<br>");
  echo $chuoi_tim_sql;
  echo ("<br>");
  echo $chuoi_tim_sql_2;


INSERT INTO
`sanpham`(`TENSP`,`ANH`, `ANHHOVER`, `ANHCHITIET`, `GENDER`, `GIABAN`,`PRODUCTTYPE`)
VALUES
('','',''
,'','men','','jerseys')


*/
  // Tách các từ cần truy vấn ngăn cách bởi -
  // dạng array(2) { [0]=> string(3) "men" [1]=> string(5) "pants" }


  $m=explode("-",substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '?') + 1));
  // Biến toàn cục https://www.w3schools.com/php/php_superglobals.asp
  // Tạo chuỗi truy vấn dạng TENSP like 'men' and TENSP like 'pants' and
  $chuoi_tim_sql="";
  for($i=0;$i<count($m);$i++) //chạy từ 0 đến số phần tử mảng m - 1
  {
      /*PHP trim() Function
      trim(string,charlist) sửa sang chuỗi */
      $tu=trim($m[$i]);
      if($tu!="")
      {

        if($tu=="new_arrivals")  {
          $NEW="$tu";
        }

        if($tu=="men" || $tu=="women" || $tu=="boys" || $tu=="girls" || $tu=="kids")  {
          $GENDER="$tu";
        }

          if($tu=="deerupt" || $tu=="nmd" || $tu=="ultraboost" || $tu=="arkyn"
          || $tu=="superstar" || $tu=="alphabounce" || $tu=="pureboost"
          || $tu=="Predator" || $tu=="X" || $tu=="nemeziz" || $tu=="copa" || $tu=="crazy_explosive"
          || $tu=="stan_smith" || $tu=="zne" || $tu=="eqt" || $tu=="gazelle" || $tu=="campus"
          || $tu=="tubular" || $tu=="iconics" || $tu=="adicolor" || $tu=="i_5923"
          || $tu=="swift" || $tu=="spzl" || $tu=="adilaette" || $tu=="adizero"
          || $tu=="supernova" || $tu=="mad" || $tu=="podsystem")  {
            $FRANCHISE="$tu";

            $chuoi_tim_sql=$chuoi_tim_sql." FRANCHISE like '".$tu."' and";
            //NHƯỢNG QUYỀN THƯƠNG MẠI
          }

          if($tu=="originals" || $tu=="athletics" || $tu=="essentials")  {
            $BRAND="$tu";

            $chuoi_tim_sql=$chuoi_tim_sql." BRAND like '".$tu."' and";
            //$BRAND=$_GET['BRAND'];NHÃN HIỆU
          }

          if($tu=="running" || $tu=="soccer" || $tu=="basketball" || $tu=="training"
          || $tu=="football" || $tu=="outdoor" || $tu=="tennis"
          || $tu=="skateboarding" || $tu=="baseball" || $tu=="weightlifting" || $tu=="golf"
          || $tu=="hockey" || $tu=="lacrosse" || $tu=="yoga" || $tu=="volleyball")  {
            $SPORTS="$tu";

            $chuoi_tim_sql=$chuoi_tim_sql." SPORTS like '".$tu."' and";
            //$SPORTS=$_GET['SPORTS'];MÔN THỂ THAO
          }

          if($tu=="cleat" || $tu=="slides" || $tu=="hoodies_sweatshirts" || $tu=="jackets"
          || $tu=="short_sleeve_shirts" || $tu=="t_shirts"
          || $tu=="long_sleeve_shirts" || $tu=="jerseys" || $tu=="tights"
          || $tu=="shorts" || $tu=="tank_tops" || $tu=="underwear"
          || $tu=="bags" || $tu=="hats"|| $tu=="socks"|| $tu=="phone_case"|| $tu=="sunglasses"
          || $tu=="balls" || $tu=="watches" || $tu=="gloves" || $tu=="scarves" || $tu==""
          || $tu=="pants" || $tu=="bras" || $tu=="dresses_and_skirts" || $tu=="t_shirts" || $tu=="headbands" || $tu=="beanie")  {
            $PRODUCTTYPE="$tu";

            $chuoi_tim_sql=$chuoi_tim_sql." PRODUCTTYPE like '".$tu."' and";
            //$PRODUCTTYPE=$_GET['PRODUCTTYPE']; LOẠI SẢN PHẨM
          }


          if($tu=="shoes" || $tu=="compression" || $tu=="accessories" || $tu=="apparel" || $tu=="polo")  {
            $CATEGORY="$tu";
            $chuoi_tim_sql=$chuoi_tim_sql." CATEGORY like '".$tu."' and";
            //$CATEGORY=$_GET['CATEGORY'];HẠNG MỤC
          }

          if($tu=="customizable")  {
            $MIADIDAS="$tu";

            $chuoi_tim_sql=$chuoi_tim_sql." MIADIDAS like '".$tu."' and";
            //$MIADIDAS=$_GET['MIADIDAS'];
          }

          if($tu=="arizona_state_university")  {
            $MIADIDAS="$tu";

            $chuoi_tim_sql=$chuoi_tim_sql." TEAMNAME like '".$tu."' and";
            //$MIADIDAS=$_GET['MIADIDAS'];
          }

          if($tu=="wanderlust" || $tu=="reigning_champ" || $tu=="adidas_by_stella_mccartney")  {
            $PARNER="$tu";

            $chuoi_tim_sql=$chuoi_tim_sql." PARNER like '".$tu."' and";
            //$PARNER=$_GET['PARNER'];ĐỐI TÁC
          }

          if($tu=="youth" || $tu=="children" || $tu=="infant_toddler")  {
          $AGE="$tu";

          $chuoi_tim_sql=$chuoi_tim_sql." AGE like '".$tu."' and";
          //TUỔI
          }

          if($tu=="james_harden" || $tu=="damian_lillard")  {
            $ATHLETE=$tu;

            $chuoi_tim_sql=$chuoi_tim_sql." ATHLETE like '".$tu."' and";
            //VẬN ĐỘNG VIÊN
            }
          if($tu=="adizero_5_star" || $tu=="ultraboost_4.0")  {
            $SUBFRANCHISE=$tu;

            $chuoi_tim_sql=$chuoi_tim_sql." SUBFRANCHISE like '".$tu."' and";
          }
          if($tu=="sale")  {
            $SALE=$tu;

            $chuoi_tim_sql=$chuoi_tim_sql." SALE like '".$tu."' and";
          }
          if($tu=="track_suits")  {
            $PRODUCTTYPE="$tu";
          }
          if($tu=="yoga")  {
            $SPORTS="$tu";
          }


          /*
          https://www.w3schools.com/sql/sql_like.asp có thể dùng NOT LIKE
          $sql="SELECT count(IDSP) as total FROM sanpham WHERE TENSP like 'CHUOI' and";
          */
      }
  }
  if(!empty($PRODUCTTYPE) && $PRODUCTTYPE=="track_suits")  {
    $chuoidau=$chuoi_tim_sql;
    $chuoi_tim_sql=$chuoidau." PRODUCTTYPE like 'pants' or ";
    $chuoi_tim_sql=$chuoi_tim_sql.$chuoidau." PRODUCTTYPE like 'jackets' and";
    //$PRODUCTTYPE=$_GET['PRODUCTTYPE']; LOẠI SẢN PHẨM
  }
  if(!empty($SPORTS) && $SPORTS=="yoga")  {
    $chuoidau=$chuoi_tim_sql;
    $chuoi_tim_sql=$chuoidau." CATEGORY like 'compression' or ";
    $chuoi_tim_sql=$chuoi_tim_sql.$chuoidau." PRODUCTTYPE like 'shorts' or";
    $chuoi_tim_sql=$chuoi_tim_sql.$chuoidau." PRODUCTTYPE like 'jackets' or";
    $chuoi_tim_sql=$chuoi_tim_sql.$chuoidau." PRODUCTTYPE like 'short_sleeve_shirts' or";
    $chuoi_tim_sql=$chuoi_tim_sql.$chuoidau." PRODUCTTYPE like 'long_sleeve_shirts' or";
    $chuoi_tim_sql=$chuoi_tim_sql.$chuoidau." PRODUCTTYPE like 'tank_tops' and";

    //$PRODUCTTYPE=$_GET['PRODUCTTYPE']; LOẠI SẢN PHẨM
  }
  if(!empty($CATEGORY) && $CATEGORY=="polo")  {
    $CATEGORY=$CATEGORY."s";
    //$PRODUCTTYPE=$_GET['PRODUCTTYPE']; LOẠI SẢN PHẨM
  }
  if(!empty ($GENDER)){
  if($GENDER=="men" || $GENDER=="women")  {
    $chuoidau=$chuoi_tim_sql;

    $chuoi_tim_sql=$chuoi_tim_sql." GENDER like '".$GENDER."' or ";
    $chuoi_tim_sql=$chuoi_tim_sql.$chuoidau." GENDER like '' and";
    //$GENDER=$_GET['GENDER'];GIỚI TÍNH
  }

  if($GENDER=="boys" || $GENDER=="girls")  {
    $chuoidau=$chuoi_tim_sql;

    $chuoi_tim_sql=$chuoi_tim_sql." GENDER like '".$GENDER."' or ";
    $chuoi_tim_sql=$chuoi_tim_sql.$chuoidau." GENDER like 'kids' and";
    //$GENDER=$_GET['GENDER'];GIỚI TÍNH
  }

  if($GENDER=="kids")  {
    $chuoidau=$chuoi_tim_sql;
    $chuoi_tim_sql=$chuoi_tim_sql." GENDER like 'boys' or ";
    $chuoi_tim_sql=$chuoi_tim_sql.$chuoidau." GENDER like 'girls' or ";
    $chuoi_tim_sql=$chuoi_tim_sql.$chuoidau." GENDER like 'kids' and";
    //$GENDER=$_GET['GENDER'];GIỚI TÍNH
  }}
  // Tạo chuỗi truy vấn dạng TENSP like 'men' and TENSP like 'pants'
  $m_2=explode(" ",$chuoi_tim_sql);
  $chuoi_tim_sql_2="";
  for($i=0;$i<count($m_2)-1;$i++)
  {
      $chuoi_tim_sql_2=$chuoi_tim_sql_2.$m_2[$i]." ";
  }
  /*$GENDER=$_GET['GENDER'];*/
  /*$FRANCHISE=$_GET['FRANCHISE'];
  $BRAND=$_GET['BRAND'];
  $SPORTS=$_GET['SPORTS'];
  $PRODUCTTYPE=$_GET['PRODUCTTYPE'];
  $CATEGORY=$_GET['CATEGORY'];
  $MIADIDAS=$_GET['MIADIDAS'];
  $PARNER=$_GET['PARNER'];*/

	// PHẦN XỬ LÝ PHP
	// BƯỚC 1: KẾT NỐI CSDL
	$conn=mysqli_connect( "localhost", "id11399066_root", "password", "id11399066_adidas");
	mysqli_query($conn, "SET NAMES utf8");
	// BƯỚC 2: TÌM TỔNG SỐ RECORDS
  //$result=mysqli_query($conn, 'select count(idsp) as total from sanpham');

  $sql="SELECT count(IDSP) as total FROM sanpham WHERE $chuoi_tim_sql_2";
  $result=mysqli_query($conn,$sql);


	$row=mysqli_fetch_assoc($result);
  $total_records=$row[ 'total'];



	// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
	$current_page=isset($_GET[ 'page']) ? $_GET[ 'page'] : 1; $limit=48 ;
	// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
	// tổng số trang
	$total_page=ceil($total_records / $limit);
	// Giới hạn current_page trong khoảng 1 đến total_page
	if ($current_page> $total_page){ $current_page = $total_page; } else if ($current_page
    < 1){ $current_page=1 ; }
	// Tìm Start
	$start = ($current_page - 1) * $limit;
	// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
	// Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
	$sql="SELECT * FROM sanpham WHERE $chuoi_tim_sql_2 ORDER BY TENSP ASC LIMIT $start, $limit";
	$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">

<title><?php
if(!empty ($UNISEX)) echo $UNISEX.' ';
if(!empty ($GENDER)) echo $GENDER.' ';
if(!empty ($AGE))echo $AGE.' ';
if(!empty ($FRANCHISE))echo $FRANCHISE.' ';
if(!empty ($BRAND))echo $BRAND.' ';
if(!empty ($SPORTS))echo $SPORTS.' ';
if(!empty ($PRODUCTTYPE))echo $PRODUCTTYPE.' ';
if(!empty ($PARNER))echo $PARNER.' ';
if(!empty ($CATEGORY))echo $CATEGORY.' ';
if(!empty ($MIADIDAS)) echo $MIADIDAS.' ';
if(!empty ($SALE)) echo $SALE.' ';
?> | adidas VN</title>

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
<link rel="stylesheet" href="/css/slideshow.css"> <!-- css cho slideshow -->
<link rel="stylesheet" href="/css/calloutbar.css"> <!-- css cho o goi lai -->
<link rel="stylesheet" href="/css/include/breadcrumbproducts.css">
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









  <div class="rbk-page-info-top-holder">
	  <div class="pageinfotop-wrapper ">
			<div id="breadcrumbs">
	      <ul id="product-breadcrumb" class="breadcrumbs clearfix " data-component="product/ProductBreadCrumb" data-scope="breadcrumbs">

		      <li class="back">
			<a id="product-back" class="icon-arrow-left-circle" title="Trở lại"  onclick="goBack()">
      &#10096;Trở lại
      </a>
		</li>

<script>
function goBack() {
    window.history.back();
}
</script>
    <script>
function goBack() {
    window.history.back();
}
</script>


			<li class="home" data-context="home">
				<span class="divider">|</span>
				<a href="/" itemprop="url" title="Trang chủ">Trang chủ</a>
			</li>











<?php if(!empty ($GENDER))
echo '
							<li>
								<span class="divider">/</span>

									<span data-context="'.$GENDER.'">


                    <a href="/vn/?'.$GENDER.'" itemprop="url" title="'.$GENDER.'">'.$GENDER.'</a>


									</span>

              </li> '

?>


<?php if(!empty ($AGE))
echo '
							<li>
								<span class="divider">/</span>

									<span data-context="'.$AGE.'">


                  <a href="/vn/?'.$AGE.'" itemprop="url" title="'.$AGE.'">'.$AGE.'</a>


									</span>

              </li> '

?>

<?php if(!empty ($FRANCHISE))
echo '
							<li>
								<span class="divider">/</span>

									<span data-context="'.$FRANCHISE.'">


                  <a href="/vn/?'.$FRANCHISE.'" itemprop="url" title="'.$FRANCHISE.'">'.$FRANCHISE.'</a>


									</span>

              </li> '

?>

<?php if(!empty ($BRAND))
echo '
							<li>
								<span class="divider">/</span>

									<span data-context="'.$BRAND.'">


                  <a href="/vn/?'.$BRAND.'" itemprop="url" title="'.$BRAND.'">'.$BRAND.'</a>


									</span>

              </li> '

?>

<?php if(!empty ($SPORTS))
echo '
							<li>
								<span class="divider">/</span>

									<span data-context="'.$SPORTS.'">


                  <a href="/vn/?'.$SPORTS.'" itemprop="url" title="'.$SPORTS.'">'.$SPORTS.'</a>


									</span>

              </li> '

?>

<?php if(!empty ($PRODUCTTYPE))
echo '
							<li>
								<span class="divider">/</span>

									<span data-context="'.$PRODUCTTYPE.'">


                  <a href="/vn/?'.$PRODUCTTYPE.'" itemprop="url" title="'.$PRODUCTTYPE.'">'.$PRODUCTTYPE.'</a>


									</span>

              </li> '

?>

<?php if(!empty ($PARNER))
echo '
							<li>
								<span class="divider">/</span>

									<span data-context="'.$PARNER.'">


                  <a href="/vn/?'.$PARNER.'" itemprop="url" title="'.$PARNER.'">'.$PARNER.'</a>


									</span>

              </li> '

?>

<?php if(!empty ($CATEGORY))
echo '
							<li>
								<span class="divider">/</span>

									<span data-context="'.$CATEGORY.'">


                  <a href="/vn/?'.$CATEGORY.'" itemprop="url" title="'.$CATEGORY.'">'.$CATEGORY.'</a>


									</span>

              </li> '

?>

<?php if(!empty ($MIADIDAS))
echo '
							<li>
								<span class="divider">/</span>

									<span data-context="'.$MIADIDAS.'">


                  <a href="/vn/?'.$MIADIDAS.'" itemprop="url" title="'.$MIADIDAS.'">'.$MIADIDAS.'</a>


									</span>

              </li> '

?>

<?php if(!empty ($SALE))
echo '
							<li>
								<span class="divider">/</span>

									<span data-context="'.$SALE.'">


                  <a href="/vn/?'.$SALE.'" itemprop="url" title="'.$SALE.'">'.$SALE.'</a>


									</span>

              </li> '

?>

<!--GENDER AGE FRANCHISE BRAND SPORTS PRODUCTTYPE PARNER CATEGORY MIADIDAS-->






	</ul>


			</div>

<br>
		<div class="page-heading clearfix">
			<div class="rbk-page-heading">
				<div class="rbk-heading-wrapper">

        <h1>
        <?php
        if(!empty ($GENDER)) echo $GENDER;
        if(!empty ($AGE)) echo ' • '.$AGE;
        if(!empty ($FRANCHISE))echo ' • '.$FRANCHISE;
        if(!empty ($BRAND))echo ' • '.$BRAND;
        if(!empty ($SPORTS))echo ' • '.$SPORTS;
        if(!empty ($PRODUCTTYPE))echo ' • '.$PRODUCTTYPE;
        if(!empty ($PARNER))echo $PARNER;
        if(!empty ($CATEGORY))echo ' • '.$CATEGORY;
        if(!empty ($MIADIDAS))echo ' • '.$MIADIDAS;
        if(!empty ($SALE))echo ' • '.$SALE;
        if(!empty ($NEW))echo ' • '.$NEW;
        /*if(!empty ($))echo ' • '.$;
        if(!empty ($))echo ' • '.$;
$FRANCHISE=$_GET['FRANCHISE'];++
  $BRAND=$_GET['BRAND'];
  $SPORTS=$_GET['SPORTS'];
  $PRODUCTTYPE=$_GET['PRODUCTTYPE'];
  $CATEGORY=$_GET['CATEGORY'];
  $MIADIDAS=$_GET['MIADIDAS'];
  $PARNER=$_GET['PARNER'];*/
        ?>
        </h1>
					<p class="count">
<?php
    // PHẦN HIỂN THỊ TIN TỨC
    // BƯỚC 6: HIỂN THỊ sp
if(!empty($NEW)) {while ($row=mysqli_fetch_assoc($result))
{ // Mở PHP
$date1=date_create($row['NGAYPHATHANH']);
$date2=new DateTime();
$diff=date_diff($date1,$date2);
$day=$diff->format("%R%a");
if ($day>31) $total_records-=1;
}}
?>
							(<?php if(!empty ($total_records)) echo $total_records; else echo '0';?> Sản Phẩm)
					</p>
				</div>
			</div>
		</div>

	</div>
</div>





<div style="width: 218px;float:left; padding:10px; margin:50px 10px 10px 80px;position: absolute;background:#eceef0;">
<h3 style="border-bottom: 1px solid #c8cbcc;height: 3em;line-height: 1em;font-weight: bold;font-size: 16px;">LỰA CHỌN CỦA BẠN</h3>
<br>
<br>
<?php
if(!empty ($GENDER)){
if($GENDER=='boys' || $GENDER=='girls' || $GENDER=='kids'){
  echo '<div style="font-size: 13px;float:left">&nbsp;&nbsp;<span style="font-weight: bold;">GIỚI TÍNH</span>:&nbsp;kids</div>';
  echo'<br>';
  echo'<br>';}
if ($GENDER!='kids'){
echo '<div style="font-size: 13px;float:left">&nbsp;&nbsp;<span style="font-weight: bold;">GIỚI TÍNH</span>:&nbsp;'.$GENDER.'</div>';
echo'<br>';
echo'<br>';}}
if(!empty ($AGE)){
echo '<div style="font-size: 13px;float:left">&nbsp;&nbsp;<span style="font-weight: bold;">LỨA TUỔI</span>:&nbsp;'.$AGE.'</div>';
echo'<br>';
echo'<br>';}
if(!empty ($FRANCHISE)){
echo '<div style="font-size: 13px;float:left">&nbsp;&nbsp;<span style="font-weight: bold;">DÒNG</span>:&nbsp;'.$FRANCHISE.'</div>';
echo'<br>';
echo'<br>';}
if(!empty ($BRAND)){
echo '<div style="font-size: 13px;float:left">&nbsp;&nbsp;<span style="font-weight: bold;">NHÃN HIỆU</span>:&nbsp;'.$BRAND.'</div>';
echo'<br>';
echo'<br>';}
if(!empty ($SPORTS)){
echo '<div style="font-size: 13px;float:left">&nbsp;&nbsp;<span style="font-weight: bold;">MÔN</span>:&nbsp;'.$SPORTS.'</div>';
echo'<br>';
echo'<br>';}
if(!empty ($PRODUCTTYPE)){
echo '<div style="font-size: 13px;float:left">&nbsp;&nbsp;<span style="font-weight: bold;">LOẠI SẢN PHẨM</span>:&nbsp;'.$PRODUCTTYPE.'</div>';
echo'<br>';
echo'<br>';}
if(!empty ($PARNER)){
echo '<div style="font-size: 13px;float:left">&nbsp;&nbsp;<span style="font-weight: bold;">ĐỐI TÁC</span>:&nbsp;'.$PARNER.'</div>';
echo'<br>';
echo'<br>';}
if(!empty ($CATEGORY)){
echo '<div style="font-size: 13px;float:left">&nbsp;&nbsp;<span style="font-weight: bold;">DANH MỤC</span>:&nbsp;'.$CATEGORY.'</div>';
echo'<br>';
echo'<br>';}
if(!empty ($MIADIDAS)){
echo '<div style="font-size: 13px;float:left">&nbsp;&nbsp;<span style="font-weight: bold;">MI ADIDAS</span>:&nbsp;'.$MIADIDAS.'</div>';
echo'<br>';
echo'<br>';}
if(!empty ($SALE)){
  echo '<div style="font-size: 13px;float:left">&nbsp;&nbsp;<span style="font-weight: bold;">GIẢM GIÁ</span>:&nbsp;'.$SALE.'</div>';
  echo'<br>';
  echo'<br>';}
?></div>
<main>

<div class="pagination">
<div style="float:left; margin-left:0px">Sắp xếp theo: Tên sản phẩm [A-Z]</div>
<div style="float:left; margin-left:140px">Xem: 48</div>
  Trang:
    	<?php
        // PHẦN HIỂN THỊ PHÂN TRANG
       	// BƯỚC 7: HIỂN THỊ PHÂN TRANG
     // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
        if ($current_page > 1 && $total_page > 1){
        echo '<a href="/vn/?'.($_SERVER['REQUEST_URI']).'&page='.($current_page-1).'" class="page">Trước</a> | ';/*Pre vious*/
        }
 		// Lặp khoảng giữa
        for ($i = 1; $i <= $total_page; $i++){
        // Nếu là trang hiện tại thì hiển thị thẻ span
       	// ngược lại hiển thị thẻ a
        if ($i == $current_page){
        echo '<span class="active">'.$i.'</span> | ';
		}
        else{
        echo '<a href="/vn/?'.($_SERVER['REQUEST_URI']).'&page='.$i.'" class="page">'.$i.'</a> | ';
        }
        }
 		// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
        if ($current_page < $total_page && $total_page > 1){
        echo '<a href="/vn/?'.($_SERVER['REQUEST_URI']).'&page='.($current_page+1).'" class="page">Tiếp</a>';
        }
        ?>
</div>

    	<!-- lặp lấy sản phẩm -->
<?php
		// PHẦN HIỂN THỊ TIN TỨC
		// BƯỚC 6: HIỂN THỊ sp
  $sql="SELECT * FROM sanpham WHERE $chuoi_tim_sql_2 ORDER BY TENSP ASC LIMIT $start, $limit";
  $result=mysqli_query($conn,$sql);


    if(!empty($total_page)) {while ($row=mysqli_fetch_assoc($result))
{ // Mở PHP
		$giaban=$row['GIABAN'];
		$giagoc=$row['GIAGOC'];

    $date1=date_create($row['NGAYPHATHANH']);
$date2=new DateTime();
$diff=date_diff($date1,$date2);
$day=$diff->format("%R%a");

?>
<div style="<?php if (!empty($NEW)&&($day>31)) echo 'display: none;'?>">
<a href="/vn/product/?slot=<?php echo $row['IDSP'] ?>">
<div class="product">

  <div class="gl-product-card">
    <div class="gl-badge gl-badge--small gl-badge--urgent" style="<?php
if (empty($giagoc)&&($day>31)) echo 'display: none;';
?>">
<?php
if ($giaban<$giagoc) echo '-'.(100-$giaban/$giagoc*100).' % ';
if ($day<=31&&$day>=0) echo 'mới';
if ($day<0) echo 'sắp có';
?>
</div>
  </div>

  <img src="/images/<?php echo $row['IDSP']?>/<?php echo $row['ANH'] ?>" alt="memphis" onmouseover="this.src='/images/<?php echo $row['IDSP']?>/<?php echo $row['ANHHOVER'] ?>'" onmouseout="this.src='/images/<?php echo $row['IDSP']?>/<?php echo $row['ANH'] ?>'" title="adidas - <?php echo $row['TENSP'] ?>" >
    <h3 style="border-bottom: 1px solid #c8cbcc;height: 3em;line-height: 1em;"><?php echo $row['TENSP'];?></h3>

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
    <br>
    <h3>
    <span id="red"
        <?php if(!empty($giagoc)) echo "style=\"color: red\""?>>
        <?php  echo number_format($giaban*23000,0,".",","),"₫"?>
        </span><strike><?php if(!empty($giagoc))  echo number_format($giagoc*23000,0,".",","),"₫"?></strike>
    </span></h3>
</div>
</a>
</div>
<?php
}} // Đóng PHP
?>
<div class="pagination">
<div style="float:left; margin-left:0px">Sắp xếp theo: Tên sản phẩm [A-Z]</div>
<div style="float:left; margin-left:140px">Xem: 48</div>
  Trang:
    	<?php
        // PHẦN HIỂN THỊ PHÂN TRANG
       	// BƯỚC 7: HIỂN THỊ PHÂN TRANG
     // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
        if ($current_page > 1 && $total_page > 1){
        echo '<a href="/vn/?'.($_SERVER['REQUEST_URI']).'&page='.($current_page-1).'" class="page">Trước</a> | ';/*Pre vious*/
        }
 		// Lặp khoảng giữa
        for ($i = 1; $i <= $total_page; $i++){
        // Nếu là trang hiện tại thì hiển thị thẻ span
       	// ngược lại hiển thị thẻ a
        if ($i == $current_page){
        echo '<span class="active">'.$i.'</span> | ';
		}
        else{
        echo '<a href="/vn/?'.($_SERVER['REQUEST_URI']).'&page='.$i.'" class="page">'.$i.'</a> | ';
        }
        }
 		// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
        if ($current_page < $total_page && $total_page > 1){
        echo '<a href="/vn/?'.($_SERVER['REQUEST_URI']).'&page='.($current_page+1).'" class="page">Tiếp</a>';
        }
        ?>
</div>

</main>

<div w3-include-html="/vn/include/footer.html"></div>

        <script>
          includeHTML();
        </script>

    </body>
    </html>
