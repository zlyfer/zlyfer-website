function stundenplanFachEnable(stundplanFachID) {
  document.getElementById("save_stundenplan").style.display = "block";
  var caller = document.getElementById("stundenplan_fach_" + stundplanFachID);
  var container_enabled = document.getElementById("stundenplan_fach_container_enabled");
  var container_available = document.getElementById("stundenplan_fach_container_available");
  caller.className = caller.className.replace("Gen", "Get");
  if (container_enabled.children.length == 2) {
    container_enabled.appendChild(caller);
  } else {
    first_child = container_enabled.children[2];
    container_enabled.insertBefore(caller, first_child);
  }
  caller.onclick = function() {
    stundenplanFachDisable(stundplanFachID)
  };
}

function stundenplanFachDisable(stundplanFachID) { // Bescheuerte copy-pasta
  document.getElementById("save_stundenplan").style.display = "block";
  var caller = document.getElementById("stundenplan_fach_" + stundplanFachID);
  var container_enabled = document.getElementById("stundenplan_fach_container_enabled");
  var container_available = document.getElementById("stundenplan_fach_container_available");
  caller.className = caller.className.replace("Get", "Gen");
  if (container_available.children.length == 2) {
    container_available.appendChild(caller);
  } else {
    first_child = container_available.children[2];
    container_available.insertBefore(caller, first_child);
  }
  caller.onclick = function() {
    stundenplanFachEnable(stundplanFachID)
  };
}

function stundenplan_suche(call) {
  var container = document.getElementById("stundenplan_fach_container_" + call);
  var query = document.getElementById("stundenplan_suche_" + call).value;
  var children = container.children;
  for (var child = 2; child < children.length; child++) {
    cchild = children[child];
    cchild.style.display = "none";
    var ths = cchild.getElementsByTagName("TH");
    for (var th = 0; th < ths.length; th++) {
      var innerHTML = ths[th].innerHTML;
      if (innerHTML.indexOf(query) != -1) {
        cchild.style.display = "block";
        // ths[th].style.color = "var(--accent-color)";
        // ths[th].style.backgroundColor = "var(--background-color)";
      } else {
        // ths[th].style.color = "var(--background-color)";
        // ths[th].style.backgroundColor = "var(--accent-color)";
      }
      // if (query == "" || query == " ") {
      //   ths[th].style.color = "var(--background-color)";
      //   ths[th].style.backgroundColor = "var(--accent-color)";
      // }
      if (query == " ") {
        cchild.style.display = "none";
      }
    }
  }
}

function save_stundenplan() {
  var new_location = "https://old.zlyfer.net/sites/bbs2-emden/vertretungsplan//index.php";
  var facher = document.getElementsByClassName("stundenplan_fach_Get");
  var facher_entries;
  var entry;
  var stundenplan_list = "[";
  var entry_list;
  var facher_entry_value;
  for (var fach = 0; fach < facher.length; fach++) {
    facher_entries = facher[fach].getElementsByTagName("TH");
    entry = 0;
    entry_list = "[";
    for (var facher_entry = 0; facher_entry < facher_entries.length; facher_entry++) {
      facher_entry_value = facher_entries[facher_entry].innerHTML;
      facher_entry_value = facher_entry_value.replace("Ungerade Woche", "U").replace("Gerade Woche", "G").replace(",", "");;
      facher_entry_value = encodeURI(facher_entry_value);
      entry_list += facher_entry_value;
      if (facher_entry < 4) {
        entry_list += ",";
      }
      entry++;
    }
    entry_list += "]";
    if (fach < (facher.length - 1)) {
      entry_list += ",";
    }
    stundenplan_list += entry_list;
  }
  stundenplan_list += "]";
  window.location = new_location + "?stundenplan_data=" + stundenplan_list + "&action=edit_stundenplan";
}

function stundenplan_cleanup() {
  var facherGet = document.getElementsByClassName("stundenplan_fach_Get");
  var facherGen = document.getElementsByClassName("stundenplan_fach_Gen");
  for (var fachGet = 0; fachGet < facherGet.length; fachGet++) {
    var thisFachGet = facherGet[fachGet];
    var entriesGet = thisFachGet.getElementsByTagName("TH");
    var identifierGet = "";
    for (var entryGet = 0; entryGet < entriesGet.length; entryGet++) {
      identifierGet += entriesGet[entryGet].innerHTML;
    }
    for (var fachGen = 0; fachGen < facherGen.length; fachGen++) {
      var thisFachGen = facherGen[fachGen];
      var entriesGen = thisFachGen.getElementsByTagName("TH");
      var identifierGen = "";
      for (var entryGen = 0; entryGen < entriesGen.length; entryGen++) {
        identifierGen += entriesGen[entryGen].innerHTML;
      }
      identifierGen = identifierGen.replace(",", "");
      identifierGet = identifierGet.replace(",", "");
      if (identifierGen == identifierGet) {
        thisFachGen.remove();
      }
    }
  }
}
