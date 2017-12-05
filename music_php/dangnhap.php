<?php
if($_REQUEST["dangnhap"]<>"")
{
	$ten_dang_nhap=trim($_POST["username"]);
	$mat_khau=trim($_POST["pass"]);
	kt_dang_nhap($ten_dang_nhap, $mat_khau);
}

?>

<?php
if($_SESSION['log']['ok'])
{
?>
<div id="topic-hot" class="widget widget-cate">
	<div class="part-cate-inside">
		<h2 class="title-section sz-title-sm fs19">
			<a class="fn-detail_link" href="#">Trang cá nhân</a>
		</h2>
		<div class="content">
			<a href="?a=thaydoitt" title="Sửa thông tin cá nhân" style="margin: 6px;font-size: 1.1rem;color: #6f727d;">Xin chào bạn: <b><?php echo $_SESSION['log']['ten_nguoi_dung'];?></b></a>
			<a href="?a=thaydoitt" title="Sửa thông tin cá nhân" style="margin: 6px;font-size: 1.1rem;color: #6f727d;"><?php echo $_SESSION['log']['email'];?></a>
			<a href="?a=upload" class="btn btn-brand form-control" style="width: 50%;float: left;">Upload nhạc</a>
			<a class="btn btn-danger form-control" style="width: 50%;" onClick="confirm('Bạn thật sự muốn thoát?')" href="?a=dangxuat">Đăng xuất</a>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php
}
else
{
?>
<div id="topic-hot" class="widget widget-cate">
	<div class="part-cate-inside">
		<h2 class="title-section sz-title-sm fs19">
			<a class="fn-detail_link" href="#">Đăng nhập</a>
		</h2>
		<form name="form1" method="post" action="">
			<input class="form-control" name="username" type="text" id="username" placeholder="Tên đăng nhập" >
			<input class="form-control" name="pass" type="password" id="pass" placeholder="Mật khẩu">
			<input class="btn form-control" name="dangnhap" type="submit" id="dangnhap" value="Đăng Nhập">
		</form>
		<a href="?a=quenmatkhau" style="margin-right: 15px;">Quên mật khẩu?</a>
		<a href="?a=dangky">Đăng ký thành viên</a>
			
	</div>
	<div class="clearfix"></div>
</div>
<?php
}
?>