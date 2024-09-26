<?php

/**
 * La fonction get_artiste_name() retourne
 * la civilité, le Prénom et le nom des artistes demandés
 */

function get_artiste_name($row)
{
  if (isset($row)) {
    // Récupère les infos de l'artiste
    $civilite = get_artiste_civilite($row);
    $prenom = get_artiste_prenom($row);
    $nom = get_artiste_nom($row);

    // Formate le nom
    $artiste_name = nadine_name($civilite, $prenom, $nom);

    // Retourne le résultat au template
    return $artiste_name;
  }
}


/**
 * La fonction the_artiste_name() affiche
 * la civilité, le Prénom et le nom des artistes demandés
 */

function the_artiste_name($row)
{
  if (isset($row)) {
    // Récupère les infos de l'artiste
    $artiste_name = get_artiste_name($row);

    // Retourne le résultat au template
    echo $artiste_name;
  }
}
