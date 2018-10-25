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
	setInterval(() => {
		setai1001lerntagebuchtime();
	}, 1000);
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
	let last = document.getElementById('last_time');
	let next = document.getElementById('next_time');
	if (last && next) {
		let nexttime = next.innerHTML;
		let nm = parseInt(nexttime.slice(0, 2));
		let ns = parseInt(nexttime.slice(3, 5));

		if (nm == 0 && ns == 0) {
			location.reload();
		}

		let m = nm;
		let s = ns - 1;
		if (s < 0 && m == 0) {
			s = 0;
		} else if (s < 0 && m != 0) {
			s = 59;
			m -= 1;
		}
		if (s < 10) {
			s = `0${s.toString()}`;
		} else {
			m = m.toString();
		}
		if (m < 10) {
			m = `0${m.toString()}`;
		} else {
			s = s.toString();
		}

		next.innerHTML = `${m}:${s}`;
	}
}