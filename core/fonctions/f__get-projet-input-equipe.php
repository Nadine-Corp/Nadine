<?php

/**
 * La fonction the_projet_input_equipe() affiche les inputs
 * permettant de modifier les équipiers dans la modale ajout un projet
 */

function the_projet_input_equipe($row)
{
  if (isset($row) && isset($row['artiste__id'])) {

    // Récupère la liste des artistes du projet
    $artistes = $row['artiste__id'];

    // Transforme la liste des artistes du projet en Array
    $artistes = unserialize($artistes);

    // Récupère les infos de chaque artistes du projet
    if (is_array($artistes) && count($artistes) > 0) {

      //Ajoute un compteur
      $artisteNb = 0;

      foreach ($artistes as $key => $artiste__id) {
        // Incrémente le compteur
        $artisteNb++;

        // Ajoute l'artiste au résultat
        include(__DIR__ . '/../parts/p__modal-projet-input-equipe.php');
      }
    } else {
      include(__DIR__ . '/../parts/p__modal-projet-input-equipe.php');
    }
  } else {
    include(__DIR__ . '/../parts/p__modal-projet-input-equipe.php');
  }
}
