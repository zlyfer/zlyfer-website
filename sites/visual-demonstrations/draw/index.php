<html>
    <head>
        <link rel="stylesheet" href="./style.css"/>
        <script type="text/javascript" src="./javascript.js"></script>
        <link type="image/x-icon" rel="shortcut icon" href="../../../images/logo.png">
        <title>zlyfer - Draw</title>
        <style>
        img.mainLogo {
          position: fixed;
          width: 5vh;
          height: 5vh;
          left: 0.8%;
          opacity: 0.8;
          cursor: pointer;
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
          border: 1px solid #43A047;
          -webkit-box-shadow: 1px 1px 10px 1px #43A047;
          box-shadow: 1px 1px 10px 1px #43A047;
        }
        </style>
    </head>
    <body>
        <a href="./../../../index.php"><img class="mainLogo" id="mainLogoZlyfer" src="../../../images/logo.png"></a>
        <div id="container">
        </div>
        <input id="color" type="color" value="#CF3030"/>
    </body>
</html>
