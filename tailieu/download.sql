-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 07, 2010 at 11:00 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `aa`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `download`
-- 

CREATE TABLE `download` (
  `idDL` int(11) NOT NULL auto_increment,
  `TenFile` varchar(255) NOT NULL,
  `MoTa` varchar(1000) default NULL,
  `url` varchar(255) default NULL,
  `idLoaiDL` int(11) NOT NULL,
  `AnHien` tinyint(1) default '1',
  `Ngay` datetime default NULL,
  `SoLanDown` int(11) default '0',
  PRIMARY KEY  (`idDL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

-- 
-- Dumping data for table `download`
-- 

INSERT INTO `download` VALUES (1, 'Color Cop', 'Phần mềm này sẽ giúp các bạn dễ dàng biết được mã màu của màu mà bạn cần biết. Rất hữu ích cho bạn phối màu cho web', 'colorcop-setup.exe', 1, 1, '2008-01-01 00:00:00', 71);
INSERT INTO `download` VALUES (9, 'Tag HTML', 'Tài liệu về các tag HTML', 'TagHTML.HLP', 3, 1, '2009-02-07 00:00:00', 12);
INSERT INTO `download` VALUES (10, 'CSS Tab', 'Đây là Tool giúp làm menu 1 cấp rất đẹp. Rất dễ dùng. Có cả file hướng dẫn bằng tiếng việt', 'Css_tab.zip', 1, 1, '2009-02-07 00:00:00', 122);
INSERT INTO `download` VALUES (11, 'FastStone Photo Resizer', 'Tool giúp đổi kích thước ảnh hàng loạt', 'FSResizerSetup26.exe', 1, 1, '2009-02-07 00:00:00', 52);
INSERT INTO `download` VALUES (12, 'Website layout maker', 'Tool giúp làm layout website', 'Website Layout Maker v2.27.rar', 1, 1, '2009-02-07 00:00:00', 86);
INSERT INTO `download` VALUES (13, 'VietSpider', 'Là chương trình đọc tin từ các báo đưa về máy của bạn (kể cả nội dung tin) , miễn phí. Các bạn làm site tin tức có tool này thì rất tốt. NHưng máy phải cái java mới chạy được. Muốn down, hãy vào Google gõ VietSpider', '', 1, 1, '2009-02-07 00:00:00', 65);
INSERT INTO `download` VALUES (14, 'WindowMediaPlayerPluginForFfirefoxV11', 'Firefox play nhạc không hay nếu không có plugin này ', 'WindowMediaPlayerPluginForFfirefoxV11.rar', 1, 1, '2009-02-07 00:00:00', 13);
INSERT INTO `download` VALUES (15, 'FlashPlayer For FireFox', 'Máy bạn cần cài cái  này nếu trong Firefox không xem được Flash', 'Flash_playerForFireFox.rar', 2, 1, '2009-02-07 00:00:00', 16);
INSERT INTO `download` VALUES (16, 'Flash Player For IE', 'Máy bạn cần cài cái  này nếu trong IE không xem được Flash', 'Flash_player_10_ForIE.rar', 2, 1, '2009-02-07 00:00:00', 14);
INSERT INTO `download` VALUES (17, 'FairStarsAudioConverter', 'Đây là tool chuyển đổi qua lại giữa các loại file nhạc mp3, wma... . Cho phép giảm chất lượng file nhạc để đưa lên website', 'FairStarsAudioConverter1.77.rar', 2, 1, '2009-02-07 00:00:00', 10);
INSERT INTO `download` VALUES (18, 'Multiple IE', 'Nhiều Version IE cho máy của bạn. Rất tiện cho việc Test trang web bạn làm trên các trình duyệt khác nhau <br>\r\nĐịa chỉ tải về là <a href=http://tredosoft.com/files/multi-ie/multiple-ie-setup.exe>đây</a>', 'multiple-ie-setup.exe', 2, 1, '2009-02-07 00:00:00', 186);
INSERT INTO `download` VALUES (19, 'Sử dụng Behavior ', 'Đây là tài liệu giải thích , hướng dẫn sử dụng Behavior trong Dreamweaver. ', 'Behavior.rar', 3, 1, '2009-02-08 00:00:00', 85);
INSERT INTO `download` VALUES (20, 'Sử dụng Snippet', 'Đây là tài liệu giải thích , hướng dẫn sử dụng Snippet trong Dreamweaver. ', 'Snippet.rar', 3, 1, '2009-02-08 00:00:00', 46);
INSERT INTO `download` VALUES (21, 'Spry Tabbed Panels', 'Đây là tài liệu giải thích , hướng dẫn sử dụng SpryTabbed trong Dreamweaver. ', 'SpryTabbed.rar', 3, 1, '2009-02-08 00:00:00', 90);
INSERT INTO `download` VALUES (22, 'SpryMenu Bar', 'Đây là tài liệu giải thích , hướng dẫn sử dụng SpryMenu Bar trong Dreamweaver. ', 'SpryMenuBar.rar', 3, 1, '2009-02-08 00:00:00', 102);
INSERT INTO `download` VALUES (23, 'UltraMenmu', 'Tài liệu hướng dẫn UltraMenu', 'ULTRAMENU.rar', 3, 1, '2009-02-08 00:00:00', 79);
INSERT INTO `download` VALUES (24, 'Sothink Menu', 'Tài liệu hướng dẫn Sothink Menu', 'SOTHINKMENU.rar', 3, 1, '2009-02-08 00:00:00', 74);
INSERT INTO `download` VALUES (25, 'Thumbnail Grabber', 'Thumbnail Grabber là một tiện ích miễn phí dùng để chụp lại hình ảnh của toàn bộ trang web hay một phần thành định dạng JPEG.\r\n\r\nBạn có thể chọn kích thước trang Web (chiều rộng và chiều cao) và kích thước ảnh thumbnail (hay tính bằng phần trăm kích thước trang Web).\r\nChương trình có thể dễ dàng nhập địa chỉ trang Web mình muốn chụp hay những địa chỉ được ghi trong các tập tin văn bản.\r\nTải ở đây\r\nhttp://www.optinsoft.com/listmanager/Setup_TG.exe', '', 2, 1, '2009-02-08 00:00:00', 15);
INSERT INTO `download` VALUES (26, 'FTP Commander 7.40', 'Ưu điểm của chương trình này có lẽ là sự đơn giản trong giao diện và sử dụng, tốc độ làm việc nhanh, người dùng chỉ việc khai báo chính xác và đầy đủ thông tin máy chủ FTP cần kết nối. Chương trình cho phép xóa, sao chép, đặt tên cho thư mục. Việc upload và download thao tác qua hai nút mũi tên nằm giữa cửa sổ duyệt thư mục trên PC và cửa sổ quản lý thư mục FTP trên máy chủ. Quá trình download hay upload dữ liệu được hiển thị chi tiết như tốc độ, số lượng, dung lượng. Tương thích mọi Windows', 'ftpcommander.exe', 2, 1, '2009-01-22 00:00:00', 70);
INSERT INTO `download` VALUES (27, ' SQLDumpSplitter', 'Muốn import file SQl có dung lượng lớn, bạn có thể sử dụng tool SQLDumpSplitter.\r\nVí dụ bạn đang có 1 file data.sql có dung lượng cỡ 8MB\r\nBây giờ bạn có thể chia nhỏ dung lượng file data.sql thành các file có dung lượng nhỏ hơn\r\n- Step1:Chose file \r\nBạn nhấn vào nút Browse và chọn  file mà bạn muốn chia nhỏ ra ( Chú ý là Tools này chỉ áp dụng cho file .SQL thôi nhá ) Ví dụ : data.SQL\r\n- Step2: Set maximum filesize\r\nBạn có thể cắt file theo dung lượng bao nhiêu tùy bạn .\r\nVí dụ : 1024 KiloBytes ~ 1MB\r\n- Step3: Choose Target directory\r\nXong các bước trên bạn bấm vào nút : EXECUTE\r\nSau đó sẽ hiện ra 1 folder: SQLDumpSplitterResult , trong đó sẽ chứa các file .sql đã được cắt với dung lượng bạn đã chọn ở Step2\r\nBây giờ bạn vào PHPmyadmin và Import\r\nBạn Browse file : data_DataStructure.sql ( theo ví dụ trên) ,sau đó bạn lần lượt Import cái file còn lại theo thứ tự : data_1.sql ,data_2.sql ', 'SQLDumpSplitter.zip', 2, 1, '2009-01-22 00:00:00', 1);
INSERT INTO `download` VALUES (28, 'Các hàm PHP', 'Đây là tài liệu về các hàm PHP, rất đầy đủ, từng hàm có ví dụ dễ hiểu<br>\r\n<a href=http://vn.php.net/get/php_manual_en.chm/from/this/mirror>Tải ở đây</a>', '', 3, 1, '2009-02-07 00:00:00', 42);
INSERT INTO `download` VALUES (29, 'Hàm MySql', 'Đây là tài liệu tham khảo MySql, các hàm Mysql có giải thích và hướng dẫn sử dụng<br>\r\n<a href=http://downloads.mysql.com/docs/refman-5.0-en.chm>Tải ở đây</a>', '', 3, 1, '2009-02-07 00:00:00', 60);
INSERT INTO `download` VALUES (30, 'Cài IIS, PHP, MySQL, PHPMyAdmin, Appserv', 'Đây là tài liệu hướng dẫn cài đặt các chương trình để bạn tạo web động PHP', 'CaiIIS_PHP_MySql_PhpMyAdmin.rar', 3, 1, '2009-02-07 00:00:00', 98);

-- --------------------------------------------------------

-- 
-- Table structure for table `loai_download`
-- 

CREATE TABLE `loai_download` (
  `idLoaiDL` int(11) NOT NULL auto_increment,
  `TenLoaiDL` varchar(255) NOT NULL,
  `ThuTu` int(11) default '0',
  `AnHien` tinyint(1) default '1',
  PRIMARY KEY  (`idLoaiDL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `loai_download`
-- 

INSERT INTO `loai_download` VALUES (1, 'web', 1, 1);
INSERT INTO `loai_download` VALUES (2, 'Utilities', 2, 1);
INSERT INTO `loai_download` VALUES (3, 'Tài liệu tham khảo', 3, 1);
