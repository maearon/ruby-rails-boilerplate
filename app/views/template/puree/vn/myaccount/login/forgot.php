<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './vendor/autoload.php';

// connect to the database
// kết nối với cơ sở dữ liệu
$coon=mysqli_connect( "localhost", "id11399066_root", "password", "id11399066_adidas");
mysqli_query($coon, "SET NAMES utf8");
$coon->query("set names 'utf8'"); $coon->set_charset("utf8");

// REGISTER USER
// GHI DANH NGƯỜI DÙNG
if(!empty($_POST["dwfrm_requestpassword_email"])) {
	// receive all input values from the form
  	// nhận tất cả các giá trị đầu vào từ biểu mẫu
	$requestpassword_email = $_POST["dwfrm_requestpassword_email"];


// Create tokens
$resetpasswordtoken = bin2hex(random_bytes(32));
echo $resetpasswordtoken.'<br>';
/*$url = sprintf('%sreset.php?%s', ABS_URL, http_build_query([
    'selector' => $selector,
    'validator' => bin2hex($token)
]));*/

// Token expiration
/*$expires = new DateTime('NOW');
$expires->add(new DateInterval('PT01H')); // 1 hour*/

// Insert reset token into database
$sql = "UPDATE taikhoan SET token = '$resetpasswordtoken' WHERE EMAIL = '$requestpassword_email'";
$query =mysqli_query($coon,$sql);

		$sql="SELECT * FROM taikhoan WHERE EMAIL='$requestpassword_email'";

		$result = mysqli_query($coon,$sql);
		while($row=mysqli_fetch_array($result)){
			$requestpassword_name=$row['name'];
			echo $requestpassword_name;
		}
		$result = mysqli_query($coon,$sql);
		$user = mysqli_fetch_array($result);
		if(!empty($user)) {
            echo 'TON TAI';
/* gui mail**************************************************************************/

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
	$mail->IsSMTP();
	$mail->SMTPDebug = 2;
	$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = "smtp.gmail.com";
$mail->Mailer = "smtp";
$mail->Port = 587;
$mail->Username = "manh11117@gmail.com";
$mail->Password = "Ndm0915827299";

    //Recipients
    $mail->setFrom('manh11117@gmail.com', 'adidas');
    $mail->addAddress($requestpassword_email, $requestpassword_name);     // Add a recipient

    //Attachments


    //Content
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->CharSet = 'UTF-8';
    $mail->Subject = $requestpassword_name.', liên kết đặt lại mật khẩu của bạn đã sẵn sàng';
	$mail->Body    = '
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="background:#ebebeb"></table>
<tr>
    <td align="left" style="font-family:Arial;font-size:12px;color:#0185cc">
        <a style="color:#0185cc;text-decoration:none" href="http://adidasvn.ddns.net/vn/resetpassword?resetpasswordtoken='.$resetpasswordtoken.'" target="_blank">Tạo mật khẩu mới của bạn ngay bây giờ.</a>
	</td>
	<td align="left" style="font-family:Arial;font-size:12px;color:#0185cc">
        <a style="color:#0185cc;text-decoration:none" href="http://adidasvn.ddns.net/vn/resetpassword?resetpasswordtoken='.$resetpasswordtoken.'" target="_blank">&nbsp;| Tạo mật khẩu mới của bạn ngay bây giờ.</a>
    </td>
    <td align="right" style="font-family:Arial;font-size:12px;color:#0185cc">
        <a href="">Xem email này trực tuyến</a>
    </td>
</tr>
</table>
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center" style="font-family:Arial;font-size:18px;font-weight:normal;color:#363738;line-height:22px" class="m_-7365995615488982444mobile-font-14-with-line">
			Xin chào '.$requestpassword_name.', <br> Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu <a href="http://adidasvn.ddns.net" target="_blank">adidasvn.ddns.net</a> của bạn. Vui lòng nhấp vào <a href="http://adidasvn.ddns.net/vn/resetpassword?resetpasswordtoken='.$resetpasswordtoken.'" target="_blank">đây</a> hoặc nút bên dưới để tạo mật khẩu mới.
		</td>
	</tr>
	<tr>
		<td align="center" style="padding-left:40px;padding-right:40px;padding-top:30px;padding-bottom:10px">
		</td>
	</tr>
	<tr>
		<td align="center">
			<a href="http://adidasvn.ddns.net/vn/resetpassword?resetpasswordtoken='.$resetpasswordtoken.'" target="_blank" alt="" border="0"></a>
		</td>
	</tr>
	<tr>
		<td align="center" class="m_-7365995615488982444mobile-padding" style="padding-left:40px;padding-right:40px;padding-top:30px;padding-bottom:10px">
		</td>
	</tr>
	<tr>
		<td align="center" style="font-family:Arial;font-size:18px;font-weight:normal;color:#363738;line-height:22px" >Nếu bạn không có ý định thay đổi mật khẩu của mình, chỉ cần bỏ qua email này. Hãy yên tâm rằng tài khoản của bạn an toàn.</td>
	</tr>
	<tr>
		<td align="center" style="font-family:Arial;font-size:18px;font-weight:normal;color:#9a9b9b;line-height:22px" class="m_-7365995615488982444mobile-font-14-with-line">
		  <span style="font-size:18px;line-height:18px;font-weight:normal;color:#363738">Cảm ơn bạn đã tham gia. adidas.<br><br></span>
		  <span style="font-size:14px;line-height:10px;font-style:italic;font-weight:normal;color:#363738">(đây là một tin nhắn tự động, xin vui lòng không trả lời)</span>
		</td>
	</tr>
  </table>
';

    $mail->send();
	echo 'Message has been sent';

} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
/* gui mail**************************************************************************/
		} else {
			echo 'No User Found';

		}
	}

?>
