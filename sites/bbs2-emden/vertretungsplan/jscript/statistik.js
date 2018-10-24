function resizeBars() {
  list = document.getElementsByClassName("statisticBar");
  max = document.getElementById("bar_total").className.replace("statisticBar", "");
  for (var i = 0; i < list.length; i++) {
    value = list[i].className.replace("statisticBar", "");
    value = (value / (max / 100)).toFixed(2);
    list[i].style.width = value + "%";
    if (list[i].id != "bar_total") {
      document.getElementById(list[i].id.replace("bar", "percent")).innerHTML = value + "%";
    }
  }
}
