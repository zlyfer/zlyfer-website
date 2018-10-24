function getParameter(name) {
  url = window.location.href;
  name = name.replace(/[\[\]]/g, "\\$&");
  var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
    results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function showHide(shList) {
  for (sh in shList['show']) {
    document.getElementById(shList['show'][sh]).style.display = "block";
  }
  for (sh in shList['hide']) {
    document.getElementById(shList['hide'][sh]).style.display = "none";
  }
}

function setMetaTagContent(name, content) {
  var metaElements = document.getElementsByTagName('meta');
  for (var i = 0; i < metaElements.length; i++) {
    if (metaElements[i].getAttribute("name") == name) {
      metaElements[i].setAttribute('content', content);
      break;
    }
  }
}

function fullwidth(mobilerequest = false) {
  var maincards = document.getElementsByClassName("maincard");
  if (mobilerequest == false) {
    fsb = document.getElementById("fullscreenImg");
    if (fsb != null) {
      if (fsb.src.indexOf("exit") == -1) {
        fsb.src = "https://zlyfer.de/vertretungsplan/images/fullscreen_exit.svg";
      } else {
        fsb.src = "https://zlyfer.de/vertretungsplan/images/fullscreen.svg";
      }
    }
  }
  for (var i = 0; i < maincards.length; i++) {
    if (!maincards[i].style.width || maincards[i].style.width == "80%") {
      maincards[i].style.width = "100%";
    } else if (maincards[i].style.width == "100%") {
      maincards[i].style.width = "80%";
    }
    if (maincards[i].className.indexOf("maincard_") == -1) {
      maincards[i].className += " maincard_" + i;
    }
  }
}

function uploadProfilePic() {
  $('#profile_pic_upload_form').submit();
}

function setFavMethod(method) {
  if (method == "iso") {
    document.getElementById("favmethod").checked = false;
    document.getElementById("antifavmethod").checked = true;
  } else if (method == "hig") {
    document.getElementById("favmethod").checked = true;
    document.getElementById("antifavmethod").checked = false;
  }
}

// function setFullscreenSetting(fullscreen) {
//    if (fullscreen == 1) {
//        document.getElementById("fullscreenSetting").checked = true;
//    } else if (fullscreen == 0){
//        document.getElementById("fullscreenSetting").checked = false;
//    }
// }
//
// function setFullscreenBtnSetting(Btn) {
//    if (Btn == 1) {
//        document.getElementById("fullscreenBtnSetting").checked = true;
//    } else if (Btn == 0){
//        document.getElementById("fullscreenBtnSetting").checked = false;
//    }
// }

function setVplanHistorySetting(vplanhistory) {
  if (vplanhistory == 1) {
    document.getElementById("vplanHistorySetting").checked = true;
  } else if (vplanhistory == 0) {
    document.getElementById("vplanHistorySetting").checked = false;
  }
}
