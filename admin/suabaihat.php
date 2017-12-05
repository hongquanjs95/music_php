<?php

	if($_REQUEST["sua"]<>"")
	{
		$error="";
		if(trim($_POST["ten_bai_hat"])=="")
		$error.="Ban chưa nhập tên bài hát<br>";
		if(trim($_POST["url"])=="")
		$error.="Bạn chưa chọn link đến bài hát<br>";
		
		if($error=="")
		{
			if($_SESSION['log']['ma_nguoi_dung']==17)
			{
				$ma_bai_hat=$_POST["ma_bh"];
				$ten_bai_hat=trim($_POST["ten_bai_hat"]);
				$ma_ca_si=$_POST["ca_si"];
				$ma_nhac_si=$_POST["nhac_si"];
				$ma_the_loai=$_POST["the_loai"];
				$ma_quoc_gia=$_POST["quoc_gia"];
				$ma_album=$_POST["album"];
				$bai_hat=trim($_POST["url"]);
				$loi_bai_hat=trim($_POST["loi_bai_hat"]);
				sua_bai_hat($ma_bai_hat, $ma_ca_si, $ma_nhac_si, $ma_album, $ma_the_loai, $ma_quoc_gia, $ten_bai_hat, $bai_hat, $loi_bai_hat);
			}	
			else
				echo "<div align=center><font color=blue size=+1>Xin lỗi, bạn không có quyền này</font></div> <META http-equiv=refresh content=\"5; URL=?a=baihat\">";	
			
		}
		else echo "<div class='error_text' align=center>".$error."</div>";
	}
	
if($_REQUEST["mabh"]<>"")
{
	$ma_bai_hat=$_REQUEST["mabh"];
	$sql0="select * from bai_hat where ma_bai_hat='$ma_bai_hat'";
	$result0=$DB->query($sql0);
	$num0=$DB->num_rows($result0);
	if($num0==0)
	{
		header("Location: ?a=baihat");
		exit();
	}
	else
	{
		$row0=$DB->fetch_row($result0);
		
?>

<form action="" method="post" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td colspan="2" align="center">SỬA BÀI HÁT </td>
    </tr>
    <tr>
      <td width="34%" align="right">Tên bài : </td>
      <td width="66%"><input name="ten_bai_hat" type="text" id="ten_bai_hat" size="42" value="<?php if(isset($_POST[ten_bai_hat])) echo $_POST["ten_bai_hat"]; else echo $row0[ten_bai_hat];?>">
        <input name="ma_bh" type="hidden" id="ma_bh" value="<?php echo  $row0[ma_bai_hat];?>" /></td>
    </tr>
    <tr>
      <td align="right">Ca sĩ thể hiện : </td>
      <td><select name="ca_si" >
	  
	  <?php
	  $sql1="select * from ca_si order by cs_order";
	  $result1=$DB->query($sql1);
	  while($row1=$DB->fetch_row($result1))
	  {
	  ?>
	  <option value="<?php echo $row1[ma_ca_si];?>" <?php if($row1[ma_ca_si]==$row0[ma_ca_si]) echo "selected='selected'";?>><?php echo $row1[ten_ca_si];?></option>
	  <?php
	  }
	  ?>
      </select>      </td>
    </tr>
    <tr>
      <td align="right">Nhạc sĩ : </td>
      <td><select name="nhac_si" id="nhac_si" >
	   
	  <?php
	  $sql2="select * from nhac_si order by ns_order";
	  $result2=$DB->query($sql2);
	  while($row2=$DB->fetch_row($result2))
	  {
	  ?>
	  <option value="<?php echo $row2[ma_nhac_si];?>" <?php if($row2[ma_nhac_si]==$row0[ma_nhac_si]) echo "selected='selected'";?>><?php echo $row2[ten_nhac_si];?></option>
	  <?php
	  }
	  ?>
      </select>      </td>
    </tr>
    <tr>
      <td align="right">Thể loại : </td>
      <td><select name="the_loai" id="the_loai" >
	  
	  <?php
	  $sql3="select * from the_loai order by tl_order";
	  $result3=$DB->query($sql3);
	  while($row3=$DB->fetch_row($result3))
	  {
	  ?>
	  <option value="<?php echo $row3[ma_the_loai];?>" <?php if($row3[ma_the_loai]==$row0[ma_the_loai]) echo "selected='selected'";?>><?php echo $row3[ten_the_loai];?></option>
	  <?php
	  }
	  ?>
      </select>      </td>
    </tr>
    <tr>
      <td align="right">Quốc gia : </td>
      <td><select name="quoc_gia" id="quoc_gia" >
	  
	  <?php
	  $sql4="select * from quoc_gia order by qg_order";
	  $result4=$DB->query($sql4);
	  while($row4=$DB->fetch_row($result4))
	  {
	  ?>
	  <option value="<?php echo $row4[ma_quoc_gia];?>" <?php if($row4[ma_quoc_gia]==$row0[ma_quoc_gia]) echo "selected='selected'";?>><?php echo $row4[ten_quoc_gia];?></option>
	  <?php
	  }
	  ?>
      </select>      </td>
    </tr>
    <tr>
      <td align="right">Album :</td>
      <td><select name="album" id="album" >
	  
	  <?php
	  $sql5="select * from album order by ab_order";
	  $result5=$DB->query($sql5);
	  while($row5=$DB->fetch_row($result5))
	  {
	  ?>
	  <option value="<?php echo $row5[ma_album];?>" <?php if($row5[ma_album]==$row0[ma_album]) echo "selected='selected'";?>><?php echo $row5[ten_album];?></option>
	  <?php
	  }
	  ?>
      </select>      </td>
    </tr>
    <tr>
      <td align="right">URL : </td>
      <td><textarea name="url" cols="40" id="url"><?php if(isset($_POST["url"])) echo $_POST["url"]; else echo $row0[bai_hat];?></textarea></td>
    </tr>
	<tr>
      <td align="right">Lời bài hát : </td>
      <td><textarea name="loi_bai_hat" cols="40" rows="5" id="loi_bai_hat"><?php if(isset($_POST["loi_bai_hat"])) echo $_POST["loi_bai_hat"]; else echo $row0[loi_bai_hat];?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="sua" type="submit" id="sua" value="Xác nhận"></td>
    </tr>
  </table>
</form>
<?php
}}
?>
