<?php

    $username = $password = $passwordRe = $telegramid = "";
    $usernameError = $passwordError = $passwordReError = "";

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } //Eingabe testen

    function testEmpty($input)
    {
        if (empty($input)) {
            return("Bitte füllen Sie dieses Feld aus!");
        } else {
            return("");
        }
    } //Testet ob Leer

    function testUsername($input, $sql)
    {
        if (strlen($input) <= 32 and strlen($input) >=5) {
            if (preg_match("/[A-Za-z]/", $input)) {//Mindestens ein Buchstabe
                if (!preg_match("/[^A-Za-z0-9_]/", $input)) {//Keine Sonderzeichen
                    if (preg_match("/^[A-Za-z]/", $input)) {//Fängt mit einem Buchstaben an
                        if (preg_match("/_$/", $input)) {//Hört mit einem _ auf
                            return("Der Name darf nicht mit einem Unterstrich enden!");
                        } else {
                            $result = $sql->query("SELECT Username FROM TelegramBot WHERE Username = '" .$input ."'");
                            if ($result->num_rows > 0) {
                                return("Nutzername existiert bereits!");
                            } else {
                                return("");
                            }
                        }
                    } else {
                        return("Der Name muss mit einem Buchstaben anfangen!");
                    }
                } else {
                    return("Bitte nur Buchstaben, Zahlen oder Unterstriche!");
                }
            } else {
                return("Der Name muss mindestens einen Buchstaben enthalten!");
            }
        } else {
            return("Der Name muss zwischen 5 und 32 Zeichen lang sein!");
        }
    } //testet die eingabe nach richtigkeit (erlaubte zeichen)

    function testPassword($input)
    {
        if (preg_match("/[äöüÄÖÜ]/", $input)) {
            return("Das Passwort darf keine Umlaute enthalten!");
        }

        if (strlen($input) <= 16 and strlen($input) >= 6) {
            if (preg_match("/[\s]/", $input)) {
                return("Das Passwort darf keine Leerzeichen enthalten!");
            } else {
                return("");
            }
        } else {
            return("Das Passwort muss zwischen 6 und 16 Zeichen lang sein!");
        }
    } //testet das passwort nach richtigkeit (länge und whitespace)

    function testPasswordRe($input, $inputRe)
    {
        if ($input == $inputRe) {
            return("");
        } else {
            return("Die Passwörter stimmen nicht überein!");
        }
    }

    function testTelegramID($telegramid)
    {
        if (empty($telegramid)) {
            return(false);
        } else {
            return(true);
        }
    }

    function registerFx($password, $passwordRe, $username, $telegramid, $connect)
    {
        $pass = sha1($password);
        $connect->query("INSERT INTO TelegramBot (ChatID, Username, password, permission) VALUES ('$telegramid', '$username', '$pass', 10)");
        $_SESSION['registerConfirm'] = true;
        header("Location: ./index.php?site=account");
    } //Registrieren

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usernameError = testEmpty($_POST['username']);
        $passwordError = testEmpty($_POST['password']);
        $passwordReError = testEmpty($_POST['passwordRe']);

        $usernameError = testUsername($_POST['username'], $sql);
        $passwordError = testPassword($_POST['password']);
        $passwordReError = testPasswordRe($_POST['password'], $_POST['passwordRe']);
        $telegramidError = testTelegramID($_POST['telegramid']);

        $password = test_input($_POST['password']);
        $passwordRe = test_input($_POST['passwordRe']);
        $username = test_input($_POST['username']);

        if ($passwordError == "" and $passwordReError == "" and $usernameError == "") {
            if ($telegramidError == true) {
                $telegramid = $_POST['telegramid'];
                registerFx($password, $passwordRe, $username, $telegramid, $sql);
            } else {
                registerFx($password, $passwordRe, $username, 0, $sql);
            }
        }
    }
