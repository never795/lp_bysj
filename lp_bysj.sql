# Host: localhost  (Version: 5.5.53)
# Date: 2017-09-30 23:37:17
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
  `card_number` varchar(255) DEFAULT NULL COMMENT '身份证',
  `month_salary` varchar(255) DEFAULT NULL COMMENT '月收入',
  PRIMARY KEY (`common_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

#
# Data for table "common"
#

/*!40000 ALTER TABLE `common` DISABLE KEYS */;
INSERT INTO `common` VALUES (1,NULL,NULL,'1200',NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,NULL,'2125',NULL,NULL,NULL,NULL,NULL,NULL),(3,NULL,NULL,'1302',NULL,NULL,NULL,NULL,NULL,NULL),(4,NULL,NULL,'5620',NULL,NULL,NULL,NULL,NULL,NULL),(5,NULL,NULL,'620',NULL,NULL,NULL,NULL,NULL,NULL),(6,NULL,NULL,'2354',NULL,NULL,NULL,NULL,NULL,NULL),(7,NULL,NULL,'1235',NULL,NULL,NULL,NULL,NULL,NULL),(8,NULL,NULL,'2152',NULL,NULL,NULL,NULL,NULL,NULL),(9,NULL,NULL,'1235',NULL,NULL,NULL,NULL,NULL,NULL),(10,NULL,NULL,'22354',NULL,NULL,NULL,NULL,NULL,NULL),(11,NULL,NULL,'5156',NULL,NULL,NULL,NULL,NULL,NULL),(12,NULL,NULL,'752',NULL,NULL,NULL,NULL,NULL,NULL),(13,NULL,NULL,'965',NULL,NULL,NULL,NULL,NULL,NULL),(14,NULL,NULL,'962',NULL,NULL,NULL,NULL,NULL,NULL),(15,NULL,NULL,'564',NULL,NULL,NULL,NULL,NULL,NULL),(16,NULL,NULL,'555',NULL,NULL,NULL,NULL,NULL,NULL),(17,NULL,NULL,'666',NULL,NULL,NULL,NULL,NULL,NULL),(18,NULL,NULL,'888',NULL,NULL,NULL,NULL,NULL,NULL),(19,NULL,NULL,'999',NULL,NULL,NULL,NULL,NULL,NULL),(20,NULL,NULL,'410',NULL,NULL,NULL,NULL,NULL,NULL),(21,NULL,NULL,'695',NULL,NULL,NULL,NULL,NULL,NULL),(22,NULL,NULL,'879',NULL,NULL,NULL,NULL,NULL,NULL),(23,NULL,NULL,'985',NULL,NULL,NULL,NULL,NULL,NULL),(24,NULL,NULL,'785',NULL,NULL,NULL,NULL,NULL,NULL),(25,NULL,NULL,'885',NULL,NULL,NULL,NULL,NULL,NULL),(26,NULL,NULL,'5542',NULL,NULL,NULL,NULL,NULL,NULL),(27,NULL,NULL,'4545',NULL,NULL,NULL,NULL,NULL,NULL),(28,NULL,NULL,'5242',NULL,NULL,NULL,NULL,NULL,NULL),(29,NULL,NULL,'4522',NULL,NULL,NULL,NULL,NULL,NULL),(30,NULL,NULL,'222',NULL,NULL,NULL,NULL,NULL,NULL),(31,NULL,NULL,'2214',NULL,NULL,NULL,NULL,NULL,NULL),(32,NULL,NULL,'221',NULL,NULL,NULL,NULL,NULL,NULL),(33,NULL,NULL,'2',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `common` ENABLE KEYS */;

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
# Data for table "dayi"
#

/*!40000 ALTER TABLE `dayi` DISABLE KEYS */;
/*!40000 ALTER TABLE `dayi` ENABLE KEYS */;

#
# Structure for table "lp_menu"
#

DROP TABLE IF EXISTS `lp_menu`;
CREATE TABLE `lp_menu` (
  `menu_Id` int(11) NOT NULL AUTO_INCREMENT,
  `lp_menu_name` varchar(255) DEFAULT NULL COMMENT '菜单名字',
  `lp_menu_post` varchar(255) DEFAULT NULL COMMENT '级联关系',
  `lp_menu_url` varchar(255) DEFAULT NULL COMMENT '菜单地址',
  `lp_menu_show` varchar(255) DEFAULT '1' COMMENT '是否显示',
  `lp_menu_ext` varchar(255) DEFAULT NULL COMMENT '拓展',
  PRIMARY KEY (`menu_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

#
# Data for table "lp_menu"
#

/*!40000 ALTER TABLE `lp_menu` DISABLE KEYS */;
INSERT INTO `lp_menu` VALUES (1,'用户管理','A',' ','1',NULL),(2,'添加用户','A_A','user/addUser.html','1',NULL),(3,'查看用户','A_B','user/lookUser.html','1',NULL),(4,'用户授权','A_C','#','1',NULL),(5,'资讯管理','B','#','1',NULL),(6,'添加资讯','B_A','#','1',NULL),(7,'查看资讯','B_B','#','1',NULL),(8,'测','B_B_A',NULL,'1',NULL),(9,'农民工信息管理','C',' ','1',NULL),(10,'查看','C_A','Ng/lookNg.html','1',NULL),(11,'修改','C_B','Ng/updateNg.html','1',NULL),(12,'添加角色','A_D','role/addRole.html','1',NULL),(13,'添加菜单','A_E','menu/addMenu.html','1',NULL),(14,'查看角色','A_F','role/lookRole.html','1',NULL),(15,'查看菜单','A_G','menu/lookMenu.html','1',NULL),(16,'区域平均工资','C_A_A','ng/lookSalary.html','1',NULL),(17,'baidu','H_A','https://www.baidu.com','1',NULL),(18,'baidu','H_A','https://www.baidu.com','1',NULL),(19,'baidu','H_A','https://www.baidu.com','1',NULL),(20,'HHH','E','jsdf','1',NULL),(21,'各省耕地总面积','C_A_B','ng/lookSumLan.html','1',NULL),(22,'各省耕地平均面积','C_A_C','ng/lookAvgLan.html','1',NULL);
/*!40000 ALTER TABLE `lp_menu` ENABLE KEYS */;

#
# Structure for table "lp_role"
#

DROP TABLE IF EXISTS `lp_role`;
CREATE TABLE `lp_role` (
  `role_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '角色ID',
  `lp_name` varchar(255) DEFAULT NULL COMMENT '角色名称',
  `lp_ext` varchar(255) DEFAULT '拓展',
  `lp_post` varchar(255) DEFAULT NULL COMMENT '级联关系',
  `lp_ext1` varchar(255) DEFAULT '拓展1',
  PRIMARY KEY (`role_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='角色表';

#
# Data for table "lp_role"
#

/*!40000 ALTER TABLE `lp_role` DISABLE KEYS */;
INSERT INTO `lp_role` VALUES (1,'系统管理员',NULL,'',NULL),(2,'数据录入员',NULL,NULL,NULL),(3,'审核员',NULL,NULL,NULL),(4,'查看原员',NULL,NULL,NULL),(5,'XXXX',NULL,NULL,NULL),(6,'1233','',NULL,NULL),(7,'eerwe','werw',NULL,NULL),(8,'panwenlin','bualags',NULL,NULL),(27,'never795','795never',NULL,NULL);
/*!40000 ALTER TABLE `lp_role` ENABLE KEYS */;

#
# Structure for table "lp_role_menu"
#

DROP TABLE IF EXISTS `lp_role_menu`;
CREATE TABLE `lp_role_menu` (
  `role_menu_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `lp_menu_id` varchar(255) DEFAULT NULL COMMENT '菜单ID',
  `lp_role_id` varchar(255) DEFAULT NULL COMMENT '角色ID',
  `lp_gran_user` varchar(255) DEFAULT NULL COMMENT '授权用户',
  `lp_grant_time` varchar(255) DEFAULT NULL COMMENT '授权时间',
  PRIMARY KEY (`role_menu_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

#
# Data for table "lp_role_menu"
#

/*!40000 ALTER TABLE `lp_role_menu` DISABLE KEYS */;
INSERT INTO `lp_role_menu` VALUES (0,'1','24',NULL,NULL),(1,'1','1',NULL,NULL),(2,'2','1',NULL,NULL),(3,'3','1',NULL,NULL),(4,'4','1',NULL,NULL),(5,'5','1',NULL,NULL),(6,'6','1',NULL,NULL),(7,'7','1',NULL,NULL),(8,'8','1',NULL,NULL),(9,'9','1',NULL,NULL),(10,'10','1',NULL,NULL),(11,'11','1',NULL,NULL),(12,'12','1',NULL,NULL),(13,'13','1',NULL,NULL),(14,'14','1',NULL,NULL),(15,'15','1',NULL,NULL),(17,'16','1',NULL,NULL),(18,'17','1',NULL,NULL),(19,'18','1',NULL,NULL),(20,'19','1',NULL,NULL),(21,'20','1',NULL,NULL),(22,'4','26',NULL,NULL),(23,'3','26',NULL,NULL),(24,'12','26',NULL,NULL),(25,'6','26',NULL,NULL),(26,'7','26',NULL,NULL),(27,'1','27',NULL,NULL),(28,'5','27',NULL,NULL),(29,'9','27',NULL,NULL),(30,'2','27',NULL,NULL),(31,'3','27',NULL,NULL),(32,'4','27',NULL,NULL),(33,'12','27',NULL,NULL),(34,'13','27',NULL,NULL),(35,'22','1',NULL,NULL),(36,'23','1',NULL,NULL),(37,'24','1',NULL,NULL),(38,'25','1',NULL,NULL),(39,'26','1',NULL,NULL),(40,'27','1',NULL,NULL),(41,'28','1',NULL,NULL),(42,'29','1',NULL,NULL),(43,'30','1',NULL,NULL),(44,'21','1',NULL,NULL);
/*!40000 ALTER TABLE `lp_role_menu` ENABLE KEYS */;

#
# Structure for table "lp_user"
#

DROP TABLE IF EXISTS `lp_user`;
CREATE TABLE `lp_user` (
  `user_Id` int(11) NOT NULL AUTO_INCREMENT,
  `lp_username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `lp_password` varchar(255) DEFAULT NULL COMMENT '密码',
  `lp_regirst_time` varchar(255) DEFAULT NULL COMMENT '注册时间',
  `lp_role` varchar(255) DEFAULT NULL COMMENT '所属角色',
  `lp_remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `lp_ext` varchar(255) DEFAULT NULL,
  `lp_ext1` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='后台用户表';

#
# Data for table "lp_user"
#

/*!40000 ALTER TABLE `lp_user` DISABLE KEYS */;
INSERT INTO `lp_user` VALUES (1,'lp','123',NULL,'1','管理员','72',NULL),(17,'sb','123456',NULL,'1',NULL,NULL,NULL),(18,'aa','123456',NULL,'27',NULL,NULL,NULL);
/*!40000 ALTER TABLE `lp_user` ENABLE KEYS */;

#
# Structure for table "ng_ext"
#

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

#
# Data for table "ng_ext"
#

/*!40000 ALTER TABLE `ng_ext` DISABLE KEYS */;
INSERT INTO `ng_ext` VALUES (1,'1',NULL,'2305',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'2',NULL,'2960',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'3',NULL,'2923',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'4',NULL,'2905',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'5',NULL,'2716',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'6',NULL,'2398',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'7',NULL,'2081',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'8',NULL,'2231',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'9',NULL,'2484',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'10',NULL,'2033',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'11',NULL,'2301',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'12',NULL,'2151',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'13',NULL,'2841',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,'14',NULL,'2852',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'15',NULL,'2792',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,'16',NULL,'2352',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,'17',NULL,'2266',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,'18',NULL,'2830',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,'19',NULL,'2219',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,'20',NULL,'2889',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,'21',NULL,'2270',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,'22',NULL,'2545',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,'23',NULL,'2939',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,'24',NULL,'2391',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,'25',NULL,'2100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,'26',NULL,'2239',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,'27',NULL,'2324',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,'28',NULL,'2109',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,'29',NULL,'2270',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(30,'30',NULL,'2177',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(31,'31',NULL,'2921',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `ng_ext` ENABLE KEYS */;

#
# Structure for table "ng_info"
#

DROP TABLE IF EXISTS `ng_info`;
CREATE TABLE `ng_info` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ng_name` varchar(255) DEFAULT '姓名' COMMENT '姓名',
  `ng_sex` varchar(255) DEFAULT NULL COMMENT '性别',
  `ng_phone` varchar(255) DEFAULT '' COMMENT '电话号码',
  `ng_card` varchar(255) DEFAULT '' COMMENT '证件号码',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='农民基本信息';

#
# Data for table "ng_info"
#

/*!40000 ALTER TABLE `ng_info` DISABLE KEYS */;
INSERT INTO `ng_info` VALUES (1,'鸣双w','2','18227777777','51190019821231259'),(2,'鸣双','1','18227777777','51190019821231255'),(3,'千碧','1','18227777777','330103197912092343'),(4,'麻易','1','18227777777','530700197907084315'),(5,'杭玉','1','18227777777','130100197902220923'),(6,'千香','1','18227777777','410204197501316500'),(7,'丽恒','1','18227777777','440700199406209236'),(8,'碧梦','1','18227777777','370983198411111881'),(9,'卉念','1','18227777777','421200198911115527'),(10,'苗顾','1','18227777777','511123198811199509'),(11,'古喻','1','18227777777','150524199202219361'),(12,'廖夏','1','18227777777','445302197608121159'),(13,'易元','1','18227777777','32010519831007897'),(14,'沈萍','1','18227777777','620901198501248483'),(15,'巧绿','1','18227777777','150206199212309222'),(16,'易萍','1','18227777777','130229198510179960'),(17,'麻蕾','1','18227777777','2311231981121138526'),(18,'马薛','1','18227777777','5423241987040451450'),(19,'饶苗','1','18227777777','430502198506094742'),(20,'盛夏','1','18227777777','350627198705011914'),(21,'饶邱','1','18227777777','610701197501059618'),(22,'柳向','1','18227777777','422822198002042705'),(23,'烟香','1','18227777777','650108198912237291'),(24,'周夏','1','18227777777','411326197905227402'),(25,'双双','1','18227777777','622924198202240904'),(26,'狄顾','1','18227777777','371727197802014784'),(27,'盛夏','1','18227777777','650204198910191648'),(28,'马卉','1','18227777777','460107198910247400'),(29,'佳鸣','1','18227777777','445300198306308673'),(30,'羚佳','1','18227777777','230710199302058529'),(31,'乔简','1','18227777777','450330198108106793');
/*!40000 ALTER TABLE `ng_info` ENABLE KEYS */;

#
# Structure for table "ng_move"
#

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

#
# Data for table "ng_move"
#

/*!40000 ALTER TABLE `ng_move` DISABLE KEYS */;
/*!40000 ALTER TABLE `ng_move` ENABLE KEYS */;

#
# Structure for table "ng_work"
#

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

#
# Data for table "ng_work"
#

/*!40000 ALTER TABLE `ng_work` DISABLE KEYS */;
/*!40000 ALTER TABLE `ng_work` ENABLE KEYS */;

#
# Structure for table "part"
#

DROP TABLE IF EXISTS `part`;
CREATE TABLE `part` (
  `p_Id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(255) DEFAULT NULL,
  `p_post` varchar(255) DEFAULT NULL,
  `p_remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`p_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "part"
#

/*!40000 ALTER TABLE `part` DISABLE KEYS */;
INSERT INTO `part` VALUES (1,'中国','zg',NULL),(2,'北京省','zg_bj',NULL),(3,'四川省','zg_sc',NULL),(4,'成都','zg_sc_cd',NULL),(5,'武侯区','zg_sc_cd_whq',NULL),(6,'雅安市','zg_sc_ya',NULL),(7,'雨城区','zg_sc_yn_ycq',NULL);
/*!40000 ALTER TABLE `part` ENABLE KEYS */;

#
# Structure for table "province"
#

DROP TABLE IF EXISTS `province`;
CREATE TABLE `province` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pcode` bigint(20) DEFAULT NULL,
  `Pname` varchar(255) DEFAULT NULL,
  `NationCode` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

#
# Data for table "province"
#

/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` VALUES (1,110000,'北京市',100000),(2,120000,'天津市',100000),(3,130000,'河北省',100000),(4,140000,'山西省',100000),(5,150000,'内蒙古自治区',100000),(6,210000,'辽宁省',100000),(7,220000,'吉林省',100000),(8,230000,'黑龙江',100000),(9,310000,'上海市',100000),(10,320000,'江苏省',100000),(11,330000,'浙江省',100000),(12,340000,'安徽省',100000),(13,350000,'福建省',100000),(14,360000,'江西省',100000),(15,370000,'山东省',100000),(16,410000,'河南省',100000),(17,420000,'湖北省',100000),(18,430000,'湖南省',100000),(19,440000,'广东省',100000),(20,450000,'广西壮族自治区',100000),(21,460000,'海南省',100000),(22,500000,'重庆市',100000),(23,510000,'四川省',100000),(24,520000,'贵州省',100000),(25,530000,'云南省',100000),(26,540000,'西藏自治区',100000),(27,610000,'陕西省',100000),(28,620000,'甘肃省',100000),(29,630000,'青海省',100000),(30,640000,'宁夏回族自治区',100000),(31,650000,'新疆维吾尔自治区',100000),(32,710000,'台湾省',100000),(33,810000,'香港特别行政区',100000),(34,820000,'澳门特别行政区',100000);
/*!40000 ALTER TABLE `province` ENABLE KEYS */;

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

#
# Data for table "workerinfo"
#

/*!40000 ALTER TABLE `workerinfo` DISABLE KEYS */;
/*!40000 ALTER TABLE `workerinfo` ENABLE KEYS */;

#
# Structure for table "v_user_pr"
#

DROP VIEW IF EXISTS `v_user_pr`;
CREATE VIEW `v_user_pr` AS 
  (select `e`.`Id` AS `Id`,`p`.`Pname` AS `s`,`e`.`month_salary` AS `sa` from ((`ng_info` `i` join `ng_ext` `e` on((`i`.`Id` = `e`.`ng_id`))) join `province` `p` on((convert(left(`p`.`Pcode`,2) using utf8) = left(`i`.`ng_card`,2)))));
