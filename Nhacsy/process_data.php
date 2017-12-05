<?php

/* require_once '../process_DB.php';
 $db = new process_data();
 $id = isset($_GET['id']) && $_GET['id']!=null? $_GET['id']:"";
// echo $id."Trình Văn Dũng";
 $db ->delete("album","ma_album=$id");
		header("location:../Quantri.php?a=al_list");
 *
 */
require_once '../process_DB.php';
 $db = new process_data();

// trường hợp thêm album khi nhấn nút thêm


 if(isset($_POST['add_nhacsy'])&&(($_POST['add_nhacsy']!="")))
 {


		$ten_nhac_si = $_POST["txt_ten_nhacsy"];
			$ns_order = $_POST["txtthutu"];
				$display = $_POST["txthienan"];


 			$tenhinhupload="";
 // Xử Lý Upload

        // Nếu người dùng có chọn file để upload
        if ($_FILES['fileToUpload']['name']!=null)
        {

            if ($_FILES['fileToUpload']['error'] > 0)
            {
                echo 'File Upload Bị Lỗi';
            }
            else{
                // Upload file

      			$target_dir = "upload_hinh/";
				$target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]);
 			    $tenhinhupload=  basename($_FILES["fileToUpload"]["name"]);
    			//echo $target_file;
               move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
               // echo 'File Uploaded';
            }
        }
       /* else{
            echo 'Bạn chưa chọn file upload';
        }*/

$db->insert('nhac_si',array('ten_nhac_si'=>$ten_nhac_si,'ns_order'=>$ns_order,'display'=>$display,'hinh'=>$tenhinhupload));

  header("location:../Quantri.php?a=ns_list");

 }






// trường hợp xóa các dòng đã chọn khi nhấn nút xóa chọn
 if(isset($_POST['submmit2']) && $_POST['submmit2']=='delete_all'){
    $sql = "DELETE FROM nhac_si WHERE ma_nhac_si IN (".implode(',',$_POST['id']).")";
   //echo $sql;
    $result = $db->delete_all($sql);

        header("location:../Quantri.php?a=ns_list");

}


?>