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

document.addEventListener('DOMContentLoaded', () => {
	M.Parallax.init(document.querySelectorAll('.parallax'), {
		responsiveThreshold: 964
	});
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
});