//获取登录按钮
var loginBut = $("#login");


//定于函数
var loginFunc=function(){
	//获取用户名
	var u=$("#_userName").val(); 
	//获取密码
	var p=$("#password").val();

	if(u==""){
		alert("请输入用户名");
		return ;
	}

	if(p==""){
		alert("请输入密码");
		return;
	}
	var data={};
	data.u=u;
	data.p=p;
	lp.request("login",data,function(r){
			console.log(r);
			if (r.code!=0){
				alert(r.msg);
			} else{
				//document.location.href="page/index.html"
			}
	});
}
	


//吧定于的函数跟登录按钮关联起来
loginBut.click(loginFunc);