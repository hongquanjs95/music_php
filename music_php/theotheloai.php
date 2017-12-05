<?php
if($_REQUEST["matl"]<>"")
{
	$ma_the_loai=$_REQUEST["matl"];
	
	$sql1="select ma_the_loai from bai_hat where ma_the_loai=$ma_the_loai ";
	$result1=$DB->query($sql1);
	$count=$DB->num_rows($result1);
	$limit=15;
	$pages=$p->findpages($count, $limit);
	$start=$p->findstart($limit);
	
	$sql="select * from bai_hat, ca_si, the_loai where bai_hat.ma_the_loai=$ma_the_loai and bai_hat.ma_ca_si=ca_si.ma_ca_si and bai_hat.ma_the_loai=the_loai.ma_the_loai order by bai_hat.luot_xem desc limit $start, $limit";
	$result=$DB->query($sql);
	$num=$DB->num_rows($result);
	if($num==0)
	echo "Đang Cập Nhật";
	else
	{
		
		$sql_ns="select ten_the_loai from the_loai where ma_the_loai=$ma_the_loai";
		$row2=$DB->fetch_row($DB->query($sql_ns));
	?>
		
		<!--<div class="tieude" align="center">Có <?php echo $count;?> ca khúc thuộc thể loại <b><?php echo ucfirst($row2[ten_the_loai]);?></b> </div>-->
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
								<a href="?a=theotheloai&matl=<?php echo $row[ma_the_loai];?>
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
				$list=$p->pageList($_REQUEST["page"], $pages, "?a=theotheloai&matl=$ma_the_loai"); 
				if($pages>1) echo $list;
				?>
				</ul>
			</div>
        </div>
	<?php
	}	
}
?>