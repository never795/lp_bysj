# Host: localhost  (Version: 5.5.53)
# Date: 2017-08-26 22:03:45
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "common"
#

DROP TABLE IF EXISTS `common`;
CREATE TABLE `common` (
  `common_ID` int(2) NOT NULL AUTO_INCREMENT,
  `now_addr` varchar(255) DEFAULT NULL,
  `worktime` varchar(255) DEFAULT NULL,
  `land` varchar(255) DEFAULT NULL,
  `jtkn` varchar(255) DEFAULT NULL,
  `knqk` varchar(255) DEFAULT NULL,
  `lset` varchar(255) DEFAULT NULL,
  `lslr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`common_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "dayi"
#

DROP TABLE IF EXISTS `dayi`;
CREATE TABLE `dayi` (
  `dy_id` int(2) NOT NULL AUTO_INCREMENT,
  `login_id` varchar(255) DEFAULT NULL,
  `consult` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `dy_time` varchar(255) DEFAULT NULL,
  `huifuzt` varchar(255) DEFAULT NULL,
  `dy_remarker` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`dy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "workerinfo"
#

DROP TABLE IF EXISTS `workerinfo`;
CREATE TABLE `workerinfo` (
  `workerinfo_ID` int(2) NOT NULL AUTO_INCREMENT,
  `common_id` varchar(255) NOT NULL DEFAULT '',
  `login_ID` varchar(255) NOT NULL DEFAULT '',
  `age` varchar(255) DEFAULT NULL,
  `huji_addr` varchar(255) DEFAULT NULL,
  `huji_xingzhi` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `date_birth` varchar(255) DEFAULT NULL,
  `zzmm` varchar(255) DEFAULT NULL,
  `edu` varchar(255) DEFAULT NULL,
  `buy_house` varchar(255) DEFAULT NULL,
  `build_house` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`workerinfo_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
