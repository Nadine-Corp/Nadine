<?php

// Le fichier db__reset.php permet de reset de la base données
// de Nadine et de repartir à zéro



/**
 *  Importation des paramètres
 */

include './../config.php';


/**
 *  Suppression de l'ancienne base
 */

$sql = "DROP DATABASE IF EXISTS $dbname";
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query($sql) or die($conn->error);


/**
 *  Création de la nouvelle base
 */

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query($sql) or die($conn->error);


/**
 *  Ajoute les tables et les colonnes dans la base de donnée
 */

include 'db__check.php';


/**
 *  Redirection vers la page index.php pour que l'utilisateur
 *  entre des infos pour créer son premier profil.
 */

//header('Location: ../index.php');
