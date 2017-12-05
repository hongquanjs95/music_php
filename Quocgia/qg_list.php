<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
function checkform() {
   var error ="";
    if(document.myform.txt_ten_qg.value == "") {

        error = error +"\n- Vui lòng nhập tên Thể loại nhạc";

    }

        if(document.myform.txtthutu.value == "") {

        error = error +"\n- Vui lòng nhập thứ tự xuất hiện";


    }
            if(document.myform.txthienan.value == "") {

        error = error +"\n- Vui lòng nhập hiện hay ẩn thể loại 1-hiện 0-là ẩn";
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
<form name ="myform" action="Quocgia/process_data.php" method="post" enctype="multipart/form-data" >

	<div class="inputdata">
      <div class="title" >
      	 SITE CẬP NHẬT QUỐC GIA

      	</div>


       <div class="row">
      <div class="item">	 <label id="id"> Tên Quốc gia</label> </div>
       <div class="item">	 <input type="text" name="txt_ten_quocgia" value="" style="width: auto"/> </div>
        <div class="item">	 <label id="tt"> Thứ tự</label> </div>
       	<div class="item">	 <input type="text" name="txtthutu" value="" style="width: 40px" /> </div>
     	 <div class="item">	 <label id="ha">hiện/ẩn</label> </div>
       	<div class="item">	 <input type="text" name="txthienan" value="" style="width: 40px" /> </div>



   </div>
    <div class="row">

<div class="item">	<button type="submit" class="btn" name="add_quocgia" value="add_quocgia" onclick="return checkform()" >Thêm Quốc gia</button>


	 </div>


	</div>

<table class="table-fill">
<thead>

<tr>
<th class="text-left" width="5%" style="text-align:center"><input id="check_all" type="checkbox" /></th>
<th class="text-left"  style="width: 20px;">id</th>
<th class="text-left" style="width: auto;">Quốc gia</th>
<th class="text-left" style="width: 30px;">Thứ tự</th>
<th class="text-left" style="width: 30px;">hiện/ẩn</th>

<th class="text-left" style="width: 30px;">Xóa</th>
<th class="text-left" style="width: 30px;">Sửa</th>
</tr>
</thead>
<tbody class="table-hover">
<?php


  $result = $db->get_list('select * from quoc_gia order by qg_order');

 while ($r =mysqli_fetch_assoc($result)) {


	 $id =$r["ma_quoc_gia"];
	 $name = $r["ten_quoc_gia"];
	  echo "<tr>";  ?>
	   <td align="center"><input class="checkitem" type="checkbox" name="id[]" value="<?php echo $r["ma_quoc_gia"] ?>" /></td>

	 <? echo "<td class='text-left' style='width: 20px;'>".$r["ma_quoc_gia"]."</td>";
	  	  echo "<td class='text-left' style='width: auto;'>".$r["ten_quoc_gia"]."</td>";

		  	  echo "<td class='text-left' style='width: 30;'>".$r["qg_order"]."</td>";
	  	  	  echo "<td class='text-left' style='width: 30;'>".$r["display"]."</td>";

	    echo "<td class='text-left' style='width: 30px;'> <a href='Quocgia/qg_delete.php?id=$id' onclick= \"javascript:return confirm('Bạn thực sự muốn xóa $name không?');\"> Xóa </a></td>";
		 echo "<td class='text-left' style='width: 30px;'> <a href='quantri.php?a=qg_update&id=$id'>Sửa </a></td>";
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