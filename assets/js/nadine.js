
$( document ).ready(function() {


	// Menu : Ajout de la classe is--current

	var currentUrl = location.pathname;
	$('.l-header__nav a').each(function(){
		var url = $(this).attr('href');
		if(currentUrl.indexOf(url) > -1){
			$(this).addClass('is--current');
		}
	})


	// Changement de couleur en Ajax

	$(".l-header__btn-color").click(function(){
		$.ajax({
			url : './core/update__option-couleur.php',
			type: 'GET',
			success:function( newColor ) {
				if(newColor){
					var newClass = '__' + newColor + "-mode";
					$('html').removeClass();
					$('html').addClass(newClass);
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}
		});
	});


	// Ouverture du menu secondaire

	var menu = $('.menu');
	$('.btn__menu-more-vert').click(function(){
		menu.slideToggle()
	});
	$(document).mouseup(function(e) {
		if (!menu.is(e.target) && menu.has(e.target).length === 0) {
			menu.slideUp();
		}
	});


	// Table Shorter

	$(".table").tablesorter();


	// Facture : active le bouton Enregistrer si c'est passer une facturer
	// à l'état Payée

	$("input[name=facture__statut]").on('input', function() {
	    var factureStatut = $(this).val();
			if (factureStatut == "Payée") {
				$("input[type=submit]").prop("disabled", false);
			}
	});


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


	// Block Accordion

	$('.accordion__titre').click(function(){
		if (	$(this).closest('.accordion').hasClass('is--active') ) {
			$('.accordion').removeClass('is--active');
		}else{
			$('.accordion').removeClass('is--active');
			$(this).closest('.accordion').addClass('is--active');
		}
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
