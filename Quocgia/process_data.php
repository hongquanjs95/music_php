<?php


require_once '../process_DB.php';
 $db = new process_data();

// trường hợp thêm album khi nhấn nút thêm


 if(isset($_POST['add_quocgia'])&&(($_POST['add_quocgia']!="")))
 {


		$ten_the_loai = $_POST["txt_ten_quocgia"];
			$qg_order = $_POST["txtthutu"];
				$display = $_POST["txthienan"];

				$db->insert('quoc_gia',array('ten_quoc_gia'=>$ten_the_loai,'qg_order'=>$qg_order,'display'=>$display));
				 header("location:../Quantri.php?a=qg_list");

 }




// trường hợp xóa các dòng đã chọn khi nhấn nút xóa chọn
 if(isset($_POST['submmit2']) && $_POST['submmit2']=='delete_all'){
    $sql = "DELETE FROM quoc_gia WHERE ma_quoc_gia IN (".implode(',',$_POST['id']).")";
 //  echo $sql;
    $result = $db->delete_all($sql);
    if($result==TRUE){
        header("location:../Quantri.php?a=qg_list");
        exit();
    }else{
        echo "Lỗi ";
        die();
    }
}


?>