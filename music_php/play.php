<?php
if($_REQUEST["mabh"]<>"")
{
	$ma_bai_hat=$_REQUEST["mabh"];
	$sql="select * from bai_hat, ca_si where bai_hat.ma_ca_si=ca_si.ma_ca_si AND ma_bai_hat=$ma_bai_hat";
	$result=$DB->query($sql);
	$row=$DB->fetch_row($result);
echo "<div class='player'><div tabindex='9999' style='height: 366px; width: 650px;'>
<video autoplay controls>
	<source src='$row[bai_hat]' type='video/mp4'>
	<source src='$row[bai_hat]' type='video/flv'>
	</video></div></div>";
 /*
	echo "<div ><OBJECT name='Mediaplayer' type='application/x-oleobject' CLASSID='CLSID:6BF52A52-394A-11D3-B153-00C04F79FAA6' codebase='http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701' width='100%' height='250' AutoStart='true'>
			<param name='url' value='$row[bai_hat]'>
			<param name='playCount' value='999'></param>
			<PARAM name='EnableContextMenu' value=1>
			<param NAME=volume VALUE=100>
			<EMBED playcount='999' type='application/x-mplayer2' quality='high' pluginspage='http://www.microsoft.com/Windows/MediaPlayer/' src='$row[bai_hat]' WIDTH='100%' HEIGHT='250' AutoStart='true' EnableContextMenu='1' Mute='0' ShowStatusBar='1' loop='true'></embed></object></div>";
     echo "<audio src='$row[bai_hat]' controls autoplay poster>
                <object data='mediaplayer.swf?audio=$row[bai_hat]'>
                <param name='movie' value='mediaplayer.swf?audio=$row[bai_hat]'>
                <p>Your browser does not support native audio or Flash. To listen, please <a href='$row[bai_hat]'>download</a> the mp3 file to your computer.</p>
                </object>
            </audio>"; */
	echo "<p style='font-weight:bold;'><a href='download.php?file=$row[bai_hat]'>Tải bài hát về máy</a></p>";
	echo "<p align=center>Bạn đang nghe ca khúc:<br><b>".$row[ten_bai_hat]."</b><br>Thể hiện:<b>".$row[ten_ca_si]."</b><br><img width='120px' height ='auto' src='upload_hinh/".$row[hinh]."' ></p>";

	$count=$row[luot_xem];
	$count++;
	$sql_update="update bai_hat set luot_xem=$count where ma_bai_hat=$ma_bai_hat";
	$DB->query($sql_update);
    //echo "<meta http-equiv='refresh' content='1;tatca.php' />";
?>
<script>
    function tailai(){
        window.location.reload();
    }
</script>
<?php
}
else
{
?>
<!--<embed src="images/flat/468x160.swf" width="100%" height="100" align='center' wmode="transparent">
</embed>-->
<div id="feature" class="slide fn-slide-show" data-fade="true" data-autoplay="true" data-arrows="false" data-slides-to-show="1" data-slides-to-scroll="1" data-infinite="true" data-speed="1000" data-custom-nav="#feature .dot">
	<div class="slide-body non-opacity">
		<div class="slide-scroll fn-slide">	 
			<a href="#" target="" title="Lỡ Yêu Mất Rồi" class="item _trackLink track-log" tracking="_frombox=#home_box_01">
				<img src="https://zmp3-photo.zadn.vn/banner/8/3/831e1b6642f62e4c8fc6592a529f314a_1512127494.jpg" alt="Lỡ Yêu Mất Rồi" />                
			</a>
			<a href="#" target="" title="Chưa Bao Giờ Mất Nhau" class="item _trackLink track-log" tracking="_frombox=#home_box_02">
				<img data-lazy="https://zmp3-photo.zadn.vn/banner/8/3/831e1b6642f62e4c8fc6592a529f314a_1512126823.jpg" alt="Chưa Bao Giờ Mất Nhau" />
			</a>
			<a href="#" target="" title="Yêu Chưa Bao Giờ Là Sai" class="item _trackLink track-log" tracking="_frombox=#home_box_03">
				<img data-lazy="https://zmp3-photo.zadn.vn/banner/8/3/831e1b6642f62e4c8fc6592a529f314a_1511953269.jpg" alt="Yêu Chưa Bao Giờ Là Sai" />
			</a>
			<a href="#" target="" title="Thấy Là Yêu Thương" class="item _trackLink track-log" tracking="_frombox=#home_box_04">
				<img data-lazy="https://zmp3-photo.zadn.vn/banner/e/9/e94b496225437632c47d43d4f4303d75_1510915756.jpg" alt="Thấy Là Yêu Thương" />
			</a>
			<a href="#" target="" title="I Still Believe" class="item _trackLink track-log" tracking="_frombox=#home_box_05">
				<img data-lazy="https://zmp3-photo.zadn.vn/banner/c/5/c5a64fec2d3c13b723639774df0220b1_1511338738.png" alt="I Still Believe" />
			</a>
		</div>
		<a href="#" class="zicon icon-arrow prev fn-prev"></a>
		<a href="#" class="zicon icon-arrow next fn-next"></a>
	</div>
	<div class="slide-thumb">
		<ul>
			<li class="dot" data-ord="0">
				<a href="#" target="" title="Lỡ Yêu Mất Rồi">
					<img width="124" height="50" src="https://zmp3-photo.zadn.vn/banner/8/3/831e1b6642f62e4c8fc6592a529f314a_1512127494.jpg" alt="Lỡ Yêu Mất Rồi" />
				</a>     
			</li>
			<li class="dot" data-ord="1">
				<a href="#" target="" title="Chưa Bao Giờ Mất Nhau">
					<img width="124" height="50" src="https://zmp3-photo.zadn.vn/banner/8/3/831e1b6642f62e4c8fc6592a529f314a_1512126823.jpg" alt="Chưa Bao Giờ Mất Nhau" />
				</a>     
			</li>
			<li class="dot" data-ord="2">
				<a href="#" target="" title="Yêu Chưa Bao Giờ Là Sai">
					<img width="124" height="50" src="https://zmp3-photo.zadn.vn/banner/8/3/831e1b6642f62e4c8fc6592a529f314a_1511953269.jpg" alt="Yêu Chưa Bao Giờ Là Sai" />
				</a>     
			</li>
			<li class="dot" data-ord="3">
				<a href="#" target="" title="Thấy Là Yêu Thương">
					<img width="124" height="50" src="https://zmp3-photo.zadn.vn/banner/e/9/e94b496225437632c47d43d4f4303d75_1510915756.jpg" alt="Thấy Là Yêu Thương" />
				</a>     
			</li>
			<li class="dot" data-ord="4">
				<a href="#" target="" title="I Still Believe">
					<img width="124" height="50" src="https://zmp3-photo.zadn.vn/banner/c/5/c5a64fec2d3c13b723639774df0220b1_1511338738.png" alt="I Still Believe" />
				</a>     
			</li>
		</ul>
	</div>
	<div class="clearfix"></div>
</div>
<?php
}
	/*$sql="select * from album order by ma_album DESC limit 12";
	$result=$DB->query($sql);
	$num=$DB->num_rows($result);
	if($num>=6)
	{
		echo "<p align=center>ALBUM MỚI</p>";
		$d=0;
		echo "<table align=center width=100% style='padding-top:7px' border=0>";
		while ($row=$DB->fetch_row($result))
		{
			$hinh="<img src='upload_hinh/hinh_nho/".$row[hinh]."'>";
			if($d%3==0)
				echo "<tr align=center>";

			echo "<td width=30% valign=top style='padding-top:10px'><a href='?a=theoalbum&maab=".$row[ma_album]."'>".$hinh."<br>".$row[ten_album]."</a></td>";
			$d++;

			if($d%3==0)
				echo "</tr>";
		}
		echo "</table>";

	}
}*/
?>