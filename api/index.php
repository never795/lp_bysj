<?PHP

if(!isset($_SESSION))
 session_start();
include "common/config.php" ;
include "common/func.php" ;
include "common/error.php" ;
include "common/params.php" ;
include "common/jdbc.php" ;



$code = @$_REQUEST["code"];

switch ($code) {
	case 'needImg'://仅仅登陆
		
		returnJson(0,VERLICODE);
		break;

	case 'login'://仅仅登陆
		include "app/login.php" ;
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

		//菜单
	case 'menuList':
		include "app/menu.php";
		$u = new menu();
		$u->getMAllenu();
		break;

	case 'addMenu':
		include "app/menu.php";
		$u = new menu();
		$u->addMenu();
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

	case '-1':
		tojs();
		break;
	case '-2':
		paramsTojs();
		break;
	case'-9':
		loog($_SESSION);
		break;
	default:
	include "test.php" ;
		// $date =  @date("Ymd");
  //       echo $date."====缺少入惨";
		// loog($_REQUEST);
		break;
}
