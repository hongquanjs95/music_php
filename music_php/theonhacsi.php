<?php
if($_REQUEST["mans"]<>"")
{
	$ma_nhac_si=$_REQUEST["mans"];
	
	$sql1="select ma_bai_hat from bai_hat where ma_nhac_si=$ma_nhac_si ";
	$result1=$DB->query($sql1);
	$count=$DB->num_rows($result1);
	$limit=15;
	$pages=$p->findpages($count, $limit);
	$start=$p->findstart($limit);
	
	$sql="select * from bai_hat, ca_si, nhac_si where bai_hat.ma_nhac_si=$ma_nhac_si and bai_hat.ma_ca_si=ca_si.ma_ca_si and bai_hat.ma_nhac_si=nhac_si.ma_nhac_si order by bai_hat.luot_xem desc limit $start, $limit";
	$result=$DB->query($sql);
	$num=$DB->num_rows($result);
	if($num==0)
	echo "<div class='wrap-content'>            
	<div class='section mt20'>
		<h2 class='title-section'>
			<a href='#'> Đang cập nhật<i class='icon-arrow'></i></a>
		</h2></div></div><div class='list-item full-width'>
		<ul><li class='group fn-song'></li></ul></div>";
	else
	{
		
		$sql_ns="select ten_nhac_si from nhac_si where ma_nhac_si=$ma_nhac_si";
		$row2=$DB->fetch_row($DB->query($sql_ns));
	?>
		
		<!--<div class="tieude" align="center">Có <?php echo $count;?> ca khúc của nhạc sĩ <b><?php echo ucfirst($row2[ten_nhac_si]);?></b> </div>-->
		<div class="wrap-content">            
            <div class="section mt20">
				<h2 class="title-section">
					<a href="#"> Có <?php echo $count;?> ca khúc <i class="icon-arrow"></i></a>
				</h2>
				<div class="list-item full-width">
   		 			<ul>
						<?php
						while($row=$DB->fetch_row($result))
						{
						?>
        				<li class="group fn-song">
							<div class="pull-left">
								<h3 class="txt-primary ellipsis w560">
								<a href="?a=theonhacsi&mans=<?php echo $row[ma_nhac_si];?>
		<?php
		 if(isset($_REQUEST["page"])) echo "&page=".$_REQUEST["page"];
		?>
		&mabh=<?php echo $row[ma_bai_hat];?>
		" class="_trackLink"> <?php echo ucfirst($row[ten_bai_hat]);?> - <span><?php echo ucfirst($row[ten_ca_si])." (View:".$row[luot_xem].")"?></span>
									</a>
								</h3>
							</div>
							<div class="bar-chart">
								<span class="fn-bar" data-total="" style="width:0;"></span>
							</div>
							<div class="tool-song">
								<div class="i25 i-small download">
									<a title="Tải về" class="fn-dlsong" data-item="#songZW8WOFI7" href="#"></a>
								</div>
							</div>
						</li>
						<?php
						}
						?>
				    </ul>
				</div>
            </div>
			<div class="pagination">
				<ul>
				<?php 
				$list=$p->pageList($_REQUEST["page"], $pages, "?a=theoquocgia&maqg=$ma_quoc_gia"); 
				if($pages>1) echo $list;
				?>
				</ul>
			</div>
        </div>
	<?php
	}	
}
?>