<?php
	function hasHeATimetable($user, $sql){
		$result = $sql->query("SELECT * FROM plaene WHERE user = '".$user."GW'");
		
		if($result->num_rows == 0){
			$week = "GW";
			for($n = 0; $n < 2; $n++){
				$sql->query("INSERT INTO plaene (user) VALUES ('$user$week')");
				$week = "UW";
			}
			return "Neuer Plan angelegt";
		}else{
			return "Nutzer besitzt bereits einen Plan in der DB";
		}
	}
?>