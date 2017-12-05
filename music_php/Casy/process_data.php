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


 if(isset($_POST['add_casy'])&&(($_POST['add_casy']!="")))
 {


		$ten_ca_si = $_POST["txt_ten_casy"];
			$cs_order = $_POST["txtthutu"];
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

$db->insert('ca_si',array('ten_ca_si'=>$ten_ca_si,'cs_order'=>$cs_order,'display'=>$display,'hinh'=>$tenhinhupload));

  header("location:../Quantri.php?a=cs_list");

 }






// trường hợp xóa các dòng đã chọn khi nhấn nút xóa chọn
 if(isset($_POST['submmit2']) && $_POST['submmit2']=='delete_all'){
    $sql = "DELETE FROM ca_si WHERE ma_ca_si IN (".implode(',',$_POST['id']).")";
   //echo $sql;
    $result = $db->delete_all($sql);

        header("location:../Quantri.php?a=cs_list");

}


?>