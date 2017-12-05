<ul class="main-nav group">
    <li class="home"><a id="navbar-home" title="Website MP3" href="http://localhost/musicweb/index.php">Website MP3</a></li>
    <li class="active"><a id="navbar-mymusic" class="fn-login" href="#" title="Nhạc cá nhân">Nhạc Cá Nhân</a>
        <div class="megamenu submenu menu-col-1 fn-userbox">
            <div class="subcol menu-col-1-narrow">
                <div class="subinner_item">
                    <ul>
                        <li><a href="#" title="Playlist cá nhân">Playlist Cá Nhân</a></li>
                        <li><a href="#" title="Nhạc upload">Nhạc Upload</a></li>
                        <li><a href="#" title="Kênh của tôi" class="fn-my-channel">Kênh của tôi</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </li>
    <li class="separation"></li>
    <li><a id="navbar-top100" title="Top 100" href="#">Ca sĩ</a>
        <div class="megamenu submenu menu-col-1">
            <div class="subcol menu-col-1-narrow">
                <div class="subinner_item">
                    <ul>
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
                    </ul>
                </div>
            </div>
        </div>
    </li>
    <li><a id="navbar-top100" title="Top 100" href="#">Nhạc sĩ</a>
        <div class="megamenu submenu menu-col-1">
            <div class="subcol menu-col-1-narrow">
                <div class="subinner_item">
                    <ul>
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
                    </ul>
                </div>
            </div>
        </div>
    </li>
    <li><a id="navbar-top100" title="Top 100" href="#">Thể loại</a>
        <div class="megamenu submenu menu-col-1">
            <div class="subcol menu-col-1-narrow">
                <div class="subinner_item">
                    <ul>
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
                    </ul>
                </div>
            </div>
        </div>
    </li>
    <li><a id="navbar-top100" title="Top 100" href="#">Quốc gia</a>
        <div class="megamenu submenu menu-col-1">
            <div class="subcol menu-col-1-narrow">
                <div class="subinner_item">
                    <ul>
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
                    </ul>
                </div>
            </div>
        </div>
    </li>
    <li><a id="navbar-top100" title="Top 100" href="#">Album</a>
        <div class="megamenu submenu menu-col-1">
            <div class="subcol menu-col-1-narrow">
                <div class="subinner_item">
                    <ul>
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
                    </ul>
                </div>
            </div>
        </div>
    </li>
</ul>
<a title="Upload" href="/upload/song.html" class="zicon icon-cloud fn-login"></a>