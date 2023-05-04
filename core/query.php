<?php

// Le fichier query.php permet de se connecter à la base de données
// et de faire des requêtes.


/**
 *  Importation des paramètres de connection
 */

require(__DIR__ . '/config.php');


/**
 *  Importe les paramètres et test de la base de donnée
 *  Si une erreur est détectée : lancement du TurboTuto™
 */

try {
  $conn = new mysqli($servername, $username, $password, $dbname);
} catch (mysqli_sql_exception $e) {
  // Lancement du TurboTuto™
  header('Location: ./core/init__tuto.php');
  die();
}


/**
 *  Connection à la base de donnée
 */

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


/**
 *  Modification du jeu de résultats en utf8mb4 (pour support des emojis)
 */

if (!$conn->set_charset("utf8mb4")) {
  printf("Erreur lors du chargement du jeu de caractères utf8mb4 : %s\n", $mysqli->error);
  exit();
} else {
  $conn->character_set_name();
}
