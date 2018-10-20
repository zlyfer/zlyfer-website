<?php
error_reporting(0);

function genCards($name) {
	$html = '<h3 class="center">'.strtoupper($name).'</h3>';
	$pages = scandir('./pages/'.$name.'/');
	for ($i=0; $i < count($pages); $i++) {
		if ($pages[$i] != '.' && $pages[$i] != '..' && $pages[$i] != '.gitkeep') {
			if (file_exists('./pages/'.$name.'/'.$pages[$i].'/.git')) {
				$ghbtn = '<a class="waves-effect waves-dark btn grey darken-2 grey-text text-lighten-5" target="_blank" href="https://github.com/zlyfer/'.$pages[$i].'">GitHub</a>';
			} else {
				$ghbtn = '<a class="disabled waves-effect waves-dark btn">GitHub</a>';
			}
			$card = '
<div class="card">
<div class="card-image">
<img src="./images/'.$name.'/'.$pages[$i].'.png">
</div>
<div class="card-content">
<h5 style="font-weight: bold;" class="grey-text text-darken-3">'.strtoupper($pages[$i]).'</h5>
'.file_get_contents("./descriptions/".$name.'/'.$pages[$i].".html").'
</div>
<div class="card-action">
<a class="waves-effect waves-dark btn green grey-text text-lighten-5" target=_blank" href="./pages/'.$name.'/'.$pages[$i].'/">Visit Page</a>
'.$ghbtn.'
</div>
</div>'."\n";
			$html = $html.$card;
		}
	}
	return $html;
}

$active_data = false;
if (isset($_GET["page"])) {
	$active = $_GET["page"];
}
?>
