<?php
//是否调试，会输出SQL语句等信息
define("DEBUG",true);
define("IS_RETURN_MSG",true);
//是否需要验证码
define("VERLICODE",false);



//错误
define("ERROR",'error');
//入参
define("PARAMS",'params');
//session 用户信息
define("SESSION_USER","lp_user");


//上传文件设置
define("FILE_PATH","./upload");
//define("FILE_TYPE",new array("jpg","gif","bmp","png"));
define("FILE_SIZE",1024000);//10M


//表
define("t_login","login"); //登陆
define("t_info","common"); //用户信息
define("t_gonggao","gonggao"); //公告
define("t_fujian","fujian"); //附件
define("t_job","job"); //附件
define("t_dayi","dayi"); //登陆
define("t_town","town"); //用户信息
define("t_work","workerinfo"); //公告
define("t_zhaopin","zhaopin"); //附件
