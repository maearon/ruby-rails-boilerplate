<?php


//http://lamwebbanhang.blogspot.com/2016/06/phan-17-lam-phan-tim-kiem-san-pham.html
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

  /*
  The explode() function breaks a string into an array.
  Hàm explode () phá vỡ một chuỗi thành một mảng.
  explode(separator,string,limit)
  Parameter Tham số
  separator phân cách
  string chuỗi
  limit giới hạn
  limit	Optional. Specifies the number of array elements to return.
  Không bắt buộc. Chỉ định số phần tử mảng để trả về.

$str = 'one,two,three,four';
printvà echo
var_dump hiển thị chi tiết biến thường hữu ích hơn print_r
print_r hiển thị biến theo cách mà con người có thể đọc được.

Greater than 0 - Returns an array with a maximum of limit element(s)
Lớn hơn 0 - Trả về mảng có tối đa (các) phần tử giới hạn
print_r(explode(',',$str,2));
Array ( [0] => one [1] => two,three,four )

Less than 0 - Returns an array except for the last -limit elements()
Ít hơn 0 - Trả về một mảng ngoại trừ các phần tử cuối cùng ()
print_r(explode(',',$str,-1));
Array ( [0] => one [1] => two [2] => three )

0 - Returns an array with one element
0 - Trả về một mảng với một phần tử
print_r(explode(',',$str,0));
Array ( [0] => one,two,three,four )
*/

  $m=explode(" ",$_GET['q']);
        $chuoi_tim_sql="";
        for($i=0;$i<count($m);$i++) //chạy từ 0 đến số phần tử mảng m - 1
        {
            /*PHP trim() Function
            trim(string,charlist) sửa sang chuỗi */
            $tu=trim($m[$i]);
            if($tu!="")
      {

        $chuoi_tim_sql=$chuoi_tim_sql." TENSP like '%".$tu."%' or";

        if(strcasecmp($tu,"men")==0 || strcasecmp($tu,"women")==0 || strcasecmp($tu,"boys")==0 || strcasecmp($tu,"girls")==0 || strcasecmp($tu,"kids")==0) {
          $GENDER="$tu";
          $chuoi_san_pham=$chuoi_san_pham."-".strtolower($tu);
        }

          if(strcasecmp($tu,"deerupt")==0 || strcasecmp($tu,"nmd")==0 || strcasecmp($tu,"ultraboost")==0 || strcasecmp($tu,"arkyn")==0
          || strcasecmp($tu,"superstar")==0 || strcasecmp($tu,"alphabounce")==0 || strcasecmp($tu,"pureboost")==0
          || strcasecmp($tu,"Predator")==0 || strcasecmp($tu,"X")==0 || strcasecmp($tu,"nemeziz")==0 || strcasecmp($tu,"copa")==0 || strcasecmp($tu,"crazy_explosive")==0
          || strcasecmp($tu,"stan_smith")==0 || strcasecmp($tu,"zne")==0 || strcasecmp($tu,"zne")==0 || strcasecmp($tu,"eqt")==0 || strcasecmp($tu,"gazelle")==0 || strcasecmp($tu,"campus")==0
          || strcasecmp($tu,"tubular")==0 || strcasecmp($tu,"iconics")==0 || strcasecmp($tu,"adicolor")==0 || strcasecmp($tu,"i_5923")==0
          || strcasecmp($tu,"swift")==0 || strcasecmp($tu,"spzl")==0 || strcasecmp($tu,"adilaette")==0 || strcasecmp($tu,"adizero")==0
          || strcasecmp($tu,"supernova")==0 || strcasecmp($tu,"mad")==0 || strcasecmp($tu,"podsystem")==0) {
            $FRANCHISE="$tu";
            $chuoi_san_pham=$chuoi_san_pham."-".strtolower($tu);
          }

          if(strcasecmp($tu,"originals")==0 || strcasecmp($tu,"athletics")==0 || strcasecmp($tu,"essentials")==0) {
            $BRAND="$tu";
            $chuoi_san_pham=$chuoi_san_pham."-".strtolower($tu);
          }

          if(strcasecmp($tu,"running")==0 || strcasecmp($tu,"soccer")==0 || strcasecmp($tu,"basketball")==0 || strcasecmp($tu,"training")==0
          || strcasecmp($tu,"football")==0 || strcasecmp($tu,"outdoor")==0 || strcasecmp($tu,"tennis")==0
          || strcasecmp($tu,"skateboarding")==0 || strcasecmp($tu,"baseball")==0 || strcasecmp($tu,"weightlifting")==0 || strcasecmp($tu,"golf")==0
          || strcasecmp($tu,"hockey")==0 || strcasecmp($tu,"lacrosse")==0 || strcasecmp($tu,"yoga")==0 || strcasecmp($tu,"volleyball")==0) {
            $SPORTS="$tu";
            $chuoi_san_pham=$chuoi_san_pham."-".strtolower($tu);
          }

          if(strcasecmp($tu,"cleat")==0 || strcasecmp($tu,"slides")==0 || strcasecmp($tu,"hoodies_sweatshirts")==0
          || strcasecmp($tu,"jackets")==0 || strcasecmp($tu,"short_sleeve_shirts")==0 || strcasecmp($tu,"t_shirts")==0
          || strcasecmp($tu,"long_sleeve_shirts")==0 || strcasecmp($tu,"jerseys")==0 || strcasecmp($tu,"tights")==0
          || strcasecmp($tu,"shorts")==0 || strcasecmp($tu,"tank_tops")==0 || strcasecmp($tu,"underwear")==0
          || strcasecmp($tu,"bags")==0 || strcasecmp($tu,"hats")==0 || strcasecmp($tu,"socks")==0|| strcasecmp($tu,"phone_case")==0
          || strcasecmp($tu,"sunglasses")==0
          || strcasecmp($tu,"balls")==0 || strcasecmp($tu,"watches")==0 || strcasecmp($tu,"gloves")==0 || strcasecmp($tu,"scarves")==0 || strcasecmp($tu,"")==0
          || strcasecmp($tu,"pants")==0 || strcasecmp($tu,"bras")==0 || strcasecmp($tu,"dresses_and_skirts")==0 || strcasecmp($tu,"t_shirts")==0 || strcasecmp($tu,"headbands")==0 || strcasecmp($tu,"beanie")==0) {
            $PRODUCTTYPE="$tu";
            $chuoi_san_pham=$chuoi_san_pham."-".strtolower($tu);
          }


          if(strcasecmp($tu,"shoes")==0 || strcasecmp($tu,"compression")==0 || strcasecmp($tu,"accessories")==0 || strcasecmp($tu,"apparel")==0 || strcasecmp($tu,"polo")==0) {
            $CATEGORY="$tu";
            $chuoi_san_pham=$chuoi_san_pham."-".strtolower($tu);
          }

          if(strcasecmp($tu,"customizable")==0) {
            $MIADIDAS="$tu";
            $chuoi_san_pham=$chuoi_san_pham."-".strtolower($tu);
          }

          if(strcasecmp($tu,"arizona_state_university")==0) {
            $MIADIDAS="$tu";
            $chuoi_san_pham=$chuoi_san_pham."-".strtolower($tu);
          }

          if(strcasecmp($tu,"wanderlust")==0 || strcasecmp($tu,"reigning_champ")==0 || strcasecmp($tu,"adidas_by_stella_mccartney")==0) {
            $PARNER="$tu";
            $chuoi_san_pham=$chuoi_san_pham."-".strtolower($tu);
          }

          if(strcasecmp($tu,"youth")==0 || strcasecmp($tu,"children")==0 || strcasecmp($tu,"infant_toddler")==0) {
          $AGE="$tu";
          $chuoi_san_pham=$chuoi_san_pham."-".strtolower($tu);
          }

          if(strcasecmp($tu,"james_harden")==0 || strcasecmp($tu,"damian_lillard")==0) {
            $ATHLETE=$tu;
            $chuoi_san_pham=$chuoi_san_pham."-".strtolower($tu);
            }
          if(strcasecmp($tu,"adizero_5_star")==0 || strcasecmp($tu,"ultraboost_4.0")==0) {
            $SUBFRANCHISE=$tu;
            $chuoi_san_pham=$chuoi_san_pham."-".strtolower($tu);
          }
          if(strcasecmp($tu,"sale")==0) {
            $SALE=$tu;
            $chuoi_san_pham=$chuoi_san_pham."-".strtolower($tu);
          }
          if(strcasecmp($tu,"track_suits")==0) {
            $PRODUCTTYPE="$tu";
            $chuoi_san_pham=$chuoi_san_pham."-".strtolower($tu);
          }
          if(strcasecmp($tu,"yoga")==0) {
            $SPORTS="$tu";
            $chuoi_san_pham=$chuoi_san_pham."-".strtolower($tu);
          }


          /*
          https://www.w3schools.com/sql/sql_like.asp có thể dùng NOT LIKE
          $sql="SELECT count(IDSP) as total FROM sanpham WHERE TENSP like 'CHUOI' and";
          */
      }
  }


        $m_2=explode(" ",$chuoi_tim_sql);
        $chuoi_tim_sql_2="";
        for($i=0;$i<count($m_2)-1;$i++)
        {
            $chuoi_tim_sql_2=$chuoi_tim_sql_2.$m_2[$i]." ";
        }



  $sql="SELECT count(IDSP) as total FROM sanpham WHERE $chuoi_tim_sql_2";
  $result=mysqli_query($conn,$sql);



	$row=mysqli_fetch_assoc($result);
  $total_records=$row[ 'total'];

  if (!empty ($chuoi_san_pham))
  header("location:/vn/?$chuoi_san_pham");



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
	$sql="SELECT * FROM sanpham WHERE $chuoi_tim_sql_2 ORDER BY IDSP LIMIT $start, $limit";
	$result=mysqli_query($conn,$sql);
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
<!--Ví dụ 4 - Làm mới tài liệu sau mỗi 30 giây:-->
<meta http-equiv="refresh" content="30">
<!--Ví dụ 5 - Đặt chế độ xem để làm cho trang web của bạn trông đẹp trên tất cả các thiết bị:-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="/css/foundation.css"> <!-- css chung -->
<link rel="stylesheet" href="/css/menu.css"> <!-- css cho menu -->
<link rel="stylesheet" href="/css/animatedSearchBar.css"> <!-- css cho thanh tìm kiếm linh hoạt-->
<link rel="stylesheet" href="/css/product/products.css"> <!-- css cho nhieu sanpham -->
<link rel="stylesheet" href="/css/search/search.css"> <!-- css cho slideshow -->
<link rel="stylesheet" href="/css/slideshow.css"> <!-- css cho slideshow -->
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
</div>

<div id="topdivv">

</div>


<div id="page_info_top">
<span data-context="plp_wallpaper:off"></span>
<div class="pageinfotop-wrapper">
<div id="breadcrumbs">
	<ul id="product-breadcrumb" class="breadcrumbs clearfix " data-component="product/ProductBreadCrumb" data-scope="breadcrumbs">
		<li class="back">
			<a href="#" id="product-back" title="Trở lại"  onclick="goBack()"><!--[if IE 7]><span class="breadcrumb-icon"></span><![endif]-->Trở lại</a>
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

				<a href="/" itemprop="url" title="Trang chủ">Trang chủ</a>
			</li>



			<li data-context="search results">
				<span class="divider">/</span>Kết quả tìm kiếm của bạn cho: <a href="/vn/search?q=<?php echo $_GET['q']?>" title="<?php echo $_GET['q']?>"><?php echo $_GET['q']?>(<?php if(!empty ($total_records)) echo $total_records; else echo '0';?>)</a>
			</li>
	</ul>
</div>
<br>
<div class="page-heading">
<div class="rbk-page-heading">
<div class="rbk-heading-wrapper clearfix">
<div class="search_results_switch_bar clearfix">
	<h3>
		<span class="rbk-search-title search-title">&nbsp;kết quả tìm kiếm cho </span>
		<span class="rbk-search-value search-value"><?php echo $_GET['q']?></span>
		<span class="search-count">(<?php if(!empty ($total_records)) echo $total_records; else echo '0';?> Sản Phẩm)</span>
	</h3>
</div>

</div>
</div>
</div>

</div>


</div>

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
    if(!empty($total_page)) {while ($row=mysqli_fetch_assoc($result))
{ // Mở PHP
		$giaban=$row['GIABAN'];
		$giagoc=$row['GIAGOC'];
?>
<a href="/vn/product/?slot=<?php echo $row['IDSP'] ?>">
<div class="product">
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
