<?php
	function newCourse($kurs, $lehrer, $fach, $zeitpunkt, $woche, $raum, $sql){
		$return = "";
		$result = $sql->query("SELECT * FROM kurse WHERE KursID = '$kurs'");
		
		if($result->num_rows == 0){
			$sql->query("INSERT INTO kurse (kursID, Lehrer, Fach) VALUES ('$kurs', '$lehrer', '$fach')");
		}
		
		$result1 = $sql->query("SELECT * FROM raumverteilung WHERE kurs = '$kurs' AND zeitpunkt = '$zeitpunkt' AND woche = '$woche'");
		
		if($result1->num_rows == 0){
			$sql->query("INSERT INTO raumverteilung (kurs, zeitpunkt, woche, raum) VALUES ('$kurs', '$zeitpunkt', '$woche', '$raum')");
		}
	} //Hinzufügen eines neuen Kurses in die Datenbank
?>