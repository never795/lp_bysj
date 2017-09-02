var pagess={count:100,begin:10,long:10}
function page(b,e){
	lp.request("userList",{b:b,e:e},function(r){
		var data = r.data.data;
		pagess.count=r.data.page.all;
		var html="";
		$("#userlist").html("");
		for (var i = 0; i < data.length; i++) {
			var oper = "<span onclick='del("+data[i].user_Id+")'>删除</span>";
			html="<tr>"+
				"<td>"+(i+1)+"</td>"+
				"<td>"+data[i].lp_username+"</td>"+
				"<td>"+data[i].lp_regirst_time+"</td>"+
				"<td>"+data[i].lp_role+"</td>"+
				"<td>"+oper+"</td>"+
			"</tr>";
			$("#userlist").append(html);
		}
	})
}

function del(d){
	if(confirm("是否删除？"))
	lp.request("delUser",{id:d},function(r){
		if(r.code===0){
			page(pagess.begin,10)
		}
	})
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