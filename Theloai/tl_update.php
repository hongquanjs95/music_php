
<script type="text/javascript">
function checkform() {
   var error ="";
    if(document.myform.txt_ten_theloai.value == "") {

        error = error +"\n- Vui lòng nhập tên thể loại";

    }

        if(document.myform.txtthutu.value == "") {

        error = error +"\n- Vui lòng nhập thứ tự ";


    }
            if(document.myform.txthienan.value == "") {

        error = error +"\n- Vui lòng nhập hiện hay ẩn  1-hiện 0-là ẩn";
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
$sql = "select * from the_loai where ma_the_loai=$id";


 $row =$db->get_row($sql);

 if ($row)
 {
  $ten_the_loai = $row["ten_the_loai"];
			$tl_order = $row["tl_order"];
				$display = $row["display"];

 }
 else {
     echo "không thể lấy thông tin thể loại";
 }


 if(isset($_POST['update_tl'])&&(($_POST['update_tl']!="")))
 {

  // Xử Lý Upload

     $db->update('the_loai', array('ten_the_loai'=>$_POST['txt_ten_theloai'],'tl_order'=>$_POST['txtthutu'],'display'=>$_POST['txthienan']),"ma_the_loai=$id");

header("location:Quantri.php?a=tl_list");


}


?>

<form name ="myform" action="" method="post" enctype="multipart/form-data" >

	<div class="inputdata">
      <div class="title" >
      	 SITE CHỈNH SỬA THỂ LOẠI NHẠC

      	</div>

       <div class="row">
      <div class="item">	 <label id="id"> Thể loại nhạc</label> </div>
       <div class="item">	 <input type="text" name="txt_ten_theloai" value="<? echo $ten_the_loai;?>" style="width: auto"/> </div>
        <div class="item">	 <label id="tt"> Thứ tự</label> </div>
       	<div class="item">	 <input type="text" name="txtthutu" value="<? echo $tl_order;?>" style="width: 40px" /> </div>
     	 <div class="item">	 <label id="ha">hiện/ẩn</label> </div>
     	<div class="item">	 <input type="text" name="txthienan" value="<? echo $display;?>" style="width: 40px" /> </div>
     	 </div>


    <div class="row">

<div class="item">	<button type="submit" class="btn" name="update_tl" value="update_tl" onclick="return checkform()" >Sửa Thể loại nhạc</button>


	 </div>


	</div>


      		</div>


</form>