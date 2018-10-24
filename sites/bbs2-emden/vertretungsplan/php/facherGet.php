<?php
$stundenplan = $sql->query("SELECT `Wochentag`,`Fach`,`Stunde`,`Raum`,`Lehrer` FROM `Stundenplan` WHERE `Username`=\"".$_SESSION['username']."\" ORDER BY Stunde ASC");
if ($stundenplan->num_rows > 0) {
    $stundenplanCount = 0;
    while ($row = $stundenplan->fetch_assoc()) {
        $stundenplanCount++;
        gen($row['Wochentag'], $row['Fach'], $row['Stunde'], $row['Raum'], $row['Lehrer'], $stundenplanCount, "Get");
    }
}
