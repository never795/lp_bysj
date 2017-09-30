

DROP TABLE IF EXISTS `ng_info`;

CREATE TABLE `ng_info` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ng_name` varchar(255) DEFAULT '����' COMMENT '����',
  `ng_sex` varchar(255) DEFAULT NULL COMMENT '�Ա�',
  `ng_phone` varchar(255) DEFAULT '' COMMENT '�绰����',
  `ng_card` varchar(255) DEFAULT '' COMMENT '֤������',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='ũ�������Ϣ';




DROP TABLE IF EXISTS `ng_ext`;

CREATE TABLE `ng_ext` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ng_id` varchar(255) DEFAULT '' COMMENT 'ũ�������ϢID',
  `card_nummber` varchar(255) DEFAULT '' COMMENT '���֤',
  `month_salary` varchar(255) DEFAULT '' COMMENT '������',
  `boy_number` varchar(255) DEFAULT NULL COMMENT '�к���',
  `girl_number` varchar(255) DEFAULT NULL COMMENT 'Ů������',
  `old_persion` varchar(255) DEFAULT NULL COMMENT '��������',
  `is_sigle_famlay` varchar(255) DEFAULT NULL COMMENT '�Ƿ��׼�ͥ',
  `education` varchar(255) DEFAULT NULL COMMENT '�ܽ����̶�',
  `is_poor_famlay` varchar(255) DEFAULT NULL COMMENT '�Ƿ�ƶ����ͥ',
  `lan_number` varchar(255) DEFAULT NULL COMMENT '�������',
  `is_broken` varchar(255) DEFAULT NULL COMMENT '�Ƿ�����',
  `ng_is_yyhxgz` varchar(255) DEFAULT NULL COMMENT '�Ƿ���Ը���繤��',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='ũ����չ��Ϣ��';




DROP TABLE IF EXISTS `ng_move`;

CREATE TABLE `ng_move` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `card_number` varchar(255) DEFAULT NULL COMMENT '���֤',
  `start_time` varchar(255) DEFAULT NULL COMMENT '��ʼʱ��',
  `end_time` varchar(255) DEFAULT NULL COMMENT '�뿪ʱ��',
  `work_place` varchar(255) DEFAULT NULL COMMENT '�����ص�',
  `wor_type` varchar(255) DEFAULT NULL COMMENT '��������',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ũ��������Ϣ��';

/*Data for the table `ng_move` */

/*Table structure for table `ng_work` */

DROP TABLE IF EXISTS `ng_work`;

CREATE TABLE `ng_work` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `car_number` varchar(255) DEFAULT NULL COMMENT '���֤��',
  `is_stable_work` varchar(255) DEFAULT NULL COMMENT '�����Ƿ��ȶ�',
  `work_time` varchar(255) DEFAULT NULL COMMENT '����ʱ��',
  `is_work_education` varchar(255) DEFAULT NULL COMMENT '�Ƿ���ܹ���ҵ��ѵ',
  `want_work` varchar(255) DEFAULT NULL COMMENT '��Ҫ���¹���',
  `now_work` varchar(255) DEFAULT NULL COMMENT '���ڴ��¹���',
  `is_group_insurer` varchar(255) DEFAULT NULL COMMENT '�Ƿ������屣��',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='������Ϣͳ��';
