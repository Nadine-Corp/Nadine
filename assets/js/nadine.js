
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


const el = document.querySelector(".is--sticky")
const observer = new IntersectionObserver(
  ([e]) => e.target.classList.toggle("is--pinned", e.intersectionRatio < 1),
  { threshold: [1] }
);

observer.observe(el);
