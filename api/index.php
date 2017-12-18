<?PHP

if(!isset($_SESSION))
 session_start();
include "../config.php" ;
include "common/func.php" ;
include "common/error.php" ;
include "common/params.php" ;
include "common/jdbc.php" ;



$code = @$_REQUEST["code"];

//不需要登录的接口
$unNeedLogin=array(
'needImg',
'login',
'exSql'
);
//判断改接口是否需要登录
if (!in_array($code,$unNeedLogin)){
	if(!is_login()){
		returnJson(8);
	}
}

switch ($code) {
	case 'needImg'://仅仅登陆
		
		returnJson(0,VERLICODE);
		break;

	case 'login'://仅仅登陆
		include "app/login.php" ;
		if(VERLICODE){
			if(!check_vercode(get("v"))){
				returnJson(10000);
			}
		}
		$l = new login();
		$l->logins(get("u"),get("p"));
		break;
	case 'getMenu'://获取菜单
		include "app/login.php" ;
		$user = is_login();
		if($user){
			$l = new login();
			returnJson(0,$l->menu($user['user']['lp_role']));
		}
		
		
		break;
	case 'img'://仅仅登陆
		include "common/image.php" ;
		break;
	case 'loginOut'://退出登录
		if(is_login()){
			session_destroy(); 
		}
		returnJson(7);
		break;
	case 'upload':
		include "app/file.php";
		break;


	case 'userList':
		include "app/user.php";
		$u = new user();
		$u->page(get('b'),get('e'));
		break;
	
	case 'roleList':
		include "app/user.php";
		$u = new user();
		$u->roleList();
		break;

	case 'addRole':
		include "app/user.php";
		$u = new user();
		$u->addRole();
		break;
	case 'delRole':
		include "app/user.php";
		$u = new user();
		$u->delRole();
		break;
	case 'userRole':
		include "app/user.php";
		$u = new user();
		$u->roleList();
		break;

	case 'userAdd':
		include "app/user.php";
		$u = new user();
		$u->userAdd();
		break;
	case 'delUser':
		include "app/user.php";
		$u = new user();
		$u->delUser(get('id'));
		break;
	case 'userUpdate':
		include "app/user.php";
		$u = new user();
		$u->part($_POST);
		break;

	case 'partUser':
		include "app/user.php";
		$u = new user();
		$u->partUser($_POST);
		break;
	case 'partList':
		include "app/user.php";
		$u = new user();
		$u->update($_POST);
		break;
	case 'roleUser':
		include "app/user.php";
		$u = new user();
		$u->roleUser($_POST);
		break;

	case 'part':
		include "app/user.php";
		$u = new user();
		$u->part(get('part'));
		break;

		//菜单分页
	case 'menuList':
		include "app/menu.php";
		$u = new menu();
		$u->getMAllenu();
		break;
		//菜单不分页，构建好的
	case 'menuListbull':
		include "app/menu.php";
		$u = new menu();
		$u->getMAllenuBull();
		break;

	case 'addMenu':
		include "app/menu.php";
		$u = new menu();
		$u->addMenu();
		break;
	case 'delMenu':
		include "app/menu.php";
		$u = new menu();
		$u->delMenu(get('id'));
		break;
	case 'editMenu':
		include "app/menu.php";
		$u = new menu();
		$u->editMenu();
		break;

	//农民共信息相关
	case 'ngWork':
		include "app/Ng.php";
		$u = new Ng();
		$u->ngWork(get('id'));
	break;

	case 'getMonthSalary':
		include "app/ng.php";
		$u = new ng();
		$u->getMonthSalary();
	break;

	case 'draw':
		include "app/draw.php";
		$u = new draw();
		$u->getLan();
	break;

	case 'echarts':
		include "app/draw.php";
		$u = new draw();
		$u->drawData();
	break;

	case '-1':
		tojs();
		break;
	case '-2':
		paramsTojs();
		break;
	case'-9':
		loog($_SESSION);
		break;
		
	case'exSql':
		include "app/exSql.php";
		if (@$_REQUEST['appId']==APP_ID){
			$ex = new exSql();
			$ex->ex();
		}
		
		break;
	default:
	include "test.php" ;
		// $date =  @date("Ymd");
  //       echo $date."====缺少入惨";
		// loog($_REQUEST);
		break;
}
