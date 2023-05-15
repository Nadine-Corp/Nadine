document.addEventListener("DOMContentLoaded", function () {
	calc();
	var inputs = document.querySelectorAll(".form__input-prix");
	inputs.forEach(function (input) {
		input.addEventListener("change", calc);
		input.addEventListener("paste", calc);
		input.addEventListener("keyup", calc);
	});
});

// La Fonction Calc() recalcule tous les totaux
// dès que l'utilisateur modifie le prix des tâches

function calc() {
	var prix_1 = parseInt(document.querySelector("input[name$='facture__prix_1']").value) || 0;
	var prix_2 = parseInt(document.querySelector("input[name$='facture__prix_2']").value) || 0;
	var prix_3 = parseInt(document.querySelector("input[name$='facture__prix_3']").value) || 0;
	var prix_4 = parseInt(document.querySelector("input[name$='facture__prix_4']").value) || 0;
	var prix_5 = parseInt(document.querySelector("input[name$='facture__prix_5']").value) || 0;
	var prix_6 = parseInt(document.querySelector("input[name$='facture__prix_6']").value) || 0;
	var prix_7 = parseInt(document.querySelector("input[name$='facture__prix_7']").value) || 0;

	// Calcule des totaux
	var total = prix_1 + prix_2 + prix_3 + prix_4 + prix_5 + prix_6 + prix_7;
	var css = total * 0.004;
	var cotisation_maladies_vieillesse = total * 0.069;
	var csg = total * 0.9825 * 0.092;
	var crds = total * 0.9825 * 0.005;
	var cfpc = total * 0.0035;
	var total_precompte = cotisation_maladies_vieillesse + +csg + +crds + +cfpc + +css;
	var total_artiste = total - +total_precompte;
	var contribution_sociales = total * 0.01;
	var contribution_a_la_formation_professionnelle = total * 0.001;
	var total_des_contributions_diffuseur = contribution_sociales + contribution_a_la_formation_professionnelle;
	var total_mda = total_precompte + total_des_contributions_diffuseur;
	var total_charges = total * 0.011;
	var totalEtCharges = total + total_charges;

	// Affiche les totaux
	var totalInput = document.querySelector("input[name='total']");
	if (totalInput) {
		totalInput.value = arrondi(total);
	}
	var cssInput = document.querySelector("input[name='contribution-secu-sociales']");
	if (cssInput) {
		cssInput.value = arrondi(css);
	}
	var cotisationInput = document.querySelector("input[name='cotisation-maladies-vieillesse']");
	if (cotisationInput) {
		cotisationInput.value = arrondi(cotisation_maladies_vieillesse);
	}
	var csgInput = document.querySelector("input[name='CSG']");
	if (csgInput) {
		csgInput.value = arrondi(csg);
	}
	var crdsInput = document.querySelector("input[name='CRDS']");
	if (crdsInput) {
		crdsInput.value = arrondi(crds);
	}
	var cfpcInput = document.querySelector("input[name='CFPC']");
	if (cfpcInput) {
		cfpcInput.value = arrondi(cfpc);
	}
	var totalPrecompteInput = document.querySelector("input[name='total-precompte']");
	if (totalPrecompteInput) {
		totalPrecompteInput.value = arrondi(total_precompte);
	}
	var totalContributionsDiffuseurInput = document.querySelector("input[name='total-des-contributions-diffuseur']");
	if (totalContributionsDiffuseurInput) {
		totalContributionsDiffuseurInput.value = arrondi(total_des_contributions_diffuseur);
	}
	var totalArtisteElement = document.querySelector("input[name='facture__total']");
	if (totalArtisteElement) {
		totalArtisteElement.value = arrondi(total_artiste);
	}
	var contributionSocialesInput = document.querySelector("input[name='contribution-sociales']");
	if (contributionSocialesInput) {
		contributionSocialesInput.value = arrondi(contribution_sociales);
	}
	var contributionFormationInput = document.querySelector("input[name='contribution-a-la-formation-professionnelle']");
	if (contributionFormationInput) {
		contributionFormationInput.value = arrondi(contribution_a_la_formation_professionnelle);
	}
	var totalMDAInput = document.querySelector("input[name='total-mda']");
	if (totalMDAInput) {
		totalMDAInput.value = arrondi(total_mda);
	}
	var totalChargesInput = document.querySelector("input[name='total_charges']");
	if (totalChargesInput) {
		totalChargesInput.value = arrondi(total_charges);
	}
	var totalEtChargesInput = document.querySelector("input[name='TotalEtCharges']");
	if (totalEtChargesInput) {
		totalEtChargesInput.value = arrondi(totalEtCharges);
	}
	var totalArtisteText = document.getElementById("total-artiste");
	if (totalArtisteText) {
		totalArtisteText.textContent = arrondi(total_artiste) + " €";
	}
	var totalMDAText = document.getElementById("total-mda");
	if (totalMDAText) {
		totalMDAText.textContent = arrondi(total_mda) + " €";
	}
}


// La Fonction Arrondi() supprime les décimales
// lorsqu'elles ne sont pas nécessaire

function arrondi(number) {
	if (number % 1 > 0) {
		number = parseFloat(number).toFixed(2).replace(".", ",");
	} else {
		number = parseInt(number).toFixed(0);
	}
	return number;
}
