<html>
	<head>
        <title>Loading</title>
        <meta charset='utf-8'>
        <?php
        require_once("./php/php.php");
        ?>
        <script src="./jscript/jscript.js"></script>
        <link rel="stylesheet" type="text/css" href="./css/css.css">
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
		<!--<a href="./../../index.php"><img class="mainLogo" id="mainLogoZlyfer" src="../../images/logo.png"></a>-->
        <p class="vanish infotext" id="servername"></p>
        <p class="vanish infotext" id="clientusername">Welcome <?php echo ($steamapiclient["personaname"]);?>!</p>
        <p class="vanish infotext infotext2" id="mapname">Current Map: <span class="red"><?php echo ($map); ?></span></p>
        <p class="vanish" id="message" onclick="AddMessageToBuffer('Downloading files', 'test')" ></p>
        <p class="vanish infotext infotext2" id="csstext">You need the <span class="red">CSS-Textures</span> for this server!</p>
        <p class="vanish infotext infotext2" id="collection">Download zlyfer's TTT Collection: <span class="red"><a href="http://tiny.cc/zlyfattt">tiny.cc/zlyfattt</a></span></p>
        <p class="vanish infotext infotext2" id="collection">Join our Discord: <span class="red"><a href="https://discord.gg/ZtZqsTp">https://discord.gg/ZtZqsTp</a></span></p>
		<p class="vanish infotext infotext2" id="rules">Server Rule: The <span class="red">Voice chat</span> is only allowed if you are at least <span class="red">16 years</span> old!</p>
        <img id="clientavatar" onclick="SetStatusChanged('Sending client info...')" src="<?php echo ($steamapiclient["avatarfull"]); ?>">
        <div onclick="SetFilesTotal(1), SetFilesNeeded(1), DownloadingFile(1)" class="vanish" id="progressbar">
            <p class="vanish progressbartext" id="percentfiles">0</p>
            <p class="vanish progressbartext" id="totalfiles">0</p>
            <p class="vanish progressbartext" id="files">0</p>
            <div class="vanish" id="filled">
            </div>
        </div>

        <script>
            if (document.getElementById("servername").innerHTML == "") {
                document.getElementById("servername").innerHTML = "Joining server..";
            }
            if (document.getElementById("mapname").innerHTML == "") {
                document.getElementById("mapname").style.display = "none";
            }
            if (document.getElementById("clientusername").innerHTML == "Welcome !") {
                document.getElementById("clientusername").style.display = "none";
                document.getElementById("clientavatar").src = "https://zlyfer.de/games/gmod_ttt/images/serverlogo.png";
            }
        </script>

    </body>
</html>
