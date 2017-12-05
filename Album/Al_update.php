
<script type="text/javascript">
function checkform() {
   var error ="";
    if(document.myform.txt_ten_album.value == "") {

        error = error +"\n- Vui lòng nhập tên Album";

    }

        if(document.myform.txtthutu.value == "") {

        error = error +"\n- Vui lòng nhập thứ tự Album";


    }
            if(document.myform.txthienan.value == "") {

        error = error +"\n- Vui lòng nhập hiện hay ẩn Album 1-hiện 0-là ẩn";
        }

   if (error!="")
    {
       alert(error);
        return false;
       }
     else {
        document.myform.submit();
    }
}

</script>
<?
     	  // $db = new process_data();
$id = isset($_GET['id']) && $_GET['id']!=null? $_GET['id']:"";
$sql = "select * from album where ma_album=$id";


 $row =$db->get_row($sql);

 if ($row)
 {
  $ten_album = $row["ten_album"];
			$ab_order = $row["ab_order"];
				$display = $row["display"];
              $hinh =$row["hinh"];
 }
 else {
     echo "không thể lấy thông tin Album";
 }


 if(isset($_POST['update_album'])&&(($_POST['update_album']!="")))
 {


  // Xử Lý Upload


  $tenhinhupload=$hinh;
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
     //xóa file upload cũ nếu có
   $target_file_old =$target_dir . $hinh;
    echo $target_file_old ;
	  if (file_exists($target_file_old))
	  {
	  	unlink($target_file_old); // xóa file đã upload trong thư mục

	  }

  //  upload lại file
               move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);



            }
        }


   $db->update('album', array('ten_album'=>$_POST['txt_ten_album'],'ab_order'=>$_POST['txtthutu'],'display'=>$_POST['txthienan'],'hinh'=>$tenhinhupload),"ma_album=$id");

header("location:Quantri.php?a=al_list");

// nhận lại thông tin sau khi cập nhật
/*$sql = "select * from album where ma_album=$id";


 $row =$db->get_row($sql);

 if ($row)
 {
  $ten_album = $row["ten_album"];
			$ab_order = $row["ab_order"];
				$display = $row["display"];
              $hinh =$row["hinh"];
 }
 else {
     echo "không thể lấy thông tin Album";
 }*/


}






 //echo $ten_album;

?>

<form name ="myform" action="" method="post" enctype="multipart/form-data" >

	<div class="inputdata">
      <div class="title" >
      	 SITE CHỈNH SỬA ALBUM

      	</div>

       <div class="row">
      <div class="item">	 <label id="id"> Tên Album</label> </div>
       <div class="item">	 <input type="text" name="txt_ten_album" value="<? echo $ten_album;?>" style="width: auto"/> </div>
        <div class="item">	 <label id="tt"> Thứ tự</label> </div>
       	<div class="item">	 <input type="text" name="txtthutu" value="<? echo $ab_order;?>" style="width: 40px" /> </div>
     	 <div class="item">	 <label id="ha">hiện/ẩn</label> </div>
     	<div class="item">	 <input type="text" name="txthienan" value="<? echo $display;?>" style="width: 40px" /> </div>
     	 </div>
     	 <div class="row">

<div class="item">	 <label id="hinh">Tên hình đại diện:</label> <label id='tenhinh' name='tenhinh'><span style="color: red"><?echo $hinh?></span></label></div>
<div class="item">

	</div>
</div>
<div class="row">
<div class="item"><label nam="hdd"> Hình đại diện mới</label> </div>
<div class="item">	<input type="file"  name="fileToUpload" id="fileToUpload" value="Upload"> </div>

   </div>
    <div class="row">

<div class="item">	<button type="submit" class="btn" name="update_album" value="update_album" onclick="return checkform()" >Sửa Album</button>


	 </div>


	</div>


      		</div>


</form>