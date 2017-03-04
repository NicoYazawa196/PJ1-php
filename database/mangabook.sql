-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2015 at 04:46 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mangabook`
--
CREATE DATABASE IF NOT EXISTS `mangabook` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE `mangabook`;
-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ma_quantri` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ten_quantri` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `so_dienthoai` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ma_quantri`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ma_quantri`, `username`, `password`, `ten_quantri`, `email`, `diachi`, `so_dienthoai`) VALUES
(1, 'ZeeNguyen', 'admin', 'Nguyễn Trung Nghĩa', 'mr.ze12@gmail.com', '34/34 Vạn Bảo', '01277125346'),
(2, 'Truong', 'admin', 'Đặng Nhật Trường', 'mail@gmail.com', '34/34 Vạn Bảo', '01277125346'),
(3, 'Lan', 'admin', 'Nguyễn Thị Lan', 'mail@gmail.com', '34/34 Vạn Bảo', '01277125346'),
(4, 'admin', 'admin', 'Administrator', 'mail@gmail.com', '34/34 Vạn Bảo', '01277125346');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `ma_donhang` int(11) NOT NULL,
  `masach` int(11) NOT NULL,
  `gia` float DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  PRIMARY KEY (`ma_donhang`,`masach`),
  KEY `FK_chitietdonhang` (`ma_donhang`),
  KEY `FK_chitietdonhang_sach` (`masach`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`ma_donhang`, `masach`, `gia`, `soluong`) VALUES
(1, 6, 69000, 1),
(2, 5, 54000, 1),
(3, 32, 16000, 1),
(4, 32, 16000, 1),
(5, 10, 54000, 3),
(5, 29, 70000, 1),
(5, 30, 18000, 1),
(6, 50, 75000, 1),
(6, 51, 65000, 1),
(6, 56, 119000, 1),
(6, 57, 63000, 1),
(7, 47, 99000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE IF NOT EXISTS `donhang` (
  `ma_donhang` int(11) NOT NULL AUTO_INCREMENT,
  `ten_khachhang` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_dienthoai` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `yeucau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` enum('moi','xacnhan','huy') COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaydat` datetime DEFAULT NULL,
  `tongtien` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`ma_donhang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`ma_donhang`, `ten_khachhang`, `email`, `diachi`, `so_dienthoai`, `yeucau`, `trangthai`, `ngaydat`, `tongtien`) VALUES
(1, 'Đặng Nhật Trường', 'nhattruong@gmail.com', '285 Đội Cấn', '0123456789', '- Xin hãy giao hàng vào buổi sáng', 'xacnhan', '2015-03-01 03:50:52', '69000'),
(2, 'Đặng Nhật Trường', 'nhattruong@gmail.com', '285 Đội Cấn', '0123456789', '', 'moi', '2015-03-01 09:45:17', '54000'),
(3, 'Đặng Nhật Trường', 'nhattruong@gmail.com', '285 Đội Cấn', '0123456789', '', 'huy', '2015-03-01 09:45:53', '16000'),
(4, 'Đặng Nhật Trường', 'nhattruong@gmail.com', '285 Đội Cấn', '0123456789', '', 'xacnhan', '2015-03-02 05:48:48', '16000'),
(5, 'Đặng Nhật Trường', 'nhattruong@gmail.com', '285 Đội Cấn', '0123456789', '', 'huy', '2015-03-04 03:04:53', '250000'),
(6, 'Đặng Nhật Trường', 'nhattruong@gmail.com', '285 Đội Cấn', '0123456789', '', 'moi', '2015-03-04 04:45:16', '322000'),
(7, 'Đặng Nhật Trường', 'nhattruong@gmail.com', '285 Đội Cấn', '0123456789', '', 'moi', '2015-03-04 04:45:52', '99000');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE IF NOT EXISTS `khachhang` (
  `ma_khachhang` int(11) NOT NULL AUTO_INCREMENT,
  `taikhoan` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matkhau` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hoten` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaysinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ma_khachhang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`ma_khachhang`, `taikhoan`, `matkhau`, `email`, `hoten`, `ngaysinh`, `diachi`, `sdt`) VALUES
(1, 'truong', 'fcea920f7412b5da7be0cf42b8c937591', 'truong1@gmail.com', 'Đặng Nhật Trường1', '0000-00-00', '285 Đội Cấn', '0123456789'),
(2, 'truong2', 'fcea920f7412b5da7be0cf42b8c937592', 'truong2@gmail.com', 'Đặng Nhật Trường2', '0000-00-00', '285 Đội Cấn', '0123456789'),
(3, 'truong3', 'fcea920f7412b5da7be0cf42b8c937593', 'truong3@gmail.com', 'Đặng Nhật Trường3', '0000-00-00', '285 Đội Cấn', '0123456789'),
(4, 'nhattruong', 'fcea920f7412b5da7be0cf42b8c93759', 'nhattruong@gmail.com', 'Đặng Nhật Trường', '26/08/1996', '285 Đội Cấn', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `phanhoi`
--

CREATE TABLE IF NOT EXISTS `phanhoi` (
  `ma_phanhoi` int(50) NOT NULL AUTO_INCREMENT,
  `ten` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidung` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`ma_phanhoi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `phanhoi`
--

INSERT INTO `phanhoi` (`ma_phanhoi`, `ten`, `email`, `noidung`) VALUES
(1, 'Admin', 'mr.ze12@gmail.com', 'dfsjdfksjkjfasjfksajskdjfaksldf'),
(2, 'Admin', 'mr.ze12@gmail.com', 'dfsjdfksjkjfasjfksajskdjfaksldf'),
(3, 'Admin', 'mr.ze12@gmail.com', 'dfsjdfksjkjfasjfksajskdjfaksldf'),
(4, 'Admin', 'mr.ze12@gmail.com', 'dfsjdfksjkjfasjfksajskdjfaksldf');

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE IF NOT EXISTS `sach` (
  `masach` int(11) NOT NULL AUTO_INCREMENT,
  `tensach` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tentacgia` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matheloai` int(11) NOT NULL,
  `nhaxuatban` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinhanh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidung` longtext COLLATE utf8_unicode_ci,
  `gia` float DEFAULT NULL,
  `ngaycapnhat` date DEFAULT NULL,
  `trangthai` int(1) DEFAULT '1',
  PRIMARY KEY (`masach`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=58 ;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`masach`, `tensach`, `tentacgia`, `matheloai`, `nhaxuatban`, `hinhanh`, `noidung`, `gia`, `ngaycapnhat`, `trangthai`) VALUES
(1, '5 Centimet Trên Giây', 'Shinkai Makoto', 2, 'Văn Học - IPM', '/images/img_sp/5-centimet-tren-giay.jpeg', '5cm/s không chỉ là vận tốc của những cánh anh đào rơi, mà còn là vận tốc khi chúng ta lặng\r\nlẽ bước qua đời nhau, đánh mất bao cảm xúc thiết tha nhất của tình yêu.\r\nBằng giọng văn tinh tế, truyền cảm, Năm centimet trên giây mang đến những khắc họa mới\r\nvề tâm hồn và khả năng tồn tại của cảm xúc, bắt đầu từ tình yêu trong sáng, ngọt ngào của\r\nmột cô bé và cậu bé. Ba giai đoạn, ba mảnh ghép, ba ngôi kể chuyện khác nhau nhưng đều\r\nxoay quanh nhân vật nam chính, người luôn bị ám ảnh bởi kí ức và những điều đã qua...\r\nKhác với những câu chuyện cuốn bạn chạy một mạch, truyện này khó mà đọc nhanh. Ngón\r\ntay bạn hẳn sẽ ngừng lại cả trăm lần trên mỗi trang sách. Chỉ vì một cử động rất khẽ, một câu\r\nthoại, hay một xúc cảm bất chợt có thể sẽ đánh thức những điều tưởng chừng đã ngủ quên\r\ntrong tiềm thức, như ngọn đèn vừa được bật sáng trong tâm trí bạn. Và rồi có lúc nó vượt quá\r\ngiới hạn chịu đựng, bạn quyết định gấp cuốn sách lại chỉ để tận hưởng chút ánh sáng từ ngọn\r\nđèn, hay đơn giản là để vết thương trong lòng mình có thời gian tự tìm xoa dịu.', 50000, '2015-01-07', 1),
(2, 'Cô Gái Văn Chương Và Tên Hề Thích Chết', 'Nomura Mizuki', 2, 'Văn Học - Thái Hà', '/images/img_sp/CGVC-01.jpeg', 'Cô gái văn chương và tên hề thích chết là tập đầu tiên trong series light novel này, xoay quanh tác phẩm kinh điển Ningen Shikkaku (Mất tư cách làm người) của Osamu Dazai. Lấy bối cảnh học đường, cuốn sách đi vào những góc khuất tâm hồn con người, xoay quanh đời sống nội tâm phức tạp của một số bạn trẻ, xây dựng nên một câu chuyện bí ẩn, li kì, có đôi khi u uẩn, nhưng sau tất cả,Cô gái văn chương và tên hề thích chết vẫn truyền tải một thông điệp tươi sáng về tình bạn, về những mối rung động đầu đời , về niềm tin vào tương lai và sự sống.', 59000, '2015-01-10', 1),
(3, 'Cô Gái Văn Chương Và Hồn Ma Đói Khát', 'Nomura Mizuki', 2, 'Văn Học - Thái Hà ', '/images/img_sp/CGVC-02.jpeg', 'Nếu như tác phẩm chủ đề của tập đầu tiên - Mất tư cách làm người (Ningen Shikkaku) của Dazai Osamu - khiến chúng ta đồng cảm và nhìn thấy bản thân mình trong đó, thì tập 2 này sẽ đưa chúng ta trở lại quá khứ với căn biệt thự nằm giữa ngọn đồi nơi những cơn gió gào rú suốt ngày đêm. Tác phẩm chủ đề của Cô gái văn chương và hồn ma đói khát chính là Đồi gió hú (Wuthering Heights) của nữ văn sĩ người Anh Emily Bronte, một câu chuyện mạnh mẽ và dữ dội về tình yêu và thù hận, đã trở thành một trong những danh tác tuyệt vời nhất thế giới. Thông qua ngòi bút mềm mại uyển chuyển của Nomura Mizuki, có thể bạn sẽ có những cảm nhận rất khác về tác phẩm này cũng như về câu chuyện và các nhân vật trong cuốn sách thứ hai của series mang tên Cô gái văn chương và hồn ma đói khát.', 69000, '2015-01-17', 1),
(4, 'Nỗi Buồn Của Suzumiya Haruhi', 'Nagaru Tanigawa', 2, 'Văn Học - IPM', '/images/img_sp/Haruhi-01.jpeg', '“Suzumiya Haruhi” là series Light Novel của tác giả Nagaru Tanigawa, được minh họa bởi Itou Noizi. Tập đầu tiên được xuất bản tại Nhật Bản vào tháng 6 năm 2003 với tựa đề “Nỗi buồn của Suzumiya Haruhi”. Nội dung series xoay quanh cô nàng nữ sinh trung học Suzumiya Haruhi cùng những trò kì lạ của cô và bạn bè trong Đoàn SOS - câu lạc bộ do cô thành lập. Tính đến tháng 6 năm 2011, số bản in bán ra tại Nhật Bản đã đạt mốc 8 triệu bản; lượng tiêu thụ của Light Novel này và phiên bản truyện tranh của nó tại 15 quốc gia khác cũng lên tới 16 triệu 500 nghìn bản. “Nỗi buồn của Suzumiya Haruhi” đã đạt giải thưởng Sneaker lần thứ 8 và luôn dẫn đầu trong các bảng xếp hạng về Light Novel ở Nhật Bản và thế giới.', 54000, '2015-01-20', 1),
(5, 'Tiếng Thở Dài Của Suzumiya Haruhi', 'Nagaru Tonigawa', 2, 'Văn Học - IPM', '/images/img_sp/Haruhi-02.jpeg', 'Suzumiya Haruhi là người đứng đầu đoàn SOS, đoàn được thành lập với mục đích tìm kiếm người ngoài hành tinh, người đến từ tương lai hay người có siêu năng lực. Mối lo lắng lớn nhất của cô hiện tại là ngày hội trường chẳng có sự kiện gì hay ho. Quyết tâm khiến sự kiện này trở nên thú vị, cũng được thôi nhưng chúng ta đâu cần phải quay phim? Mỗi lần Haruhi nảy ra ý tưởng gì đó thì người ngoài hành tinh, người đến từ tương lai, người có siêu năng lực quanh cô lại một phen khốn đốn.', 54000, '2015-01-30', 1),
(6, 'Cô Gái Văn Chương Và Gã Khờ Bị Trói Buộc', 'Nomura Mizuki', 2, 'Văn Học - Thái Hà ', '/images/img_sp/CGVC-03.jpeg', 'Cô gái văn chương và gã khờ bị trói buộc là tập thứ ba trong series Cô gái văn chương. Nếu như hai tập đầu tiên lấy cảm hứng từ những tiểu thuyết văn học nổi tiếng ở Nhật Bản và trên thế giới, thì tác phẩm chủ đề của tập này là Tình bạn – một vở kịch của Mushanokouji Saneatsu, xoay quanh chủ đề đấu tranh nội tâm giữa tình yêu và tình bạn. Nojima – nhân vật chính – yêu Sugiko, nhưng Sugiko lại đem lòng yêu bạn thân của anh ta, Oomiya. Oomiya tuy cũng có tình cảm với Sugiko, nhưng vì tình bạn với Nojima, anh đã quyết định sẽ kìm nén cảm xúc của mình và chúc phúc cho người bạn thân. Câu chuyện trong tác phẩm này được lồng ghép một cách khéo léo vào câu chuyện của những nhân vật trong Cô gái văn chương. Nếu như mối quan hệ giữa các nhân vật trong truyện ở các tập trước vẫn còn rời rạc thì đến tập này mọi thứ được kết nối lại. Những bí mật dần hé mở, khiến cho người đọc phải suy đoán về những diễn biến tiếp theo của series này.', 69000, '2015-02-02', 1),
(7, 'Sự Chán Chường Của Suzumiya Haruhi', 'Nagaru Tonigawa', 2, 'Văn Học - IPM', '/images/img_sp/Haruhi-03.jpeg', 'Đoàn SOS do Suzumiya Haruhi lập nên luôn trải qua những ngày tháng ngập tràn những điều lạ lùng, kì quặc. Khi mỗi thành viên đều phải vật lộn với những bài kiểm tra thì Haruhi vẫn không ngừng nảy ra ý tưởng thú vị nhằm thoát khỏi sự chán chường. Đoàn SOS đã phải tham gia giải đấu bóng chày, gửi điều ước đến Ngưu Lang và Chức Nữ trong ngày lễ Thất Tịch, giải quyết lời yêu cầu từ người khách bất chợt, rồi lại trải qua đêm mưa bão kinh hoàng trên một hòn đảo biệt lập.\r\nHaruhi, sao trên đời này lại có người như cậu vậy?', 54000, '2015-02-03', 1),
(8, 'Cô gái văn chương và Thiên thần sa ngã', 'Nomura Miyuki', 2, 'Văn Học - Thái Hà', '/images/img_sp/CGVC-04.jpeg', 'Cô gái văn chương và thiên thần sa ngã là tập thứ 4 trong series light novel nổi tiếng Cô gái văn chương. Tác phẩm chủ đề lần này là Bóng ma trong nhà hát, một cuốn tiểu thuyết cực kỳ nổi tiếng trên thế giới nhờ vào sự thành công của phiên bản nhạc kịch. So với tập trước, nội dung tập 4 này mang một gam màu lạnh hơn, với những nhà hát kịch, những cây thông Nôen, những câu chuyện bi ai khổ hạnh của các nhân vật. Ngòi bút đầy ma lực của Nomura Mizuki dẫn chúng ta đi từ những điều bất ngờ này đến những điều bất ngờ khác, bạn sẽ không thể đoán được ai  là “thiên thần”, ai là “bóng ma”, ai tốt, ai xấu, ai đúng, ai sai, tất cả những khái niệm đó đều không còn rõ ràng nữa. Bạn sẽ thương cảm cho tất cả nhân vật và hiểu rằng ai cũng có những nỗi đau của riêng mình.', 69000, '2015-02-05', 1),
(9, 'Cô Gái Văn Chương Và Người Hành Hương Than Khóc', 'Nomura Miyuki', 2, 'Văn Học - Thái Hà', '/images/img_sp/CGVC-05.jpeg', 'Cô gái văn chương và người hành hương than khóc là tập thứ 5 trong series light novel nổi tiếng Cô gái văn chương. Tác phẩm chủ đề lần này là Đường sắt ngân hà, một cuốn tiểu thuyết của nhà văn chuyên viết truyện cổ tích và truyện dành cho thiếu nhi, Miyazawa Kenji.Đường sắt ngân hà là một cuốn sách gắn liền với tuổi thơ của Konoha và Miu. Không chỉ thế, nó còn ẩn giấu nhiều bí mật mà Konoha không ngờ tới. Nếu như tập trước là một câu chuyện buồn, thì lần này Nomura Mizuki đẩy câu chuyện lên đến cao trào, đây nhất định là một trong những tập được ngóng chờ nhất của toàn bộ series!', 72000, '2015-02-05', 1),
(10, 'Sự Biến Mất của Suzumiya Haruhi', 'Nagaru Tonigawa', 2, 'Văn Học - IPM', '/images/img_sp/Haruhi-04.jpeg', 'Một thế giới không tồn tại người ngoài hành tinh, người đến từ tương lai hay người có siêu năng lực, một thế giới mà ở đó, Nagato Yuki trở thành một cô gái dễ e thẹn, Asahina Mikuru xem Kyon như người xa lạ, còn Kyon trở lại với cuộc sống thường nhật sóng yên biển lặng của một học sinh cấp ba. Thế nhưng, sự bình thường ấy lại khiến Kyon hoang mang, cậu bắt đầu tìm kiếm những vết tích về sự “bất thường” của các thành viên đoàn SOS. Buổi tiệc Giáng sinh của đoàn SOS do Haruhi đề xuất liệu có thể tiến hành thuận lợi hay không?', 54000, '2015-02-11', 1),
(11, 'Đại Chiến Titan - Tập 1', 'Hajime Isayama', 1, 'TVM Comics', '/images/img_sp/dai-chien-titan-tap-1.jpg', 'Hơn 100 năm trước, giống người khổng lồ Titan đã tấn công và đẩy loài người tới bờ vực tuyệt chủng. Những con người sống sót tụ tập lại, xây bao quanh mình 1 tòa thành 3 lớp kiên cố và tự nhốt mình bên trong để trốn tránh những cuộc tấn công của người khổng lồ. Họ tìm mọi cách để tiêu diệt người khổng lồ nhưng không thành công. Và sau 1 thế kỉ hòa bình, giống khổng lồ đã xuất hiện trở lại, một lần nữa đe dọa sự tồn vong của con người.... Elen và cô em gái Mikasa phải chứng kiến một cảnh tượng cực kinh khủng - mẹ của mình bị ăn thịt ngay trước mắt. Elen thề rằng cậu sẽ giết tất cả những tên khổng lồ mà cậu gặp... ', 21000, '2015-02-12', 1),
(12, 'Đại Chiến Titan - Tập 2', 'Hajime Isayama', 1, 'TVM Comics', '/images/img_sp/dai-chien-titan-tap-2.jpeg', 'Hơn 100 năm trước, giống người khổng lồ Titan đã tấn công và đẩy loài người tới bờ vực tuyệt chủng. Những con người sống sót tụ tập lại, xây bao quanh mình 1 tòa thành 3 lớp kiên cố và tự nhốt mình bên trong để trốn tránh những cuộc tấn công của người khổng lồ. Họ tìm mọi cách để tiêu diệt người khổng lồ nhưng không thành công. Và sau 1 thế kỉ hòa bình, giống khổng lồ đã xuất hiện trở lại, một lần nữa đe dọa sự tồn vong của con người.... Elen và cô em gái Mikasa phải chứng kiến một cảnh tượng cực kinh khủng - mẹ của mình bị ăn thịt ngay trước mắt. Elen thề rằng cậu sẽ giết tất cả những tên khổng lồ mà cậu gặp... ', 21000, '2015-02-14', 1),
(13, 'Đại Chiến Titan - Tập 3', 'Hajime Isayama', 1, 'TVM Comics', '/images/img_sp/dai-chien-titan-tap-3.jpeg', 'Hơn 100 năm trước, giống người khổng lồ Titan đã tấn công và đẩy loài người tới bờ vực tuyệt chủng. Những con người sống sót tụ tập lại, xây bao quanh mình 1 tòa thành 3 lớp kiên cố và tự nhốt mình bên trong để trốn tránh những cuộc tấn công của người khổng lồ. Họ tìm mọi cách để tiêu diệt người khổng lồ nhưng không thành công. Và sau 1 thế kỉ hòa bình, giống khổng lồ đã xuất hiện trở lại, một lần nữa đe dọa sự tồn vong của con người.... Elen và cô em gái Mikasa phải chứng kiến một cảnh tượng cực kinh khủng - mẹ của mình bị ăn thịt ngay trước mắt. Elen thề rằng cậu sẽ giết tất cả những tên khổng lồ mà cậu gặp... ', 21000, '2015-02-16', 1),
(14, 'Đại Chiến Titan - Tập 4', 'Hajime Isayama', 1, 'TVM Comics', '/images/img_sp/dai-chien-titan-tap-4.jpeg', 'Hơn 100 năm trước, giống người khổng lồ Titan đã tấn công và đẩy loài người tới bờ vực tuyệt chủng. Những con người sống sót tụ tập lại, xây bao quanh mình 1 tòa thành 3 lớp kiên cố và tự nhốt mình bên trong để trốn tránh những cuộc tấn công của người khổng lồ. Họ tìm mọi cách để tiêu diệt người khổng lồ nhưng không thành công. Và sau 1 thế kỉ hòa bình, giống khổng lồ đã xuất hiện trở lại, một lần nữa đe dọa sự tồn vong của con người.... Elen và cô em gái Mikasa phải chứng kiến một cảnh tượng cực kinh khủng - mẹ của mình bị ăn thịt ngay trước mắt. Elen thề rằng cậu sẽ giết tất cả những tên khổng lồ mà cậu gặp... ', 21000, '2015-02-17', 1),
(15, 'Tôi Không Phải Là Công Chúa', 'Kawi', 5, 'Văn Học - Người', '/images/img_sp/toi-khong-phai-la-cong-chua.jpeg', 'Truyện "Tôi Không Phải Là Công Chúa" là câu chuyện thú vị về tình yêu tuổi Teen nói riêng và phản ánh đời sống tâm lý, xã hội của lứa tuổi này nói chung, xoay quanh câu chuyện về Lam và những người bạn trai.', 48000, '2015-02-17', 1),
(16, 'Tạp Chí C-SMILE - Vol 1', 'Nhiều Tác Giả', 3, NULL, '/images/img_sp/tap-chi-c-smile-vol-1.jpeg', 'Tạp chí chuyên đề manga-amie chất lượng , mới được ra mắt với phần nội dung mới lạ và hình thức được chau chuốt đẹp mắt , nếu bạn là một người quan tâm tới amie và manga chắc hẳn đây sẽ là một cuốn " cẩm nang" cần thiết .', 80000, '2015-02-19', 1),
(17, 'Tạp Chí C-SMILE - Vol 2', 'Nhiều Tác Giả', 3, NULL, '/images/img_sp/tap-chi-c-smile-vol-2.jpeg', 'Tạp chí chuyên đề manga-amie chất lượng , mới được ra mắt với phần nội dung mới lạ và hình thức được chau chuốt đẹp mắt , nếu bạn là một người quan tâm tới amie và manga chắc hẳn đây sẽ là một cuốn " cẩm nang" cần thiết .', 80000, '2015-02-20', 1),
(18, 'Tôi Ghét Anh... Đồ Du Côn!', 'Thuyuuki', 5, 'Văn Học - Người', '/images/img_sp/toi-ghet-anh-do-du-con.jpeg', 'Tôi Ghét Anh… Đồ Du Côn! - Sẽ là một câu chuyện thú vị và tác phẩm hiện tại đang làm mưa làm gió trên các diễn đàn sẽ đem đến sự hài hước, những tình tiết bất ngờ cùng những bài học quí giá về tình bạn và tình yêu.\r\n…\r\nTôn Nữ An Nhiên, một cô nàng thần đồng xinh đẹp nhưng lém lỉnh, luôn coi mục tiêu học tập là trên hết. Cô được mệnh danh là con cưng của trường THPT Thanh Đằng luôn là cái tên được nhắc đến đầu bảng trong các kì thi. Vào một ngày đẹp trời, cô vô tình chạm trán Trần Lam Phong - chàng hotboy lạnh lùng, chàng hoàng tử du côn, nổi tiếng là kẻ coi con gái là thứ đồ chơi không hơn không kém. Sau lần chạm mặt chẳng có gì là hay ho đó, Tôn Nữ An Nhiên còn gặp lại anh chàng du côn đẹp trai tại chính ngôi trường của mình và mọi chuyện dở khóc dở cười dường như chỉ mới bắt đầu:\r\n Mọi người nghe đây, từ bây giờ Tôn Nữ Hà Nhiên sẽ là bạn gái thứ 102 của tôi.\r\n- Này, cậu điên hả, bỏ tay tôi ra. Tôi hét lên, cố hất tay hắn ra nhưng vô ích, hắn khoẻ như voi ý híc híc. Hắn liếc nhìn tôi, nở một nụ cười đểu, nhếch mép nói:\r\n- Tôi đã nói rồi, thứ gì tôi đã muốn sẽ là của tôi, bởi vì tôi - là - đồ - du - côn.\r\nGặp rắc rối với anh chàng du côn Lam Phong vẫn còn chưa đủ, thêm vào đó Tôn Nữ An Nhiên lại càng rắc rối hơn nữa khi cô chạm mặt một thầy giáo thực tập tóc vàng tên là Quốc Thiên, anh chàng này rất cực kỳ đẹp trai và dịu dàng cũng dành tình cảm cho cô và cố tình  chen ngang vào mối quan hệ giữa cô và Lam Phong. Tất cả cuộc sống của Tôn Nữ An Nhiên dường như bị đảo lộn, kéo theo đó là biết bao nhiêu tình huống dở khóc dở cười cùng với một cô nàng hotgirl đỏng đảnh và những người bạn dễ thương trong trường cấp 3.\r\nTôn Nữ An Nhiên đã từng ghét cay ghét đắng tên du côn kiêu căng ngạo mạn Lam Phong. Liệu cô có thể thay đổi được suy nghĩ về anh chàng đẹp trai này không? Khi càng gần anh ta cô càng phát hiện ra rằng trái tim mình đã không còn thuộc về cô nữa? Và liệu những sóng gió gì sẽ đến với câu chuyện tình yêu học trò đầy hài hước và lãng mạn này nhỉ?', 80000, '2015-02-23', 1),
(19, 'Hãy Chăm Sóc Mẹ', 'Shin Kyung - Sook', 6, 'Nhã Nam', '/images/img_sp/hay-cham-soc-me.jpeg', 'Tác phẩm Hãy chăm sóc mẹ của nhà văn Hàn Quốc Kyung-sook Shin mở đầu bằng khung cảnh xáo trộn của một gia đình. Mẹ bị lạc khi chuẩn bị bước lên tàu điện ngầm cùng bố ở ga Seoul. Hai ông bà dự định lên đây thăm cậu con cả. Con gái đầu, Chi-hon, là người đứng ra viết thông báo tìm người lạc thay cho cả gia đình. “Ngoại hình: Tóc ngắn đã muối tiêu, xương gò má cao, khi đi lạc đang mặc áo sơ mi xanh da trời, áo khoác trắng, váy xếp nếp màu be”. Trong tiềm thức của mình, Chi-hon vẫn nghĩ mẹ là người thường“bước đi giữa biển người với phong thái có thể đe dọa cả những tòa nhà lừng lững đang nhìn thẳng xuống từ trên cao”. Trong khi đó, những người qua đường đáp lại thông báo tìm người lạc của cô bằng miêu tả về một “một bà già cứ lững thững bước đi, thỉnh thoảng lại ngồi bệt xuống đường hay đứng thẫn thờ trước cầu thang cuốn”. Liệu đó có phải là người mẹ mà cả gia đình cô đang cất công tìm kiếm?\r\nMột ngày, một tuần rồi gần một tháng chầm chậm trôi qua. Người chồng và những đứa con hiện đều đã phương trưởng cả không chỉ lo sốt vó mà còn day dứt tâm can vì cảm giác tội lỗi, và rối bời “trong nỗi hoảng loạn như thể tất cả mọi người đều bị tổn thương ở vùng não”. Họ cũng lấy làm băn khoăn tại sao mẹ không biết hỏi đường về nhà cậu con cả cho đến khi phát hiện ra hai sự thật rằng mẹ không biết chữ và mẹ bệnh ung thư vú khiến đầu óc không được minh mẫn như thường. \r\nTừ đây, những hy vọng tìm lại mẹ càng trở nên mong manh hơn… ', 62000, '2015-02-24', 1),
(20, 'Tảo Mộ - Tập 1', 'Ngô Trầm Thủy', 6, 'Dân Trí', '/images/img_sp/tao-mo-tap-1.jpg', 'Vốn là một cậu ấm danh gia vọng tộc, nhưng bản tính Lâm Thế Đông hiền lành, hết lòng tin tưởng bạn bè, âm thầm hy sinh cho người mình yêu. Ngờ đâu chính những người anh tin yêu lại bắt tay nhau phản bội, đẩy anh vào vực sâu của tuyệt vọng để rồi phải vùi thây giữa đường. May thay, linh hồn anh được chuyển sinh vào cậu bé mười bảy tuổi, Giản Dật. Ba năm sau, khi đến tảo mộ, anh đã bất ngờ gặp lại kẻ thù ngay trước phần mộ của chính mình. \r\n\r\nCâu chuyện từ dĩ vãng từng chút từng chút một bị khơi dậy, sự thật dẫn đến cái chết thảm khốc của anh trong quá khứ cũng dần dần được hé lộ. Rốt cuộc đó là một âm mưu được sắp đặt sẵn, hay còn uẩn khúc nào chăng? \r\n\r\nÝ nghĩa của việc anh được trùng sinh là để báo thù rửa hận, hay là để anh có cơ hội đứng ở một góc nhìn khác, ngẫm lại cuộc đời xưa kia của mình?', 119000, '2015-02-25', 1),
(21, 'Tảo Mộ - Tập 2', 'Ngô Trầm Thủy', 6, 'Dân Trí', '/images/img_sp/tao-mo-tap-2.jpeg', 'Vốn là một cậu ấm danh gia vọng tộc, nhưng bản tính Lâm Thế Đông hiền lành, hết lòng tin tưởng bạn bè, âm thầm hy sinh cho người mình yêu. Ngờ đâu chính những người anh tin yêu lại bắt tay nhau phản bội, đẩy anh vào vực sâu của tuyệt vọng để rồi phải vùi thây giữa đường. May thay, linh hồn anh được chuyển sinh vào cậu bé mười bảy tuổi, Giản Dật. Ba năm sau, khi đến tảo mộ, anh đã bất ngờ gặp lại kẻ thù ngay trước phần mộ của chính mình. \r\n\r\nCâu chuyện từ dĩ vãng từng chút từng chút một bị khơi dậy, sự thật dẫn đến cái chết thảm khốc của anh trong quá khứ cũng dần dần được hé lộ. Rốt cuộc đó là một âm mưu được sắp đặt sẵn, hay còn uẩn khúc nào chăng? \r\n\r\nÝ nghĩa của việc anh được trùng sinh là để báo thù rửa hận, hay là để anh có cơ hội đứng ở một góc nhìn khác, ngẫm lại cuộc đời xưa kia của mình?', 119000, '2015-02-25', 1),
(22, 'Yêu Người Yêu Người Ta', 'Gia Đoàn', 5, NULL, '/images/img_sp/yeu-nguoi-yeu-nguoi-ta.jpeg', 'Tình yêu chưa bao giờ là một điều đơn giản. Nếu như trong cuộc đời này, cứ thả lòng mà say đắm yêu một người rồi người ta cũng nhiệt thành đáp lại thì sẽ bớt đi rất nhiều khổ đau, rất nhiều nước mắt… Chỉ là, có những yêu thương không bao giờ thuộc về người đến muộn. Chỉ là đôi khi… yêu người yêu người ta. Có duyên mới gặp, có nợ mới yêu. Nhưng yêu người yêu người ta… rốt cuộc là duyên hay nợ? Vẫn biết rằng cuộc tình ấy đã chật chỗ từ lâu, cũng chẳng muốn chèn chân chen ngang xin chút tình thừa mứa, chỉ là rất nhiều khi lí trí chẳng cản nổi cảm xúc, trái tim ngột ngạt thèm yêu thương.\r\nThế rồi trót lỡ Yêu người yêu người ta. Thế rồi khổ, đau, buồn, tủi trong chính tình-yêu-một-mình ấy. Yêu người yêu người ta - Cuốn sách này, ngay cái tên của nó thôi đã thấy sao buồn đến vậy. Là những mảnh tình không trọn vẹn, những cuộc tình chưa bao giờ có cơ hội để bắt đầu. Cứ âm thầm lặng lẽ đi bên cuộc đời người, nhìn những lo âu, hờn giận, vui buồn của người bên kẻ khác. Để rồi câm lặng  đau và xót xa về một niềm thương nhớ chưa bao giờ chạm tay tới được…\r\nYêu đơn phương là tình câm. Nhưng trót lỡ Yêu người yêu người ta lại là tình cay xót, để rồi sau tất cả những tâm tư giấu kín, những buồn đau một mình, những xót xa không thể tỏ, ta bỗng nhận ra rằng: Trong cuộc đời này, có những người đàn ông mà ta chỉ nhớ thương rồi để đấy. Bởi ngay cả việc đau khổ vì họ cũng không được phép. Cuộc sống luôn có nhiều mối nợ không duyên… Yêu người yêu người ta - nghe xót xa đến thương lòng: Giá được một chén say mà ngủ suốt triệu đêm Khi tỉnh dậy anh đã chia tay với người con gái ấy. Giá được anh hẹn hò dù phải chờ lâu đến mấy Em sẽ chờ như thể một tình yêu… Yêu người yêu người ta… Nhưng cuộc đời rồi sẽ có bao lần được thiết tha vì một người đến vậy. Chỉ có những năm tháng thanh xuân, chúng ta yêu một người chẳng vì bất kì lý do nào cả… cứ vậy mà yêu thôi!', 92000, '2015-02-26', 1),
(23, 'Dám Yêu', 'Quỳnh Thy', 5, NULL, '/images/img_sp/dam-yeu.jpeg', 'Điều sai lầm lớn nhất là phủ nhận những gì trái mình thực sự cảm nhận! Dám yêu là những dòng thương nhớ trong veo của mối tình đầu vụng dại, là những cung bậc cảm xúc ai rồi cũng một lần trải qua. Yêu là dám đương đầu và chấp nhận.\r\nỞ Dám yêu là cuộc sống của những người trẻ chông chênh, mỏng manh và đơn độc giữa những tháng ngày bão tố. Tuổi trẻ của họ được yêu, được nông nổi, được khờ dại, được nếm trải những nỗi đau để rồi nhận ra rằng: Nếu chẳng có gì khác ngoài tình yêu thì chỉ riêng tình yêu thôi chưa đủ.Dám yêu nhẹ nhàng như vị tình yêu, đắng chát như mùi thù hận và bất ngờ với những bí mật khơi sâu. Cuối cùng nhận ra, chẳng ai có thể vô cảm khi đã sinh ra để làm người, trái tim dẫu méo mó sứt sẹo thì vẫn cứ ẩn che những hẫng hụt, những chới với, những hờn giận và cả những yêu thương.\r\nCuộc sống đã và đang vô tình đem lại cho chúng ta rất nhiều đau khổ, người với người giày vò nhau bằng những nỗi đau. Tình yêu hiển nhiên là sai khi chúng ta không có vỏ bọc bảo vệ cho thứ tình cảm mong manh dễ vỡ ấy. Nếu dám yêu, hãy dám sống và dám bảo vệ trái tim mình. Dám mạnh mẽ chống trả lại.Đừng bao giờ bỏ cuộc!Đừng bao giờ ngừng níu giữ nếu biết chắc nơi đó là nơi bạn thuộc về.Đừng khóc và đừng thôi hy vọng! Dù cuộc đời có nhiều giông bão, đừng e ngại hay sợ hãi, hãy cứ ôm chặt chở che tình yêu theo cách của riêng bạn nhé!\r\nDám yêu chắc hẳn sẽ là món quà vừa vặn nhất để dành tặng bản thân khi mùa lạnh đang về.Tin tôi đi, rồi bạn sẽ tìm thấy tuổi trẻ và tình yêu của mình nơi đó…', 93000, '2015-02-26', 1),
(24, 'Tạp Chí C-SMILE - Vol 3', 'Nhiều Tác Giả', 3, NULL, '/images/img_sp/tap-chi-c-smile-vol-3.jpeg', 'Tạp chí chuyên đề manga-amie chất lượng , mới được ra mắt với phần nội dung mới lạ và hình thức được chau chuốt đẹp mắt , nếu bạn là một người quan tâm tới amie và manga chắc hẳn đây sẽ là một cuốn " cẩm nang" cần thiết .', 70000, '2015-02-26', 1),
(25, 'Hannibal', 'Thomas Harris', 4, 'Nhã Nam', '/images/img_sp/hannibal.jpeg', 'Được xem là một trong những sự kiện văn chương được chờ đợi nhất, Hannibal và những ngày run rẩy bắt đầu mang người đọc vào cung điện ký ức của một kẻ ăn thịt người, tạo dựng nên một bức chân dung ớn lạnh của tội ác đang âm thầm sinh sôi – một thành công của thể loại kinh dị tâm lý.\r\nVới Mason Verger, nạn nhân đã bị Hannibal biến thành kẻ người không ra người, Hannibal là mối hận thù nhức nhối da thịt.\r\nVới đặc vụ Clarice Starling của FBI, người từng thẩm vấn Hannibal trong trại tâm thần, giọng kim ken két của hắn vẫn vang vọng trong giấc mơ cô.\r\nVới cảnh sát Rinaldo Pazzi đang thất thế, Lecter hứa hẹn mang tới một khoản tiền béo bở để đổi vận.\r\nVà những cuộc săn lùng Hannibal Lecter bắt đầu, kéo theo đó là những chuỗi ngày run rẩy hòng chấm dứt bảy năm tự do của hắn. Nhưng trong ba kẻ đi săn, chỉ một kẻ có bản lĩnh sống trụ lại để hưởng thành quả của mình.', 108000, '2015-02-27', 1),
(26, 'Kasha', 'Miyuki Miyabe', 4, 'Văn Học - IPM', '/images/img_sp/kasha.jpeg', 'Kasha, tiểu thuyết trinh thám của Miyuki Miyabe, kết hợp cả hai ý tưởng này, kể về một thứ yêu quái mang dáng hình đàn bà, chuyên vun xới đời mình trên xác tàn của kẻ khác. Chỉ chăm chăm nhảy vào cỗ xe lửa của thi hài, mà không hay mình đang thay thi hài đến nơi ngục hình chịu tội.', 109000, '2015-02-28', 1),
(27, 'Sự Im Lặng Của Bầy Cừu', 'Thomas Harris', 4, 'Nhã Nam', '/images/img_sp/su-im-lang-cua-bay-cuu.jpeg', 'Những cuộc phỏng vấn ở xà lim với kẻ ăn thịt người ham thích trò đùa trí tuệ, những tiết lộ nửa chừng hắn chỉ dành cho kẻ nào thông minh, những cái nhìn xuyên thấu thân phận và suy tư của cô mà đôi khi cô muốn lảng tránh... Clarice Starling đã dấn thân vào cuộc điều tra án giết người lột da hàng loạt như thế, để rồi trong tiếng bức bối của chiếc đồng hồ đếm ngược về cái chết, cô phải vật lộn để chấm dứt tiếng kêu bao lâu nay vẫn đeo đẳng giấc mơ mình: tiếng kêu của bầy cừu sắp bị đem đi giết thịt.', 90000, '2015-02-28', 1),
(28, 'Tạp Chí C-SMILE - Vol 4', 'Nhiều Tác Giả', 3, NULL, '/images/img_sp/tap-chi-c-smile-vol-4.jpeg', 'Tạp chí chuyên đề manga-amie chất lượng , mới được ra mắt với phần nội dung mới lạ và hình thức được chau chuốt đẹp mắt , nếu bạn là một người quan tâm tới amie và manga chắc hẳn đây sẽ là một cuốn " cẩm nang" cần thiết .', 60000, '2015-02-28', 1),
(29, 'Tạp Chí C-SMILE - Vol 5', 'Nhiều Tác Giả', 3, NULL, '/images/img_sp/tap-chi-c-smile-vol-5.jpg', 'Tạp chí chuyên đề manga-amie chất lượng , mới được ra mắt với phần nội dung mới lạ và hình thức được chau chuốt đẹp mắt , nếu bạn là một người quan tâm tới amie và manga chắc hẳn đây sẽ là một cuốn " cẩm nang" cần thiết .', 70000, '2015-03-01', 1),
(30, 'Naruto - Tập 70', 'Masashi Kishimoto', 1, 'TVM Comics', '/images/img_sp/naruto-tap-70.jpeg', 'Mười hai năm trước khi bộ truyện này bắt đầu, con Hồ Ly Chín Đuôi đã tấn công ngôi làng ninja Konoha. Nó đã gây nên sự hỗn loạn tột cùng và giết chóc nhiều người, cho tới khi người lãnh đạo của làng - ngài Hokage Đệ Tứ đã hi sinh để phong ấn con quái vật vào bên trong Naruto khi cậu ta mới sinh.\r\nHokage Đệ Tứ, người được vinh danh vì đã phong ấn con yêu hồ li, mong muốn Naruto được tôn trọng vì là thân xác chứa đựng con quái vật. Dù vậy, dân làng lại xa lánh cậu ta, đối xử với Naruto như chính cậu là con yêu hồ và ngược đãi cậu trong suốt thời thơ ấu.', 18000, '2015-03-02', 1),
(31, 'Toriko - Tập 26', 'Mitsutoshi Shimabukuro', 1, 'Kim Đồng', '/images/img_sp/toriko-tap-26.jpeg', '“Bây giờ là thời đại của những kẻ sành ăn, là lúc để đi khám phá những hương vị chưa ai từng thưởng thức”. Sau khi tập 1 được phát hành vào tháng 11 năm 2008 tại Nhật Bản, “Toriko” đã lọt vào Top 10 Manga bán chạy nhất trong tuần đầu tiên. Và cứ năm tiếp theo, lượng bán lại phá kỉ lục của năm trước. Chỉ còn ít ngày nữa, Nhà xuất bản Kim Đồng sẽ gửi tới các fan tập đầu tiên của bộ truyện này. Điều gì khiến “Toriko” được yêu mến đến thế? Hãy đọc và cảm nhận', 18000, '2015-03-03', 1),
(32, 'Con Đường Mùa Xuân - Tập 8', 'Io Sakisaka', 1, 'Kim Đồng', '/images/img_sp/con-duong-mua-xuan-tap-8.jpeg', 'Trong mắt cô nữ sinh Futaba, Tanaka là một cậu bạn "khá nhỏ con", giọng nói "nghe rất êm tai" và có gì đó không giống những tên con trai khác. Khi tình cờ cùng trú mưa dưới mái hiên của một ngôi đền, Futaba nhận ra mình đã "cảm nắng" cậu bạn đáng yêu này. "Cặp đôi gà bông" đang ngày một xích lại gần nhau thì Tanaka đột ngột chuyển đi nơi khác. Có chút hụt hẫng khi Futaba chưa kịp thổ lộ lòng mình… Ba năm trôi qua, Takana vẫn chiếm một góc trong trái tim cô. Từng bị bạn bè tẩy chay nên lên cấp ba, Futaba thay đổi hình tượng của bản thân – trở thành một cô nàng luộm thuộm, có bản lĩnh nhưng lại không cho phép mình nổi bật quá, kẻo sẽ bị gọi là “giả nai” hay “cố tỏ ra ngây thơ” trước mặt đám con trai. Cô nghĩ: "Thà có bạn hữu danh vô thực còn hơn chán so với việc phải ở một mình, vì mình sẽ không thấy trống trải". Rồi một người gợi nhớ tới Tanaka bất ngờ xuất hiện, nhưng khác xa so với tưởng tượng của cô, anh chàng này "khi thì giúp đỡ, lúc lại đẩy mình ra xa...", vô cùng khó hiểu. Liệu Futaba có thể chấp nhận một "Takana mới" hay không? Thế nhưng, càng tiếp xúc với Tanaka, cô càng nhận ra được nhiều điều, cũng như có can đảm nói ra suy nghĩ của mình cho hai người "bạn thân” biết và quyết tâm tạo dựng lại các mối quan hệ từ đầu.', 16000, '2015-03-04', 1),
(33, 'Yaiba - Tập 18', 'Aoyama Gosho', 1, 'Kim Đồng', '/images/img_sp/yaiba-tap-18.jpeg', 'Đây là một câu chuyện hài hước, vui nhộn về một samurai trẻ mang tên Kurogane Yaiba. Yaiba sống với cha, Kenjurou, trong rừng. Một ngày nọ, khi Yaiba đang ăn, một đàn khỉ đột xông đến tấn công 2 cha con cậu. Yaiba và cha trốn thoát và trốn vào trong một cái hộp, nhưng họ không hề biết rằng cái hộp đó chứa đầy quả thơm và đang được chuẩn bị đem vào thành phố. Trong thành phố, Yaiba được biết rằng cậu là một chiến binh huyền thoại và phải chiến đấu chống lại tên yêu ma có hình dạng của một học sinh mang tên Takeshi.', 18000, '2015-03-05', 1),
(34, 'Gia Sư Hitman Reborn - Tập 18', 'Akira Amano', 1, 'Kim Đồng', '/images/img_sp/gia-su-hitman-reborn-tap-18.jpeg', 'Một câu chuyện giản dị, hài hước và giàu cảm xúc về cuộc sống thường nhật của cậu bé Tsunayoshi Sawada rụt rè, hậu đậu và nhát gan. \r\nMột câu chuyện đầy màu sắc siêu thực về quá trình luyện tập để trở thành ông trùm mafia đời thứ 10 của một cậu bé Nhật Bản rất đỗi bình thường.\r\nMột câu chuyện tập hợp những nhân vật điên khùng, hài hước, độc nhất vô nhị…\r\nĐó là vài điều mà một độc giả như tôi có thể thốt lên khi đọc những tập đầu tiên của bộ truyện Gia sư Hitman Reborn. Hãy tin tôi đi, đây là một câu chuyện có thể khiến bạn mỉm cười.', 18000, '2015-03-06', 1),
(35, 'Itto - Cơn Lốc Sân Cỏ - Tập 35', 'Motoki Monma', 1, 'Kim Đồng', '/images/img_sp/itto-con-loc-san-co-tap-35.jpeg', 'Vui nhộn, hài huớc và đầy kịch tính - thật đáng tiếc nếu các bạn bỏ qua bộ truyện tranh “Itto – Sóng gió cầu truờng”. Và sẽ càng háo hức hơn, khi biết rằng đây chính là trọn vẹn phần hai của bộ “Jinđô - Đường dẫn đến khung thành” từng để lại nhiều ấn tuợng sâu đậm trong lòng độc giả Việt Nam xưa kia. Giờ đây, chúng ta sẽ đuợc thuởng thức một bộ truyện tranh nguyên gốc và có bản quyền chính thức từ nhà xuất bản Shueisha.', 18000, '2015-03-06', 1),
(36, 'Pandora Hearts - Tập 21', 'Jun Mochizuki', 1, 'Kim Đồng', '/images/img_sp/pandora-hearts-tap-21.jpeg', 'Cậu thiếu niên Oz trong ngày lễ trưởng thành của mình đã tình cờ bị rơi xuống một nghĩa trang bí mật. Tại đây, cậu tìm thấy một chiếc đồng hồ kì lạ với những giai điệu ngân nga. Khi Oz chạm vào chiếc đồng hồ, cậu đã nhìn thấy một loạt những ảo ảnh đáng sợ. Nhưng những dấu hiệu cảnh báo ấy không khiến Oz sợ hãi, ngược lại, nó khơi dậy trong cậu những câu hỏi xung quanh nguồn gốc của chiếc đồng hồ. Sự tò mò đã chiến thắng nỗi sợ hãi, Oz quyết định mang theo chiếc đồng hồ ra khỏi khu nghĩa trang cổ. Cũng từ đây, vận mệnh của cậu thay đổi mãi mãi…', 22000, '2015-03-07', 1),
(37, 'Asari - Cô Bé Tinh Nghịch - Tập 64', 'Mayumi Muroyama', 1, 'Kim Đồng', '/images/img_sp/asari-co-be-tinh-nghich-tap-64.jpeg', 'Những mẩu chuyện ngắn xoay quanh cuộc sống của cô bé Asari tinh nghịch, hài hước, dí dỏm, quậy phá nhưng cũng rất ngây thơ.', 16000, '2015-03-08', 1),
(38, 'Tạp Chí SOUL - Vol 4', 'Nhiều tác giả', 3, NULL, '/images/img_sp/tap-chi-soul-vol-4.jpeg', 'Tạp Chí Soul là tạp chí về Otaku chính thức của Otaku Thời Báo.', 29000, '2015-03-08', 1),
(39, 'Tạp Chí SOUL - Vol 6', 'Nhiều Tác Giả', 3, NULL, '/images/img_sp/tap-chi-soul-vol-6.jpeg', 'Tạp Chí Soul là tạp chí về Otaku chính thức của Otaku Thời Báo.', 34000, '2015-03-09', 1),
(40, 'Tạp Chí SOUL - Vol 7', 'Nhiều Tác Giả', 3, NULL, '/images/img_sp/tap-chi-soul-vol-7.jpeg', 'Tạp Chí Soul là tạp chí về Otaku chính thức của Otaku Thời Báo.', 34000, '2015-03-10', 1),
(41, 'Tạp Chí SOUL - Vol 8', 'Nhiều Tác Giả', 3, NULL, '/images/img_sp/tap-chi-soul-vol-8.jpeg', 'Tạp Chí Soul là tạp chí về Otaku chính thức của Otaku Thời Báo.', 34000, '2015-03-11', 1),
(42, 'Another (Trọn bộ 2 tập)', 'Yukito Ayatsuji', 2, 'Văn Học - IPM', '/images/img_sp/another.jpeg', 'Hai mươi sáu năm về trước có một học sinh hoàn thiện hoàn mĩ. Rất đẹp, rất giỏi, rất hòa đồng, ai cũng yêu quý, những lời tán tụng người ấy được truyền mãi qua các thế hệ học sinh của trường. Nhưng tên đầy đủ là gì, chết đi thế nào, thậm chí giới tính ra sao lại không một ai hay biết. Người ta chỉ rỉ tai nhau, bỗng nhiên giữa năm bạn ấy chết, trường lớp không sao thoát được nỗi buồn nhớ thương, họ bèn cư xử như thể học sinh này còn tồn tại. Bàn ghế để nguyên, bạn cùng lớp vẫn giả vờ nói chuyện với người đã khuất.', 160000, '2015-03-13', 1),
(43, 'Nín Đi Con', 'Lê Nguyễn Nhật Minh', 5, 'Lantabra', '/images/img_sp/nin-di-con.jpeg', 'NÍN ĐI CON là một quyển sách dạy con. Điều đặc biệt là được viết bởi một 9X chưa làm Mẹ. Một quyển sách không quá nhiều lý lẽ mà chỉ đầy chia sẻ suy tư.', 79000, '2015-03-13', 1),
(44, 'Lưng Chừng Cô Đơn', 'Nguyễn Ngọc Thạch', 5, 'Lantabra', '/images/img_sp/lung-chung-co-don.jpeg', '"Lưng Chừng Cô Đơn" Dành cho chúng ta, những người trẻ, những người hoang mang trong cuộc đời, hoang sơ trong tình yêu.', 60000, '2015-03-14', 1),
(45, 'Môi Một Người Đàn Bà', 'An Hạ', 5, 'Lantabra', '/images/img_sp/moi-mot-nguoi-dan-ba.jpg', 'Môi- một người đàn bà đơn giản là một cuốn sách về tâm hồn người đàn bà, cụ thể là những người đàn bà hiện đại. Tôi chẳng có tham vọng gì lớn lao khi viết cuốn sách này, tôi chỉ viết về những điều cũ kỹ. Bởi tôi tin rằng, đàn bà khi yêu, dù ở bất cứ thời nào, hoàn cảnh nào, độ tuổi nào, cũng đều say đắm, điên cuồng, mong manh với những đợi chờ, khát khao, đớn đau rồi hy sinh…như nhau cả. Tất cả những yêu thương đến hy sinh trên con đường cũ kỹ muôn đời ấy, tôi đặt trong phần Môi.', 60000, '2015-03-15', 1),
(46, 'Mãi Yêu Nhé', 'Nhiều tác giả', 5, 'Văn Hoá Thông Tin', '/images/img_sp/mai-yeu-nhe.jpeg', '“Mãi yêu nhé!” – gói trọn những cảm xúc yêu trọn vẹn, tan chảy đến ngọt lim; gói trọn những yêu thương chân thành gửi đến những trái tim đang yêu, đã yêu và sẽ yêu.', 60000, '2015-03-15', 1),
(47, 'Ngồi Khóc Trên Cây', 'Nguyễn Nhật Ánh', 5, NULL, '/images/img_sp/ngoi-khoc-tren-cay.jpeg', 'Bạn sẽ gặp, sau những câu thơ lãng mạn của chính tác giả làm đề từ, là cuộc sống trong một ngôi làng thơ mộng ven sông, kỳ nghỉ hè với nhân vật là những đứa trẻ mới lớn có vô vàn trò chơi đơn sơ hấp dẫn ghi dấu mãi trong lòng.', 99000, '2015-03-16', 1),
(48, 'Người Yêu Cũ Có Người Yêu Mới', 'Iris Cao', 5, NULL, '/images/img_sp/nguoi-yeu-cu-co-nguoi-yeu-moi.jpeg', '“Người yêu cũ có người yêu mới” gồm hơn 30 tản văn - cảm thức ngắn được Iris Cao viết trong gần 2 năm dưới hình thức nhật ký online. Chính vì giống một cuốn nhật ký, nên người xem sẽ rất dễ dàng tìm thấy những cảm xúc của mình đâu đó được nói lên bằng con chữ.', 55000, '2015-03-16', 1),
(49, 'Đạo Mộ Bút Ký - Tập 1', 'Nam Phái Tam Thúc', 6, 'Lao Động-Bách Việt', '/images/img_sp/dao-mo-but-ky-tap-1.jpeg', 'Là bộ tiểu thuyết trộm mộ nổi tiếng của Nam Phái Tam Thúc. Kết cấu logic, nội dung gay cấn, cách xây dựng cá tính, những tình thế hiểm nghèo và sức mạnh bí ẩn của những thế lực huyền bí đã làm nên sức hút không thể cưỡng lại của ''Đạo mộ bút ký''.', 126000, '2015-03-16', 1),
(50, 'Diễm Quỷ', 'Công Tử Hoan Hỉ', 6, 'Văn Học - IPM', '/images/img_sp/diem-quy.jpg', 'Nguồn cơn cớ sự, kể ra cũng thật hoang đường…\r\nThiên Đế xưa hóa thành thỏ ngọc, sa phàm trần lánh nạn lại mắc bẫy thợ săn. Gã thợ săn ranh mãnh tham lam đòi thưởng công bằng bá đồ vương nghiệp.\r\nPhần thưởng mưu mô ấy, cuối cùng kết cục chẳng vẹn tròn. Trước khi giáng ma tinh hủy diệt vương triều, Thiên Đế đã đóng lên mặt đất một đoạn sử thương đau: huynh đệ tương tàn, thí vua cướp ngôi, gian thần lộng hành, tình nhân tuyệt vọng…\r\nRồi gió thổi tung tro tàn sách sử. Rồi mưa phủ rêu ký ức cố nhân.\r\nKẻ đầu thai thường dân, kẻ quay về chốn cũ, kẻ lục thần vô chủ, kẻ lạc phách tiêu hồn. Riêng mình Diễm quỷ vẫn không buông chấp niệm, vẫn kiên tâm tìm gắn những đổ vỡ tổn thương.\r\nBa trăm năm ân đền oán trả, bất nhập luân hồi. Bao kiếp người sở cầu bất đắc, ái hận khôn nguôi…', 75000, '2015-03-17', 1),
(51, 'Tư Phàm', 'Công Tử Hoan Hỉ', 6, 'Văn Học - IPM', '/images/img_sp/tu-pham.jpg', 'Văn Thư, tên gọi chỉ nghe đã có cảm giác thư thái khoan hòa. Người cũng như tên, khuôn mặt điềm đạm dung dị, mái tóc đen chấm gót, áo dài xanh biếc, bước đi thong thả. Một người dịu dàng tĩnh lặng như vậy lại đem lòng yêu Úc Dương Quân lạnh lùng kiêu ngạo. Vì sao?', 65000, '2015-03-17', 1),
(52, 'Hồ Duyên', 'Công Tử Hoan Hỉ', 6, 'Văn Học - IPM', '/images/img_sp/ho-duyen.jpeg', 'Y dạy học ở thôn làng nho nhỏ, từ thơ bé đã mồ côi, lớn lên cũng phận mọt sách nghèo rớt mồng tơi.\r\n \r\nHắn sinh trong vương tộc, hưởng trọn nhung lụa vàng son, thân hồ ly quen thói ngông cuồng.\r\n \r\nMột đêm mưa dông gió giật, một lần thiên kiếp, một thoáng vô tình lạc bước đến hậu sơn, lại là cơ duyên để đôi bên hội ngộ. Từ đây chấm dứt hai mươi năm hiu quạnh, hai mươi năm bình lặng dửng dưng….\r\n \r\nNgười có ơn và kẻ đến trả ơn, từ lúc nào đã dây dưa không dứt? Là khi y ngơ ngẩn vì bóng áo trắng và đôi mắt vàng kim nhàn nhạt, là khi hắn nhận ra vòng tay y ấm áp vô cùng?\r\n \r\nNgày qua ngày, hắn cho gà ăn, y dạy học, trời đổ mưa lại có ai mang ô đứng đợi, tán ô khoanh lại một khoảnh trời mơ nồng nàn.\r\n \r\nChuyện trời tàn đất tận, chưa đến tàn tận thì ai hay ra sao?\r\n \r\nVậy hãy cùng nhau sống đời bình đạm, cùng nhau đợi đến đất tận trời tàn…', 64000, '2015-03-17', 1),
(53, 'Hoàn Khố', 'Công Tử Hoan Hỉ', 6, 'Văn Học - IPM', '/images/img_sp/hoan-kho.jpeg', 'Hoàn Khố là chuyện về phong lưu, chuyện về những kẻ mang độ bạc tình ra mà ganh đua tỉ thí.', 70000, '2015-03-17', 1),
(54, 'S.C.I - Tập 1 - Sát Nhân Đánh Số', 'Nhĩ Nhã', 4, 'Văn Học - IPM', '/images/img_sp/sci-tap-1-sat-nhan-danh-so.jpeg', 'Đã bao giờ bạn nghĩ đến một phủ Khai Phong của thời hiện đại? Với “Ngự Miêu” Triển Chiêu - tiến sĩ tâm lý học, “Cẩm Mao Thử” Bạch Ngọc Đường - đội trưởng đội hình sự hay Công Tôn "sư gia" - bác sĩ pháp y? Ba tinh anh chói lóa như vầng sao Văn sao Vũ sáng nhất trên bầu trời đã họp lại dưới vòm của S.C.I - tiểu đội chuyên điều tra các vụ án có tình tiết "đặc biệt".', 80000, '2015-03-18', 1),
(55, 'Kim Tự Tháp Đỏ', 'Rick Riordan', 4, 'Thời Đại - Chibooks', '/images/img_sp/kim-tu-thap-do.jpeg', 'Kể từ khi mẹ mất, Carter và Sadie đã trở thành hai người xa lạ. Sadie sống cùng với ông bà ở London trong khi anh trai chu du khắp thế giới với bố cô, Dr. Julius Kane, nhà nghiên cứu xuất sắc về Ai Cập.\r\nMột đêm nọ, Dr. Kane đã đưa hai anh em cô cùng tới Bảo Tàng Anh Quốc để thực hiện một "thí nghiệm nghiên cứu", với hi vọng giải quyết xong mọi vấn đề trong gia đình. Nhưng, thay vào đó, ông đã thả Set ra, và vị thần Ai Cập này đã đày ông vào lãng quên, buộc các con ông phải chạy trốn để bảo toàn mạng sống.\r\nNgay sau đó, Sadie và Carter đã phát hiện ra các vị thần Ai Cập đang thức dậy, và kẻ tồi tệ nhất trong số họ - Set - đã để mắt đến nhà Kane. Để chặn đứng ông ta, hai anh em đã bước vào một hành trình nguy hiểm khắp địa cầu - một cuộc tìm kiếm đưa họ đến gần hơn bao giờ hết với sự thật về gia đình họ, và những mối liên hệ của họ với một trật tự bí mật đã tồn tại từ thời đại của các pharaoh.', 141000, '2015-03-18', 1);
INSERT INTO `sach` (`masach`, `tensach`, `tentacgia`, `matheloai`, `nhaxuatban`, `hinhanh`, `noidung`, `gia`, `ngaycapnhat`, `trangthai`) VALUES
(56, 'Đề Thi Đẫm Máu', 'Lôi Mễ', 4, NULL, '/images/img_sp/de-thi-dam-mau.jpeg', 'Một tên sát thủ có sở thích uống chất hỗn hợp máu nạn nhân với sữa tươi , hắn có căn bệnh gì đặc biệt hay là con quỷ hút máu bất tử nghìn năm trong truyền thuyết ?\r\n Trong thành phố C liên tiếp xảy ra 4 vụ cưỡng hiếp giết người, nạn nhân đều là những cô gái trí thức từ 25-35 tuổi, đây rốt cuộc là giết người trả thù hay chỉ đơn giản là cưỡng dâm?\r\n \r\nHàng loạt cái chết bí ẩn thảm khốc của những người sống trong Đại học J liên tiếp xảy ra. ở mỗi hiện trường vụ án, hung thủ đều để lại gợi ý cho vụ án tiếp theo, nhằm mục đích gì ?\r\n \r\nTrong hàng loạt các vụ án ly kỳ khiến cảnh sát bàng hoàng bó tay, câu sinh viên Phương Mộc trầm mặc kiệm lời đột nhiên bị cảnh sát lôi vào cuộc . Tên ác quỷ giấu mặt lần lượt giết hại những người bạn của cậu, vì sao ? Khi câu trả lời được vén màn bí mật, thì đề thi tàn khốc đã bị tích 5 dấu X đẫm máu. Một cuộc đấu trí so tài khốc liệt đầy kịch tính nổ ra ... Ai sẽ là người  thắng cuộc?', 119000, '2015-03-19', 1),
(57, 'Chuỗi Hạt Aroth', 'Phan Hồn Nhiên', 4, 'Kim Đồng', '/images/img_sp/chuoi-hat-aroth.jpeg', 'Bằng hành trình đi tìm chuỗi hạt quyền lực - Azoth, cuộc tranh giành quyết liệt để chiếm đoạt sức mạnh tối thượng của nó, đã cuốn hầu hết nhân vật vào một thế giới tăm tối, khiến họ ngày một phải đối diện với nỗi sợ hãi, thói tham lam cuồng bạo, cũng như bộc lộ toàn bộ phẩm chất hoặc tham vọng chính mình. Để rồi, khi tàn cuộc, họ biết đằng sau chuỗi hạt ấy, là ẩn ý về cuộc sống, tình bạn và tình yêu quý giá thế nào, thứ mà không ít người trong số họ đã hoàn toàn đánh mất cơ hội chạm tới.', 63000, '2015-03-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE IF NOT EXISTS `theloai` (
  `matheloai` int(11) NOT NULL AUTO_INCREMENT,
  `tentheloai` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` int(1) DEFAULT '1',
  PRIMARY KEY (`matheloai`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`matheloai`, `tentheloai`, `trangthai`) VALUES
(1, 'Truyện tranh', 1),
(2, 'Light Novel', 1),
(3, 'Tạp chí', 1),
(4, 'Tiểu thuyết', 1),
(5, 'Văn học Việt Nam', 1),
(6, 'Văn học nước ngoài', 1);

-- --------------------------------------------------------

--
-- Table structure for table `theloai_sach`
--

CREATE TABLE IF NOT EXISTS `theloai_sach` (
  `matheloai` int(11) NOT NULL,
  `masach` int(11) NOT NULL,
  PRIMARY KEY (`matheloai`,`masach`),
  KEY `FK_theloai_sach` (`matheloai`),
  KEY `FK_theloai_sach_sach` (`masach`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `FK_chitietdonhang_donhang` FOREIGN KEY (`ma_donhang`) REFERENCES `donhang` (`ma_donhang`),
  ADD CONSTRAINT `FK_chitietdonhang_sach11` FOREIGN KEY (`masach`) REFERENCES `sach` (`masach`);

--
-- Constraints for table `theloai_sach`
--
ALTER TABLE `theloai_sach`
  ADD CONSTRAINT `FK_theloai_sach_sach1` FOREIGN KEY (`masach`) REFERENCES `sach` (`masach`),
  ADD CONSTRAINT `FK_theloai_sach_theloai` FOREIGN KEY (`matheloai`) REFERENCES `theloai` (`matheloai`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
