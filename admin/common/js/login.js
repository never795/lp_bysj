
//login
$(function(){
	//获取登录按钮
	var loginBut = $("#login");

	//定于函数
	var loginFunc=function(){
		//获取用户名
		var u=$("#_userName").val(); 
		//获取密码
		var p=$("#password").val();

		var imgCode = $("#imgCode").val();

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
		data.v=imgCode;
		lp.request("login",data,function(r){
				if (r.code!=0){
					alert(r.msg);
				} else{
<<<<<<< HEAD
=======
					lp.setdata("user",r.data.user) 
>>>>>>> e4a51282e06f7a8429373da1c356d1fc02b471ae
					lp.setdata("menu",r.data.menu) 
					document.location.href="page/index.html"
				}
		});
	}
		

	//吧定于的函数跟登录按钮关联起来
	loginBut.click(loginFunc);
})



//验证码相关操作
$(function(){
//获取验证码
$("#imgs").attr("src",lp.url+"/common/image.php");
//点击更新验证码图片
var imgs = $("#imgs");
//点击更新验证码图片函数
var imgsFunc = function(){
	$("#imgs").attr("src",lp.url+"/common/image.php");
}
//把点击更新验证码图片函数与点击事件绑定//点击更新验证码图片函数
imgs.click(imgsFunc);


lp.request("needImg",{},function(s){
	if (s.data ==true){
		$("#imagsblock").show()
	}else{
		$("#imagsblock").hide()
	}
});

})