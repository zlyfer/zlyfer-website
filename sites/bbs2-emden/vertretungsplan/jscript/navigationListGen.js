function navigationListGen() {

  var navList = document.getElementsByClassName("maincard");
  var navListContent = "";
  for (var i = 0, il = navList.length; i < il; i++) {
    navEntry = navList[i].id;
    if (!getParameter('site')) {
      if (i == 0) {
        document.getElementById(navEntry).style.display = "block";
        document.getElementById(navEntry).className += " active";
        selectNavEntry = navEntry + "Nav";
      } else {
        document.getElementById(navEntry).style.display = "none";
      }
    } else {
      document.getElementById(getParameter('site')).className += " active";
    }
    navListContent += "                <div onmouseout=\"unPreviewMaincard('" + navEntry + "')\" onmouseover=\"previewMaincard('" + navEntry + "')\" onclick=\"showMaincard('" + navEntry + "')\" id=\"" + navEntry + "Nav\" class=\"navigationEntry\">\n                    <span>" + navEntry.charAt(0).toUpperCase() + navEntry.substr(1) + "</span>\n                    <a href='?site=" + navEntry + "'><img class='navigationListImg' src='./images/link.png'></a>\n                </div>";
  }
  document.getElementById("navigationList").innerHTML = navListContent;
  if (!getParameter('site')) {
    document.getElementById(selectNavEntry).className += " selected";
  } else {
    document.getElementById(getParameter('site') + "Nav").className += " selected";
  }
}
