<div class="section mt20">
	<h2 class="title-section">
		<a href="#">THÊM BÀI HÁT</i></a>
	</h2>
<?php
if($_SESSION['log']['ok'])
{
	if($_REQUEST["Submit"]<>"")
	{
		$error="";
		if(trim($_POST["ten_bai_hat"])=="")
		$error.="Ban chưa nhập tên bài hát<br>";
		if(trim($_POST["url"])=="" && $_FILES["file"]["name"]=="")
		$error.="Bạn chưa chọn file hoặc url<br>";
		if(trim($_POST["url"])<>"" && $_FILES["file"]["name"]<>"")
		$error.="Bạn chỉ được chọn 1 trong 2 kiểu upload file<br>";
		if($error=="")
		{
			$ten_bai_hat=trim($_POST["ten_bai_hat"]);
			$ma_ca_si=$_POST["ca_si"];
			$ma_nhac_si=$_POST["nhac_si"];
			$ma_the_loai=$_POST["the_loai"];
			$ma_quoc_gia=$_POST["quoc_gia"];
			$ma_album=$_POST["album"];
			$ma_nguoi_dung=$_SESSION['log']['ma_nguoi_dung'];
			if($_FILES["file"]["name"]<>"")
			{
				$bai_hat=upload1("file");
				$bai_hat="upload_nhac/".$bai_hat;
			}
			else
			{
				$bai_hat=trim($_POST["url"]);
			}
			$ngay_dang=date("Y/m/d");
			them_bai_hat($ma_ca_si, $ma_nhac_si, $ma_album, $ma_the_loai, $ma_quoc_gia, $ma_nguoi_dung, $ten_bai_hat, $bai_hat, $ngay_dang);
			
		}
		else echo "<div class='error_text' align=center>".$error."</div>";
	}
?>
<form action="" method="post" enctype="multipart/form-data">
  <table width="60%" border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td width="20%" align="right"><label class="form-label">Tên bài:</label></td>
      <td width="40%"><input name="ten_bai_hat" type="text" id="ten_bai_hat" size="25" class="form-control"></td>
    </tr>
    <tr>
      <td align="right"><label class="form-label">Ca sĩ thể hiện:</label></td>
      <td><select name="ca_si" class="form-control">
	  
	  <?php
	  $sql1="select * from ca_si order by cs_order";
	  $result1=$DB->query($sql1);
	  while($row1=$DB->fetch_row($result1))
	  {
	  ?>
	  <option value="<?php echo $row1[ma_ca_si];?>" <?php if($row1[ma_ca_si]==29) echo "selected='selected'";?>><?php echo $row1[ten_ca_si];?></option>
	  <?php
	  }
	  ?>
      </select>      </td>
    </tr>
    <tr>
      <td align="right"><label class="form-label">Nhạc sĩ:</label></td>
      <td><select name="nhac_si" id="nhac_si" class="form-control">
	   
	  <?php
	  $sql2="select * from nhac_si order by ns_order";
	  $result2=$DB->query($sql2);
	  while($row2=$DB->fetch_row($result2))
	  {
	  ?>
	  <option value="<?php echo $row2[ma_nhac_si];?>" <?php if($row2[ma_nhac_si]==6) echo "selected='selected'";?>><?php echo $row2[ten_nhac_si];?></option>
	  <?php
	  }
	  ?>
      </select>      </td>
    </tr>
    <tr>
      <td align="right"><label class="form-label">Thể loại:</label</td>
      <td><select name="the_loai" id="the_loai" class="form-control" >
	  
	  <?php
	  $sql3="select * from the_loai order by tl_order";
	  $result3=$DB->query($sql3);
	  while($row3=$DB->fetch_row($result3))
	  {
	  ?>
	  <option value="<?php echo $row3[ma_the_loai];?>" <?php if($row3[ma_the_loai]==14) echo "selected='selected'";?>><?php echo $row3[ten_the_loai];?></option>
	  <?php
	  }
	  ?>
      </select>      </td>
    </tr>
    <tr>
      <td align="right"><label class="form-label">Quốc gia:</label></td>
      <td><select name="quoc_gia" id="quoc_gia"  class="form-control">
	  
	  <?php
	  $sql4="select * from quoc_gia order by qg_order";
	  $result4=$DB->query($sql4);
	  while($row4=$DB->fetch_row($result4))
	  {
	  ?>
	  <option value="<?php echo $row4[ma_quoc_gia];?>" <?php if($row4[ma_quoc_gia]==8) echo "selected='selected'";?>><?php echo $row4[ten_quoc_gia];?></option>
	  <?php
	  }
	  ?>
      </select>      </td>
    </tr>
    <tr>
      <td align="right"><label class="form-label">Album:</label></td>
      <td><select name="album" id="album" class="form-control" >
	  
	  <?php
	  $sql5="select * from album order by ab_order";
	  $result5=$DB->query($sql5);
	  while($row5=$DB->fetch_row($result5))
	  {
	  ?>
	  <option value="<?php echo $row5[ma_album];?>" <?php if($row5[ma_album]==16) echo "selected='selected'";?>><?php echo $row5[ten_album];?></option>
	  <?php
	  }
	  ?>
      </select>      </td>
    </tr>
    <tr>
      <td align="right"><label class="form-label">Chọn đường dẫn: </label></td>
      <td><label class="custom-file">
									<input name="file" type="file"  id="file" class="form-control custom-file-input">
									<span class="custom-file-control"></span>
								</label></td>
    </tr>
    <tr>
      <td align="right"><label class="form-label">Hoặc add URL: </label></td>
      <td><input name="url" type="text" id="url" size="25" class="form-control"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Thêm vào" class="btn form-control"></td>
    </tr>
  </table>
</form>
	</div>
<?php
}
else
echo "Bạn phải đăng nhập mới được upload bài hát!";
?>