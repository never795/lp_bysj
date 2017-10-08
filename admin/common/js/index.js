//退出登录
var loginOut = function(){
	lp.request("loginOut",[],function(){});
	window.location.href = "../"
	lp.setdata("menu",{})
}

$(function(){
	var user = lp.getdata('user');
	$("#userInfo li").eq(1).html(user.lp_name);
	$("#userInfo li").eq(2).find("a").eq(0).html(user.lp_username);


})