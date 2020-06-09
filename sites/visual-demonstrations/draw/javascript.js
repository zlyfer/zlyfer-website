// jshint esversion: 9
window.onload = function () {
  var container = document.getElementById("container");
  const size = 5;
  for (var row = 0; row <= 17; row++) {
    for (var col = 0; col <= 17; col++) {
      var nfield = document.createElement("div");
      nfield.className = "field";
      nfield.style.width = size + "vh";
      nfield.style.height = size + "vh";
      nfield.style.left = size * col + "vh";
      nfield.style.top = size * row + "vh";
      container.appendChild(nfield);
    }
  }

  var fields = document.getElementsByClassName("field");
  for (var field = 0; field < fields.length; field++) {
    fields[field].onclick = function () {
      var color = document.getElementById("color").value;
      this.style.backgroundColor = color;
    };
  }
};
