<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
function checkform() {
   var error ="";
    if(document.myform.txt_ten_bh.value == "") {
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
<form name ="myform" action="Baihat/process_bh.php" method="post" enctype="multipart/form-data" >

	<div class="inputdata">
      <div class="title" >
      	 SITE CẬP NHẬT BÀI HÁT

      	</div>


    <div class="row">

<div class="item"> <a href="quantri.php?a=add_bh">	Thêm bài hát </a>


	 </div>


	</div>

<table class="table-fill">
<thead>

<tr>
<th class="text-left" width="5%" style="text-align:center"><input id="check_all" type="checkbox" /></th>

<th class="text-left" style="width: 300px;">Tên bài hát</th>
<th class="text-left" style="width: 150px;">ALbum</th>
<th class="text-left" style="width: 50px;">Người đăng</th>
<th class="text-left" style="width: 70px;">Ca sỹ thể hiện</th>
<th class="text-left" style="width: 30px;">Nhạc sỹ ST</th>
<th class="text-left" style="width: 50px;">Ngày đăng</th>
<th class="text-left" style="width: 30px;">Xóa</th>
<th class="text-left" style="width: 30px;">Sửa</th>

</tr>
</thead>
<tbody class="table-hover">
<?php

 $sql= "select h.ma_bai_hat,h.ten_bai_hat,h.bai_hat,b.ten_album,d.ten_nguoi_dung,c.ten_ca_si ,h.ngay_dang, n.ten_nhac_si from bai_hat as h,album as b,nguoi_dung as d,ca_si as c, nhac_si as n where h.ma_album=b.ma_album and h.ma_nguoi_dung=d.ma_nguoi_dung and h.ma_ca_si=c.ma_ca_si and h.ma_nhac_si =n.ma_nhac_si order by ngay_dang desc";
  $result = $db->get_list($sql);

 while ($r =mysqli_fetch_assoc($result)) {

	 $id =$r["ma_bai_hat"];
	 $name = $r["ten_bai_hat"];
	 $position = $r["bai_hat"];
//	$position =str_replace('/','-d-d-',$position);
	  echo "<tr>";  ?>
	   <td align="center"><input class="checkitem" type="checkbox" name="id[]" value="<?php echo $r["ma_bai_hat"] ?>" /></td>

	 <? echo "<td class='text-left' style='width: 300px;'>".$r["ten_bai_hat"]."</td>";
	  	  echo "<td class='text-left' style='width: 150px;'>".$r["ten_album"]."</td>";

		  	  echo "<td class='text-left' style='width: 150px;'>".$r["ten_nguoi_dung"]."</td>";
	  	  	  echo "<td class='text-left' style='width: 150px;'>".$r["ten_ca_si"]."</td>";
			echo "<td class='text-left' style='width: 150px;'>".$r["ten_nhac_si"]."</td>";
			echo "<td class='text-left' style='width: 100px;'>".$r["ngay_dang"]."</td>";


	    echo "<td class='text-left' style='width: 30px;'> <a href='Baihat/bh_delete.php?id=$id&pos=$position' onclick= \"javascript:return confirm('Bạn thực sự muốn xóa $name không?');\"> Xóa </a></td>";
		 echo "<td class='text-left' style='width: 30px;'> <a href='quantri.php?a=bh_update&id=$id'>Sửa </a></td>";
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