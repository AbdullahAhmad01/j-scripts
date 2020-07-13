<?php

function optionsToArray($dat){
	$bag=[];

	$init_opt = false;
	$init_val = false;
	// $end_opt = false;

	while(strlen($dat)!=""){
		if(!$init_opt){
			if(substr($dat, 0, 7)=="<option")
			$init_opt=true;
			else $dat = substr($dat, 1, strlen($dat)-2);
		}
		else if(!$init_val){
			if($dat[0]==">")
			$init_val=true;
			$dat = substr($dat, 1, strlen($dat)-2);
		}
		else {
			$val = '';
			while(substr($dat, 0, 9)!="</option>"){
				$val.=$dat[0];
				$dat = substr($dat, 1, strlen($dat)-2);
			}
			$bag[]=$val;
			$init_val=false;
			$init_opt=false;
		}
	}

	return $bag;
}
?>
