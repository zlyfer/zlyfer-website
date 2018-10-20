<html>
	<head>
		<?php
			require_once('./mobileDetect.php');
		?>

		<title>Converter</title>
		<link rel="stylesheet" type="text/css" href="./converter<?php echo(decideMobileDesktop($detect, "_mobile", ""));?>.css"/>
		<script type="text/javascript" src="./converter.js"></script>
		<link type="image/x-icon" rel="shortcut icon" href="./converter.ico">
		<meta name="theme-color" content="#4085f5">
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<link rel="apple-touch-icon" href="./converter.png"/>

		<style>
		img.mainLogo {
		  position: fixed;
		  width: 5vh;
		  height: 5vh;
		  left: 0.8%;
		  opacity: 0.8;
		  cursor: pointer;
		  -webkit-transition: opacity 0.4s ease, -webkit-box-shadow 0.4s ease, -webkit-transform 0.4s ease;
		  transition: opacity 0.4s ease, -webkit-box-shadow 0.4s ease, -webkit-transform 0.4s ease;
		  transition: opacity 0.4s ease, box-shadow 0.4s ease, transform 0.4s ease;
		  transition: opacity 0.4s ease, box-shadow 0.4s ease, transform 0.4s ease, -webkit-box-shadow 0.4s ease, -webkit-transform 0.4s ease;
		  -webkit-transform: scale(0.9);
		  transform: scale(0.9);
		}
		img.mainLogo:hover {
		  opacity: 1;
		  -webkit-transform: scale(1);
		  transform: scale(1);
		}
		img.mainLogo#mainLogoZlyfer {
		  bottom: 1%;
		  border: 1px solid #43A047;
		  -webkit-box-shadow: 1px 1px 10px 1px #43A047;
		  box-shadow: 1px 1px 10px 1px #43A047;
		}
		</style>

	</head>

	<body>

<a href="./../../../index.php"><img class="mainLogo" id="mainLogoZlyfer" src="../../../images/logo.png"></a>

		<hr>
		<h1 id="sitetitle">16 to 10 to 8 to 2 & vice versa</h1>
		<hr>
		<div id="mainbox">
			<div class="box dec">
				<p id="boxtitle">Decimal</p>
				<textarea maxlength="8" id="dec" onKeyUp="from10()" autofocus></textarea>
			</div>
			<div class="box bin">
				<p id="boxtitle">Binary</p>
				<textarea maxlength="24" id="bin" onKeyUp="from2()"></textarea>
			</div>
			<div class="box hex">
				<p id="boxtitle">Hexadecimal</p>
				<textarea maxlength="6" id="hex" onKeyUp="from16()"></textarea>
			</div>
			<div class="box oct">
				<p id="boxtitle">Octal</p>
				<textarea maxlength="8" id="oct" onKeyUp="from8()"></textarea>
			</div>
		</div>

	</body>
</html>
