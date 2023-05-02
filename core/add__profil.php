<?php

// Le fichier Add__profil permet de mettre à jour le profil de l'utilisateur.
// Pour que les anciennes Facture ou Devis ne soit pas modifier, un nouveau
// profil utilisateur est créé à chaque mise à jour.



/**
 * Injection du fichier rassemblant toutes les fonctions
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
 * Formate les data
 */

if ($data['profil__precompte'] == 'Oui') {
  $data['profil__precompte'] = '1';
} else {
  $data['profil__precompte'] = '0';
};


echo "<pre>";
var_dump($data);
echo "</pre>";

die;



/**
 * Ajout d'un nouveau Profil
 */

// Insertion dans la base données
$table = 'Profil';
$primaryKey = 'profil__id';
nadine_insert($table, $primaryKey, $data);


/**
 * Redirection vers la page profil
 */

header('Location: ../profil.php');
