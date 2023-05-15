<?php

// Ce fichier est permet de modifier ou ajouter
// un nouveau projet dans la base de données.

/**
 * Importe le fichier rassemblant toutes les fonctions
 * les plus importantes de Nadine
 */

include(__DIR__ . '/fonctions.php');


/**
 * Ajoute une variable pour stocker les infos à envoyer dans la base de données
 */

$data = array();
$data['artiste__id'] = array();


/**
 * Ajout les infos dans la variable
 */

foreach ($_POST as $key => $value) {
  // Vérifie si l'input a été complété
  if (empty($value)) continue;
  // Rassemble les artistes dans un même sous-array
  if (str_contains($key, 'artiste')) {
    array_push($data['artiste__id'], addslashes($value));
  } else {
    $data[$key] = addslashes($value);
  }
}


/**
 * Formate le champs retrocession
 */

if (!isset($data['projet__retrocession'])) {
  $data['projet__retrocession'] = 0;
}


/**
 * Formate la liste des artistes
 */

if ($data['projet__retrocession'] == 0) {
  $data['artiste__id'] = serialize(array());
} else {
  $data['artiste__id'] = serialize($data['artiste__id']);
}


/**
 * Formate le champs porteur du projet
 */

if (!isset($data['projet__porteurduprojet'])) {
  $data['projet__porteurduprojet'] = '0';
}


/**
 * Vérifie si le precompte doit être appliqué
 */

if (check_if_precompte($data['diffuseur__id'])) {
  $data['projet__precompte'] = '1';
} else {
  $data['projet__precompte'] = '0';
}


/**
 * Vérifie si le projet doit être créé ou mis à jour
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
