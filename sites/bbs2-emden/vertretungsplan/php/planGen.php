<?php
    function showPlan($sql, $sort = "none")
    {
        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        } elseif (isset($_COOKIE['sort'])) {
            $sort = $_COOKIE['sort'];
        }
        if (isset($_GET['kurs'])) {
            $kurs = $_GET['kurs'];
        } elseif (isset($_COOKIE['kurs'])) {
            $kurs = $_COOKIE['kurs'];
        }
        if (isset($_GET['vplanhistory'])) {
            $vplanhistory = $_GET['vplanhistory'];
        } elseif (isset($_COOKIE['vplanhistory'])) {
            $vplanhistory = $_COOKIE['vplanhistory'];
        }

        $vplan_table = "Vertretungsplan";
        if ($vplanhistory == "1") {
            $vplan_table = "VertretungsplanHistory";
        }
        if ($sort == "none") {
            $vertretungsplan = $sql->query("SELECT * FROM ".$vplan_table);
        } else {
            $vertretungsplan = $sql->query("SELECT * FROM ".$vplan_table." ORDER BY ".substr($sort, 3)." ".array("ASC"=>"ASC", "DES"=>"DESC")[substr($sort, 0, 3)]);
        }

        if ($vertretungsplan->num_rows > 0) {
            $class_kind = "even";
            $dates = array("");
            $class = "";
            $addon = "";

            while ($row = $vertretungsplan->fetch_assoc()) {
                if ($class_kind == "even") {
                    $class_kind = "odd";
                } else {
                    $class_kind = "even";
                }

                if ($row['Kurs'] != $class) {
                    $class = $row['Kurs'];
                    $addon = "different ";
                } else {
                    $addon = "";
                }

                if (!in_array($row['Datum'], $dates)) {
                    $addon = "";
                    $dates = array("");
                    $dates[] = $row['Datum'];
                    echo("                <tr>\n                    <th class='kurs date'>".$row['Datum']."</th>\n");
                    echo("                    <th class='date stunde'></th>\n");
                    echo("                    <th class='date fach'></th>\n");
                    echo("                    <th class='date raum'></th>\n");
                    echo("                    <th class='date lehrer'></th>\n");
                    echo("                    <th class='date info'></th>\n");
                    echo("                    <th class='date vertretungstext'></th>\n                </tr>\n");
                }

                echo("                <tr class='".$row['Kurs']." ".$class_kind."'>\n");
                echo("                    <td onclick='forward([\"kurs\"], [\"".array($kurs=>$row['Kurs'], "none"=>$row['Kurs'], ""=>$row['Kurs'], $row['Kurs']=>"none")[$kurs]."\"]);' class='".$row['Kurs'].' '.$addon."kurs'>".$row['Kurs']."</td>\n");
                echo("                    <td onclick='forward([\"kurs\"], [\"".array($kurs=>$row['Kurs'], "none"=>$row['Kurs'], ""=>$row['Kurs'], $row['Kurs']=>"none")[$kurs]."\"]);' class='".$row['Kurs'].' '.$addon."stunde'>".$row['Stunde']."</td>\n");
                echo("                    <td onclick='forward([\"kurs\"], [\"".array($kurs=>$row['Kurs'], "none"=>$row['Kurs'], ""=>$row['Kurs'], $row['Kurs']=>"none")[$kurs]."\"]);' class='".$row['Kurs'].' '.$addon."fach'>".$row['Fach']."</td>\n");
                echo("                    <td onclick='forward([\"kurs\"], [\"".array($kurs=>$row['Kurs'], "none"=>$row['Kurs'], ""=>$row['Kurs'], $row['Kurs']=>"none")[$kurs]."\"]);' class='".$row['Kurs'].' '.$addon."raum'>".$row['Raum']."</td>\n");
                echo("                    <td onclick='forward([\"kurs\"], [\"".array($kurs=>$row['Kurs'], "none"=>$row['Kurs'], ""=>$row['Kurs'], $row['Kurs']=>"none")[$kurs]."\"]);' class='".$row['Kurs'].' '.$addon."lehrer'>".$row['Lehrer']."</td>\n");
                echo("                    <td onclick='forward([\"kurs\"], [\"".array($kurs=>$row['Kurs'], "none"=>$row['Kurs'], ""=>$row['Kurs'], $row['Kurs']=>"none")[$kurs]."\"]);' class='".$row['Kurs'].' '.$addon."info'>".$row['Info']."</td>\n");
                echo("                    <td onclick='forward([\"kurs\"], [\"".array($kurs=>$row['Kurs'], "none"=>$row['Kurs'], ""=>$row['Kurs'], $row['Kurs']=>"none")[$kurs]."\"]);' class='".$row['Kurs'].' '.$addon."vertretungstext'>".$row['Vertretungstext']."</td>\n");
                echo("                </tr>\n");
            }
        }
    }
?>
