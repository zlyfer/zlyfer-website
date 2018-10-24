<?php

function addBar($name, $id, $value)
{
    echo("             <div class='statisticBarJacket'>\n");
    echo("                 <div id='bar_$id' class='statisticBar $value'>\n");
    echo("                     <p class='name'>$name: $value</p>\n");
    echo("                     <p class='percent' id='percent_$id'></p>\n");
    echo("                 </div>\n");
//    echo ("                 <div class='statisticBarIndicator statisticBarIndicator25'></div>\n");
//    echo ("                 <div class='statisticBarIndicator statisticBarIndicator50'></div>\n");
//    echo ("                 <div class='statisticBarIndicator statisticBarIndicator75'></div>\n");
    echo("             </div>\n");
}


$vertretungen = $sql->query("SELECT * FROM VertretungsplanHistory");

if ($vertretungen->num_rows > 0) {
    $entfall = 0;
    $lehrer = array();
    $klasse = array();
    $fach = array();
    while ($vertretung = $vertretungen->fetch_assoc()) {
        if ($vertretung['Info'] == "Entfall") {
            ++$entfall;
        }

        $vlehrer = explode(" ", $vertretung['Lehrer'])[0];
        if ($vlehrer == "---") {
            $vlehrer = "N/A";
        }
        $vklasse = $vertretung['Kurs'];
        $vfach = $vertretung['Fach'];

        if (!in_array($vlehrer, $lehrer)) {
            $lehrer[$vlehrer] = $lehrer[$vlehrer] + 1;
        } else {
            $lehrer[$vlehrer] = 1;
        }

        if (!in_array($vklasse, $klasse)) {
            $klasse[$vklasse] = $klasse[$vklasse] + 1;
        } else {
            $klasse[$vklasse] = 1;
        }

        if (!in_array($vfach, $fach)) {
            $fach[$vfach] = $fach[$vfach] + 1;
        } else {
            $fach[$vfach] = 1;
        }
    }
    arsort($lehrer);
    arsort($klasse);
    arsort($fach);
}

echo("<h2>Verschiedenes</h2>\n");
addBar("Gesamtanzahl an Einträgen", "total", $vertretungen->num_rows);
addBar("Entfälle", "entfall", $entfall);
if (isset($kurs) && $kurs != "none") {
    addBar("Dein Kurs ($kurs)", "ownkurs", $klasse[$kurs]);
}

echo("             <h2>Lehrer</h2>\n");
foreach ($lehrer as $name => $wert) {
    addBar($name, "lehrer_".$name, $wert);
}

echo("             <h2>Kurse</h2>\n");
foreach ($klasse as $name => $wert) {
    addBar($name, "klasse_".$name, $wert);
}

echo("             <h2>Fächer</h2>\n");
foreach ($fach as $name => $wert) {
    addBar($name, "fach_".$name, $wert);
}
