<?php
class Ng extends db{
	protected $commn_table="common";
	protected $info_table="ng_info";





	public function getMonthSalary(){
		$sql = "select t.s,avg(t.sa) avgsa from (
select p.Pname s,e.month_salary sa from ng_info i
inner join ng_ext e on i.id=e.ng_id 
inner join province p on left(p.Pcode,2)=left(i.ng_card,2)
) t group by t.s";
		$res = $this->D->query($sql);
		if($res){
			returnJson(0,$res);
		}else{
			returnJson(-1);
		}
	}


}

