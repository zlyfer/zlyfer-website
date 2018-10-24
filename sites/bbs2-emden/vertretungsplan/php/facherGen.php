<?php
function cGen($sql, $kurs, $wd)
{
    $stundenplan = $sql->query("SELECT `Wochentag`,`Fach`,`Stunde`,`Raum`,`Lehrer` FROM `VertretungsplanHistory` WHERE `Kurs`=\"".$kurs."\" AND `Wochentag`=\"".$wd."\" ORDER BY Stunde ASC");
    if ($stundenplan->num_rows > 0) {
        $stundenplanCount = 0;
        $queryList = array();
        while ($row = $stundenplan->fetch_assoc()) {
            $stundenplanCount++;
            if (mb_strlen($row['Lehrer']) != 3) {
              $row['Lehrer'] = mb_substr($row['Lehrer'], 5, 3);
            }
            $queryListEntry = $row['Wochentag'].$row['Fach'].$row['Stunde'].$row['Raum'].$row['Lehrer'];
            if (!(in_array($queryListEntry, $queryList))) {
                gen($row['Wochentag'], $row['Fach'], $row['Stunde'], $row['Raum'], $row['Lehrer'], $stundenplanCount, "Gen");
                array_push($queryList, $queryListEntry);
            }
        }
    }
}
$wdlist = array("Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag");
foreach ($wdlist as $wd) {
    cGen($sql, $kurs, $wd);
}
