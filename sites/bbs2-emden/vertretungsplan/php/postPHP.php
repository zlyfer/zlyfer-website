<?php

    if (isset($acolor)) {
        echo("        <script type='text/javascript'>setAccentColor('".$acolor."')</script>\n");
    }
    if (isset($favmethod)) {
        echo("        <script type='text/javascript'>setFavMethod('".$favmethod."')</script>\n");
    }
    if (isset($vplanhistory)) {
        echo("        <script type='text/javascript'>setVplanHistorySetting('".$vplanhistory."')</script>\n");
    }
//    if (isset($fullscreenBtn)) {
//        echo ("        <script type='text/javascript'>setFullscreenBtnSetting('".$fullscreenBtn."')</script>\n");
//    }
//    if (isset($fullscreen)) {
//        echo ("        <script type='text/javascript'>setFullscreenSetting('".$fullscreen."')</script>\n");
//        if ($fullscreen == 1) {
//            echo ("        <script type='text/javascript'>fullwidth()</script>\n");
//        }
//    }
    if (isset($bgcolor)) {
        echo("        <script type='text/javascript'>setBackgroundColor('".$bgcolor."')</script>\n");
    }

    if (isset($_GET['site'])) {
        echo("        <style>div.maincard{display: none;} #".$_GET['site']."{display: block}</style>\n");
    }

    if (isset($sort) && $sort != "none") {
        echo("        <style>div.maincard#vertretungsplan th.".substr($sort, 3).":not(.date){background-color: var(--accent-color); color: var(--background-color);}</style>\n");
    }
    if (isset($kurs) && $kurs != "none") {
        if ($favmethod == "iso") {
            echo("        <style>div.maincard#vertretungsplan tr.odd:not(.".$kurs."), div.maincard#vertretungsplan tr.even:not(.".$kurs.") {display: none;}</style>\n");
            echo("        <style>div.maincard#vertretungsplan td.".$kurs."{border-color: var(--background-color);}</style>\n");
            echo("        <style>div.maincard#vertretungsplan tr.".$kurs."{background-color: var(--accent-color); color: var(--background-color);}</style>\n");
        } elseif ($favmethod == "hig") {
            echo("        <style>div.maincard#vertretungsplan td.".$kurs."{border-color: var(--background-color);}</style>\n");
            echo("        <style>div.maincard#vertretungsplan tr.".$kurs."{background-color: var(--accent-color); color: var(--background-color);}</style>\n");
        }
    }

    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case "forgotPassword":
                echo "        <script type='text/javascript'>document.getElementById('forgot_password_confirm').style.display = 'block';\ndocument.getElementById('access_account').style.display = 'none';</script>\n";
                break;
        }
    }

        if ($DEVICE == "Mobile") {
            echo ("        <style>#navigationPanel {display: none;} .maincard {left: 0;}</style>\n");
            echo ('        <script type="text/javascript" src="./jscript/navigationMobile.js"></script>');
            echo ("        <script type='text/javascript'>fullwidth(true);</script>\n");
            if (!isset($_GET['site'])) {
                echo ("        <style>#vertretungsplan {display: block;}</style>\n");
                echo ("        <script type='text/javascript'>document.getElementById('vertretungsplan').className += ' maincard_active';</script>\n");
            } else {
                echo ("        <style>#".$_GET['site']." {display: block;}</style>\n");
                echo ("        <script type='text/javascript'>document.getElementById('".$_GET['site']."').className += ' maincard_active';</script>\n");
            }
        }

    ?>
