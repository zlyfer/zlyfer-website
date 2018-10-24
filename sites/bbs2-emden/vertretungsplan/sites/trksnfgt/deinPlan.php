<?php
	//*
	if(!isset($_SESSION['ausgewaehlterKurs'][0])){ //{Nummer}{0 KursID, 1 Zeitpunkt, 2 Woche}
		$_SESSION['ausgewaehlterKurs'][0] = array("Frei", "", "W");
	}
	//*/

	//*
	$output['timetable'] = ""; //AusgabeStundenplan
	$output['error'] = ""; //Fehlermeldungen
	$output['empfehlungen'] = ""; //Kursempfehlungen
	//*/

	//*
	include('././php/array_days_hours.php');
	include('././php/hasHeATimetable.php');
	include('././php/loadTimetable.php');
	include('././php/newCourse.php');
	include('././php/setCourse.php');
	include('././php/showRecommends.php');
	include('././php/showTimetable.php');
	include('././php/trimTimetable.php');
	//*/

	//*
	$output['error'] = hasHeATimetable($_SESSION['username'], $sql);

	$timetable = loadTimetable($_SESSION['username'], $days, $hours, $sql);
	//*/

	//*
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if(isset($_POST['zeitpunkt'])){
			$output['empfehlungen'] .= showRecommends($_POST['zeitpunkt'], $sql);
			$_SESSION['ausgewaehlterKurs'][0][1] = $_POST['zeitpunkt'];
		}

		if(isset($_POST['kurswechselnummer'])){
			$nummer = $_POST['kurswechselnummer'];
			$output['empfehlungen'] .= setCourse($_SESSION['username'], $_SESSION['ausgewaehlterKurs'][$nummer][1], $_SESSION['ausgewaehlterKurs'][$nummer][0], $_SESSION['ausgewaehlterKurs'][$nummer][2], $sql);
			$timetable = showTimetable($_SESSION['username'], $days, $hours, $sql);
			$timetable = trimTimetable($timetable);
		}

		if(isset($_POST['lehrer'])){
			$output['empfehlungen'] .= newCourse($_POST['kurs'], $_POST['lehrer'], $_POST['fach'], $_SESSION['ausgewaehlterKurs'][0][1], $_POST['woche'], $_POST['raum'], $sql);
		}
	}
	//*/

	//*
	$timetable = trimTimetable($timetable);
	$output['timetable'] .= showTimetable($timetable, $days, $hours);
	//*/
?>
<div id="">
	<h2>Dein Plan</h2>
	<?php echo $output['timetable'];?>
</div>
<div id="">
	<h2>Vorgeschlagene Kurse:</h2>
	<?php echo $output['empfehlungen']; ?>
	<form method="POST" action='<?php echo htmlspecialchars("./index.php");?>'>
	</form>
	<h2>Neuen Kurs erstellen:</h2>
	<form id="formNeuerKurs" method="post" action='<?php echo htmlspecialchars("./deinPlan.php");?>'>
		<input type="text" name="kurs" placeholder="Kurs" required>
		<input type="text" name="fach" placeholder="Fach" required>
		<input type="text" name="lehrer" placeholder="Lehrer" required>
		<input type="text" name="raum" placeholder="Raum" required>
		<input type="text" name="woche" placeholder="Woche" value="W" required>
		<input type="submit" name="neuerKurs" value="Senden">
	</form>
</div>
<div id="">
	<?php
	if($_SESSION['permission'] > 98/*true*/){
			echo "<h3>Entwicklerinfos</h3>";

			echo $output['error'];
			var_dump($_SESSION);
			var_dump($days);
			var_dump($hours);
		}
	?>
</div>
