<?php
$minutes = 0;
$seconds = 0;
clearstatcache();
$currenttime = time();
$lasttime = filemtime('resources/hs-fulda/ai1001-lerntagebuch.html');
$years = date("Y", $lasttime);
$months = date("m", $lasttime);
$days = date("d", $lasttime);
$hours = date("h", $lasttime);
$minutes = date("i", $lasttime);
$seconds = date("s", $lasttime);
$nexttime = strtotime($years."-".$months."-".$days." ".$hours.":".$minutes.":".$seconds." +1 hour");
$deltatime = $nexttime - $currenttime;
?>
<div class="container">
	<h3 class="center">Lerntagebuch - AI1001</h3>
	<div class="card">
		<div class="card-content">
			<strong class="right">Nächste Aktualisierung: <?php echo(date("h:i:s", $deltatime));?></strong>
		<h4>Journal</h4>
			<?php echo(file_get_contents('./resources/hs-fulda/ai1001-lerntagebuch.html'))?>
		</div>
	</div>
