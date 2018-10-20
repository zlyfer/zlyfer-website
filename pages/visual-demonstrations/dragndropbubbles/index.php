<!DOCTYPE html>
<html>
    <head>

        <!--miscellaneous-->
        <title>zlyfr</title>
        <meta charset="utf-8"/>
        <link type="image/x-icon" rel="shortcut icon" href="./../../../images/logo.png">
        <!--mobile-->
        <meta name="theme-color" content="hsl(100, 75, 53)">
        <link rel="apple-touch-icon" href="./images/logo.png"/>
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!--style-->
        <link rel="stylesheet" href="./style.css">
        <!--javascript-->
        <script type="text/javascript" src="./javascript.js"></script>

        <style>
        img.mainLogo {
          position: fixed;
          width: 5vh;
          height: 5vh;
          left: 0.8%;
          opacity: 0.8;
          border: 1px solid #43A047;
          cursor: pointer;
          -webkit-box-shadow: 1px 1px 10px 1px #43A047;
          box-shadow: 1px 1px 10px 1px #43A047;
          -webkit-transition: opacity 0.4s ease, -webkit-box-shadow 0.4s ease, -webkit-transform 0.4s ease;
          transition: opacity 0.4s ease, -webkit-box-shadow 0.4s ease, -webkit-transform 0.4s ease;
          transition: opacity 0.4s ease, box-shadow 0.4s ease, transform 0.4s ease;
          transition: opacity 0.4s ease, box-shadow 0.4s ease, transform 0.4s ease, -webkit-box-shadow 0.4s ease, -webkit-transform 0.4s ease;
          -webkit-transform: scale(0.9);
          transform: scale(0.9);
        }

        img.mainLogo:hover {
          opacity: 1;
          -webkit-transform: scale(1);
          transform: scale(1);
        }
        img.mainLogo#mainLogoZlyfer {
          bottom: 1%;
        }
        </style>
    </head>
    <body>

        <a href="./../../../index.php"><img class="mainLogo" id="mainLogoZlyfer" src="../../../images/logo.png"></a>
        <!--onclick='create("")'-->
        <!--rect, square, circle-->
        <!--small, normal, big-->
        <!--dragable-->
        <!--dropspace-->

        <div class="box circle big dragable dropspace"></div>
        <div class="box circle big dragable"></div>
        <div class="box circle normal dragable dropspace"></div>
        <div class="box circle normal dragable"></div>
        <div class="box circle small dragable dropspace"></div>
        <div class="box circle small dragable"></div>

    </body>
</html>
