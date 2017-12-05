<?php

 require_once '../process_DB.php';
 $db = new process_data();
 $id = isset($_GET['id']) && $_GET['id']!=null? $_GET['id']:"";
 $db ->delete("nguoi_dung","ma_nguoi_dung=$id");
		header("location:../Quantri.php?a=nd_list");



?>