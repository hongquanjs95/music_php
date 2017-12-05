<?php
$a = $_REQUEST['a'];
switch ($a)
{
	case 'theocasi' 	     : include('theocasi.php');
		break;
	case 'theonhacsi' 	     : include('theonhacsi.php');
		break;
	case 'theotheloai' 	     : include('theotheloai.php');
		break;
	case 'theoalbum' 	     : include('theoalbum.php');
		break;
	case 'theoquocgia' 	     : include('theoquocgia.php');
		break;
    case 'theonguoidang' 	 : include('playlist.php');
		break;
	case 'lienhe'            : include('lienhe.php');
        break;
	case 'tatca' 	         : include('tatca.php');
		break;
	case 'dangxuat' 	     : include('dangxuat.php');
		break;
	case 'thaydoitt' 	     : include('tt_nguoidung.php');
		break;
	default   			     : include('tatca.php');
		break;
}
?>
