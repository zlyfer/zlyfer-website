<?php

    $map = $_GET['mapname'];
    $steamid = $_GET['steamid'];
				include('/home/zlyfer/tokens/steam-api_credentials.php');
    $steamapiurl = "https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=".$steam_api_key."&steamids=" . $steamid;

    ini_set("allow_url_fopen", 1);

    $json = file_get_contents($steamapiurl);
    $decodedjson = json_decode($json, TRUE);
    $steamapiclient = $decodedjson["response"]["players"][0];

?>
