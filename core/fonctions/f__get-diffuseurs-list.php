<?php

/**
 * La fonction the_diffuseurs_list() permet d'afficher
 * la liste de tous les diffuseurs
 */

function the_diffuseurs_list()
{

  nadine_log("Nadine lance la fonction the_diffuseurs_list()");

  // Demande tous les diffuseurs à la base de donnée
  $args = array(
    'FROM'     => 'Diffuseurs',
    'WHERE'    => 'diffuseur__corbeille = 0',
    'ORDER BY' => 'diffuseur__societe'
  );
  $loop = nadine_query($args);


  // Formate chaque diffuseurs et les Retourne au template
  if ($loop->num_rows > 0) :
    while ($row = $loop->fetch_assoc()) :

      // Ajoute l'ID sur diffuseur en valeur
      echo '<option value=' . $row["diffuseur__id"] . '>';

      // Affiche le nom de société ou le nom et prenom du diffuseur
      // en fonction du type de diffuseur
      if ($row["diffuseur__type"] == 'particulier') {
        the_diffuseur_name($row);
      } else {
        if (!empty(get_diffuseur_societe($row))) {
          the_diffuseur_societe($row);
          echo ' — ';
        }
        the_diffuseur_name($row);
      }
      echo '</option>';

    endwhile;
  endif;
}
