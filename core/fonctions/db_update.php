<?php

/**
 * La fonction db__update() permet
 * de mettre à jour la base de données
 */

function db__update($num_version = '')
{

  // Vérifie si le numéro de version de Nadine
  // a été envoyé
  if ($num_version == '') {
    // Cherche le numéro de version de Nadine
    $num_version = get_num_version();
  }

  // Vérifier si la structure de la Base données
  // correspond à celle de db__structure.php
  include_once(__DIR__ . '../database/db__check.php');

  // Mets à jour le numéros de version dans la base de données
  $sql = "UPDATE Options SET option__valeur = '" . $num_version . "' WHERE option__nom = 'nadine__version'";
  $conn->query($sql) or die($conn->error);
  $conn->close();
}
