<?php

// Ce fichier est permet d'ajouter un nouveau projet dans la base de donnée

/**
* Injection du fichier rassemblant toutes les fonctions
* les plus importantes de Nadine
*/

include './fonctions.php';


/**
* Ajoute une variable pour stocker les infos à envoyer dans la base de donnée
*/

$data = array();
$data['artiste__id'] = array();


/**
* Récuparation des info et ajout dans la variable
*/

foreach($_POST as $key => $value) {
  // Vérifie que l'input a été complété
  if (isset($$key)) continue;
  // Rassemble les artistes dans un même sous-array
  if (str_contains($key, 'artiste')) {
    array_push($data['artiste__id'], addslashes($value));
  }else {
    $data[$key] = addslashes($value);
  }
}


/**
* Formate la liste des artites
*/

$data['artiste__id'] = serialize($data['artiste__id']);


/**
* Vérifie si le precompte doit être appliqué
*/

if ( check_if_precompte($data['diffuseur__id']) ) {
  $data['projet__precompte'] = '1';
}else {
  $data['projet__precompte'] = '0';
}


/**
* Ajoute le statut 'Projet en cours' par defaut
*/

$data['projet__statut'] = 'Projet en cours';


/**
* Insertion dans la base donnée
*/

$table = 'Projets';
nadine_insert($table, $data);


/**
* Recupere l'ID du dernier projet créé
*/

$args = array(
  'FROM'     => 'Projets',
  'ORDER BY' => 'projet__id',
  'ORDER'    => 'DESC',
  'LIMIT'    => 1,
);
$loop = nadine_query($args);


if ($loop->num_rows > 0):
  while($row = $loop->fetch_assoc()):
    $last_id = $row['projet__id'];
  endwhile;
endif;


/**
* Redirection vers la page projet-single
*/

header('Location: ../projet__single.php?projet__id='.$last_id.'');
die();

?>
