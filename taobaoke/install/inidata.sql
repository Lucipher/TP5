-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-08-11 07:33:18
-- 服务器版本： 5.5.53
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sql`
--

-- --------------------------------------------------------

--
-- 表的结构 `tpt_banner`
--

CREATE TABLE IF NOT EXISTS `tpt_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic` varchar(100) DEFAULT NULL COMMENT '图片',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `links` varchar(100) DEFAULT NULL COMMENT '链接',
  `show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `endTime` varchar(11) NOT NULL COMMENT '结束时间',
  `identity` varchar(255) NOT NULL COMMENT '标识',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `tpt_banner`
--

INSERT INTO `tpt_banner` (`id`, `pic`, `endTime`, `title`, `links`, `show`, `identity`) VALUES
(1, '/upload/20170811/b2ebec2df27b99f479344b03a37327f2.jpg', '1533916800', '24小时热销榜', '#', 1, 'index-slide'),
(2, '/upload/20170811/70a2c96c3b5dafd9d96f3b04df711ec9.jpg', '1533916800', '先领券再购物', '#', 1, 'index-slide'),
(3, '/upload/20170811/ef7ebb44dc8e096e5bc103bc5be83a93.jpg', '1533916800', '热销品牌团', '#', 1, 'index-slide'),
(4, '/upload/20170811/6a28362e8a9ba22fc472014ee0f10964.jpg', '1533916800', '苏醒的乐园', '#', 1, 'index-banner'),
(5, '/upload/20170811/f62d67c98ba8f4dc66a0bd89dd5dbf64.jpg', '1533916800', '鞋柜', '#', 1, 'index-banner'),
(6, '/upload/20170811/55361ce3a6a5dba1ef27c638c6f67c86.jpg', '1533916800', '南极人', '#', 1, 'index-banner'),
(7, '/upload/20170811/3fc88fefa86d55bde7fa18252e210459.jpg', '1533916800', '戴尔', '#', 1, 'index-banner'),
(8, '/upload/20170811/5879e52468b608e3b28c65f1912b02b8.jpg', '1533916800', '爆款抢购', '#', 1, 'index-banner-last'),
(9, '/upload/20170811/89adfb23d1f50d36e49814e4513df64c.jpg', '1533916800', '粉丝狂欢节', '#', 1, 'top-banner'),
(10, '/upload/20170811/82a259412dce9365029fa1cc4e2d0d38.png', '1533916800', '淘宝客系统', '#', 1, 'forum-banner');

-- --------------------------------------------------------

--
-- 表的结构 `tpt_category`
--

CREATE TABLE IF NOT EXISTS `tpt_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL COMMENT '上级分类',
  `name` varchar(32) NOT NULL COMMENT '名称',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型',
  `open` tinyint(1) NOT NULL DEFAULT '1' COMMENT '开启',
  `show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `sort` int(11) NOT NULL DEFAULT '1' COMMENT '排序',
  `pic` varchar(255) NOT NULL COMMENT '图片',
  `time` varchar(32) NOT NULL COMMENT '时间',
  `keywords` varchar(100) NOT NULL COMMENT '关键词',
  `description` varchar(200) NOT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `tpt_category`
--

INSERT INTO `tpt_category` (`id`, `pid`, `name`, `type`, `open`, `show`, `sort`, `pic`, `time`, `keywords`, `description`) VALUES
(1, 0, '女装', 1, 1, 1, 1, '', '1492058517', '女装', '精选女装折扣商品，领取优惠券下单更优惠！'),
(2, 0, '男装', 1, 1, 1, 1, '', '1500974711', '男装', '精选男装折扣商品，领取优惠券下单更优惠！'),
(3, 0, '内衣', 1, 1, 1, 1, '', '1500974736', '内衣', '精选内衣折扣商品，领取优惠券下单更优惠！'),
(4, 0, '母婴', 1, 1, 1, 1, '', '1500974746', '母婴', '精选母婴折扣商品，领取优惠券下单更优惠！'),
(5, 0, '美妆', 1, 1, 1, 1, '', '1500974769', '美妆', '精选美妆个护折扣商品，领取优惠券下单更优惠！'),
(6, 0, '居家', 1, 1, 1, 1, '', '1500974785', '家居', '精选家居家装折扣商品，领取优惠券下单更优惠！'),
(7, 0, '鞋子', 1, 1, 1, 1, '', '1500974795', '鞋子', '精选鞋子折扣商品，领取优惠券下单更优惠！'),
(8, 0, '箱包', 1, 1, 1, 1, '', '1500974795', '箱包', '精选箱包折扣商品，领取优惠券下单更优惠！'),
(9, 0, '配饰', 1, 1, 1, 1, '', '1500974795', '配饰', '精选配饰折扣商品，领取优惠券下单更优惠！'),
(10, 0, '美食', 1, 1, 1, 1, '', '1500974848', '美食', '精选美食折扣商品，领取优惠券下单更优惠！'),
(11, 0, '电器', 1, 1, 1, 1, '', '1500974860', '电器', '精选数码家电折扣商品，领取优惠券下单更优惠！'),
(12, 0, '文体', 1, 1, 1, 1, '', '1500974860', '文体', '精选文体折扣商品，领取优惠券下单更优惠！'),
(13, 0, '运动', 1, 1, 1, 1, '', '1500974870', '运动', '精选运动折扣商品，领取优惠券下单更优惠！'),
(14, 0, '其它', 1, 1, 1, 1, '', '1500974881', '其它', '精选其它折扣商品，领取优惠券下单更优惠！');

-- --------------------------------------------------------

--
-- 表的结构 `tpt_comment`
--

CREATE TABLE IF NOT EXISTS `tpt_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '所属会员',
  `tid` int(11) NOT NULL COMMENT '所属帖子',
  `dlgid` bigint(20) unsigned DEFAULT NULL COMMENT '对话ID',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '评论采纳状态,[0=未采纳,1=已采纳]',
  `vcs` int(11) NOT NULL DEFAULT '0' COMMENT '投票数,可以为负',
  `upvcs` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '投票数,顶数',
  `dnvcs` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '投票数,踩数',
  `time` varchar(11) NOT NULL COMMENT '时间',
  `content` text NOT NULL COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tpt_forum`
--

CREATE TABLE IF NOT EXISTS `tpt_forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL COMMENT '上级分类',
  `name` varchar(32) NOT NULL COMMENT '名称',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型',
  `open` tinyint(1) NOT NULL DEFAULT '1' COMMENT '开启',
  `show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `sort` int(11) NOT NULL DEFAULT '1' COMMENT '排序',
  `pic` varchar(255) NOT NULL COMMENT '图片',
  `time` varchar(32) NOT NULL COMMENT '时间',
  `keywords` varchar(100) NOT NULL COMMENT '关键词',
  `description` varchar(200) NOT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tpt_forum`
--

INSERT INTO `tpt_forum` (`id`, `pid`, `name`, `type`, `open`, `show`, `sort`, `pic`, `time`, `keywords`, `description`) VALUES
(1, 0, '测试版块', 1, 1, 1, 1, '', '1492058517', '测试版块', '测试版块');

-- --------------------------------------------------------

--
-- 表的结构 `tpt_goods`
--

CREATE TABLE IF NOT EXISTS `tpt_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL COMMENT '所属分类',
  `uid` int(11) NOT NULL COMMENT '所属用户',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `pic` varchar(255) NOT NULL COMMENT '图片',
  `show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `choice` tinyint(1) NOT NULL DEFAULT '0' COMMENT '精选',
  `settop` tinyint(1) NOT NULL DEFAULT '0' COMMENT '置顶',
  `praise` varchar(11) NOT NULL DEFAULT '0' COMMENT '赞',
  `view` varchar(11) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `numIid` varchar(12) NOT NULL COMMENT '商品ID',
  `price` decimal(11,1) NOT NULL COMMENT '原价',
  `couponPrice` decimal(11,1) NOT NULL COMMENT '现价',
  `couponRate` int(11) NOT NULL COMMENT '折扣',
  `commission` decimal(11,2) NOT NULL COMMENT '佣金',
  `commissionRate` decimal(11,2) NOT NULL COMMENT '佣金率',
  `volume` int(11) NOT NULL COMMENT '30天销量',
  `nick` varchar(200) NOT NULL COMMENT '掌柜旺旺名',
  `sellerId` varchar(200) NOT NULL COMMENT '卖家id',
  `clickUrl` text COMMENT '推广链接',
  `taoToken` text COMMENT '淘口令',
  `couponAmount` decimal(11,0) NOT NULL COMMENT '优惠卷',
  `couponTotalcount` varchar(11) NOT NULL COMMENT '优惠券总量',
  `couponRemaincount` varchar(11) NOT NULL COMMENT '优惠券剩余量',
  `emsType` tinyint(1) NOT NULL DEFAULT '0' COMMENT '包邮，0表不包邮，1表示包邮',
  `userType` tinyint(1) NOT NULL DEFAULT '0' COMMENT '卖家类型，0表示集市，1表示商城,2表示京东',
  `dxjhType` tinyint(1) NOT NULL DEFAULT '0' COMMENT '定向计划，0表示不是或是但已申请通过，1表示是且未申请通过',
  `startTime` varchar(11) NOT NULL COMMENT '开始时间',
  `endTime` varchar(11) NOT NULL COMMENT '结束时间',
  `reply` varchar(11) NOT NULL DEFAULT '0' COMMENT '回复',
  `keywords` varchar(255) NOT NULL COMMENT '关键词',
  `description` varchar(200) NOT NULL COMMENT '描述',
  `content` text NOT NULL COMMENT '内容',
  PRIMARY KEY (`id`),
  UNIQUE KEY `numIid` (`numIid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tpt_links`
--

CREATE TABLE IF NOT EXISTS `tpt_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL COMMENT '名称',
  `links` varchar(255) NOT NULL COMMENT '链接',
  `time` varchar(32) NOT NULL COMMENT '时间',
  `pic` varchar(255) NOT NULL COMMENT '图片',
  `show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tpt_links`
--

INSERT INTO `tpt_links` (`id`, `name`, `links`, `time`, `pic`, `show`) VALUES
(1, '影子淘宝客', 'www.yingzit.cn', '2737757460', '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `tpt_member`
--

CREATE TABLE IF NOT EXISTS `tpt_member` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `qq_openid` varchar(255) NOT NULL COMMENT 'QQ授权ID',  
  `point` int(11) NOT NULL DEFAULT '0' COMMENT '积分',
  `userip` varchar(32) NOT NULL COMMENT 'IP',
  `username` varchar(32) NOT NULL COMMENT '名称',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `kouling` varchar(32) NOT NULL COMMENT '口令',
  `userhead` varchar(255) NOT NULL COMMENT '头像',
  `usermail` varchar(32) NOT NULL COMMENT '邮箱',
  `regtime` varchar(32) NOT NULL COMMENT '注册时间',
  `grades` tinyint(1) NOT NULL DEFAULT '0' COMMENT '等级',
  `sex` tinyint(1) NOT NULL DEFAULT '1' COMMENT '性别',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '验证',
  `userhome` varchar(32) NOT NULL COMMENT '家乡',
  `description` varchar(200) NOT NULL COMMENT '描述',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `tpt_member`
--

INSERT INTO `tpt_member` (`userid`, `qq_openid`, `point`, `userip`, `username`, `password`, `kouling`, `userhead`, `usermail`, `regtime`, `grades`, `sex`, `status`, `userhome`, `description`) VALUES
(1, '', 276, '127.0.0.1', 'admin', '49ba59abbe56e057', '123456', '/public/img/user-default.png', '421199319@qq.com', '1491037613', 1, 1, 1, '', ''),
(2, '', 10, '127.0.0.1', '小魔方', '3dc968a46acee025', '', '/public/img/user-default.png', '123456@qq.com', '1491037613', 0, 1, 1, '', ''),
(3, '', 0, '127.0.0.1', '第一把菜刀', '3dc968a46acee025', '', '/public/img/user-default.png', '5612561@qq.com', '1492681025', 0, 1, 1, '', ''),
(4, '', 0, '127.0.0.1', 'SMALL', '3dc968a46acee025', '', '/public/img/user-default.png', '145151@qq.com', '1492681089', 0, 1, 1, '', ''),
(5, '', 0, '127.0.0.1', '颠三倒四', '3dc968a46acee025', '', '/public/img/user-default.png', '816613@qq.com', '1492681226', 0, 1, 1, '', ''),
(6, '', 0, '127.0.0.1', 'huason', '3dc968a46acee025', '', '/public/img/user-default.png', '546166@qq.com', '1492681252', 0, 1, 1, '', ''),
(7, '', 0, '127.0.0.1', 'chenug', '3dc968a46acee025', '', '/public/img/user-default.png', '651142@qq.com', '1492681275', 0, 1, 1, '', ''),
(8, '', 0, '127.0.0.1', '潜心', '3dc968a46acee025', '', '/public/img/user-default.png', '518923@qq.com', '1492681303', 0, 1, 1, '', ''),
(9, '', 0, '127.0.0.1', '仰望星空599', '3dc968a46acee025', '', '/public/img/user-default.png', '481561@qq.com', '1492681321', 0, 1, 1, '', ''),
(10, '', 0, '127.0.0.1', '我擦这么菜', '3dc968a46acee025', '', '/public/img/user-default.png', '5155615@qq.com', '1492681338', 0, 1, 1, '', ''),
(11, '', 5, '127.0.0.1', '蜗牛', '3dc968a46acee025', '', '/public/img/user-default.png', '189561@qq.com', '1492681364', 0, 1, 1, '', ''),
(12, '', 0, '127.0.0.1', '艳阳', '3dc968a46acee025', '', '/public/img/user-default.png', '415615@qq.com', '1492760861', 0, 1, 0, '', ''),
(13, '', 0, '127.0.0.1', '极品K', '3dc968a46acee025', '', '/public/img/user-default.png', '815521@qq.com', '1492760928', 0, 1, 0, '', '');

-- --------------------------------------------------------

--
-- 表的结构 `tpt_nav`
--

CREATE TABLE IF NOT EXISTS `tpt_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL COMMENT '上级分类',
  `name` varchar(32) NOT NULL COMMENT '名称',
  `links` varchar(255) NOT NULL COMMENT '链接',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型,1代表PC站，2代表WAP站',
  `target` tinyint(1) NOT NULL DEFAULT '0' COMMENT '打开方式,0代表现窗口打开，1代表新窗口打开',
  `show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `sort` int(11) NOT NULL DEFAULT '1' COMMENT '排序',
  `pic` varchar(255) NOT NULL COMMENT '图片',
  `alias` varchar(20) NOT NULL COMMENT '别名',
  `identity` varchar(255) NOT NULL COMMENT '调用标识',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `tpt_nav`
--

INSERT INTO `tpt_nav` (`id`, `pid`, `name`, `links`, `type`, `target`, `show`, `sort`, `pic`, `alias`, `identity`) VALUES
(1, 0, '优惠直播', '#', 1, 0, 0, 999, '', 'live', 'top'),
(2, 0, '9.9包邮', '/jiu.html', 1, 0, 1, 999, '', 'jiu', 'main'),
(3, 0, '20元封顶', '/shijiu.html', 1, 0, 1, 999, '', 'shijiu', 'main'),
(4, 0, '优惠直播', '/live.html', 1, 0, 1, 999, '', 'live', 'main'),
(5, 0, '论坛社区', '/forum.html', 1, 1, 1, 999, '', 'forum', 'main'),
(6, 0, '我的足迹', '/history.html', 1, 0, 1, 999, '', 'history', 'main'),
(7, 0, '9.9包邮', '/jiu.html', 2, 0, 1, 999, '/upload/20170823/069769aab905c8d1d1dd218bb838e5a1.png', 'jiu', 'main'),
(8, 0, '20元包邮', '/shijiu.html', 2, 0, 1, 999, '/upload/20170823/4cf1b99b1b5b897a33e26492b3e9e28c.png', 'shijiu', 'main'),
(9, 0, '爆款疯抢', '/hot.html', 2, 0, 1, 999, '/upload/20170823/cdb8650ac1e1c457af9cb4fb1d80b5b3.png', 'hot', 'main'),
(10, 0, '优惠直播', '/live.html', 2, 0, 1, 999, '/upload/20170823/e8c1e93a6c917c34c5f9b9f97167eef6.png', 'live', 'main');

-- --------------------------------------------------------

--
-- 表的结构 `tpt_robotalimama`
--

CREATE TABLE IF NOT EXISTS `tpt_robotalimama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL COMMENT '入库分类',
  `name` varchar(200) NOT NULL COMMENT '采集器名称',
  `keyword` varchar(255) NOT NULL COMMENT '关键词',
  `catIds` varchar(20) NOT NULL COMMENT '分类',
  `page` int(11) NOT NULL COMMENT '采集页数',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型，1代表有优惠券，0代表不限',
  `sort` varchar(11) NOT NULL COMMENT '排序',
  `userType` varchar(11) NOT NULL COMMENT '卖家类型，b2c代表天猫，空代表不限',
  `startPrice` varchar(20) NOT NULL COMMENT '起始价',
  `endPrice` varchar(20) NOT NULL COMMENT '结束价',
  `startTkRate` varchar(5) NOT NULL COMMENT '起始佣金百分比',
  `endTkRate` varchar(5) NOT NULL COMMENT '结束佣金百分比',
  `startBiz30day` varchar(10) NOT NULL COMMENT '商品月销量',
  `freeShipment` varchar(10) NOT NULL COMMENT '包邮，1代表包邮，空代表不限',
  `npxType` tinyint(1) NOT NULL COMMENT '图片牛皮廯，1代表无，2代表轻微，空代表不限',
  `picQuality` tinyint(1) NOT NULL COMMENT '图片质量，1代表中，2代表高，空代表不限',
  `lastPage` int(11) DEFAULT '0' COMMENT '上次采集页数',
  `lastTime` varchar(11) NOT NULL COMMENT '上次采集时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `tpt_robotalimama`
--

INSERT INTO `tpt_robotalimama` (`id`, `cid`, `name`, `keyword`, `catIds`, `page`, `type`, `sort`, `userType`, `startPrice`, `endPrice`, `startTkRate`, `endTkRate`, `startBiz30day`, `freeShipment`, `npxType`, `picQuality`, `lastPage`, `lastTime`) VALUES
(1, 1, '女装', '女装', '', 1, 1, '', '', '', '', '5', '90', '', '', 0, 0, 0, ''),
(2, 2, '男装', '男装', '', 1, 1, '', '', '', '', '5', '90', '', '', 0, 0, 0, ''),
(3, 3, '内衣', '内衣', '', 1, 1, '', '', '', '', '5', '90', '', '', 0, 0, 0, ''),
(4, 4, '母婴', '母婴', '', 1, 1, '', '', '', '', '5', '90', '', '', 0, 0, 0, ''),
(5, 5, '美妆', '美妆', '', 1, 1, '', '', '', '', '5', '90', '', '', 0, 0, 0, ''),
(6, 6, '家居', '家居', '', 1, 1, '', '', '', '', '5', '90', '', '', 0, 0, 0, ''),
(7, 6, '家装', '家装', '', 1, 1, '', '', '', '', '5', '90', '', '', 0, 0, 0, ''),
(8, 6, '家具', '家具', '', 1, 1, '', '', '', '', '5', '90', '', '', 0, 0, 0, ''),
(9, 7, '鞋子', '鞋子', '', 1, 1, '', '', '', '', '5', '90', '', '', 0, 0, 0, ''),
(10, 8, '包', '包', '', 1, 1, '', '', '', '', '5', '90', '', '', 0, 0, 0, ''),
(11, 9, '饰品', '饰品', '', 1, 1, '', '', '', '', '5', '90', '', '', 0, 0, 0, ''),
(12, 10, '美食', '美食', '', 1, 1, '', '', '', '', '5', '90', '', '', 0, 0, 0, ''),
(13, 11, '数码', '数码', '', 1, 1, '', '', '', '', '5', '90', '', '', 0, 0, 0, ''),
(14, 11, '家电', '电', '', 1, 1, '', '', '', '', '5', '90', '', '', 0, 0, 0, ''),
(15, 12, '文体用品', '文体用品', '', 1, 1, '', '', '', '', '5', '90', '', '', 0, 0, 0, ''),
(16, 13, '运动', '运动', '', 1, 1, '', '', '', '', '5', '90', '', '', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `tpt_robotdtk`
--

CREATE TABLE IF NOT EXISTS `tpt_robotdtk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL COMMENT '入库分类',
  `name` varchar(200) NOT NULL COMMENT '采集器名称',
  `dtkcid` int(11) NOT NULL COMMENT '采集分类',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型，1代表有优惠券，0代表无优惠券',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `tpt_robotdtk`
--

INSERT INTO `tpt_robotdtk` (`id`, `cid`, `name`, `dtkcid`, `type`) VALUES
(1, 1, '女装', 1, 1),
(2, 2, '男装', 9, 1),
(3, 3, '内衣', 10, 1),
(4, 4, '母婴', 2, 1),
(5, 5, '化妆品', 3, 1),
(6, 6, '居家', 4, 1),
(7, 9, '鞋包配饰', 5, 1),
(8, 10, '美食', 6, 1),
(9, 12, '文体车品', 7, 1),
(10, 11, '数码家电', 8, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tpt_robotgaoyongjin`
--

CREATE TABLE IF NOT EXISTS `tpt_robotgaoyongjin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL COMMENT '入库分类',
  `name` varchar(200) NOT NULL COMMENT '采集器名称',
  `catIds` varchar(255) NOT NULL COMMENT '分类',
  `page` int(11) NOT NULL COMMENT '采集页数',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型，1代表有优惠券，0代表不限',
  `sort` varchar(11) NOT NULL COMMENT '排序',
  `userType` varchar(11) NOT NULL COMMENT '卖家类型，空代表不限，1代表天猫',
  `startPrice` varchar(20) NOT NULL COMMENT '起始价',
  `endPrice` varchar(20) NOT NULL COMMENT '结束价',
  `startTkRate` varchar(5) NOT NULL COMMENT '起始佣金百分比',
  `endTkRate` varchar(5) NOT NULL COMMENT '结束佣金百分比',
  `startBiz30day` varchar(10) NOT NULL COMMENT '商品月销量',
  `lastPage` int(11) DEFAULT '0' COMMENT '上次采集页数',
  `lastTime` varchar(11) NOT NULL COMMENT '上次采集时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `tpt_robotgaoyongjin`
--

INSERT INTO `tpt_robotgaoyongjin` (`id`, `cid`, `name`, `catIds`, `page`, `type`, `sort`, `userType`, `startPrice`, `endPrice`, `startTkRate`, `endTkRate`, `startBiz30day`, `lastPage`, `lastTime`) VALUES
(1, 1, '女装', '1&amp;level=1', 1, 1, '', '', '', '', '5', '90', '', 1, '1502624588'),
(2, 2, '男装', '2&amp;level=1', 1, 1, '', '', '', '', '5', '90', '', 1, '1502624589'),
(3, 3, '内衣', '9&amp;level=1', 1, 1, '', '', '', '', '5', '90', '', 1, '1502624590'),
(4, 7, '女鞋', '3%2C50006843&amp;level=2', 1, 1, '', '', '', '', '5', '90', '', 1, '1502624590'),
(5, 8, '包包', '3%2C50006842&amp;level=2', 1, 1, '', '', '', '', '5', '90', '', 1, '1502624591'),
(6, 7, '男鞋', '3%2C50011740&amp;level=2', 1, 1, '', '', '', '', '5', '90', '', 1, '1502624592'),
(7, 9, '配饰', '4&amp;level=1', 1, 1, '', '', '', '', '5', '90', '', 1, '1502624593'),
(8, 13, '运动', '5&amp;level=1', 1, 1, '', '', '', '', '5', '90', '', 1, '1502624594'),
(9, 5, '美妆', '6&amp;level=1', 1, 1, '', '', '', '', '5', '90', '', 1, '1502624595'),
(10, 4, '母婴', '7&amp;level=1', 1, 1, '', '', '', '', '5', '90', '', 1, '1502624595'),
(11, 10, '食品', '8&amp;level=1', 1, 1, '', '', '', '', '5', '90', '', 1, '1502624596'),
(12, 11, '数码', '10&amp;level=1', 1, 1, '', '', '', '', '5', '90', '', 1, '1502624597'),
(13, 6, '家装', '11&amp;level=1', 1, 1, '', '', '', '', '5', '90', '', 1, '1502624598'),
(14, 6, '家居', '12&amp;level=1', 1, 1, '', '', '', '', '5', '90', '', 1, '1502624599'),
(15, 11, '家电', '13&amp;level=1', 1, 1, '', '', '', '', '5', '90', '', 1, '1502624599'),
(16, 14, '汽车用品', '14&amp;level=1', 1, 1, '', '', '', '', '5', '90', '', 1, '1502624600'),
(17, 14, '生活服务', '15&amp;level=1', 1, 1, '', '', '', '', '5', '90', '', 1, '1502624601'),
(18, 14, '图书音像', '16&amp;level=1', 1, 1, '', '', '', '', '5', '90', '', 0, '1502624601'),
(19, 14, '游戏话费', '17&amp;level=1', 1, 1, '', '', '', '', '5', '90', '', 0, ''),
(20, 14, '其它', '64&amp;level=1', 1, 1, '', '', '', '', '5', '90', '', 0, '1502624767');

-- --------------------------------------------------------

--
-- 表的结构 `tpt_robothaoquan`
--

CREATE TABLE IF NOT EXISTS `tpt_robothaoquan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL COMMENT '入库分类',
  `name` varchar(200) NOT NULL COMMENT '采集器名称',
  `keyword` varchar(255) NOT NULL COMMENT '关键词',
  `page` int(11) NOT NULL COMMENT '采集页数',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型，1代表有优惠券，0代表无优惠券',
  `lastPage` int(11) DEFAULT '0' COMMENT '上次采集页数',
  `lastTime` varchar(11) NOT NULL COMMENT '上次采集时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `tpt_robothaoquan`
--

INSERT INTO `tpt_robothaoquan` (`id`, `cid`, `name`, `keyword`, `page`, `type`, `lastPage`, `lastTime`) VALUES
(1, 1, '女装', '女装', 2, 1, 0, '1501325867'),
(2, 3, '男装', '男装', 1, 1, 0, ''),
(3, 3, '内衣', '内衣', 1, 1, 0, ''),
(4, 4, '母婴', '母婴', 1, 1, 0, ''),
(5, 5, '美妆', '美妆', 1, 1, 0, ''),
(6, 6, '家居', '家居', 1, 1, 0, ''),
(7, 6, '家装', '家装', 1, 1, 0, ''),
(8, 6, '家具', '家具', 1, 1, 0, ''),
(9, 7, '鞋子', '鞋子', 1, 1, 0, ''),
(10, 8, '箱包', '包', 1, 1, 0, ''),
(11, 9, '饰品', '饰品', 1, 1, 0, ''),
(12, 10, '美食', '美食', 1, 1, 0, ''),
(13, 11, '数码', '数码', 1, 1, 0, ''),
(14, 11, '家电', '电', 1, 1, 0, ''),
(15, 12, '文体用品', '文体用品', 1, 1, 0, ''),
(16, 13, '运动', '运动', 1, 1, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `tpt_thread`
--

CREATE TABLE IF NOT EXISTS `tpt_thread` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL COMMENT '所属版块',
  `uid` int(11) NOT NULL COMMENT '所属用户',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `pic` varchar(255) NOT NULL COMMENT '图片',
  `show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `choice` tinyint(1) NOT NULL DEFAULT '0' COMMENT '精贴',
  `settop` tinyint(1) NOT NULL DEFAULT '0' COMMENT '置顶',
  `praise` varchar(11) NOT NULL COMMENT '赞',
  `view` varchar(11) NOT NULL COMMENT '浏览量',
  `time` varchar(11) NOT NULL COMMENT '时间',
  `reply` varchar(11) NOT NULL DEFAULT '0' COMMENT '回复',
  `secret` text COMMENT '隐藏的内容',
  `keywords` varchar(100) NOT NULL COMMENT '关键词',
  `description` varchar(200) NOT NULL COMMENT '描述',
  `content` text NOT NULL COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- 表的结构 `tpt_robotlanlan`
--

CREATE TABLE IF NOT EXISTS `tpt_robotlanlan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL COMMENT '入库分类',
  `name` varchar(200) NOT NULL COMMENT '采集器名称',
  `catIds` varchar(255) NOT NULL COMMENT '分类',
  `page` int(11) NOT NULL COMMENT '采集页数',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型，1代表有优惠券，0代表不限',
  `sort` varchar(11) NOT NULL COMMENT '排序',
  `userType` varchar(11) NOT NULL COMMENT '卖家类型，all代表不限，tmall代表天猫',
  `startPrice` varchar(20) NOT NULL COMMENT '起始价',
  `endPrice` varchar(20) NOT NULL COMMENT '结束价',
  `startCouponAmount` varchar(20) NOT NULL COMMENT '起始优惠券额',
  `endCouponAmount` varchar(20) NOT NULL COMMENT '结束优惠券额',
  `startTkRate` varchar(5) NOT NULL COMMENT '起始佣金百分比',
  `endTkRate` varchar(5) NOT NULL COMMENT '结束佣金百分比',
  `startBiz30day` varchar(10) NOT NULL COMMENT '商品月销量',
  `lastPage` int(11) DEFAULT '0' COMMENT '上次采集页数',
  `lastTime` varchar(11) NOT NULL COMMENT '上次采集时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `tpt_robotlanlan`
--

INSERT INTO `tpt_robotlanlan` (`id`, `cid`, `name`, `catIds`, `page`, `type`, `sort`, `userType`, `startPrice`, `endPrice`, `startCouponAmount`, `endCouponAmount`, `startTkRate`, `endTkRate`, `startBiz30day`, `lastPage`, `lastTime`) VALUES
(1, 1, '女装', '193', 1, 1, '17', 'all', '', '', '', '', '5', '90', '', 0, ''),
(2, 2, '男装', '195', 1, 1, '17', 'all', '', '', '', '', '5', '90', '', 0, ''),
(3, 3, '内衣', '307', 1, 1, '17', 'all', '', '', '', '', '5', '90', '', 0, ''),
(4, 7, '鞋包', '196', 1, 1, '17', 'all', '', '', '', '', '5', '90', '', 0, ''),
(5, 9, '饰品', '197', 1, 1, '17', 'all', '', '', '', '', '5', '90', '', 0, ''),
(6, 11, '手机数码', '198', 1, 1, '17', 'all', '', '', '', '', '5', '90', '', 0, ''),
(7, 5, '美妆', '199', 1, 1, '17', 'all', '', '', '', '', '5', '90', '', 0, ''),
(8, 10, '美食', '202', 1, 1, '17', 'all', '', '', '', '', '5', '90', '', 0, ''),
(9, 4, '母婴用品', '205', 1, 1, '17', 'all', '', '', '', '', '5', '90', '', 0, ''),
(10, 6, '百货', '206', 1, 1, '17', 'all', '', '', '', '', '5', '90', '', 0, ''),
(11, 14, '其它', '313', 1, 1, '17', 'all', '', '', '', '', '5', '90', '', 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `tpt_robothaodanku`
--

CREATE TABLE IF NOT EXISTS `tpt_robothaodanku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL COMMENT '入库分类',
  `name` varchar(200) NOT NULL COMMENT '采集器名称',
  `catIds` varchar(255) NOT NULL COMMENT '分类',
  `page` int(11) NOT NULL COMMENT '采集页数',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型，1代表有优惠券，0代表不限',
  `sort` varchar(11) NOT NULL COMMENT '排序',
  `userType` varchar(11) NOT NULL COMMENT '卖家类型，0代表不限，1代表天猫',
  `startPrice` varchar(20) NOT NULL COMMENT '起始价',
  `endPrice` varchar(20) NOT NULL COMMENT '结束价',
  `startBiz30day` varchar(10) NOT NULL COMMENT '商品月销量',
  `commission` varchar(10) NOT NULL COMMENT '佣金',
  `lastPage` int(11) DEFAULT '0' COMMENT '上次采集页数',
  `lastTime` varchar(11) NOT NULL COMMENT '上次采集时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `tpt_robothaodanku`
--

INSERT INTO `tpt_robothaodanku` (`id`, `cid`, `name`, `catIds`, `page`, `type`, `sort`, `userType`, `startPrice`, `endPrice`, `startBiz30day`, `commission`, `lastPage`, `lastTime`) VALUES
(1, 1, '女装', '1', 1, 1, '', '0', '', '', '', '', 0, ''),
(2, 2, '男装', '2', 1, 1, '', '0', '', '', '', '', 0, ''),
(3, 3, '内衣', '3', 1, 1, '', '0', '', '', '', '', 0, ''),
(4, 5, '美妆', '4', 1, 1, '', '0', '', '', '', '', 0, ''),
(5, 9, '饰品', '5', 1, 1, '', '0', '', '', '', '', 0, ''),
(6, 7, '鞋品', '6', 1, 1, '', '0', '', '', '', '', 0, ''),
(7, 8, '箱包', '7', 1, 1, '', '0', '', '', '', '', 0, ''),
(8, 4, '儿童', '8', 1, 1, '', '0', '', '', '', '', 0, ''),
(9, 4, '母婴', '9', 1, 1, '', '0', '', '', '', '', 0, ''),
(10, 6, '居家', '10', 1, 1, '', '0', '', '', '', '', 0, ''),
(11, 10, '美食', '11', 1, 1, '', '0', '', '', '', '', 0, ''),
(12, 11, '数码', '12', 1, 1, '', '0', '', '', '', '', 0, ''),
(13, 11, '家电', '13', 1, 1, '', '0', '', '', '', '', 0, ''),
(14, 14, '其它', '14', 1, 1, '', '0', '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `tpt_robotxuanpinku`
--

CREATE TABLE IF NOT EXISTS `tpt_robotxuanpinku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL COMMENT '入库分类',
  `name` varchar(200) NOT NULL COMMENT '选品组名称',
  `catIds` varchar(255) NOT NULL COMMENT '选品库ID',
  `page` int(11) NOT NULL DEFAULT '1' COMMENT '采集页数',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型，1代表有优惠券，0代表不限',
  `xpkType` tinyint(1) NOT NULL DEFAULT '1' COMMENT '选品库类型，1：普通类型，2高佣金类型',
  `platform` tinyint(1) NOT NULL DEFAULT '1' COMMENT '链接形式：1：PC，2：无线，默认：1',
  `lastPage` int(11) DEFAULT '0' COMMENT '上次采集页数',
  `lastTime` varchar(11) NOT NULL COMMENT '上次采集时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
