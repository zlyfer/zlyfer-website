function changeAccentColor() {

  var color = document.getElementById("colorChanger").value;
  document.documentElement.style.setProperty("--accent-color", "hsl(" + color + ", 90%, 60%)");
  document.documentElement.style.setProperty("--hue-rotate", color + "deg");
  document.documentElement.style.setProperty("--light-accent-color", "hsl(" + color + ", 90%, 65%)");
  document.documentElement.style.setProperty("--dark-accent-color", "hsl(" + color + ", 90%, 55%)");
  setMetaTagContent("theme-color", "hsl(" + color + ", 90%, 60%)");
  touchmoveX = false;
  touchmoveY = false;

}

function changeBackgroundColor() {

  var bgColor = document.getElementById("bColorChanger").value;
  var cBGColor = 100 - bgColor;
  if (bgColor > 49) {
    lrColor = bgColor - 10;
    drColor = bgColor - 5;
    brightness = bgColor * 5;
  } else {
    lrColor = +bgColor + +10;
    drColor = +bgColor + +5;
    brightness = bgColor * 2;
  }
  document.documentElement.style.setProperty("--background-color", "hsl(0, 0%, " + bgColor + "%)");
  document.documentElement.style.setProperty("--brightness", brightness + "%");
  document.documentElement.style.setProperty("--counter-background-color", "hsl(0, 0%, " + cBGColor + "%)");
  document.documentElement.style.setProperty("--table-light-row-color", "hsl(0, 0%, " + lrColor + "%)");
  document.documentElement.style.setProperty("--table-dark-row-color", "hsl(0, 0%, " + drColor + "%)");
  touchmoveX = false;
  touchmoveY = false;

}


function resetColor() {

  document.documentElement.style.setProperty("--background-color", "rgb(255, 255, 255)");
  document.documentElement.style.setProperty("--counter-background-color", "rgb(0, 0, 0)");
  document.documentElement.style.setProperty("--table-light-row-color", "#f5f5f5");
  document.documentElement.style.setProperty("--table-dark-row-color", "#e5e5e5");
  document.documentElement.style.setProperty("--brightness", "1000%");
  document.documentElement.style.setProperty("--accent-color", "hsl(215, 90%, 60%)");
  document.documentElement.style.setProperty("--hue-rotate", "215deg");
  document.documentElement.style.setProperty("--light-accent-color", "hsl(215, 90%, 65%)");
  document.documentElement.style.setProperty("--dark-accent-color", "hsl(215, 90%, 55%)");
  document.getElementById("colorChanger").value = 215;
  document.getElementById("bColorChanger").value = 100;
  setMetaTagContent("theme-color", "hsl(215, 90%, 60%)");

}

function setAccentColor(color) {

  document.getElementById("colorChanger").value = color;
  changeAccentColor();

}

function setBackgroundColor(color) {

  document.getElementById("bColorChanger").value = color;
  changeBackgroundColor();

}
