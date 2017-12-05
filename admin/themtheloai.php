<?php
if($_REQUEST["themtl"]<>"")
{
	$baoloi="";
	$ten_the_loai=trim($_POST["tentl"]);
	if($ten_the_loai=="")
	$baoloi.="Hãy nhập vào tên thể loại<br>";
	if(kt_co_the_loai_chua($ten_the_loai))
	$baoloi.="Đã có thể loại này trong CSDL";
	if($baoloi=="")
	{
		if($_SESSION['log']['ma_nguoi_dung']==17)
		{
			them_the_loai($ten_the_loai);
		}
		echo "<div align=center><font color=blue size=+1>Xin lỗi, bạn không có quyền này</font></div> <META http-equiv=refresh content=\"5; URL=?a=theloai\">";	
	}
	else echo "<div class='error_text' align=center>".$baoloi."</div>";	
}
?>
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="45%" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="2" align="center">THÊM THỂ LOẠI NHẠC </td>
    </tr>
    <tr>
      <td width="41%" align="right">Tên thể loại : </td>
      <td width="59%"><input name="tentl" type="text" id="tentl" size="30" maxlength="30"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="themtl" type="submit" id="themtl" value="Xác nhận"></td>
    </tr>
  </table>
</form>
