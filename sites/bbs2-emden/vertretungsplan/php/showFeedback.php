<?php

    function showFeedback($sql)
    {
        $feedbackList = $sql->query("SELECT * FROM Feedback WHERE 1 ORDER BY ID DESC");
        if ($feedbackList->num_rows > 0) {
            echo("<hr>\n");
            echo("            <br>\n");
            while ($fL = $feedbackList->fetch_assoc()) {
//                $id = $fL['ID'];
                $name = $fL['Name'];
                $feedback = $fL['Feedback'];
                $datum = $fL['Datum'];
                $zeit = $fL['Zeit'];
                echo("            <div class=\"information_card\">\n");
                echo("                <p class=\"big\">".$datum." - <span class=\"underline\">".$name."</span> schrieb um ".$zeit." Uhr:</p>\n");
                echo("                <p class=\"small\">Feedback: <span class=\"italic\">\"".$feedback."\"</span></p>\n");
                echo("            </div>\n");
            }
            echo("            <br>\n");
        }
    }
