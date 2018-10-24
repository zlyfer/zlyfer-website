<?php
clearstatcache();
$currenttime = time();
$lasttime = filemtime('resources/hs-fulda/ai1001-lerntagebuch.html');
$nexttime = strtotime(date("Y-m-d H:i:s", $lasttime)." +1 hour");
echo ($lasttime."--".$nexttime."--".$currenttime);
$deltatime = $nexttime - $currenttime;
?>
<div class="container">
	<h3 class="center">Lerntagebuch - AI1001</h3>
	<div class="card">
		<div class="card-content">
			<!-- <strong class="right">Nächste Aktualisierung: <?php echo(date("H:i:s", $deltatime));?></strong> -->
		<h4>Journal</h4>
			<?php echo(file_get_contents('./resources/hs-fulda/ai1001-lerntagebuch.html'))?>
		</div>
	</div>
