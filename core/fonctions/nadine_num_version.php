<?php

/**
 * La fonction get_num_version() récupère le dernier Numéros de version de Nadine.
 * dans le journal de développement
 */

function get_num_version()
{
  if (($journal = fopen("./assets/csv/journal.csv", "r")) !== FALSE) {
    $numVersion = array();
    while (($data = fgetcsv($journal, 10000, ";")) !== FALSE) {
      $numVersion[] = $data;
    }
    fclose($journal);

    // Extraire le dernier numéros de version du journal
    $numVersion = $numVersion[0][0];

    // Envoie le numéros de version
    return $numVersion;
  }
}
