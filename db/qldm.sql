-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2018 at 05:10 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qldm`
--
CREATE DATABASE IF NOT EXISTS `qldm` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `qldm`;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
`article_id` int(11) NOT NULL,
  `article_name` varchar(100) NOT NULL,
  `article_content` mediumtext NOT NULL,
  `article_cat_id` int(11) NOT NULL,
  `article_des` varchar(500) NOT NULL,
  `article_thumbnail` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article_name`, `article_content`, `article_cat_id`, `article_des`, `article_thumbnail`) VALUES
(1, 'Cras sit amet nibh libero', 'newnenqwnewqeqwewq', 2, 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante 								sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra 								turpis.', 'new_year1.jpg'),
(2, 'Fusce condimentum nunc ac nisi', 'dsa', 0, 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante 								sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra 								turpis.', 'http://placehold.it/64x64'),
(3, 'New Article', 'dsa', 3, '', 'new_year.jpg'),
(4, 'Chuyên gia Fox Sports cảnh báo U23 Việt Nam trước trận chung kết', '<p>U23 Việt Nam đ&atilde; trải qua h&agrave;nh tr&igrave;nh k&eacute;o d&agrave;i 510 ph&uacute;t thần kỳ với điểm nhấn l&agrave; những si&ecirc;u phẩm m&atilde;n nh&atilde;n v&agrave; những loạt s&uacute;t lu&acirc;n lưu c&acirc;n n&atilde;o. Trước mắt thầy tr&ograve; HLV Park Hang-seo chỉ c&ograve;n lại thử th&aacute;ch cuối c&ugrave;ng mang t&ecirc;n U23 Uzbekistan.</p>\r\n\r\n<p>Theo chuy&ecirc;n gia Gabriel Tan, U23 Việt Nam phải đặc biệt quan t&acirc;m đến h&agrave;ng c&ocirc;ng đầy tốc độ v&agrave; s&aacute;ng tạo của đối thủ đến từ Trung &Aacute; nếu kh&ocirc;ng muốn phải nhận tr&aacute;i đắng ở trận chung kết.</p>\r\n\r\n<p>Tổng cộng, đo&agrave;n qu&acirc;n của HLV Ravshan Khaydarov đ&atilde; ghi 10 b&agrave;n tại giải năm nay.&nbsp;Đội trưởng Zabikhillo Urinboev l&agrave; c&aacute;i t&ecirc;n đầu ti&ecirc;n phải lưu t&acirc;m. Để theo k&egrave;m tiền đạo số 9, c&aacute;c đối thủ của Uzbekistan thường phải cắt cử trung vệ giỏi nhất, thậm ch&iacute; l&agrave; cả 2 trung vệ. Khi đ&oacute;, 3 mũi tấn c&ocirc;ng ph&iacute;a sau gồm Khamdamov, Sidikov v&agrave; Yakhshiboev sẽ c&oacute; khoảng trống th&ecirc;nh thang để bắn ph&aacute; khung th&agrave;nh đối phương.</p>\r\n\r\n<table align="center">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><img alt="Chuyen gia Fox Sports canh bao U23 Viet Nam truoc tran chung ket hinh anh 1" src="https://znews-photo-td.zadn.vn/w660/Uploaded/natmzz/2018_01_25/1_11.jpg" style="height:735px; width:606px" /></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Đội h&igrave;nh 4-2-3-1 của Uzbekistan từng v&ugrave;i dập cả Nhật Bản v&agrave; H&agrave;n Quốc.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>B&ecirc;n c&aacute;nh tr&aacute;i, Khamdamov đặc biệt ưa th&iacute;ch thực hiện những pha xuy&ecirc;n ph&aacute; h&agrave;ng ph&ograve;ng ngự dựa tr&ecirc;n tốc độ của m&igrave;nh. Nếu bị theo k&egrave;m qu&aacute; chặt, anh sẽ c&ugrave;ng hậu vệ Komilov thực hiện những pha chồng bi&ecirc;n trước khi đưa b&oacute;ng v&agrave;o ph&iacute;a trong cho tiền đạo dứt điểm.</p>\r\n\r\n<p>Mũi tấn c&ocirc;ng đ&aacute;ng sợ nhất của U23 Uzbekistan lại l&agrave; cầu thủ chạy c&aacute;nh phải, Jasurbek Yakhshiboev. Cầu thủ trẻ thuộc bi&ecirc;n chế Pakhtakor hội tụ những phẩm chất của một ng&ocirc;i sao chạy c&aacute;nh h&agrave;ng đầu, từ tốc độ, sự kh&eacute;o l&eacute;o đến khả năng dứt điểm, tất cả đều ở mức tiệm cận ho&agrave;n hảo. Anh đang l&agrave; ch&acirc;n s&uacute;t hiệu quả nhất của Uzbekistan tại giải năm nay với 3 b&agrave;n thắng.</p>\r\n\r\n<p>H&agrave;ng ph&ograve;ng ngự của Nhật Bản v&agrave; H&agrave;n Quốc đ&atilde; bất lực trong việc theo k&egrave;m số 8 của Uzbekistan ở trận tứ kết v&agrave; b&aacute;n kết. Nhiệm vụ đối đầu với cầu thủ tấn c&ocirc;ng tốt nhất giải sẽ được trao cho Vũ Văn Thanh của U23 Việt Nam.</p>\r\n\r\n<table align="center">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><img alt="Chuyen gia Fox Sports canh bao U23 Viet Nam truoc tran chung ket hinh anh 2" src="https://znews-photo-td.zadn.vn/w660/Uploaded/natmzz/2018_01_25/907104978_1.jpg" style="height:396px; width:594px" /></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Yakhshiboev l&agrave; c&aacute;i t&ecirc;n h&agrave;ng ph&ograve;ng ngự Việt Nam phải đặc biệt quan t&acirc;m ở trận chung kết. Ảnh: Getty Images.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Theo Gabriel Tan, trận chung kết giải U23 ch&acirc;u &Aacute; năm nay sẽ được định đoạt bởi cuộc đối đầu giữa Yakhshiboev v&agrave; Văn Thanh. Hậu vệ số 17 của Việt Nam cần giữ vị tr&iacute; v&agrave; tỉnh t&aacute;o trong từng pha tranh chấp với số 8 b&ecirc;n ph&iacute;a Uzbekistan.</p>\r\n\r\n<blockquote>\r\n<p>Chuy&ecirc;n gia của&nbsp;<em>Fox Sports</em>&nbsp;cũng đưa ra một v&agrave;i nhận định về lối chơi của 2 ứng vi&ecirc;n cho chức v&ocirc; địch ch&acirc;u &Aacute; năm nay: &quot;Th&agrave;nh c&ocirc;ng của U23 Việt Nam chủ yếu dựa tr&ecirc;n m&agrave;n tr&igrave;nh diễn ch&oacute;i s&aacute;ng của cầu thủ chạy c&aacute;nh Nguyễn Quang Hải. Kỷ luật v&agrave; quyết đo&aacute;n l&agrave; những từ ngữ để mi&ecirc;u tả về m&agrave;n tr&igrave;nh diễn của đại diện đến từ Đ&ocirc;ng Nam &Aacute;&quot;.</p>\r\n</blockquote>\r\n\r\n<p>&quot;Trong khi đ&oacute;, U23 Uzebekistan nổi l&ecirc;n l&agrave; một trong những đội tuyển c&oacute; lối đ&aacute; đẹp mắt bậc nhất tại giải đấu. Họ chỉ để thua đ&uacute;ng một lần ở trận ra qu&acirc;n trước Qatar, sau đ&oacute; l&agrave; 4 chiến thắng li&ecirc;n tiếp, trong đ&oacute; c&oacute; 2 m&agrave;n hủy diệt đương kim v&ocirc; địch Nhật Bản (4-0) v&agrave; đương kim &aacute; qu&acirc;n H&agrave;n Quốc (4-1) để ghi danh v&agrave;o trận chung kết&quot;, Gabriel Tan n&oacute;i th&ecirc;m.</p>\r\n\r\n<p>Đ&atilde; ghi t&ecirc;n v&agrave;o trận chung kết nhưng U23 Việt Nam vẫn kh&ocirc;ng được đ&aacute;nh gi&aacute; cao bằng c&aacute;c đối thủ kh&aacute;c. Tuy nhi&ecirc;n tất cả sẽ phải nh&igrave;n thầy tr&ograve; Park Hang-seo bằng một con mắt kh&aacute;c nếu họ đ&aacute;nh bại đội tuyển được coi l&agrave; mạnh nhất giải đấu, Uzbekistan ở trận đấu cuối c&ugrave;ng tại Thường</p>\r\n\r\n<p><strong><a href="https://news.zing.vn/video-nhin-lai-hanh-trinh-vao-chung-ket-cua-u23-uzbekistan-post814526.html" target="_blank">Nh&igrave;n lại h&agrave;nh tr&igrave;nh v&agrave;o chung kết của U23 Uzbekistan</a></strong>&nbsp;Khởi đầu kh&aacute; chậm chạp ở v&ograve;ng bảng, tuy nhi&ecirc;n U23 Uzbekistan đ&atilde; thi đấu rất hay trước U23 H&agrave;n Quốc v&agrave; U23 Nhật Bản để gi&agrave;nh quyền v&agrave;o chung kết U23 ch&acirc;u &Aacute;.</p>\r\n\r\n<table align="center">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><img alt="Chuyen gia Fox Sports canh bao U23 Viet Nam truoc tran chung ket hinh anh 3" src="https://znews-photo-td.zadn.vn/w660/Uploaded/natmzz/2018_01_25/3_3.jpg" style="height:595px; width:1300px" /></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Đ&aacute;nh đầu kh&ocirc;ng phải l&agrave; điểm mạnh của h&agrave;ng c&ocirc;ng U23 Uzbekistan. Số liệu:&nbsp;<em>AFC.</em></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 4, '<p>Chuy&ecirc;n gia Gabriel Tan cho rằng U23 Vi&ecirc;̣t Nam c&acirc;̀n đặc bi&ecirc;̣t c&acirc;̉n trọng với t&ocirc;́c đ&ocirc;̣ và sự sáng tạo của Uzbekistan n&ecirc;́u kh&ocirc;ng mu&ocirc;́n nh&acirc;̣n th&acirc;́t bại ở tr&acirc;̣n chung k&ecirc;́t.</p>\r\n', '907104978.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_des` text NOT NULL,
  `cat_parent_id` int(11) NOT NULL,
  `cat_thumbnail` varchar(200) NOT NULL,
  `cat_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cat_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cat_status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_des`, `cat_parent_id`, `cat_thumbnail`, `cat_created_date`, `cat_modified_date`, `cat_status`) VALUES
(2, 'Horse', 'horse', 6, '', '2018-01-29 03:29:18', '2018-01-29 03:30:54', 0),
(3, 'News', 'News', 0, '', '2018-01-29 03:29:18', '2018-01-29 03:30:54', 0),
(4, 'Sport', 'sport', 3, '', '2018-01-29 03:29:18', '2018-01-29 03:50:07', 0),
(5, 'Magazine', 'dasdsadds', 0, '', '2018-01-29 03:29:18', '2018-01-29 03:30:54', 0),
(6, 'Animals', '', 3, '', '2018-01-29 03:29:18', '2018-01-29 03:30:54', 0),
(7, 'Lion', '', 6, '', '2018-01-29 03:29:18', '2018-01-29 03:30:54', 0),
(8, 'New', '', 5, '', '2018-01-29 03:29:18', '2018-01-29 03:30:54', 0),
(9, 'Whale', '<blockquote>\r\n<p>The only way to do it would be to use a DATETIME type for ts_create which unfortunately cannot have a default value of NOW(). You can roll your own trigger to make that happen though.</p>\r\n</blockquote>\r\n', 6, '', '2018-01-29 03:32:59', '2018-01-29 03:50:19', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
 ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
