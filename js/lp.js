window.onload = function()
{
	var lp={};
	lp.type=function(d,t){
		var ty = typeof(d);
		var tt = t?t:'objct';
		if(ty=='undefined'){
			console.log(d);
		}else if(ty == tt){
			return true;
		}else{
			console.log(d+"is not a "+tt)	
		}
		
	}
	lp.error=function(err){
		console.log(err);
	}
	lp.try=function(tryFunc,errCallBack){
		if(!lp.type(tryFunc,"function"))
			return false;
		try{
			tryFunc();
		}catch(err){
			lp.error(err);
		}

		if(lp.type(errCallBack,"function")){
			errCallBack();
		}
	}   




window.$=lp;	 
}

