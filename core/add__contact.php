<?php

// Ce fichier est permet d'ajouter un nouveau contact dans la base de donnée

/**
 * Importe le fichier rassemblant toutes les fonctions
 * les plus importantes de Nadine
 */

include_once(__DIR__ . '/fonctions.php');


/**
 * Ajoute une variable pour stocker les infos à envoyer dans la base de donnée
 */

$data = array();


/**
 * Récupère le type de contact
 */

$contact__type = $_POST['contact__type'];
$contact__type = strtolower($contact__type);

if ($contact__type != 'diffuseur') {
    $contact__type = 'artiste';
}


/**
 * Ajout des infos dans la variable
 */

foreach ($_POST as $key => $value) {
    // Vérifie que l'input a été complété
    if (isset($$key)) continue;
    // Remplace 'contact__' par le type de contact pour correspondre à la base de donnée
    $col = str_replace("contact", $contact__type, $key);
    // Ajoute l'info à la variable
    $data[$col] = addslashes($value);
}


/**
 * Vérifie si le contact doit être créé ou mise à jour
 */

if (empty($data[$contact__type . '__id'])) {

    /**
     * Ajout d'un nouveau contact
     */

    $table = $contact__type . 's';
    $primaryKey = $contact__type . '__id';
    nadine_insert($table, $primaryKey, $data);
} else {
    /**
     * Modifie un contact existant
     */

    // Update de la base données
    $table = $contact__type . 's';
    $primaryKey = $contact__type . '__id';
    nadine_update($table, $primaryKey, $data);
}

/**
 * Redirection vers la page diffuseurs
 */

header('Location: ../contacts.php');
