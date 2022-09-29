<?php

// Ce fichier permet de centraliser tous les trucs
// que l'on demande tout le temps à Nadine


/**
* Récuparation du dernier Numéros de version de Nadine.
*/

function get_num_version(){
  if (($journal = fopen("./assets/csv/journal.csv", "r")) !== FALSE){
    $numVersion = array();
    while (($data = fgetcsv($journal, 10000, ";")) !== FALSE){
      $numVersion[] = $data;
    }
    fclose($journal);

    // Extraire le dernier numéros de version du journal
    $numVersion = $numVersion[0][0];

    // Envoie le numéros de version
    return $numVersion;
  }
}
?>
