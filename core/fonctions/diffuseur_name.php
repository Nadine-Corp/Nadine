<?php

/**
 * La fonction get_diffuseur_name() retourne
 * la civilité, le Prénom et le nom des diffuseurs d'un projet
 */

function get_diffuseur_name($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $civilite = get_diffuseur_civilite($row);
    $prenom = get_diffuseur_prenom($row);
    $nom = get_diffuseur_nom($row);

    // Formate le nom
    $diffuseur_name = nadine_name($civilite, $prenom, $nom);

    // Retourne le résultat au template
    return $diffuseur_name;
  }
}

/**
 * La fonction the_diffuseur_name() affiche
 * la civilité, le Prénom et le nom des diffuseurs d'un projet
 */

function the_diffuseur_name($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur_name = get_diffuseur_name($row);

    // Retourne le résultat au template
    echo $diffuseur_name;
  }
}
