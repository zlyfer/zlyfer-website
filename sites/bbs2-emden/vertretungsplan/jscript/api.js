window.onload = function() {

	function showParameter() {
		const showlist = ["kurs", "stunde", "fach", "raum", "lehrer", "info", "vertretungstext", "datum", "wochentag", "vsnormal", "vshistory"];
		var showParameterAddon = "";

		for (var i = 0; i < showlist.length; i++) {
			var button = document.getElementById(showlist[i]);
			if (button.className.indexOf(" on") == -1 && button.className.indexOf(" off") != -1) {
				showParameterAddon += "&" + showlist[i] + "=false";
			}
		}

		return (showParameterAddon);

	}

	function inputCheck() {
		const parameter = document.getElementById("input").value.split(" ");
		const allowed = ["Kurs", "Stunde", "Fach", "Raum", "Lehrer", "Info", "Vertretungstext", "Datum", "Wochentag"];
		const fixlink = "https://api.vplan.zlyfer.net/?interface=false";
		const showParameterAddon = showParameter();
		var valid = true;
		var object = {};
		var used = [];
		var link = "";

		for (var i = 0; i < parameter.length; i += 2) {
			if (allowed.indexOf(parameter[i]) != -1 && used.indexOf(parameter[i]) == -1) {
				object[parameter[i]] = parameter[i + 1];
				used.push(parameter[i]);
			} else {
				valid = false;
			}
		}

		for (key in allowed) {
			document.getElementById(allowed[key]).disabled = false;
		}

		for (key in object) {
			document.getElementById(key).disabled = true;
			link += "&" + key + "=" + object[key];
		}

		if (valid == true) {
			document.getElementById("output").placeholder = fixlink + showParameterAddon + link;
		} else {
			document.getElementById("output").placeholder = fixlink + showParameterAddon;
		}
	};

	function valueCheck() {
		if (document.getElementById("value").value != "" && document.getElementById("types").value != "Typ") {
			document.getElementById("add").disabled = false;
		} else {
			document.getElementById("add").disabled = true;
		}
	}

	function toggleBtn(btn) {
		var button = document.getElementById(btn);
		if (button.className.indexOf(" on") != -1) {
			button.className = button.className.replace(" on", " off");
		} else if (button.className.indexOf(" off") != -1) {
			button.className = button.className.replace(" off", " on");
		}
		inputCheck();
	}
	document.getElementById("vsnormal").onclick = function() {
		if (this.className.indexOf(" on") == -1) {
			toggleBtn("vsnormal")
			toggleBtn("vshistory")
		}
	};
	document.getElementById("vshistory").onclick = function() {
		if (this.className.indexOf(" on") == -1) {
			toggleBtn("vshistory")
			toggleBtn("vsnormal")
		}
	};
	document.getElementById("kurs").onclick = function() {
		toggleBtn("kurs")
	};
	document.getElementById("stunde").onclick = function() {
		toggleBtn("stunde")
	};
	document.getElementById("fach").onclick = function() {
		toggleBtn("fach")
	};
	document.getElementById("raum").onclick = function() {
		toggleBtn("raum")
	};
	document.getElementById("lehrer").onclick = function() {
		toggleBtn("lehrer")
	};
	document.getElementById("info").onclick = function() {
		toggleBtn("info")
	};
	document.getElementById("vertretungstext").onclick = function() {
		toggleBtn("vertretungstext")
	};
	document.getElementById("datum").onclick = function() {
		toggleBtn("datum")
	};
	document.getElementById("wochentag").onclick = function() {
		toggleBtn("wochentag")
	};
	document.getElementById("input").oninput = function() {
		inputCheck();
	};
	document.getElementById("value").oninput = function() {
		valueCheck();
	}
	document.getElementById("types").onchange = function() {
		valueCheck();
	}
	document.getElementById("output").onclick = function() {
		window.open(document.getElementById("output").placeholder);
	}
	document.getElementById("copy").onclick = function() {
		document.getElementById("output").style.backgroundColor = "var(--accent-color)";
		document.getElementById("output").value = document.getElementById("output").placeholder;
		document.querySelector("#output").select();
		document.execCommand("copy");
		window.getSelection().removeAllRanges();
		document.activeElement.blur();
		document.getElementById("output").value = "";
	}
	document.getElementById("copy").onmouseout = function() {
		document.getElementById("output").style.backgroundColor = "var(--light-theme-color)";
	}
	document.getElementById("add").onclick = function() {
		var key = document.getElementById("types").value;
		if (key != "Typ") {
			var link = document.getElementById("input").value;
			var value = encodeURIComponent(document.getElementById("value").value.trim());

			if (link[link.length - 1] != " " && link.length != 0) {
				value = link + " " + key + " " + value;
			} else {
				value = link + key + " " + value;
			}

			document.getElementById("input").value = value;
			document.getElementById("types").value = "Typ";
			document.getElementById("value").value = "";
			inputCheck();
			valueCheck();
		}
	}
	document.getElementById("clear").onclick = function() {
		const allowed = ["Kurs", "Stunde", "Fach", "Raum", "Lehrer", "Info", "Vertretungstext", "Datum"];
		for (key in allowed) {
			document.getElementById(allowed[key]).disabled = false;
		}
		document.getElementById("value").value = "";
		document.getElementById("types").value = "Typ";
		document.getElementById("input").value = "";

		inputCheck();
	};

}
