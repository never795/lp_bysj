<?PHP
if(!isset($_SESSION))
 session_start();
include "common/config.php" ;
include "common/func.php" ;
include "common/error.php" ;
include "common/params.php" ;
include "common/db.php" ;


$GLOBALS['db'] = new Database("127.0.0.1","root","root","lp_bysj");

$code = @$_REQUEST["code"];

switch ($code) {
	case '110':
		include "app/login.php" ;
		break;
	case '111':
		include "app/CommonInfo.php" ;
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
		loog($_REQUEST);
		break;
}
