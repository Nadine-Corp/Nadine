<?php

/**
 * La fonction the_projet_class() affiche qq class dans la balise <article>
 */

function the_projet_class($row)
{
  if (isset($row)) {

    // Ajoute l'id comme class
    $class  = 'l-projets__' . $row['projet__id'] . ' ';

    // Ajoute le statut comme class
    if ($row['projet__statut'] == 'Projet en cours') {
      $class .= 'l-projets__encours';
    } elseif ($row['projet__statut'] == 'Projet terminé') {
      $class .= 'l-projets__termine';
    } elseif ($row['projet__statut'] == 'Projet annulé') {
      $class .= 'l-projets__annule';
    }

    // Retourne le résultat au template
    echo $class;
  }
}
