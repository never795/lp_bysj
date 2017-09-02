//init();
var temp=0;
var menus=[]
lp.request("menuList",function(r){
    if(r.code===0){
      menus = r.data;
     }
    temp++;
  });

var aaaaa = setInterval(function(){
  if(temp===1){
    init();
    clearInterval(aaaaa);
  }
},1);
















function init(){
	layui.use(['form','tree','layer'], function(){
	var form = layui.form;
  var layer = layui.layer
  ,$ = layui.jquery; 



 layui.tree({
    elem: '#menuTree' //指定元素
    ,target: '_blank' //是否新选项卡打开（比如节点返回href才有效）
    ,click: function(item){ //点击节点回调

     var names =  $("[name='m']").val();
     var ids =  $("[name='m']").attr("datas");

     if(names.indexOf(item.name)!=-1){
         names = names.replace("    "+item.name,"");
         $("[name='m']").val(names);
     }else{
      $("[name='m']").val(names+"    "+item.name);
     }

     if(ids.indexOf(item.id)!=-1){
        ids =ids.replace(","+item.id,"");
        $("[name='m']").attr("datas",ids);
     }else{
      $("[name='m']").attr("datas",ids+","+item.id);
     }

      //layer.msg('当前节名称：'+ item.name + '<br>全部参数：'+ eachMenu(item).id);
      console.log(item);
    },
    nodes: menus
  });


 //自定义验证规则
  form.verify({
    menuName: function(value){
      if(value.length < 2){
        return '角色名至少得2个字符啊';
      }
      if(value.length >20){
      	return '角色名在20个字符以内';
      }
    }
  });

 //监听提交
  form.on('submit(demo1)', function(data){
    data.field.m = $("[name='m']").attr("datas");
    lp.request("addRole",data.field,function(r){
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

