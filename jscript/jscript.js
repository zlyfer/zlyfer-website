document.addEventListener('DOMContentLoaded', () => {
	M.Parallax.init(document.querySelectorAll('.parallax'), {});
	M.Sidenav.init(document.querySelectorAll('.sidenav'), {});
	if (getCookie("cookie") == "") {
		M.toast({
			html: `<span>We use cookies!</span>
		<button class="waves-effect btn-flat toast-action grey-text text-lighten-5"><a href="./?page=impressum#cookies"><i class="material-icons grey-text text-lighten-5">info_outline</i></a></button>`,
			classes: 'green darken-1',
			displayLength: 10000,
			completeCallback: () => {
				setCookie("cookie", "true", "365");
			}
		})
		setCookie("cookie", "true", "365");
	}
	// setai1001lerntagebuchtime();
});

// https://www.w3schools.com/js/js_cookies.asp
function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires = "expires=" + d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// https: //www.w3schools.com/js/js_cookies.asp
function getCookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}

function setai1001lerntagebuchtime() {
	let span = document.getElementById('stringtime');
	if (span) {

		let string = span.innerHTML;
		let shours = parseInt(string.slice(0, 2));
		let sminutes = parseInt(string.slice(3, 5));
		let sseconds = parseInt(string.slice(6, 8));

		{
			let current = new Date();
			let chours = parseInt(current.getHours());
			let cminutes = parseInt(current.getMinutes());
			let cseconds = parseInt(current.getSeconds());

			let dhours = chours + shours;
			let dminutes = cminutes + sminutes;
			let dseconds = cseconds + sseconds;

			let fix = fixtime(dhours, dminutes, dseconds);
			let fhours = fix[0];
			let fminutes = fix[1];
			let fseconds = fix[2];

			dhours = fhours - chours;
			dminutes = fminutes - cminutes;
			dseconds = fseconds - cseconds;

			fix = fixtime(dhours, dminutes, dseconds);
			fhours = fix[0];
			fminutes = fix[1];
			fseconds = fix[2];

			// span.innerHTML = `${fhours}:${fminutes}:${fseconds}`;
		}

		function fixtime(h, m, s) {

			// if (s >= 60) {
			m += Math.floor(s / 60);
			s = Math.abs(s % 60);
			// }
			//  else if (s < 0) {
			// 	s = Math.abs(s);
			// 	m -= Math.floor(s / 60);
			// 	s = s % 60;
			// }
			// if (m >= 60) {
			h += Math.floor(m / 60);
			m = Math.abs(m % 60);
			// }
			if (h > 24) {
				h -= 24;
			} else if (h < 0) {
				h += 24;
			}

			if (h < 10) {
				h = `0${h}`;
			}
			if (m < 10) {
				m = `0${m}`;
			}
			if (s < 10) {
				s = `0${s}`;
			}

			return ([h, m, s]);
		}
	}
}