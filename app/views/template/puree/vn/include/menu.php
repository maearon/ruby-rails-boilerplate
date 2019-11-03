<?php
session_start();
if(empty ($_SESSION["email"])) {} else {$email=$_SESSION["email"];}
$conn=mysqli_connect( "localhost", "id11399066_root", "password", "id11399066_adidas");
mysqli_query($conn, "SET NAMES utf8");
$conn->query("set names 'utf8'"); $conn->set_charset("utf8");
if(empty ($_SESSION["email"])) {} else {
$result=mysqli_query($conn, "SELECT count(idtrongbangsp) AS total FROM yeuthich WHERE EMAIL='$email'");
$row=mysqli_fetch_assoc($result); $total_records=$row[ 'total'];
}
?>
<div w3-include-html="/vn/include/slidenav.php"></div>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="233485690675732"
  theme_color="#000000"
  logged_in_greeting="CẦN GIÚP ĐỠ? Bắt đầu bằng cách chia sẻ EMAIL của bạn."
  logged_out_greeting="CẦN GIÚP ĐỠ? Bắt đầu bằng cách chia sẻ EMAIL của bạn.">
</div>

<div class="glass-header-top" <?php if(empty ($_SESSION["email"])) echo ''; else echo 'style="display: none"';?>>
  <a href="#">Giúp<!-- --> </a>
  <div class="menu-spacer___3Gp4L"></div>
  <a href="#">theo dõi đơn hàng và trả về<!-- --> </a>
  <div class="menu-spacer___3Gp4L"></div>
  <em><a href="/vn/myaccount/register/">Đăng ký mới<!-- --> </a></em>
  <a href="/vn/myaccount/login/" href="">Đăng nhập<!-- -->
  <span class="login-icon"></span></a>
</div>

<div class="glass-header-top" <?php if(empty ($_SESSION["email"])) echo ' style="display: none"';?>>
<a href="/vn/myaccount/login/login_success.php">tài khoản của tôi<!-- --> </a>
<div class="menu-spacer___3Gp4L"></div>
<a href="/vn/wishlist">danh sách yêu thích<!-- --> </a>
<div class="menu-spacer___3Gp4L"></div>
<a href="#">trạng thái đơn hàng<!-- --> </a>
<em><a class="selfservice-link-login" href="/vn/myaccount/login/login_success.php" title="Tài Khoản Của Tôi <?php echo $_SESSION["name"];?>">Chào mừng trở lại <?php echo $_SESSION["name"];?>
<span class="login-icon"></span></a></em>
</div>

<div id="logo"><a href="/"><img src="/images/0/img/logo.png" style="float: left; position: absolute; margin-left: 65px;"></a></div>
<img src="/images/0/img/header-shadow-img.png" style="vertical-align: middle;width: 100%; max-height: 30px;" >
<!-- ---------------------------------------------------------------------------------------------------------------------------- -->
<div class="menu">
<ul>
<li class="dropdown">
  <a href="/vn/?men-grid=true" class="dropbtn" class="label">NAM</a>
  <div class="dropdown-content">
    <div class="col-container">

      <div class="col"> <!-- cột 1 menu 1 -->
        <a style="text-decoration: none"><h2>NỔI BẬT</h2></a>
        <a href="/vn/?men-new_arrivals">Hàng Mới Về</a>
        <a href="/vn/?men-best-seller">Bán Chạy Nhất</a>
        <a href="/vn/?men-release-dates">Ngày Phát Hành</a>
        <a href="/vn/?men-sale" style="font-weight: bold; text-transform: uppercase;">GIẢM GIÁ</a>
        <br/>
        <br/>
        <a href="/vn/?men-podsystem">P.O.D.System</a>
        <a href="/vn/?men-adicolor">adicolor</a>
        <a href="/vn/?men-ultraboost">ultraboost</a>
        <a href="/vn/?men-work_out_essentials">Workout Essentials</a>
        <a href="/vn/?men-back_to_school">Back to School</a>
      </div>

      <div class="col"> <!-- cột 2 menu 1 -->
        <a style="text-decoration: none"><h2>GIÀY</h2></a>
        <a href="/vn/?men-originals-shoes">Bản Gốc</a>
        <a href="/vn/?men-running-shoes">Chạy</a>
        <a href="/vn/?men-soccer-shoes">Bóng Đá</a>
        <a href="/vn/?men-basketball-shoes">Bóng Rổ</a>
        <a href="/vn/?men-training-shoes">Luyện Tập</a>
        <a href="/vn/?men-cleats-football">Bóng Bầu Dục</a><!--Dày Đinh-->
        <a href="/vn/?men-slides">Dép Quai - Dép Lê</a><!--Dép Lê-->
        <a href="/vn/?men-outdoor-shoes">Đi Bộ Đường Dài</a>
        <a href="/vn/?men-tennis-shoes">Quần vợt</a>
        <a href="/vn/?skateboarding-shoes">Trượt Ván</a>
        <a href="/vn/?men-baseball-shoes">Bóng Chày</a>
        <a href="/vn/?men-golf-shoes">golf</a>
        <a href="/vn/?men-customizable">Tùy Chỉnh với miakat</a>
        <a href="/vn/?men-shoes-sale">Giày Giảm Giá</a>
      </div>

      <div class="col"> <!-- cột 3 menu 1 -->
        <a style="text-decoration: none"><h2>QUẦN ÁO</h2></a>
        <a href="/vn/?men-pants">Quần Dài</a>
        <a href="/vn/?men-hoodies_sweatshirts">Hoodies - áo nỉ</a>
        <a href="/vn/?men-jackets">Áo khoác</a>
        <a href="/vn/?men-track_suits">Đồ Ra Đường</a>
        <a href="/vn/?men-short_sleeve_shirts">Áo sơ mi ngắn tay</a>
        <a href="/vn/?men-t_shirts">Graphic T-Shirts</a>
        <a href="/vn/?men-long_sleeve_shirts">Áo sơ mi dài tay</a>
        <a href="/vn/?men-polo">polos</a> <!-- Mã Cầu-->
        <a href="/vn/?men-jerseys">Jerseys</a> <!-- Áo Nịt Len-->
        <a href="/vn/?men-compression">compression</a> <!-- Bó-->
        <a href="/vn/?men-tights">Quần Bó</a>
        <a href="/vn/?men-shorts">shorts</a>
        <a href="/vn/?men-tank_tops">Áo Ba Lỗ</a>
        <a href="/vn/?men-underwear">Đồ Lót</a>
        <a href="/vn/?men-apparel-sale">Quần Áo Giảm Giá</a>
      </div>

      <div class="col"> <!-- cột 4 menu 1 -->
        <a style="text-decoration: none"><h2>PHỤ KIỆN</h2></a>
        <a href="/vn/?men-bags">Túi và ba lô</a>
        <a href="/vn/?men-hats">Mũ - Beanies</a>
        <a href="/vn/?men-socks">Vớ</a>
        <a href="/vn/?men-phone_case">Ốp Điện Thoại</a>
        <a href="/vn/?men-sunglasses">Kính Râm</a>
        <a href="/vn/?men-balls">Những Quả Bóng</a>
        <a href="/vn/?men-watches">Đồng Hồ</a>
        <a href="/vn/?men-gloves">Găng Tay</a>
        <a href="/vn/?men-scarves">Khăn Quàng Cổ</a>
        <a href="/vn/?men-accessories-grid=true">Tất Cả Phụ Kiện</a>
        <a href="/vn/?men-accessories-sale">Phụ Kiện Giảm Giá</a>
      </div>

      <div class="col"> <!-- cột 5 menu 1 -->
        <a style="text-decoration: none"><h2>MÔN</h2></a>
        <a href="/vn/?men-running">Chạy</a>
        <a href="/vn/?men-soccer">Bóng Đá</a>
        <a href="/vn/?men-basketball">Bóng Rổ</a>
        <a href="/vn/?men-training">Luyện Tập</a>
        <a href="/vn/?men-football">Bóng Bầu Dục</a>
        <a href="/vn/?men-outdoor">Ngoài Trời</a>
        <a href="/vn/?men-tennis">Quần Vợt</a>
        <a href="/vn/?men-skateboarding">Trượt Ván</a>
        <a href="/vn/?men-baseball">Bóng Chày</a>
        <a href="/vn/?men-weightlifting">Giảm Cân</a>
        <a href="/vn/?men-hockey">Khúc Côn Cầu</a>
        <a href="/vn/?men-golf">golf</a>
        <a href="/vn/?men-volleyball">Bóng Chuyền</a>
        <a href="/vn/?men-lacrosse">Bóng Vợt</a>
        <a href="/vn/?college-men-_gear-arizona_state_university">Thiết Bị Trường Học</a>
      </div>

    </div>
  </div>
</li>
<li class="dropdown">
  <a href="/vn/?women-grid=true" class="dropbtn">NỮ</a>
  <div class="dropdown-content">
      <div class="col-container">

          <div class="col"> <!-- cột 1 menu 1 -->
            <a style="text-decoration: none"><h2>NỔI BẬT</h2></a>
            <a href="/vn/?women-new_arrivals">Hàng Mới Về</a>
            <a href="/vn/?womenn-best-seller">Bán Chạy Nhất</a>
            <a href="/vn/?women-release-dates">Ngày Phát Hành</a>
            <a href="/vn/?women-sale" style="font-weight: bold; text-transform: uppercase;">GIẢM GIÁ</a>
            <br/>
            <br/>
            <a href="/vn/?women-podsystem">P.O.D.System</a>
            <a href="/vn/?women-adicolor">adicolor</a>
            <a href="/vn/?women-ultraboost">ultraboost</a>
            <a href="/vn/?women-work_out_essentials">Workout Essentials</a>
            <a href="/vn/?women-back_to_school">Back to School</a>
          </div>

          <div class="col"> <!-- cột 2 menu 1 -->
            <a style="text-decoration: none"><h2>GIÀY</h2></a>
            <a href="/vn/?women-originals-shoes">Bản gốc</a>
            <a href="/vn/?women-running-shoes">Chạy</a>
            <a href="/vn/?women-training-shoes">Luyện Tập</a>
            <a href="/vn/?women-essentials-shoes">Thiết Yếu</a>
            <a href="/vn/?women-slides">Dép Quai - Dép Lê</a>
            <a href="/vn/?women-outdoor-shoes">Đi Bộ Đường Dài</a>
            <a href="/vn/?women-tennis-shoes">Quần vợt</a>
            <a href="/vn/?women-golf-shoes">golf</a>
            <a href="/vn/?women-soccer-shoes">Bóng đá</a>
            <a href="/vn/?women-volleyball">Bóng Chuyền</a>
            <a href="/vn/?women-customizable">Tùy chỉnh với miadidas</a>
            <a href="/vn/?women-shoes-sale">Giày Giảm Giá</a>
          </div>

          <div class="col"> <!-- cột 3 menu 1 -->
            <a style="text-decoration: none"><h2>QUẦN ÁO</h2></a>
            <a href="/vn/?women-hoodies_sweatshirts">Hoodies - áo nỉ</a>
            <a href="/vn/?women-pants">Quân Dài</a>
            <a href="/vn/?women-tights">Quần bó</a>
            <a href="/vn/?women-bras">Áo Ngực Thể Thao</a>
            <a href="/vn/?women-track_suits">Đồ Ra Đường</a>
            <a href="/vn/?women-jackets">Áo khoác</a>
            <a href="/vn/?women-short_sleeve_shirts">Áo sơ mi ngắn tay</a>
            <a href="/vn/?women-long_sleeve_shirts">Áo sơ mi dài tay</a>
            <a href="/vn/?women-compression">compression</a> <!-- Bó-->
            <a href="/vn/?women-polo">polos</a> <!-- Mã Cầu-->
            <a href="/vn/?women-dresses_and_skirts">Quần Áo - Váy</a>
            <a href="/vn/?women-shorts">shorts</a>
            <a href="/vn/?women-tank_tops">Áo Ba Lỗ</a>
            <a href="/vn/?women-apparel-sale">Quần Áo Giảm Giá</a>
          </div>

          <div class="col"> <!-- cột 4 menu 1 -->
            <a style="text-decoration: none"><h2>PHỤ KIỆN</h2></a>
            <a href="/vn/?women-bags">Túi và ba lô</a>
            <a href="/vn/?women-hats">Mũ - Beanies</a>
            <a href="/vn/?women-socks">Vớ</a>
            <a href="/vn/?women-headbands">Băng Đầu</a>
            <a href="/vn/?women-phone_case">Ốp Điện Thoại</a>
            <a href="/vn/?women-sunglasses">Kính Râm</a>
            <a href="/vn/?women-balls">Những Quả Bóng</a>
            <a href="/vn/?women-watches">Đồng Hồ</a>
            <a href="/vn/?women-accessories-grid=true">Tất Cả Phụ Kiện</a>
            <a href="/vn/?women-accessories-sale">Phụ Kiện Giảm Giá</a>
          </div>

          <div class="col"> <!-- cột 5 menu 1 -->
            <a style="text-decoration: none"><h2>MÔN</h2></a>
            <a href="/vn/?women-running">Chạy</a>
            <a href="/vn/?women-training">Luyện Tập</a>
            <a href="/vn/?women-soccer">Bóng Đá</a>
            <a href="/vn/?women-outdoor">Ngoài Trời</a>
            <a href="/vn/?women-tennis">Quần Vợt</a>
            <a href="/vn/?women">Bóng Mềm</a>
            <a href="/vn/?women-weightlifting">Giảm Cân</a>
            <a href="/vn/?women-volleyball">Bóng Chuyền</a>
            <a href="/vn/?women-yoga">Yoga</a>
            <a href="/vn/?women-hockey">Khúc Côn Cầu</a>
            <a href="/vn/?women-golf">golf</a>
            <a href="/vn/?women-lacrosse">Bóng Vợt</a>
            <a href="/vn/?college_gear-women-arizona_state_university">Thiết Bị Trường Học</a>
          </div>

        </div>
  </div>
</li>
<li class="dropdown">
  <a href="javascript:void(0)" class="dropbtn">TRẺ</a>
  <div class="dropdown-content">
      <div class="col-container">

          <div class="col"> <!-- cột 1 menu 3 -->
            <a><h2 style="text-decoration: none">NỔI BẬT</h2></a>
            <a href="/vn/?kids-new_arrivals">Hàng Mới Về</a>
            <a href="/vn/?kids-best-seller">Bán Chạy Nhất</a>
            <a href="/vn/?kids-sale" style="font-weight: bold; text-transform: uppercase;">GIẢM GIÁ</a>
            <br/>
            <br/>
            <a href="/vn/?kids-podsystem">P.O.D. System</a>
            <a href="/vn/?kids-ultraboost">Ultraboost</a>
            <a href="/vn/?kids-adicolor">adicolor</a>
            <a href="/vn/?kids-back_to_school">Back to School</a>
          </div>

          <div class="col"> <!-- cột 2 menu 3 -->
            <a href="/vn/?kids-youth" style="text-decoration: none"><h2>TRẺ (8-14)</h2></a>
            <a href="/vn/?kids-boys-youth-shoes">Giày Trai</a>
            <a href="/vn/?kids-girls-youth-shoes">Giày Gái</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?kids-boys-youth-apparel">Quần Áo Trai</a>
            <a href="/vn/?kids-girls-youth-apparel">Quần Áo Gái</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?kids-youth-sale">Giảm Giá</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?kids-youth" style="font-weight: bold">tất cả Trẻ</a>
          </div>

          <div class="col"> <!-- cột 3 menu 3 -->
            <a href="/vn/?kids-children" style="text-decoration: none"><h2>TRẺ EM (4-8)</h2></a>
            <a href="/vn/?kids-boys-children-shoes">Giày Trai</a>
            <a href="/vn/?kids-girls-children-shoes">Giày Gái</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?kids-boys-children-apparel">Quần Áo Trai</a>
            <a href="/vn/?kids-girls-children-apparel">Quần Áo Gái</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?kids-children-sale">Giảm Giá</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?kids-children" style="font-weight: bold">tất cả Trẻ Em</a>
          </div>

          <div class="col"> <!-- cột 4 menu 3 -->
            <a href="#" style="text-decoration: none"><h2>SƠ SINH - CHẬP CHỮNG (0-4)</h2></a>
            <a href="/vn/?kids-infant_toddler-shoes">Giày</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?kids-infant_toddler-apparel">Quần Áo</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?kids-infant_toddler-sale">Giảm Giá</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?kids-infant_toddler" style="font-weight: bold">Tất Cả Sơ Sinh - Chập Chững</a>
          </div>

          <div class="col"> <!-- cột 5 menu 3 -->
            <a href="/vn/?kids-accessories" style="text-decoration: none"><h2>PHỤ KIỆN</h2></a>
            <a href="/vn/?kids-bags">Túi và Ba Lô</a>
            <a href="/vn/?kids-socks">Vớ</a>
            <a href="/vn/?kids-hats">Mũ - Beanies</a>
            <a href="/vn/?kids-balls">Bóng</a>
          </div>

        </div>
  </div>
</li>
<li class="menu-spacer___1eBnZ"></li>
<li class="dropdown">
  <a class="dropbtn" style="cursor: pointer">MÔN</a>
  <div class="dropdown-content">
      <div class="col-container">
          <!-- \\\\//// -->
          <!-- COLUMN 1 -->
          <!-- ////\\\\ -->
          <div class="col"> <!-- cột 1 menu 4 -->
            <a href="/vn/?running" style="text-decoration: none"><h2>CHẠY</h2></a>
            <a href="/vn/?running"><img src="/images/0/img/running.png"></a>
            <br>
            <a href="/vn/?running-shoes">Giày</a>
            <a href="/vn/?running-apparel">Quần Áo</a>
            <a href="/vn/?running-accessories">Phụ Kiện</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?ultraboost">ultraboost</a>
            <a href="/vn/?alphabounce">alphabounce</a>
            <a href="/vn/?shoes-pureboost">Pureboost</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?running-grid=true" style="font-weight: bold">tất cả Chạy</a>
          </div>
          <!-- \\\\//// -->
          <!-- COLUMN 2 -->
          <!-- ////\\\\ -->
          <div class="col"> <!-- cột 2 menu 1 -->
            <a  href="/vn/?soccer" style="text-decoration: none"><h2>BÓNG ĐÁ</h2></a>
            <a href="/vn/?soccer"><img src="/images/0/img/FB_SS18_DeadlyStrike_Predator_NV-IMG.jpg"></a>
            <br>
            <a href="/vn/?soccer-shoes">Giày</a>
            <a href="/vn/?soccer-apparel">Quần Áo</a>
            <a href="/vn/?soccer-accessories">Phụ Kiện</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?Predator">Predator</a>
            <a href="/vn/?X">X</a>
            <a href="/vn/?Nemeziz">Nemeziz</a>
            <a href="/vn/?Copa">Copa</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?soccer-grid=true" style="font-weight: bold">tất cả soccer</a>
          </div>
          <!-- \\\\//// -->
          <!-- COLUMN 3 -->
          <!-- ////\\\\ -->
          <div class="col"> <!-- cột 3 menu 1 -->
            <a  href="/vn/?basketball" style="text-decoration: none"><h2>BÓNG RỔ</h2></a>
            <a href="/vn/?basketball"><img src="/images/0/img/new_harden_basketball_flyout_nav.jpg" height="80" width="172"></a>
            <br>
            <a href="/vn/?basketball-shoes">Giày</a>
            <a href="/vn/?basketball-apparel">Quần Áo</a>
            <a href="/vn/?basketball-accessories">Phụ Kiện</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?james_harden">James Harden</a>
            <a href="/vn/?damian_lillard">Damian Lillard</a>
            <a href="/vn/?crazy_explosive">Crazy Explosive</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?basketball-grid=true" style="font-weight: bold">tất cả Bóng Rổ</a>
          </div>
          <!-- \\\\//// -->
          <!-- COLUMN 4 -->
          <!-- ////\\\\ -->
          <div class="col"> <!-- cột 4 menu 1 -->
            <a href="/vn/?football" style="text-decoration: none"><h2>BÓNG BẦU DỤC</h2></a>
            <a href="/vn/?football"><img src="/images/0/img/CLP_nav_1.jpg"></a>
            <br>
            <a href="/vn/?cleats-football">cleats</a><!--Dày Đinh-->
            <a href="/vn/?football-apparel">Quần Áo</a>
            <a href="/vn/?football-accessories">Phụ Kiện</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?compression">compression</a>
            <a href="/vn/?men-cleats-football-Freak">Freak cleats</a>
            <a href="/vn/?adizero_5_star">Adizero 5-Star</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?football-grid=true" style="font-weight: bold">tất cả football</a>
          </div>
          <!-- \\\\//// -->
          <!-- COLUMN 5 -->
          <!-- ////\\\\ -->
          <div class="col"> <!-- cột 5 menu 1 -->
            <a style="text-decoration: none"><h2>MÔN KHÁC</h2></a>
            <a href="/vn/?training">Luyện Tập</a>
            <a href="/vn/?baseball">Bóng Chày</a>
            <a href="/vn/?outdoor">Ngoài Trời</a>
            <a href="/vn/?skateboarding">Trượt Ván</a>
            <a href="/vn/?Snowboarding">Trượt Tuyết</a>
            <a href="/vn/?tennis">Quần Vợt</a>
            <a href="/vn/?golf">golf</a>
            <a href="/vn/?hockey">Khúc Côn Cầu</a>
            <a href="/vn/?lacrosse">lacrosse</a>
            <a href="/vn/?Volleyball">Bóng Chuyền</a>
            <a href="/vn/?Yoga">Yoga</a>
            <a href="/vn/?weightlifting">Giảm Cân</a>
          </div>

        </div>
  </div>
</li>
<li class="dropdown">
  <a class="dropbtn" style="cursor: pointer">NHÃN</a>
  <div class="dropdown-content">
      <div class="col-container">
          <!-- \\\\//// -->
          <!-- COLUMN 1 -->
          <!-- ////\\\\ -->
          <div class="col"> <!-- cột 1 menu 5 -->
            <a href="/vn/?originals"><img src="/images/0/img/text_originals.png"></a>
            <br>
            <a href="/vn/?originals"><img src="/images/0/img/D1_websine_nav_172x80.jpg"></a>
            <br>
            <a href="/vn/?originals-apparel">Giày</a>
            <a href="/vn/?originals-accessories">Quần Áo</a>
            <a href="/vn/?originals-new-arrivals">Hàng Mới Về</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?Superstar">Superstar</a>
            <a href="/vn/?Stan Smith">Stan Smith</a>
            <a href="/vn/?NMD">NMD</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?originals?grid=true" style="font-weight: bold">tất cả adidas originals</a>
          </div>
          <!-- \\\\//// -->
          <!-- COLUMN 2 -->
          <!-- ////\\\\ -->
          <div class="col"> <!-- cột 2 menu 5 -->
            <a href="/vn/?athletics-zne"><img src="/images/0/img/adidas-logo-menu-2.jpg"></a>
            <br>
            <a href="/vn/?athletics-zne"><img src="/images/0/img/Athletics_Flyout_US.jpg"></a>
            <br>
            <a href="/vn/?men-athletics">Quần Áo Nam</a>
            <a href="/vn/?women-athletics">Quàn Áo Nữ</a>
            <a href="/vn/?kids-athletics">Quần Áo Trẻ</a>
            <a href="/vn/?athletics-new-arrivals">Hàng Mới Về</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?zne">Z.N.E.</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?athletics-apparel?grid=true" style="font-weight: bold">tất cả Athletics</a>
          </div>
          <!-- \\\\//// -->
          <!-- COLUMN 3 -->
          <!-- ////\\\\ -->
          <div class="col"> <!-- cột 3 menu 5 -->
            <a href="/vn/?adidas_by_stella_mccartney"><img src="/images/0/img/SM.png"></a>
            <br>
            <a href="/vn/?adidas_by_stella_mccartney"><img src="/images/0/img/aSMC_SS18_Run_SUP_03_Flyout_Nav_172x80.jpg"></a>
            <br>
            <a href="/vn/?adidas_by_stella_mccartney-shoes">shoes</a>
            <a href="/vn/?adidas_by_stella_mccartney-apparel">Clothing</a>
            <a href="/vn/?adidas_by_stella_mccartney-accessories">accessories</a>
            <a href="/vn/?adidas_by_stella_mccartney-new-arrivals">Hàng Mới Về</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?adidas_by_stella_mccartney-tennis">tennis</a>
            <a href="/vn/?adidas_by_stella_mccartney-training">training</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?adidas_by_stella_mccartney?grid=true" style="font-weight: bold">tất cả adidas bởi Stella McCartney</a>
          </div>
          <!-- \\\\//// -->
          <!-- COLUMN 4 -->
          <!-- ////\\\\ -->
          <div class="col"> <!-- cột 4 menu 5 -->
            <a><h2>BỘ SƯU TẬP</h2></a>
            <a href="/vn/?eqt?grid=true">EQT</a>
            <a href="/vn/?gazelle?grid=true">Gazelle</a>
            <a href="/vn/?campus?grid=true">Khuôn viên</a>
            <a href="/vn/?tubular?grid=true">Hình ống</a>
            <a href="/vn/?iconics">Biểu tượng</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?adicolor">adicolor Clothing</a>
            </div>

        </div>
  </div>
</li>
<li class="menu-spacer___1eBnZ"></li>
<li class="dropdown">
  <a href="/vn/?customizable" class="dropbtn">TÙY CHỈNH</a>
  <div class="dropdown-content">
      <div class="col-container">
          <!-- \\\\//// -->
          <!-- COLUMN 1 -->
          <!-- ////\\\\ -->
          <div class="col"> <!-- cột 1 menu 6 -->
            <a href="/vn/?originals-customizable" style="text-decoration: none"><h2>ĐỘC ĐÁO</h2></a>
            <a href="/vn/?originals-customizable"><img src="/images/0/img/mi_1.jpg"></a>
            <br>
            <a href="/vn/?i_5923-customizable">I-5923</a>
            <a href="/vn/?originals-swift-customizable">Swift Run</a>
            <a href="/vn/?originals-campus-customizable">Campus</a>
            <a href="/vn/?superstar-customizable">Superstar</a>
            <a href="/vn/?stan_smith-customizable">Stan Smith</a>
            <a href="/vn/?eqt-customizable">EQT</a>
            <a href="/vn/?tubular-customizable">Tubular</a>
            <a href="/vn/?gazelle-customizable">Gazelle</a>
            <a href="/vn/?originals-spzl-customizable">Spezial</a>
            <a href="/vn/?adilaette-customizable">adilette</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?originals-customizable" style="font-weight: bold">All originals</a>
          </div>
          <!-- \\\\//// -->
          <!-- COLUMN 2 -->
          <!-- ////\\\\ -->
          <div class="col"> <!-- cột 2 menu 6 -->
            <a href="/vn/?running-customizable" style="text-decoration: none"><h2>CHẠY</h2></a>
            <a href="/vn/?running-customizable"><img src="/images/0/img/ss18_miultraboost_multicolor_Topnav.jpg"></a>
            <br>
            <a href="/vn/?alphabounce-customizable">alphabounce Beyond</a>
            <a href="/vn/?ultraboost-running-shoes-customizable">ultraboost X</a>
            <a href="/vn/?pureboost-customizable">Pureboost</a>
            <a href="/vn/?adizero-running-customizable">Energy Cloud</a>
            <a href="/vn/?supernova-customizable">Supernova</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?running-customizable" style="font-weight: bold">All running</a>
          </div>
          <!-- \\\\//// -->
          <!-- COLUMN 3 -->
          <!-- ////\\\\ -->
          <div class="col"> <!-- cột 3 menu 6 -->
            <a href="/vn/?basketball-customizable" style="text-decoration: none"><h2>BÓNG RỔ</h2></a>
            <a href="/vn/?basketball-customizable"><img src="/images/0/img/mi_3.jpg"></a>
            <br>
            <a href="/vn/?customizable-james_harden">Harden Vol. 2</a>
            <a href="/vn/?customizable-damian_lillard">Dame 4</a>
            <a href="/vn/?crazylight-basketball-customizable">Crazylight Boost</a>
            <a href="/vn/?crazy_explosive-customizable">Crazy Explosive</a>
            <a href="/vn/?mad-basketball-shoes-customizable">Mad Bounce</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?running-customizable" style="font-weight: bold">All basketball</a>
          </div>
          <!-- \\\\//// -->
          <!-- COLUMN 4 -->
          <!-- ////\\\\ -->
          <div class="col"> <!-- cột 4 menu 6 -->
            <a href="/vn/?customizable" style="text-decoration: none"><h2>KHÁM PHÁ THÊM</h2></a>
            <a href="#"><img src="/images/0/img/mi_2.jpg"></a>
            <br>
            <a href="/vn/?ultraboost_4.0-customizable">ultraboost Multi Color</a>
            <a href="/vn/?football-customizable">Bóng Bàu Dục</a>
            <a href="/vn/?baseball-customizable">Bóng Chày</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?men-customizable">Tất Cả của Nam</a>
            <a href="/vn/?women-customizable">Tất Cả của Nữ</a>
            <a style="text-decoration: none; cursor: default;">---</a>
            <a href="/vn/?giftcards">Gift Cards</a>
            <a style="text-decoration: none; cursor: default;">---</a>
          </div>

        </div>
  </div>
  <!-- End contentasset -->
</li>

<a title="Kiểm tra" href="<?php if(empty ($_SESSION["email"])) echo '/vn/myaccount/login/'; else echo '/vn/cart';?>" class="addtobag"><img src="/images/0/img/bag.png" style="float: right"></a>

<div class="wish" <?php if(empty ($total_records)) echo ' style="display: none"';?>>
  <a href="<?php if(empty ($_SESSION["email"])) echo '/vn/myaccount/login/'; else echo '/vn/wishlist';?>" class="addtobag">
  <img src="/images/0/img/wish.png" style="float: right">
  <div class="centered">
    <?php if(!empty ($_SESSION["email"])) echo $total_records?>
  </div>
  </a>
</div>

<form class="search" action="/vn/search" method="get">
<input type="text" name="q" autoComplete="off" placeholder="tìm" value="" />
<input type="hidden" name="sitePath" value="vn" />
</form>
</ul>
</div>

<!-- ---------------------------------------------------------------------------------------------------------------------------- -->
