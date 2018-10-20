<html>
<?php include('./php/php.php');?>
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
						<li class="<?php if ($active == "home") {echo("active");}?> waves-effect"><a href="./?page=home">Home</a></li>
						<li class="<?php if ($active == "games") {echo("active");}?> waves-effect"><a href="./?page=games">Games</a></li>
						<li class="<?php if ($active == "visual-demonstrations") {echo("active");}?> waves-effect"><a href="./?page=visual-demonstrations">Visual Demonstrations</a></li>
						<li class="<?php if ($active == "bbs2-emden") {echo("active");}?> waves-effect"><a href="./?page=bbs2-emden">BBS II Emden</a></li>
						<li class="<?php if ($active == "miscellaneous") {echo("active");}?> waves-effect"><a href="./?page=miscellaneous">Miscellaneous</a></li>
					</ul>
					<ul class="right hide-on-med-and-down">
						<li><a class="waves-effect" href="./?page=impressum">Impressum</a></li>
					</ul>
					<a href="#" data-target="slide-out" class="sidenav-trigger hide-on-large-only"><i class="material-icons">menu</i></a>
					<span class="brand-logo center hide-on-large-only">Home</span>
				</nav>
			</div>
			<ul id="slide-out" class="sidenav">
				<li><a class="<?php if ($active == "home") {echo("grey lighten-1");}?> waves-effect" href="./?page=home"><i class="material-icons">home</i>Home</a></li>
				<li><a class="<?php if ($active == "games") {echo("grey lighten-1");}?> waves-effect" href="./?page=games"><i class="material-icons">insert_emoticon</i>Games</a></li>
				<li><a class="<?php if ($active == "visual-demonstrations") {echo("grey lighten-1");}?> waves-effect" href="./?page=visual-demonstrations"><i class="material-icons">filter_tilt_shift</i>Visual Demonstrations</a></li>
				<li><a class="<?php if ($active == "bbs2-emden") {echo("grey lighten-1");}?> waves-effect" href="./?page=bbs2-emden"><i class="material-icons">school</i>BBS II Emden</a></li>
				<li><a class="<?php if ($active == "miscellaneous") {echo("grey lighten-1");}?> waves-effect" href="./?page=miscellaneous"><i class="material-icons">bubble_chart</i>Miscellaneous</a></li>
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
			<div class="container">
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
			<div class="container center">
				<a class="hoverable waves-effect waves-dark btn grey-text text-lighten-5 grey darken-2" target="_blank" href="https://github.com/zlyfer">GitHub</a>
				<a class="hoverable waves-effect waves-dark btn grey-text text-lighten-5 red darken-2" target="_blank" href="https://www.youtube.com/channel/UCz57bHmcp5TGRY6URQYWLkQ">Youtube</a>
				<a class="hoverable waves-effect waves-dark btn grey-text text-lighten-5 blue darken-2" target="_blank" href="https://www.facebook.com/frederik.shull">Facebook</a>
				<a class="hoverable waves-effect waves-dark btn grey-text text-lighten-5 pink darken-2" target="_blank" href="https://www.instagram.com/zlyfer/">Instagram</a>
				<a class="hoverable waves-effect waves-dark btn grey-text text-lighten-5 green darken-1" target="_blank" href="https://steamcommunity.com/id/zlyfer/">Spotify</a>
				<a class="hoverable waves-effect waves-dark btn grey-text text-lighten-5 grey darken-3" target="_blank" href="https://open.spotify.com/user/zlyfer">Steam</a>
				<a class="hoverable waves-effect waves-dark btn grey-text text-lighten-5 green darken" target="_blank" href="https://www.deviantart.com/zlyfer">DeviantArt</a>
				<a class="hoverable waves-effect waves-dark btn grey-text text-lighten-5 purple darken-2" target="_blank" href="https://www.twitch.tv/ziyfer">Twitch</a>
				<div class="row"></div>
			</div>
				<div class="footer-copyright">
					<div class="container">
					© 2018 Frederik Shull
				</div>
			</div>
		</footer>
	</body>

</html>
