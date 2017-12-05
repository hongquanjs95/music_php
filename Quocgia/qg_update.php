
<script type="text/javascript">
function checkform() {
   var error ="";
    if(document.myform.txt_ten_quocgia.value == "") {

        error = error +"\n- Vui lòng nhập tên Quốc gia";

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
$sql = "select * from quoc_gia where ma_quoc_gia=$id";


 $row =$db->get_row($sql);

 if ($row)
 {
  $ten_quoc_gia = $row["ten_quoc_gia"];
			$qg_order = $row["qg_order"];
				$display = $row["display"];

 }
 else {
     echo "không thể lấy thông tin thể loại";
 }


 if(isset($_POST['update_qg'])&&(($_POST['update_qg']!="")))
 {

  // Xử Lý Upload

     $db->update('quoc_gia', array('ten_quoc_gia'=>$_POST['txt_ten_quocgia'],'qg_order'=>$_POST['txtthutu'],'display'=>$_POST['txthienan']),"ma_quoc_gia=$id");

header("location:Quantri.php?a=qg_list");


}


?>

<form name ="myform" action="" method="post" enctype="multipart/form-data" >

	<div class="inputdata">
      <div class="title" >
      	 SITE CHỈNH SỬA QUỐC GIA

      	</div>

       <div class="row">
      <div class="item">	 <label id="id"> Quốc gia</label> </div>
       <div class="item">	 <input type="text" name="txt_ten_quocgia" value="<? echo $ten_quoc_gia;?>" style="width: auto"/> </div>
        <div class="item">	 <label id="tt"> Thứ tự</label> </div>
       	<div class="item">	 <input type="text" name="txtthutu" value="<? echo $qg_order;?>" style="width: 40px" /> </div>
     	 <div class="item">	 <label id="ha">hiện/ẩn</label> </div>
     	<div class="item">	 <input type="text" name="txthienan" value="<? echo $display;?>" style="width: 40px" /> </div>
     	 </div>


    <div class="row">

<div class="item">	<button type="submit" class="btn" name="update_qg" value="update_qg" onclick="return checkform()" >Sửa Quốc gia</button>


	 </div>


	</div>


      		</div>


</form>