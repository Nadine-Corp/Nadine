<?php

// Ce fichier est permet de modifier ou ajouter
// de nouveaux devis ou factures dans la base de données.


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

$table = $data['facture__table'];
$facture__id = $data['facture__id'];
$facture__prefix = $data['facture__prefix'];
$primaryKey = $facture__prefix . '__id';

// Supprime les data extraites

unset($data['facture__prefix']);
unset($data['facture__table']);
unset($data['total-artiste']);
unset($data['total-mda']);


/**
 * Formate les data
 */

if ($table == 'devis') {
    // Formate les Data
    $prefix = 'facture__';
    $prefix_new = 'devis__';
    $data = db__replace_prefix($data, $prefix, $prefix_new);
}
if ($table == 'facturesacompte') {
    // Formate les Data
    $prefix = 'facture__';
    $prefix_new = 'facturea__';
    $data = db__replace_prefix($data, $prefix, $prefix_new);
}


/**
 * Vérifie si le devis ou la facture doit être créé ou mise à jour
 */

if ($facture__id == 'new') {
    // Supprime l'ID 'new' des data avant l'insertion dans la base données
    unset($data[$primaryKey]);

    // Ajout d'une nouvelle facture ou devis dans la base données
    nadine_insert($table, $primaryKey, $data);
} else {
    // Update d'une facture ou devis existant dans la base données
    nadine_update($table, $primaryKey, $data);
}


/**
 * Redirection vers la page projet-single
 */

// Récupère l'ID du projet mise à jour
$projet__id = $data['projet__id'];

// Redirection vers la page projet-single
header('Location: ../projet__single.php?projet__id=' . $projet__id . '');
die();
