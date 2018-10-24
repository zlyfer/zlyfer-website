<?php
	function showRecommends($zeitpunkt, $sql){
		$rueckgabe = "Kurse zum Zeitpunkt: $zeitpunkt <br>";
		$result = $sql->query("SELECT * FROM raumverteilung WHERE zeitpunkt = '$zeitpunkt'");
		
		if($result->num_rows > 0){
			$rueckgabe .= "<button type='submit' name='kurswechselnummer' value='0'>Frei</button>";
			$i = 0;
			while($row = $result->fetch_assoc()){
				
				$rueckgabewert[$i][0] = $row['kurs'];
				$rueckgabewert[$i][3] = $row['raum'];
				$rueckgabewert[$i][4] = $row['woche'];
				
				$result1 = $sql->query("SELECT lehrer, Fach FROM kurse WHERE kursID = '".$row['kurs']."'");
				
				$result1 = $result1->fetch_assoc();
				
				$rueckgabewert[$i][1] = $result1['Fach'];
				$rueckgabewert[$i][2] = $result1['lehrer'];
				$i++;
			}
			
			$arrle = count($rueckgabewert);
			
			for($n = 0; $n < $arrle; $n++){
				$kursnummer = $n + 1;
				$_SESSION['ausgewaehlterKurs'][$kursnummer] = array($rueckgabewert[$n][0], $zeitpunkt, $rueckgabewert[$n][4]);
				$rueckgabe .= "
					<button type='submit' name='kurswechselnummer' value='$kursnummer'>
						".$rueckgabewert[$n][4]."<br>
						".$rueckgabewert[$n][0]."<br>
						".$rueckgabewert[$n][1]."<br>
						".$rueckgabewert[$n][2]."<br>
						".$rueckgabewert[$n][3]."
					</button>
				";
			}
		}else{
			$rueckgabe .= "Es wurden keine Kurse zu diesem Zeitpunkt gefunden.";
		}
		
		return $rueckgabe;
	} //empfehlungen werden für Zeitpunkt X gezeigt
?>