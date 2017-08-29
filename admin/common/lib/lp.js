var lp={

};
lp.url="http://192.168.8.100";



lp.request=function(c,d,s){

		lp["call_"+c]=s;

		var code =c || 110;
		var data = d||{};
		var s = s || function(e){console.log(e)}
		var url=this.url+"/index.php?code="+code;
		$.ajax({
			url:url,
			type:"POST",
			dataType : 'jsonp',  
        	jsonp:"callBack", 
			data:data,
			success:function(d){
				s(d);
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