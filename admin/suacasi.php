<?php
if($_REQUEST["sua"]<>"")
{
	$baoloi="";
	if(trim($_POST["tencs"])=="")
	$baoloi.="Hãy nhập vào tên của ca sĩ<br>";
	if($_POST["hinhcu"]=="" && $_FILES["hinhmoi"]["name"]=="")
	$baoloi.="Hãy chọn hình ca sĩ<br>";
	if(!is_numeric($_POST["cs_order"]))
	$baoloi.="Vị trí trên menu phải là số!<br>";
	if($baoloi=="")
	{
		if($_SESSION['log']['ma_nguoi_dung']==17)
		{
			if($_POST["hinhcu"]=="" && $_FILES["hinhmoi"]["name"]<>"")
			{
				$hinh=upload_hinh_cs("hinhmoi");
				Save("../upload_hinh/".$hinh, "../upload_hinh/hinh_nho/".$hinh, 70);
			}
			else
			{
				$hinh=$_POST["hinhcu"];
			}
			$ma_ca_si=$_POST["ma_cs"];
			$ten_ca_si=trim($_POST["tencs"]);
			$cs_order=$_POST["cs_order"]; 
			$display=$_POST["display"];
			sua_tt_ca_si($ma_ca_si, $ten_ca_si, $hinh, $cs_order, $display);
		}
		else
			echo "<div align=center><font color=blue size=+1>Xin lỗi, bạn không có quyền này</font></div> <META http-equiv=refresh content=\"5; URL=?a=casi\">";		
	}
	else
	echo "<div align=center><font color=red>".$baoloi."</font></div>";

}

if($_REQUEST["macs"]<>"")
{
	$ma_ca_si=$_REQUEST["macs"];
	$sql="select * from ca_si where ma_ca_si='$ma_ca_si'";
	$result=$DB->query($sql);
	$num=$DB->num_rows($result);
	if($num==0)
	{
		header("Location: ?a=casi");
		exit();
	}
	else
		$row=$DB->fetch_row($result);
	{
	?>
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="66%" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="3" align="center">SỬA THÔNG TIN CA SĨ </td>
    </tr>
    <tr>
      <td width="42%" align="right">Tên ca sĩ : </td>
      <td colspan="2"><input name="tencs" type="text" id="tencs" value="<?php if(isset($_POST["tencs"])) echo $_POST["tencs"]; else echo $row[ten_ca_si];?>" size="30" maxlength="30">
      <input name="ma_cs" type="hidden" id="ma_cs" value="<?php echo $row[ma_ca_si];?>"></td>
    </tr>
    <tr>
      <td align="right">Vị trí trên menu : </td>
      <td colspan="2"><input name="cs_order" type="text" size="3" maxlength="3" value="<?php if(isset($_POST["cs_order"])) echo $_POST["cs_order"]; else echo $row[cs_order]; ?>"></td>
    </tr>
    <tr>
      <td align="right">Hiển thị trên menu : </td>
      <td colspan="2"><select name="display" id="display">
        <option value="1" <?php if($row[display]==1) echo "selected='selected'";?>>-Hiện-</option>
        <option value="0" <?php if($row[display]==0) echo "selected='selected'";?>>-Ẩn-</option>
      </select>      </td>
    </tr>
    <tr>
      <td align="right">Hình ca sĩ : </td>
      <td width="12%"><img src="<?php echo "../upload_hinh/hinh_nho/".$row[hinh]; ?>"></td>
      <td width="46%"><input name="hinhcu" type="checkbox" id="hinhcu" value="<?php echo $row[hinh];?>" checked="checked">
      Dùng hình này </td>
    </tr>
    <tr>
      <td align="right">Chọn hình khác : </td>
      <td colspan="2"><input name="hinhmoi" type="file" id="hinhmoi"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><input name="sua" type="submit" id="sua" value="Xác nhận"></td>
    </tr>
  </table>
</form>
<?php
}}
?>