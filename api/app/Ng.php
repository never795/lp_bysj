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


public function ngWork($d=''){
		$sql="
			SELECT f.`ng_name`,t.*,d.`key` work_type_name,d1.`key` work_place_name  FROM ng_move t
			LEFT JOIN lp_dict d ON d.`type`='4' AND d.`val`=t.`wor_type`
			LEFT JOIN lp_dict d1 ON d1.`type`='2' AND d1.`val`=t.`work_place`
			INNER JOIN ng_info f ON f.`ng_card`=t.`card_number`
			WHERE t.`card_number`='{$d}'
		";
		$res = $this->D->query($sql);
		if($res){
			returnJson(0,$res);
		}else{
			returnJson(-1);
		}
	}

}

