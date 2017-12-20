<?php
//是否调试，会输出SQL语句等信息
define("DEBUG",true);
define("IS_RETURN_MSG",true);
//是否需要验证码
define("VERLICODE",true);
define("VERLICODE_CODE","_lp_verlicode");
//数据库的配置
define("DB_HOST","127.0.0.1");
define("DB_PORT","3306");
define("DB_USER","root");
define("DB_PWD","root");
define("DB_SSID","lp_bysj");

//app调用接口传入字符串
define("APP_ID","1234567890qazwsxedc");


//错误
define("ERROR",'error');
//入参
define("PARAMS",'params');
//session 用户信息
define("SESSION_USER","lp_user");


//上传文件设置
define("FILE_PATH","./upload");
//上传文件大小限制
define("FILE_SIZE",1024000);//10M


//数据库表
define("t_login","login"); //登陆
define("t_menu","lp_menu"); //菜单
define("t_info","common"); //用户信息
define("t_gonggao","gonggao"); //公告
define("t_fujian","fujian"); //附件
define("t_job","job"); //附件
define("t_dayi","dayi"); //登陆
define("t_town","town"); //用户信息
define("t_work","workerinfo"); //公告
define("t_zhaopin","zhaopin"); //附件

