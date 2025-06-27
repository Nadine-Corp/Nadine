<?php

/**
 * La fonction nadine_insert() simplifie l'ajout à la base de données
 */

function nadine_insert($table, $primaryKey, $data)
{
  if (!empty($table) && !empty($primaryKey) && !empty($data) && is_array($data)) {
    // Formate au besoin le nom de la table
    $table = ucfirst($table);

    // Exclure la colonne diffuseur__id
    unset($data[$primaryKey]);

    // Formate la requête SQL
    $columns = implode(", ", array_keys($data));
    $values = implode("', '", array_values($data));

    $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

    require(__DIR__ . '/query.php');
    $conn->query($sql) or die($conn->error);
    $conn->close();
  }
}
