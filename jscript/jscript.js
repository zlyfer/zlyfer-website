document.addEventListener('DOMContentLoaded', function() {
	M.Parallax.init(document.querySelectorAll('.parallax'), {});
	M.Sidenav.init(document.querySelectorAll('.sidenav'), {});
	M.toast({
		html: `<span>We collect cookies!</span>
		<button class="waves-effect btn-flat toast-action grey-text text-lighten-5"><a href="#"><i class="material-icons grey-text text-lighten-5">info_outline</i></a></button>`,
		classes: 'green darken-1',
		displayLength: 10000
	})
});