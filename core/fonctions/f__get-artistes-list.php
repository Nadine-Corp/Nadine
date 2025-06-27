<?php

/**
 * La fonction the_artistes_list() permet d'afficher
 * la liste de tous les diffuseurs
 */

function the_artistes_list()
{
  // Demande tous les diffuseurs à la base de donnée
  $args = array(
    'FROM'     => 'Artistes',
    'WHERE'    => 'artiste__corbeille = 0',
    'ORDER BY' => 'artiste__societe'
  );
  $loop = nadine_query($args);


  // Formate chaque diffuseurs et les Retourne au template
  if ($loop->num_rows > 0) :
    while ($row = $loop->fetch_assoc()) :

      // Ajoute l'ID sur diffuseur en valeur
      echo '<option value=' . $row["artiste__id"] . '>';

      // Affiche le nom de société ou le nom et prenom du diffuseur
      // en fonction du type de diffuseur
      if ($row["artiste__societe"]) {
        the_artiste_societe($row);
        echo ' — ';
        the_artiste_name($row);
      } else {
        the_artiste_name($row);
      }
      echo '</option>';

    endwhile;
  endif;
}
