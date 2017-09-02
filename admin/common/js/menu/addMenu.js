init();
var tempShow=1;
function init(){
  layui.use(['form'], function(){
  var form = layui.form;
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

//监听指定开关
  form.on('switch(switchTest)', function(data){
    if(this.checked){
      tempShow=1
    }else{
      tempSho=0;
    }
  });

 //监听提交
  form.on('submit(demo1)', function(data){
    data.field.show=tempShow
    lp.request("addMenu",data.field,function(r){
      if (r.code == 0){
        layer.alert(r.msg, {
          title: '添加菜单成功'
        })
      }else{
        layer.alert(r.msg, {
          title: '添加菜单失败'
        })
      }
    })
    return false;
  });

});
}

