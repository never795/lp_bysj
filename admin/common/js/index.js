//退出登录
var loginOut = function(){
	lp.request("loginOut",[],function(){});
	window.location.href = "../"
	lp.setdata("menu",{})
}
