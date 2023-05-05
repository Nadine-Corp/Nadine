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
  include_once(__DIR__ . './turbotuto/turbotuto.php');
  exit();
}


/**
 *  Connection à la base de donnée
 */

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


/**
 *  Vérifie si un Profil existe dans la base de données
 */

try {
  $result = $conn->query("SELECT COUNT(*) FROM Profil");
  $row = $result->fetch_row();
  if (!$row[0] > 0) {

    // La table Profil existe mais est elle est vide :
    // Lancement du TurboTuto™ AutoProfil pour
    // que l'utilisateur créer son premier profil.

    include_once(__DIR__ . './turbotuto/turbotuto__autoprofil.php');
    die;
  }
} catch (mysqli_sql_exception $exception) {

  // La table Profil n'existe pas :
  // Lancement d'un DatabaseCheck pour ajouter les tables manquantes

  include_once(__DIR__ . './database/db__check.php');
  die;
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
