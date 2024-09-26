<?php

/**
 * La fonction get_facture_template() récupère
 * le bon template pour afficher les devis ou facture
 */

function get_facture_template($row, $table)
{
  nadine_log("Nadine lance la fonction get_facture_template()");
  if (isset($row) && isset($table)) {
    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Cherche dans la Base de données si un template
    // a été enregistré
    if (isset($row[$prefix . '__template'])) {
      // Récupère le nom du template
      $facture__template = $row[$prefix . '__template'];
      nadine_log("Nadine a trouvé un template dans la base de données :" . $facture__template);

      // Vérifie si le template extiste
      $facture__folder = __DIR__ . '/../template_facture/' . $facture__template;
      nadine_log("Nadine se prépare a vérifier si le dossier suivant existe :" . $facture__folder);
      if (is_dir($facture__folder)) {
        nadine_log("Nadine a trouvé le dossier qu'elle cherchait !");
      } else {
        // Sinon, récupère le nom du template par défaut
        nadine_log("Nadine pense que le dossier suivant n'existe pas :" . $facture__folder);
        $facture__template = get_profil_template($row);
      }
    } else {
      // Si le template n'exite pas dans la Base de données
      // ou dans les fichiers de Nadine
      nadine_log("Nadine n'a pas trouvé de template de facture. Elle va en selectionner un toute seule");

      //Récupère le nom du template par défaut
      $facture__template = get_profil_template($row);
    }

    // Retourne le résultat au template
    return $facture__template;
  }
}


/**
 * La fonction the_facture_template() affiche
 * le bon template pour afficher les devis ou facture
 */

function the_facture_template($row, $table)
{
  nadine_log("Nadine lance la fonction the_facture_template()");
  if (isset($row) && isset($table)) {
    // Récupère le nom du template
    $facture__template = get_facture_template($row, $table);

    // Retourne le résultat au template
    echo $facture__template;
  }
}
