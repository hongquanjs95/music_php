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


 if(isset($_POST['add_album'])&&(($_POST['add_album']!="")))
 {


		$ten_album = $_POST["txt_ten_album"];
			$ab_order = $_POST["txtthutu"];
				$display = $_POST["txthienan"];
					$luot_click=0;
					$ngay_tao =date('Y-m-d');




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

      			$target_dir = "../upload_hinh/";
				$target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]);
 				 $tenhinhupload=  basename($_FILES["fileToUpload"]["name"]);

               move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
               // echo 'File Uploaded';

            }
        }
       /* else{
            echo 'Bạn chưa chọn file upload';
        }*/

$db->insert('album',array('ten_album'=>$ten_album,'ab_order'=>$ab_order,'display'=>$display,'luot_click'=>$luot_click,'ngay_tao'=>$ngay_tao,'hinh'=>$tenhinhupload));

  header("location:../Quantri.php?a=al_list");

 }






// trường hợp xóa các dòng đã chọn khi nhấn nút xóa chọn
 if(isset($_POST['submmit2']) && $_POST['submmit2']=='delete_all'){
    $sql = "DELETE FROM album WHERE ma_album IN (".implode(',',$_POST['id']).")";
   echo $sql;
    $result = $db->delete_all($sql);
    if($result==TRUE){
        header("location:../Quantri.php?a=al_list");
        exit();
    }else{
        echo "Lỗi ";
        die();
    }
}


?>