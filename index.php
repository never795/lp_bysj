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
	case 'userAdd':
		include "app/user.php";
		$u = new user();
		$u->add($_POST);
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
