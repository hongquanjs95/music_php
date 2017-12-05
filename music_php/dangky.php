<?php
if($_SESSION['log']['ok'])
{
	echo "<META http-equiv=refresh content=\"0; URL=index.php\">";
}
else
{
	if($_REQUEST["Submit"]<>"")
	{
		$baoloi="";
		$ten_dang_nhap=trim($_POST["username"]);
		$mat_khau=trim($_POST["pass"]);
		$ten_nguoi_dung=trim($_POST["hoten"]);
		$email=trim($_POST["email"]);
		$ngay_tham_gia=date("Y/m/d");
		if($ten_dang_nhap=="" || !isValidUsername($ten_dang_nhap))
		$baoloi.="- Hãy nhập tên đăng nhập (không chứa các ký tự đặc biệt)<br>";
		if(strlen($mat_khau)<6 || !isValidUsername($mat_khau))
		$baoloi.="- Mật khẩu phải từ 6 ký tự trở lên và không chứa ký tự đặc biệt<br>";
		if($ten_nguoi_dung=="")
		$baoloi.="- Hãy nhập tên của bạn<br>";
		if(!isValidEmail($email))
		$baoloi.="- Email chưa đúng định dạng<br>";

		if($baoloi=="")
		{
			if(kt_username_cochua($ten_dang_nhap))
			echo "Đã có người dùng tên đăng nhập này, hãy chọn tên khác!";
			else if(kt_email_cochua($email))
			echo "Đã có người sử dụng email này, hãy chọn email khác!";
			else
			them_nguoi_dung($ten_nguoi_dung, $ten_dang_nhap, $mat_khau, $email, $ngay_tham_gia);
		}
		else echo "<div class='section mt20'><a style='color: red;'>".$baoloi."</a></div>";
	}
	?>
<div class="section mt20">
	<h2 class="title-section">
		<a href="#">Đăng ký thành viên</a>
	</h2>
	<form name="form1" method="post" action="" style="width:60%;">
		<input class="form-control" name="username" type="text" id="username" value="<?php if(isset($_POST["username"])) echo $_POST["username"];?>">
		<input class="form-control" name="pass" type="password" id="pass">
		<input class="form-control" name="hoten" type="text" id="hoten" value="<?php if(isset($_POST["hoten"])) echo $_POST["hoten"];?>">
		<input class="form-control" name="email" type="text" id="email" value="<?php if(isset($_POST["email"])) echo $_POST["email"];?>">
		<input type="submit" name="Submit" value="Xác Nhận" class="btn form-control">
	</form>
</div>

<?php
}
?>
