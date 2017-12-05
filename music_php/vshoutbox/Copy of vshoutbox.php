
<?php
@session_start();
function kiemtra($nic)
{
	$trangthai= '<a href="ymsgr:sendim?'.$nic.'@yahoo.com.vn"><img src="http://opi.yahoo.com/online?u='.$nic.'&m=g&t=0" border=0></a>';
	return $trangthai;
}

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
	
	
	$sql2="select * from chatbox order by chatid DESC limit 10";
	$result2=mysql_query($sql2);
	while($row=mysql_fetch_assoc($result2))
	{	
		$a[]=$row[ym_nick];
		$b[]=$row[noidung];
		$c[]=$row[nicktmp];
	}
			
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="#000000">
<form id="form1" name="form1" method="post" action="" >
  <table bgcolor="#000000" width="100%" border="0"  align="center" cellpadding="0" cellspacing="0" style="margin:0px" >
    <tr>
      <td align="center">
	  <div align="left" style="background-color:#000000; width:163px; padding-left:3px; padding-right:2px; padding-bottom:15px; color:#FFFFFF; font-size:14px">
	  <?php 
	  for($i=count($a)-1; $i>=0; $i--)
	  { 
	  	$trangthai=kiemtra($a[$i]);
	  	echo $trangthai.$c[$i].": ".$b[$i]."<br>";
	  }
	  ?>
	  </div>	
	  </td>
    </tr>
    <tr>
      <td align="center"><input name="noidung" type="text" id="noidung" style="background-color:#000000; color:#FFFFFF; font-size:12px;border:1px solid #607697; padding-left:3px" onFocus="if(this.value=='Gõ nội dung chát vào đây!')this.value='';" onBlur="if(this.value=='')this.value='Gõ nội dung chát vào đây!';" value="Gõ nội dung chát vào đây!" size="29" maxlength="30"></td>
    </tr>
    <tr>
      <td align="center" style="padding-top:10px"><input type="submit" name="guitin" value="Chát Chít" style="color: #ffffff;background-color:#000000;border:1px solid #607697;" /></td>
    </tr>
    <tr>
      <td align="center" style="padding-top:10px"><?php echo $dd."<br>".$ee;?> </td>
    </tr>
  </table>
</form>
</body>