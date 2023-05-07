<?php

// Ce fichier test si Nadine arrive à se connecter
// à base de données. Si une erreur est detectée,
// Nadine lancera le TurboTuto™️


/**
 *  Importation des paramètres de connection
 */

require_once(__DIR__ . '/../config.php');


/**
 *  Importe les paramètres et test de la base de donnée
 *  Si une erreur est détectée : lancement du TurboTuto™
 */

try {
  $conn = new mysqli($servername, $username, $password, $dbname);
} catch (mysqli_sql_exception $e) {

  // Lancement du TurboTuto™

  include_once(__DIR__ . './../turbotuto/turbotuto.php');
  exit();
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

    include_once(__DIR__ . './../turbotuto/turbotuto__autoprofil.php');
  }
} catch (mysqli_sql_exception $exception) {

  // La table Profil n'existe pas :
  // Lancement d'un DatabaseCheck pour ajouter les tables manquantes

  include_once(__DIR__ . './db__check.php');


  // Redirection vers la page d'accueil

  header('Location: ./../../index.php');
}
