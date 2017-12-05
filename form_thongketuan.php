<?php
  $date = date('Y-m-d');
  while (date('w', strtotime($date)) != 1) {
    $tmp = strtotime('-1 day', strtotime($date));
    $date = date('Y-m-d', $tmp);
  }

  $week = date('W', strtotime($date));
  $week1 = date('W', strtotime($date))-1;
  $week2 = date('W', strtotime($date))-2;
  $week3 = date('W', strtotime($date))-3;
  $week4 = date('W', strtotime($date))-4;
  //echo "Tuần thứ: " . $week ;
?>
<div id="topic-hot" class="widget widget-cate">
	<div class="part-cate-inside">
		<h2 class="title-section sz-title-sm fs19">
			<a class="fn-detail_link" href="#">THỐNG KÊ BÀI HÁT THEO TUẦN</a>
		</h2>
    <form name="form1" method="post" action="?a=thongketuan">
      <select name="luachons" id="luachons" class="form-control">
        <option value="md" <?php if($_POST["luachontk"]=="md") echo "selected='selected'";?>>Chọn tuần thống kê</option>
        <option value="<?php echo $week; ?>" <?php if($_POST["luachontk"]=="$week") echo "selected='selected'";?>><?php echo "Tuần thứ: " . $week ; ?></option>
        <option value="<?php echo $week1; ?>" <?php if($_POST["luachon"]=="$week1") echo "selected='selected'";?>><?php echo "Tuần thứ: " . $week1; ?></option>
        <option value="<?php echo $week2; ?>" <?php if($_POST["luachon"]=="$week2") echo "selected='selected'";?>><?php echo "Tuần thứ: " . $week2; ?></option>
        <option value="<?php echo $week3; ?>" <?php if($_POST["luachon"]=="$week3") echo "selected='selected'";?>><?php echo "Tuần thứ: " . $week3; ?></option>
        <option value="<?php echo $week4; ?>" <?php if($_POST["luachon"]=="$week4") echo "selected='selected'";?>><?php echo "Tuần thứ: " . $week4; ?></option>
        <!--<option value="video" <?php if($_POST["luachon"]=="video") echo "selected='selected'";?>>Video Clip</option>-->
      </select>
      <input class="btn form-control" name="thongke" type="submit" id="timkiem" value="Thống kê">
		</form>
	</div>
	<div class="clearfix"></div>
</div>