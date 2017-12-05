<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
function checkform() {
   var error ="";
    if(document.myform.ten_bai_hat.value == "") {

        error = error +"\n- Vui lòng nhập tên bài hát";

    }

     var answer=document.getElementById("album");
 if(answer[answer.selectedIndex].value == "chonalbum") {

 error = error +"\n- Vui lòng chọn Album";

 }

     var answer1=document.getElementById("ca_si");
 if(answer1[answer1.selectedIndex].value == "choncasi") {

 error = error +"\n- Vui lòng chọn ca sĩ";

 }

     var answer2=document.getElementById("nhac_si");
 if(answer2[answer2.selectedIndex].value == "chonnhacsi") {

 error = error +"\n- Vui lòng chọn nhạc sĩ";

 }

     var answer3=document.getElementById("the_loai");
 if(answer3[answer3.selectedIndex].value == "chondongnhac") {

 error = error +"\n- Vui lòng chọn dòng nhạc";

 }


      var answer4=document.getElementById("quoc_gia");
 if(answer4[answer4.selectedIndex].value == "chonquocgia") {

 error = error +"\n- Vui lòng chọn quốc gia";

 }


var  fu1 = document.getElementById("file").value;
var url =document.getElementById("url").value;
 if((fu1=="") && (url==""))
 {
 	 error = error +"\n- Vui lòng chọn đính kèm bài hát hoặc url đến bài hát";
 }
 else

  if ((fu1 !="") && (url !=""))
 {
 	 error = error +"\n- bạn chỉ có thể đính kèm bài hát hoặc url đến bài hát, không được chọn cả hai";
 }


/*
         var selectmenu=document.getElementById("ca_si")
    $casi = this.options[this.selectedIndex].value

        if($casi == "choncasi) {

        error = error +"\n- Vui lòng chọn ca sĩ";
        }*/





   if (error!="")
    {
       alert(error);
        return false;
       }
     else {

        document.myform.submit();
    }
}

</script>

<?php




if($_SESSION['log']['ok'])
{
	if(isset($_POST['add_bh'])&&(($_POST['add_bh']!="")))


	{
		$error="";
		if(trim($_POST["ten_bai_hat"])=="")
		$error.="Ban chưa nhập tên bài hát<br>";
		if(trim($_POST["url"])=="" && $_FILES["file"]["name"]=="")
		$error.="Bạn chưa chọn file hoặc url<br>";
		if(trim($_POST["url"])<>"" && $_FILES["file"]["name"]<>"")
		$error.="Bạn chỉ được chọn 1 trong 2 kiểu upload file<br>";
		if($error=="")
		{
			$ten_bai_hat=trim($_POST["ten_bai_hat"]);
			$ma_ca_si=$_POST["ca_si"];
			$ma_nhac_si=$_POST["nhac_si"];
			$ma_the_loai=$_POST["the_loai"];
			$ma_quoc_gia=$_POST["quoc_gia"];
			$ma_album=$_POST["album"];


			$ma_nguoi_dung =$_SESSION['log']['ma_nguoi_dung'];
			if($_FILES["file"]["name"]<>"")
			{
				$bai_hat=upload_admin("file");
				$bai_hat="upload_nhac/".$bai_hat;
			}
			else
			{
				$bai_hat=trim($_POST["url"]);
			}
			$ngay_dang=date("Y/m/d");
			them_bai_hat_admin($ma_ca_si, $ma_nhac_si, $ma_album, $ma_the_loai, $ma_quoc_gia, $ma_nguoi_dung, $ten_bai_hat, $bai_hat, $ngay_dang);
  //	"($ma_ca_si, $ma_nhac_si, $ma_album, $ma_the_loai, $ma_quoc_gia, $ma_nguoi_dung, $ten_bai_hat, $bai_hat, $ngay_dang)"; exit;

		}
		else echo "<div class='error_text' align=center>".$error."</div>";
	}
?>

<form name ="myform" action="" method="post" enctype="multipart/form-data" >
 <div class="inputdata">
      <div class="title" >    THÊM BÀI HÁT </div>
    <div class="row">
    	<div class="item"> Tên bài : 	</div>

    	<div class="item"> <input type="text" name="ten_bai_hat" value="" style="width:200px"/> </div>


    	<div class="item">  Album  </div>

     <div class="item">
     	<select name="album" id="album" >
 <option value="chonalbum" selected='selected'>Chọn Album</option>
	  <?php
	  $sql5="select * from album order by ab_order";
	  $result5=$DB->query($sql5);
	  while($row5=$DB->fetch_row($result5))
	  {
	  ?>
	  <option value="<?php echo $row5[ma_album];?>"><?php echo $row5[ten_album];?></option>
	  <?php
	  }
	  ?>
      </select>



     	    </div>

    </div>
     <div class="row">
     	<div class="item">  Ca sĩ thể hiện  </div>

     <div class="item">
     	<select name="ca_si"  id='ca_si'>
 <option value="choncasi" selected='selected'>Chọn ca sĩ</option>

	  <?php
	  $sql1="select * from ca_si order by cs_order";
	  $result1=$DB->query($sql1);
	  while($row1=$DB->fetch_row($result1))
	  {
	  ?>
	  <option value="<?php echo $row1[ma_ca_si];?>"><?php echo $row1[ten_ca_si];?></option>


	  <?php
	  }
	  ?>
      </select>     </div>


           	<div class="item">  Nhạc sĩ  </div>

     <div class="item"> <select name="nhac_si" id="nhac_si" >
 <option value="chonnhacsi" selected='selected'>Chọn nhạc sĩ</option>
	  <?php
	  $sql2="select * from nhac_si order by ns_order";
	  $result2=$DB->query($sql2);
	  while($row2=$DB->fetch_row($result2))
	  {
	  ?>
	  <option value="<?php echo $row2[ma_nhac_si];?>"><?php echo $row2[ten_nhac_si];?></option>
	  <?php
	  }
	  ?>
      </select>


     	    </div>
     </div>
          <div class="row">


     	<div class="item">  Dòng nhạc  </div>

     <div class="item">
    <select name="the_loai" id="the_loai" >
<option value="chondongnhac" selected='selected'>Chọn dòng nhạc</option>
	  <?php
	  $sql3="select * from the_loai order by tl_order";
	  $result3=$DB->query($sql3);
	  while($row3=$DB->fetch_row($result3))
	  {
	  ?>
	  <option value="<?php echo $row3[ma_the_loai];?>"><?php echo $row3[ten_the_loai];?></option>


	  <?php
	  }
	  ?>
      </select>


     	    </div>

     	<div class="item">  Quốc gia  </div>

     <div class="item">
     	<select name="quoc_gia" id="quoc_gia" >
 <option value="chonquocgia" selected='selected'>Chọn quốc gia</option>
	  <?php
	  $sql4="select * from quoc_gia order by qg_order";
	  $result4=$DB->query($sql4);
	  while($row4=$DB->fetch_row($result4))
	  {
	  ?>
	  <option value="<?php echo $row4[ma_quoc_gia];?>" ><?php echo $row4[ten_quoc_gia];?></option>
	  <?php
	  }
	  ?>
      </select>



     	    </div>


     </div>

         <div class="row">
     	<div class="item">  Chọn đường dẫn :  </div>

        <div class="item"> <input name="file" type="file"  id="file"  size="15"> </div>
        	    </div>


             <div class="row">
     	<div class="item">  Hoặc add URL :   </div>

        <div class="item"> <input name="url" type="text" id="url" size="25" > </div>
        	    </div>

            <div class="row">
     	<div class="item">

     		<div class="item"><button type="submit" class="btn" name="add_bh" value="add_bh" onclick="return checkform()" >Thêm bài hát</button>


	 </div>


        	    </div>

           </div>
           </div>

</form>
<?php
}
else
echo "Bạn phải đăng nhập mới được upload bài hát!";
?>