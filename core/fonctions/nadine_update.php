<?php

/**
 * La fonction nadine_update() simplifie la mise à jour de la base de données
 */

function nadine_update($table, $primaryKey, $data)
{
  if (!empty($table) && !empty($primaryKey) && !empty($data) && is_array($data)) {
    // Formate au besoin le nom de la table
    $table = ucfirst($table);

    // Formate la requête SQL
    $sql = "UPDATE $table SET ";

    // Formate la requête SQL
    foreach ($data as $key => $value) {
      if ($key != $primaryKey) {
        $sql .= $key . " = '" . $value . "', ";
      }
    };

    $sql = substr($sql, 0, -2);

    // Formate la requête SQL
    $sql .= " WHERE " . $primaryKey . " = " . $data[$primaryKey];

    require(__DIR__ . '/query.php');
    $conn->query($sql) or die($conn->error);
    $conn->close();
  }
}
