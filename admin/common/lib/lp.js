var lp={

};

lp.url="/api";

lp.request=function(c,d,s){
		if(typeof(d)==="function"){
			var so=d;
			var data={};
		}else{
			var data = d||{};
			var so = s || function(e){}
		}
		var code =c || 110;
		var url=this.url+"/index.php?code="+code;
	{
			$.ajax({
				url:url,
				type:"POST", 
				data:data,
				success:function(d){
					try{
						if(typeof(d)=='string')
						var res = eval("("+d+")");
						else  res = d;
						console.log(res);
						/*
							if(res.code>=10){
							try{
								if(res.code%2==0){
									layer.msg(res.msg);
								}else{
									layer.alert(res.msg);
								}
							}catch(e){

								console.log(e)
							}
						}
						*/
						so(res);
					}catch(e){
						console.log(e);
					}
					
				}
			});
		}
};

lp.error=function(e){
	console.log(e)
}



lp.$=function(s){
		return document.querySelectorAll(s);
	}

lp.setdata=function(k,v){
	if(typeof(v)=="object"){
		v="ObJ_"+JSON.stringify(v);
	}

	window.localStorage.setItem(k,v)

}
lp.getdata=function(kk){
	var k = window.localStorage.getItem(kk);
	if(k.indexOf("ObJ_")==0){
		 k = JSON.parse(k.substring(4));
	}
	return k;
}
lp.getParam=function(name){
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     if(r!=null)return  unescape(r[2]); return null;

}


