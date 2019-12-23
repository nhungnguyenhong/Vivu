-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2014 at 08:01 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vivudb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `tID` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `usrID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tCreateAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`tID`, `content`, `usrID`, `tCreateAt`) VALUES
(1, 'Mon nay ngon', 'Hello', '0000-00-00 00:00:00'),
(2, '', 'minhpd', '0000-00-00 00:00:00'),
(2, 'Món này ngon lắm, mình ăn hai lần rồi', 'minhpd', '0000-00-00 00:00:00'),
(3, '{"tID":3,"usrID":"minhpd"} ', 'minhpd', '0000-00-00 00:00:00'),
(3, '', 'minhpd', '0000-00-00 00:00:00'),
(3, ' {"tID":3,"usrID":"minhpd"}', 'minhpd', '0000-00-00 00:00:00'),
(3, ' Món này ngon chết đi được ý', 'phantom', '0000-00-00 00:00:00'),
(3, 'Ăn rồi lại muốn ăn nữa', 'phantom', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `istagged`
--

CREATE TABLE IF NOT EXISTS `istagged` (
`id` int(10) unsigned NOT NULL,
  `tID` int(10) unsigned NOT NULL,
  `qID` int(10) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `istagged`
--

INSERT INTO `istagged` (`id`, `tID`, `qID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 3, 3),
(4, 2, 1),
(5, 4, 6),
(6, 5, 6),
(7, 8, 4),
(8, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_10_051455_topics', 1),
('2014_10_10_121342_topics', 2),
('2014_10_10_124108_topics', 3),
('2014_10_10_133359_picDes', 3),
('2014_12_07_113653_create_query_table', 3),
('2014_12_08_062156_comment_table', 3),
('2014_12_14_065042_create_is_tagged', 4);

-- --------------------------------------------------------

--
-- Table structure for table `picdes`
--

CREATE TABLE IF NOT EXISTS `picdes` (
  `tID` int(10) unsigned NOT NULL,
  `imgPath` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `picdes`
--

INSERT INTO `picdes` (`tID`, `imgPath`) VALUES
(1, 'banhcuon.jpg'),
(2, 'buncha.jpg'),
(3, 'bunoc.jpg'),
(4, 'chaca.jpg'),
(5, 'chimquay.jpg'),
(6, 'gxpp.jpg'),
(7, 'pho.jpg'),
(8, 'xoiyen.jpg'),
(9, 'hoguom.jpg'),
(9, 'phoco.jpg'),
(10, 'tahien.jpg'),
(11, 'bar.jpg'),
(11, 'bar-2.jpg'),
(12, 'vuichoi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE IF NOT EXISTS `query` (
`id` int(10) unsigned NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `value`, `data`) VALUES
(1, 'gai xinh o dau', '#gaixinh'),
(2, 'bun oc ngon o dau', '#bun'),
(3, 'bun cha hang manh', '#bun'),
(4, 'mon an truyen thong', '#truyenthong'),
(5, 'chim quay pho co', '#chimquay'),
(6, 'thuc don gia hat re', '#re'),
(7, 'thuc don bo duong', '#bo'),
(8, 'an toi cung Quan Kun', '#antoi');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
`id` int(10) unsigned NOT NULL,
  `tName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tLat` double NOT NULL,
  `tLong` double NOT NULL,
  `tType` int(11) NOT NULL,
  `tDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `tVote_1` int(11) NOT NULL,
  `tVote_2` int(11) NOT NULL,
  `tVote_3` int(11) NOT NULL,
  `tPrice` double NOT NULL,
  `tCreateAt` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `tName`, `tLat`, `tLong`, `tType`, `tDescription`, `tVote_1`, `tVote_2`, `tVote_3`, `tPrice`, `tCreateAt`, `created_at`, `updated_at`) VALUES
(1, 'Chả cá Lã Vọng – 14 Lã Vọng', 21.035764, 105.849072, 1, '<p>Tương truyền vào những năm thời kỳ Pháp thuộc, ở số 14 Hàng Sơn (Lã Vọng ngày nay) có một gia đình họ Đoàn sinh sống, họ thường lấy nhà mình làm nơi cưu mang nghĩa quân Đề Thám. Chủ nhà hay làm món chả cá rất ngon đãi khách, lâu dần thành quen, những vị khách ấy đã giúp gia đình mở một quán chuyên bán món ăn này, vừa để nuôi sống gia đình, vừa làm nơi tụ họp. Nổi tiếng đến mức hai tiếng "Chả Cá" được gọi thành tên phố.</p>\r\n<p>Cá làm chả thường là cá lăng tươi, ít xương, ngọt thịt và thơm. Cá được lọc hai bên sườn, thái bản, ướp với nước riềng, nghệ, mẻ, hạt tiêu và nước mắm rồi kẹp vào vỉ nướng. Chả cá được bắc trên bếp, mùi thơm sực nức khắp phòng. Bỏ ít hành và rau thì là vào chảo. Khi rau chín, gắp chả cá cùng rau ra bát, kèm thêm chút bún rối, chút mỡ, chút mắm tôm và đậu phộng rang. Chả cá vừa đẹp mắt lại vừa ngon miệng. Đây cũng là quán ăn ngon nổi tiếng nhất nhì Hà Nội.</p>\r\n<p>Cá làm chả thường là cá lăng tươi, ít xương, ngọt thịt và thơm. Cá được lọc hai bên sườn, thái bản, ướp với nước riềng, nghệ, mẻ, hạt tiêu và nước mắm rồi kẹp vào vỉ nướng. Chả cá được bắc trên bếp, mùi thơm sực nức khắp phòng. Bỏ ít hành và rau thì là vào chảo. Khi rau chín, gắp chả cá cùng rau ra bát, kèm thêm chút bún rối, chút mỡ, chút mắm tôm và đậu phộng rang. Chả cá vừa đẹp mắt lại vừa ngon miệng. Đây cũng là quán ăn ngon nổi tiếng nhất nhì Hà Nội.</p>', 5, 4, 8, 30, '2014-12-09 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Phở xếp hàng 45 Bát Đàn', 21.0337382, 105.8469951, 1, '<p>Để đi ăn phở Bát Đàn nên đi hai người, bởi bạn phải tự xếp hàng lấy phở, tự bưng bê và tự tìm chỗ ngồi. Quán phở lúc nào cũng đông người, ngồi chật chỗ và xếp hàng chờ đến lượt mình vào mua.</p>\r\n<p>Thật khó hiểu vì sao với cung cách bán hàng như thời bao cấp mà lại có đông người sẵn sàng chờ đến lượt để được ăn một bát phở sáng như thế. Vậy thì hãy cứ xếp hàng, chờ đến lượt để bưng một bát phở ngon có thâm niên hơn nửa thế kỷ. Tô phở Bát Đàn đặc trưng cho phở bò Hà Nội nguyên gốc, thơm phức, béo ngậy, nước dùng trong, miếng thịt bò tươi hồng, mềm mịn và đầy đặn.</p>\r\n<p>Để đi ăn phở Bát Đàn nên đi hai người, bởi bạn phải tự xếp hàng lấy phở, tự bưng bê và tự tìm chỗ ngồi. Quán phở lúc nào cũng đông người, ngồi chật chỗ và xếp hàng chờ đến lượt mình vào mua.</p>', 4, 6, 3, 40, '2014-12-10 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Bún đậu mắm tôm ngõ Phất Lộc', 21.0330532, 105.8523609, 1, '<p>Chỉ là một gánh bún và một gánh đậu rán, một vỉa hè nhỏ cùng dăm ba cái ghế, vậy là thành quán bún đậu. Bún phải là loại bún bánh, cắt nhỏ vừa ăn. Đậu phải là đậu mơ, rán giòn trong chảo mỡ, ráo mỡ mới cắt ra vừa miếng. Mắm tôm pha chút đường, vắt chanh, thêm lát ớt rồi đánh đều, ăn kèm với rau sống. Đơn giản là thế nhưng lại được lòng người ăn. </p>\r\n<p>Nhắc đến bún đậu mắm tôm phố cổ, người ta nhớ ngay đến quán hàng trong ngõ Phất Lộc, Hàng Bạc. Gánh bún nằm trong con ngõ này đã trải qua 20 năm nghề, từ một gánh hàng đơn sơ thành quán ăn có tên tuổi, thương hiệu. Vẫn bún, vẫn đậu rán, nay có thêm nem rán, thịt luộc, chả cốm hoặc dồi rán ăn kèm, phục vụ thêm nhu cầu của thực khách. </p>\r\n<p>Chỉ là một gánh bún và một gánh đậu rán, một vỉa hè nhỏ cùng dăm ba cái ghế, vậy là thành quán bún đậu. Bún phải là loại bún bánh, cắt nhỏ vừa ăn. Đậu phải là đậu mơ, rán giòn trong chảo mỡ, ráo mỡ mới cắt ra vừa miếng. Mắm tôm pha chút đường, vắt chanh, thêm lát ớt rồi đánh đều, ăn kèm với rau sống. Đơn giản là thế nhưng lại được lòng người ăn. </p>', 7, 6, 8, 30, '2014-12-10 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Bún ốc nguội Ô Quan Chưởng', 21.0373329, 105.8521172, 1, '<p>Khác hẳn với các món bún có thể tìm thấy dễ dàng ở Hà Nội, bún ốc nguội là đặc sản khó tìm và đặc biệt nhất ở Hà Nội. Gọi bún ốc nguội bởi món gì ăn cùng cũng đều nguội: bún nguội, ốc nguội, nước chấm cũng nguội.</p>\r\n<p>Quán bún ốc Ô Quan Chưởng nhỏ xíu nằm trên vỉa hè từ vài chục năm nay, nếu không phải là những người sành sẽ khó tìm thấy. Một đĩa bún với vài tép bún mỏng dính, bé tẹo cùng bát nước ốc trong thả vài con ốc, thế mà đắt, thế mà chẳng có chỗ mà ngồi. Bún ốc nguội được đánh giá độc đáo nhất trong các món chế biến từ ốc của người Hà Nội xưa với vị thanh dịu của dấm bỗng, cay của ớt, ngọt mát của nước dùng. </p>\r\n<p>Khác hẳn với các món bún có thể tìm thấy dễ dàng ở Hà Nội, bún ốc nguội là đặc sản khó tìm và đặc biệt nhất ở Hà Nội. Gọi bún ốc nguội bởi món gì ăn cùng cũng đều nguội: bún nguội, ốc nguội, nước chấm cũng nguội.</p>', 6, 5, 8, 40, '2014-12-19 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Bún chả số 1 Hàng Mành', 21.006542, 105.8456194, 1, '<p>Cũng vẫn là bún rối, là thịt nướng, là rau sống, là nước mắm chấm và nem rán, nhưng quán bún chả Đắc Kim, số 1 Hàng Mành đã trở thành cái tên được nhắc tới đầu tiên khi nói về món bún quen thuộc với người Hà Nội.</p>\r\n<p>Bún chả Hàng Mành có gánh bán từ những năm 70 thế kỷ trước. Trải qua hơn 40 năm thăng trầm cùng Hà Nội, quán bún chả từ một gánh hàng rong vỉa hè nay đã thành cửa hàng khang trang vài tầng. Người đến ăn bún chả đa phần vì thích vị nước chấm của quán, nước mắm được pha với loại mắm cốt ngon, đậm vừa miệng, đĩa bún đầy đặn, chả ngon, nhiều và rổ rau sống luôn có kèm món rau muống chẻ mà ít nơi có. </p>', 7, 7, 9, 40, '2014-12-04 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Chim quay 13 Tạ Hiện', 21.010967, 105.849256, 1, '<p>Bất cứ ai mê mẩn món chim bồ câu quay béo ngậy đều biết đến địa chỉ nổi tiếng của cửa hàng Thịnh Vượng tại phố Tạ Hiện này. Nằm sâu trong phố Tây, quán chim quay có tuổi đời hơn chục năm này phải đặt chỗ mới có chỗ ngồi vì quán hàng bán trong nhà và khá chật nhưng món ăn được xem là một trong những hàng chim quay ngon nhất Hà Nội.</p>\r\n<p>Quán nổi tiếng với hai món chim câu quay và bittet. Chim bồ câu được nhà hàng chọn lựa cẩn thận, đĩa chim quay khi được mang ra còn nóng hổi và thơm nức mũi. Lớp da bên ngoài được quay giòn, màu cháy cạnh đẹp mắt mà phần thịt bên trong thì vẫn mềm, từng miếng ngọt thơm, thấm đều các loại gia vị tẩm ướp. Vừa ăn, vừa gặm và chấm với muối ớt chanh, ngon tuyệt.</p>\r\n<p>Quán nổi tiếng với hai món chim câu quay và bittet. Chim bồ câu được nhà hàng chọn lựa cẩn thận, đĩa chim quay khi được mang ra còn nóng hổi và thơm nức mũi. Lớp da bên ngoài được quay giòn, màu cháy cạnh đẹp mắt mà phần thịt bên trong thì vẫn mềm, từng miếng ngọt thơm, thấm đều các loại gia vị tẩm ướp. Vừa ăn, vừa gặm và chấm với muối ớt chanh, ngon tuyệt.</p>', 6, 7, 9, 70, '2014-12-10 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Ốc luộc phố Đinh Liệt', 21.033072, 105.8519077, 1, '<p>Chỉ có duy nhất món ốc luộc to hoặc nhỏ, không kèm món khác, không hoa quả ăn kèm, chỗ ngồi vỉa hè bé tí xíu, bán từ 15h đến 19h hàng ngày nhưng ốc luộc Hà Trang trên phố Đinh Liệt là địa chỉ được tín đồ mê ốc bỏ qua tất cả những khó chịu để đến ăn hàng.</p>\r\n<p>Người ăn mê mẩn món ốc hấp lá chanh của quán bởi những con ốc nhồi hay ốc vặn đều được ngâm cực sạch, ốc không bị cát đất, béo ngậy, không có ốc chết, bát nước dùng luôn thơm ngậy. Một phần đặc biệt khác chính là nước chấm ốc của quán với gừng, ớt, sả, mắm, lá chanh nhưng ngon tuyệt khiến người đến khều ốc không khỏi xuýt xoa. Nhiều người đến ăn hàng vì mê món nước chấm đậm đà của quán, ăn rồi còn xin thêm bát nữa.\r\n</p>', 8, 7, 7, 50, '2014-12-09 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Nem tai Bà Hồng', 21.0321925, 105.8528319, 1, '<p>Là một món ăn chơi dân dã, nem tai được rất nhiều người ưa thích. Nem tai đơn giản chỉ là tai lợn làm sạch, hấp lên rồi thái mỏng, trộn với thính, ăn chung với bánh tráng, lá sung, sung muối, rau sống, chấm với nước mắm ngọt. Vị giòn giòn của tai lợn hòa trộn với vị thơm bùi đậm đà của thính, vị tươi mát của các loại rau và vị ngòn ngọt của nước chấm tạo nên một cảm giác cực kỳ thú vị cho người thưởng thức. Đến Hà Nội, bạn nhớ ghé quán nem tai Bà Hồng để thưởng thức món ăn này nhé. Giá bán 250.000VND/1kg nem tai, 80.000VND/1 suất 2 người ăn, thời gian mở cửa: 6h00 – 23h00. Địa chỉ: 35 Hàng Thùng, Hoàn Kiếm, Hà Nội.</p>\r\n<p>Là một món ăn chơi dân dã, nem tai được rất nhiều người ưa thích. Nem tai đơn giản chỉ là tai lợn làm sạch, hấp lên rồi thái mỏng, trộn với thính, ăn chung với bánh tráng, lá sung, sung muối, rau sống, chấm với nước mắm ngọt. Vị giòn giòn của tai lợn hòa trộn với vị thơm bùi đậm đà của thính, vị tươi mát của các loại rau và vị ngòn ngọt của nước chấm tạo nên một cảm giác cực kỳ thú vị cho người thưởng thức. Đến Hà Nội, bạn nhớ ghé quán nem tai Bà Hồng để thưởng thức món ăn này nhé. Giá bán 250.000VND/1kg nem tai, 80.000VND/1 suất 2 người ăn, thời gian mở cửa: 6h00 – 23h00. Địa chỉ: 35 Hàng Thùng, Hoàn Kiếm, Hà Nội.</p>', 7, 8, 9, 100, '2014-12-10 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'EON 52 Heli Bar - Bitexco Tower', 21.0168291, 105.8513904, 2, '<p>Tọa lạc tại tầng 52 của tòa nhà tài chính Bitexco\r\nBạn có thể ngắm nhìn toàn thành phố và thưởng thức một ly cocktail\r\nKhông gian thiết kế sang trọng và có phục vụ ẩm thực Âu Á</p>\r\n<p>Tọa lạc tại tầng 52 của tòa nhà tài chính Bitexco\r\nBạn có thể ngắm nhìn toàn thành phố và thưởng thức một ly cocktail\r\nKhông gian thiết kế sang trọng và có phục vụ ẩm thực Âu Á</p>\r\n<p>Tọa lạc tại tầng 52 của tòa nhà tài chính Bitexco\r\nBạn có thể ngắm nhìn toàn thành phố và thưởng thức một ly cocktail\r\nKhông gian thiết kế sang trọng và có phục vụ ẩm thực Âu Á</p>', 6, 7, 4, 300, '2014-12-10 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'KOH Thai - Kumho Asiana Plaza', 21.0172265, 105.8450371, 2, '<p>Nơi hội tụ nhiều DJ nổi tiếng trong nước và quốc tế cùng phối nhạc\r\nTổ chức những đêm tiệc "Ladies Night" hàng tuần cho nữ giới\r\nĐiểm lý tưởng để ăn mừng và tổ chức sự kiện ra mắt của giới nghệ sỹ</p>\r\n<p>Nơi hội tụ nhiều DJ nổi tiếng trong nước và quốc tế cùng phối nhạc\r\nTổ chức những đêm tiệc "Ladies Night" hàng tuần cho nữ giới\r\nĐiểm lý tưởng để ăn mừng và tổ chức sự kiện ra mắt của giới nghệ sỹ</p>', 7, 7, 8, 1000, '2014-12-11 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Vuvuzela Beer Club - Nguyễn Bỉnh Khiêm', 21.0159558, 105.8486237, 2, '<p>Nhiều loại bia: Tiger, Bitburger, bia tươi Tiệp, nhiều loại bia nhập khẩu từ Bỉ, Hà Lan, Czech...\r\nNhiều món đặc trưng của các nước trên thế giới: Gà quay Vuvuzela, sườn non bò Mỹ nướng...\r\nThiết kế ấn tượng, quầy bar trung tâm rộng, rất tuyệt để tổ chức party</p>', 6, 6, 8, 300, '2014-12-18 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Acoustic - Cafe Rock', 21.0112949, 105.8537007, 2, '<p>Quán có phong cách thiết kế khá độc đáo và ấn tượng, đậm chất ROCK\r\nHằng đêm có nhạc sống do chính các thành viên sáng lập quán biểu diễn\r\nThức uống đậm đà, sáng tạo, nhiều phong cách</p>', 6, 5, 8, 40, '2014-12-24 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD KEY `comment_tid_foreign` (`tID`);

--
-- Indexes for table `istagged`
--
ALTER TABLE `istagged`
 ADD PRIMARY KEY (`id`), ADD KEY `istagged_tid_foreign` (`tID`), ADD KEY `istagged_qid_foreign` (`qID`);

--
-- Indexes for table `picdes`
--
ALTER TABLE `picdes`
 ADD KEY `picdes_tid_foreign` (`tID`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `topics_tname_unique` (`tName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `istagged`
--
ALTER TABLE `istagged`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
ADD CONSTRAINT `comment_tid_foreign` FOREIGN KEY (`tID`) REFERENCES `topics` (`id`);

--
-- Constraints for table `istagged`
--
ALTER TABLE `istagged`
ADD CONSTRAINT `istagged_qid_foreign` FOREIGN KEY (`qID`) REFERENCES `query` (`id`),
ADD CONSTRAINT `istagged_tid_foreign` FOREIGN KEY (`tID`) REFERENCES `topics` (`id`);

--
-- Constraints for table `picdes`
--
ALTER TABLE `picdes`
ADD CONSTRAINT `picdes_tid_foreign` FOREIGN KEY (`tID`) REFERENCES `topics` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
