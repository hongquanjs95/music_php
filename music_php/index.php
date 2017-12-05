<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Website MP3 | Nghe tải nhạc chất lượng cao</title>
	<link rel="icon" type="image/png" href="images/logo.png" />
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="css/styles.min.css" media="all" type="text/css" />
	<link rel="stylesheet" href="css/update.min.css" media="all" type="text/css" />
	<script type="text/javascript" src="https://zmp3-static.zadn.vn/skins/zmp3-v5.1/plugins/jquery/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="https://zmp3-static.zadn.vn/skins/zmp3-v5.1/plugins/slider/slick.min.js"></script>
	<style>
	.album-item {
		height: 190px;
		min-height: 180px;
	}
	.form-control:focus {
		border-color: #716aca;
		color: #575962;
		outline: none;
		border-radius: 0.25rem;
	}
	.form-label{
		font-weight: 400;
		padding-top: calc(0.65rem - 1px * 2);
		padding-bottom: calc(0.65rem - 1px * 2);
		margin-bottom: 0;
		padding-right: 15px;
		padding-left: 15px;
		font-size: 15px;
		min-height: 1px;
		text-align: right;
	}
	.form-control {
		margin-bottom: 10px;
		width: 100%;
		padding: 0.5rem 0.5rem;
		font-size: 1rem;
		line-height: 1.25;
		border: 1px solid rgba(0, 0, 0, 0.15);
		border-radius: 0.25rem;
		transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
	}
	input{
		display: block;
		padding: 0.5rem 0.5rem;
		font-size: 1rem;
		line-height: 1.25;
		border: 1px solid rgba(0, 0, 0, 0.15);
		border-radius: 0.25rem;
		transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;	
	}
	.error_text{
		color: #f4516c;
		margin-bottom: 10px;
		font-size: 14px;
		font-weight: 300;
		-ms-text-size-adjust: 100%;
		-webkit-font-smoothing: antialiased;
		line-height: 1.5;
		-moz-osx-font-smoothing: grayscale;
	}
	.btn{
		display: inline-block;
		text-align: center;
		white-space: nowrap;
		vertical-align: middle;
		user-select: none;
		border: 1px solid transparent;
		border-radius: 0.25rem;
		transition: all 0.15s ease-in-out;
	}
	.btn-danger {
		color: #f4516c;
		background-color: transparent;
		background-image: none;
		border-color: #f4516c;
		border-width: 2px;
	}
	.btn-brand {
		color: #716aca;
		background-color: transparent;
		background-image: none;
		border-color: #716aca;
		border-width: 2px;
	}
	.btn-danger:hover {
		color: #ffffff;
		background-color: #f4516c;
		border-color: #f4516c;
	}
	.btn-brand:hover {
		color: #ffffff;
		background-color: #716aca;
		border-color: #716aca;
	}
	.content{
		border: 4px solid #f7f7fa;
    	padding: 10px;
	}
	video{
		width: 100%;
	}
	</style>
</head>
<body>
	<?php
		ob_start();
		@session_start();
		require_once('includes/config.php');
		require_once('includes/mysql.php');
		require_once('includes/functions.php');
		require_once('includes/class_pages.php');
		require_once('includes/HamKiemTraDuLieu.php');
		require_once 'process_DB.php';
		$DB = new DB;
		$DB->connect();
		$DB->query("SET NAMES 'utf8'");
		$p=new pager;
	
	?>
	<header>
		<div class="container group">
			<div class="logo">
				<a href="http://localhost/musicweb" title="Website MP3 - Đỉnh cao âm nhạc" class="hide-text">
					<img src="images/logo2.png" alt="Website MP3 - Đỉnh cao âm nhạc" />
				</a>
			</div>
			<div id="sug" class="section-search">
				<form action="form1" method="post" action="" class="search">
					<input type="text" name="tukhoa" id="tukhoa" placeholder="Nhập nội dung cần tìm" class="input-txt" value="<?php if(isset($_POST["tukhoa"])) echo  $_POST["tukhoa"];?>"> 
					<span class="input-btn">
						<button type="submit" class="zicon btn hide-text" name="timkiem" value="timkiem">Tìm
							kiếm</button>
					</span>
				</form>
			</div>
		</div>
	</header>
	<nav>
		<div class="container">
			<?php require 'menutop.php'; ?>
		</div>
	</nav>
	<div class="wrapper-page">
		<div class="wrap-body container">
			<div class="wrap-content">
			<?php
				if(isset($_POST['timkiem'])&&(($_POST['timkiem']!="")))
					{
						$tu_khoa1=trim($_POST["tukhoa"]);
						tim_kiem_bai_hat($tu_khoa1, 'tenbai');
					}
			 	else{
					if( $_GET["a"] =="upload")
					{
						include('upload1.php');
					}
					else if( $_GET["a"] =="thongketuan")
						{
							include('thongketuan.php');
						}
						else if( $_GET["a"] =="tim")
							{
							    include('timkiem.php');
							}
						if( $_GET["a"] =="quenmatkhau")
							{
							    include('quenmatkhau.php');
							}
						if( $_GET["a"] =="dangky")
							{
							    include('dangky.php');
							}
						else
							include("play.php");
							include("main.php");
}?>
				<?php include("album_nghe_nhieu.php");?>
				<div id="block-artist-hot"></div>
				<?php include("album_moi.php");?>
			</div>
			<div class="wrap-sidebar">
			<div id="topic-hot" class="widget widget-cate">
				<div class="part-cate-inside">
					<ul class="clearfix">
						<li>
							<a href="#" title="Nhạc Hot" class="_trackLink"> 
								<img src="images/banner-nhac-hot.jpg" class="img-responsive" alt="Nhạc Hot" /> 
								<span class="des">
									<span class="sum-pci">Website Mp3 sẽ mang đến các ca khúc HOT mới nhất, từ các nghệ sỹ bạn yêu thích.</span>
								</span>
							</a>
						</li>
						<li>
							<a href="#" title="Giáng Sinh 2017" class="_trackLink" > 
								<img src="images/banner-christmas.jpg" class="img-responsive" alt="Giáng Sinh 2017" /> 
								<span class="des"> 
									<span class="sum-pci">Mùa đẹp nhất trong năm đang đến gần, chìm đắm trong không gian tuyệt vời này cùng Website MP3</span>
								</span>
							</a>
						</li>
						<li>
							<a href="#" title="Âm Nhạc Cho Party" class="_trackLink" > 
								<img src="images/banner-party.jpg" class="img-responsive" alt="Âm Nhạc Cho Party" /> 
								<span class="des"> 
									<span class="sum-pci">Âm nhạc là thứ không thể thiếu trong bất cứ kì buổi tiệc nào.</span>
								</span>
							</a>
						</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
				<?php include('dangnhap.php');?>
				<?php include('form_timkiem.php');?>
				<?php include('baihathotnhat.php');?>
				<?php include('form_thongketuan.php');?>
			</div>
			<div class="clearfix"></div>
			<div class="partner-box"></div>
			<div class="clearfix"></div>
		</div>
	</div>
	<footer style="margin-bottom: 0;">
		<div class="container">
			<div class="row">
				<div class="col-4 copyright">
					<img itemprop="logo" src="images/logo.png" height="56" width="56" alt="Website MP3 - Đỉnh Cao Âm Nhạc" />
					<p> &copy; 2017 <span itemprop="name">Yến Trinh Tuyết</span> </p>
					<p>Website nghe nhạc miễn phí.</p>
				</div>
				<div class="col-5">
					<ul class="link-footer">
						<li><a title="Giới thiệu" rel="nofollow" href="#">Giới thiệu</a></li>
						<li><a title="Điều khoản" rel="nofollow" href="#">Điều khoản</a></li>
						<li><a title="Quảng cáo" rel="nofollow" href="#">Quảng cáo</a></li>
						<li><a title="Liên hệ" rel="nofollow" href="#">Liên hệ</a></li>
					</ul>
				</div>
				<div class="col-3">
					<ul class="social-sq">
						<li class="fb-sq"><a title="Website MP3 trên Facebook" href="#" rel="nofollow" target="_blank"></a></li>
						<li class="zl-sq"><a title="Website MP3 trên Zalo" class="fn-showhere" href="#" rel="nofollow" target="_blank"></a></li>
						<li class="gp-sq"><a title="Website MP3 trên Google Plus" href="#" rel="publisher" target="_blank"></a></li>
						<li class="yt-sq"><a title="Website MP3 trên Youtube" href="#" rel="nofollow" target="_blank"></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</footer>
</body>
<script type="text/javascript">
$(".fn-slide-show").each(function(){
	var t=this,e={dots:!1,prevArrow:$(".fn-prev",this),nextArrow:$(".fn-next",this),infinite:!0,speed:1500,slidesToShow:6,slidesToScroll:6};
	if(null!==$(this).data()&&$.extend(e,e,$(this).data()),null!==$(this).data("customNav")){
		var a=$($(this).data("customNav"));
		$(".fn-slide",this).slick(e).on("beforeChange",function(t,n,i,o){
			a.removeClass("active"),
			$(a[o/e.slidesToShow]).addClass("active")}),
			$(a[0]).addClass("active"),
			a.click(function(){
				return $(".fn-slide",t).slick("slickGoTo",
						$(this).data("ord")),!1})
				}else $(".fn-slide",this).slick(e);null!==$(t).data("cb")&&void 0!==window[$(t).data("cb")]&&$(".fn-slide",t).on("afterChange",function(e,a,n){
					var i=window[$(t).data("cb")];void 0!==i&&i.afterChange.apply(i,[a,n])})});

	 $("#feature li.dot").click(function () {
		var target = $(this).find("a");
		if (target != null && $(target).attr("href").length > 0) {
			var targetAttr = $(target).attr("target") ? $(target).attr("target") : "_blank";
			window.open($(target).attr("href"), targetAttr);
		}
	});

	$('#feature .fn-slide-show').each(function () {
		var _this = this;
		if ($(this).data('customNav') !== null) {
			var nav = $($(this).data('customNav'));
			nav.hover(function () {
				var index = $(this).data('ord');
				$('.fn-slide', _this).slick('slickGoTo', index, true);
			}, function () {});
		}
	});
</script>
</html>