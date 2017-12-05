<div class="sidebarmenu"><ul id="sidebarmenu1">
<li><a href="?a=tatca"> DANH MỤC BÀI HÁT </a></li>

<li><a href="#"> THEO CA SĨ</a><ul>
<?php
$sql="select ma_ca_si, ten_ca_si from ca_si where display=1 order by cs_order";
$result=$DB->query($sql);
while($row=$DB->fetch_row($result))
{
?>
<li><a href="?a=theocasi&macs=<?php echo $row[ma_ca_si];?>"><?php echo $row[ten_ca_si];?></a></li>
<?php
}
?>
</ul></li>

<li><a href="#"> THEO NHẠC SĨ</a><ul>
<?php
$sql2="select ma_nhac_si, ten_nhac_si from nhac_si where display=1 order by ns_order";
$result2=$DB->query($sql2);
while($row2=$DB->fetch_row($result2))
{
?>
<li><a href="?a=theonhacsi&mans=<?php echo $row2[ma_nhac_si];?>"><?php echo $row2[ten_nhac_si];?></a></li>
<?php
}
?>
</ul></li>

<li><a href="#"> THEO THỂ LOẠI</a><ul>
<?php
$sql3="select ma_the_loai, ten_the_loai from the_loai where display=1 order by tl_order";
$result3=$DB->query($sql3);
while($row3=$DB->fetch_row($result3))
{
?>
<li><a href="?a=theotheloai&matl=<?php echo $row3[ma_the_loai];?>"><?php echo $row3[ten_the_loai];?></a></li>
<?php
}
?>
</ul></li>

<li><a href="#"> THEO QUỐC GIA</a><ul>
<?php
$sql4="select * from quoc_gia where display=1 order by qg_order";
$result4=$DB->query($sql4);
while($row4=$DB->fetch_row($result4))
{
?>
<li><a href="?a=theoquocgia&maqg=<?php echo $row4[ma_quoc_gia];?>"><?php echo $row4[ten_quoc_gia];?></a></li>
<?php
}
?>
</ul></li>

<li><a href="#"> THEO </a><ul>
<?php
$sql5="select ma_album, ten_album from album where display=1 order by ab_order";
$result5=$DB->query($sql5);
while($row5=$DB->fetch_row($result5))
{
?>
<li><a href="?a=theoalbum&maab=<?php echo $row5[ma_album];?>"><?php echo $row5[ten_album];?></a></li>
<?php
}
?>
</ul></li>
<li>
    <?php
        $ten_nguoi_dung=$_SESSION['log']['ten_nguoi_dung'];
        $sql6="select ma_nguoi_dung from nguoi_dung where ten_nguoi_dung='$ten_nguoi_dung'";
        $result6=$DB->query($sql6);
        $row6=$DB->fetch_row($result6)

    ?>
        <a href="?a=theonguoidang&mand=<?php echo $row6[ma_nguoi_dung];?>">PLAYLIST CỦA BẠN</a>
</li>
</ul></div>
