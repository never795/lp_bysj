<?php
include "/common/file.php";
include "fujian.php";
  $F = new FileUpload();
  $F->upload("pic");
  $fj = $F->upload("pic");
  $fujian = new FJ();

  $res = array();
for($i=0;$i<count($fj);$i++){
	$res[] = $fujian->add($fj[$i]);
}
returnJson(0,$res);