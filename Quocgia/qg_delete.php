<?php

 require_once '../process_DB.php';
 $db = new process_data();
 $id = isset($_GET['id']) && $_GET['id']!=null? $_GET['id']:"";
 $db ->delete("quoc_gia","ma_quoc_gia=$id");
		header("location:../Quantri.php?a=qg_list");



?>