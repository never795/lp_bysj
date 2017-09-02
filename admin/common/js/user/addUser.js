	var temp =0;
	lp.request("roleList",function(r){
		if(r.code===0){
			role = r.data;
			$("#lp_role").empty();
			for (var i = 0; i < role.length; i++) {
				$("#lp_role").append(" <option value="+role[i].role_Id+">"+role[i].lp_name+"</option>");
			}
		}
		temp++;
	});


	lp.request("part",{part:"zg"},function(r){
		if(r.code===0){
			role = r.data;
			for (var i = 0; i < role.length; i++) {
				$("#part").append(" <option value="+role[i].p_Id+">"+role[i].p_name+"</option>");
			}
		}
		temp++;
	});




var aaaaa = setInterval(function(){
	if(temp===2){
		init();
		clearInterval(aaaaa);
	}
},1);

function init(){
	layui.use(['form'], function(){
	var form = layui.form
 //自定义验证规则
  form.verify({
    username: function(value){
      if(value.length < 2){
        return '用户名至少得2个字符啊';
      }
      if(value.length >20){
      	return '用户名在20个字符以内';
      }
    },
    password: [/(.+){6,12}$/, '密码必须6到12位'],
    content: function(value){
      layedit.sync(editIndex);
    }
  });

 //监听提交
  form.on('submit(demo1)', function(data){
    // layer.alert(JSON.stringify(data.field), {
    //   title: '最终的提交信息'
    // })
    // 
    lp.request("userAdd",data.field,function(r){
    	if (r.code == 0){
    		layer.alert(r.msg, {
    	    title: '添加用户成功'
     		})
    	}else{
    		layer.alert(r.msg, {
    	    title: '添加用户失败'
     		})
    	}
    })
    return false;
  });

});
}

