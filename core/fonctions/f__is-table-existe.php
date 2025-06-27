<?php

/**
 * La fonction is_table_existe() permet de savoir s'il existe
 * des Diffuseurs dans la base de données
 */

function is_table_existe($table)
{
  if (isset($table)) {

    // Envoie la requête demandée à la base de données
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
    $result = $conn->query("SELECT COUNT(*) FROM " . $table);

    // Test si la table Diffuseurs est vide
    $row = $result->fetch_row();
    if ($row[0] > 0) {
      return true;
    } else {
      return false;
    }
  }
}
