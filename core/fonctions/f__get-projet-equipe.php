<?php

/**
 * La fonction the_projet_equipe() affiche la liste
 * des artites travaillant sur un projet
 */

function the_projet_equipe($row)
{

  nadine_log("Nadine lance la fonction the_projet_equipe()");

  if (isset($row)) {
    // Récupère la liste des artistes du projet
    $artistes = $row['artiste__id'];

    // Transforme la liste des artistes du projet en Array
    $artistes = unserialize($artistes);

    // Ajoute une variable pour stocker les info de chaque Artiste
    $list = '';


    // Récupère les infos du profil
    if (isset($row['profil__id'])) {
      $args = array(
        'FROM'     => 'Profil',
        'WHERE'    => 'Profil.profil__id =' . $row['profil__id'],
      );
    } else {
      $args = array(
        'FROM'     => 'Profil',
        'ORDER BY' => 'profil__id',
        'ORDER'    => 'DESC',
        'LIMIT'    => 1
      );
    }

    $loop = nadine_query($args);
    if ($loop->num_rows > 0) :
      while ($row = $loop->fetch_assoc()) :
        // Récupère les infos du profil
        $civilite = $row['profil__civilite'];
        $prenom = $row['profil__prenom'];
        $nom = $row['profil__nom'];

        // Formate les infos du profil
        $profil = nadine_name($civilite, $prenom, $nom);
        $profil = '<span class="m-body-s"><em>' . $profil . '</em></span>';
        $profil = $profil . '<span class="m-body-s">Artiste-Auteur</span>';

        // Ajoute profil au résultat
        $list .= '<li class="m-cover__artiste">' . $profil . '</li>';
      endwhile;
    endif;

    // Récupère les infos de chaque artistes du projet
    if ($artistes) {
      foreach ($artistes as $key => $artiste__id) {
        $args = array(
          'FROM'     => 'Artistes',
          'WHERE'    => 'Artistes.artiste__id =' . $artiste__id,
        );
        $loop = nadine_query($args);
        if ($loop->num_rows > 0) :
          while ($row = $loop->fetch_assoc()) :
            // Récupère les infos de l'artiste
            $civilite = get_artiste_civilite($row);
            $prenom = get_artiste_prenom($row);
            $nom = get_artiste_nom($row);

            // Formate les infos du diffuseur
            $artiste = nadine_name($civilite, $prenom, $nom);
            $artiste = '<span class="m-body-s"><em>' . $artiste . '</em></span>';
            $artiste = $artiste . '<span class="m-body-s">Artiste-Auteur</span>';

            // Ajoute l'artiste au résultat
            $list .= '<li class="m-cover__artiste">' . $artiste . '</li>';
          endwhile;
        endif;
      }
    }

    // Formate le résultat
    $list = '<ul>' . $list . '</ul>';

    // Retourne le résultat au template
    echo $list;
  }
}
