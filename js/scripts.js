jQuery(document).ready(function( $ ) {

	//Style Registered mark
	$('body :not(script)').contents().filter(function() {
		    return this.nodeType === 3;
		}).replaceWith(function() {
		    return this.nodeValue.replace(/[™®©]/g, '<sup>$&</sup>');
		});
	

	//Toggle style on menu open
	$('button.navbar-toggler').click(function() {
		$('nav.navbar-transparent').toggleClass('expanded');
	});

	//Página de Consultores - redireciona para a página ao mudar o select option
	//$('#state').on('change', function () {
	//	var url = $(this).val(); // get selected value
	//	if (url) { // require a URL
	//		window.location = url; // redirect
	//	}
	//	return false;
	//});


});