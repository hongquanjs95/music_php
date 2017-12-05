<?php
//Khai báo sử dụng session

	ob_start();
	session_start();
	require_once('includes/config.php');
	require_once('includes/mysql.php');
	require_once('includes/functions.php');
	require_once('includes/class_pages.php');
	require_once('includes/HamKiemTraDuLieu.php');

	$DB = new DB;
	$DB->connect();
	$DB->query("SET NAMES 'utf8'");
	$p=new pager;
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');

//Xử lý đăng nhập
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/style-login.css" rel="stylesheet" type="text/css" />
    </head>
    <body>


        <div class="login-page">
  <div class="form">
 <div class="title">
 <?
 if (isset($_POST['dangnhap']))
{
    //Kết nối tới database

    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['txtUsername']);
    $password = addslashes($_POST['txtPassword']);

	kt_dang_nhap_admin($username,  $password);



    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    // mã hóa pasword
   // $password = md5($password);

    //Kiểm tra tên đăng nhập có tồn tại không
    $query = mysql_query("SELECT ten_dang_nhap, mat_khau,quyen_admin FROM nguoi_dung WHERE ten_dang_nhap='$username'");
    if (mysql_num_rows($query) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    //Lấy mật khẩu trong database ra
    $row = mysql_fetch_array($query);

    //So sánh 2 mật khẩu có trùng khớp hay không

if ($password != $row['mat_khau']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại <a href='javascript: history.go(-1)'>Trở lại</a>";

    }
	else
       if (trim($row['quyen_admin'])<>1) {
        echo "Bạn không có quyền đăng nhập để quản trị <a href='javascript: history.go(-1)'>Trở lại</a>";

    }
	   else {
		     $_SESSION['login'] = $username;
             header("location:quantri.php?a=al_list");

	   }
    //Lưu tên đăng nhập

}
?>

 </div>
    <form class="login-form" method="post" action="">
      <input type="text" name="txtUsername" placeholder="Tên đăng nhập"/>
      <input type="password" name='txtPassword' placeholder="Mật khẩu"/>
      <button type='submit' name="dangnhap" value='dangnhap' style="margin-left:30px;">Đăng nhập</button>

    </form>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="jquery/login.js"></script>
    </body>
</html>