<link style="text/css" rel="stylesheet" href="css/style_quantri.css" />
 <div id="manager">
 	<div id="head">
  <div class="item">
  	 <a  href="index.php">HOME</a>

  </div>
    <div class="item">
  	 <form action="" method="post">
  	 	<button type="submit" name="logout" value="logout"> Thoát</button>

  	 </form>

  </div>
 <div class="item">
 	 <h3>   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  TRANG QUẢN TRỊ HỆ THỐNG WEBSITE</h3> </div>

 	</div>
  <div id="left_m">

  <?

    session_start();

	@session_start();
	require_once('includes/config.php');
	require_once('includes/mysql.php');
	require_once('includes/functions.php');
	require_once('includes/class_pages.php');
	require_once('includes/HamKiemTraDuLieu.php');

	$DB = new DB;
	$DB->connect();
	$DB->query("SET NAMES 'utf8'");
	$p=new pager;


     require_once 'menucontrol.html';
     require_once 'process_DB.php';
	 $db = new process_data();

  if(isset($_POST['logout']) && $_POST['logout']<>null)
  {


	header("location:index.php");
	unset($_SESSION['login']);
	exit;
  }




if(!(isset($_SESSION['login']) && $_SESSION['login'] != '')){
                header ("Location: login.php");
            }

   ?>
  </div>
  <div id ="right_m">
  	<?
  	 if (isset($_GET["a"]) && $_GET["a"]!=null)
	 {   $a = $_GET["a"];

	 	  switch ($a) {
			   case 'al_list': require 'Album/Al_list.php';

			 	   break;
                 case 'al_update': require 'Album/Al_update.php';

			 	   break;

				    case 'tl_list': require 'Theloai/tl_list.php';

				  break;

					case 'tl_update': require 'Theloai/tl_update.php';

			 	   break;

 					case 'cs_list': require 'Casy/cs_list.php';

				  break;

					case 'cs_update': require 'Casy/cs_update.php';

			 	   break;

						case 'ns_list': require 'Nhacsy/ns_list.php';

				  break;

					case 'ns_update': require 'Nhacsy/ns_update.php';

			 	   break;


			 		case 'qg_list': require 'Quocgia/qg_list.php';

				  break;

					case 'qg_update': require 'Quocgia/qg_update.php';

			 	   break;


				case 'nd_list': require 'Nguoidung/nd_list.php';

				  break;

					case 'nd_update': require 'Nguoidung/nd_update.php';

			 	   break;

					case 'bh_list': require 'Baihat/bh_list.php';

				  break;

					case 'bh_update': require 'Baihat/bh_update.php';

			 	   break;
					case 'add_bh': require 'Baihat/add_bh.php';

			 	   break;

			   default:

				   break;
		   }
	 }

  	?>

  </div>

 <div class="clear"></div> <!-- để cho thẻ manager tăng trưởng theo nội dung con!-->

 </div>