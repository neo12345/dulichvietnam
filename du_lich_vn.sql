-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2016 at 11:09 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `du_lich_vn`
--
CREATE DATABASE IF NOT EXISTS `du_lich_vn` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `du_lich_vn`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `DOB` year(4) NOT NULL,
  `sex` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `DOB`, `sex`, `type`) VALUES
(1, 'aaa1', '1bbd886460827015e5d605ed44252251', 'aa@a.a', 2016, 0, 1),
(2, 'aaa1111', 'beee47d70a7fc4c0c2cd2b517cc4b134', 'aa@a.aa', 0000, 1, 0),
(3, '1111', '1bbd886460827015e5d605ed44252251', 'aa@a.a', 2016, 0, 0),
(5, 'aaa', '1bbd886460827015e5d605ed44252251', 'aa@a.a', 0000, 1, 0),
(6, 'aaa', '1bbd886460827015e5d605ed44252251', 'aa@a.a', 0000, 1, 0),
(7, 'qwewqe', '1bbd886460827015e5d605ed44252251', 'das@dsa.dsa', 2004, 1, 0),
(8, 'dsad', '1bbd886460827015e5d605ed44252251', 'ad@asd.asd', 0000, 0, 0),
(9, 'ewq', '1bbd886460827015e5d605ed44252251', 'ewq@qe.ewq', 2016, 0, 0),
(10, 'dsads', '1bbd886460827015e5d605ed44252251', 'dsad@sad.ad', 2016, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `account_vector`
--

CREATE TABLE IF NOT EXISTS `account_vector` (
  `id` int(11) NOT NULL,
  `places_or_tours` int(11) NOT NULL,
  `time_short` float DEFAULT NULL,
  `time_long` float DEFAULT NULL,
  `time_priotity` float NOT NULL,
  `cost_low` float DEFAULT NULL,
  `cost_high` float DEFAULT NULL,
  `cost_priotity` float NOT NULL,
  `quality_low` float DEFAULT NULL,
  `quality_high` float DEFAULT NULL,
  `quality_priotity` float NOT NULL,
  `nature_low` float DEFAULT NULL,
  `nature_high` float DEFAULT NULL,
  `nature_priotity` float NOT NULL,
  `adventure_low` float DEFAULT NULL,
  `adventure_high` float DEFAULT NULL,
  `adventure_priotity` float NOT NULL,
  `religious_low` float DEFAULT NULL,
  `religious_high` float DEFAULT NULL,
  `religious_priotity` float NOT NULL,
  `health_or_medical_low` float DEFAULT NULL,
  `health_or_medical_high` float DEFAULT NULL,
  `health_or_medical_priotity` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account_vector`
--

INSERT INTO `account_vector` (`id`, `places_or_tours`, `time_short`, `time_long`, `time_priotity`, `cost_low`, `cost_high`, `cost_priotity`, `quality_low`, `quality_high`, `quality_priotity`, `nature_low`, `nature_high`, `nature_priotity`, `adventure_low`, `adventure_high`, `adventure_priotity`, `religious_low`, `religious_high`, `religious_priotity`, `health_or_medical_low`, `health_or_medical_high`, `health_or_medical_priotity`) VALUES
(1, 1, 0.5, 0, 0.75, -1, 0, 0.75, -1, 1, 0.25, -1, 0, 0.75, 0.5, 0, 0.75, -0.5, 0, 1, -1, -0.5, 0.75),
(2, 0, -1, 0, 0, -1, 0, 0, -1, 0, 0, -1, 0, 0, -1, 0, 0, -1, 0, 0, -1, 0, 0),
(3, 1, -1, NULL, 0.5, -1, NULL, 0, -1, NULL, 0, -1, NULL, 0, -1, NULL, 0, -1, NULL, 0, -1, NULL, 0),
(4, 0, 0.5, 0, 0, 0.5, 0, 0.25, 0, 0.5, 0.25, 0.5, 0, 0.5, 1, 0, 0.25, 0, 0, 0.5, 0.5, 0, 0.5),
(6, 1, -1, 0, 1, 1, 0, 0, -1, 0, 0, 1, 0, 1, -1, 0, 1, 0, 0, 1, -1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner`) VALUES
(1, 'dadasdsadasdasdad');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `feature_img` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `feature_img`, `description`, `content`) VALUES
(1, 'news 1', '', 'news 1 news 1 news 1 news 1', '<p><img src="http://localhost/img_dl/du-lich-da-nang.jpg" width="300" height="300" /></p>\r\n<p>news 1news 1news 1news 1news 1news 1news 1</p>\r\n<p><em>news 1news 1news 1news 1news 1news 1news 1</em></p>\r\n<p><strong>news 1news 1news 1news 1news 1news 1</strong></p>\r\n<p style="text-align: center;">news 1news 1news 1news 1news 1news 1news 1</p>\r\n<p style="text-align: center;">&nbsp;</p>'),
(2, 'dsadasd', '', 'dsadads', 'dsadsadsadsdsadsad'),
(3, 'dsadasd', '', 'dsadsads', 'sadsadsadsads'),
(4, 'wtrwye', '', '4d5', 'cue'),
(5, 'post', 'http://localhost/img_dl/du-lich-da-nang.jpg', 'dqdqwdwq', '<p>dwqdwqdwqdwq</p>'),
(6, 'ffewfeqf', '', 'fewqfeqwfqwf', 'ewfqwfewqf'),
(7, 'feqfeq', '', 'feqwfqwf', 'feqwfqewfe'),
(8, 'fewfewqefqw', 'http://localhost/img_dl/du-lich-da-nang.jpg', 'fewqfewf', '<p>fewqfeqwfe</p>'),
(9, 'da nang', 'http://localhost/img_dl/du-lich-da-nang.jpg', 'du lich da nang 1 ngay', '<p><img style="display: block; margin-left: auto; margin-right: auto;" src="http://localhost/img_dl/du-lich-da-nang.jpg" alt="" width="300" height="246" /></p>\r\n<p>du lịch đ&agrave; nẵng 1 ng&agrave;y Đ&agrave; Nẵng l&agrave; th&agrave;nh phố biển ở Miền Trung nước ta v&agrave; l&agrave; th&agrave;nh phố lọt v&agrave;o Tops những th&agrave;nh phố đ&aacute;ng sống nhất ở Đ&ocirc;ng Nam &Aacute; nhờ v&agrave;o điều kiện tự nhi&ecirc;n thuận lợi, cơ sở hạ tầng, ch&iacute;nh s&aacute;ch ph&aacute;p luật tốt cũng như m&ocirc;i trường sống th&acirc;n thiện. Ch&iacute;nh v&igrave; vậy, những năm gần đ&acirc;y, Đ&agrave; Nẵng ng&agrave;y c&agrave;ng thu h&uacute;t kh&aacute;ch du lịch hơn, từ kh&aacute;ch trong nước tới kh&aacute;ch nước ngo&agrave;i đều muốn tới đ&acirc;y một lần. V&agrave; khi đ&atilde; đến đ&acirc;y một lần rồi th&igrave; hầu hết đều muốn quay trở lại nhiều lần hơn nữa để cảm nhận từng hơi thở của th&agrave;nh phố trẻ n&agrave;y. Toidi.net với b&agrave;i viết n&agrave;y hy vọng c&aacute;c bạn c&oacute; thể tự m&igrave;nh Du lịch Đ&agrave; Nẵng 1 ng&agrave;y, từ những điểm thu h&uacute;t nhất tới những điểm th&acirc;n thiện nhất, chứ kh&ocirc;ng chỉ với c&aacute;i nh&igrave;n của một kh&aacute;ch du lịch.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE IF NOT EXISTS `places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `feature_img` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `destination` text COLLATE utf8_unicode_ci NOT NULL,
  `time` float NOT NULL,
  `cost` float NOT NULL,
  `quality` float NOT NULL,
  `nature` text COLLATE utf8_unicode_ci NOT NULL,
  `religious` text COLLATE utf8_unicode_ci NOT NULL,
  `adventure` text COLLATE utf8_unicode_ci NOT NULL,
  `health_or_medical` text COLLATE utf8_unicode_ci NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `title`, `feature_img`, `description`, `content`, `destination`, `time`, `cost`, `quality`, `nature`, `religious`, `adventure`, `health_or_medical`, `latitude`, `longitude`) VALUES
(1, 'place1', 'http://localhost/img_dl/du-lich-da-nang.jpg', 'dsadsad', '<p>fnkcnnasacssd</p>\r\n<p>dasdsadasdsad</p>\r\n<p>dsadsad</p>\r\n<p>dsadasd</p>\r\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="http://localhost/img_dl/du-lich-da-nang.jpg" width="300" /></p>', 'dsadadsa', 3, 313446, 3, 'Khong co', 'Khong co', 'Khong co', 'Khong co', 10.3149, 106.172),
(2, 'dsadas', '', 'dsadsad', '<p>dasdsadasdasd <strong>dsadsadsadasd</strong> dsadasdas</p>\r\n<p style="text-align: center;">dsadasdasd</p>\r\n<p style="text-align: center;"><em>dsadsadsadsadsad</em></p>\r\n<p style="text-align: center;"><em><img src="http://images.landofnod.com/is/image/LandOfNod/Letter_Giant_Enough_A_231533_LL/$web_zoom$&amp;wid=550&amp;hei=550&amp;/130831065658/not-giant-enough-letter-a.jpg" alt="a" width="150" height="150" /></em></p>', 'dsadsad', 231, 321, 321, '3', '3', '3', '3', 0, 0),
(3, 'place 12', '', 'ewqeqwe', '<p>wqeqwe</p>', 'ewqeqw', 13, 213, 321, '3213', '321', '321', '32', 0, 0),
(5, 'ewd', '', 'wd', '<p>d</p>', 'd', 45, 4, 54, '5', '4', '45', '5', 0, 0),
(6, 'dsad', '', 'dsad', '<p>dsa</p>', 'dsad', 45, 45, 45, '454', '45', '5', '45', 0, 0),
(7, 'dsada', '', 'dsad', '<p>dsadad</p>', 'eqwe', 45, 4, 54, '54', '45', '5', '4', 0, 0),
(8, 'dsad', '', 'ds', '<p>ddsad</p>', 'dsada', 45, 3446450, 4, 'It', 'Tuong doi', 'Kha nhieu', 'Rat nhieu', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `place_vector`
--

CREATE TABLE IF NOT EXISTS `place_vector` (
  `id` int(11) NOT NULL,
  `time_short` float NOT NULL,
  `time_long` float NOT NULL,
  `cost_low` float NOT NULL,
  `cost_high` float NOT NULL,
  `quality_low` float NOT NULL,
  `quality_high` float NOT NULL,
  `nature_low` float NOT NULL,
  `nature_high` float NOT NULL,
  `adventure_low` float NOT NULL,
  `adventure_high` float NOT NULL,
  `religious_low` float NOT NULL,
  `religious_high` float NOT NULL,
  `health_or_medical_low` float NOT NULL,
  `health_or_medical_high` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `place_vector`
--

INSERT INTO `place_vector` (`id`, `time_short`, `time_long`, `cost_low`, `cost_high`, `quality_low`, `quality_high`, `nature_low`, `nature_high`, `adventure_low`, `adventure_high`, `religious_low`, `religious_high`, `health_or_medical_low`, `health_or_medical_high`) VALUES
(1, 1, -1, 1, -1, 0.5, 0.5, -1, 1, -1, 1, -1, 1, -1, 1),
(8, -0.5, 0.5, -1, 1, 0, 1, -0.5, 0.5, 0.5, -0.5, 0, 0, 1, -1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `feature_img` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `content`, `feature_img`) VALUES
(1, 'post dsadsadsa', 'dsadasdsad', '<p>dsadasdsadsadsad</p>\r\n<p>dsadsadad</p>', 'http://localhost/img_dl/du-lich-da-nang.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `range`
--

CREATE TABLE IF NOT EXISTS `range` (
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `value_1` float NOT NULL,
  `value_2` float NOT NULL,
  `value_3` float NOT NULL,
  `value_4` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `range`
--

INSERT INTO `range` (`name`, `value_1`, `value_2`, `value_3`, `value_4`) VALUES
('Time_short', 48, 36, 24, 12),
('Time_long', 12, 24, 36, 48),
('Cost_low', 3000000, 2500000, 2000000, 1500000),
('Cost_high', 500000, 1000000, 1500000, 2000000),
('Quality_low', 5, 4, 3, 2),
('Quality_high', 1, 2, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE IF NOT EXISTS `tours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `feature_img` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `destination` text COLLATE utf8_unicode_ci NOT NULL,
  `time` float NOT NULL,
  `cost` float NOT NULL,
  `quality` float NOT NULL,
  `nature` text COLLATE utf8_unicode_ci NOT NULL,
  `adventure` text COLLATE utf8_unicode_ci NOT NULL,
  `religious` text COLLATE utf8_unicode_ci NOT NULL,
  `health_or_medical` text COLLATE utf8_unicode_ci NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `title`, `feature_img`, `description`, `content`, `destination`, `time`, `cost`, `quality`, `nature`, `adventure`, `religious`, `health_or_medical`, `latitude`, `longitude`) VALUES
(1, 'tour 1', 'http://localhost/img_dl/du-lich-da-nang.jpg', 'ewqewqe', '<p>ewqewqeqwe</p>', 'eewqe', 23, 3213, 32141, 'Khong co', 'Khong co', 'Khong co', 'Khong co', 0, 0),
(2, 'tour 2', '', 'tour 2', '<p>tour 2tour 2tour 2tour 2tour 2tour 2</p>', 'tour 2tour 2tour 2tour 2tour 2', 23, 4124140, 2, 'Kha nhieu', 'Kha nhieu', 'It', 'Rat nhieu', 21.0742, 106.768);

-- --------------------------------------------------------

--
-- Table structure for table `tour_vector`
--

CREATE TABLE IF NOT EXISTS `tour_vector` (
  `id` int(11) NOT NULL,
  `time_short` float NOT NULL,
  `time_long` float NOT NULL,
  `cost_low` float NOT NULL,
  `cost_high` float NOT NULL,
  `quality_low` float NOT NULL,
  `quality_high` float NOT NULL,
  `nature_low` float NOT NULL,
  `nature_high` float NOT NULL,
  `adventure_low` float NOT NULL,
  `adventure_high` float NOT NULL,
  `religious_low` float NOT NULL,
  `religious_high` float NOT NULL,
  `health_or_medical_low` float NOT NULL,
  `health_or_medical_high` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tour_vector`
--

INSERT INTO `tour_vector` (`id`, `time_short`, `time_long`, `cost_low`, `cost_high`, `quality_low`, `quality_high`, `nature_low`, `nature_high`, `adventure_low`, `adventure_high`, `religious_low`, `religious_high`, `health_or_medical_low`, `health_or_medical_high`) VALUES
(1, 0.5, -0.5, 1, -1, -1, 1, -1, 1, -1, 1, -1, 1, -1, 1),
(2, 0.5, -0.5, -1, 1, 1, 0, 0.5, -0.5, 0.5, -0.5, -0.5, 0.5, 1, -1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
