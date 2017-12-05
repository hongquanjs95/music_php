<?php
    if($_REQUEST["thaydoi"]<>"")
	{
		$baoloi="";
		$ten_dang_nhap=trim($_POST["username"]);
		$mat_khau_moi=trim($_POST["passmoi"]);
        $mat_khau_moi_=trim($_POST["nhaplaipassmoi"]);
        $email=trim($_POST["email"]);
		if($ten_dang_nhap=="" || !isValidUsername($ten_dang_nhap))
		$baoloi.="- Hãy nhập tên đăng nhập (không chứa các ký tự đặc biệt)<br>";
		if(strlen($mat_khau_moi)<6 || !isValidUsername($mat_khau_moi))
		$baoloi.="- Mật khẩu phải từ 6 ký tự trở lên và không chứa ký tự đặc biệt<br>";
        if(md5($mat_khau_moi)<>md5($mat_khau_moi_))
        $baoloi.="- Nhập lại mật khẩu không khớp<br>";
        if($email=="")
		$baoloi.="- Hãy nhập email của bạn<br>";
        if(!isValidEmail($email))
		$baoloi.="- Email chưa đúng định dạng<br>";
        if(kt_email_cochua_($email, $ten_dang_nhap)==false)
        $baoloi.="- Nhập không đúng email với tên đăng nhập<br>";
		if($ten_dang_nhap=="")
		$baoloi.="- Hãy nhập tên đăng nhập của bạn<br>";
		
		if($baoloi=="")
		{
			kt_username($ten_dang_nhap, md5($mat_khau_moi));
		}
		else echo $baoloi;
	}
?>
<div class="section mt20">
	<h2 class="title-section">
		<a href="#">QUÊN MẬT KHẨU</a>
	</h2>
	<form name="form1" method="post" action="" style="width: 60%;">
    <a>Tên đăng nhập:</a>
		<input class="form-control" name="username" type="text" id="username" value="">
    <input name="manguoidung" type="hidden" id="manguoidung" value="">
		<a>Mật khẩu mới:</a>
    <input class="form-control" name="passmoi" type="password" id="passmoi">
		<a>Xác nhận mật khẩu mới:</a>
    <input class="form-control" name="nhaplaipassmoi" type="password" id="passmoi">
		<a>Địa chỉ email:</a>
    <input class="form-control" name="email" type="text" id="email">
		<input class="form-control btn" name="thaydoi" type="submit" id="thaydoi" value="Xác nhận">
    <input class="form-control btn" type="reset" name="Submit2" value="Hủy">
	</form>
</div>