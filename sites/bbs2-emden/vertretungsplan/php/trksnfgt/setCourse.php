<?php
	function setCourse($user, $zeitpunkt, $kurs, $woche, $sql){
		if($woche == "W"){
			$row = $user ."GW";
			for($n = 0;$n < 2; $n++){
				$sql->query("UPDATE plaene SET $zeitpunkt = '$kurs' WHERE user = '$row'");
				
				$row = $user ."UW";
			}
			return "Set $zeitpunkt zu $kurs in UWGW";
		}else{
			$row = "$user$woche";
			$sql->query("UPDATE plaene SET $zeitpunkt = '$kurs' WHERE user = '$row'");
			return "Set $zeitpunkt zu $kurs in $woche";
		}
		return "$user, $zeitpunkt, $kurs, $woche";
	} //Kurs wird zu zeitpunkt X gesetzt
?>