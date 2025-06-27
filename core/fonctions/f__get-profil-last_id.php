<?php

/**
 * La fonction get_profil_last_id() permet de récupérer
 * le numéros du dernier profil utilisateur
 */

function get_profil_last_id()
{
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
      $profil__id = $row['profil__id'];
    endwhile;
  endif;

  // Retourne le résultat au template
  return $profil__id;
}
