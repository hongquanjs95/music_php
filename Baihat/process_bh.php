<?php


require_once '../process_DB.php';
 $db = new process_data();

// trường hợp thêm album khi nhấn nút thêm







// trường hợp xóa các dòng đã chọn khi nhấn nút xóa chọn
 if(isset($_POST['submmit2']) && $_POST['submmit2']=='delete_all'){
    $sql = "DELETE FROM bai_hat WHERE ma_bai_hat IN (".implode(',',$_POST['id']).")";


    $sql_duong_dan_bh = "select bai_hat FROM bai_hat WHERE ma_bai_hat IN (".implode(',',$_POST['id']).")";
    $music = $db->get_list($sql_duong_dan_bh);

	while ($r =mysqli_fetch_assoc($music))
	{
		 $pos =$r['bai_hat'];
		 $pos ="../".$pos;
   if (file_exists($pos))
	  {
	  	unlink($pos); // xóa bài hát đã upload nếu tồn tại

	  }

	}

    $result = $db->delete_all($sql);
    if($result==TRUE){
        header("location:../Quantri.php?a=bh_list");
        exit();
    }else{
        echo "Lỗi ";
        die();
    }
}


?>