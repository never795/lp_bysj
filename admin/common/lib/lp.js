var lp={

};
lp.url="http://192.168.8.105";



lp.request=function(c,d,s){

		lp["call_"+c]=s;

		var code =c || 110;
		var data = d||{};
		var s = s || function(e){console.log(e)}
		var url=this.url+"/index.php?code="+code;
		$.ajax({
			url:url,
			dataType : 'jsonp',  
        	jsonp:"callBack", 
			type:"post",
			data:data,
			success:function(d){
				s(d);
			}
	});
};




lp.$=function(s){
		return document.querySelectorAll(s);
	}