<?php
@session_start();
function kiemtra($nic)
{
	$trangthai= '<a href="ymsgr:sendim?'.$nic.'@yahoo.com.vn"><img src="http://opi.yahoo.com/online?u='.$nic.'&m=g&t=0" border=0></a>';
	return $trangthai;
}

mysql_connect("localhost", "root", "123456");
mysql_select_db("nhac");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META http-equiv="refresh" content="5">
</head>

<body bgcolor="#000000">
<table bgcolor="#000000" width="100%" border="0"  align="center" cellpadding="0" cellspacing="0" style="margin:0px" >
<tr>
      <td align="center">
	  <div align="left" style="background-color:#000000; width:163px; padding-left:3px; padding-right:2px; padding-bottom:15px; color:#FFFFFF; font-size:14px">
	 	<?php  
			  $sql="select * from chatbox order by chatid DESC limit 10";
			  $result=mysql_query($sql);
			  while($row=mysql_fetch_assoc($result))
			  {	
				$a[]=$row[ym_nick];
				$b[]=$row[noidung];
				$c[]=$row[nicktmp];
			  }
	  
			  for($i=count($a)-1; $i>=0; $i--)
			  { 
				$trangthai=kiemtra($a[$i]);
				echo $trangthai.$c[$i].": ".$b[$i]."<br>";
			  }  
	  	?>
	  </div>	
	  </td>
    </tr>
</table>
</body>
</html>
