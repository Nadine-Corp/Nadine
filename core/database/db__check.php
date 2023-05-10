<?php

// Le fichier init.php permet de reset de la base donnée et de repartir à zéro


/**
 * Importe le fichier rassemblant toutes les fonctions
 * les plus importantes de Nadine
 */

require_once(__DIR__ . '/../fonctions.php');


/**
 *  Importe la structure de la base de données
 */

include(__DIR__ .  '/db__structure.php');


/**
 *  Vérifie la structure de la base données
 *  et ajoute les colonnes manquantes
 *  ou modifie les colonnes existante au besoin
 */

foreach ($tables as $table_name => $columns) {

  // Vérifie si la connection à la base de donnée fonctionne
  global $servername, $username, $password, $dbname;
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Modification du jeu de résultats en utf8mb4 (pour support des emojis)
  if (!$conn->set_charset("utf8mb4")) {
    printf("Erreur lors du chargement du jeu de caractères utf8mb4 : %s\n", $mysqli->error);
    exit();
  } else {
    $conn->character_set_name();
  }

  // Formate la requête SQL
  $sql = "SHOW TABLES LIKE '$table_name'";

  // Envoie la requête demandée à la base de données
  $result = $conn->query($sql) or die($conn->error);
  $table_exists = mysqli_num_rows($result);

  // Si la table n'exite pas : ajoute de la table et de ses colonnes
  if (!$table_exists) {
    // Formate la requête SQL
    $sql = "CREATE TABLE " . $table_name . " (";
    foreach ($columns as $column_name => $column_info) {
      $column_format = db__format_column($column_info);
      $sql .= "$column_name $column_format, ";
    }
    $sql = rtrim($sql, ', ');
    $sql .= ')';

    // Envoie la requête demandée à la base de données
    $result = $conn->query($sql) or die($conn->error);
  } else {
    // Ajoute qq variables
    $prev_column_name = '';
    // Vérifie chaque colonne
    foreach ($columns as $column_name => $column_info) {
      $column_format = db__format_column($column_info);

      // Récupère les infos de la base de données
      $result = $conn->query("SHOW COLUMNS FROM $table_name LIKE '$column_name'");

      // Ajoute la colonne si elle n'exite pas
      if ($result->num_rows == 0) {

        // Formate la requête SQL
        if (!$prev_column_name == '') {
          $sql = "ALTER TABLE $table_name ADD COLUMN $column_name $column_format AFTER $prev_column_name";
        } else {
          // Gère la requête SQL si la colonne manquante est la première
          $sql = "ALTER TABLE $table_name ADD COLUMN $column_name $column_format";
        };

        // Envoie la requête demandée à la base de données
        $result = $conn->query($sql) or die($conn->error);
      } else {
        // Modifie la colonne s'il s'agit de la primary_key
        if (empty($column_info['primary_key'])) {
          // Formate la requête SQL pour modifier la colonne
          $sql = "ALTER TABLE $table_name MODIFY COLUMN $column_name $column_format";
          // Envoie la requête demandée à la base de données
          $result = $conn->query($sql) or die($conn->error);
        };
      }
      $prev_column_name = $column_name;
    }
  }
}
