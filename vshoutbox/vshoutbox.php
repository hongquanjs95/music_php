
<?php
@session_start();
mysql_connect("localhost", "root", "123456");
mysql_select_db("nhac");
if($_REQUEST["guitin"]<>"")
{
	if($_SESSION['log']['ok'])
	{
		$ym_nick=$_SESSION['log']['email'];
		$ym_nick=explode("@", "$ym_nick");
		$ym_nick=$ym_nick[0];
		$noidung=trim($_POST["noidung"]);
		$diachi_ip=getenv("REMOTE_ADDR");
		$nicktmp=$_SESSION['log']['ma_nguoi_dung'];
		$nicktmp="MS_".$nicktmp;
		$sql="insert into chatbox (chatid, ym_nick, nicktmp, noidung, diachi_ip)
							values ('', '$ym_nick', '$nicktmp', '$noidung', '$diachi_ip')";
		mysql_query($sql);
		
	}
}			
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="#000000">
<form id="form1" name="form1" method="post" action="" >
  <table bgcolor="#000000" width="100%" border="0"  align="center" cellpadding="0" cellspacing="0" style="margin:0px" >
    <tr>
      <td align="center"><input name="noidung" type="text" id="noidung" style="background-color:#000000; color:#FFFFFF; font-size:12px;border:1px solid #607697; padding-left:3px" onFocus="if(this.value=='Gõ nội dung chát vào đây!')this.value='';" onBlur="if(this.value=='')this.value='Gõ nội dung chát vào đây!';" value="Gõ nội dung chát vào đây!" size="29" maxlength="30"></td>
    </tr>
    <tr>
      <td align="center" style="padding-top:10px"><input type="submit" name="guitin" value="Chát Chít" style="color: #ffffff;background-color:#000000;border:1px solid #607697;" /></td>
    </tr>
    <tr>
      <td align="center" style="padding-top:10px"></td>
    </tr>
  </table>
</form>
</body>