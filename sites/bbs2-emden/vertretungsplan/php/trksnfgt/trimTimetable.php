<?php
	function trimTimetable($plan){
		for($r = 0; $r < 6; $r++){
			for($c = 0; $c < 5; $c++){
				if($plan[$c][$r][4] == "W"){
					$plan[$c][$r][4] =  null;
				}
				if($plan[$c][$r][0] == "Frei"){
					$plan[$c][$r][0] =  null;
				}
			}
		}
		
		return $plan;
	} //Kürzen von Informationen welche nicht angezeigt werden müssen
?>