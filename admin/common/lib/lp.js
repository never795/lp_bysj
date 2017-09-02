var lp={

};
lp.url="http://192.168.8.100";



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
};




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



