<?php

// Ce fichier est permet de modifier ou ajouter
// un nouveau devis ou facture dans la base de données.



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
    // Vérifie que l'input a été complété
    if (isset($$key)) continue;

    // Rassemble les artistes dans un même sous-array
    $data[$key] = addslashes($value);
}


echo "<pre>";
var_dump($data);
echo "</pre>";
die;

/**
 * Vérifie si le devis ou la facture doit être créé ou mise à jour
 */

if (empty($data['projet__id'])) {

    /**
     * Ajout d'un nouveau projet
     */

    // Ajoute le statut 'Projet en cours' par defaut
    $data['projet__statut'] = 'Projet en cours';

    // Insertion dans la base données
    $table = 'Projets';
    $primaryKey = 'projet__id';
    nadine_insert($table, $primaryKey, $data);

    // Récupère l'ID du dernier projet créé

    $args = array(
        'FROM'     => 'Projets',
        'ORDER BY' => 'projet__id',
        'ORDER'    => 'DESC',
        'LIMIT'    => 1,
    );
    $loop = nadine_query($args);


    if ($loop->num_rows > 0) :
        while ($row = $loop->fetch_assoc()) :
            $projet__id = $row['projet__id'];
        endwhile;
    endif;
} else {


    /**
     * Modifie un projet existant
     */

    // Update de la base données
    $table = 'Projets';
    $primaryKey = 'projet__id';
    nadine_update($table, $primaryKey, $data);

    // Récupère l'ID du projet mise à jour
    $projet__id = $data['projet__id'];
}


/**
 * Redirection vers la page projet-single
 */

header('Location: ../projet__single.php?projet__id=' . $projet__id . '');
die();
