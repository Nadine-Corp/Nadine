<?php

// Ce fichier permet de supprimer des élèments
// de la base de donnée. Ou plus exactement : de les masquer...
// Nadine n'oublie rien.


/**
 * Importe le fichier rassemblant toutes les fonctions
 * les plus importantes de Nadine
 */

require(__DIR__ . '/fonctions.php');


/**
 * Ajoute une variable pour stocker les infos à envoyer dans la base de données
 */

$data = array();


/**
 * Ajout les infos dans la variable
 */

foreach ($_POST as $key => $value) {
  // Vérifie si l'input a été complété
  if (isset($$key)) continue;

  // Ajoute la value de l'input aux data
  // à envoyer à la base de données
  $data[$key] = addslashes($value);
}


/**
 * Extrait et filtre quelques data
 */

$id = $data['id'];
$table = $data['table'];
$prefix = $data['prefix'];
$location = $data['location'];
$primaryKey = $prefix . '__id';


// Formate quelques data

$data[$prefix . '__corbeille'] = '1';
$data[$prefix . '__id'] = $id;

// Supprime les data extraites

unset($data['doyouconfirm']);
unset($data['location']);
unset($data['prefix']);
unset($data['table']);
unset($data['id']);


/**
 * Mise à jour de la base de données
 */

nadine_update($table, $primaryKey, $data);


/**
 * Redirection vers la page $location
 */

if ($_POST['location']) {
  $location = $_POST['location'];
} else {
  $location = 'projets.php';
};

header('Location: ../' . $location);
