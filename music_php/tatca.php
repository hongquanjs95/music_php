<?php

	$sql1="select ma_bai_hat from bai_hat";
	$result1=$DB->query($sql1);
	$count=$DB->num_rows($result1);
	$limit=5;
	$pages=$p->findpages($count, $limit);
	$start=$p->findstart($limit);


	$sql="select * from bai_hat, ca_si where bai_hat.ma_ca_si=ca_si.ma_ca_si order by luot_xem desc limit $start, $limit";
	$result=$DB->query($sql);
	$num=$DB->num_rows($result);
	if($num==0)
	echo "Đang Cập Nhật";
	else
	{
	?>
	<div class="section">
		<div class="realtime-chart">
			<div class="head-rc clearfix">
				<h2 class="title-section">
					<a href="#">Tất cả bài hát <i class="icon-arrow"></i></a>
					<a href="#" title="NGHE NGẪU NHIÊN" class="play-all icon-play-all pull-right" style="display: block;"></a>
				</h2>
			</div>
			<div class="body-rc" id="rtsong">
				<ul id="list-item">
				<?php
				while($row=$DB->fetch_row($result))
				{
				?>
				<li class="fn-item">
					<div class="item-rc ">
						<a class="avatar-song thumb fn-link _trackLink" href="#">
							<img src="upload_hinh/<?php echo ucfirst($row[hinh]); ?>" class="img-responsive fn-thumb">
							<span class="icon-circle-play icon-small"></span>
						</a>
						<div class="label-rank top-1">1</div>
						<div class="label-rank-status"><span class="s-rank stand"></span></div>
						<div class="desc-song">
							<p class="title">
								<a class="fn-name fn-link _trackLink" onclick="tailai()" href="?a=tatca<?php if(isset($_REQUEST['page'])) echo "&page=".$_REQUEST['page'];?>
		&mabh=<?php echo $row[ma_bai_hat];?>"><?php echo ucfirst($row[ten_bai_hat]);?>
								</a>
							</p>
							<p class="sub-title"> <a href="#"><?php echo ucfirst($row[ten_ca_si])?></a> </p>
						</div>
						<div class="tool-song">
							<div class="i25 i-small video"><a class="fn-video_link" href="#"></a></div>
						</div>
						<div class="num-song"><?php echo $row[luot_xem]?></div>
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
			<?php $list=$p->pageList($_REQUEST["page"], $pages, "?a=tatca");if($pages>1) echo $list;
			}
			?>
			</ul>
		</div>
	</div>