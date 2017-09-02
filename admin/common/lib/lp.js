var lp={

};

lp.url="http://127.0.0.1/api";

lp.request=function(c,d,s){
<<<<<<< HEAD

		if(typeof(d)==="function"){
			var so=d;
			var data={};
		}else{
			var data = d||{};
			var so = s || function(e){}
		}
=======
>>>>>>> e4a51282e06f7a8429373da1c356d1fc02b471ae
		var code =c || 110;
		
		var url=this.url+"/index.php?code="+code;
<<<<<<< HEAD
		$.ajax({
			url:url,
			crossDomain: true,
			dataType: "jsonp",
			type:"POST",
			crossDomain: true, 
        	jsonp:"callBack", 
			data:data,
			success:function(d){
				console.log(d);
				so(d);
			}
	});
=======
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
>>>>>>> e4a51282e06f7a8429373da1c356d1fc02b471ae
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



