<?php

/**
 * La fonction get_profil_template() retourne
 * le nom du template par defaut utilisé par utilisateur
 * pour ses devis et factures
 */

function get_profil_template($row)
{

  // Défini le Template par defaut
  // de Nadine
  $defaut__template = 'facture__2024';

  if (isset($row)) {
    if (!empty($row['profil__template'])) {
      // Récupère les infos du profil
      $profil__template = $row['profil__template'];
    } else {
      // Récupère l'ID du dernier profil dans la base de donnée
      $args = array(
        'FROM'     => 'Profil',
        'ORDER BY' => 'profil__id',
        'ORDER'    => 'DESC',
        'LIMIT'    => 1
      );

      $loop = nadine_query($args);
      if ($loop->num_rows > 0) :
        while ($row = $loop->fetch_assoc()) :
          $profil__template = $row['profil__template'];
        endwhile;
      else :
        $profil__template = $defaut__template;
      endif;
    }

    // Retourne le résultat au template
    return $profil__template;
  }
}


/**
 * La fonction set_profil_template() modifie
 * le nom du template par defaut utilisé par utilisateur
 * pour ses devis et factures
 */

function set_profil_template($profil__template = 'facture__2021')
{
  // Ajoute une variable pour stocker les infos à envoyer dans la base de données
  $data = array();

  // Formate les data
  $data['profil__template'] = $profil__template;

  // Insertion dans la base données
  $table = 'Profil';
  $primaryKey = 'profil__id';
  nadine_insert($table, $primaryKey, $data);
}


/**
 * La fonction the_profil_template() affiche
 * le nom du template par defaut utilisé par utilisateur
 * pour ses devis et factures
 */

function the_profil_template($row)
{
  if (isset($row)) {
    if (!empty($row['profil__template'])) {
      // Récupère les infos du profil
      $profil__template = get_profil_template($row);

      // Retourne le résultat au template
      echo $profil__template;
    }
  }
}
