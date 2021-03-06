-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-11-26 03:23:16
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yumipeng`
--

-- --------------------------------------------------------

--
-- 表的结构 `yumi_admin`
--

CREATE TABLE IF NOT EXISTS `yumi_admin` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(11) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `project` varchar(30) NOT NULL,
  `power` varchar(20) NOT NULL,
  `logintime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `yumi_admin`
--

INSERT INTO `yumi_admin` (`id`, `admin_name`, `admin_email`, `admin_password`, `project`, `power`, `logintime`) VALUES
(1, '代明球', '2516544071@qq.com', 'Dailab123456', '代明球组', '超级管理员', '0000-00-00 00:00:00'),
(2, '严建兵', 'yjianbing@mail.hzau.edu.cn', '123456', '严建兵组', '普通管理员', '0000-00-00 00:00:00'),
(4, '张祖新', 'zuxinzhang@mail.hzau.edu.cn', '123456', '张祖新组', '普通管理员', '0000-00-00 00:00:00'),
(5, '杨芳', 'fyang@mail.hzau.edu.cn', '123456', '杨芳组', '普通管理员', '0000-00-00 00:00:00'),
(6, '赖志兵', 'zhibing@mail.hzau.edu.cn', '123456', '赖志兵组', '普通管理员', '0000-00-00 00:00:00'),
(8, '张方东', 'fdzhang@mail.hzau.edu.cn', '123456', '张方东组', '普通管理员', '0000-00-00 00:00:00'),
(9, '李林', 'hzaulilin@mail.hzau.edu.cn', 'cau@981920', '李林组', '普通管理员', '0000-00-00 00:00:00'),
(10, '李青', 'qingli@mail.hzau.edu.cn', '123456', '李青组', '普通管理员', '0000-00-00 00:00:00'),
(11, '卓琳', 'zhuolin1988@qq.com', 'zhuolin1988@qq.com', '严建兵组', '普通管理员', '0000-00-00 00:00:00'),
(16, '郭峰', '964534239@qq.com', '123456', '网络维护', '超级管理员', '0000-00-00 00:00:00'),
(20, '邱法展', 'qiufazhan@mail.hzau.edu.cn', '123456', '邱法展组', '普通管理员', '0000-00-00 00:00:00'),
(19, '岳兵', 'yuebing@mail.hzau.edu.cn', '123456', '岳兵组', '普通管理员', '0000-00-00 00:00:00'),
(17, '代明球老师', 'mingqiudai@mail.hzau.edu.cn', '123456', '代明球组', '普通管理员', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `yumi_corn`
--

CREATE TABLE IF NOT EXISTS `yumi_corn` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) CHARACTER SET utf8 NOT NULL,
  `project` varchar(20) CHARACTER SET utf8 NOT NULL,
  `corn` int(1) NOT NULL,
  `line` int(5) NOT NULL,
  `date1` date NOT NULL,
  `date2` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `yumi_form`
--

CREATE TABLE IF NOT EXISTS `yumi_form` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `landindex` int(10) NOT NULL,
  `booking_student` varchar(20) NOT NULL,
  `tutor` varchar(20) NOT NULL,
  `project` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `book_time` date NOT NULL,
  `end_time` date NOT NULL,
  `pass_time` date DEFAULT NULL,
  `sub_time` date NOT NULL,
  `form_state` int(1) NOT NULL DEFAULT '0',
  `time` int(5) NOT NULL,
  `needclear` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- 转存表中的数据 `yumi_form`
--

INSERT INTO `yumi_form` (`id`, `landindex`, `booking_student`, `tutor`, `project`, `content`, `book_time`, `end_time`, `pass_time`, `sub_time`, `form_state`, `time`, `needclear`) VALUES
(27, 13, '吴锦峰', '代明球老师', '代明球组', '关联群体深播，表型实验', '2017-09-28', '2017-10-28', '2017-10-20', '2017-09-28', 3, 2, 2),
(17, 2, '金如昌', '张方东', '张方东组', '产量转基因材料移栽，繁种', '2017-10-01', '2018-01-31', '2017-10-19', '2017-09-20', 2, 9, 0),
(26, 12, '吴锦峰', '代明球老师', '代明球组', '关联群体深播，表型实验', '2017-09-28', '2017-10-28', '2017-10-20', '2017-09-28', 3, 2, 2),
(25, 11, '吴锦峰', '代明球老师', '代明球组', '关联群体深播，表型实验', '2017-09-28', '2017-10-28', '2017-10-20', '2017-09-28', 3, 2, 2),
(23, 11, '李文明', '岳兵', '岳兵组', '玉米转化材料阳性单株鉴定以及功能分析', '2017-11-01', '2018-01-31', '2017-10-20', '2017-09-28', 2, 7, 0),
(22, 10, '李文明', '岳兵', '岳兵组', '玉米CMS恢复基因转化阳性单株鉴定，以及与不同不育系间进行杂交授粉。', '2017-11-01', '2018-01-31', '2017-10-19', '2017-09-28', 2, 7, 0),
(12, 15, '吴锦峰', '代明球老师', '代明球组', '玉米关联群体，深播表型实验', '2017-09-20', '2017-10-20', '2017-10-19', '2017-09-19', 3, 2, 2),
(13, 16, '吴锦峰', '代明球老师', '代明球组', '玉米关联群体，深播表型实验', '2017-09-20', '2017-09-20', '2017-10-19', '2017-09-19', 2, 0, 0),
(14, 17, '吴锦峰', '代明球老师', '代明球组', '玉米关联群体，深播表型实验', '2017-09-20', '2017-10-20', '2017-10-19', '2017-09-19', 3, 2, 2),
(24, 10, '吴锦峰', '代明球老师', '代明球组', '关联群体深播，表型实验', '2017-09-28', '2017-10-28', '2017-10-20', '2017-09-28', 3, 2, 2),
(18, 3, '金如昌', '张方东', '张方东组', '产量转基因材料移栽，繁种', '2017-10-01', '2018-01-31', '2017-10-19', '2017-09-20', 2, 9, 0),
(19, 8, '金如昌', '张方东', '张方东组', '产量转基因材料移栽，繁种', '2017-10-01', '2018-01-31', '2017-10-19', '2017-09-20', 2, 9, 0),
(20, 9, '金如昌', '张方东', '张方东组', '产量转基因材料移栽，繁种', '2017-10-01', '2018-01-31', '2017-10-19', '2017-09-20', 2, 9, 0),
(32, 27, '伍玺', '代明球老师', '代明球组', '玉米干旱实验，用于干旱条件下玉米花期性状考察。', '2017-10-20', '2017-11-01', '2017-10-20', '2017-10-19', 2, 1, 1),
(28, 14, '吴锦峰', '代明球老师', '代明球组', '关联群体深播，表型实验', '2017-09-28', '2017-10-28', '2017-10-20', '2017-09-28', 3, 2, 2),
(30, 16, '吴锦峰', '代明球老师', '代明球组', '关联群体深播，表型实验', '2017-09-28', '2017-10-28', '2017-10-20', '2017-09-28', 3, 2, 2),
(38, 13, '姜程淋', '严建兵', '严建兵组', '用盆种植CRISPR编辑后的植株', '2017-11-15', '2018-03-15', '2017-11-20', '2017-11-13', 2, 8, 0),
(37, 14, '钱佳', '李林', '李林组', ' 材料取样，用于RNA抽取及测序', '2017-12-01', '2017-12-15', NULL, '2017-11-09', 0, 1, 0),
(36, 17, '王宏泽', '赖志兵', '赖志兵组', '南方锈病病原菌的接种', '2017-11-10', '2018-02-01', '2017-11-09', '2017-11-01', 2, 6, 0),
(39, 12, '姜程淋', '严建兵', '严建兵组', '用盆种植CRISPR编辑后的玉米', '2017-11-15', '2018-03-15', '2017-11-20', '2017-11-13', 2, 8, 0),
(40, 6, '吴锦峰', '代明球老师', '代明球组', '玉米DRAG转基因材料种植，繁种', '2017-11-21', '2018-03-21', '2017-11-20', '2017-11-20', 2, 8, 0),
(41, 7, '吴锦峰', '代明球老师', '代明球组', '玉米DRAG转基因材料种植，繁种', '2017-11-21', '2018-03-21', '2017-11-20', '2017-11-20', 2, 8, 0);

-- --------------------------------------------------------

--
-- 表的结构 `yumi_land`
--

CREATE TABLE IF NOT EXISTS `yumi_land` (
  `landname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- 转存表中的数据 `yumi_land`
--

INSERT INTO `yumi_land` (`landname`, `index`, `state`) VALUES
('晒场', 1, 0),
('加温1-1', 2, 2),
('加温1-2', 3, 2),
('加温2-1', 4, 0),
('加温2-2', 5, 0),
('加温3-1', 6, 2),
('加温3-2', 7, 2),
('加温4-1', 8, 2),
('加温4-2', 9, 2),
('加温5-1', 10, 2),
('加温5-2', 11, 2),
('加温6-1', 12, 2),
('加温6-2', 13, 2),
('加温7-1', 14, 1),
('加温7-2', 15, 0),
('加温8-1', 16, 2),
('加温8-2', 17, 2),
('旱棚A', 18, 0),
('旱棚B', 19, 1),
('旱棚C', 20, 0),
('旱棚D', 21, 0),
('旱棚E', 22, 0),
('旱棚F', 23, 0),
('旱棚G', 24, 0),
('旱棚H', 25, 0),
('棚1', 26, 0),
('温棚1-1', 27, 2),
('温棚1-2', 28, 0),
('温棚1-3', 29, 0),
('温棚1-4', 30, 0),
('温棚2-1', 31, 0),
('温棚2-2', 32, 0),
('温棚2-3', 33, 0),
('温棚2-4', 34, 0),
('温棚3-1', 35, 0),
('温棚3-2', 36, 0),
('温棚3-3', 37, 0),
('温棚3-4', 38, 0),
('温棚4-1', 39, 0),
('温棚4-2', 40, 0),
('温棚4-3', 41, 0),
('温棚4-4', 42, 0),
('温棚5-1', 43, 0),
('温棚5-2', 44, 0),
('温棚5-3', 45, 0),
('温棚5-4', 46, 0),
('温棚6-1', 47, 0),
('温棚6-2', 48, 0),
('温棚6-3', 49, 0),
('温棚6-4', 50, 0),
('温棚7-1', 51, 0),
('温棚7-2', 52, 0),
('温棚7-3', 53, 0),
('温棚7-4', 54, 0),
('温棚8-1', 55, 0),
('温棚8-2', 56, 0),
('温棚8-3', 57, 0),
('温棚8-4', 58, 0);

-- --------------------------------------------------------

--
-- 表的结构 `yumi_student`
--

CREATE TABLE IF NOT EXISTS `yumi_student` (
  `id` varchar(13) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `regtime` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `tutor` varchar(20) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yumi_student`
--

INSERT INTO `yumi_student` (`id`, `password`, `tel`, `email`, `regtime`, `username`, `tutor`, `level`) VALUES
('2016301010032', 'lmfccf921027', '18771062657', '630983051@qq.com', '2017-10-07', '李曼菲', '张祖新', 1),
('2016304010078', '180850', '13119042647', '252931257@qq.com', '2017-09-17', '陈果', '李青', 2),
('2014304200531', '6234355', '13349880875', '1206965632@qq.com', '2017-09-17', '李旻祺', '李青', 2),
('2015304110144', '060515', '15007123586', 'fdmhx@qq.com', '2017-09-17', '闵浩轩', '赖志兵', 2),
('2016304010042', 'ga5151312', '13387608803', '524321041@qq.com', '2017-09-17', '王宏泽', '赖志兵', 2),
('2015304110142', '412046725', '13397103993', '412046725@qq.com', '2017-09-17', '戴沙', '严建兵', 2),
('2016301010017', '200930010301cmj', '13163236191', '1830525122@qq.com', '2017-09-17', '蔡曼君', '邱法展', 2),
('2015304110077', '941120', '15623553969', '1666041847@qq.com', '2017-09-17', '李文明', '岳兵', 2),
('2017304010036', 'qw1992', '15827450350', 'wujinfeng@webmail.hz', '2017-09-19', '吴锦峰', '代明球老师', 2),
('2017304110163', 'liudi19940820', '13280913176', '524607112@qq.com', '2017-09-18', '刘迪', '赖志兵', 2),
('2017301110069', '141217', '18163135562', '2404016393@qq.com', '2017-09-18', '盛煌俊', '杨芳', 2),
('2014304200526', '61656923800', '15527579582', '616569238@qq.com', '2017-09-18', '阚秋馨', '李青', 2),
('2017304110067', 'x,q199311', '15271949465', 'xuqiang825491332@vip', '2017-09-18', '许强', '李青', 2),
('2017301110004', '199531', '13083319563', '755948439@qq.com', '2017-09-19', '金如昌', '张方东', 2),
('2017301010044', '111266777', '15623408734', 'qianjiapingxu@126.co', '2017-09-18', '钱佳', '李林', 2),
('2016304110126', '10yu7312', '15871812470', '1329532528@qq.com', '2017-09-19', '杨千惠', '赖志兵', 1),
('2017304110058', 'wuxi217817', '13296648163', '1596657681@qq.com', '2017-09-20', '伍玺', '代明球老师', 2),
('2015301110090', 'liangkun1991', '13429826931', 'kl353739@126.com', '2017-09-21', '梁昆', '邱法展', 1),
('2016301110117', '123456', '18207790807', '2862723184@qq.com', '2017-09-25', '赵海亮', '邱法展', 1),
('2016304010041', 'sxp123', '18605461869', '806289014@qq.com', '2017-09-26', '孙霄鹏', '代明球老师', 2),
('2016301110049', 'q82910439q', '18064086989', '1051715471@qq.com', '2017-10-19', '李盼', '杨芳', 1),
('2015317200617', '123456', '13294157429', '964534239@qq.com', '2017-10-20', '郭小峰', '代明球老师', 2),
('2017301010038', 'zr19921112', '13554676220', '562555360@qq.com', '2017-11-03', '赵然', '张祖新', 1),
('2017304110060', 'jiangcl1994', '1359424153', '250232456@qq.com', '2017-11-10', '姜程淋', '严建兵', 2);

-- --------------------------------------------------------

--
-- 表的结构 `yumi_teacher`
--

CREATE TABLE IF NOT EXISTS `yumi_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `landname` varchar(10) CHARACTER SET utf8 NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `index` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `yumi_teacher`
--

INSERT INTO `yumi_teacher` (`id`, `landname`, `name`, `index`) VALUES
(1, '加温1', '岳兵', '2|3'),
(2, '加温2', '邱法展', '4|5'),
(3, '加温3', '严建兵', '6|7'),
(4, '加温4', '李林', '8|9'),
(5, '加温5', '杨芳', '10|11'),
(6, '加温6', '张祖新', '12|13'),
(7, '加温7', '张东方', '14|15'),
(8, '加温8', '赖志兵', '16|17'),
(11, '日光棚', '代明球', '18|19|20|21|22|23|24|25|27|28|29|30|31|32|33|34|35|36|37|38|39|40|41|42|43|44|45|46|47|48|49|50|51|52|53|54|55|56|57|58'),
(12, '晒场', '李青', '1'),
(13, '棚1', '李青', '26');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
