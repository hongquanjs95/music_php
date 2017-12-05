<?php
if($_REQUEST["themns"]<>"")
{
	$baoloi="";
	$ten_nhac_si=trim($_POST["tenns"]);
	if($ten_nhac_si=="")
	$baoloi.="Hãy nhập vào tên nhạc sĩ<br>";
	if($_FILES["hinhns"]["name"]=="")
	$baoloi.="Hãy chọn hình của nhạc sĩ<br>";
	if(kt_co_nhac_si_chua($ten_nhac_si))
	$baoloi.="Đã có nhạc sĩ này trong CSDL";
	if($baoloi=="")
	{
		if($_SESSION['log']['ma_nguoi_dung']==17)
		{
			$hinh=upload_hinh_cs("hinhns");
			Save("../upload_hinh/".$hinh, "../upload_hinh/hinh_nho/".$hinh, 70);
			them_nhac_si($ten_nhac_si, $hinh);
		}
		else
			echo "<div align=center><font color=blue size=+1>Xin lỗi, bạn không có quyền này</font></div> <META http-equiv=refresh content=\"5; URL=?a=nhacsi\">";		
	}
	else echo "<div class='error_text' align=center>".$baoloi."</div>";	
}
?>
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="48%" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="2" align="center">THÊM NHẠC SĨ </td>
    </tr>
    <tr>
      <td width="45%" align="right">Tên nhạc sĩ : </td>
      <td width="55%"><input name="tenns" type="text" id="tenns" size="30" maxlength="30"></td>
    </tr>
    <tr>
      <td align="right">Hình nhạc sĩ : </td>
      <td><input name="hinhns" type="file" id="hinhns"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="themns" type="submit" id="themns" value="Xác nhận"></td>
    </tr>
  </table>
</form>
