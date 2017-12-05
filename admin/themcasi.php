<?php
if($_REQUEST["themcs"]<>"")
{
	$baoloi="";
	$ten_ca_si=trim($_POST["tencs"]);
	if($ten_ca_si=="")
	$baoloi.="Hãy nhập vào tên ca sĩ<br>";
	if($_FILES["hinhcs"]["name"]=="")
	$baoloi.="Hãy chọn hình của ca sĩ<br>";
	if(kt_co_ca_si_chua($ten_ca_si))
	$baoloi.="Đã có ca sĩ này trong CSDL";
	if($baoloi=="")
	{
		if($_SESSION['log']['ma_nguoi_dung']==17)
		{
			$hinh=upload_hinh_cs("hinhcs");
			Save("../upload_hinh/".$hinh, "../upload_hinh/hinh_nho/".$hinh, 70);
			them_ca_si($ten_ca_si, $hinh);
		}
		else
			echo "<div align=center><font color=blue size=+1>Xin lỗi, bạn không có quyền này</font></div> <META http-equiv=refresh content=\"5; URL=?a=casi\">";		
	}
	else echo "<div class='error_text' align=center>".$baoloi."</div>";	
}
?>
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="45%" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="2" align="center">THÊM CA SĨ </td>
    </tr>
    <tr>
      <td width="33%" align="right">Tên ca sĩ : </td>
      <td width="67%"><input name="tencs" type="text" id="tencs" size="30" maxlength="30"></td>
    </tr>
    <tr>
      <td align="right">Hình ca sĩ : </td>
      <td><input name="hinhcs" type="file" id="hinhcs"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="themcs" type="submit" id="themcs" value="Xác nhận"></td>
    </tr>
  </table>
</form>
