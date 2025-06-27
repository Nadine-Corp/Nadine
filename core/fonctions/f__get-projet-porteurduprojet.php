<?php

/**
 * La fonction the_projet__porteurduprojet() affiche
 * l'ID du porteur du projet
 */

function the_projet__porteurduprojet($row)
{
  if (isset($row) && isset($row['projet__porteurduprojet'])) {
    // Récupère la liste des artistes du projet
    $projet__porteurduprojet = $row['projet__porteurduprojet'];

    // Retourne le résultat au template
    echo $projet__porteurduprojet;
  }
}
