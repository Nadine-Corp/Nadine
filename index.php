<?php

// La page index.php est la première page a être chargée
// au lancement de Nadine. Elle vérifie notament que Nadine
// a bien accès à la base de donnée. Si ce n'est pas le cas,
// elle lance le TurboTuto™.


/**
 *  Importe les paramètres
 */

require(__DIR__ . '/core/query.php');


/**
 *  Test de la base de donnée : si pas Profil, lancement du TurboTuto™
 */

// Vérifie si la connection à la base de donnée fonctionne
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
};

// Modification du jeu de résultats en utf8mb4 (pour support des emojis)
if (!$conn->set_charset("utf8mb4")) {
  printf("Erreur lors du chargement du jeu de caractères utf8mb4 : %s\n", $mysqli->error);
  exit();
} else {
  $conn->character_set_name();
};

// Formate la requête SQL
$table_name = 'Profil';
$sql = "SHOW TABLES LIKE '$table_name'";

// Envoie la requête demandée à la base de données
$result = $conn->query($sql) or die($conn->error);
$table_exists = mysqli_num_rows($result);

if ($table_exists) {
  require(__DIR__ .  '/core/database/db__check.php');
  include(__DIR__ .  '/projets.php');
} else {
  include(__DIR__ .  '/core/init__tuto.php');
};
