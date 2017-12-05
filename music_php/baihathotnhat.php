<?php

	$sql1="select ma_bai_hat from bai_hat";
	$result1=$DB->query($sql1);
	$count=$DB->num_rows($result1);
	//$limit=10;
	//$pages=$p->findpages($count, $limit);
	//$start=$p->findstart($limit);


	//$sql="select * from bai_hat, ca_si where bai_hat.ma_ca_si=ca_si.ma_ca_si order by ngay_dang desc limit $start, $limit";
    $sql="select * from bai_hat, ca_si where bai_hat.ma_ca_si=ca_si.ma_ca_si order by ma_bai_hat desc limit 26";
	$result=$DB->query($sql);
	$num=$DB->num_rows($result);
	if($num==0)
	echo "Đang Cập Nhật";
	else
	{
	?>
	<div class="widget widget-tab">
					<h2 class="title-section sz-title-sm fs19">
						<a class="fn-detail_link" href="#"> Bài Hát Hot <i class="icon-arrow"></i></a>
					</h2>
					<div class="tab-pane widget-song-countdown chart-song ">
						<div class="widget-content no-padding no-border">
							<ul class="fn-list">
								<?php
									while($row=$DB->fetch_row($result))
									{
									?>
								<li class="fn-item fn-song" >
									<div class="w260 ">
										<span class="rank fn-order">01</span>
										<h3 class="song-name ellipsis">
											<a class="txt-primary _trackLink" onclick="tailai()" href="?a=tatca<?php if(isset($_REQUEST['page'])) echo "&page=".$_REQUEST['page'];?>
									&mabh=<?php echo $row[ma_bai_hat];?>"><?php echo ucfirst($row[ten_bai_hat]);?></a>
										</h3>
										<div class="inblock singer-name ellipsis">
											<h4 class="title-sd-item txt-info">
												<a><?php echo ucfirst($row[ten_ca_si])." (View:".$row[luot_xem].")"?></a>
											</h4>
										</div>
										<i id="song-score-ZW8W6UEF"
											class="txt-info pull-right view-stas fn-score"></i>
										<div class="tool-song">
											<div class="i25 i-small icon-play-all">
												<a class="fn-dlsong" href="#"></a>
											</div>
										</div>
									</div>
								</li>
								<?php
								}
								?>
							</ul>
					</div>
				</div>
			</div>
		<!--<p align="center">
		<?php $list=$p->pageList($_REQUEST["page"], $pages, "?a=tatca");if($pages>1) echo $list;?>
		</p>-->
	<?php
	}
?>