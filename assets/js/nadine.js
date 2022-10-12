
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

	$(".m-table").tablesorter();


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
			$(this).closest('.m-accordion').removeClass('is--active');
		}else{
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
* Bouton Menu Nav
*/

// Déclare qq variables
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

// Cette fonction est appelée pour ouvrir le nav
function ShowNav() {
	nav__btn.classList.add('is--active');
	header__navbar.classList.add('is--active');
	ShowOverlay();
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
* Module : Overlay
*/


let overlay = document.querySelector('.m-overlay');

// Cette fonction permet d'afficher l'Overlay
function ShowOverlay() {
	document.querySelector('.m-overlay').classList.add('is--active');
	document.body.classList.add('overflow--is--hidden');
	document.documentElement.classList.add('overflow--is--hidden');
};

// Cette fonction fermer l'Overlay
function HideOverlay() {
	HideNav();
	document.querySelector('.m-modal').classList.remove('is--active');
	document.body.classList.remove('overflow--is--hidden');
	document.documentElement.classList.remove('overflow--is--hidden');
};

// Ferme des trucs si qq'un click sur l'Overlay
overlay.addEventListener('click', function() {
	HideOverlay();
});


/**
* Module : Modal
*/

// Cherche tous les boutons ouvrant des modal
var btns__modal = document.querySelectorAll('.btn__modal');

btns__modal.forEach(btn__modal => {
	// Ajoute un script si qq'un click sur le bouton
	btn__modal.addEventListener('click', function(e) {
		// Empêche le comportement normal du lien
		e.preventDefault();

		// Récupére le nom de la modal que le bouton doit ouvrir
		var modal = btn__modal.getAttribute('data-modal');

		// Formate le nom de la modal
		modal = '.m-modal__' + modal;

		document.querySelector(modal).classList.add('is--active');
		ShowOverlay()
	});
});


/**
* Module : Form
*/

// Cherche tous les Input with-label
var inputsWithLabel = document.querySelectorAll('.m-form__label-amimate');
inputsWithLabel.forEach(inputWithLabel => {

	// Cherche l'Input à l'interieur de la div.m-form__with-label
	var input = inputWithLabel.querySelector('input');
	// Récupére le label de cet Input
	var label = inputWithLabel.querySelector('label');


	// Ajoute un script si qq'un modifie ces inputs
	input.addEventListener('focus', function(e) {
		label.removeAttribute('class');
		label.classList.add('is--focus');
	});

	input.addEventListener('focusout', function(e) {
		label.removeAttribute('class');
		if (input.value.length == 0) {
			label.classList.remove('is--filled');
		}else {
			label.classList.add('is--filled');
		}
	});
});


/**
* Module : Form - Select Tab
*/

// Cherche tous les Selects m-form__select-tab
var selectsTab = document.querySelectorAll('.m-form__select-tab');
selectsTab.forEach(selectTab => {

	// Ajoute un <ul> dans la div.m-form__select-tab
	var ul = document.createElement('ul');
	ul.className = 'm-form__tabs';
	selectTab.append(ul);

	// Récupére les options de ce select
	var options = selectTab.querySelectorAll('option');

	// Ajoute un <li> par options dans le <ul> précédemment ajouté
	options.forEach(option => {
		let li = document.createElement('li');
		li.className = 'm-form__tab';
		li.textContent = option.text;
		ul.append(li);

		// Ajoute une fonction si chaque <li> si qq'un clic dessus
		li.addEventListener('click', function(e) {
			// Enlève la class is--active du <li> précèdement sélectionné
			selectTab.querySelector('li.is--active').classList.remove('is--active');
			// Ajoute la class is--active sur le <li> sélectionné
			li.classList.add('is--active');
			// Récupére le contenu du <li> sélectionné
			let optionText = li.innerHTML;
			// Cherche le select
			let select = selectTab.querySelector('select');
			// Sélectionne l'option correspondant au <li>
			select.value = optionText;
		});
	});

	// Sélectionne le premier <li>
	ul.firstChild.classList.add('is--active');


});
