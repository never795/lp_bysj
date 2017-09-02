var lp={

};

lp.url="http://127.0.0.1/api";

lp.request=function(c,d,s){
		var code =c || 110;
		var data = d||{};
		var s = s || function(e){console.log(e)}
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
						s(d);
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
						var res = eval("("+d+")");
						console.log(res);
						s(res);
					}catch(e){
						lp.error(e)
					}
					
				}
			});
		}
};

lp.error=function(e){
	console.err(e)
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