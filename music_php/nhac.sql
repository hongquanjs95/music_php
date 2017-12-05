-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 28, 2017 lúc 10:51 CH
-- Phiên bản máy phục vụ: 5.7.17-log
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhac`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `ma_admin` int(11) NOT NULL,
  `ma_nguoi_dung` tinyint(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ma_admin`, `ma_nguoi_dung`) VALUES
(7, 17),
(8, 18),
(9, 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `album`
--

CREATE TABLE `album` (
  `ma_album` int(11) NOT NULL,
  `ten_album` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinh` text,
  `ab_order` tinyint(3) NOT NULL,
  `display` tinyint(1) NOT NULL,
  `luot_click` int(11) NOT NULL DEFAULT '0',
  `ngay_tao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `album`
--

INSERT INTO `album` (`ma_album`, `ten_album`, `hinh`, `ab_order`, `display`, `luot_click`, `ngay_tao`) VALUES
(24, 'Trịnh Công Sơn', 'tvdung.jpg', 1, 1, 45, '0000-00-00'),
(26, 'Đàm Vĩnh Hưng', 'damvinhhung.jpg', 1, 1, 13, '2017-10-31'),
(28, 'Quang Dũng', 'quangdung.jpg', 1, 1, 15, '2017-11-19'),
(29, 'Lệ Quyên', 'lequyen.jpg', 3, 1, 14, '2017-11-27'),
(30, 'Hồ Ngọc Hà', 'hongocha.jpg', 1, 1, 4, '2017-11-27'),
(33, 'Phi Nhung', 'phinhung1.jpg', 1, 1, 3, '2017-11-28'),
(34, 'Cẩm Ly', 'camly.jpg', 1, 1, 0, '2017-11-28'),
(35, 'Trọng Tấn', 'trongtan.jpg', 1, 1, 0, '2017-11-28'),
(36, 'Thu hiền', 'thuhien.jpg', 1, 1, 0, '2017-11-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bai_hat`
--

CREATE TABLE `bai_hat` (
  `ma_bai_hat` int(11) NOT NULL,
  `ma_ca_si` int(11) NOT NULL,
  `ma_nhac_si` int(11) NOT NULL,
  `ma_album` int(11) NOT NULL,
  `ma_the_loai` int(11) NOT NULL,
  `ma_quoc_gia` int(11) NOT NULL,
  `ma_nguoi_dung` int(11) NOT NULL,
  `ten_bai_hat` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenbh_khong_dau` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bai_hat` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `loi_bai_hat` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `ngay_dang` date NOT NULL,
  `luot_xem` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bai_hat`
--

INSERT INTO `bai_hat` (`ma_bai_hat`, `ma_ca_si`, `ma_nhac_si`, `ma_album`, `ma_the_loai`, `ma_quoc_gia`, `ma_nguoi_dung`, `ten_bai_hat`, `tenbh_khong_dau`, `bai_hat`, `loi_bai_hat`, `ngay_dang`, `luot_xem`) VALUES
(188, 29, 2, 24, 2, 1, 24, 'Thàn phố buồn', 'than pho buon', 'upload_nhac/152514_thanhphobuon.mp4', NULL, '2017-10-31', 154),
(189, 1, 1, 26, 3, 1, 24, 'Thành phố buồn', 'thanh pho buon', 'upload_nhac/406491_thanhphobuon.mp4', NULL, '2017-10-31', 56),
(190, 1, 4, 28, 2, 1, 24, 'Remix hay nhất mọi thời đại', 'remix hay nhat moi thoi dai', 'upload_nhac/864785_NonstopNhacHanRemixHayNhatMoiThoiDai-DJ-4390403.mp3', NULL, '2017-11-27', 23),
(191, 29, 4, 28, 6, 1, 24, 'Remix nhạc đỏ', 'remix nhac do', 'upload_nhac/142901_NonstopLKNhacDoRemix-DJ-3118372.mp3', NULL, '2017-11-27', 22),
(192, 36, 4, 29, 3, 1, 24, 'Album Lệ Quyên', 'album le quyen', 'upload_nhac/425250_Lequyen.mp4', NULL, '2017-11-28', 26),
(193, 37, 4, 28, 3, 1, 24, 'Anh còn nợ em', 'anh con no em', 'upload_nhac/988217_AnhConNoEm-QuangDung_39vx4.mp3', NULL, '2017-11-28', 13),
(195, 38, 4, 33, 3, 1, 24, 'Bông điêng điếng', 'bong dieng dieng', 'upload_nhac/455050_bongdiengdieng.mp4', NULL, '2017-11-28', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ca_si`
--

CREATE TABLE `ca_si` (
  `ma_ca_si` int(11) NOT NULL,
  `ten_ca_si` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cs_order` int(3) NOT NULL DEFAULT '1',
  `display` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `ca_si`
--

INSERT INTO `ca_si` (`ma_ca_si`, `ten_ca_si`, `hinh`, `cs_order`, `display`) VALUES
(1, 'Đàm Vĩnh Hưng', '616687_damvinhung.jpg', 1, 1),
(2, 'Quách Thành Danh', '776483_quachthanhdanh.jpg', 3, 1),
(7, 'Nguyễn Hồng Nhung', '291354_phandinhtung.jpg', 4, 1),
(29, 'Chưa xác định', '661840_noimage.jpg', 0, 0),
(36, 'Lệ Quyên', '', 1, 1),
(37, 'Quang Dũng', '', 1, 1),
(38, 'Phi Nhung', 'phinhung1.jpg', 1, 1),
(39, 'Cẩm Ly', 'camly.jpg', 1, 1),
(40, 'Trọng Tấn', 'trongtan.jpg', 1, 1),
(41, 'Thu hiền', 'thuhien.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chatbox`
--

CREATE TABLE `chatbox` (
  `chatid` int(11) NOT NULL,
  `ym_nick` varchar(30) NOT NULL,
  `nicktmp` varchar(11) NOT NULL,
  `noidung` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diachi_ip` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chatbox`
--

INSERT INTO `chatbox` (`chatid`, `ym_nick`, `nicktmp`, `noidung`, `diachi_ip`) VALUES
(180, 'star_in_myheart2004', 'MS_17', 'Vua online roi do.', '127.0.0.1'),
(179, 'star_in_myheart2004', 'MS_17', 'chat chit ty cho do buon nhi?', '127.0.0.1'),
(178, 'star_in_myheart2004', 'MS_17', 'xin chao ca nha', '127.0.0.1'),
(181, 'dv.spyware', 'MS_18', 'the ha?', '127.0.0.1'),
(182, 'dv.spyware', 'MS_18', 'thich nhi?', '127.0.0.1'),
(183, 'dv.spyware', 'MS_18', 'giá» má»›i lÃ  chuáº©n', '127.0.0.1'),
(184, 'dv.spyware', 'MS_18', 'giá» lÃ m sao Ä‘á»ƒ má»—i láº§n', '127.0.0.1'),
(185, 'dv.spyware', 'MS_18', 'náº¿u cÃ³ ngÆ°á»i nháº¯n thÃ¬ hiá»‡n lÃªn luÃ´n', '127.0.0.1'),
(186, 'dv.spyware', 'MS_18', 'mÃ¬nh khÃ´ng nháº¥n nÃ³ váº«n hiá»‡n!', '127.0.0.1'),
(187, 'dv.spyware', 'MS_18', 'Ä‘Ã³ má»›i lÃ  váº¥n Ä‘á» quan trá»ng', '127.0.0.1'),
(188, 'dv.spyware', 'MS_18', '10 tin thÃ¬ tá»± nÃ³ há»§y', '127.0.0.1'),
(189, 'dv.spyware', 'MS_18', 'mot bon nam sao bay moi acy cp', '127.0.0.1'),
(190, 'dv.spyware', 'MS_18', 'ma nd mai mgyn lang laingl nglia lging lang', '127.0.0.1'),
(191, 'dv.spyware', 'MS_18', 'mg iang laing laing la cong lang cong laing', '127.0.0.1'),
(192, 'dv.spyware', 'MS_18', '12 34 567 89 12 34 56 78 90 04 55', '127.0.0.1'),
(193, 'dv.spyware', 'MS_18', 'cong hoa xa hoi chu nghia viet nam doc l', '127.0.0.1'),
(194, 'dv.spyware', 'MS_18', 'CONG HOA XA HOI CHU NGHIA VIET NAM DOC L', '127.0.0.1'),
(195, 'dv.spyware', 'MS_18', 'Cá»˜NG HÃ’A XÃƒ Há»˜I CHá»¦ NGHÄ¨A VIá»†T', '127.0.0.1'),
(196, 'dv.spyware', 'MS_18', 'á»«m, nhÆ°ng mÃ  mÃ£i cÅ©ng chÃ¡n láº¯m', '127.0.0.1'),
(197, 'dv.spyware', 'MS_18', 'láº¡i biáº¿n Ä‘Ã¢u máº¥t rá»“i', '127.0.0.1'),
(198, 'dv.spyware', 'MS_18', 'chÃ¡n vÃ£i cáº£ hÃ ng há»', '127.0.0.1'),
(199, 'dv.spyware', 'MS_18', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '127.0.0.1'),
(200, 'dv.spyware', 'MS_18', 'them thy nua la no dÃ¹n cÃ¡i áº±ng', '127.0.0.1'),
(201, 'dv.spyware', 'MS_18', 'thÃ¬ mÃ¬nh se cÃ³ thÃªm khoáº£ng kho', '127.0.0.1'),
(202, 'dv.spyware', 'MS_18', 'gian quÃ½ hÃ³a', '127.0.0.1'),
(203, 'dv.spyware', 'MS_18', 'sáº¯p lÃªn rá»“i kÃ¬a', '127.0.0.1'),
(204, 'dv.spyware', 'MS_18', 'vai hang', '127.0.0.1'),
(205, 'abc', 'MS_21', 'heheheeeee', '127.0.0.1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `ma_nguoi_dung` int(11) NOT NULL,
  `ten_nguoi_dung` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten_dang_nhap` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `ngay_tham_gia` date NOT NULL DEFAULT '0000-00-00',
  `quyen_admin` tinyint(1) NOT NULL DEFAULT '0',
  `cam_su_dung` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`ma_nguoi_dung`, `ten_nguoi_dung`, `ten_dang_nhap`, `mat_khau`, `email`, `ngay_tham_gia`, `quyen_admin`, `cam_su_dung`) VALUES
(17, 'Admin', 'admin', '123456', 'admin@yahoo.com', '2016-10-31', 1, 0),
(21, 'vtt', 'vutienml', 'e10adc3949ba59abbe56e057f20f883e', 'abc@yahoo.com', '2016-10-31', 0, 0),
(22, 'nhut', 'nhut', 'abde84f7ca07b945d10fd50ed8922846', 'nhut@gmail.com', '2016-11-20', 1, 0),
(23, 'phuong', 'phuong', '9e6ca4e975147c5ae0fba5ffaa442473', 'phuong@gmail.com', '2016-11-24', 0, 0),
(24, 'Trình Văn Dũng', 'trinhvandung', '123456', 'tvdungkt@gmail.com', '2017-10-31', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhac_si`
--

CREATE TABLE `nhac_si` (
  `ma_nhac_si` int(11) NOT NULL,
  `ten_nhac_si` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT '1',
  `ns_order` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nhac_si`
--

INSERT INTO `nhac_si` (`ma_nhac_si`, `ten_nhac_si`, `hinh`, `display`, `ns_order`) VALUES
(1, 'Văn Cao', '473699_trinhcongson.jpg', 1, 1),
(2, 'Trần Tiến', '655715_vancao.jpg', 1, 2),
(3, 'Trần Tiến', '812985_trantien.jpg', 1, 3),
(4, 'Chưa xác định', '', 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quoc_gia`
--

CREATE TABLE `quoc_gia` (
  `ma_quoc_gia` int(11) NOT NULL,
  `ten_quoc_gia` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `qg_order` tinyint(3) NOT NULL,
  `display` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `quoc_gia`
--

INSERT INTO `quoc_gia` (`ma_quoc_gia`, `ten_quoc_gia`, `qg_order`, `display`) VALUES
(1, 'Nhạc Việt Nam', 1, 1),
(2, 'Nhạc Hàn Quốc', 2, 1),
(4, 'Nhật Bản', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `the_loai`
--

CREATE TABLE `the_loai` (
  `ma_the_loai` int(11) NOT NULL,
  `ten_the_loai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tl_order` tinyint(3) NOT NULL,
  `display` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `the_loai`
--

INSERT INTO `the_loai` (`ma_the_loai`, `ten_the_loai`, `tl_order`, `display`) VALUES
(2, 'rốc', 1, 1),
(3, 'Nhạc trữ tình', 4, 1),
(5, 'Nhạc cách mạng', 3, 1),
(6, 'Remix', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vshoutbox`
--

CREATE TABLE `vshoutbox` (
  `shoutid` int(11) NOT NULL,
  `sendername` varchar(100) NOT NULL,
  `senderemail` varchar(150) NOT NULL,
  `senderwww` varchar(200) NOT NULL,
  `messages` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  `senderip` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `vshoutbox`
--

INSERT INTO `vshoutbox` (`shoutid`, `sendername`, `senderemail`, `senderwww`, `messages`, `time`, `senderip`) VALUES
(16, 'tcgonline01', '', '', 'fdfd', 1284919015, '127.0.0.1'),
(15, 'dfdf', '', '', 'fdfd', 1284918959, '127.0.0.1'),
(14, 'dfd', '', '', 'df', 1284918813, '127.0.0.1'),
(13, 'Tên b&#7841;n', '', '', 'd', 1284917482, '127.0.0.1'),
(11, 'abc', '', '', 'chao', 1284917259, '127.0.0.1'),
(12, 'aaaa', '', '', 'aaaa', 1284917422, '127.0.0.1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ma_admin`);

--
-- Chỉ mục cho bảng `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`ma_album`);

--
-- Chỉ mục cho bảng `bai_hat`
--
ALTER TABLE `bai_hat`
  ADD PRIMARY KEY (`ma_bai_hat`),
  ADD KEY `ma_ca_si` (`ma_ca_si`),
  ADD KEY `ma_nhac_si` (`ma_nhac_si`),
  ADD KEY `ma_album` (`ma_album`),
  ADD KEY `ma_the_loai` (`ma_the_loai`),
  ADD KEY `ma_ca_si_2` (`ma_ca_si`),
  ADD KEY `ma_quoc_gia` (`ma_quoc_gia`),
  ADD KEY `ma_nguoi_dung` (`ma_nguoi_dung`);

--
-- Chỉ mục cho bảng `ca_si`
--
ALTER TABLE `ca_si`
  ADD PRIMARY KEY (`ma_ca_si`);

--
-- Chỉ mục cho bảng `chatbox`
--
ALTER TABLE `chatbox`
  ADD PRIMARY KEY (`chatid`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`ma_nguoi_dung`);

--
-- Chỉ mục cho bảng `nhac_si`
--
ALTER TABLE `nhac_si`
  ADD PRIMARY KEY (`ma_nhac_si`);

--
-- Chỉ mục cho bảng `quoc_gia`
--
ALTER TABLE `quoc_gia`
  ADD PRIMARY KEY (`ma_quoc_gia`);

--
-- Chỉ mục cho bảng `the_loai`
--
ALTER TABLE `the_loai`
  ADD PRIMARY KEY (`ma_the_loai`);

--
-- Chỉ mục cho bảng `vshoutbox`
--
ALTER TABLE `vshoutbox`
  ADD PRIMARY KEY (`shoutid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `ma_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `album`
--
ALTER TABLE `album`
  MODIFY `ma_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT cho bảng `bai_hat`
--
ALTER TABLE `bai_hat`
  MODIFY `ma_bai_hat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;
--
-- AUTO_INCREMENT cho bảng `ca_si`
--
ALTER TABLE `ca_si`
  MODIFY `ma_ca_si` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT cho bảng `chatbox`
--
ALTER TABLE `chatbox`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;
--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `ma_nguoi_dung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT cho bảng `nhac_si`
--
ALTER TABLE `nhac_si`
  MODIFY `ma_nhac_si` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `quoc_gia`
--
ALTER TABLE `quoc_gia`
  MODIFY `ma_quoc_gia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `the_loai`
--
ALTER TABLE `the_loai`
  MODIFY `ma_the_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `vshoutbox`
--
ALTER TABLE `vshoutbox`
  MODIFY `shoutid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bai_hat`
--
ALTER TABLE `bai_hat`
  ADD CONSTRAINT `bai_hat_ibfk_1` FOREIGN KEY (`ma_ca_si`) REFERENCES `ca_si` (`ma_ca_si`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `bai_hat_ibfk_2` FOREIGN KEY (`ma_the_loai`) REFERENCES `the_loai` (`ma_the_loai`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `bai_hat_ibfk_3` FOREIGN KEY (`ma_album`) REFERENCES `album` (`ma_album`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `bai_hat_ibfk_4` FOREIGN KEY (`ma_nhac_si`) REFERENCES `nhac_si` (`ma_nhac_si`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `bai_hat_ibfk_5` FOREIGN KEY (`ma_quoc_gia`) REFERENCES `quoc_gia` (`ma_quoc_gia`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `bai_hat_ibfk_6` FOREIGN KEY (`ma_nguoi_dung`) REFERENCES `nguoi_dung` (`ma_nguoi_dung`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
