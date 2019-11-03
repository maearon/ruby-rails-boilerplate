<?php
session_start();
$email=$_SESSION["email"];
$conn=mysqli_connect( "localhost", "id11399066_root", "password", "id11399066_adidas");
mysqli_query($conn, "SET NAMES utf8");

$result=mysqli_query($conn, "SELECT count(ID) AS total FROM giohang WHERE EMAIL='$email'");
$row=mysqli_fetch_assoc($result); $total_records=$row[ 'total'];

$sql="SELECT * FROM giohang WHERE EMAIL='$email'" ;
$query=mysqli_query($conn,$sql); ?>

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

<link rel="stylesheet" href="/css/cartshow/cartshow.css"> <!-- css gio hang -->

<link rel="stylesheet" href="/css/foundation.css"> <!-- css chung -->
<link rel="stylesheet" href="/css/menu.css"> <!-- css cho menu -->
<link rel="stylesheet" href="/css/animatedSearchBar.css"> <!-- css cho thanh tìm kiếm linh hoạt-->

<link rel="stylesheet" href="/css/slideshow.css"> <!-- css cho slideshow -->
<link rel="stylesheet" href="/css/container.css"> <!-- css cho footer -->
<link rel="stylesheet" href="/css/footerBottom.css"> <!-- css cho footer -->
<link rel="stylesheet" href="/css/footer.css"> <!-- css cho footer -->

<link rel="icon" href="/img/adidas-favicon.ico" />
</head>

<script src="/js/include.js"></script>

<body>

<div id="topdiv">
<div w3-include-html="/vn/include/menu.php"></div>
</div>

<div id="topdivvv">

</div>

<div id="main">
    <div id="content">

                <!-- START cart-wrapper -->
                <div class="cart-wrapper row" data-component="pagecontext/Scope" data-scope="none" <?php if(empty ($total_records)) echo ''; else echo 'style="display: none"';?>>
                    <div class="container clearfix empty-cart">
                        <div class="col-8">
                            <div class="container cart-head-container clearfix">
                                <div class="col-4 title-wrapper" data-scope="breadcrumbs" data-context="home;shopping cart">
                                    <h1 class="checkout-title">Túi của bạn trống</h1>
                                </div>
                            </div>
                            <div class="cart_empty-content">
                            </div>
                            <div class="contionue-shopping-wrapper">
                                <form class="co-formcontinueshopping" action="/" method="post" id="dwfrm_cart_d0bmfvnqlzbu">
                                    <fieldset>
                                        <button class="rbk-button-red button-primary bp-black right" type="submit" value="Continue Shopping" name="dwfrm_cart_continueShopping">
<span>Tiếp tục mua sắm</span>
</button>
                                    </fieldset>
                                </form>
                            </div>

                            <div class="cart-teamwear-config">

                                <div class="unfinished-teamwear-config" style="display:none;">
                                    <div class="unfinished-teamwear-config-content-wrapper">
                                        <div class="unfinished-teamwear-message">This product is saved, but not added to your bag</div>
                                        <div class="section-title">Men Football teamwear</div>
                                        <div class="teamwear-creation-time">
                                            Created on
                                            <span class="teamwear-creation date"></span> at
                                            <span class="teamwear-creation time"></span>
                                        </div>
                                        <div class="buttons">
                                            <a class="cart-link-button action-teamwear-edit" href="/on/demandware.store/Sites-adidas-US-Site/en_US/Teamwear-Show">Edit</a>
                                            <span class="separate-sumbol">|</span>
                                            <a class="cart-link-button action-teamwear-delete" href="https://www.adidas.com/on/demandware.store/Sites-adidas-US-Site/en_US/Cart-Show">Delete</a>
                                        </div>
                                        <div class="players clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="cartwishlistcontainer" data-component="checkout/Cart"></div>
                            <div class="loading-small loading-animation-container wishlist">
                                <div id="loading-overlay">
                                    <div id="loading-overlay-spinner" class="loader-medium-dark"></div>
                                </div>
                            </div>

                        </div>
                        <div class="cart-right col-4 co-delivery-right vertical-callout-container rbk-mobile-shadow-block">
                            <div class="co-checkout-bottom-asset delivery-methods-content">

                                <div class="contentasset" data-contentasset-id="checkout-bottom-asset" data-contentasset="checkout-bottom-asset">
                                    <style>
                                        div.callout-bar.hockeycard { display: none; }
                                    </style>

                                    <div class="bottom-asset-wrapp">
                                        <h4>Cần giúp đỡ?</h4>
                                        <a _dialogtitle="Shipping" data-dialogclass="pt_customerservice" data-component="common/Popup" data-height="600" data-width="900" href="/us/help-topics-shipping.html">Chuyển Hàng</a><br />
                                        <!-- <a href="/us/help-topics-delivery_terms.html">Delivery Help</a><br /> -->
                                        <a _dialogtitle="Returns & Exchanges" data-dialogclass="pt_customerservice" data-component="common/Popup" data-height="600" data-width="600" href="/us/help-topics-returning.html">Trả Lại & Trao Đổi</a><br />
                                        <a _dialogtitle="Contact Us" data-dialogclass="pt_customerservice" data-component="common/Popup" data-height="600" data-width="600" href="/us/help-topics-Contact+Us.html">Liên Hệ Chúng Tôi</a></div>

                                    <div class="bottom-asset-wrapp">
                                        <h4>Phương thức thanh toán được chấp nhận</h4>
                                        <img alt="payment methods" src="https://www.adidas.com/static/on/demandware.static/-/Sites-adidas-US-Library/en_US/dw88ec105e/us_payment_methods.png" /></div>
                                </div>
                                <!-- End contentasset -->

                            </div>
                            <div class="callout-bars clear clearfix">

                            </div>
                            <div id="cart-bottom-2-slot">
                                <div class="rbk_wrapper">


                                    <div class="callout-bars" data-contentslot="cart-bottom-2-slot" data-component="content/CalloutBar">



                                        <div class="callout-bar  slot-content-contain clearfix " data-contentslot="cart-bottom-2-slot" data-contentassetid="pdp-promo-free-shipping-sitewide-no-minimum" data-excludeforcustomize="" tabindex="0">

                                            <img data-original="https://www.adidas.com/static/on/demandware.static/-/Sites-adidas-US-Library/en_US/dw472db925/04_PDP/Delivery_grid_icon.png" width="88" height="88" class="base lazyload" />


                                            <div class="callout-bar-copy">

                                                <span class="callout-bar-headline">miễn phí vận chuyển, không có tối thiểu.</span>


                                                <span class="readmore">Tìm Hiểu Thêm</span>

                                                <div class="callout-overlay-content" data-title="free shipping, no minimum.">
                                                    <span class="callout-bar-body">Limited time free shipping offer. Offer is good for free 4-7 day shipping, discount applied at checkout. Offer does not apply to adidas gift cards and mi adidas customizations. Valid on domestic U.S. orders only. adidas reserves the right to change or end promotions at any time.</span>
                                                </div>



                                            </div>
                                        </div>



                                        <div class="callout-bar  slot-content-contain clearfix " data-contentslot="cart-bottom-2-slot" data-contentassetid="cart-bottom-box-1" data-excludeforcustomize="" tabindex="0">

                                            <img data-original="https://www.adidas.com/static/on/demandware.static/-/Sites-adidas-US-Library/en_US/dwbd2cefdc/Secure_grid_icon.png" width="88" height="88" class="base lazyload" />


                                            <div class="callout-bar-copy">

                                                <span class="callout-bar-headline">Thanh toán an toàn</span>


                                                <div class="callout-bar-short">Thanh toán an toàn bằng công nghệ SSL.</div>


                                            </div>
                                        </div>



                                        <div class="callout-bar last slot-content-contain clearfix " data-contentslot="cart-bottom-2-slot" data-contentassetid="cart-bottom-box-3" data-excludeforcustomize="" tabindex="0">

                                            <img data-original="https://www.adidas.com/static/on/demandware.static/-/Sites-adidas-US-Library/en_US/dw472db925/Delivery_grid_icon.png" width="88" height="88" class="base lazyload" />


                                            <div class="callout-bar-copy">

                                                <span class="callout-bar-headline">Trả lại miễn phí *</span>


                                                <div class="callout-bar-short">Trong vòng 30 ngày</div>




                                                <span class="readmore">đọc thêm</span>

                                                <div class="callout-overlay-content" data-title="Free Returns*">
                                                    <span class="callout-bar-body"><p>If you are not completely satisfied with your adidas.com purchase, for any reason, we will offer you a free return within 30 days of purchase.*</p>
<p>&nbsp;</p>
<p>*Because custom and personalized mi adidas products are made just for you, they are not returnable.</p></span>
                                                </div>



                                            </div>
                                        </div>


                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="certona-cart-recommendation products-carousel">



                        <!--googleoff: all-->

                        <!--googleon: all-->







                        <div class="carousel-content-inner owl-carousel-content-inner clearfix fullwidth" data-contentasset='certona-empty-cart-recommendations' data-contentassetid='certona-empty-cart-recommendations'>


                        </div>

                        <div data-certonazoneid="emptycart_rr" class="owlcarousel-wrapper product-carousel-owl fullwidth" data-component="productlist/Plp">
                            <div class="owl-carousel owl-theme" data-component="common/OwlCarousel" data-prop-nesteditemselector="hockeycard" data-prop-nav="true" data-prop-items="4.0" data-prop-slideBy="4.0" data-prop-margin="10">

                                <!-- show loading icon. -->



                                <div id="emptycart_rr">
                                    <!-- Certona will load products in here. -->
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div id="cart-top-slot" class="small-callout-container">


                </div>
                <div class="co-basket-bottom-asset">



                </div>
                <!-- Reebok checkout bottom content -->
                <div class="rbk_checkout_bottom">



                </div>
                <!-- END cart-wrapper -->
                <div id="loader" class="loader"></div>



                <!-- Report any requested source code -->


                <!-- Report the active source code -->




                <script type="text/json" data-component="package/RemovePopup"></script>


            </div>


        <!-- START cart-wrapper -->
        <div class="cart-wrapper row" <?php if(empty ($total_records)) echo ' style="display: none"';?>>
            <div class="container ">
                <div class="col-8">
                    <!-- START products wrapper -->
                        <div class="container clearfix">

                            <div class="col-4 title-wrapper" data-scope="breadcrumbs" data-context="home;shopping cart">
                                <h1 class="checkout-title">Giỏ Hàng Của Bạn
                                <span>
                                <?php echo $total_records?> đơn hàng
                                </span>
                                </h1>
                            </div>

                            <div class="col-2 contionue-shopping-wrapper right">
                                <div class="co-actions cart-top-actions">
                                    <form class="formcheckout" action="" method="post" id="dwfrm_cart_d0rhxjymujrw"> </form>
                                    <form class="co-formcontinueshopping" action="/" method="post" id="dwfrm_cart_d0xpeekvynww">
                                    <fieldset>
                                        <button class="co-btn_continue_shopping cta-link" type="submit" value="Tiếp Tục Mua Sắm" name="dwfrm_cart_continueShopping"> <span>Tiếp Tục Mua Sắm</span> </button>
                                    </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="container clearfix rbk-mobile-shadow-block " data-ci-test-id="cartOverview">
                            <div class="cart_table fancyform" id="dwfrm_cart">
                                <div class="co-pt_table">
                                    <div class="shipment_wrapper">
                                        <div class="delivery-list clear clearfix"> </div>

                                            <?php
                                            $tonggiaban=0;
                                            $tonggiagoc=0;
                                            while($row=mysqli_fetch_array($query)) {
                                                 $idtrongbangsp=$row[ 'idtrongbangsp'];
                                            ?>
                                            <div id="shipment_wrapper_0_<?php echo $row['id']?>" class="container clearfix line-item <?php if($row['id']=1) echo " first-item " ?>">
                                                <div class="imagecolumn left">
                                                    <div class="productimg_container">
                                                        <?php
                                                        $conn1=mysqli_connect( "localhost", "id11399066_root", "password", "id11399066_adidas");
                                                        mysqli_query($conn1, "SET NAMES utf8");
                                                        $sql1="SELECT * FROM sanpham where IDSP=$idtrongbangsp" ;
                                                        $query1=mysqli_query($conn1,$sql1);
                                                        ?>
                                                        <?php while($row=mysqli_fetch_array($query1)) {
                                                            $giaban=$row[ 'GIABAN'];
                                                            $giagoc=$row[ 'GIAGOC']; ?>
                                                            <a href="/vn/product?slot=<?php echo $row['IDSP'] ?>">
                                                            <img src="/images/<?php echo $row['IDSP']?>/<?php echo $row['ANH'] ?>" width="100">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="detailscolumn">
                                                    <div class="edit_details_container_overlay"></div>
                                                    <div class="product" data-id="CP9797_540">
                                                        <a class="name" href="/vn/product?slot=<?php echo $row['IDSP'] ?>" title="<?php echo $row['TENSP'] ?>">
                                                            <?php echo $row[ 'TENSP'] ?>
                                                        </a>
                                                        <div class="article ">
                                                            <span class="label">Số Sản Phẩm:</span>
                                                            <span class="value">
                                                            <?php
                                                            echo substr( $row['ANH'],  0, 6)
                                                            ?>
                                                            </span>
                                                        </div>
                                                        <!-- END: productattributes -->
                                                        <div class="co-product-actions">
															<form action="/vn/cart/xulyxoa.php?slot=<?php echo $row['IDSP'] ?>" method="post" enctype="multipart/form-data">
                                                            <button type="submit"><span>Xóa</span>
                                                            </button>
															</form>
                                                        </div>
                                                    </div>
                                                    <div class="edit_details_container" id="edit_details_container_0_0"></div>
                                                </div>
                                                <div class="totalcolumn unitpricecolumn itemtotals left">
                                                    <div class="price">
                                                        <div class="standartprice">
                                                            <?php $tonggiaban+=$giaban; echo number_format($giaban*22000,2, ".", ","). "₫";?>
                                                        </div>
                                                        <div class="sale"
                                                        <span>
                                                            <?php
                                                            if($giagoc!=0) $tonggiagoc+=$giagoc;
                                                            else $tonggiagoc+=$giaban;
                                                            if($giagoc!=0) echo number_format($giagoc*22000,0,".",","). "₫";
                                                            ?>
                                                        </span> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <?php } ?> </div>
                                    </div>
                                </form>
                                <div class="cart-callout-bars clearfix" data-contentslot="cart-promo-callout" data-component="content/CalloutBar">

                                </div>
                            </div>
                            <!-- END products wrapper -->
                        </div>
                        <!-- end col-8 -->
                        <div class="cart-right col-4 co-delivery-right vertical-callout-container rbk-mobile-shadow-block" style="position:absolute; top:5px; right:5px">
                            <div class="mobile-cart-summary rbk-mobile-shadow-block clear clearfix" data-ci-test-id="cartOrderSummary">
                                <div class="cart_wrapper rbk_shadow_angle rbk_wrapper_checkout summary_wrapper" data-component="checkout/Cart" data-url="https://www.adidas.com/on/demandware.store/Sites-adidas-US-Site/en_US/Cart-Show/C1300704747" data-embedded="cart" data-is-free-delivery-enabled="false" data-freedelivery-threshold="">
                                    <div id="loading-overlay" style="display:none;">
                                        <div id="loading-overlay-spinner"></div>
                                    </div>
                                    <div class="co-actions cart-bottom-actions">
                                        <form class="formcheckout" action="" method="post" id="dwfrm_cart_d0pbyilxajek">
                                            <fieldset>
                                                <button class="co-btn_primary btn_showcart button-ctn button-brd adi-gradient-blue button-full-width button-forward btn btn-cart btn-block" type="submit" value="Checkout" name="dwfrm_cart_checkoutCart" id="dwfrm_cart_checkoutCart" data-ci-test-id="checkoutTopButton"><span>Kiểm Tra</span> </button>
                                            </fieldset>
                                        </form>
                                        <br>
                                        <a href="" tabindex="-1">
                                            <button class="co-btn_primary btn_showcart button-ctn button-brd adi-gradient-blue button-full-width button-forward btn btn-cart btn-block" data-track="paypal checkout" type="submit" name="dwfrm_cart_checkoutShortcutPaypal" data-ci-test-id="paypalCheckoutTopButton"> <span>THANH TOÁN</span> </button>
                                        </a>

                                        <div class="delivery-terms-text"> Bằng cách đặt hàng của bạn, bạn đồng ý với <a href="/vn/dieukhoangiaohang.html">Điều Khoản Vận Chuyển</a> </div>
                                    </div>
                                    <div class="cart-calculation " data-component="" data-ci-test-id="deliveryOrderSummary">
                                        <h3 data-collapse-control>


Tổng Đặt Hàng:

<span>


<?php echo $total_records?> đơn hàng

</span>

</h3>
                                        <section class="cart-widget cart-widget-order_summary no-giftcard">
                                            <div class="cart-widget-block">
                                                <div class="cart-widget-row cart-widget-title">
                                                    <div class="cart-widget-label">
                                                        <?php echo $total_records?> sản phẩm </div>
                                                </div>
                                                <ul class="cart-widget-list">
                                                    <li class="cart-widget-row cart-widget-item cart-widget-item-originalprice">
                                                        <div class="cart-widget-label">Giá gốc</div>
                                                        <div class="cart-widget-value">
                                                            <?php echo number_format($tonggiagoc*22000,2, ".", ","). "₫";?>
                                                        </div>
                                                    </li>
                                                    <li class="cart-widget-row cart-widget-item">
                                                        <div class="cart-widget-label"> Giảm giá </div>
                                                        <div class="cart-widget-value sale"> -
                                                            <?php echo number_format(($tonggiagoc-$tonggiaban)*22000,2, ".", ","). "₫";?> </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="cart-widget-block cart-widget-row cart-widget-title cart-widget-maintitle">
                                                <div class="cart-widget-label"> Tổng sản phẩm </div>
                                                <div class="cart-widget-value" data-ci-test-id=orderTotalProductsDeliveryValue>
                                                    <?php echo number_format($tonggiaban*22000,2, ".", ","). "₫";?> </div>
                                            </div>
                                            <div class="cart-widget-block">
                                                <div class="cart-widget-row cart-widget-title">
                                                    <div class="cart-widget-label"> Vận chuyển </div>
                                                    <div class="cart-widget-value  sale"> MIỄN PHÍ </div>
                                                </div>
                                                <ul class="cart-widget-list"> </ul>
                                            </div>
                                            <div class="cart-widget-mainblock cart-products-payment_total">
                                                <div class="cart-widget-row cart-widget-title cart-widget-maintitle cart-products-ordertotal">
                                                    <div class="cart-widget-label"> Tổng </div>
                                                    <div class="cart-widget-value" data-ordertotalvalue data-amount="139.00" data-ci-test-id=orderTotalCartValue>
                                                        <?php echo number_format($tonggiaban*22000,2, ".", ","). "₫";?> </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <!--tinh tong gia tri gio hang-->
                            </div>
                            <div class="callout-bars clear clearfix"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div w3-include-html="/vn/include/footer.html"></div>

                <script>
                  includeHTML();
                </script>


                    </body>
                    </html>
