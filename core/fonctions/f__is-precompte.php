<?php

/**
 * La fonction is_precompte() permet de savoir si un projet doit utiliser
 * ou pas le systeme de précompte
 */

function is_precompte($diffuseur__id = '', $table = '', $facture__id = '')
{
  // Vérifie si une facture ou devis ID a été envoyé avec la demande
  if ($facture__id !== 'new' && $facture__id !== '') {
    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Formate au besoin le nom de la table
    $table = ucfirst($table);

    // Récupère les info de la facture ou devis dans la base de donnée
    $args = array(
      'FROM'     => $table,
      'WHERE'    => $prefix . '__id' . ' = ' . $facture__id,
    );
    $loop = nadine_query($args);


    // Récupère les options de précompte de la facture ou devis
    if ($loop->num_rows > 0) :
      while ($row = $loop->fetch_assoc()) :
        $facture__precompte = $row['facture__precompte'];
      endwhile;
    endif;


    // Retourne le résultat au template
    return $facture__precompte == 0 ? false : true;
  };

  // Vérifie si un Diffuseur ID a été envoyé avec la demande
  if (!empty($diffuseur__id)) {
    // Récupère les info du diffuseur dans la base de donnée
    $args = array(
      'FROM'     => 'Diffuseurs',
      'WHERE'    => 'diffuseur__id =' . $diffuseur__id
    );
    $loop = nadine_query($args);

    // Récupère le type du diffuseur
    if ($loop->num_rows > 0) :
      while ($row = $loop->fetch_assoc()) :
        $diffuseur__type = $row['diffuseur__type'];
      endwhile;
    endif;
  }

  // Récupère le dernier profil dans la base de donnée
  $args = array(
    'FROM'     => 'Profil',
    'ORDER BY' => 'profil__id',
    'ORDER'    => 'DESC',
    'LIMIT'    => 1
  );
  $loop = nadine_query($args);

  // Récupère la valeur du précompte dans le dernier profil
  if ($loop->num_rows > 0) :
    while ($row = $loop->fetch_assoc()) :
      $profil__precompte = $row['profil__precompte'];
    endwhile;
  endif;

  // Vérifie la valeur du précompte dans le dernier profil
  if ($profil__precompte == '1') {
    if (!empty($diffuseur__type)) {
      // Vérifie si le diffuseur est assujetti au precompte
      if (!$diffuseur__type == 'autre') {
        // Retourne le résultat au template
        return false;
      }
    } else {
      // Retourne le résultat au template
      return true;
    }
  } else {
    // Retourne le résultat au template
    return false;
  }
}
