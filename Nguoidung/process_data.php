<?php


require_once '../process_DB.php';
 $db = new process_data();

// trường hợp thêm album khi nhấn nút thêm


 if(isset($_POST['add_nd'])&&(($_POST['add_nd']!="")))
 {


		$ten_nguoi_dung = $_POST["txt_ten_nd"];
			$ten_dang_nhap = $_POST["txttendangnhap"];
				$mat_khau = $_POST["txtmatkhau"];
				$email= $_POST["txtemail"];
					$ngay_tham_gia= date('Y-m-d');
					$quyen_admin =$_POST["txtquyen"];

				$db->insert('nguoi_dung',array('ten_nguoi_dung'=>$ten_nguoi_dung,'ten_dang_nhap'=>$ten_dang_nhap,'mat_khau'=>$mat_khau,'email'=>$email,'ngay_tham_gia'=>$ngay_tham_gia,'quyen_admin'=>$quyen_admin));
				 header("location:../Quantri.php?a=nd_list");

 }




// trường hợp xóa các dòng đã chọn khi nhấn nút xóa chọn
 if(isset($_POST['submmit2']) && $_POST['submmit2']=='delete_all'){
    $sql = "DELETE FROM nguoi_dung WHERE ma_nguoi_dung IN (".implode(',',$_POST['id']).")";
   echo $sql;
    $result = $db->delete_all($sql);
    if($result==TRUE){
        header("location:../Quantri.php?a=nd_list");
        exit();
    }else{
        echo "Lỗi ";
        die();
    }
}


?>