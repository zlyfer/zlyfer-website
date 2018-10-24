function resize() {

  var width = document.documentElement.clientWidth;
  var height = document.documentElement.clientHeight;
  var resizeList = {
    1100: "vertretungstext",
    700: "raum",
    600: "lehrer",
    1300: "information_img"
  }
  for (var listKey in resizeList) {
    var classList = document.getElementsByClassName(resizeList[listKey]);
    for (var i = 0, il = classList.length; i < il; i++) {
      if (width < listKey) {
        classList[i].style.display = "none";
      } else {
        classList[i].style.display = "";
      }
    }
  }

}
