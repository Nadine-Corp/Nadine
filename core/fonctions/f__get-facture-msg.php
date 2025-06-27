<?php

/**
 * La fonction the_facture_msg() affiche le message
 * a envoyé avec les facture ou les devis
 */

function the_facture_msg($row, $prefix)
{
  if (isset($row)) {
    // Récupère le message dans la base de donnée
    $args = array(
      'FROM'     => 'Profil',
      'ORDER BY' => 'profil__id',
      'ORDER'    => 'DESC',
      'LIMIT'    => 1
    );

    $loop = nadine_query($args);
    if ($loop->num_rows > 0) :
      while ($data = $loop->fetch_assoc()) :
        $profil__msg = $data['profil__msg_' . $prefix];
      endwhile;
    endif;

    // Liste des {{String}} à remplacer par des $Variables
    $vars = array(
      '{{diffuseur__civilite}}'         => $row['diffuseur__civilite'],
      '{{diffuseur__prenom}}'           => $row['diffuseur__prenom'],
      '{{diffuseur__nom}}'              => $row['diffuseur__nom'],
      '{{diffuseur__societe}}'          => $row['diffuseur__societe'],
      '{{diffuseur__email}}'            => $row['diffuseur__email'],
      '{{projet__nom}}'                 => $row['projet__nom'],
      '{{profil__societe}}'             => $row['profil__societe'],
      '{{profil__civilite}}'            => $row['profil__civilite'],
      '{{profil__prenom}}'              => $row['profil__prenom'],
      '{{profil__nom}}'                 => $row['profil__nom'],
      '{{profil__pseudo}}'              => $row['profil__pseudo'],
      '{{profil__initiales}}'           => $row['profil__prenom'],
      '{{profil__adresse}}'             => $row['profil__adresse'],
      '{{profil__code_postal}}'         => $row['profil__code_postal'],
      '{{profil__ville}}'               => $row['profil__ville'],
      '{{profil__pays}}'                => $row['profil__pays'],
      '{{profil__telephone}}'           => $row['profil__telephone'],
      '{{profil__email}}'               => $row['profil__email'],
      '{{profil__website}}'             => $row['profil__website'],
      '{{profil__numero_secu}}'         => $row['profil__numero_secu'],
      '{{profil__numero_mda}}'          => $row['profil__numero_mda'],
      '{{profil__siret}}'               => $row['profil__siret'],
      '{{profil__titulaire_du_compte}}' => $row['profil__titulaire_du_compte'],
      '{{profil__iban}}'                => $row['profil__iban'],
      '{{profil__bic}}'                 => $row['profil__bic']
    );

    // Formate le résultat
    $profil__msg = strtr(nl2br($profil__msg), $vars);

    // Retourne le résultat au template
    echo $profil__msg;
  }
}
