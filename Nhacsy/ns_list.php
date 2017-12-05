<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
function checkform() {
   var error ="";
    if(document.myform.txt_ten_nhacsy.value == "") {

        error = error +"\n- Vui lòng nhập tên Nhạc sỹ";

    }

        if(document.myform.txtthutu.value == "") {

        error = error +"\n- Vui lòng nhập thứ tự Nhạc sỹ";


    }
            if(document.myform.txthienan.value == "") {

        error = error +"\n- Vui lòng nhập hiện hay ẩn Nhạc sỹ 1-hiện 0-là ẩn";
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
<form name ="myform" action="nhacsy/process_data.php" method="post" enctype="multipart/form-data" >

	<div class="inputdata">
      <div class="title" >
      	 SITE CẬP NHẬT Nhạc sỹ

      	</div>

       <div class="row">
      <div class="item">	 <label id="id"> Tên Nhạc sỹ</label> </div>
       <div class="item">	 <input type="text" name="txt_ten_nhacsy" value="" style="width: auto"/> </div>
        <div class="item">	 <label id="tt"> Thứ tự</label> </div>
       	<div class="item">	 <input type="text" name="txtthutu" value="" style="width: 40px" /> </div>
     	 <div class="item">	 <label id="ha">hiện/ẩn</label> </div>
       	<div class="item">	 <input type="text" name="txthienan" value="" style="width: 40px" /> </div>
<div class="item">	 <label id="hinh">Hình đại diện</label> </div>
<div class="item">	<input type="file"  name="fileToUpload" id="fileToUpload" value="Upload"> </div>

   </div>
    <div class="row">

<div class="item">	<button type="submit" class="btn" name="add_nhacsy" value="add_nhacsy" onclick="return checkform()" >Thêm Nhạc sỹ</button>


	 </div>


	</div>

<table class="table-fill">
<thead>

<tr>
<th class="text-left" width="5%" style="text-align:center"><input id="check_all" type="checkbox" /></th>
<th class="text-left"  style="width: 20px;">id</th>
<th class="text-left" style="width: auto;">Tên Nhạc sỹ</th>
<th class="text-left" style="width: 30px;">Thứ tự</th>
<th class="text-left" style="width: 30px;">hiện/ẩn</th>
<th class="text-left" style="width: 30px;">Xóa</th>
<th class="text-left" style="width: 30px;">Sửa</th>
</tr>
</thead>
<tbody class="table-hover">
<?php


  $result = $db->get_list('select * from nhac_si order by ns_order');

 while ($r =mysqli_fetch_assoc($result)) {


	 $id =$r["ma_nhac_si"];
	 $name = $r["ten_nhac_si"];
	  echo "<tr>";  ?>
	   <td align="center"><input class="checkitem" type="checkbox" name="id[]" value="<?php echo $r["ma_nhac_si"] ?>" /></td>

	 <? echo "<td class='text-left' style='width: 20px;'>".$r["ma_nhac_si"]."</td>";
	  	  echo "<td class='text-left' style='width: auto;'>".$r["ten_nhac_si"]."</td>";

		  	  echo "<td class='text-left' style='width: 30;'>".$r["ns_order"]."</td>";
	  	  	  echo "<td class='text-left' style='width: 30;'>".$r["display"]."</td>";


	    echo "<td class='text-left' style='width: 30px;'> <a href='Nhacsy/ns_delete.php?id=$id' onclick= \"javascript:return confirm('Bạn thực sự muốn xóa Nhạc sỹ $name không?');\"> Xóa </a></td>";
		 echo "<td class='text-left' style='width: 30px;'> <a href='quantri.php?a=ns_update&id=$id'>Sửa </a></td>";
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