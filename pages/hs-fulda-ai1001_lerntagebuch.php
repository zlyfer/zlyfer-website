<?php
clearstatcache();
$currenttime = time();
$cm = gmDate('i', $currenttime);
$cs = gmDate('s', $currenttime);

$lasttime = filemtime('resources/hs-fulda/ai1001-lerntagebuch.html');
$lh = gmDate('H', $lasttime) + 1;
$lm = gmDate('i', $lasttime);
$ls = gmDate('s', $lasttime);

// Calculate next refresh time;
if ($cm < $lm) {
	$dm = $lm - $cm;
} else {
	$dm = 60 - ($cm - $lm) - 1 - 1; // - another one for a reason I'll discover next time
}
if ($cs < $ls) {
	$ds = $ls - $cs;
} else {
	$ds = 60 - ($cs - $ls) - 1;
}

// Add leading zero if necessary.
if ($lh < 10) {
	$lh = "0".$lh;
}
if ($dm < 10) {
	$dm = "0".$dm;
}
if ($ds < 10) {
	$ds = "0".$ds;
}
?>
<div class="container">
	<h3 class="center">Lerntagebuch - AI1001</h3>
	<div class="card">
		<div class="card-content">
			<strong class="left">Letzte Aktualisierung: <span id="last_time"><?php echo($lh.":".$lm.":".$ls); ?></span></strong>
			<strong class="right">Nächste Aktualisierung: <span id="next_time"><?php echo($dm.":".$ds); ?></span></strong>
			<br>
			<?php echo(file_get_contents('./resources/hs-fulda/ai1001-lerntagebuch.html'))?>
		</div>
	</div>
