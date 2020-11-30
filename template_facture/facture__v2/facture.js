$( document ).ready(function() {
		calc();
	$(".form__input-prix").on("change paste keyup", function() {
		calc();
	});
});

function calc () {
	prix_1 = parseInt ( $("input[name$='facture__prix_1']").val() ) || 0;
	prix_2 = parseInt ( $("input[name$='facture__prix_2']").val() ) || 0;
	prix_3 = parseInt ( $("input[name$='facture__prix_3']").val() ) || 0;
	prix_4 = parseInt ( $("input[name$='facture__prix_4']").val() ) || 0;
	prix_5 = parseInt ( $("input[name$='facture__prix_5']").val() ) || 0;
	prix_6 = parseInt ( $("input[name$='facture__prix_6']").val() ) || 0;
	prix_7 = parseInt ( $("input[name$='facture__prix_7']").val() ) || 0;

	total = (prix_1 + prix_2 + prix_3 + prix_4 + prix_5 + prix_6 + prix_7);
	css = (total*0.004).toFixed(2);
	cotisation_maladies_vieillesse = (total*0.069).toFixed(2);
	csg = (total*0.9825*0.092).toFixed(2);
	crds = (total*0.9825*0.005).toFixed(2);
	cfpc = (total*0.0035).toFixed(2);
	total_precompte = ( +(cotisation_maladies_vieillesse) + +(csg) + +(crds) + +(cfpc) + +(css)).toFixed(2);
	total_artiste = ( +(total) - +(total_precompte)).toFixed(2);
	contribution_sociales = (total*0.01).toFixed(2);
	contribution_a_la_formation_professionnelle = (total*0.001).toFixed(2);
	total_des_contributions_diffuseur = ( +(contribution_sociales) + +(contribution_a_la_formation_professionnelle) ).toFixed(2);
	total_mda = ( +(total_precompte) + +(total_des_contributions_diffuseur) ).toFixed(2);
	total_charges = ( total*0.011 ).toFixed(2);
	totalEtCharges =  ( +(total) + +(total_charges) ).toFixed(2);

	$("input[name$='total']").val(total);
	$("input[name$='contribution-secu-sociales']").val(css);
	$("input[name$='cotisation-maladies-vieillesse']").val(cotisation_maladies_vieillesse);
	$("input[name$='CSG']").val(csg);
	$("input[name$='CRDS']").val(crds);
	$("input[name$='CFPC']").val(cfpc);
	$("input[name$='total-precompte']").val(total_precompte);
	$("input[name$='facture__total']").val(total_artiste);
	$("input[name$='contribution-sociales']").val(contribution_sociales);
	$("input[name$='contribution-a-la-formation-professionnelle']").val(contribution_a_la_formation_professionnelle);
	$("input[name$='total-des-contributions-diffuseur']").val(total_des_contributions_diffuseur);
	$("input[name$='total-mda']").val(total_mda);
	$("input[name$='total_charges']").val(total_charges);
	$("input[name$='TotalEtCharges']").val(totalEtCharges);
	$("#total-artiste").text(total_artiste + " €");
	$("#total-mda").text(total_mda + " €");
}
