<?php
$parameters = ["Kurs", "Stunde", "Fach", "Raum", "Lehrer", "Info", "Vertretungstext", "Datum", "Wochentag"];
$interface = true;
$list = [];
for ($i = 0; $i < count($parameters); $i++) {
    if (isset($_GET[$parameters[$i]])) {
        array_push($list, $parameters[$i]);
    }
}
if (isset($_GET['interface'])) {
    $interface = array("false"=>false, "true"=>true)[$_GET['interface']];
} else {
    $interface = true;
}
$json = "";
if ($interface == false) {
    require_once("./php/mysql_connect.php");
    $table = "Vertretungsplan";
    if (isset($_GET['vsnormal'])) {
        if ($_GET['vsnormal'] == "false") {
            $table = $table."History";
        }
    }
    $query = $sql->query("SELECT * FROM $table");
    $json = $json."{\n	";
    // echo("{\n	");
    $json = $json."\"vertretungen\": [\n		";
    // echo("\"vertretungen\": [\n		");
    if ($query->num_rows > 0) {
        $found = false;
        $totalcount = 0;
        while ($index = $query->fetch_assoc()) {
            $valid = true;
            for ($i = 0; $i < count($list); $i++) {
                if (strpos($index[$list[$i]], $_GET[$list[$i]]) !== 0) {
                    $valid = false;
                }
            }
            if ($valid == true) {
                if ($found == true) {
                    $json = $json.",\n		";
                    // echo(",\n		");
                }
                $read = false;
                $json = $json."{\n			";
                // echo("{\n			");
                if ($_GET['kurs'] != "false") {
                    $json = $json."\"kurs\": \"".$index['Kurs']."\"";
                    // echo("\"kurs\": \"".$index['Kurs']."\"");
                    $read = true;
                }
                if ($_GET['stunde'] != "false") {
                    if ($read == true) {
                        $json = $json.",\n			";
                        // echo(",\n			");
                    }
                    $json = $json."\"stunde\": \"".$index['Stunde']."\"";
                    // echo("\"stunde\": \"".$index['Stunde']."\"");
                    $read = true;
                }
                if ($_GET['fach'] != "false") {
                    if ($read == true) {
                        $json = $json.",\n			";
                        // echo(",\n			");
                    }
                    $json = $json."\"fach\": \"".$index['Fach']."\"";
                    // echo("\"fach\": \"".$index['Fach']."\"");
                    $read = true;
                }
                if ($_GET['raum'] != "false") {
                    if ($read == true) {
                        $json = $json.",\n			";
                        // echo(",\n			");
                    }
                    $json = $json."\"raum\": \"".$index['Raum']."\"";
                    // echo("\"raum\": \"".$index['Raum']."\"");
                    $read = true;
                }
                if ($_GET['lehrer'] != "false") {
                    if ($read == true) {
                        $json = $json.",\n			";
                        // echo(",\n			");
                    }
                    $json = $json."\"lehrer\": \"".$index['Lehrer']."\"";
                    // echo("\"lehrer\": \"".$index['Lehrer']."\"");
                    $read = true;
                }
                if ($_GET['info'] != "false") {
                    if ($read == true) {
                        $json = $json.",\n			";
                        // echo(",\n			");
                    }
                    $json = $json."\"info\": \"".$index['Info']."\"";
                    // echo("\"info\": \"".$index['Info']."\"");
                    $read = true;
                }
                if ($_GET['vertretungstext'] != "false") {
                    if ($read == true) {
                        $json = $json.",\n			";
                        // echo(",\n			");
                    }
                    $json = $json."\"vertretungstext\": \"".$index['Vertretungstext']."\"";
                    // echo("\"vertretungstext\": \"".$index['Vertretungstext']."\"");
                    $read = true;
                }
                if ($_GET['datum'] != "false") {
                    if ($read == true) {
                        $json = $json.",\n			";
                        // echo(",\n			");
                    }
                    $json = $json."\"datum\": \"".$index['Datum']."\"";
                    // echo("\"datum\": \"".$index['Datum']."\"");
                    $read = true;
                }
                if ($_GET['wochentag'] != "false") {
                    if ($read == true) {
                        $json = $json.",\n			";
                        // echo(",\n			");
                    }
                    $json = $json."\"wochentag\": \"".$index['Wochentag']."\"";
                    // echo("\"wochentag\": \"".$index['Wochentag']."\"");
                    $read = true;
                }
                $json = $json."\n		}";
                // echo("\n		}");
                $found = true;
                $totalcount++;
            }
        }
    }
    $json = $json."\n	]";
    // echo("\n	]");
    $json = $json."\n}";
    // echo("\n}");
    if (isset($_GET['plainjson'])) {
        if ($_GET['plainjson'] == "false") {
            // echo("<script> var result = ".$json."; </script>");
            echo("var result = ".$json.";");
        }
    }
    if (isset($_GET['javascript'])) {
        if ($_GET['javascript'] == "false") {
            echo($json);
        }
    }
    exit();
}
?>
<html>
    <head>
        <title>API Link Generator | BBS2 Vertretungsplan</title>
        <script type="text/javascript" src="./jscript/api.js"></script>
        <link rel="stylesheet" type="text/css" href="./styles/api_style.css">
        <link type="image/x-icon" rel="shortcut icon" href="./images/favicon.ico">
    </head><!--
    --><body><!--
        --><div id="io"><!--
            --><input id="input" spellcheck="false" class="text" type=text placeholder="API Parameter"/><!--
            --><input readonly id="output" spellcheck="false" class="text" type=text placeholder="https://api.vplan.zlyfer.net/?interface=false&vshistory=false&javascript=false"/><!--
            --><input id="copy" class="button" type=button value="Kopieren"/><!--
            --><a href="https://vplan.zlyfer.net"><img class="mainLogo" id="mainLogoVPlan" src="./images/mobile.png"></a><!--
        --></div><!--
        --><div class="doc"><!--
        --><input id="vsnormal" class="button vs on first" type=button value="Aktueller Vertretungplan"/><!--
        --><input id="vshistory" class="button vs off" type=button value="Gesamter Vertretungplan (seit dem 24.11.2017)"/><!--
        --></div><!--
        --><div class="doc"><!--
        --><input id="plainjson" class="button vs on first" type=button value="Plain JSON"/><!--
        --><input id="javascript" class="button vs off" type=button value="Javascript"/><!--
        --></div><!--
        --><div class="doc"><!--
            --><input id="kurs" class="button cat on first" type=button value="Kurs"/><!--
            --><input id="stunde" class="button cat on" type=button value="Stunde"/><!--
            --><input id="fach" class="button cat on" type=button value="Fach"/><!--
            --><input id="raum" class="button cat on" type=button value="Raum"/><!--
            --><input id="lehrer" class="button cat on" type=button value="Lehrer"/><!--
            --><input id="info" class="button cat on" type=button value="Info"/><!--
            --><input id="vertretungstext" class="button cat on" type=button value="Vertretungstext"/><!--
            --><input id="datum" class="button cat on" type=button value="Datum"/><!--
            --><input id="wochentag" class="button cat on" type=button value="Wochentag"/><!--
        --></div><!--
        --><div class="doc"><!--
            --><select id="types"><!--
                --><option id="Typ" value="Typ">Wähle einen Typ..</option><!--
                --><option id="Kurs" value="Kurs">Kurs</option><!--
                --><option id="Stunde" value="Stunde">Stunde</option><!--
                --><option id="Fach" value="Fach">Fach</option><!--
                --><option id="Raum" value="Raum">Raum</option><!--
                --><option id="Lehrer" value="Lehrer">Lehrer</option><!--
                --><option id="Info" value="Info">Info</option><!--
                --><option id="Vertretungstext" value="Vertretungstext">Vertretungstext</option><!--
                --><option id="Datum" value="Datum">Datum</option><!--
                --><option id="Wochentag" value="Wochentag">Wochentag</option><!--
            --></select><!--
            --><input id="value" spellcheck="false" class="text" type=text placeholder="Wert"/><!--
            --><input id="add" class="button" type=button value="Hinzufügen" disabled/><!--
            --><input id="clear" class="button" type=button value="Leeren"/><!--
        --></div><!--
    -->
