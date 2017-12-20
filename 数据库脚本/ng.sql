

DROP TABLE IF EXISTS `ng_info`;

CREATE TABLE `ng_info` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ng_name` varchar(255) DEFAULT '姓名' COMMENT '姓名',
  `ng_sex` varchar(255) DEFAULT NULL COMMENT '性别',
  `ng_phone` varchar(255) DEFAULT '' COMMENT '电话号码',
  `ng_card` varchar(255) DEFAULT '' COMMENT '证件号码',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='农民基本信息';




DROP TABLE IF EXISTS `ng_ext`;

CREATE TABLE `ng_ext` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ng_id` varchar(255) DEFAULT '' COMMENT '农民基本信息ID',
  `card_nummber` varchar(255) DEFAULT '' COMMENT '身份证',
  `month_salary` varchar(255) DEFAULT '' COMMENT '月收入',
  `boy_number` varchar(255) DEFAULT NULL COMMENT '男孩子',
  `girl_number` varchar(255) DEFAULT NULL COMMENT '女孩数量',
  `old_persion` varchar(255) DEFAULT NULL COMMENT '老人数量',
  `is_sigle_famlay` varchar(255) DEFAULT NULL COMMENT '是否单亲家庭',
  `education` varchar(255) DEFAULT NULL COMMENT '受教育程度',
  `is_poor_famlay` varchar(255) DEFAULT NULL COMMENT '是否贫困家庭',
  `lan_number` varchar(255) DEFAULT NULL COMMENT '土地面积',
  `is_broken` varchar(255) DEFAULT NULL COMMENT '是否离异',
  `ng_is_yyhxgz` varchar(255) DEFAULT NULL COMMENT '是否意愿回乡工作',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='农民拓展信息表';




DROP TABLE IF EXISTS `ng_move`;

CREATE TABLE `ng_move` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `card_number` varchar(255) DEFAULT NULL COMMENT '身份证',
  `start_time` varchar(255) DEFAULT NULL COMMENT '开始时间',
  `end_time` varchar(255) DEFAULT NULL COMMENT '离开时间',
  `work_place` varchar(255) DEFAULT NULL COMMENT '工作地点',
  `wor_type` varchar(255) DEFAULT NULL COMMENT '工作性质',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='农民工流动信息表';

/*Data for the table `ng_move` */

/*Table structure for table `ng_work` */

DROP TABLE IF EXISTS `ng_work`;

CREATE TABLE `ng_work` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `car_number` varchar(255) DEFAULT NULL COMMENT '身份证号',
  `is_stable_work` varchar(255) DEFAULT NULL COMMENT '工作是否稳定',
  `work_time` varchar(255) DEFAULT NULL COMMENT '工作时长',
  `is_work_education` varchar(255) DEFAULT NULL COMMENT '是否接受过就业培训',
  `want_work` varchar(255) DEFAULT NULL COMMENT '想要从事工作',
  `now_work` varchar(255) DEFAULT NULL COMMENT '现在从事工作',
  `is_group_insurer` varchar(255) DEFAULT NULL COMMENT '是否购买团体保险',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='工作信息统计';
