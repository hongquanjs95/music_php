<?php
if($_SESSION['log']['ok'])
{
    if($_REQUEST["mand"]<>"")
    {
    	$ma_nguoi_dung=$_REQUEST["mand"];
    	
    	$sql1="select ma_bai_hat from bai_hat where ma_nguoi_dung=$ma_nguoi_dung ";
    	$result1=$DB->query($sql1);
    	$count=$DB->num_rows($result1);
    	$limit=15;
    	$pages=$p->findpages($count, $limit);
    	$start=$p->findstart($limit);
    	
    	
    	$sql="select * from bai_hat, ca_si, nguoi_dung where bai_hat.ma_nguoi_dung=$ma_nguoi_dung and bai_hat.ma_ca_si=ca_si.ma_ca_si and bai_hat.ma_nguoi_dung=nguoi_dung.ma_nguoi_dung order by bai_hat.luot_xem desc limit $start, $limit";
    	$result=$DB->query($sql);
    	$num=$DB->num_rows($result);
    	if($num==0)
    	echo "Đang Cập Nhật";
    	else
    	{
    		$sql_cs="select ma_nguoi_dung from nguoi_dung where ma_nguoi_dung=$ma_nguoi_dung";
    		$row2=$DB->fetch_row($DB->query($sql_cs));
    		
    		?>
    		
    		<!--<div class="tieude" align="center">Có <?php echo $count;?> ca khúc của ca sĩ <b> <a href="#" title="Xem hình ca sĩ"><?php echo ucfirst($row2[ten_ca_si]);?></a></b> </div>-->
    		<div class="tieude" align="center">Có <?php echo $count;?> ca khúc</div>
    		<?php
    		while($row=$DB->fetch_row($result))
    		{
    		?>
    		<a href="?a=theonguoidang&mand=<?php echo $row[ma_nguoi_dung];?>
    		<?php
    		 if(isset($_REQUEST["page"])) echo "&page=".$_REQUEST["page"];
    		?>
    		&mabh=<?php echo $row[ma_bai_hat];?>
    		"><img src="images/music.gif" />
    		<?php echo ucfirst($row[ten_bai_hat]);?> <img title="Play" src="images/ten.gif" />			
    		</a><br />
    		<div class="casi"><?php echo ucfirst($row[ten_ca_si])." (View:".$row[luot_xem].")"?></div>
    		<?php
    		}
    		?>
    		<p align="center">
    			<?php 
    			$list=$p->pageList($_REQUEST["page"], $pages, "?a=theonguoidang&mand=$ma_nguoi_dung"); 
    			if($pages>1) echo $list;
    			?>
    		</p>
    	<?php
    	}	
    }    
}
else
echo "Bạn phải đăng nhập mới xem được playlist!";
?>