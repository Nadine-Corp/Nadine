
$( document ).ready(function() {


	// Ouverture du menu secondaire

	$('.btn__menu-more-vert').click(function(){
		$('.menu').slideToggle()
	});


	// Table Shorter

	$(".table").tablesorter();


	// Barre de recherche

	$('.l-header__bar input').on('input', function(){

		$.extend($.expr[":"], {
			'containsIN': function(elem, i, match, array) {
				return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
			}
		});
		var val = $(this).val();
		$('td').parent().hide();
		$('td:containsIN(' + val +')').parent().show();
	});


	// Modal DoYouConfirm ?

	$('.doyouconfirm').click(function( event ) {
		event.preventDefault();
		var link = $(this).prop('href');
		$('.doyouconfirm').fadeIn();
	});

});


const el = document.querySelector(".is--sticky")
const observer = new IntersectionObserver(
	([e]) => e.target.classList.toggle("is--pinned", e.intersectionRatio < 1),
	{ threshold: [1] }
);

observer.observe(el);
