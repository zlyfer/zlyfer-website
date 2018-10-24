<?php
	function showTimetable($timetable, $days, $hours){
		$output = "";
		
		$output .= "<table><tr><th>Zeit</th>";

		for($c = 0; $c < 5; $c++){
			$output .= "<th>".$days[0][$c]."</th>"; //Kopfzeile Wochentage
		}
		$output .= "</tr>";
	
		for($r = 0; $r < 6; $r++){
			$output .= "<tr><td>".$hours[0][$r]."</td>"; //Linke Spalte Zeiten
			for($c = 0; $c < 5; $c ++){ //Die Jeweiligen Fächer, $c = Tage und $r = Zeiten
				$zeitpunkt = $days[1][$c];
				$zeitpunkt .= $hours[1][$r];
				
				$output .= 
					"<td><button onclick=\"forward(['zeitpunkt', 'site'], ['$zeitpunkt', 'stundenplan'])\">
					"/*.$timetable[$c][$r][4].*/.$zeitpunkt.
					"<br>".$timetable[$c][$r][0].
					"<br>".$timetable[$c][$r][1].
					"<br>".$timetable[$c][$r][2].
					"<br>".$timetable[$c][$r][3].
					"</button></td>"; 
			}
			$output .= "</tr>";
		}
	
		$output .= "</table>";
		
		return $output;
	}
?>