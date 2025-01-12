-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 12, 2025 lúc 11:14 AM
-- Phiên bản máy phục vụ: 8.3.0
-- Phiên bản PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `iddh` int NOT NULL,
  `idpro` int NOT NULL,
  `soluong` int NOT NULL DEFAULT '0',
  `dongia` double(10,2) NOT NULL DEFAULT '0.00',
  `tensp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_ibfk_1` (`idpro`),
  KEY `cart_ibfk_2` (`iddh`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `iddh`, `idpro`, `soluong`, `dongia`, `tensp`, `img`) VALUES
(46, 53, 8, 5, 1000000.00, 'Áo khoác có mũ Bellfield', 'upload/2aokhoac_1733507638.webp'),
(47, 53, 6, 1, 1000000.00, 'Áo thun dài tay Fred Perry', 'upload/10aoke_1733507725.webp'),
(48, 53, 1, 5, 1500000.00, 'Áo sơmi carô Tommy Hilfiger', 'upload/8somicaro_1733507815.webp'),
(49, 54, 2, 1, 1500000.00, 'Áo sơmi tím Tommy Hilfiger', 'upload/24somitim_1733507803.webp'),
(50, 54, 7, 1, 2500000.00, 'Áo khoác dạ Selected Homme', 'upload/11aoda_1733507670.webp'),
(51, 54, 14, 8, 200000.00, 'Mũ lưỡi trai New Era', 'upload/6muluoitrai_1733507500.webp'),
(100, 74, 22, 1, 1900000.00, 'Giày da mờ buộc dây Aldo', 'upload/21giaydesert_1733507385.webp'),
(101, 74, 23, 1, 1200000.00, 'Giày thể thao da lộn Ellesse', 'upload/22giaytrainer_1733507336.webp'),
(102, 76, 23, 1, 1200000.00, 'Giày thể thao da lộn Ellesse', 'upload/22giaytrainer_1733507336.webp'),
(103, 76, 22, 1, 1900000.00, 'Giày da mờ buộc dây Aldo', 'upload/21giaydesert_1733507385.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog`
--

DROP TABLE IF EXISTS `catalog`;
CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int NOT NULL DEFAULT '0',
  `display` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `catalog`
--

INSERT INTO `catalog` (`id`, `cat_name`, `priority`, `display`) VALUES
(1, 'Sản phẩm khuyến mãi', 0, 1),
(2, 'Sản phẩm nổi bật', 0, 1),
(5, 'Sản phẩm mới', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `madh` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tongdonhang` double(10,2) DEFAULT '0.00',
  `pttt` tinyint(1) NOT NULL DEFAULT '1',
  `ttdh` tinyint(1) NOT NULL DEFAULT '0',
  `iduser` int NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `iduser` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `madh`, `tongdonhang`, `pttt`, `ttdh`, `iduser`, `name`, `address`, `email`, `tel`) VALUES
(53, 'GENTLEMAN37640', 13500000.00, 2, 2, 5, 'đồng minh hiếu', '375 Nguyễn Thượng Hiền, Phường 11, Quận 10', 'channelbaby15@gmail.com', '0777777'),
(54, 'GENTLEMAN47414', 5600000.00, 3, 0, 4, 'minh huyền', 'lam sơn thanh hóa', 'stunanguyen@gmail.com', '0943425556'),
(73, 'GENTLEMAN53200', 2600000.00, 1, 0, 4, 'minh huyền', 'cần thơ sài gòn', 'channelbaby15@gmail.com', '03737373'),
(74, 'GENTLEMAN92288', 3100000.00, 2, 0, 4, 'minh huyền', 'lam sơn thanh hóa', 'thuhuonglee8@gmail.com', '08888888'),
(75, 'GENTLEMAN59511', 3100000.00, 2, 0, 4, 'minh huyền', 'lam sơn thanh hóa', 'thuhuonglee8@gmail.com', '08888888'),
(76, 'GENTLEMAN29519', 3100000.00, 2, 0, 4, 'minh huyền', 'thanh hóa sầm sơn', 'thuhuonglee8@gmail.com', '0943425556');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,0) NOT NULL DEFAULT '0',
  `id_catalog` int NOT NULL,
  `sale` double(10,0) NOT NULL DEFAULT '0',
  `agency` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_catalog_product` (`id_catalog`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `img`, `price`, `id_catalog`, `sale`, `agency`, `describe`, `description`) VALUES
(1, 'Áo sơmi carô Tommy Hilfiger', 'upload/8somicaro_1733507815.webp', 1500000, 1, 2000000, 'Hãng: Tommy Hilfiger', 'Áo sơmi là trang phục lịch sự, trang nhã, luôn đem lại phong cách thanh lịch cho nam giới. Tuy được sử dụng rộng rãi nhưng việc lựa chọn áo sơmi sao cho phù hợp với mỗi người thì không...', '<p>Áo sơmi là trang phục lịch sự, trang nhã, luôn đem lại phong cách thanh lịch cho nam giới. Tuy được sử dụng rộng rãi nhưng việc lựa chọn áo sơmi sao cho phù hợp với mỗi người thì không phải là chuyện nhỏ.</p>\r\n<p>Những chiếc áo có màu truyền thống như trắng, đen hay xám rất dễ sử dụng trong nhiều hoàn cảnh khác nhau và dễ dàng kết hợp với các trang phục khác.</p>\r\n<p>Nếu bạn có nhiều sơmi để thay đổi thì có thể mở rộng biên độ về màu sắc. Màu hồng nhạt được nam giới chọn khá nhiều. Tưởng chừng như màu đó chỉ dành cho phái nữ, thực ra sơmi nam màu hồng khi được phái nam diện sẽ tạo được ấn tượng và quan trọng là không hề mất đi vẻ nam tính.</p>\r\n<p>Những chiếc áo kẻ sọc là lựa chọn rất tốt cho vẻ nam tính, mạnh mẽ. Chỉ cần nhớ một nguyên tắc: Những người gầy không nên mặc màu tối hay kẻ sọc to, người mập không nên chọn màu quá lòe loẹt, hoặc kẻ ngang, kẻ carô to.</p>\r\n<p>Thương hiệu Tommy Hilfiger do nhà thiết kế cùng tên sáng lập năm 1985 với các dòng sản phẩm như: quần áo, trang phục thể thao, đồ Jeans, giày, túi xách, nước hoa, đồng hồ và mắt kính phục vụ cho giới trẻ nam nữ.</p>\r\n<p>Các thiết kế của hãng rất đa dạng, từ những mẫu thiết kế cơ bản, cổ điển, đến thanh lịch và năng động.</p>\r\n<p>Với ba màu sắc truyền thống là đỏ, trắng, và xanh dương đậm, Tommy Hilfiger đã trở thành một biểu tượng thương hiệu thời trang của Mỹ.</p>'),
(2, 'Áo sơmi tím Tommy Hilfiger', 'upload/24somitim_1733507803.webp', 1500000, 1, 1700000, 'Hãng: Tommy Hilfiger', 'Áo sơmi là trang phục lịch sự, trang nhã, luôn đem lại phong cách thanh lịch cho nam giới. Tuy được sử dụng rộng rãi nhưng việc lựa chọn áo sơmi sao cho phù hợp với mỗi người thì không...', '<p>Áo sơmi là trang phục lịch sự, trang nhã, luôn đem lại phong cách thanh lịch cho nam giới. Tuy được sử dụng rộng rãi nhưng việc lựa chọn áo sơmi sao cho phù hợp với mỗi người thì không phải là chuyện nhỏ.</p>\r\n<p>Những chiếc áo có màu truyền thống như trắng, đen hay xám rất dễ sử dụng trong nhiều hoàn cảnh khác nhau và dễ dàng kết hợp với các trang phục khác.</p>\r\n<p>Nếu bạn có nhiều sơmi để thay đổi thì có thể mở rộng biên độ về màu sắc. Màu hồng nhạt được nam giới chọn khá nhiều. Tưởng chừng như màu đó chỉ dành cho phái nữ, thực ra sơmi nam màu hồng khi được phái nam diện sẽ tạo được ấn tượng và quan trọng là không hề mất đi vẻ nam tính.</p>\r\n<p>Những chiếc áo kẻ sọc là lựa chọn rất tốt cho vẻ nam tính, mạnh mẽ. Chỉ cần nhớ một nguyên tắc: Những người gầy không nên mặc màu tối hay kẻ sọc to, người mập không nên chọn màu quá lòe loẹt, hoặc kẻ ngang, kẻ carô to.</p>\r\n<p>Thương hiệu Tommy Hilfiger do nhà thiết kế cùng tên sáng lập năm 1985 với các dòng sản phẩm như: quần áo, trang phục thể thao, đồ Jeans, giày, túi xách, nước hoa, đồng hồ và mắt kính phục vụ cho giới trẻ nam nữ.</p>\r\n<p>Các thiết kế của hãng rất đa dạng, từ những mẫu thiết kế cơ bản, cổ điển, đến thanh lịch và năng động.</p>\r\n<p>Với ba màu sắc truyền thống là đỏ, trắng, và xanh dương đậm, Tommy Hilfiger đã trở thành một biểu tượng thương hiệu thời trang của Mỹ.</p>'),
(3, 'Áo nỉ có mũ Asos', 'upload/4aoni_1733507781.webp', 360000, 1, 500000, 'Hãng: Asos', 'Trong mùa thu/đông, chúng ta đều không thể phủ nhận sức hút mãnh liệt của chất liệu len khi mà những chiếc áo len họa tiết với đủ màu sắc vui mắt xuất hiện trên khắp các đường phố, nhưng...', '<p>Trong mùa thu/đông, chúng ta đều không thể phủ nhận sức hút mãnh liệt của chất liệu len khi mà những chiếc áo len họa tiết với đủ màu sắc vui mắt xuất hiện trên khắp các đường phố, nhưng điều đó không có nghĩa là bạn lại bỏ xó những chiếc áo hoodie quen thuộc của mình. Mặc dù không phải là một xu hướng, áo hoodie cũng giống như những chiếc quần jeans, item này là hình ảnh đại diện cho vẻ năng động, tươi trẻ và luôn trường tồn cùng phong cách hiện đại. Hơn thế nữa, một chiếc áo hoodie ấm áp luôn sẵn sàng để có thể biến bất cứ trang phục nào trong tủ của bạn trở nên trẻ trung hơn gấp bội. Với đặc thù là một item mang nặng tính casual, bạn sẽ không phải mất nhiều thời gian để chuẩn bị cho mình một bộ trang phục hoàn chỉnh với hoodie.</p>\r\n<p>Asos là thương hiệu thời trang bình dân nổi tiếng của Anh được thành lập năm 2000 bởi Nick Robertson dưới hình thức ban đầu là trang web bán hàng thời trang trực tuyến Asos.com dành cho độ tuổi từ 18-34 tuổi. Tuy nhiên, khi càng phát triển, Asos đã thay đổi đối tượng khách hàng khi nhắm đến đa dạng các đối tượng từ phụ nữ, đàn ông, trẻ em cho tới thanh thiếu niên và cung cấp các mặt hàng chủ yếu như giầy dép, phụ kiện, trang sức, quần áo và mỹ phẩm. Phong cách thời trang của Asos chủ yếu được lấy cảm hứng từ những người nổi tiếng để tạo ra những bộ sản phẩm mang tính xu hướng, thời thượng với giá tiêu dùng bình dân nhất.</p>'),
(4, 'Áo nỉ chui đầu Emporio Armani', 'upload/9aodaitay_1733507765.webp', 1500000, 1, 1790000, 'Hãng: Emporio Armani', 'Sweatshirt là kiểu áo nỉ chui đầu nhưng không có mũ. Đây cũng được coi là một \"biến dạng\" độc đáo của áo hoodie đã từng \"làm mưa làm gió\" và được các tín đồ thời trang ưa chuộng. Điểm...', '<p>Sweatshirt là kiểu áo nỉ chui đầu nhưng không có mũ. Đây cũng được coi là một \"biến dạng\" độc đáo của áo hoodie đã từng \"làm mưa làm gió\" và được các tín đồ thời trang ưa chuộng. Điểm đặc biệt của chiếc áo này là có thể kết hợp với nhiều kiểu trang phục khác nhau như quần short, chân váy, áo sơ mi.... tạo nên một phong cách trẻ trung, năng động và tinh nghich cho người mặc.</p>\r\n<p>Mùa thu đông năm nay, thay vì sự xuất hiện của những chiếc áo hoodie (áo nỉ có mũ) như năm ngoái, áo sweatshirt xuất hiện ở mọi nơi, từ sàn catwalk với những thiết kế của các hãng thời trang danh tiếng cho đến những bộ trang phục trên đường phố của các fashionista.</p>\r\n<p>Thương hiệu Emporio Armani được thành lập bởi nhà thiết kế Giorgio Armani, hướng đến các sản phẩm thuộc dòng ready-to-war và phụ kiện. Đặc biệt, các sản phẩm thuộc dòng thương hiệu này đều được làm từ những chất liệu cao cấp. Emporio Armani hướng đến phong cách sportily urban – cá tính thể thao thành thị – với nhưng thiết kế trẻ trung, năng động và mạnh mẽ. Chú trọng sự tối giản và tính ứng dụng cao, các sản phẩm gắn mác Emporio Armani mang đến thiện cảm cho người dùng bởi màu sắc trung tính, kiểu dáng đa dạng và rất dễ mặc.</p>'),
(5, 'Áo len cổ lọ Asos', 'upload/3aolen_1733507743.webp', 680000, 1, 800000, 'Hãng: Asos', 'Món đồ không thể thiếu trong tủ đồ của nam giới khi mùa đông đến là những chiếc áo len. Những chiếc áo len tuy đơn giản nhưng luôn đem đến sự năng động và hiện đại cho nam giới....', '<p>Món đồ không thể thiếu trong tủ đồ của nam giới khi mùa đông đến là những chiếc áo len. Những chiếc áo len tuy đơn giản nhưng luôn đem đến sự năng động và hiện đại cho nam giới. Áo cổ lọ (hay còn gọi là cổ cao) mặc khi tiết trời lạnh, giữ ấm cổ. Dáng áo len này phái mạnh có thể mặc trong kèm áo khoác: jacket, blazer, áo choàng...</p>\r\n<p>Len cổ lọ là kiểu áo cơ bản mùa đông, già trẻ gái trai - ai ai cũng \"cố thủ\" đôi ba chiếc. Mùa đông ở Việt Nam không có tuyết, nhưng sương muối buốt giá cũng đủ thử thách trái tim dũng cảm của mọi người mỗi sáng trở dậy đi học, đi làm. Len cổ lọ, có thể đảm bảo độ ấm áp bằng áo len thường và khăn choàng cộng lại, độ hữu ích chẳng cách nào phủ nhận</p>\r\n<p>Asos là thương hiệu thời trang bình dân nổi tiếng của Anh được thành lập năm 2000 bởi Nick Robertson dưới hình thức ban đầu là trang web bán hàng thời trang trực tuyến Asos.com dành cho độ tuổi từ 18-34 tuổi. Tuy nhiên, khi càng phát triển, Asos đã thay đổi đối tượng khách hàng khi nhắm đến đa dạng các đối tượng từ phụ nữ, đàn ông, trẻ em cho tới thanh thiếu niên và cung cấp các mặt hàng chủ yếu như giầy dép, phụ kiện, trang sức, quần áo và mỹ phẩm. Phong cách thời trang của Asos chủ yếu được lấy cảm hứng từ những người nổi tiếng để tạo ra những bộ sản phẩm mang tính xu hướng, thời thượng với giá tiêu dùng bình dân nhất.</p>'),
(6, 'Áo thun dài tay Fred Perry', 'upload/10aoke_1733507725.webp', 1000000, 1, 1100000, 'Hãng: Fred Perry', 'Khi tiết trời đang kịp chuyển giao giữa mùa thu và đông thì cũng là lúc nhiều xu hướng mặc ấm được ra đời nhằm đáp ứng nhu cầu của mọi người. Nếu bạn là người bạn rộn, không có...', '<p>Khi tiết trời đang kịp chuyển giao giữa mùa thu và đông thì cũng là lúc nhiều xu hướng mặc ấm được ra đời nhằm đáp ứng nhu cầu của mọi người. Nếu bạn là người bạn rộn, không có thời gian cập nhật xu hướng mới nhưng vẫn muốn trở nên phong cách thì chúng tôi xin giới thiệu cho bạn bộ sưu tập những mẫu áo thun tay dài đơn giản, thời trang, ấm áp mà không bao giờ bị lỗi mốt.</p>\r\n<p>Áo thun tay dài là loại trang phục chiều lòng người mặc nhất, nó không chỉ đơn giản mà rất dễ mix đồ, dù bạn đang ở trong môi trường nào đi nữa, học tập, công sở, dã ngoại, party,… bạn vẫn có thể chọn cho mình những mẫu áo thun tôn dáng và phong cách không kem cạnh gì so với nhiều mẫu thời trang khác.</p>\r\n<p>Nếu bạn đến Anh, chắc chắn bạn không thể không biết thương hiệu street style nổi tiếng Fred Perry. Khỏe khoắn, hiện đại nhưng không kém phần lịch lãm là phong cách chính của Fred Perry.</p>\r\n<p>- Fred Perry: Dòng chính của thương hiệu, tập trung vào phong cách truyền thống, thể thao và có thể dùng khi dạo phố.</p>\r\n<p>- Fred Perry Laurel Wealth: giá thành cũng tương đương Fred Perry nhưng quần áo có xu hướng thời trang hơn thay vì cổ điển như Fred Perry.</p>'),
(7, 'Áo khoác dạ Selected Homme', 'upload/11aoda_1733507670.webp', 2500000, 1, 3000000, 'Hãng: Selected Homme', 'Áo khoác dạ nam cũng được phái mạnh lựa chọn nhiều trong những trang phục hàng ngày tới công sở bởi nét thanh lịch và cũng rất phong cách mà dáng áo này mang lại. Áo khoác dạ là món đồ...', '<p>Áo khoác dạ nam cũng được phái mạnh lựa chọn nhiều trong những trang phục hàng ngày tới công sở bởi nét thanh lịch và cũng rất phong cách mà dáng áo này mang lại.</p>\r\n<p>Áo khoác dạ là món đồ khá quen thuộc không chỉ với phái đẹp mà các nam công sở cũng rất ưu ái cho loại áo khoác này mỗi độ đông về, đặc biệt là các nam công sở trẻ sẽ đa dạng về mẫu mã và màu sắc hơn nam trung niên. Các bạn có thể diện áo khoác dạ cùng những mẫu áo len body mặc trong vừa ấm áp vừa rất thời trang nhé.</p>\r\n<p>Tuy không đa dạng về màu sắc như áo khoác dạ của phái đẹp, áo khoác dạ nam chỉ đơn giản với những gam màu trầm như đen, ghi, đỏ đô hay be nhưng lại rất dễ mix đồ và phù hợp với nhiều màu da, vóc dáng người mặc.</p>\r\n<p>Áo khoác dạ nam được thiết kế cơ bản với kiểu dáng áo mangto và áo vest dạ, mangto dạ bạn cũng có thể chọn cho mình dáng dài trùm gối hay dáng ngắn trùm hông. Với môi trường công sở, các bạn cũng chỉ cần chọn cho mình những mẫu áo trùm hông gọn gàng, đơn giản cũng vừa đủ ấm áp cho ngày đông rồi nhé.</p>'),
(8, 'Áo khoác có mũ Bellfield', 'upload/2aokhoac_1733507638.webp', 1000000, 1, 1300000, 'Hãng: Bellfield', 'Trench coat là một trong những món đồ mà mọi người đều biết chúng rất phù hợp với mùa thu đông cũng như những lúc thời tiết trở lạnh. Tuy là một món thời trang cổ điển, nhưng trench coat...', '<p>Trench coat là một trong những món đồ mà mọi người đều biết chúng rất phù hợp với mùa thu đông cũng như những lúc thời tiết trở lạnh. Tuy là một món thời trang cổ điển, nhưng trench coat dường như có một sức sống mãnh liệt.</p>\r\n<p>Trench coat được mặc bên ngoài bộ suit không làm mất đi tính trang trọng, lịch lãm của set đồ mà còn giúp cho người mặc trông thật tuyệt vời.Với kiểu cổ cao, được thiết kế chi tiết lông thú ở cổ, chiếc trench coat này đem đến vẻ ngoài đậm chất cổ điển, phù hợp với những ai ưa thích phong cách retro.Chiếc áo phao dày dặn bên trong kết hợp cùng trench coat bên ngoài gợi nên hình ảnh một quý ông vô cùng lịch lãm.</p>\r\n<p>Chiếc áo sweater bên trong trench coat tạo nên vẻ ngoài mang một chút năng động, cá tính và thời trang hiện đại. Điểm nhấn của chiếc quần chino đầy trẻ trung kết hợp cùng áo blazer và trench coat thành một set đồ mang đậm vẻ phong trần, mới mẻ cho người mặc. Chiếc quần dạ cũng không phải là ý kiến tồi khi kết hợp với trench coat, vẻ ngoài vừa cổ điển vừa hiện đại của các chàng sẽ được phô diễn một cách tinh tế. Với phụ kiện là một chiếc ô (dù) đen, set đồ mang lại sự nhẹ nhàng của mùa thu, giúp chàng thoải mái cùng các nàng dạo bước trong những chuyến đi chơi đầy thú vị. Kiểu quần jean khi kết hợp với trench coat là một sự phá cách hoàn toàn mới đem lại sự năng động và sức lôi cuốn cho chàng trai.\r\n\r\n</p>'),
(9, 'Áo khoác kéo khóa Asos', 'upload/1aogio_1733507621.webp', 1100000, 2, 0, 'Hãng: Asos', 'Những chiếc bomber jacket lại giúp mang tới vẻ gọn gàng và rất man mà không cần phải thêm thắt quá nhiều chi tiết. Chiếc áo khoác đậm chất unisex này khiến có thể hợp với mọi phong cách, và...', '<p>Những chiếc bomber jacket lại giúp mang tới vẻ gọn gàng và rất man mà không cần phải thêm thắt quá nhiều chi tiết. Chiếc áo khoác đậm chất unisex này khiến có thể hợp với mọi phong cách, và mọi dáng người, khi biết kết hợp đúng đắn. Tuy nhiên nếu bạn là một chàng trai yêu thích sự thời trang và xu hướng thì những chiếc áo bomber jacket hoa, họa tiết lạ mắt sẽ vô cùng phù hợp với phong cách thời trang này. Nhưng đối với những chàng trai yêu sự manh mẽ, nam tính thì những chiếc áo bomber với tông màu basic như đen, xanh, nâu là lựa chọn vô cùng hoàn hảo. Đặc biệt dáng áo này còn giúp các anh chàng tự tin thề hiện cá tính của mình. Bạn cũng có thể kết hợp với với một đôi sneaker và một chiếc mũ snapback để tạo nên phong cách thú vị.</p>\r\n<p>Asos là thương hiệu thời trang bình dân nổi tiếng của Anh được thành lập năm 2000 bởi Nick Robertson dưới hình thức ban đầu là trang web bán hàng thời trang trực tuyến Asos.com dành cho độ tuổi từ 18-34 tuổi. Tuy nhiên, khi càng phát triển, Asos đã thay đổi đối tượng khách hàng khi nhắm đến đa dạng các đối tượng từ phụ nữ, đàn ông, trẻ em cho tới thanh thiếu niên và cung cấp các mặt hàng chủ yếu như giầy dép, phụ kiện, trang sức, quần áo và mỹ phẩm. Phong cách thời trang của Asos chủ yếu được lấy cảm hứng từ những người nổi tiếng để tạo ra những bộ sản phẩm mang tính xu hướng, thời thượng với giá tiêu dùng bình dân nhất.</p>'),
(10, 'Quần vải ống suông Farah', 'upload/12quanvai_1733507562.webp', 1400000, 2, 0, 'Hãng: Farah', 'Chọn được những chiếc quần vải nam phù hợp với vóc dáng lại trẻ trung và thời trang không phải là điều dễ dàng bởi không giống như quần jeans hay kaki, quần vải thường khá kén người mặc nên...', '<p>Chọn được những chiếc quần vải nam phù hợp với vóc dáng lại trẻ trung và thời trang không phải là điều dễ dàng bởi không giống như quần jeans hay kaki, quần vải thường khá kén người mặc nên rất dễ làm lộ khuyết điểm của bạn, sẽ rất có thể chiếc quần sẽ bị xếp vào xó tủ.</p>\r\n<p>Với đặc điểm phải ngồi lâu một chỗ của dân văn phòng, quần vải nam thường rất dễ nhăn nhúm ở hai bên hông và khửu chân nếu như chất liệu vải không tốt. Sẽ hạn chế đáng kể nếu bạn chọn chiếc quần có chất liệu tốt, và nên chọn loại vải co giãn nhẹ. Khi ngồi xuống, hai ống quần sẽ căng ra theo chiều 4D, khiến quần bị co ngắn lên, gây mất thẩm mỹ. Nếu không thạo về chất vải, cách tốt nhất là bạn nên tìm đến những mẫu quần vải đã có thương hiệu. Dù giá cả đắt hơn, nhưng bạn sẽ được đảm bảo về chất liệu.</p>\r\n<p>Thương hiệu Farah được thành lập năm 1920 và liên tục phát triển, hiện nay đã trở thành thương hiệu mang tính biểu tượng đặc trưng cho sự phối hợp ngẫu hứng giữa văn hóa pop và thời trang.</p>\r\n<p>Thương hiệu Farah đại diện cho giới trẻ với sự tự do, yêu nghệ thuật và khát khao khẳng định giá trị bản thân.</p>\r\n<p>Với 3 năm liên tiếp đạt được giải thưởng danh giá về thiết kế Drapper Award 2011, 2012, 2013 tại Anh đã chứng minh cho sức sáng tạo không ngừng nghỉ của Farah.</p>'),
(11, 'Quần kaki ống suông New Look', 'upload/13quankhaki_1733507546.webp', 400000, 2, 0, 'Hãng: New Look', 'Với kiểu dáng rộng rãi và đặc biệt ít nhăn, một chiếc quần dáng suông đem đến ấn tượng phóng khoáng, khỏe mạnh và thậm chí hơi bụi bặm với vài sợi vải tước ở phần gấu. Tuy nhiên, nếu...', '<p>Với kiểu dáng rộng rãi và đặc biệt ít nhăn, một chiếc quần dáng suông đem đến ấn tượng phóng khoáng, khỏe mạnh và thậm chí hơi bụi bặm với vài sợi vải tước ở phần gấu. Tuy nhiên, nếu muốn chọn quần kaki cho phong cách công sở, bạn nên chọn quần với phom hơi ôm tạo dáng đứng, ống quần không quá rộng để tránh trông quá lòa xòa.</p>\r\n<p>Chiếc quần kaki với kiểu dáng rộng rãi điểm tô chút nhàu nhĩ rất phù hợp cho phong cách thoải mái cho những ngày hè. Nên nhớ bạn chỉ nên giặt chúng khi cực kì cần thiết. Nếp nhàu cũng làm nên tuyên ngôn cá tính không kém một chiếc quần đã được là phẳng phiu. Chúng cũng nói rằng đôi tất của bạn đã được là cẩn thận.</p>\r\n<p>Bạn muốn khoác lên mình một diện mạo mới? Hãy đến với New Look, vì đó là sứ mệnh cũng như phương châm của thương hiệu thời trang được thành lập vào năm 1969, tại Taunton, Vương Quốc Anh. Trải qua quá trình hình thành và phát triển, cho đến ngày nay New Look được biết đến là chuỗi bán lẻ thời trang nhanh, cập nhật liên tục phong cách thời trang trẻ trên toàn thế giới, đặc biệt là phong cách thời trang đường phố (thời trang casual). Với 1.100 cửa hàng ở khắp 120 nước trên thế giới, New Look sẽ mang đến cho bạn những xu hướng mới nhất từ sàn catwalk, từ những bộ trang phục theo mùa cho đến những item đang hot. New Look muốn mang đến cho bạn cảm giác tươi mới và thoải mái như chính bộ trang phục mà bạn đang mặc. New Look UK có đội ngũ thiết kế trẻ, đam mê thời trang và luôn cập nhật nhanh nhất những xu hướng thời trang đường phố mới nhất hay tâm điểm trên sàn catwalk. Những thiết kế của New Look là kết hợp hoàn hảo của sự nữ tính, độc lập, mạnh mẽ và luôn dịch chuyển.\r\n</p>'),
(12, 'Quần jean mài Only & Sons', 'upload/7quanjeanmai_1733507532.webp', 880000, 2, 0, 'Hãng: Only & Sons', 'Vẻ năng động mạnh mẽ của nam giới có phần không nhỏ nhờ những chiếc quần jean. Với xu hướng rộng khắp của hàng loạt loại jean như jean rách, jean ống đứng, jean ống côn… phái mạnh sẽ chọn...', '<p>Vẻ năng động mạnh mẽ của nam giới có phần không nhỏ nhờ những chiếc quần jean. Với xu hướng rộng khắp của hàng loạt loại jean như jean rách, jean ống đứng, jean ống côn… phái mạnh sẽ chọn loại quần nào để thêm nam tính?</p>\r\n<p>Các chàng trai cũng đừng quên chọn cho mình những chiếc quần jeans hợp mốt. Đặc biệt ngày nay, quần jeans của nam giới không chỉ có ống đứng dạng to và rộng, chúng đã được “cải tiến” thành những chiếc quần ống nhỏ, ống loe hợp hơn nhưng vẫn tạo sự thoải mái và thể hiện được cá tính mạnh mẽ.</p>\r\n<p>Quần jean nam là một item quen thuộc của thời trang nam chúng không hề chỉ là những kiểu dáng đơn giản như mọi người vẫn thường nghĩ. Quần jean nam ngày càng được thiết kế đa dạng hơn với nhiều kiểu dáng để tạo ra nhiều phong cách thời trang cho nam giới. Bạn có thể dễ dàng tìm thấy nhiều kiểu dáng quần jean nam trên thị trường hiện nay như: Jeans ống đứng, Jeans skinny, Jeans ống rộng, jeans có túi hậu, Jeans ống loe, Jean rách, Jeans cạp trễ, Jean mài…</p>\r\n<p>Quần jean nam thường được may từ chất liệu jean mềm dễ chịu và thông thoáng tạo cảm giác thoải mái khi mặc và dễ dàng cho mọi hoạt động. Các chàng có thể phối cùng nhiều kiểu áo thun, áo pull khỏe khoắn hoặc sơ mi thanh lịch, để có một diện mạo hoàn hảo nhất.</p>'),
(13, 'Kính mát gọng vuông Ray-Ban', 'upload/5kinhmat_1733507514.webp', 15000000, 2, 0, 'Hãng: Ray-Ban', 'Với cảm hứng từ thiết kế của dòng kính Wayfarer cổ điển, Ray-Ban giới thiệu một chiếc kính Wayfarer khác với khung kính nhỏ và các đường nét mềm mại hơn. Hoàn hảo với tròng kính polarized chống tia UV,...', '<p>Với cảm hứng từ thiết kế của dòng kính Wayfarer cổ điển, Ray-Ban giới thiệu một chiếc kính Wayfarer khác với khung kính nhỏ và các đường nét mềm mại hơn. Hoàn hảo với tròng kính polarized chống tia UV, khung kính họa tiết đồi mồi cho một phong cách quyến rũ</p>\r\n<p>- Khung kính nhựa cao cấp dáng vuông họa tiết đồi mồi</p>\r\n<p>- Tròng kính polarized nâu loang màu</p>\r\n<p>- Đệm mũi liền thân kính</p>\r\n<p>- Đầu gọng kính uốn cong đính tên thương hiệu</p>\r\n<p>- Chống tia UV 100%</p>\r\n<p>Kính Ray-Ban chính là một biểu tượng thời trang và khẳng định phong cách sống với lịch sử ra đời từ hơn 70 năm trước. Từ sản phẩm mắt kính Aviator đến kính Wayfarer và nhiều loại kính huyền thoại khác, Ray-Ban đã tạo nên một trào lưu văn hóa lan tỏa mạnh mẽ đến nhiều tầng lớp khác nhau, dù là Hollywood hay trong quân đội Mỹ. Theo đuổi thông điệp “Never hide” - “Không bao giờ che giấu”, Ray-Ban đã và đang là sản phẩm không thể thiếu dành cho những ai yêu thích sự chân thực, muốn thể hiện cái tôi độc lập và khác biệt của mình</p>'),
(14, 'Mũ lưỡi trai New Era', 'upload/6muluoitrai_1733507500.webp', 200000, 2, 0, 'Hãng: New Era', 'Mũ lưỡi trai màu xanh đậm có thêu chữ NY của thương hiệu New Era với phong cách tinh nghịch và cá tính, là lựa chọn hoàn hảo cho những dịp dạo phố cùng bạn bè. - Chất liệu vải polyester...', '<p>Mũ lưỡi trai màu xanh đậm có thêu chữ NY của thương hiệu New Era với phong cách tinh nghịch và cá tính, là lựa chọn hoàn hảo cho những dịp dạo phố cùng bạn bè.</p>\r\n<p>- Chất liệu vải polyester pha cotton</p>\r\n<p>- May viền chỉ nổi</p>\r\n<p>- Phía sau khoét cách điệu, phối khóa kim loại để thay đổi độ rộng vòng mũ</p>\r\n<p>- 78% Polyester, 22% Cotton</p>\r\n<p>New Era là thương hiệu thời trang chuyên sản xuất các sản phẩm có liên quan đến thế giới bóng chày. New Era không những cho ra đời các sản phẩm có chất lượng cao mà còn luôn bắt kịp các xu hướng thời trang trong nước và quốc tế. Đây sẽ là sản phẩm tuyệt vời để đồng hành cùng bạn trong bất kỳ dịp đặc biệt nào, không chỉ là phụ kiện tô điểm bên ngoài mà còn giúp bạn thể hiện phong cách thời trang tinh tế của người sử dụng. Hãy khám phá thế giới thời trang ấn tượng và khác biệt của New Era.</p>'),
(15, 'Cà vạt lụa Calvin Klein', 'upload/14cavat_1733507486.webp', 900000, 2, 0, 'Hãng: Calvin Klein', 'Caravat đẹp, chất lượng tốt của Calvin Klein: - Kiểu cách, mẫu mã nhiều, đa dạng - Kích thước dây đeo thoải mái - Phù hợp phối với nhiều mẫu áo sơ mi, công sở… Màu sắc: Xám Hướng dẫn sử dụng: - Làm sạch nhẹ...', '<p>Caravat đẹp, chất lượng tốt của Calvin Klein:</p>\r\n<p>- Kiểu cách, mẫu mã nhiều, đa dạng</p>\r\n<p>- Kích thước dây đeo thoải mái</p>\r\n<p>- Phù hợp phối với nhiều mẫu áo sơ mi, công sở…</p>\r\n<p>Màu sắc: Xám</p>\r\n<p>Hướng dẫn sử dụng:</p>\r\n<p>- Làm sạch nhẹ nhành, nên giặt bằng taykhăn ẩm</p>\r\n<p>- Không nên dùng bột giặt có chất tẩy mạnh</p>\r\n<p>Không chỉ nổi tiếng với những thiết kế thời trang xóa nhòa ranh giới tuổi tác và giới tính thông qua phong cách unisex, Calvin Klein còn gây ấn tượng bởi các sản phẩm phụ kiện phản ánh lối sống hiện đại, trẻ trung, phóng khoáng. Các sản phẩm của Calvin Klein luôn trung thành với nguyên tắc “Simply as possible, Success as possible”. Từ mẫu mã đến chất liệu, từ trang phục đến phụ kiện, tất cả đều đơn giản, thuần nhất, không cầu kỳ về chi tiết, không rực rỡ về màu sắc. Chính sự đơn giản đó mang lại vẻ đẹp phù hợp với tất cả mọi người cũng như có tính ứng dụng cực cao, đúng như cách mà giới thời trang vẫn nói: Simple is the best.</p>'),
(16, 'Khăn cài túi áo vest Asos', 'upload/15khanvest_1733507474.webp', 160000, 2, 0, 'Hãng: Asos', 'Cũng giống như thanh kẹp cà vạt thì pocket square (một loại khăn để tay gấp để trong túi áo vest) cũng là chi tiết giúp tô điểm cho phong cách lịch lãm của một quý ông khi mặc áo...', '<p>Cũng giống như thanh kẹp cà vạt thì pocket square (một loại khăn để tay gấp để trong túi áo vest) cũng là chi tiết giúp tô điểm cho phong cách lịch lãm của một quý ông khi mặc áo vest. Thông thường, pocket square được sử dụng trong những không gian sang trọng như tiệc tùng hoặc đám cưới và việc gấp một chiếc khăn vuông trang trí cho chiếc túi áo ngực là cả một nghệ thuật, không chỉ thể hiện đẳng cấp mà còn sự tinh tế của một quý ông. Pocket square sẽ mang đến nét linh hoạt cho chiếc áo vest, đồng thời tạo một hình ảnh vui tươi, thú vị hơn cho phong cách vốn cứng nhắc của chiếc áo vest.</p>\r\n<p>Asos là thương hiệu thời trang bình dân nổi tiếng của Anh được thành lập năm 2000 bởi Nick Robertson dưới hình thức ban đầu là trang web bán hàng thời trang trực tuyến Asos.com dành cho độ tuổi từ 18-34 tuổi. Tuy nhiên, khi càng phát triển, Asos đã thay đổi đối tượng khách hàng khi nhắm đến đa dạng các đối tượng từ phụ nữ, đàn ông, trẻ em cho tới thanh thiếu niên và cung cấp các mặt hàng chủ yếu như giầy dép, phụ kiện, trang sức, quần áo và mỹ phẩm. Phong cách thời trang của Asos chủ yếu được lấy cảm hứng từ những người nổi tiếng để tạo ra những bộ sản phẩm mang tính xu hướng, thời thượng với giá tiêu dùng bình dân nhất.</p>'),
(17, 'Khăn ống Tommy Hilfiger', 'upload/16khanong_1733507461.webp', 700000, 5, 0, 'Hãng: Tommy Hilfiger', 'Mọi người luôn cho rằng khăn ống là phụ kiện dành riêng cho nữ giới, nhưng hiện nay nam giới cũng có thể diện được những chiếc khăn ống cá tính và đầy ấm áp này. Bạn đừng vội từ...', '<p>Mọi người luôn cho rằng khăn ống là phụ kiện dành riêng cho nữ giới, nhưng hiện nay nam giới cũng có thể diện được những chiếc khăn ống cá tính và đầy ấm áp này. Bạn đừng vội từ chối vì cho rằng chiếc khăn này sẽ làm giảm độ \"manly\" của mình, trái lại khăn ống còn giúp bạn tạo phong cách cá tính và nổi bật hơn cho mình đấy.</p>\r\n<p>Khăn ống dành cho nam giới cũng có khá nhiều màu sắc và họa tiết để bạn kết hợp với các loại trang phục khác nhau. Một chiếc khăn họa tiết hay màu sắc rực rỡ như đỏ, vàng, xanh... giúp làm cho những bộ trang phục màu tối của bạn thu hút và trẻ trung hơn hẳn.</p>\r\n<p>Thương hiệu Tommy Hilfiger do nhà thiết kế cùng tên sáng lập năm 1985 với các dòng sản phẩm như: quần áo, trang phục thể thao, đồ Jeans, giày, túi xách, nước hoa, đồng hồ và mắt kính phục vụ cho giới trẻ nam nữ.</p>\r\n<p>Các thiết kế của hãng rất đa dạng, từ những mẫu thiết kế cơ bản, cổ điển, đến thanh lịch và năng động.</p>\r\n<p>Với ba màu sắc truyền thống là đỏ, trắng, và xanh dương đậm, Tommy Hilfiger đã trở thành một biểu tượng thương hiệu thời trang của Mỹ.</p>'),
(18, 'Khăn lụa bản nhỏ Ted Baker', 'upload/17khanlua_1733507445.webp', 980000, 5, 0, 'Hãng: Ted Baker', 'Ấn tượng đầu tiên một chiếc khăn lụa mang đến chắc chắn là sự sang trọng, tinh tế và cao cấp. Chúng có giá trị nhiều về mặt trang sức, rất phù hợp cho các quý ông diện kèm theo...', '<p>Ấn tượng đầu tiên một chiếc khăn lụa mang đến chắc chắn là sự sang trọng, tinh tế và cao cấp. Chúng có giá trị nhiều về mặt trang sức, rất phù hợp cho các quý ông diện kèm theo suit và tuxedo trong những bữa tiệc sang trọng.</p>\r\n<p>Kiểu quàng cơ bản là cách dễ nhất để bạn sử dụng khăn, tất cả những gì bạn cần làm là đưa khăn qua cổ áo và chỉnh cho các nếp khăn ngay ngắn và gọn gàng. Phong cách trên thường được sử dụng với blazer hoặc áo suit, vị trí đặt khăn sẽ là giữa lớp áo sơ mi và áo suit.</p>\r\n<p>Sau khi được phát triển thành thương hiệu có tiếng chuyên về áo sơ mi nam ở Glasgow, Anh, Ted Baker nhanh chóng trở thành nơi để những người đàn ông đương đại tìm kiếm những chiếc áo phù hợp</p>\r\n<p>Từ những ngày đầu, Ted Baker rất rõ ràng, kiên định, tập trung vào chất lượng, chú ý đến chi tiết với sự hài hước kỳ quặc. Cửa hàng đầu tiên của Ted Baker còn cung cấp dịch vụ giặt ủi cho mỗi chiếc áo được mua. Thương hiệu đã nhanh chóng đạt được thành công với danh hiệu “No Ordinary Designer Label” (thương hiệu của nhà thiết kế không tầm thường). Tất cả mọi thứ được sản xuất dưới tên Ted Baker đều cấu thành với sự độc đáo và tình yêu từ trong trái tim.</p>'),
(19, 'Mũ len đính cục bông Asos', 'upload/18mulen_1733507429.webp', 200000, 5, 0, 'Hãng: Asos', 'Ngoài tất, khăn quàng và găng tay thì những chiếc mũ len đội đầu chính là món đồ được săn đón nhiều nhất bởi sự đa dạng về kiểu dáng, màu sắc cũng như phong cách mà nó mang lại...', '<p>Ngoài tất, khăn quàng và găng tay thì những chiếc mũ len đội đầu chính là món đồ được săn đón nhiều nhất bởi sự đa dạng về kiểu dáng, màu sắc cũng như phong cách mà nó mang lại cho người dùng.</p>\r\n<p>Nổi lên trong số đó là loại mũ len móc, dáng tròn, hơi thả lỏng một chút về phía sau đầu. Kiểu mũ phổ biến này mà hầu như ai cũng sở hữu một chiếc trong tủ đồ được gọi là mũ beanie. Chúng thường được làm bằng các chất liệu như dệt kim, len mỏng, len xoắn... với rất nhiều màu sắc tự nhiên, vì vậy sẽ vô cùng thuận tiện cho việc mix đồ và phù hợp với tất cả mọi người</p>\r\n<p>Asos là thương hiệu thời trang bình dân nổi tiếng của Anh được thành lập năm 2000 bởi Nick Robertson dưới hình thức ban đầu là trang web bán hàng thời trang trực tuyến Asos.com dành cho độ tuổi từ 18-34 tuổi. Tuy nhiên, khi càng phát triển, Asos đã thay đổi đối tượng khách hàng khi nhắm đến đa dạng các đối tượng từ phụ nữ, đàn ông, trẻ em cho tới thanh thiếu niên và cung cấp các mặt hàng chủ yếu như giầy dép, phụ kiện, trang sức, quần áo và mỹ phẩm. Phong cách thời trang của Asos chủ yếu được lấy cảm hứng từ những người nổi tiếng để tạo ra những bộ sản phẩm mang tính xu hướng, thời thượng với giá tiêu dùng bình dân nhất.</p>'),
(20, 'Mũ cói dây viền đen Brixton', 'upload/19mucoi_1733507416.webp', 800000, 5, 0, 'Hãng: Brixton', 'Mũ cói là món phụ kiện thời trang không bao giờ hết mốt. Chỉ cần khéo léo một chút, nó sẽ khiến cho bộ trang phục của bạn phong cách hơn hẳn. Một loại mũ cói cực thời trang nữa là...', '<p>Mũ cói là món phụ kiện thời trang không bao giờ hết mốt. Chỉ cần khéo léo một chút, nó sẽ khiến cho bộ trang phục của bạn phong cách hơn hẳn.</p>\r\n<p>Một loại mũ cói cực thời trang nữa là mũ panama cổ điển (classic panama hat), rất dễ kết hợp đồ, đặc biệt là những bộ trang phục mang phong cách đường phố, và là một trong vài dòng mũ cói có thể dùng cho cả nam và nữ.</p>\r\n<p>Bạn đừng nghĩ mũ cói phải theo một màu sắc cơ bản nào đó, bạn hoàn toàn có thể chọn cho mình những chiếc mũ cói với màu sắc hoặc họa tiết nổi bật.</p>\r\n<p>‬Brixton là một thương hiệu đến từ Anh quốc, đây cũng là thương hiệu yêu thích của chàng ca sĩ nổi tiếng Justin Bieber. Với một loạt cảm hứng được chuyển thể từ âm nhạc, văn hóa và nghệ thuật - nhãn hàng California đã nhanh chóng trở thành một trong những cái tên được tìm đến nhiều nhất trong mắt các fashionista quốc tế. Từ beanie, snapback cho đến fedora hay trilby, các sản phẩm của Brixton đều xứng đáng đạt khung điểm từ 8 đến 10 và chắc chắn - đây sẽ là những sản phẩm phù hợp nhất để bạn diện đến các lễ hội mùa thu đang chuẩn bị diễn ra.</p>'),
(21, 'Giày da lộn New Look', 'upload/20giayderby_1733507401.webp', 500000, 5, 0, 'Hãng: New Look', 'Giày casual thời trang nam từ thương hiệu New Look mang kiểu dáng mạnh mẽ và sành điệu, cho các bạn nam tự tin tham gia mọi sự kiện. Kiểu dáng thắt dây làm bật lên cá tính và phong...', '<p>Giày casual thời trang nam từ thương hiệu New Look mang kiểu dáng mạnh mẽ và sành điệu, cho các bạn nam tự tin tham gia mọi sự kiện. Kiểu dáng thắt dây làm bật lên cá tính và phong cách.</p>\r\n<p>- Size: Giày có kích cỡ đúng tiêu chuẩn</p>\r\n<p>- Chất liệu: Da lộn</p>\r\n<p>- Kiểu mũi giày: Mũi tròn</p>\r\n<p>- Kiểu giày: Giày dây cột</p>\r\n<p>Bạn muốn khoác lên mình một diện mạo mới? Hãy đến với New Look, vì đó là sứ mệnh cũng như phương châm của thương hiệu thời trang được thành lập vào năm 1969, tại Taunton, Vương Quốc Anh. Trải qua quá trình hình thành và phát triển, cho đến ngày nay New Look được biết đến là chuỗi bán lẻ thời trang nhanh, cập nhật liên tục phong cách thời trang trẻ trên toàn thế giới, đặc biệt là phong cách thời trang đường phố (thời trang casual). Với 1.100 cửa hàng ở khắp 120 nước trên thế giới, New Look sẽ mang đến cho bạn những xu hướng mới nhất từ sàn catwalk, từ những bộ trang phục theo mùa cho đến những item đang hot. New Look muốn mang đến cho bạn cảm giác tươi mới và thoải mái như chính bộ trang phục mà bạn đang mặc. New Look UK có đội ngũ thiết kế trẻ, đam mê thời trang và luôn cập nhật nhanh nhất những xu hướng thời trang đường phố mới nhất hay tâm điểm trên sàn catwalk. Những thiết kế của New Look là kết hợp hoàn hảo của sự nữ tính, độc lập, mạnh mẽ và luôn dịch chuyển.</p>'),
(22, 'Giày da mờ buộc dây Aldo', 'upload/21giaydesert_1733507385.webp', 1900000, 5, 0, 'Hãng: Aldo', 'Sản phẩm thời trang cao cấp, có form dáng chuẩn, da mềm cho mang lại cảm giác thoáng mát, thoải mái, nâng niu đôi chân bạn. Chất liệu: Da mờ cao cấp Đế làm bằng cao su, ma sát tốt, không nứt...', '<p>Sản phẩm thời trang cao cấp, có form dáng chuẩn, da mềm cho mang lại cảm giác thoáng mát, thoải mái, nâng niu đôi chân bạn.</p>\r\n<p>Chất liệu: Da mờ cao cấp</p>\r\n<p>Đế làm bằng cao su, ma sát tốt, không nứt vỡ, ít bị mài mòn</p>\r\n<p>Sản phẩm được bảo hành 01 năm về da và đế</p>\r\n<p>Hàng hiệu Aldo – cái tên đồng nghĩa với lớp học và phong cách. Giầy, thắt lưng, bốt và túi xách là hình ảnh thu nhỏ của phong cách vượt thời gian. Aldo cung cấp các thiết kế hợp thời với giá cả phải chăng và là thương hiệu điểm đến cho sự thoải mái và phong cách ở khắp mọi nơi. Aldo là một trong hầu hết nhãn hiệu giầy dép thời trang được quốc tế công nhận.</p>\r\n<p>Aldo cung cấp các xu hướng mới và cả theo phong cách cổ điển. Giày – thắt lưng – túi xách Aldo được thiết kế để thu hút những người sành thời trang và nắm bắt kịp xu hướng ở đa quốc gia. Tầm nhìn của Aldo với mục đích tạo ra một thế giới tốt đẹp hơn bằng việc đóng góp từ thiện nhiều. Aldo cam kết cập nhật những xu hướng mới nhất song song với nhu cầu hàng ngày. Hãy bổ sung thắt lưng – giày – túi xách Aldo vào bộ sưu tập của bạn để nói lên phong cách riêng của mình. Sản phẩm của Aldo luôn luôn hiện đại với những phong cách tươi mới.</p>'),
(23, 'Giày thể thao da lộn Ellesse', 'upload/22giaytrainer_1733507336.webp', 1200000, 5, 0, 'Hãng: Ellesse', 'Ellesse luôn mang đến cho Bạn các sản phẩm tinh tế, chất lượng, hiện đại về kiểu dáng, thời trang mới nhất, mang đến sự tự tin và năng động cho bạn trong sinh hoạt hằng ngày. Đến với Ellesse,...', '<p>Ellesse luôn mang đến cho Bạn các sản phẩm tinh tế, chất lượng, hiện đại về kiểu dáng, thời trang mới nhất, mang đến sự tự tin và năng động cho bạn trong sinh hoạt hằng ngày. Đến với Ellesse, bạn sẽ có nhiều sự lựa chọn phong phú, hoàn hảo và hợp thời trang nhất.</p>\r\n<p>- Chất liệu da lộn thông thoáng</p>\r\n<p>- Đế cao su rắn chắc, êm ái</p>\r\n<p>- Thiết kế đơn giản độ bền vượt trội</p>\r\n<p>Hướng dẫn sử dụng:</p>\r\n<p>- Bảo quản trong điều kiện môi trường khô thoáng</p>\r\n<p>- Sản phẩm có thể chải giặt với môi trường nước thường</p>\r\n<p>- Tránh phơi sản phẩm trực tiếp dưới ánh nắng mặt trời</p>\r\n<p>- Tránh để sản phẩm tiếp xúc với vật nhọn</p>'),
(24, 'Giày bốt da bóng Asos', 'upload/23botnau_1733507301.webp', 1200000, 5, 0, 'Hãng: Asos', '- Giày da bóng - Kiểu giày buộc dây, có khóa kéo ở cạnh - Trang trí hoa văn - Mũi tròn - 100% da thật Asos là thương hiệu thời trang bình dân nổi tiếng của Anh được thành lập năm 2000 bởi Nick...', '<p>- Giày da bóng</p>\r\n<p>- Kiểu giày buộc dây, có khóa kéo ở cạnh</p>\r\n<p>- Trang trí hoa văn</p>\r\n<p>- Mũi tròn</p>\r\n<p>- 100% da thật</p>\r\n<p>Asos là thương hiệu thời trang bình dân nổi tiếng của Anh được thành lập năm 2000 bởi Nick Robertson dưới hình thức ban đầu là trang web bán hàng thời trang trực tuyến Asos.com dành cho độ tuổi từ 18-34 tuổi. Tuy nhiên, khi càng phát triển, Asos đã thay đổi đối tượng khách hàng khi nhắm đến đa dạng các đối tượng từ phụ nữ, đàn ông, trẻ em cho tới thanh thiếu niên và cung cấp các mặt hàng chủ yếu như giầy dép, phụ kiện, trang sức, quần áo và mỹ phẩm. Phong cách thời trang của Asos chủ yếu được lấy cảm hứng từ những người nổi tiếng để tạo ra những bộ sản phẩm mang tính xu hướng, thời thượng với giá tiêu dùng bình dân nhất.</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `user`, `email`, `password`, `role`) VALUES
(1, 'admin', 'channelbaby15@gmail.com', '123', 1),
(4, 'minh hoen', 'thuhuonglee8@gmail.com', '33333', 0),
(5, 'hiếu đồng', 'thuhuonglee968@gmail.com', '123456789', 0),
(7, 'nguyễn huy phát', '', 'Huydeliver1234', 0);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`idpro`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`iddh`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_catalog_product` FOREIGN KEY (`id_catalog`) REFERENCES `catalog` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
