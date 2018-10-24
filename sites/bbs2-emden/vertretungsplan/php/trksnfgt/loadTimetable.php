<?php
	function loadTimetable($user, $tage, $stunden, $sql){
		$UWGW = array("UW", "GW"); //Wechsel zwischen UW GW
		
		for($w = 0; $w < 2; $w++){ //Wechsel UW(0) GW (1) und Auswahl des stundenplans
			$result = $sql->query("SELECT * FROM plaene WHERE user = '".$user."".$UWGW[$w]."'"); //Auswahl des stundenplans
			
			if($result->num_rows > 0){
				$result = $result->fetch_assoc();
				
				for($r = 0; $r < 6; $r++){
					for($c = 0; $c < 5; $c++){
						$pointer = "".$tage[1][$c]."".$stunden[1][$r]."";
						$plan[$w][$c][$r][0] = $result[$pointer];
					}
				}
				
			}else{
				
			}
		}
		
		for($r = 0; $r < 6; $r++){ //GW UW Vereinen
			for($c = 0; $c < 5; $c++){
				if($plan[0][$c][$r][0] == $plan[1][$c][$r][0]){
					$plan[2][$c][$r][4] = "W";
					$plan[2][$c][$r][0] = $plan[0][$c][$r][0];
				}elseif($plan[0][$c][$r][0] == "Frei" && $plan[1][$c][$r][0] != "Frei"){
					$plan[2][$c][$r][4] = "GW";
					$plan[2][$c][$r][0] = $plan[1][$c][$r][0];
				}else{
					$plan[2][$c][$r][4] = "UW";	
					$plan[2][$c][$r][0] = $plan[0][$c][$r][0];
				}
			}
		}
		
		for($r = 0; $r < 6; $r++){
			for($c = 0; $c < 5; $c++){
				if($plan[2][$c][$r][0] == "Frei"){
					$plan[2][$c][$r][1] = null;
					$plan[2][$c][$r][2] = null;
					$plan[2][$c][$r][3] = null;
					$plan[2][$c][$r][4] = null;
				}else{
					$result = $sql->query("SELECT * FROM kurse WHERE KursID = '".$plan[2][$c][$r][0]."'");
					
					if($result->num_rows > 0){
						$result = $result->fetch_assoc();
						$plan[2][$c][$r][1] = $result['Fach'];
						$plan[2][$c][$r][2] = $result['Lehrer'];
					}
					
					
					$result = $sql->query("
						SELECT raum FROM raumverteilung WHERE 
							kurs = '".$plan[2][$c][$r][0]."' AND
							zeitpunkt = '".$tage[1][$c]."".$stunden[1][$r]."' AND
							woche = '".$plan[2][$c][$r][4]."'
					");
					
					if($result->num_rows > 0){
						$result = $result->fetch_assoc();
						$plan[2][$c][$r][3] = $result['raum'];
					}
				}
			}
		}
		
		return $plan[2];
	} //Stundenplan wird aus der datenbank gewählt
?>