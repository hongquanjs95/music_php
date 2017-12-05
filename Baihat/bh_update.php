
<script type="text/javascript">
function checkform() {

    var error ="";
    if(document.myform.txt_ten_nd.value == "") {
        error = error +"\n- Vui lòng nhập tên Thể người dùng";    }
        if(document.myform.txttendangnhap.value == "") {
        error = error +"\n- Vui lòng nhập tên đăng nhập";
            }
            if(document.myform.txtmatkhau.value == "") {
                  error = error +"\n- Vui lòng nhập mật khẩu";
            }
              if(document.myform.txtemail.value == "") {
                  error = error +"\n- Vui lòng nhập email";
            }
    }
              if(document.myform.txtquyen.value == "") {
                  error = error +"\n- Vui lòng nhập quyền người sử dụng 1-admin; 0 -thành viên";
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
$sql = "select * from nguoi_dung where ma_nguoi_dung=$id";


 $row =$db->get_row($sql);

 if ($row)
 {
				$ten_nguoi_dung = $row["ten_nguoi_dung"];
				$ten_dang_nhap = $row["ten_dang_nhap"];
				$mat_khau = $row["mat_khau"];
				$email= $row["email"];
				$quyen_admin =$row["quyen_admin"];




 }
 else {
     echo "không thể lấy thông tin thể về người sử dụng";
 }


 if(isset($_POST['update_nd'])&&(($_POST['update_nd']!="")))
 {

  // Xử Lý Upload

     $db->update('nguoi_dung', array('ten_nguoi_dung'=>$_POST['txt_ten_nd'],'ten_dang_nhap'=>$_POST['txttendangnhap'],'mat_khau'=>$_POST['txtmatkhau'],'email'=>$_POST['txtemail'],'quyen_admin'=>$_POST['txtquyen']),"ma_nguoi_dung=$id");

header("location:Quantri.php?a=nd_list");


}


?>

<form name ="myform" action="" method="post" enctype="multipart/form-data" >

	<div class="inputdata">
      <div class="title" >
      	 SITE CẬP NHẬT NGƯỜI SỬ DỤNG

      	</div>

       <div class="row">
      <div class="item">	 <label id="id"> Tên người sử dụng</label> </div>

          <div class="item">	 <input type="text" name="txt_ten_nd" value="<? echo $ten_nguoi_dung;?>" style="width: auto"/> </div>
    </div>
    <div class="row">
        <div class="item">	 <label id="tt"> Tên đăng nhập</label> </div>
       	<div class="item">	 <input type="text" name="txttendangnhap" value="<? echo $ten_dang_nhap;?>" style="width: 200px" /> </div>


     	 <div class="item">	 <label id="ha">Mật khẩu</label> </div>
     	<div class="item">	 <input type="text" name="txtmatkhau" value="<? echo $mat_khau;?>" style="width: 200px" /> </div>
     	</div>
     	<div class="row">
     		<div class="item">	 <label id="em">Email</label> </div>
     		<div class="item">	 <input type="text" name="txtemail" value="<? echo $email;?>" style="width: 200px" /> </div>

  <div class="item">	 <label id="q">Quyền admin</label> </div>
  	<div class="item">	 <input type="text" name="txtquyen" value="<? echo $quyen_admin;?>" style="width: 30px" /> </div>

</div>





    <div class="row">

<div class="item">	<button type="submit" class="btn" name="update_nd" value="update_nd" onclick="return checkform()" >Sửa </button>


	 </div>


	</div>


      		</div>


</form>