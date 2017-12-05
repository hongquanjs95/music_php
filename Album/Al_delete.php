<?php

 require_once '../process_DB.php';
 $db = new process_data();
 $id = isset($_GET['id']) && $_GET['id']!=null? $_GET['id']:"";
// echo $id."Trình Văn Dũng";
 $db ->delete("album","ma_album=$id");
		header("location:../Quantri.php?a=al_list");



?>