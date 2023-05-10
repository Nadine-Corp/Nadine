<?php

// Ce fichier permet de supprimer des élèments
// de la base de donnée. Ou plus exactement : de les masquer...
// Nadine n'oublie rien.


/**
 * Importe le fichier rassemblant toutes les fonctions
 * les plus importantes de Nadine
 */

include_once(__DIR__ . '/fonctions.php');


/**
 * Récuparation des valeurs
 */

$table = $_GET['table'];
$prefix = $_GET['prefix'];
$id =  $_GET['id'];


/**
 * Mise à jour de la base de données
 */

$sql = "DELETE FROM $base WHERE $cible = $id";
include 'query.php';
$result = $conn->query($sql) or die($conn->error);
$conn->close();

$conn->close();


/**
 * Redirection vers la page profil
 */

if ($_GET['location']) {
  $location = $_GET['location'];
} else {
  $location = 'index';
};

header('Location: ../' . $location . '.php');
