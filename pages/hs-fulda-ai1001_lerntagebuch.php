<?php
$minutes = 0;
$seconds = 0;
clearstatcache();
$lasttime = filemtime('resources/hs-fulda/ai1001-lerntagebuch.html');
$currenttime = time();
$years = date("Y", $lasttime);
$months = date("m", $lasttime);
$days = date("d", $lasttime);
$hours = date("h", $lasttime);
$minutes = date("i", $lasttime);
$seconds = date("s", $lasttime);
// $nexttime = strtotime($years."-".$months."-".$days." ".$hours.":30:00");
$nexttime = strtotime($years."-".$months."-".$days." ".$hours.":".$minutes.":".$seconds." +1 hour");
$deltatime = $nexttime - $currenttime;
$minutes = date("i", $deltatime);
$seconds = date("s", $deltatime);
?>
<div class="container">
	<h3 class="center">Lerntagebuch - AI1001</h3>
	<div class="card">
		<div class="card-content">
			<strong class="right">Nächste Aktualisierung: <?php echo($minutes.":".$seconds);?></strong>
		<h4>Journal</h4>
			<?php echo(file_get_contents('./resources/hs-fulda/ai1001-lerntagebuch.html'))?>
		</div>
	</div>
