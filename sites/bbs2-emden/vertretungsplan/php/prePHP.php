<?php
    session_start();
    require_once("./php/mysql_connect.php");

    function cookieMonster($cookie)
    { // Setzt einen Cookie bei $_GET, verlängert ihn und setzt eine Variable.
        global $$cookie;
        if (isset($_GET[$cookie])) {
            setcookie($cookie, $_GET[$cookie], time() + (86400 * 30), "/");
            $$cookie = $_GET[$cookie];
        } else {
            if (isset($_COOKIE[$cookie])) {
                setcookie($cookie, $_COOKIE[$cookie], time() + (86400 * 30), "/");
                $$cookie = $_COOKIE[$cookie];
            } else {
                switch ($cookie) {
                    case "favmethod":
                        setcookie($cookie, "hig", time() + (86400 * 30), "/");
                        $$cookie = "hig";
                        break;
                    case "fullscreen":
                        setcookie($cookie, "0", time() + (86400 * 30), "/");
                        $$cookie = "0";
                        break;
                    case "fullscreenBtn":
                        setcookie($cookie, "1", time() + (86400 * 30), "/");
                        $$cookie = "1";
                        break;
                    case "vplanhistory":
                        setcookie($cookie, "0", time() + (86400 * 30), "/");
                        $$cookie = "0";
                        break;
                }
            }
        }
    }

    cookieMonster("acolor");
    cookieMonster("bgcolor");
    cookieMonster("kurs");
    cookieMonster("sort");
    cookieMonster("loggedin");
    cookieMonster("favmethod");
    cookieMonster("fullscreen");
    cookieMonster("fullscreenBtn");
    cookieMonster("vplanhistory");

    if (isset($loggedin)) {
        $loggedin_user = $sql->query("SELECT * FROM TelegramBot");
        while ($row = $loggedin_user->fetch_assoc()) {
            if (sha1($row['Username']) == $loggedin) {
                $_SESSION['username'] = $row['Username'];
                foreach ($row as $login_var => $login_value) {
                    $_SESSION[strtolower($login_var)] = $login_value;
                }
            }
        }
    }



    if (date("W") % 2 == 0) {
        $evenodd="gerade";
    } else {
        $evenodd="ungerade";
    }

    if (isset($_SESSION['username'])) {
        echo "<style>#access_account{display: none;}</style>\n";
    } else {
        echo "<style>#account_accessed{display: none;}</style>\n";
    }

    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case "login":
                require_once("./php/login.php");
                break;
            case "register":
                require_once("./php/register.php");
                break;
            case "logout":
                session_destroy();
                setcookie("loggedin", false, 0, "/");
                header("Location: ./index.php");
                break;
            case "upload_profile_pic":
                require_once("./php/profilepic_upload.php");
                header("Location: ./index.php?site=account");
                break;
            case "forgotPassword":
                break;
            case "edit_stundenplan":
                require_once('./php/edit_stundenplan.php');
                header("Location: ./index.php?site=account");
                break;
            case "feedback":
                if (isset($_POST['feedback'])) {
                    if (isset($_POST['name'])) {
                        $feedbackContent = $_POST['feedback'];
                        $feedbackName = $_POST['name'];
                        $fDd = date(d);
                        $fDm = date(m);
                        $fDy = date(y);
                        $fDH = date(H);
                        $fDi = date(i);
                        $feedbackDatum = "{$fDd}.{$fDm}.{$fDy}";
                        $feedbackZeit = "{$fDH}:{$fDi}";
                        $sql->query("INSERT INTO Feedback (Name, Feedback, Datum, Zeit) VALUES ('$feedbackName', '$feedbackContent', '$feedbackDatum', '$feedbackZeit')");
                        header("Location: ./index.php?site=feedback");
                    }
                }
                break;
        }
    }

    echo("<script type='text/javascript'>var touchmoveX = false;</script>\n");
