<?php

// Ce fichier test si Nadine arrive à se connecter
// à base de données. Si une erreur est detectée,
// Nadine lancera le TurboTuto™️


/**
 *  Importation des paramètres de connection
 */

require_once(__DIR__ . '/../config.php');


/**
 *  Vérifie la connection à la base de données
 *  Si une erreur est détectée : lancement du TurboTuto™
 */

// Désactive les messages d'erreurs
mysqli_report(MYSQLI_REPORT_OFF);

$conn = @new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {

  // Lancement du TurboTuto™
  include_once(__DIR__ . './../turbotuto/turbotuto.php');
  exit();
}


/**
 *  Vérifie si un Profil existe dans la base de données
 */

$sql = 'SELECT COUNT(*) FROM Profil';
$result = $conn->query($sql);
if ($conn->error) {

  // La table Profil n'existe pas :
  // Lancement d'un DatabaseCheck pour ajouter les tables manquantes
  include_once(__DIR__ . './db__check.php');

  // Redirection vers la page d'accueil
  $location = __DIR__ . './../../index.php';
  header('Location:' . $location);
}


/**
 *  Vérifie si un Profil existe dans la base de données
 */

$result = $conn->query($sql);
$row = $result->fetch_row();
if (!$row[0] > 0) {

  echo 'pas de profil';
  die;

  // La table Profil existe mais est elle est vide :
  // Lancement du TurboTuto™ AutoProfil pour
  // que l'utilisateur créer son premier profil.

  include_once(__DIR__ . './../turbotuto/turbotuto__autoprofil.php');
  exit();
}

echo 'ok';
die;







// try {
//   $result = $conn->query("SELECT COUNT(*) FROM Profil");
//   $row = $result->fetch_row();
//   if (!$row[0] > 0) {

//     // La table Profil existe mais est elle est vide :
//     // Lancement du TurboTuto™ AutoProfil pour
//     // que l'utilisateur créer son premier profil.

//     include_once(__DIR__ . './../turbotuto/turbotuto__autoprofil.php');
//     exit();
//   }
// } catch (mysqli_sql_exception $e) {

//   // La table Profil n'existe pas :
//   // Lancement d'un DatabaseCheck pour ajouter les tables manquantes

//   include_once(__DIR__ . './db__check.php');


//   // Redirection vers la page d'accueil

//   header('Location: ./../../index.php');
// };


/**
 * Importe le fichier rassemblant toutes les fonctions
 * les plus importantes de Nadine
 */

require_once(__DIR__ . './../fonctions.php');
nadine_log("Nadine vient d'importe le fichier fonction.php");


/**
 *  Vérifie si la version de la base de données
 *  correspond à la version de Nadine 
 */

nadine_log("Nadine vérifie la version de la base de données");

try {
  $result = $conn->query("SELECT * FROM Options WHERE option__nom='nadine__version'");

  nadine_log("Nadine a réussi à se connecter à la base de données");

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // L'entrée nadine__version existe
    nadine_log("Nadine pense que nadine__version existe");

    // Cherche le numéro de version de Nadine
    $num_version = get_num_version();
    nadine_log("Nadine a pense que le numéro de version est " . $num_version);

    // Cherche le numéro de version de la base de données
    $data_num_version = $row['option__valeur'];
    nadine_log("Nadine a trouvé dans la base de données le numéro de version " . $data_num_version);

    if ($num_version != $data_num_version) {
      nadine_log("Nadine a détecté des numéros de version différent");
      // La version des fichiers de Nadine
      // et de la base de données sont différent
      db__update($num_version);
    }
  } else {
    // L'entrée nadine__version n'existe pas
    nadine_log("Nadine pense que nadine__version n'existe pas dans la base de données");

    // Ajoute l'entrée nadine__version dans la base de données
    $sql =  "INSERT INTO Options (option__nom, option__valeur) VALUES ('nadine__version', '0')";
    $conn->query($sql) or die($conn->error);
    $conn->close();

    // Met à jour la base de données
    db__update();
  }
} catch (mysqli_sql_exception $e) {
  // L'entrée nadine__version n'existe pas
  nadine_log("Nadine n'arrive pas se connecter à base de données");
}
