
<?php
if($_REQUEST["mabh"]<>"")
{
    if($_REQUEST["them"]<>"")
   	{
   	    if($_SESSION['log']['ok'])
        {
            $error="";
    		if(trim($_POST["loibaihat"])=="")
    		$error.="Ban chưa nhập lời bài hát<br>";
    		if($error=="")
    		{
                $ma_bai_hat=$_REQUEST["mabh"];
    			$loi_bai_hat=trim($_POST["loibaihat"]);
    			$ma_nguoi_dung=$_SESSION['log']['ma_nguoi_dung'];
    			them_loi_bai_hat($ma_bai_hat, $loi_bai_hat);
    			
    		}
    		else echo "<div class='error_text' align=center>".$error."</div>";
        }
    	else
            echo "<p><font color=#ff0000>Bạn phải đăng nhập mới được thêm lời bài hát!</font></p>";	
   	}
     
?>
<div class="space"></div>
<div class="spbc">
<?php
$sql="select * from bai_hat where ma_bai_hat=".$_REQUEST["mabh"];
$result=$DB->query($sql);
$row=$DB->fetch_row($result);
if($row[loi_bai_hat]<>"")
{
echo "<p align='center'><b>LỜI BÀI HÁT:</b><br>".nl2br($row[loi_bai_hat])."</p>";
}
else 
{
		//echo "<p align='center'>Bài hát này hiện chưa có lời.<br>Bạn có thể <a href='# ' onclick='a.style=display' title='Viết lời cho ca khúc' ><font color=#3366ff>thêm lời cho bài hát này</font></a></p>";
        echo "<p align='center'>Bài hát này hiện chưa có lời.<br>Bạn có thể thêm lời cho bài hát này</p>";
?>
<form id="form1" name="form1" method="post" action="">
  <textarea name="loibaihat" style="width: 300px; height: 100px;/*display:none*/"></textarea>
  <div class="space"></div>
  <input name="them" type="submit" id="them" value="Thêm">
</form>
<div class="space"></div>
<?php
}
?>
</div>
<?php
}
?>

