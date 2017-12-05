<?php
$sql="select * from album order by luot_click DESC limit 8";
	$result=$DB->query($sql);
	$num=$DB->num_rows($result);
?>
<div style="margin-top: 15px;">
	<h2 class="title-section">
		<a href="#" title="Album hot">Album hot <i class="icon-arrow"></i></a>
	</h2>
	<div class="row fn-list">
	<?php
	while ($row=$DB->fetch_row($result))
	{
		$hinh="<a href='?a=theoalbum&maab=".$row[ma_album]."' class='thumb fn-link _trackLink'> 
		<img src='upload_hinh/".$row[hinh]."' class='img-responsive fn-thumb' />
		<span class='icon-circle-play otr'></span> </a>";
	?>
		<div class="album-item col-3 fn-item">
		<?php echo $hinh?>
			<div class="des">
				<h3 class="title-item ellipsis-2">
					<a href="#" class="txt-primary fn-name fn-link _trackLink"> <?php echo $row[ten_album]?> </a>
				</h3>
			</div>
			<span class=" fn-badge"></span>
		</div>
	<?php }?>
	</div>
</div>