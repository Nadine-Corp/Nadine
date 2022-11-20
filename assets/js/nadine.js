

// Ce fichier permet de faire toutes sortes de choses un peu magiques
// après qu'une page est chargé : il fait apparaître les modals,
// fait disparaître le menu, fait bouger tout seul des éléments, etc.


$(document).ready(function($) {

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


	/**
	*  Facture : active le bouton Enregistrer si c'est passer une facturer
	*  à l'état Payée
	*/

	$("input[name=facture__statut]").on('input', function() {
		var factureStatut = $(this).val();
		if (factureStatut == "Payée") {
			$("input[type=submit]").prop("disabled", false);
		}
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
		hideNav();
	}else{
		ShowNav();
	}
});

// Cette fonction est appelée pour ouvrir le nav
function ShowNav() {
	nav__btn.classList.add('is--active');
	header__navbar.classList.add('is--active');
	showOverlay();
};

// Cette fonction est appelée pour fermer la nav
function hideNav() {
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
* Fonction : searchAndHide();
*/

// Cette fonction cherche cache tous les élèments
// qui ne contient pas une chaine de caractère
function searchAndHide(string, items) {
	items.forEach(item => {
		// Récupére le contenu de l'élèment
		var content = item.innerHTML;
		content = content.toString();
		// Convertie tout en bas de case pour comparer plus facilement
		content = content.toLowerCase();
		string = string.toLowerCase();

		// Compare le contenu de l'élèment et la chaine de caractère
		if(content.indexOf(string) !== -1){
			item.style.display = 'block';
		}else{
			item.style.display = 'none';
		}
	});
};


/**
* Module : Overlay
*/

let overlay = document.querySelector('.m-overlay');

// Cette fonction permet d'afficher l'Overlay
function showOverlay() {
	document.querySelector('.m-overlay').classList.add('is--active');
	document.body.classList.add('overflow--is--hidden');
	document.documentElement.classList.add('overflow--is--hidden');
};

// Cette fonction fermer l'Overlay
function hideOverlay() {
	hideNav();
	document.querySelector('.m-modal').classList.remove('is--active');
	document.body.classList.remove('overflow--is--hidden');
	document.documentElement.classList.remove('overflow--is--hidden');
};

// Ferme des trucs si qq'un click sur l'Overlay
overlay.addEventListener('click', function() {
	hideOverlay();
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
		showOverlay()
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
	selectTab.prepend(ul);

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
			// Simule un changement dans le select pour que d'autres fonction
			// puisse le détecter
			var event = new Event('change');
			select.dispatchEvent(event);
		});
	});

	// Sélectionne le premier <li>
	ul.firstChild.classList.add('is--active');
});


/**
* Module : Form - Select List
*/

// Cherche tous les Selects m-form__select-list
var selectsList = document.querySelectorAll('.m-form__select-list');
selectsList.forEach(selectList => {
	// Transforme chaque select en joli menu déroulant
	initSelectList(selectList);
});

// Cette fonction permet de modifier l'aspect d'un select
// en un joli menu déroulant
function initSelectList(selectList){
	// Ajoute une <div> dans la div.m-form__select-list
	var div = document.createElement('div');
	div.className = 'm-form__list';
	selectList.prepend(div);

	// Ajoute un <input> dans la <div> précédemment ajoutée
	var input = document.createElement('input');
	input.className = 'm-form__list-input';
	div.prepend(input);

	// Ajoute un <ul> dans la <div> précédemment ajoutée
	var ul = document.createElement('ul');
	ul.className = 'm-form__list-items';
	div.append(ul);

	// Récupére les options de ce select
	var options = selectList.querySelectorAll('option');

	// Ajoute un <li> par options dans la <div> précédemment ajoutée
	options.forEach(option => {
		let li = document.createElement('li');
		li.className = 'm-form__list-item';
		let optionValue = option.value;
		li.textContent = option.text;
		ul.append(li);

		// Ajoute une fonction si chaque <li> si qq'un clic dessus
		li.addEventListener('click', function(e) {
			// Récupére le contenu du <li> sélectionné
			let optionText = li.innerHTML;
			// Cherche le select
			let select = selectList.querySelector('select');
			// Sélectionne l'option correspondant au <li>
			select.value = optionValue;
			// Change la valeur de l'input
			input.value = optionText;
			// Simule un changement dans le select pour que d'autres fonction
			// puisse le détecter
			var event = new Event('change');
			select.dispatchEvent(event);
		});
	});

	// Ouvre la liste lorsque qq'un clic sur l'input
	input.addEventListener('focus', function(e) {
		div.classList.add('is--focus');
	});

	// Ferme la liste lorsque qq'un clic sur l'input
	input.addEventListener('focusout', function(e) {
		// Ajoute un léger délais permettant de verfier
		// si qq'un a cliqué sur un diffuseur
		setTimeout(function () {
			div.classList.remove('is--focus');
		}, 250)
	});

	// Cherche le diffuseur lorsque qq'un commence à taper dans l'input
	input.addEventListener('keyup', function(e) {
		var string = input.value;
		var items = ul.querySelectorAll('li');
		searchAndHide(string, items);
	});
}


/**
* Module : Form - Step
*/

// Cherche tous formulaire découpé en étape
var formsStep = document.querySelectorAll('.m-form__step');
formsStep.forEach(formStep => {

	// Défini le numeros d'étape actuelle
	let step = 1;
	changeStep(formStep, step);

	// Cherche les boutons
	let btn__next = formStep.querySelector('.btn__next');
	let btn__prev = formStep.querySelector('.btn__prev');
	let btn__cancel = formStep.querySelector('.btn__cancel');


	// Change le numuros d'étape si qq'un click sur Suivant
	btn__next.addEventListener('click', function(e) {
		// Cherche le .m-form__wrapper correspondant à l'étape
		form__wrapper = formStep.querySelector('.m-form__step-' + step);

		// Cherche les input et select du .m-form__wrapper complétés incorrectement
		input__requireds = form__wrapper.querySelectorAll(':invalid');

		if (input__requireds.length === 0) {
			// Si tous les champs sont rempli : passe à l'étape suivante
			step++;
			changeStep(formStep, step)
		}else {
			// Sinon : Focus le premier élèment à remplir
			input__requireds[0].focus();
		};
	});

	// Ferme la modale si qq'un click sur Annuler
	btn__cancel.addEventListener('click', function(e) {
		hideOverlay();
	});

	// Change le numuros d'étape si qq'un click sur Précédent
	btn__prev.addEventListener('click', function(e) {
		step--;
		changeStep(formStep, step)
	});

	// Cherche la nav du formulaire
	let form__navs = formStep.querySelectorAll('.m-form__nav li');
	// Enlève la class .is--active a tout les éléments de la nav
	form__navs.forEach(form__nav => {
		form__nav.addEventListener('click', function(e) {
			step = form__nav.getAttribute('data-step');
			changeStep(formStep, step);
		});
	});
});

// Cette fonction permet d'afficher l'étape d'un formulaire sur demande

function changeStep(formStep, step) {
	// Cherche tous les .m-form__wrapper
	let form__wrappers = formStep.querySelectorAll('.m-form__wrapper');
	// Cache tous les .m-form__wrapper
	form__wrappers.forEach(form__wrapper => {
		form__wrapper.style.display = 'none';
	});
	// Compte le nombre d'étapes
	let stepMax = form__wrappers.length;
	// Cherche le .m-form__wrapper correspondant à l'étape
	form__wrapper = formStep.querySelector('.m-form__step-' + step);
	// Affiche le .m-form__wrapper correspondant à l'étape
	form__wrapper.style.display = 'block';
	// Cherche les boutons
	let btn__next = formStep.querySelector('.btn__next');
	let btn__prev = formStep.querySelector('.btn__prev');
	let btn__submit = formStep.querySelector('.btn__submit');
	let btn__cancel = formStep.querySelector('.btn__cancel');
	// Change la visibilité des boutons en fonction de l'étape
	if (step == stepMax) {
		btn__submit.style.display = 'block';
		btn__next.style.display = 'none';
	}else {
		btn__submit.style.display = 'none';
		btn__next.style.display = 'block';
	};
	if (step > 1) {
		btn__prev.style.display = 'block';
		btn__cancel.style.display = 'none';
	}else {
		btn__prev.style.display = 'none';
		btn__cancel.style.display = 'block';
	};
	// Cherche la nav du formulaire
	let form__navs = formStep.querySelectorAll('.m-form__nav li');
	// Enlève la class .is--active a tout les éléments de la nav
	form__navs.forEach(form__nav => {
		form__nav.classList.remove('is--active');
	});
	// Cherche l'élément de la nav correspondant à l'étape
	form__nav = formStep.querySelector('.m-form__nav li:nth-of-type(' + step + ')');
	// Affiche le .m-form__wrapper correspondant à l'étape
	form__nav.classList.add('is--active');
}


/**
* Part : Search bar
*/

var searchBar = document.querySelector('.l-header__searchbar input');
searchBar.addEventListener('keyup', function(e) {
	var string = searchBar.value;
	var items = document.querySelectorAll('.l-projets__projet');
	searchAndHide(string, items);
});


/**
* Part : Modal add-projet
*/

// Cherche les boutons radio de la partie Équipe d'une modale
var retroRadios = document.querySelectorAll('input[name="projet__retrocession"]');
retroRadios.forEach(retroRadio => {
	// Vérifie que le bouton Oui est checked
	retroRadio.addEventListener('click', function(e) {
		let value = retroRadio.value;
		let div = document.querySelector('.m-form__equipe');
		// Si le bouton Oui est Checked, la partie suivante est affichée
		if (value == 1) {
			div.style.display = 'block';
		}else {
			div.style.display = 'none';
		}
	});
});


// Cherche le select du statut du projet
var selectStatut = document.querySelector('select[name="projet__statut"]');
if (selectStatut !== null) {
	// Vérifie si le select change de valeur
	selectStatut.addEventListener('change', function(e) {
		// Récupére la valeur du select
		let value = selectStatut.value;
		// Cherche l'input pour de la date de fin
		let inputDate = document.querySelector('input[name="date_de_fin"]');
		// Si select affiche "Projet en cours"
		if (value == 'Projet en cours') {
			// Active l'input pour de la date de fin
			inputDate.disabled = true;
		}else {
			// Désactive l'input pour de la date de fin
			inputDate.disabled = false;
		}
	});
}

// Cherche le bouton Ajouter un•e Artiste-Auteur de la partie Équipe d'une modale
var btn__addArtiste = document.querySelector('.btn__add-artiste');
// Vérifie si qq'un clic sur le bouton
if (btn__addArtiste) {
	btn__addArtiste.addEventListener('click', function(e) {
		// Cherche le premier formulaire permettant d'ajouter un artiste
		let formArtiste = document.querySelector('.m-form__artiste');
		// Copie ce premier formulaire permettant d'ajouter un artiste
		let newFormArtiste = formArtiste.cloneNode(true);
		// Réinitialise la copie (supprime les valeurs contenu dans celle-ci)
		newFormArtiste.querySelector('select').value = '';
		// Supprime les éléments ajouté dans la copie pour transformer
		// le select en un joli menu (pas panique : ils seront ré-ajouté plus tard)
		newFormArtiste.querySelector('.m-form__list').remove();
		// Cherche le dernier formulaire précédemment ajoutée
		let lastFormArtiste = Array.from(
			document.querySelectorAll('.m-form__artiste')
		).pop();
		// Ajoute la copie du formulaire sous les précédents
		lastFormArtiste.after(newFormArtiste);
		// Retranforme le select en joli menu
		initSelectList(newFormArtiste);
		// Relance le changement de nom des selects
		artisteChangeSelectName()
		// Cherche le btn__removeArtiste
		let btn__removeArtiste = newFormArtiste.querySelector('.btn__remove-artiste')
		// Relance la détection des boutons permettant de supprimer un artiste
		initBtnRemoveArtiste(btn__removeArtiste);
		// Cherche le select
		let artisteSelect = newFormArtiste.querySelector('select')
		onChangeArtisteSelect(artisteSelect);
	});
}

// Cherche tous les boutons Suprimer un•e Artiste-Auteur de la partie Équipe d'une modale
var btns__removeArtiste = document.querySelectorAll('.btn__remove-artiste');
btns__removeArtiste.forEach(btn__removeArtiste => {
	// Lance une fonction permettant de supprimer un formulaire
	initBtnRemoveArtiste(btn__removeArtiste);
});

// La fonction initBtnRemoveArtiste() permet d'activer un btn capable
// de supprimer un artiste, notament à chaque fois qu'un artiste
// est ajouté
function initBtnRemoveArtiste(btn__removeArtiste) {
	// Vérifie si qq'un clic sur le bouton
	btn__removeArtiste.addEventListener('click', function(e) {
		// Compte le nombre de formulaire affiché
		let nbFormArtiste = document.querySelectorAll('.m-form__artiste').length;
		// Vérifie que le formulaire n'est pas le dernier
		if (nbFormArtiste == 1) {
			// Si le formulaire est le dernier, cache simplent la section
			let div = document.querySelector('.m-form__equipe');
			div.style.display = 'none';
			// Cherche le bouton radio Non
			retroRadio = document.querySelector('input[name="projet__retrocession"][value="0"]');
			// Check le bouton Non
			retroRadio.checked = true;
		}else{
			// Si le formulaire n'est pas le dernier, cherche le formulaire du bouton
			let formArtiste = btn__removeArtiste.closest('.m-form__artiste');
			// Supprime ce formulaire
			formArtiste.remove();
			// Relance la detection des changement dans les select
			artisteChangeSelectName();
			// Actualise la liste du porteur du projet
			updateSelectPorteurProjet();
		}
	});
}

// La fonction artisteChangeSelectName() permet changer le name des select
// pour que chaque select est un nom unique
function artisteChangeSelectName(){
	// Cherche tous les formulaires permettant d'ajouter un artiste
	let formsArtiste = document.querySelectorAll('.m-form__artiste');
	// Ajoute une variable
	let nbArtiste = 1;
	// Modifie le name du select pour que chaque select est un nom unique
	formsArtiste.forEach(formArtiste => {
		formArtiste.querySelector('select').setAttribute('name', 'artiste__'+nbArtiste);
		// À chaque formArtiste trouvé la variablee est incrémenté de 1
		nbArtiste++
	});
}

// Cherche tous les select permettant d'ajouter des artistes
var artisteSelects = document.querySelectorAll('.m-form__artiste select');
artisteSelects.forEach(artisteSelect => {
	// Lance une fonction permettant d'actualiser le select du porteur du projet
	onChangeArtisteSelect(artisteSelect);
});

// La fonction onChangeArtisteSelect() permet d'actualiser
// le select du porteur du projet
function onChangeArtisteSelect(artisteSelect){
	artisteSelect.addEventListener('change', function(e) {
		updateSelectPorteurProjet();
	});
}

// La fonction updateSelectPorteurProjet() permet d'actualiser
// le select du porteur du projet
function updateSelectPorteurProjet(){
	// Cherche qq balises
	let div = document.querySelector('.m-form__porteurduprojet');
	let select = div.querySelector('select');
	let ul = div.querySelector('ul');
	// Sauvegarde la valeur du select
	let valueBackup = select.value;
	// Supprime les éléments ajouté pour transformer le select en un joli menu
	// (pas panique : ils seront ré-ajouté plus tard)
	div.querySelector('.m-form__list').remove();
	// Supprime toutes les options du select
	// (pas panique : ils seront ré-ajouté plus tard)
	select.innerText = null;
	// Prepare l'ajout de la première option
	let value =  0;
	let texte =  'Vous';
	// Créer une nouvelle option
	let option = document.createElement('option');
	option.value = value;
	option.textContent = texte;
	// Ajoute la nouvelle option dans le select
	select.append(option);
	// Cherche tous les select permettant d'ajouter un artiste
	let artisteSelects = document.querySelectorAll('.m-form__artiste select');
	// Cherche la valeur et le texte de l'option sélectionnée
	artisteSelects.forEach(artisteSelect => {
		// Cherche la valeur et le texte de l'option sélectionnée
		let value =  artisteSelect.value;
		let texte =  artisteSelect.options[artisteSelect.selectedIndex].text;
		// Créer une nouvelle option
		let option = document.createElement('option');
		option.value = value;
		option.textContent = texte;
		// Ajoute la novuelle option dans le select
		select.append(option);
	});
	// Retranforme le select en joli menu
	initSelectList(div);
	// Cherche le nouvel input
	let input = div.querySelector('input');
	// Défini comme valeur par defaut 'Vous'
	select.value = 0;
	input.value = 'Vous';
	// Vérifie si la valeur précédente du select exite encore
	for (i = 0; i < select.length; ++i){
		if (select.options[i].value == valueBackup){
			// Si la valeur exite, la valeur est re-définie
			select.value = valueBackup;
			input.value = select.options[select.selectedIndex].text;
		}
	}
}
