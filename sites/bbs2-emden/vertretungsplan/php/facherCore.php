<?php
function gen($wochentag, $fach, $stunde, $raum, $lehrer, $stundenplanCount, $call)
{
  // <div id=\"stundenplan_fach_".$call.$wochentag.$stundenplanCount."\" class=\"stundenplan_fach ".$wochentag.str_replace(" ", "", $stunde)."\" onclick=\"".array("Gen"=>"stundenplanFachEnable", "Get"=>"stundenplanFachDisable")[$call]."('".$call.$wochentag.$stundenplanCount."')\">
    echo("
<div id=\"stundenplan_fach_".$call.$wochentag.$stundenplanCount."\" class=\"stundenplan_fach stundenplan_fach_".$call."\" onclick=\"".array("Gen"=>"stundenplanFachEnable", "Get"=>"stundenplanFachDisable")[$call]."('".$call.$wochentag.$stundenplanCount."')\">
    <table cellspacing=\"0\" class=\"stundenplan_fach\">
        <tbody class=\"stundenplan_fach\">
            <tr class=\"stundenplan_fach\">
              <th class=\"stundenplan_fach stundenplan_fach_value\">$wochentag</th>
            </tr>
            <tr class=\"stundenplan_fach\">
              <th class=\"stundenplan_fach stundenplan_fach_value\">$stunde</th>
              <th class=\"stundenplan_fach stundenplan_fach_value\">$fach</th>
            </tr>
            <tr class=\"stundenplan_fach\">
              <th class=\"stundenplan_fach stundenplan_fach_value\">$lehrer</th>
              <th class=\"stundenplan_fach stundenplan_fach_value\">$raum</th>
            </tr>
        </tbody>
    </table>
</div>
  ");
}
