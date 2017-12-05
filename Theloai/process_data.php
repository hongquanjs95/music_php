<?php


require_once '../process_DB.php';
 $db = new process_data();

// trường hợp thêm album khi nhấn nút thêm


 if(isset($_POST['add_theloai'])&&(($_POST['add_theloai']!="")))
 {


		$ten_the_loai = $_POST["txt_ten_theloai"];
			$tl_order = $_POST["txtthutu"];
				$display = $_POST["txthienan"];

				$db->insert('the_loai',array('ten_the_loai'=>$ten_the_loai,'tl_order'=>$tl_order,'display'=>$display));
				 header("location:../Quantri.php?a=tl_list");

 }




// trường hợp xóa các dòng đã chọn khi nhấn nút xóa chọn
 if(isset($_POST['submmit2']) && $_POST['submmit2']=='delete_all'){
    $sql = "DELETE FROM the_loai WHERE ma_the_loai IN (".implode(',',$_POST['id']).")";
   echo $sql;
    $result = $db->delete_all($sql);
    if($result==TRUE){
        header("location:../Quantri.php?a=tl_list");
        exit();
    }else{
        echo "Lỗi ";
        die();
    }
}


?>