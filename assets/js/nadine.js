
$( document ).ready(function($) {

	/**
	* Variables
	*/

	// Modulor
	var modulor = window.getComputedStyle(document.documentElement).getPropertyValue('--m');

	// Modifie la variable --vh lors du redimensionnement.
	const appHeight = () => {
		const vh = window.innerHeight * 0.01;
		document.documentElement.style.setProperty('--vh', `${vh}px`);
	}
	window.addEventListener('resize', appHeight);
	appHeight();


	/**
	* Bouton Menu Nav
	*/

	// Déclare qq variables
	let overlay = document.querySelector('.m-overlay');
	let nav__btn = document.querySelector('.nav__btn');
	let header__navbar = document.querySelector('.l-header__navbar');
	let nav__accordion = document.querySelector('.l-header__navbar .m-accordion');

	// Vérifie si qq'un click sur le Menu Burger
	nav__btn.addEventListener('click', function() {
		if ( header__navbar.classList.contains('is--active') ) {
			HideNav();
		}else{
			ShowNav();
		}
	});

	// Ferme le volet si qq'un click à l'extérieur du menu
	overlay.addEventListener('click', function() {
		HideNav();
	});

	// Cette fonction est appelée pour ouvrir le nav
	function ShowNav() {
		nav__btn.classList.add('is--active');
		header__navbar.classList.add('is--active');
		overlay.classList.add('is--active');
		document.body.classList.add('overflow--is--hidden');
		document.documentElement.classList.add('overflow--is--hidden');
	};

	// Cette fonction est appelée pour fermer le nav
	function HideNav() {
		nav__btn.classList.remove('is--active');
		header__navbar.classList.remove('is--active');
		overlay.classList.remove('is--active');
		nav__accordion.classList.remove('is--active');
		document.body.classList.remove('overflow--is--hidden');
		document.documentElement.classList.remove('overflow--is--hidden');
	};

	// Vérifie si qq'un click sur le bouton Plus
	nav__accordion.addEventListener('click', function() {
		if ( !header__navbar.classList.contains('is--active') ) {
			ShowNav();
		}
	});


	/**
	*  Menu : Ajout de la classe is--current
	*/

	var currentUrl = location.pathname;
	$('.l-header__nav-item a').each(function(){
		var url = $(this).attr('data-url');
		if( currentUrl.includes(url) ){
			$(this).addClass('is--current');
		}
	})


	/**
	*  Table Shorter
	*/

	$(".table").tablesorter();


	// Facture : active le bouton Enregistrer si c'est passer une facturer
	// à l'état Payée

	$("input[name=facture__statut]").on('input', function() {
	    var factureStatut = $(this).val();
			if (factureStatut == "Payée") {
				$("input[type=submit]").prop("disabled", false);
			}
	});


	/**
	*  Barre de recherche
	*/

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

	/**
	*  Module : Accordion
	*/

	$('.m-accordion__titre').click(function(){
		if (	$(this).closest('.m-accordion').hasClass('is--active') ) {
			$('.m-accordion').removeClass('is--active');
		}else{
			$('.m-accordion').removeClass('is--active');
			$(this).closest('.m-accordion').addClass('is--active');
		}
	});


	/**
	*  Effet : is--DenkoKeijiban
	*/

  $('.is--denko').each(function() {
    var clone = $(this).find('*')
    var n = 100;
    while(n > 0){
      $(this).append(clone.clone());
      n -= 1;
    }
  });
}); //Fin du jQuery(document).ready


/**
* Module : Modale
*/

if ( $('.m-modal.is--active').length ) {
	$('.m-overlay').show();
}
$(document).on('click', '[data-toggle="m-modal"]', function (e){
	var target = $(this).data('target');
	$(target).show();
});
$(document).on('click', '[name="init__doyouconfirme"]', function (e){
	var konmari = $('[name="input__doyouconfirme"]').val();
	if( konmari == "KonMari"){
		window.location.href = './core/init.php';
	}
});

const el = document.querySelector(".is--sticky")
const observer = new IntersectionObserver(
	([e]) => e.target.classList.toggle("is--pinned", e.intersectionRatio < 1),
	{ threshold: [1] }
);

observer.observe(el);
