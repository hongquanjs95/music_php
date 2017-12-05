<?php

 require_once '../process_DB.php';
 $db = new process_data();
 $id = isset($_GET['id']) && $_GET['id']!=null? $_GET['id']:"";
 $pos = isset($_GET['pos']) && $_GET['pos']!=null? $_GET['pos']:"";

 $pos ="../".$pos;
   if (file_exists($pos))
	  {
	  	unlink($pos); // xóa bài hát đã upload nếu tồn tại

	  }

 $db ->delete("bai_hat","ma_bai_hat=$id");
		header("location:../Quantri.php?a=bh_list");



?>