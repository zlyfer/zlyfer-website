<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nutzername = $_POST['username'];
        $password = sha1($_POST['password']);

        $nutzerDaten = $sql->query("SELECT * FROM TelegramBot WHERE Username='$nutzername'");

        if ($nutzerDaten->num_rows > 0) {
            $nutzerDaten = $nutzerDaten->fetch_assoc();

            if ($nutzerDaten['password'] == $password) {
                foreach ($nutzerDaten as $login_var => $login_value) {
                    $_SESSION[strtolower($login_var)] = $login_value;
                }
                if (isset($_POST['stay_logged_in'])) {
                    setcookie("loggedin", sha1($nutzername), time() + (86400 * 30), "/");
                }
                header("Location: ./index.php?site=account");
            } else {
                $PWWrong = "Falsche Kombination von Nutzername und Passwort!";
            }
        } else {
            $UWrong = "Dieser Nutzer existiert nicht!";
        }
    }
