<!--pre-->
<?php require_once("./php/prePHP.php");?>
<!---->
<html>
    <head>
        <!--Miscellaneous-->
        <title>BBS II - Vertretungsplan</title>
        <link type="image/x-icon" rel="shortcut icon" href="./images/favicon.ico">
        <!---->

        <!--mobile_shortcut support & meta-tags-->
        <link rel="apple-touch-icon" href="./images/mobile.png"/>
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="theme-color" content="hsl(215, 90%, 60%)"> <!--Von JS kontrolliert.-->
        <!---->

        <!--php-->
        <?php
        require_once("./php/mobileDetect.php");
        require_once("./php/planGen.php");
        require_once("./php/showFeedback.php");
        require_once("./php/facherCore.php");
        echo("<!-- Device: ".$DEVICE." -->");
        ?>

        <!---->

        <!--javascript-->
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="./jscript/misc.js"></script>
        <script type="text/javascript" src="./jscript/edit_stundenplan.js"></script>
        <?php
        if ($DEVICE == "Desktop") {
            echo("<script type='text/javascript' src='./jscript/navigation.js'></script>\n");
            echo("        <script type='text/javascript' src='./jscript/navigationListGen.js'></script>\n");
            echo("        <script type='text/javascript' src='./jscript/resize.js'></script>\n");
        }
        ?>
        <script type="text/javascript" src="./jscript/forward.js"></script>
        <script type="text/javascript" src="./jscript/color.js"></script>
        <script type="text/javascript" src="./jscript/statistik.js"></script>
        <!---->

        <!--styles-->
        <link rel="stylesheet" type="text/css" href="./styles/style.css">
        <!---->

    </head>

    <?php
    if ($DEVICE == "Desktop") {
        echo('<body spellcheck="false" onselectstart="return false;" onload="resizeBars(), resize(), navigationListGen()" onresize="resize()">'."\n");
//        if ($fullscreenBtn == 1 || $fullscreen == 1) {
//            echo ('        <div id="fullscreenBtn" onclick="fullwidth()">'."\n");
//            echo ('            <img id="fullscreenImg" src="./images/fullscreen.svg">'."\n");
//            echo ('        </div>'."\n");
//        }
    } else {
        echo('<body spellcheck="false" onselectstart="return false;" onload="resizeBars()">');
    }
    ?>

        <div id="navigationPanel">
            <div id="navigationList"> <!--Wie macht er das nur?-->
            </div>
        </div>
        <a href="./index.php"><img class="mainLogo" id="mainLogoVPlan" src="./images/mobile.png"></a>

        <div class="maincard" id="vertretungsplan">
            <table cellspacing="0">
                <tr id="header"><?php echo("\n");// Associative Arrays (Dictionary) für Circles:?>
                    <th onclick="forward(['sort'], ['<?php echo(array($sort=>"ASCKurs", ""=>"ASCKurs", "ASCKurs"=>"DESKurs", "DESKurs"=>"none", "none"=>"ASCKurs")[$sort])?>'])" class="kurs">Kurs</th>
                    <th onclick="forward(['sort'], ['<?php echo(array($sort=>"ASCStunde", ""=>"ASCStunde", "ASCStunde"=>"DESStunde", "DESStunde"=>"none", "none"=>"ASCStunde")[$sort])?>'])" class="stunde">Stunde</th>
                    <th onclick="forward(['sort'], ['<?php echo(array($sort=>"ASCFach", ""=>"ASCFach", "ASCFach"=>"DESFach", "DESFach"=>"none", "none"=>"ASCFach")[$sort])?>'])" class="fach">Fach</th>
                    <th onclick="forward(['sort'], ['<?php echo(array($sort=>"ASCRaum", ""=>"ASCRaum", "ASCRaum"=>"DESRaum", "DESRaum"=>"none", "none"=>"ASCRaum")[$sort])?>'])" class="raum">Raum</th>
                    <th onclick="forward(['sort'], ['<?php echo(array($sort=>"ASCLehrer", ""=>"ASCLehrer", "ASCLehrer"=>"DESLehrer", "DESLehrer"=>"none", "none"=>"ASCLehrer")[$sort])?>'])" class="lehrer">Lehrer</th>
                    <th onclick="forward(['sort'], ['<?php echo(array($sort=>"ASCInfo", ""=>"ASCInfo", "ASCInfo"=>"DESInfo", "DESInfo"=>"none", "none"=>"ASCInfo")[$sort])?>'])" class="info">Info</th>
                    <th onclick="forward(['sort'], ['<?php echo(array($sort=>"ASCVertretungstext", ""=>"ASCVertretungstext", "ASCVertretungstext"=>"DESVertretungstext", "DESVertretungstext"=>"none", "none"=>"ASCVertretungstext")[$sort])?>'])" class="vertretungstext">Vertretungstext</th>
                </tr>
                <?php
                    if (!isset($_GET['sort'])) {
                        showPlan($sql);
                    } else {
                        if (in_array($_GET['sort'], ['ASCKurs', 'DESKurs', 'ASCStunde', "DESStunde", "ASCFach", "DESFach", "ASCRaum", "DESRaum", "ASCLehrer", "DESLehrer", "ASCInfo", "DESInfo", "ASCVertretungstext", "DESVertretungstext"])) {
                            showPlan($sql, $_GET['sort']);
                        } else {
                            showPlan($sql);
                        }
                    }
                ?>
            </table>
        </div>

          <div class="maincard" id="statistiken">
              <h1>Einträge im Vertretungsplan seit dem 24.11.2017</h1>
              <hr>
              <?php require_once("./php/statistik.php"); ?>
          </div>

        <div class="maincard" id="account">
            <h1>Account</h1>
            <hr>
            <div id="access_account">
                <h1>Anmelden</h1>
<?php
    if (isset($UWrong)) {
        echo "<h2 class='error'>".$UWrong."</h2>";
    }
    if (isset($PWWrong)) {
        echo "<h2 class='error'>".$PWWrong."</h2>";
    }
?>
                <form method="POST" action="./index.php?action=login&site=account">
                    <input type="text" placeholder="Nutzername" name="username" required/>
                    <input type="password" placeholder="Passwort" name="password" required/>
                    <h2 class="checkbox_radio_text">Angemeldet bleiben</h2>
                    <input name="stay_logged_in" type="checkbox"/>
                    <input value="Anmelden" type="submit"/>
                    <input type="button" value="Passwort vergessen?" onclick="showHide({'show': ['forgot_password'], 'hide': ['access_account', 'account_accessed', 'forgot_password_confirm']})"/>
                </form>
                <hr>
                <h1>Registrieren</h1>
<?php
    if ($usernameError != "") {
        echo "<h2 class='error'>".$usernameError."</h2>";
    }
    if ($passwordError != "") {
        echo "<h2 class='error'>".$passwordError."</h2>";
    }
    if ($passwordReError != "") {
        echo "<h2 class='error'>".$passwordReError."</h2>";
    }
?>
                <form method="POST" action="./index.php?action=register&site=account">
                    <input type="text" placeholder="Nutzername" name="username" min="5" max="32" required/>
                    <input type="password" placeholder="Passwort" name="password" min="6" max="16" required/>
                    <input type="password" placeholder="Passwort wiederholen" name="passwordRe" min="6" max="16" required/>
                    <input type="text" placeholder="TelegramID (optional)" name="telegramid"/>
                    <input value="Registrieren" type="submit"/>
                </form>
            </div>
            <div id="account_accessed">
<?php
    $uaquery = $sql->query("SELECT * FROM TelegramBot WHERE Username='".$_SESSION['username']."'");
    $ua = $uaquery->fetch_assoc();
?>
                <div id="user_account_badge">
                    <h1>Wilkommen, <?php echo($_SESSION['username']); ?>!</h1>
                    <form id="profile_pic_upload_form" action="./index.php?action=upload_profile_pic" method="post" enctype="multipart/form-data">
                        <div id="profile_pic_upload">
                            <label for="file-input">
                                <img id="user_icon" src="<?php echo($_SESSION['profile_pic']);?>">
                            </label>
                            <input id="file-input" name="fileToUpload" type="file" accept="image/*" onchange="uploadProfilePic()"/>
                        </div>
                    </form>
                    <input id="logout_button" type="button" value="Abmelden" onclick="forward(['action'], ['logout'])"/>
                </div>
                <div class="maincard_slice" id="edit_stundenplan">
                  <h1>Stundenplan - <?php echo($kurs);?></h1>
                  <!-- <h2>Info: Diese Seite befindet sich noch in Entwicklung!</h2>
                  <h2>Info: Diese Liste wird anhand der bereits existierenden Vertretungen generiert. Es werden vermutlich einige Stundenplaneinträge fehlen!</h2>
                  <h2>Info: Klicke auf die Kurse um sie in das jeweils andere Feld einzutragen.</h2> -->
                  <input id="save_stundenplan" type="button" value="Stundenplan speichern" onclick="save_stundenplan()"\>
                  <div id="stundenplan_container_container">
                    <div id="stundenplan_fach_container_available">
                      <h2>Vorhandene Stundenplaneinträge</h2>
                      <input onchange="stundenplan_suche('available')" oninput="stundenplan_suche('available')" class="stundenplan_suche" id="stundenplan_suche_available" placeholder="Suche.." type="text"\>
                      <?php require_once("./php/facherGen.php") ?>
                    </div>
                    <div id="stundenplan_fach_container_enabled">
                      <h2>Dein Stundenplan</h2>
                      <input onchange="stundenplan_suche('enabled')" oninput="stundenplan_suche('enabled')" class="stundenplan_suche" id="stundenplan_suche_enabled" placeholder="Suche.." type="text"\>
                      <?php require_once("./php/facherGet.php") ?>
                      <script type='text/javascript'>stundenplan_cleanup()</script>
                    </div>
                  </div>
                </div>
            </div>
            <div class="hidden" id="forgot_password">
                <h1>Passwort vergessen?</h1>
                <h2>Bitte gib deine TelegramID und deinen Usernamen ein.</h2>
                <h2>Deine TelegramID findest du beim Vertretungsplan Bot unter "Einstellungen" > "TelegramID".</h2>
                <form method="POST" action="./index.php?site=account&action=forgotPassword">
                    <input type="text" placeholder="Nutzername" name="username" required/>
                    <input type="text" placeholder="TelegramID" name="telegramid" required/>
                    <input type="password" placeholder="Neues Passwort" name="newpw" required/>
                    <input type="password" placeholder="Passwort wiederholen" name="newpw2" required/>
                    <input type="submit" value="Fortfahren"/>
                </form>
                <input type="button" value="Zurück" onclick="showHide({'show': ['access_account'], 'hide': ['account_accessed', 'forgot_password', 'forgot_password_confirm']})"/>
            </div>
            <div class="hidden" id="forgot_password_confirm">
                <?php
                    if ($_GET['action'] == "forgotPassword") {
                        $newpw_error = false;
                        if ($_POST['newpw'] != $_POST['newpw2']) {
                            $newpw_error = "password";
                        }
                        $change_pw = $sql->query("SELECT Username from TelegramBot WHERE ChatID='".$_POST['telegramid']."'");
                        if ($change_pw->num_rows == 0) {
                            $newpw_error = "telegramid";
                        } elseif (is_numeric($_POST['telegramid'])) {
                            $row = $change_pw->fetch_assoc();
                            if ($row['Username'] != $_POST['username'] && $row['Username'] != $_POST['telegramid']) {
                                $newpw_error = "username";
                            }
                        } else {
                            $newpw_error = "telegramid";
                        }
                        if ($newpw_error == false) {
                            $sql->query("INSERT INTO PasswordForgot (TelegramID, Password) VALUES ('". $_POST['telegramid'] ."', '". sha1($_POST['newpw']) ."')");

                            echo "<h1>Passwortänderung - Anfrage erfolgreich</h1>\n";
                            echo "                <h2>Der Vertretungsplan Bot wird dir innerhalb der nächsten Minute eine Nachricht senden.</h2>\n";
                            echo "                <h2>Bitte bestätige, dass es sich um deinen Account handelt.</h2>\n";
                            echo "                <input type='button' value='Zurück' onclick=\"showHide({'show': ['access_account'], 'hide': ['account_accessed', 'forgot_password', 'forgot_password_confirm']})\"/>\n";
                        } else {
                            echo "<h1>Passwortänderung - Anfrage fehlgeschlagen</h1>\n";
                            switch ($newpw_error) {
                                case "password":
                                    echo "                <h2>Die Passwörter stimmen nicht überein.</h2>\n";
                                    break;
                                case "telegramid":
                                    echo "                <h2>Die angegebene TelegramID (".$_POST['telegramid'].") ist nicht registriert.</h2>\n";
                                    break;
                                case "username":
                                    echo "                <h2>Der angegebene Nutzername (".$_POST['username'].") stimmt nicht mit der TelegramID (".$_POST['telegramid'].") überein.</h2>\n";
                                    break;
                            }
                            echo "                <input type='button' value='Erneut versuchen' onclick=\"showHide({'show': ['forgot_password'], 'hide': ['forgot_password_confirm', 'access_account', 'account_accessed']})\"/>\n";
                        }
                    }
                ?>
            </div>

        </div>

        <div class="maincard" id="einstellungen">
            <div>
                <h1>Einstellungen</h1>
                <hr>
                <div class="maincard_slice">
                    <h1>Farben</h1>
                    <h2>Verändere die Farben der Seite.</h2>
                    <input type="range" id="colorChanger" min="0" max="315" value="215" onchange="changeAccentColor()" oninput="changeAccentColor()"/>
                    <input type="range" id="bColorChanger" min="0" max="100" value="100" onchange="changeBackgroundColor()" oninput="changeBackgroundColor()"/>
                    <br>
                    <input type="button" value="Farben zurücksetzen" onclick="resetColor()"/>
                    <br>
                </div>
                <div class="maincard_slice">
                    <h1>Favorisierter Kurs</h1>
                    <h2>Stelle ein, was passieren soll, wenn du einen Kurs favorisierst.</h2>
                    <div>
                        <input id="antifavmethod" class="radio_text" type=radio name="isoKursBehaviour" value="Isolieren" checked="checked"/>
                        <h2 class="checkbox_radio_text">Isolieren</h2>
                    </div>
                    <div>
                        <input id="favmethod" class="radio_text" type=radio name="isoKursBehaviour" value="Hervorheben"/>
                        <h2 class="checkbox_radio_text">Hervorheben</h2>
                    </div>
                    <br>
                </div>
                <div class="maincard_slice">
                    <h1>Verschiedenes</h1>
                    <div>
<!--
                        <div>
                            <input class="radio_text" type=checkbox id="fullscreenSetting"/>
                            <h2 class="checkbox_radio_text">Zeige Seiten im Vollbildmodus (Aktiviert Vollbildmodus Knopf)</h2>
                        </div>
                        <div>
                            <input class="radio_text" type=checkbox id="fullscreenBtnSetting"/>
                            <h2 class="checkbox_radio_text">Zeige den Vollbildmodus Knopf</h2>
                        </div>
-->
                        <div>
                            <input class="radio_text" type=checkbox id="vplanHistorySetting"/>
                            <h2 class="checkbox_radio_text">Zeige alle Vertretungen seit dem 24.11.17</h2>
                        </div>
                    </div>
                </div>
                <input type="button" value="Speichern" onclick="forward(['favmethod', 'acolor', 'bgcolor', 'vplanhistory'], ['', '', '', ''])"/>
<!--                <input type="button" value="Speichern" onclick="forward(['favmethod', 'fullscreen', 'fullscreenBtn', 'acolor', 'bgcolor', 'vplanhistory'], ['', '', '', '', '', ''])"/>-->
            </div>
        </div>

        <div class="maincard" id="informationen">
            <h1>Informationen</h1>
            <hr>
            <a>
              <div class="information_card" id="information_card_first">
                <h1>Kalenderwoche <?php echo date("W");?></h1>
                <h2>Die aktuelle Woche ist eine <?php if (date("W")%2!=0) {
                    echo("un");
                }?>gerade Woche.</h2>
              </div>
            </a>
            <a href="https://telegram.me/VPlanBBS2_bot/">
                <div class="information_card hover">
                    <h1>Vertretungsplan Bot</h1>
                    <h2>Erhalte den Vertretungsplan automatisch täglich auf dein Handy über unseren Telegram Bot.</h2>
                </div>
            </a>
            <a href="https://telegram.org/">
                <div class="information_card hover">
                    <h1>Hol dir Telegram!</h1>
                    <h2>Telegram ist ein Messenger, mit dem du unseren Vertretungsplan Bot aufrufen kannst.</h2>
                </div>
            </a>
            <!-- <a href="./rss/rss.xml">
                <div class="information_card hover">
                    <h1>RSS-Feed</h1>
                    <h2>Klicke hier um zu dem RSS-Feed für den Vertretungsplan zu gelangen.</h2>
                </div>
            </a> -->
            <a href="https://api.vplan.zlyfer.net">
                <div class="information_card hover">
                    <h1>API-Interface</h1>
                    <h2>Du willst deinen eigenen Service anbieten weißt aber nicht wie du an die Daten vom Vertretungsplan kommst? Benutze unsere API um einen einfachen Zugriff auf unsere saubere Datenbank zu gelangen.</h2>
                </div>
            </a>
            <a>
              <div class="information_card">
                  <h1>Inoffizieller Vertretungsplan!</h1>
                  <h2>Diese Website ist inoffiziell und wird in keiner Weise von den BBS2 Emden unterstützt. Bei Kontakt, siehe Impressum!</h2>
              </div>
            </a>
        </div>

        <div class="maincard" id="feedback">
            <h1>Feedback</h1>
            <!-- <hr>
            <br>
            <form method="POST" action="./index.php?action=feedback">
                <?php
                    // if (isset($_SESSION['username'])) {
                    //     echo("<input maxlength=\"16\" value=\"".$_SESSION['username']."\" class=\"forbidden\" readonly=\"readonly\" type=\"text\" name=\"name\"/>\n");
                    // } else {
                    //     echo("<input required maxlength=\"16\" placeholder=\"Name:\" type=\"text\" name=\"name\"/>\n");
                    // }
                ?>
                <textarea maxlength="4096" required name="feedback" placeholder="Dein Feedback:"></textarea>
                <input type="submit" value="Feedback senden"/>
            </form> -->
            <?php showFeedback($sql); ?>
        </div>

        <div class="maincard" id="impressum">
            <h1>Impressum</h1>
            <hr>
            <h1>Website & Datenbank</h1>
            <table>
              <tbody>
                <tr>
                  <th>Name</th>
                  <th id="impressum_right">Tarek Harms</th>
                </tr>
                <tr>
                  <th>Adresse</th>
                  <th id="impressum_right">26721 Emden</th>
                </tr>
              </tbody>
            </table>
            <hr>
            <h1>Logo, Server, Website, Telegram Bot, Datenbank, API</h1>
            <table>
              <tbody>
                <tr>
                  <th>Name</th>
                  <th id="impressum_right">Frederik Shull</th>
                </tr>
                <tr>
                  <th>Adresse</th>
                  <th id="impressum_right">36039 Fulda</th>
                </tr>
                <tr>
                  <th>E-Mail</th>
                  <th id="impressum_right">zlyfer(at)web.de</th>
                </tr>
              </tbody>
            </table>
            <hr>
            <h1>Vertretungsplan</h1>
            <table>
              <tbody>
                <tr>
                  <th>Quelle</th>
                  <th id="impressum_right"><a href="http://www.berufsbildendeschulen2-emden.de">BBS2 Emden</a> <a href="https://hepta.webuntis.com/WebUntis/monitor?school=BBS%202%20Emden&monitorType=subst&format=Vertretungsplan">Untis</a></th>
                </tr>
                <tr>
                  <th>Crawler</th>
                  <th id="impressum_right">Frederik Shull</th>
                </tr>
                <tr>
                  <th>Fremdquellen</th>
                  <th id="impressum_right"><a href="https://www.iconfinder.com">iconfinder</a></th>
                </tr>
              </tbody>
            </table>
        </div>

        <!--Template für neue Seiten:-->
<!--        <div class="maincard" id="SEITENNAME">-->
        <!--INHALT-->
<!--        </div>-->

        <!--post-->
<?php require_once("./php/postPHP.php");?>
        <!---->
    </body>
</html>
