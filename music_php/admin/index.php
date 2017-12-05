<?php
ob_start();
@session_start();
require_once('../includes/config.php');
require_once('../includes/mysql.php');
require_once('../includes/functions.php');
require_once('../includes/class_pages.php');
require_once('../includes/HamKiemTraDuLieu.php');
require_once('adminfunction.php');
$DB = new DB;
$DB->connect();
$p=new pager;
if ($_SESSION['adminlog']['ok']!=TRUE) require_once('login.php');
else {
?>
<head>
<link href="../css/style_main.css" rel="stylesheet" type="text/css" />
<title>ADMIN MUSIC WEB</title>
<script language="JavaScript" src=""></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<table align="center" width="1240px" border="0" cellpadding="0" cellspacing="0" bgcolor="#000000"> 
	<tr>
		<td width="100%" ><img src="../images/687.gif " width="100%" height="250" /></td>
		
	</tr>
</table>
<table width="1240px" border="0" cellspacing="1" cellpadding="1" align="center">
  <tr>
    <th scope="col" width="200px" >Chào mừng <?php echo $_SESSION['log']['ten_dang_nhap'];?> <a href="?a=dangxuat">(logout)</a> </th>
    <th scope="col">&nbsp;</th>
  </tr>
  <tr valign="top">
    <td width="200px"><?php require_once('menu.php');?></td>
    <td >
        <div><a href="http://localhost:8080/musicweb" target="_blank"><strong style="color: red;">NHẤN VÀO ĐÂY ĐỂ VÀO TRANG CHỦ</strong></a></div>
        <?php require_once('main.php');?>
    </td>
  </tr>
</table>
<table id="footers" width="1240px" align="center" cellpadding="0" cellspacing="0">
<tr>
	<!--<td width="822"><img src="images/6879.jpg" width="100%" height="110" /></td>-->
	<th width="100%" height="150px" align="left" scope="col">
	<div>
    <div>Một sản phẩm của Nhóm</div>			
	<div>CopyRight@2016 MUSICWEB, All rights reserved.</div>
	<div>Mọi chi tiết xin liên hệ thainhut236@gmail.com</div>
	</div>
	</th>
</tr>
</table>
</body>
<?php }?>

