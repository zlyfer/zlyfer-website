<html>
<?php include('./php/php.php');?>
	<head>
		<title>zlyfer</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<link rel="stylesheet" href="./styles/style.css">
		<link rel="apple-touch-icon" href="./images/favicon_mobile.png">
		<link type="image/x-icon" rel="shortcut icon" href="./images/favicon.png">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="theme-color" content="#4CAF50">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<script type="text/javascript" src="./jscript/jscript.js"></script>
	</head>

	<body>
		<header>
			<div class="navbar-fixed hide-on-med-and-down">
				<nav id="navbar" class="green lighten-1">
					<ul class="left">
						<li class="<?php if ($active == "home") {echo("active");}?> waves-effect"><a href="./?page=home">Home</a></li>
						<li class="<?php if ($active == "games") {echo("active");}?> waves-effect"><a href="./?site=games">Games</a></li>
						<li class="<?php if ($active == "visual-demonstrations") {echo("active");}?> waves-effect"><a href="./?site=visual-demonstrations">Visual Demonstrations</a></li>
						<li class="<?php if ($active == "bbs2-emden") {echo("active");}?> waves-effect"><a href="./?site=bbs2-emden">BBS II Emden</a></li>
						<li class="<?php if ($active == "hs-fulda") {echo("active");}?> waves-effect"><a href="./?site=hs-fulda">HS Fulda</a></li>
						<li class="<?php if ($active == "miscellaneous") {echo("active");}?> waves-effect"><a href="./?site=miscellaneous">Miscellaneous</a></li>
					</ul>
					<ul class="right">
						<li class="<?php if ($active == "impressum") {echo("active");}?> waves-effect"><a href="./?page=impressum">Impressum</a></li>
					</ul>
				</nav>
			</div>

			<div class="navbar-fixed hide-on-large-only">
				<nav id="mobile-nav" class="green lighten-1">
					<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons waves-effect">menu</i></a>
				</nav>
			</div>
			<ul id="slide-out" class="sidenav">
				<li><a class="subheader">Pages</a></li>
				<li><a class="<?php if ($active == "home") {echo("grey lighten-1");}?> waves-effect" href="./?page=home"><i class="material-icons">home</i>Home</a></li>
				<li><a class="<?php if ($active == "impressum") {echo("grey lighten-1");}?> waves-effect" href="./?page=impressum"><i class="material-icons">info</i>Impressum</a></li>
				<li><a class="subheader">Sites</a></li>
				<li><a class="<?php if ($active == "games") {echo("grey lighten-1");}?> waves-effect" href="./?site=games"><i class="material-icons">insert_emoticon</i>Games</a></li>
				<li><a class="<?php if ($active == "visual-demonstrations") {echo("grey lighten-1");}?> waves-effect" href="./?site=visual-demonstrations"><i class="material-icons">filter_tilt_shift</i>Visual Demonstrations</a></li>
				<li><a class="<?php if ($active == "bbs2-emden") {echo("grey lighten-1");}?> waves-effect" href="./?site=bbs2-emden"><i class="material-icons">school</i>BBS II Emden</a></li>
				<li><a class="<?php if ($active == "hs-fulda") {echo("grey lighten-1");}?> waves-effect" href="./?site=hs-fulda"><i class="material-icons">school</i>HS Fulda</a></li>
				<li><a class="<?php if ($active == "miscellaneous") {echo("grey lighten-1");}?> waves-effect" href="./?site=miscellaneous"><i class="material-icons">bubble_chart</i>Miscellaneous</a></li>
			</ul>
		</header>

		<main>
<?php
genMain();
?>
		</main>

		<footer class="page-footer green">
			<div class="container center">
				<a class="hoverable waves-effect waves-dark btn grey-text text-lighten-5 grey darken-2" href="https://github.com/zlyfer">GitHub</a>
				<a class="hoverable waves-effect waves-dark btn grey-text text-lighten-5 red darken-2" href="https://www.youtube.com/channel/UCz57bHmcp5TGRY6URQYWLkQ">Youtube</a>
				<a class="hoverable waves-effect waves-dark btn grey-text text-lighten-5 blue darken-2" href="https://www.facebook.com/frederik.shull">Facebook</a>
				<a class="hoverable waves-effect waves-dark btn grey-text text-lighten-5 pink darken-2" href="https://www.instagram.com/zlyfer/">Instagram</a>
				<a class="hoverable waves-effect waves-dark btn grey-text text-lighten-5 green darken-1" href="https://steamcommunity.com/id/zlyfer/">Spotify</a>
				<a class="hoverable waves-effect waves-dark btn grey-text text-lighten-5 grey darken-3" href="https://open.spotify.com/user/zlyfer">Steam</a>
				<a class="hoverable waves-effect waves-dark btn grey-text text-lighten-5 green darken" href="https://www.deviantart.com/zlyfer">DeviantArt</a>
				<a class="hoverable waves-effect waves-dark btn grey-text text-lighten-5 purple darken-2" href="https://www.twitch.tv/ziyfer">Twitch</a>
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
