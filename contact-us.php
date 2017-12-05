<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
	//khai báo thông tin người gửi, thông tin này sau có thể lấy từ form của website
	$name = 'Trần Hải';
	$email  = 'hai@thuonghieuweb.com';
	$subject= 'Thư liên hệ gửi từ website';
	$content= 'Xin chào, <br> Chúng tôi cần liên hệ với bạn';
	// khai báo địa chỉ nhận thư. Nếu muốn gửi cùng lúc tới nhiều người thì dùng dấu phảy phân cách các địa chỉ email
	$to  = 'tranhaivn@yahoo.com';  
	// Khai báo header dùng mã utf-8 để hiển thị tiếng việt 
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= 'From: =?UTF-8?B?'.base64_encode($name).'?= <'.$email.'>' . "\r\n";	
	//khai báo nội dung thư theo chuẩn HTML
	$message  = '<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				</head>
				<body>
						<p>Thư gửi từ: '.$name.'<'.$email.'></p>
						<p>Nội dung thư: '.$content.'</p>
				</body>
				</html>';
	// Gửi thư bằng hàm mail của PHP với điều kiện server có hỗ trợ hàm này và có sẵn dịch vụ mail smtp cổng 25
	if(mail($to, '=?UTF-8?B?'.base64_encode($subject).'?=', $message, $headers)) 
		echo 'Thư của quý khách đã được gửi đến người có trách nhiệm';
	else 
		echo 'Quá trình gửi thư bị lỗi';
?>
</body>
</html>