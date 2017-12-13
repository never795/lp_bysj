# Host: localhost  (Version: 5.5.53)
# Date: 2017-12-13 21:56:35
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "common"
#

DROP TABLE IF EXISTS `common`;
CREATE TABLE `common` (
  `common_ID` int(2) NOT NULL AUTO_INCREMENT COMMENT '农名工常用信息编号',
  `now_addr` varchar(255) DEFAULT NULL COMMENT '现住地',
  `worktime` varchar(255) DEFAULT NULL COMMENT '在外工作时间',
  `land` varchar(255) DEFAULT NULL COMMENT '家中土地情况',
  `jtkn` varchar(255) DEFAULT NULL COMMENT '有无家庭困难情况',
  `knqk` varchar(255) DEFAULT NULL COMMENT '具体困难情况',
  `lset` varchar(255) DEFAULT NULL COMMENT '家中是否有留守儿童',
  `lslr` varchar(255) DEFAULT NULL COMMENT '家中是否有留守老人',
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
  `dy_id` int(2) NOT NULL AUTO_INCREMENT COMMENT '答疑编号',
  `login_id` varchar(255) DEFAULT NULL COMMENT '登录信息编号',
  `consult` varchar(255) DEFAULT NULL COMMENT '咨询内容',
  `answer` varchar(255) DEFAULT NULL COMMENT '答复内容',
  `dy_time` varchar(255) DEFAULT NULL COMMENT '答复时间',
  `huifuzt` varchar(255) DEFAULT NULL COMMENT '回复状态',
  `dy_remarker` varchar(255) DEFAULT NULL COMMENT '答疑备注',
  PRIMARY KEY (`dy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "dayi"
#

/*!40000 ALTER TABLE `dayi` DISABLE KEYS */;
/*!40000 ALTER TABLE `dayi` ENABLE KEYS */;

#
# Structure for table "lp_dict"
#

DROP TABLE IF EXISTS `lp_dict`;
CREATE TABLE `lp_dict` (
  `id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `key` varchar(64) NOT NULL COMMENT '字典名称',
  `val` varchar(64) NOT NULL COMMENT '字典值',
  `type` int(9) NOT NULL DEFAULT '0' COMMENT '0代表字典',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

#
# Data for table "lp_dict"
#

/*!40000 ALTER TABLE `lp_dict` DISABLE KEYS */;
INSERT INTO `lp_dict` VALUES (1,'是否','1',0),(2,'是','1',1),(3,'否','0',1),(4,'打算工作地','2',0),(5,'家乡','1',2),(6,'工资高的地方','2',2),(7,'有亲人的地方','3',2),(8,'受教育程度','3',0),(9,'无','0',3),(10,'小学','1',3),(11,'初中','2',3),(12,'高中','3',3),(13,'中专','4',3),(14,'大专','5',3),(15,'其他','6',3),(16,'大学','7',3),(17,'硕士','8',3),(18,'研究生','9',3),(19,'博士','10',3),(20,'博士后','11',3),(21,'工作性质','4',0),(22,'体力','0',4),(23,'脑力','1',4);
/*!40000 ALTER TABLE `lp_dict` ENABLE KEYS */;

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
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

#
# Data for table "lp_menu"
#

/*!40000 ALTER TABLE `lp_menu` DISABLE KEYS */;
INSERT INTO `lp_menu` VALUES (1,'系统管理','A',' ','1',NULL),(2,'添加用户','A_A','user/addUser.html','1',NULL),(3,'查看用户','A_B','user/lookUser.html','1',NULL),(4,'用户授权','A_C','','1',NULL),(5,'资讯管理','B','','0',NULL),(6,'添加资讯','B_A','#','0',NULL),(7,'查看资讯','B_B','#','0',NULL),(9,'农民工信息管理','C',' ','1',NULL),(10,'查看','C_A','','1',NULL),(11,'流动信息查看','C_B','Ng/updateNg.html','1',NULL),(12,'添加角色','A_D','role/addRole.html','1',NULL),(13,'添加菜单','A_E','menu/addMenu.html','0',NULL),(14,'查看角色','A_F','role/lookRole.html','0',NULL),(15,'后台菜单管理','A_G','menu/lookMenu.html','1',NULL),(16,'区域平均工资','C_A_D','ng/draw.html?type=salary&darwType=line','1',NULL),(21,'各省耕地总面积','C_A_B','ng/lookSumLan.html','1',NULL),(22,'各省耕地平均面积','C_A_C','ng/lookAvgLan.html','1',NULL),(23,'各省农民工人数','C_A_A','ng/draw.html?type=ng_number&darwType=line','1',NULL),(24,'农民共信息导出','C_C','Ng/ng_exp.html','0',NULL),(31,'各省贫困家庭比例','C_A_E','ng/draw.html?type=poor&darwType=line','1',NULL),(32,'各省离异家庭比例','C_A_F','ng/draw.html?type=broken&darwType=line','1',NULL),(33,'各省意愿回乡比例','C_A_G','ng/draw.html?type=goHome&darwType=line','1',NULL),(34,'受教育比例比例','C_A_H','ng/draw.html?type=education&darwType=line','1',NULL);
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
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

#
# Data for table "lp_role_menu"
#

/*!40000 ALTER TABLE `lp_role_menu` DISABLE KEYS */;
INSERT INTO `lp_role_menu` VALUES (0,'1','24',NULL,NULL),(1,'1','1',NULL,NULL),(2,'2','1',NULL,NULL),(3,'3','1',NULL,NULL),(4,'4','1',NULL,NULL),(5,'5','1',NULL,NULL),(6,'6','1',NULL,NULL),(7,'7','1',NULL,NULL),(9,'9','1',NULL,NULL),(10,'10','1',NULL,NULL),(11,'11','1',NULL,NULL),(12,'12','1',NULL,NULL),(13,'13','1',NULL,NULL),(14,'14','1',NULL,NULL),(15,'15','1',NULL,NULL),(17,'16','1',NULL,NULL),(22,'4','26',NULL,NULL),(23,'3','26',NULL,NULL),(24,'12','26',NULL,NULL),(25,'6','26',NULL,NULL),(26,'7','26',NULL,NULL),(27,'1','27',NULL,NULL),(28,'5','27',NULL,NULL),(29,'9','27',NULL,NULL),(30,'2','27',NULL,NULL),(31,'3','27',NULL,NULL),(32,'4','27',NULL,NULL),(33,'12','27',NULL,NULL),(34,'13','27',NULL,NULL),(35,'22','1',NULL,NULL),(36,'23','1',NULL,NULL),(37,'24','1',NULL,NULL),(38,'25','1',NULL,NULL),(39,'26','1',NULL,NULL),(40,'27','1',NULL,NULL),(41,'28','1',NULL,NULL),(42,'29','1',NULL,NULL),(44,'21','1',NULL,NULL),(46,'31','1',NULL,NULL),(47,'32','1',NULL,NULL),(48,'33','1',NULL,NULL),(49,'34','1',NULL,NULL);
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
INSERT INTO `ng_ext` VALUES (1,'1','51190019821231259','2305','0','2','2','1','0','1','1','1','1'),(2,'2','51190019821231255','2960','1','3','2','1','4','0','4','1','0'),(3,'3','330103197912092343','2923','0','0','1','1','5','0','3','1','1'),(4,'4','530700197907084315','2905','1','3','2','0','0','0','1','1','1'),(5,'5','130100197902220923','2716','0','1','0','0','5','1','4','0','0'),(6,'6','410204197501316500','2398','0','3','0','1','0','0','5','1','0'),(7,'7','440700199406209236','2081','4','4','1','1','0','0','8','1','1'),(8,'8','370983198411111881','2231','2','0','2','0','3','1','8','0','0'),(9,'9','421200198911115527','2484','1','0','2','1','0','0','1','0','0'),(10,'10','511123198811199509','2033','0','1','2','0','1','0','3','0','0'),(11,'11','150524199202219361','2301','0','0','0','0','3','1','6','1','0'),(12,'12','445302197608121159','2151','2','1','1','0','1','1','7','1','1'),(13,'13','32010519831007897','2841','2','2','0','0','3','1','10','0','0'),(14,'14','620901198501248483','2852','4','1','0','1','3','0','3','1','1'),(15,'15','150206199212309222','2792','3','2','1','1','4','1','9','0','1'),(16,'16','130229198510179960','2352','0','2','0','1','3','1','1','0','0'),(17,'17','2311231981121138526','2266','4','4','2','0','1','1','10','1','1'),(18,'18','5423241987040451450','2830','4','0','0','0','2','1','3','1','1'),(19,'19','430502198506094742','2219','3','4','0','1','4','0','2','1','1'),(20,'20','350627198705011914','2889','1','3','1','0','4','1','2','0','1'),(21,'21','610701197501059618','2270','0','0','0','1','0','1','3','1','0'),(22,'22','422822198002042705','2545','1','4','2','0','0','0','5','0','0'),(23,'23','650108198912237291','2939','3','4','0','0','3','1','6','1','1'),(24,'24','411326197905227402','2391','0','0','0','0','2','1','10','0','1'),(25,'25','622924198202240904','2100','4','3','0','0','2','0','6','0','1'),(26,'26','371727197802014784','2239','1','0','0','1','3','1','1','0','1'),(27,'27','650204198910191648','2324','1','0','0','0','5','0','8','0','1'),(28,'28','460107198910247400','2109','1','2','2','1','3','1','4','1','1'),(29,'29','445300198306308673','2270','4','4','0','1','3','1','8','1','0'),(30,'30','230710199302058529','2177','0','4','0','0','5','1','10','1','1'),(31,'31','450330198108106793','2921','3','2','1','0','0','1','9','0','1');
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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='农民工流动信息表';

#
# Data for table "ng_move"
#

/*!40000 ALTER TABLE `ng_move` DISABLE KEYS */;
INSERT INTO `ng_move` VALUES (1,'51190019821231259',NULL,NULL,NULL,'0'),(2,'51190019821231255',NULL,NULL,NULL,'0'),(3,'330103197912092343',NULL,NULL,NULL,'0'),(4,'530700197907084315',NULL,NULL,NULL,'0'),(5,'130100197902220923',NULL,NULL,NULL,'0'),(6,'410204197501316500',NULL,NULL,NULL,'0'),(7,'440700199406209236',NULL,NULL,NULL,'0'),(8,'370983198411111881',NULL,NULL,NULL,'1'),(9,'421200198911115527',NULL,NULL,NULL,'1'),(10,'511123198811199509',NULL,NULL,NULL,'0'),(11,'150524199202219361',NULL,NULL,NULL,'1'),(12,'445302197608121159',NULL,NULL,NULL,'0'),(13,'32010519831007897',NULL,NULL,NULL,'0'),(14,'620901198501248483',NULL,NULL,NULL,'1'),(15,'150206199212309222',NULL,NULL,NULL,'0'),(16,'130229198510179960',NULL,NULL,NULL,'1'),(17,'2311231981121138526',NULL,NULL,NULL,'0'),(18,'5423241987040451450',NULL,NULL,NULL,'0'),(19,'430502198506094742',NULL,NULL,NULL,'1'),(20,'350627198705011914',NULL,NULL,NULL,'1'),(21,'610701197501059618',NULL,NULL,NULL,'0'),(22,'422822198002042705',NULL,NULL,NULL,'0'),(23,'650108198912237291',NULL,NULL,NULL,'0'),(24,'411326197905227402',NULL,NULL,NULL,'0'),(25,'622924198202240904',NULL,NULL,NULL,'1'),(26,'371727197802014784',NULL,NULL,NULL,'1'),(27,'650204198910191648',NULL,NULL,NULL,'1'),(28,'460107198910247400',NULL,NULL,NULL,'0'),(29,'445300198306308673',NULL,NULL,NULL,'1'),(30,'230710199302058529',NULL,NULL,NULL,'0'),(31,'450330198108106793',NULL,NULL,NULL,'1');
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
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COMMENT='工作信息统计';

#
# Data for table "ng_work"
#

/*!40000 ALTER TABLE `ng_work` DISABLE KEYS */;
INSERT INTO `ng_work` VALUES (32,'51190019821231259','0','20170202','0','2','1','0'),(33,'51190019821231255','0','20170202','1','2','0','1'),(34,'330103197912092343','0','20170202','0','3','3','0'),(35,'530700197907084315','0','20170202','1','2','0','0'),(36,'130100197902220923','1','20170202','0','2','1','1'),(37,'410204197501316500','0','20170202','1','3','1','1'),(38,'440700199406209236','0','20170202','0','3','2','0'),(39,'370983198411111881','0','20170202','1','3','2','0'),(40,'421200198911115527','1','20170202','0','3','2','0'),(41,'511123198811199509','0','20170202','1','0','0','0'),(42,'150524199202219361','0','20170202','0','0','0','0'),(43,'445302197608121159','0','20170202','0','2','0','0'),(44,'32010519831007897','1','20170202','1','1','3','1'),(45,'620901198501248483','1','20170202','1','1','0','1'),(46,'150206199212309222','0','20170202','1','1','1','1'),(47,'130229198510179960','1','20170202','0','3','1','0'),(48,'2311231981121138526','0','20170202','0','0','2','0'),(49,'5423241987040451450','0','20170202','0','0','3','1'),(50,'430502198506094742','1','20170202','0','3','3','1'),(51,'350627198705011914','0','20170202','1','0','2','0'),(52,'610701197501059618','0','20170202','0','2','1','1'),(53,'422822198002042705','0','20170202','1','3','2','0'),(54,'650108198912237291','0','20170202','0','2','0','0'),(55,'411326197905227402','1','20170202','0','1','0','0'),(56,'622924198202240904','1','20170202','0','0','0','0'),(57,'371727197802014784','0','20170202','0','2','2','1'),(58,'650204198910191648','1','20170202','0','2','1','1'),(59,'460107198910247400','0','20170202','0','3','3','1'),(60,'445300198306308673','1','20170202','1','3','3','1'),(61,'230710199302058529','1','20170202','1','0','3','0'),(62,'450330198108106793','1','20170202','0','0','0','1');
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
  `Pcode` bigint(20) DEFAULT NULL COMMENT '省份代码',
  `Pname` varchar(255) DEFAULT NULL COMMENT '省份名称',
  `NationCode` bigint(20) DEFAULT NULL COMMENT '地区代码',
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
  `workerinfo_ID` int(2) NOT NULL AUTO_INCREMENT COMMENT '农名工信息编号',
  `common_id` varchar(255) NOT NULL DEFAULT '' COMMENT '农名工常用信息编号',
  `login_ID` varchar(255) NOT NULL DEFAULT '' COMMENT '登录信息编号',
  `age` varchar(255) DEFAULT NULL COMMENT '年龄',
  `huji_addr` varchar(255) DEFAULT NULL COMMENT '户籍地址',
  `huji_xingzhi` varchar(255) DEFAULT NULL COMMENT '户籍性质',
  `photo` varchar(255) DEFAULT NULL COMMENT '相片',
  `date_birth` varchar(255) DEFAULT NULL COMMENT '出生日期',
  `zzmm` varchar(255) DEFAULT NULL COMMENT '政治面貌',
  `edu` varchar(255) DEFAULT NULL COMMENT '学历',
  `buy_house` varchar(255) DEFAULT NULL COMMENT '是否购买住房',
  `build_house` varchar(255) DEFAULT NULL COMMENT '是否回乡建房',
  PRIMARY KEY (`workerinfo_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "workerinfo"
#

/*!40000 ALTER TABLE `workerinfo` DISABLE KEYS */;
/*!40000 ALTER TABLE `workerinfo` ENABLE KEYS */;

#
# Structure for table "v_ng_info"
#

DROP VIEW IF EXISTS `v_ng_info`;
CREATE VIEW `v_ng_info` AS 
  (select `p`.`Id` AS `s_id`,`p`.`Pname` AS `pro`,`e`.`Id` AS `Id`,`e`.`ng_id` AS `ng_id`,`e`.`card_nummber` AS `card_nummber`,`e`.`month_salary` AS `month_salary`,`e`.`boy_number` AS `boy_number`,`e`.`girl_number` AS `girl_number`,`e`.`old_persion` AS `old_persion`,`e`.`is_sigle_famlay` AS `is_sigle_famlay`,`e`.`education` AS `education`,`e`.`is_poor_famlay` AS `is_poor_famlay`,`e`.`lan_number` AS `lan_number`,`e`.`is_broken` AS `is_broken`,`e`.`ng_is_yyhxgz` AS `ng_is_yyhxgz`,`w`.`is_group_insurer` AS `is_group_insurer`,`w`.`is_stable_work` AS `is_stable_work`,`w`.`is_work_education` AS `is_work_education`,`w`.`now_work` AS `now_work`,`w`.`want_work` AS `want_work`,`w`.`work_time` AS `work_time` from (((`ng_info` `i` join `ng_ext` `e` on((`i`.`Id` = `e`.`ng_id`))) join `province` `p` on((convert(left(`p`.`Pcode`,2) using utf8) = left(`i`.`ng_card`,2)))) left join `ng_work` `w` on((`w`.`car_number` = `i`.`ng_card`))));

#
# Structure for table "v_pro_monery"
#

DROP VIEW IF EXISTS `v_pro_monery`;
CREATE VIEW `v_pro_monery` AS 
  (select `p`.`Id` AS `s_id`,`e`.`Id` AS `user_id`,`p`.`Pname` AS `pro`,`e`.`month_salary` AS `sa` from ((`ng_info` `i` join `ng_ext` `e` on((`i`.`Id` = `e`.`ng_id`))) join `province` `p` on((convert(left(`p`.`Pcode`,2) using utf8) = left(`i`.`ng_card`,2)))));

#
# Structure for table "v_user_pr"
#

DROP VIEW IF EXISTS `v_user_pr`;
CREATE VIEW `v_user_pr` AS 
  (select `e`.`Id` AS `Id`,`p`.`Pname` AS `s`,`e`.`month_salary` AS `sa` from ((`ng_info` `i` join `ng_ext` `e` on((`i`.`Id` = `e`.`ng_id`))) join `province` `p` on((convert(left(`p`.`Pcode`,2) using utf8) = left(`i`.`ng_card`,2)))));
