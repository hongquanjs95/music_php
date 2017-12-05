<div id="topic-hot" class="widget widget-cate">
	<div class="part-cate-inside">
		<h2 class="title-section sz-title-sm fs19">
			<a class="fn-detail_link" href="#">TÌM KIẾM NÂNG CAO</a>
		</h2>
    <form name="form1" method="post" action="?a=tim">
      <select name="luachon" id="luachon" class="form-control">
          <option value="tenbai" <?php if($_POST["luachon"]=="tenbai") echo "selected='selected'";?>>Tên Của Bài Hát</option>
          <option value="album" <?php if($_POST["luachon"]=="album") echo "selected='selected'";?>>Tên Album</option>
          <option value="casi" <?php if($_POST["luachon"]=="casi") echo "selected='selected'";?>>Tên ca sĩ</option>
          <option value="nhacsi" <?php if($_POST["luachon"]=="nhacsi") echo "selected='selected'";?>>Tên nhạc sĩ</option>
          <option value="nguoidang" <?php if($_POST["luachon"]=="nguoidang") echo "selected='selected'";?>>Tên người đăng</option>
          <!--<option value="video" <?php if($_POST["luachon"]=="video") echo "selected='selected'";?>>Video Clip</option>-->
      </select>
      <input class="form-control" name="tukhoa" type="text" id="tukhoa" size="23" value="<?php if(isset($_POST["tukhoa"])) echo  $_POST["tukhoa"];?>">
      <input class="btn form-control" name="timkiem" type="submit" id="timkiem" value="Tìm kiếm">
		</form>
	</div>
	<div class="clearfix"></div>
</div>