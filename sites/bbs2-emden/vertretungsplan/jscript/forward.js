function forward(attribut, wert) {

  if (attribut.length == wert.length) {

    for (i in attribut) {
      switch (attribut[i]) {
        case "acolor":
          wert[i] = document.getElementById("colorChanger").value;
          break;
        case "bgcolor":
          wert[i] = document.getElementById("bColorChanger").value;
          break;
        case "favmethod":
          wert[i] = {
            true: "hig",
            false: "iso"
          }[document.getElementById("favmethod").checked];
          break;
        case "fullscreen":
          if (document.getElementById("fullscreenSetting").checked == true) {
            wert[i] = 1;
          } else {
            wert[i] = 0;
          }
          break;
        case "fullscreenBtn":
          if (document.getElementById("fullscreenBtnSetting").checked == true) {
            wert[i] = 1;
          } else {
            wert[i] = 0;
          }
          break;
        case "vplanhistory":
          if (document.getElementById("vplanHistorySetting").checked == true) {
            wert[i] = 1;
          } else {
            wert[i] = 0;
          }
          break;
      }
    }
    var oldGetList = {};
    var getParams = location.search.substr(1).split("&").reduce((o, i) => (u = decodeURIComponent, [k, v] = i.split("="), o[u(k)] = v && u(v), o), {}); // Speichert alle $_GET-Variablen.
    for (getWert in getParams) {
      if (getWert != "") {
        oldGetList[getWert] = true;
      }
    }
    var oldGet = "";
    for (var attr = 0; attr < attribut.length; attr++) {
      for (var getWert in getParams) {
        if (getWert == attribut[attr]) {
          oldGetList[getWert] = false;
        }
      }
    }
    for (oldGetWert in oldGetList) {
      if (oldGetList[oldGetWert] == true) {
        oldGet += "&" + oldGetWert + "=" + getParams[oldGetWert];
      }
    }
    var newGet = "?";
    for (var eintrag = 0; eintrag < attribut.length; eintrag++) {
      if (attribut[0] == attribut[eintrag]) {
        newGet += attribut[eintrag] + "=" + wert[eintrag];
      } else {
        newGet += "&" + attribut[eintrag] + "=" + wert[eintrag];
      }
    }
    window.location = newGet + oldGet;
  }

}
