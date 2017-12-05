<?php

 require_once '../process_DB.php';
 $db = new process_data();
 $id = isset($_GET['id']) && $_GET['id']!=null? $_GET['id']:"";
 $db ->delete("the_loai","ma_the_loai=$id");
		header("location:../Quantri.php?a=tl_list");



?>