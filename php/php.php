<?php
error_reporting(0);

function genCards($name) {
	$html = '
	<h3 id="site-title" class="center">'.strtoupper($name).'</h3>
	';
	$sites = scandir('./sites/'.$name.'/');
	for ($i=0; $i < count($sites); $i++) {
		if ($sites[$i] != '.' && $sites[$i] != '..' && $sites[$i] != '.gitkeep') {
			if (file_exists('./sites/'.$name.'/'.$sites[$i].'/.git') || file_exists('./sites/'.$name.'/'.$sites[$i].'/.gitindic')) {
				$ghbtn = '<a class="waves-effect waves-dark btn grey darken-2 grey-text text-lighten-5" href="https://github.com/zlyfer/'.$sites[$i].'">GitHub</a>';
			} else {
				$ghbtn = '<a class="disabled waves-effect waves-dark btn">GitHub</a>';
			}
			$card = '
<div class="parallax-container sites">
<div class="parallax"><img alt="'.strtoupper($sites[$i]).' Banner" src="./images/'.$name.'/'.$sites[$i].'.png"></div>
</div>
<div class="card green sites lighten-5">
<div class="card-content green lighten-3">
<h5 class="grey-text text-darken-3 card-name">'.strtoupper($sites[$i]).'</h5>
'.file_get_contents("./descriptions/".$name.'/'.$sites[$i].".html").'
</div>
<div class="card-action green lighten-3">
<a class="waves-effect waves-dark btn green grey-text text-lighten-5" href="./sites/'.$name.'/'.$sites[$i].'/">Visit Page</a>
'.$ghbtn.'
</div>
</div>'."\n";
			$html = $html.$card;
		}
	}
	echo ($html);
}

$active_data = false;
if (isset($_GET["page"])) {
	$active = $_GET["page"];
}

function genMain() {
	if (isset($_GET["site"])) {
		$site = $_GET["site"];
		$sites = scandir('./sites');
		$site = $_GET["site"];
		array_splice($sites,0,2);
		if (in_array($site, $sites)) {
			genCards($site);
		} else {
			include('./pages/404.php');
		}
	} else if (isset($_GET["page"])) {
		$page = $_GET["page"];
		$pages = scandir('./pages');
		$page = $_GET["page"];
		array_splice($pages,0,2);
		if (in_array($page.'.php', $pages)) {
			include('./pages/'.$page.'.php');
		} else {
			include('./pages/404.php');
		}
	} else {
				include('./pages/home.php');
	}
}
?>
