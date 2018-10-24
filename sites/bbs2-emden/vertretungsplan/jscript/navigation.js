function showMaincard(site) {

  var navEntryList = document.getElementsByClassName("navigationEntry");
  for (var k = 0, kl = navEntryList.length; k < kl; k++) {
    navEntryId = navEntryList[k].id;
    navEntry = document.getElementById(navEntryId);
    if (navEntryId == site + "Nav") {
      navEntry.className += " selected";
    } else {
      navEntry.className = navEntry.className.replace('selected', '');
    }
  }

  var navList = document.getElementsByClassName("maincard");
  for (var i = 0, il = navList.length; i < il; i++) {
    card = document.getElementById(navList[i].id);
    if (navList[i].id == site) {
      if (!card.classList.contains("active")) {
        card.className += " active";
      }
      card.style.display = "block";
      card.style.right = "0";
      card.style.top = "0";
      card.style.transform = "scale(1)";
      card.style.boxShadow = "-1px 0 20px 1px var(--counter-background-color)";
    } else {
      card.style.display = "none";
      card.className = "maincard";
    }
  }

}

function previewMaincard(site) {

  var card = document.getElementById(site);
  var active = card.classList.contains("active");
  if (active == false) {
    card.style.transform = "scale(0.2)";
    card.style.right = "50vw";
    card.style.top = "-35vh";
    card.style.display = "block";
    card.style.boxShadow = "5px 5px 100px 0 var(--counter-background-color)";
  }

}

function unPreviewMaincard(site) {

  var card = document.getElementById(site);
  var active = card.classList.contains("active");
  if (active == false) {
    card.style.transform = "scale(1)";
    card.style.right = "0";
    card.style.top = "0";
    card.style.boxShadow = "-1px 0 20px 1px var(--counter-background-color)";
    card.style.display = "none";
  }

}
