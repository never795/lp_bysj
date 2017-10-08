var pagess={count:100,begin:10,long:10}
function page(b,e){
	lp.request("menuList",{b:b,e:e},function(r){
		var data = r.data.data;
		pagess.count=r.data.page.all;
		var html="";
		$("#userlist").html("");
		for (var i = 0; i < data.length; i++) {
			var oper = "<span  class=\"layui-btn layui-btn-small\" onclick='del("+data[i].menu_Id+")'>删除</span>"+
			"<span  class=\"layui-btn layui-btn-small\" onclick='edit(this,"+data[i].menu_Id+")'>修改</span>";
			html="<tr>"+
				"<td><input type='text' value='"+data[i].lp_menu_name+"'/></td>"+
				"<td> <input style=\"width: 341px;\" type='text' value='"+data[i].lp_menu_url+"'/></td>"+
				"<td> <input type='text' value='"+data[i].lp_menu_post+"'/></td>"+
				"<td> <input type='text' value='"+data[i].lp_menu_show+"' style=\"width: 20px;\"/></td>"+
				"<td> "+oper+"</td>"+
			"</tr>";
			$("#userlist").append(html);
		}
	})
}

function del(d){

layer.confirm('是否删除？', {
  btn: ['删除','不了'] //按钮
}, function(){
  lp.request("delMenu",{id:d},function(r){
		if(r.code===0){
			layer.msg(r.msg);
			page(pagess.begin,10)
		}else{
			alert("删除失败:"+r.msg);
		}
	});
}, function(){
  
});
	
}

function edit(t,id){
	var menuData = $(t).parent().parent().find("td input");
	var par={};
	par.id=id;
	par.name=menuData.eq(0).val();
	par.url=menuData.eq(1).val();
	par.post=menuData.eq(2).val();
	par.show=menuData.eq(3).val();
	console.log(par);
	lp.request("editMenu",par,function(r){
		if(r.code===0){
			page(pagess.begin,10)
		}
	});
}

function add(t){
var menuData = $(t).parent().parent().find("th input");
	var par={};
	par.name=menuData.eq(0).val();
	par.url=menuData.eq(1).val();
	par.post=menuData.eq(2).val();
	par.show=menuData.eq(3).val();
	console.log(par);
	lp.request("addMenu",par,function(r){
		if(r.code===0){
			page(pagess.begin,10)
		}
	});

}

page(0,pagess.long);



layui.use(['laypage', 'layer'], function(){
  var laypage = layui.laypage
  ,layer = layui.layer;
  //总页数低于页码总数
  laypage.render({
    elem: 'page',
    count: pagess.count, //数据总数

    jump:function(obj){
		console.log(obj);
		//获取当前页
		var nowpage = obj.curr-1;
		var begin = nowpage*pagess.long;
		page(begin,pagess.long);
		obj.count=pagess.count;
		pagess.begin=begin;
    },
    
  });

 });