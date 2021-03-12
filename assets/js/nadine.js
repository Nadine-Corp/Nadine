
$( document ).ready(function() {


	// Ouverture du menu secondaire

	$('.btn__menu-more-vert').click(function(){
		$('.menu').slideToggle()
	});


	// Table Shorter

	$(".table").tablesorter();


	// Modal DoYouConfirm ?

	$('.doyouconfirm').click(function( event ) {
		event.preventDefault();
		var link = $(this).prop('href');
		$('.doyouconfirm').fadeIn();
	});

});
