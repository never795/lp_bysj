var lp={

};

lp.url="http://127.0.0.1/api";

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
		if(url.indexOf("127.0.0.1")==-1){
			$.ajax({
				url:url,
				type:"POST",
				dataType : 'jsonp',  
	        	jsonp:"callBack", 
				data:data,
				success:function(d){
					try{
						console.log(res);
						so(d);
					}catch(e){
						lp.error(e)
					}
				}
			});
		}else{
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
						if(res.code>=10){
							if(res.code%2==0){
								layer.msg(res.msg);
							}else{
								layer.alert(res.msg);
							}
						}
						
						so(res);
					}catch(e){
						lp.error(e)
					}
					
				}
			});
		}
};

lp.error=function(e){
	console.error(e)
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


