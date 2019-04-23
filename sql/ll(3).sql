-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2019-04-15 15:50:12
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ll`
--

-- --------------------------------------------------------

--
-- 表的结构 `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `CID` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(11) NOT NULL,
  `time` varchar(20) NOT NULL,
  `name` varchar(5) NOT NULL,
  `text` text NOT NULL,
  `connet` varchar(20) NOT NULL,
  `new` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=927 ;

--
-- 转存表中的数据 `chat`
--

INSERT INTO `chat` (`CID`, `phone`, `time`, `name`, `text`, `connet`, `new`) VALUES
(279, '15521140920', '2018-04-02  15:40', '刘帅', 'sd asd', 'admin', 1),
(280, '15521140920', '2018-04-02  17:20', '刘帅', 'ds asd', 'admin', 1),
(281, '15521140920', '2018-04-02  02:40', '刘帅', 'sd as das', 'admin', 1),
(282, '15521140920', '2018-04-02  20:40', '刘帅', 'das asd', 'admin', 1),
(283, '15521140920', '2018-04-02  57:40', '刘帅', 'ds asd asd', 'admin', 1),
(284, '15521140920', '2018-04-02  17:40', '刘帅', 'das dsa', 'admin', 1),
(889, '13076620138', '2018-04-12  17:50', '实大师', '23', 'admin', 1),
(890, '13076620138', '2018-04-12  17:50', '实大师', '是我', 'admin', 1),
(891, '13076620138', '2018-04-12  17:50', '实大师', '怎呀', 'admin', 1),
(896, '13076620138', '2018-04-12  19:52', '实大师', '3', 'admin', 1),
(907, 'admin', '2018-04-12  20:40', 'admin', '32', '13076620138', 1),
(908, '15917620138', '2018-04-12  20:53', '肥鸡', 'hi', 'admin', 1),
(909, 'admin', '2018-04-12  20:54', 'admin', 'hi', '15917620138', 1),
(910, 'admin', '2018-04-12  20:54', 'admin', '哈哈哈', '15917620138', 1),
(911, '15917620138', '2018-04-12  20:54', '肥鸡', '啥', 'admin', 1),
(912, 'admin', '2018-04-12  20:55', 'admin', '。。。', '15917620138', 1),
(913, '15917620138', '2018-04-12  20:57', '肥鸡', '？', 'admin', 1),
(914, 'admin', '2018-04-12  20:57', 'admin', '444', '15917620138', 1),
(915, 'sss', '2018-04-12  22:07', 'lue', '666', 'admin', 1),
(916, 'admin', '2018-04-12  22:07', 'admin', 'da diao ', 'sss', 1),
(917, 'sss', '2018-04-12  22:12', 'lue', '666666', 'admin', 1),
(920, '13415260025', '2018-04-20  17:01', '嘉嘉', '紧人', 'admin', 1),
(921, 'admin', '2018-04-20  17:01', 'admin', '，.', '13415260025', 1),
(925, 'admin', '2019-02-09  13:39', 'admin', '33', '15521140920', 1),
(926, '15521140920', '2019-02-10  00:40', '刘帅', '111', 'admin', 0);

-- --------------------------------------------------------

--
-- 表的结构 `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `phone` varchar(15) CHARACTER SET latin1 NOT NULL,
  `password` varchar(11) CHARACTER SET latin1 NOT NULL,
  `name` varchar(5) CHARACTER SET utf8mb4 NOT NULL,
  `regTime` varchar(20) CHARACTER SET latin1 NOT NULL,
  `lastLogin` varchar(20) CHARACTER SET latin1 NOT NULL,
  `gender` char(4) CHARACTER SET utf8mb4 NOT NULL,
  `add` varchar(30) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  `rename` varchar(15) NOT NULL,
  `rephone` varchar(20) NOT NULL,
  PRIMARY KEY (`phone`),
  UNIQUE KEY `phone` (`phone`),
  FULLTEXT KEY `add` (`add`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `customer`
--

INSERT INTO `customer` (`phone`, `password`, `name`, `regTime`, `lastLogin`, `gender`, `add`, `admin`, `rename`, `rephone`) VALUES
('11111111111', '769589', '滴滴点点', '2018-04-12', '2018-04-12', '男', '的点点滴滴', 0, '', '123777'),
('12345678910', '23237878', '大肥', '2018-03-27', '2018-03-27', '女', '', 0, '', ''),
('13076620138', '123123123', '实大师', '2018-03-25', '2018-04-12', '男', 'SFFFFF', 0, '', ''),
('13415260025', '047579', '嘉嘉', '2018-04-20', '2018-04-20', '女', '东城', 0, '', ''),
('13542477585', 'o680306', '欧文光', '2018-03-17', '2018-03-17', '男', '三角', 0, '', ''),
('15521140920', '23237878', '刘帅', '2018-03-17', '2019-02-10', '男', '北区11栋', 0, '刘先生', '1551140920'),
('15521140921', '123123', '测试', '2018-04-12', '2018-04-12', '男', '不告诉你', 0, '', ''),
('18825154025', '123456', '大哥', '2018-07-20', '2018-07-20', '男', '广州', 0, '', ''),
('18926647322', '23237878', 'han', '2019-01-29', '2019-01-29', '女', '123', 0, 'han', '18926647322'),
('admin', '23237878', 'admin', '0000-00-00', '2019-02-14', '', '', 1, '', ''),
('sss', '123456', 'lue', '2018-03-18', '2018-04-12', '男', '', 0, '', '');

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `GID` varchar(11) NOT NULL,
  `GName` varchar(15) NOT NULL,
  `GDescription` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `GPrice` float NOT NULL,
  `Gimg` varchar(100) NOT NULL,
  `Gindex` varchar(100) NOT NULL,
  `online` int(11) NOT NULL,
  `updatetime` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`GID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`GID`, `GName`, `GDescription`, `type`, `GPrice`, `Gimg`, `Gindex`, `online`, `updatetime`, `stock`) VALUES
('G01', '海鲜汤', '冬阴功海鲜汤', '海鲜', 12.5, '2019020218foot.jpg', '#', 1, '2019-02-06 14:47:40', 6),
('G02', '牛扒', '菲力牛排', '扒类', 0.01, '2019020257niu.jpg', '#', 1, '2019-02-02 09:10:14', 1),
('G03', '意大利面', '可搭配白汁黑汁', '主食', 999.99, '2019020250timg.jpg', '#', 1, '2019-02-02 09:10:16', 3);

-- --------------------------------------------------------

--
-- 表的结构 `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `phone` varchar(15) NOT NULL,
  `name` varchar(5) NOT NULL,
  `add` varchar(30) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `total` varchar(10) NOT NULL,
  `date` char(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'undo',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `order`
--

INSERT INTO `order` (`ID`, `phone`, `name`, `add`, `detail`, `total`, `date`, `status`) VALUES
(1, '15521140920', '刘帅', '北区11栋', '商品:海鲜汤X1;', '13', '20190202152637', 'undo'),
(2, '15521140920', '刘帅', '北区11栋', '商品:意大利面X1;商品:牛扒X1;', '1000', '20190202152658', 'undo');

-- --------------------------------------------------------

--
-- 表的结构 `web_info`
--

CREATE TABLE IF NOT EXISTS `web_info` (
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `banner` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL,
  `updatetime` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `web_info`
--

INSERT INTO `web_info` (`name`, `banner`, `status`, `updatetime`) VALUES
('BigDeeShop', 'bing-1.jpg', 0, '2019-02-10 07:21:17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
