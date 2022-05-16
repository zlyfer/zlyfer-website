<?php
	$output = shell_exec('git pull');
	$fp = fopen('output.txt', 'w');
	fwrite($fp, $output);
	echo $output; 
?>