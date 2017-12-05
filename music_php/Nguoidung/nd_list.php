<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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

    $(function(){
        /* Check/bỏ chek hết tất cả các records */
        $(document).on('change','#check_all', function(ev){
            $('.checkitem').prop('checked', this.checked).trigger('change');
        });
        /* Check/bỏ chek từng records */
        $(document).on('change','.checkitem', function(ev){
            var _dem = 0;
            var _checked = 1;
            /* Duyệt tất cả các checkitem */
            $('.checkitem').each(function(){
                if($(this).is(':checked')){
                    _dem ++;
                }else{
                    _checked = 0;
                }
            });
            $('#check_all').prop('checked', _checked);
            if(_dem > 0){
                // Hiện nút xóa chọn
                $('button[name=submmit2]').show();
            }else{
                // Ẩn nút xóa chọn
                $('button[name=submmit2]').hide();
            }
        });
    });
</script>
<form name ="myform" action="Nguoidung/process_data.php" method="post" enctype="multipart/form-data" >

	<div class="inputdata">
      <div class="title" >
      	 SITE CẬP NHẬT NGƯỜI SỬ DỤNG

      	</div>

       <div class="row">

       <div class="item">	 <input type="text" name="txt_ten_nd"  placeholder="Tên người sử dụng" style="width: auto"/> </div>
       	<div class="item">	 <input type="text" name="txttendangnhap"  placeholder="Tên đăng nhập" style="width: 200px" /> </div>
        <div class="item">	 <input type="text" name="txtmatkhau" value="" placeholder="Mật khẩu" style="width: 200px" /> </div>
   </div>
        <div class="row">
        	<div class="item"><input type="text" name="txtemail"  placeholder="Email" style="width: auto"/></div>
        	<div class="item"><input type="text" name="txtquyen"  placeholder="Quyền admin 1:admin, 0:thành viên" style="width: 300"/></div>

        	</div>
    <div class="row">

<div class="item">	<button type="submit" class="btn" name="add_nd" value="add_nd" onclick="return checkform()" >Thêm người sử dụng</button>


	 </div>


	</div>

<table class="table-fill">
<thead>

<tr>
<th class="text-left" width="5%" style="text-align:center"><input id="check_all" type="checkbox" /></th>
<th class="text-left"  style="width: 20px;">ID</th>
<th class="text-left" style="width: auto;">Tên người sử dụng</th>
<th class="text-left" style="width: 80px;">Tên đăng nhập</th>
<th class="text-left" style="width: 50px;">Mật khẩu</th>
<th class="text-left" style="width: 70px;">Email</th>
<th class="text-left" style="width: 30px;">Quyền admin</th>
<th class="text-left" style="width: 50px;">Ngày tham gia</th>
<th class="text-left" style="width: 30px;">Xóa</th>
<th class="text-left" style="width: 30px;">Sửa</th>

</tr>
</thead>
<tbody class="table-hover">
<?php


  $result = $db->get_list('select * from nguoi_dung');

 while ($r =mysqli_fetch_assoc($result)) {


	 $id =$r["ma_nguoi_dung"];
	 $name = $r["ten_nguoi_dung"];
	  echo "<tr>";  ?>
	   <td align="center"><input class="checkitem" type="checkbox" name="id[]" value="<?php echo $r["ma_nguoi_dung"] ?>" /></td>

	 <? echo "<td class='text-left' style='width: 20px;'>".$r["ma_nguoi_dung"]."</td>";
	  	  echo "<td class='text-left' style='width: auto;'>".$r["ten_nguoi_dung"]."</td>";

		  	  echo "<td class='text-left' style='width: 80px;'>".$r["ten_dang_nhap"]."</td>";
	  	  	  echo "<td class='text-left' style='width: 50px;'>".$r["mat_khau"]."</td>";
			echo "<td class='text-left' style='width: 70px;'>".$r["email"]."</td>";
				echo "<td class='text-left' style='width: 30px;'>".$r["quyen_admin"]."</td>";
					echo "<td class='text-left' style='width: 50px;'>".$r["ngay_tham_gia"]."</td>";

	    echo "<td class='text-left' style='width: 30px;'> <a href='Nguoidung/nd_delete.php?id=$id' onclick= \"javascript:return confirm('Bạn thực sự muốn xóa $name không?');\"> Xóa </a></td>";
		 echo "<td class='text-left' style='width: 30px;'> <a href='quantri.php?a=nd_update&id=$id'>Sửa </a></td>";
	   echo "</tr>";

  }
?>


</tbody>
<tfoot>
                <td colspan="9">
                  <button type="submit" class="btn" name="submmit2" value="delete_all" style="display:none">Xóa chọn</button>


                </td>
            </tfoot>
</table>

      		</div>


</form>