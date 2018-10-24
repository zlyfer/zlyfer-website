function moveToPage(direction) {
  var maincard_list = document.getElementsByClassName('maincard');
  for (var l = 0; l < maincard_list.length; l++) {
    last_maincard = maincard_list[l].className.replace('maincard ', '').replace('maincard_active', '').replace('maincard_', '');
  }
  var active_maincard = document.getElementsByClassName('maincard_active');
  for (var i = 0; i < active_maincard.length; i++) {
    isolated = active_maincard[i].className.replace('maincard ', '').replace('maincard_', '').replace(' maincard_active', '');
    if (direction == "next") {
      next_isolated = +isolated + +1;
      if (typeof document.getElementsByClassName('maincard_' + next_isolated)[0] == "undefined") {
        next_isolated = 0;
      }
    } else if (direction == "prev") {
      next_isolated = +isolated - +1;
      if (typeof document.getElementsByClassName('maincard_' + next_isolated)[0] == "undefined") {
        next_isolated = last_maincard;
      }
    }
    isolated = document.getElementsByClassName('maincard_' + isolated)[0].id;
    next_isolated = document.getElementsByClassName('maincard_' + next_isolated)[0].id;
    document.getElementById(isolated).className = document.getElementById(isolated).className.replace(' maincard_active', '');
    document.getElementById(next_isolated).className = document.getElementById(next_isolated).className += " maincard_active";
    showHide({
      'show': [next_isolated],
      'hide': [isolated]
    });
  }
}


var touchmoveY = false;
var touchDistanceX = 0;
var touchDistanceY = 0;
var maincard_list = document.getElementsByClassName('maincard');
for (var i = 0; i < maincard_list.length; i++) {
  var gesuredZone = document.getElementById(maincard_list[i].id);
  //    var touchtest = document.getElementById('touchtest');
  //    touchtest.innerHTML = 0;

  gesuredZone.addEventListener('touchstart', function(event) {
    touchmoveX = true;
  }, false);

  gesuredZone.addEventListener('touchend', function(event) {
    touchmoveX = false;
  }, false);

  gesuredZone.addEventListener('touchmove', function(event) {
    if (event.touches.length != 1) {
      touchmoveX = false;
    }
    if (touchmoveX == true) {
      touchmoveX = event.changedTouches[0].clientX;
    }
    if (touchmoveX != false && touchmoveX != true) {
      var touchDistanceX = Math.sqrt(Math.pow(touchmoveX - event.changedTouches[0].clientX, 2));
      if (touchDistanceX > 250) {
        var touchDifferenceX = (parseInt(touchmoveX) - parseInt(event.changedTouches[0].clientX));
        touchmoveX = false;
        handleGesure(touchDifferenceX);
      }
    }
  }, false);
}

function handleGesure(touchDistanceX = 0, touchDistanceY = 0) {
  //    console.log(touchDistanceX);
  if (touchDistanceX < 0) {
    moveToPage("prev");
  } else if (touchDistanceX > 0) {
    moveToPage("next");
  }
}
