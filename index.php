<html>
<?php
error_reporting(0);
 function genCards($name) {
		$html = '';
		$pages = scandir('./pages/'.$name.'/');
		for ($i=0; $i < count($pages); $i++) {
			if ($pages[$i] != '.' && $pages[$i] != '..' && $pages[$i] != '.gitkeep') {
				$card = '<div class="col s12 m3">
					<div class="card hoverable">
						<div class="card-image">
							<img src="./images/'.$name.'/'.$pages[$i].'.png">
							<span style="font-weight: bold;" class="grey-text text-darken-3 card-title">'.$pages[$i].'</span>
						</div>
						<div class="card-content">
						'.file_get_contents("./descriptions/".$name.'/'.$pages[$i].".html").'
						</div>
						<div class="card-action">
							<a class="waves-effect waves-dark btn green grey-text text-lighten-5" href="./pages/'.$name.'/'.$pages[$i].'/">Visit Page</a>
						</div>
					</div>
				</div>'."\n";
				$html = $html.$card;
			}
		}
		return $html;
	}
?>
	<head>
		<title>zlyfer - Home</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<link rel="stylesheet" href="./styles/style.css">
		<link rel="apple-touch-icon" href="./images/favicon_mobile.png">
		<link type="image/x-icon" rel="shortcut icon" href="./images/favicon.png">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="theme-color" content="#388e3c">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<script type="text/javascript" src="./jscript/jscript.js"></script>
	</head>

	<body class="">
		<header>
			<div class="navbar-fixed">
				<nav class="green">
					<ul class="left hide-on-med-and-down">
						<li class="waves-effect tooltipped"><a href="./?page=home">Home</a></li>
						<li class="waves-effect tooltipped"><a href="./?page=games">Games</a></li>
						<li class="waves-effect tooltipped"><a href="./?page=visual-demonstrations">Visual Demonstrations</a></li>
						<li class="waves-effect tooltipped"><a href="./?page=bbs2-emden">BBS II Emden</a></li>
						<li class="waves-effect tooltipped"><a href="./?page=miscellaneous">Miscellaneous</a></li>
					</ul>
					<ul class="right hide-on-med-and-down">
						<li><a class="waves-effect" href="./?page=impressum">Impressum</a></li>
					</ul>
					<a href="#" data-target="slide-out" class="sidenav-trigger hide-on-large-only"><i class="material-icons">menu</i></a>
					<span class="brand-logo center hide-on-large-only">Home</span>
				</nav>
			</div>
			<ul id="slide-out" class="sidenav">
				<li><a class="waves-effect" href="./?page=home"><i class="material-icons">home</i>Home</a></li>
				<li><a class="waves-effect" href="./?page=games"><i class="material-icons">insert_emoticon</i>Games</a></li>
				<li><a class="waves-effect" href="./?page=visual-demonstrations"><i class="material-icons">filter_tilt_shift</i>Visual Demonstrations</a></li>
				<li><a class="waves-effect" href="./?page=bbs2emden"><i class="material-icons">school</i>BBS II Emden</a></li>
				<li><a class="waves-effect" href="./?page=miscellaneous"><i class="material-icons">bubble_chart</i>Miscellaneous</a></li>
				<li>
					<div class="divider"></div>
				</li>
				<li><a class="waves-effect" href="./?page=impressum"><i class="material-icons">info</i>Impressum</a></li>
			</ul>
		</header>

		<main>
			<div class="parallax-container">
				<div class="parallax"><img src="./images/banner.png"></div>
			</div>
			<div class="row">
<?php
	$pages = scandir('./pages');
	if ($_GET["page"] == "." || $_GET["page"] == "..") {
		include('./home.html');
	} else if ($_GET["page"] == "impressum") {
		include('./impressum.html');
	} else if (in_array($_GET["page"], $pages)) {
		echo(genCards($_GET["page"]));
	} else {
		include('./home.html');
	}
?>
			</div>
		</main>

		<footer class="page-footer green darken-2">
			<div class="footer-copyright">
				<div class="container">
					<span class="left">© 2018 Frederik Shull</span>
					<a class="hoverable waves-effect waves-dark btn right grey-text text-lighten-5 green darken-2" href="https://www.deviantart.com/zlyfer">DeviantArt</a>
					<a class="hoverable waves-effect waves-dark btn right grey-text text-lighten-5 blue darken-2" href="https://www.facebook.com/frederik.shull">Facebook</a>
					<a class="hoverable waves-effect waves-dark btn right grey-text text-lighten-5 red darken-2" href="https://www.youtube.com/channel/UCz57bHmcp5TGRY6URQYWLkQ">Youtube</a>
					<a class="hoverable waves-effect waves-dark btn right grey-text text-lighten-5 grey darken-2" href="https://github.com/zlyfer">GitHub</a>
				</div>
			</div>
		</footer>
	</body>

</html>
