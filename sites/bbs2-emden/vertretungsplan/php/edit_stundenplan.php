<?php
// [[Montag,G,1 - 2,C q93.1,SHR,351]]
// INSERT INTO `VPlan`.`Stundenplan` (`Username`, `Woche`, `Wochentag`, `Stunde`, `Fach`, `Lehrer`, `Raum`) VALUES ('zlyfer', 'G', 'Mittwoch', '1 - 2', 'Englisch', 'ENS', '262');
// DELETE FROM `Stundenplan` WHERE `Username`="zlyfer"
$sql->query("DELETE FROM `Stundenplan` WHERE `Username`=\"".$_SESSION['username']."\"");

$stundenplan_data = str_replace("]", "", str_replace("[","",$_GET['stundenplan_data']));
$new_stundenplan_data = array();
$new_stundenplan_entry = array();
$read = "";
for ($cursor = 0; $cursor < strlen($stundenplan_data); $cursor++) {
  $ccursor = $stundenplan_data[$cursor];
  if ($ccursor != ",") {
    $read = $read.$ccursor;
  }
  if ($ccursor == "," || $cursor == (strlen($stundenplan_data) - 1)) {
    array_push($new_stundenplan_entry, $read);
    $read = "";
    if (count($new_stundenplan_entry) == 5) {
      array_push($new_stundenplan_data, $new_stundenplan_entry);
      $new_stundenplan_entry = array();
    }
  }
}
foreach ($new_stundenplan_data as $new_extract) {
  $n_s_wochentag = $new_extract[0];
  $n_s_stunde = $new_extract[1];
  $n_s_fach = $new_extract[2];
  $n_s_lehrer = $new_extract[3];
  $n_s_raum = $new_extract[4];
  $new_stundenplan_sql_query = "'".$_SESSION['username']."',"."'".$n_s_wochentag."',"."'".$n_s_stunde."',"."'".$n_s_fach."',"."'".$n_s_lehrer."',"."'".$n_s_raum."'";
  // echo ($new_stundenplan_sql_query);
  // echo ("<br>");
  $sql->query("INSERT INTO `Stundenplan` (`Username`, `Wochentag`, `Stunde`, `Fach`, `Lehrer`, `Raum`) VALUES (".$new_stundenplan_sql_query.")");
}
// exit();
