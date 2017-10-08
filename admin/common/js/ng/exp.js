layui.use(['form'], function() {
    var form = layui.form;
    
    form.on('submit(demo1)', function(data) {
    	console.log(data)
        layer.alert(JSON.stringify(data.field), {
            title: '最终的提交信息'
        });
        
        return false;
    });
});
