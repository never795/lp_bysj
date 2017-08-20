var lp={};
lp.request=function(t,c,d,s){
	var type =t || 1;
	var code =c || 110;
	var data = d||{};
	var s = s || function(e){console.log(e)}
	var url="/biyesheji/index.php?code="+code+"&type="+type;
	$.ajax({
		url:url,
		type:"post",
		data:data,
		success:function(d){
			 var data = eval("("+d+")");   //把字符串转换成json对象
			 s(data);
		}
	});
}