<?php

// Ce fichier permet de centraliser tous les trucs
// que l'on demande tout le temps à Nadine.
// C'est peut-être le plus important de tous.


/**
* La fonction nadine query() simplifie les requêtes à la base de données
*/

function nadine_query($args){

  // Crée la variable $sql
  $sql = 'SELECT *';

  // Ajoute les propriété demandées
  foreach($args as $key => $value) {
    // Traite le cas particulier de ORDER
    if ($key == 'ORDER') {
      $sql .= ' '.$value;
    }else {
      $sql .= ' '.$key.' '.$value;
    }
  };

  // Importe les info de connection à la base de donnée
  include 'config.php';

  // Vérifie si la connection à la base de donnée fonctionne
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

  // Modification du jeu de résultats en utf8mb4 (pour support des emojis)
  if (!$conn->set_charset("utf8mb4")) {
    printf("Erreur lors du chargement du jeu de caractères utf8mb4 : %s\n", $mysqli->error);
    exit();
  } else {
    $conn->character_set_name();
  }

  // Envoie la requête demandée à la base de données
  $result = $conn->query($sql) or die($conn->error);

  // Retoune le résultat au template
  return $result;
}


/**
* La fonction the_projet_id() affiche l'ID d'un projet demandé
*/

function the_projet_id($row){
  echo $row["projet__id"];
}


/**
* La fonction the_projet_name() affiche le nom d'un projet demandé
*/

function the_projet_name($row){
  echo $row["projet__nom"];
}


/**
* La fonction the_projet_statut() affiche le statut d'un projet demandé
*/

function the_projet_statut($row){
  echo $row["projet_statut"];
}


/**
* La fonction the_projet_class() affiche qq class dans la balise <article>
*/

function the_projet_class($row){
  $class  = 'l-projets__'.$row["projet__id"].' ';
  if ( $row["projet__statut"] == 'Projet en cours' ) {
    $class .= 'l-projets__encours';
  }elseif ($row["projet__statut"] == 'Projet terminé' ) {
    $class .= 'l-projets__termine';
  }elseif ($row["projet__statut"] == 'Projet annulé' ) {
    $class .= 'l-projets__annule';
  }

  echo $class;
}


/**
* La fonction the_projet_thumbnail() affiche une icone en fonction
* du statut du projet demandé
*/

function the_projet_thumbnail($row){
  if ( $row["projet__statut"] == 'Projet en cours' ) {
    $ico = get_template_part('./assets/img/ico_slightly-smiling-face.svg.php');
  }elseif ($row["projet__statut"] == 'Projet terminé' ) {
    $ico = get_template_part('./assets/img/ico_succes.svg.php');
  }else {
    $ico = get_template_part('./assets/img/ico_slightly-frowning-face.svg.php');
  }

  echo $ico;
}


/**
* La fonction get_template_part() permet de stocker des fichiers
* dans des variables
*/

function get_template_part($filename) {
  if (is_file($filename)) {
    ob_start();
    include $filename;
    return ob_get_clean();
  }
  return 'Nadine n\'a pas trouvé le fichier '.$filename;
}

/**
* La fonction sanitize() convertie des chaînes de caractère
* pour les transformer en .class plus classe
*/

function sanitize($string){
  // Modifie tous les caractères spéciaux et les espaces
  $string = filter_var($string, FILTER_SANITIZE_URL);
  // Met tous les caractères en minuscules
  $string = mb_strtolower($string);
  // Revoie la chaine de caractère modifiée
  return $string;
}


/**
* La fonction get_num_version() récupère le dernier Numéros de version de Nadine.
* dans le journal de développement
*/

function get_num_version(){
  if (($journal = fopen("./assets/csv/journal.csv", "r")) !== FALSE){
    $numVersion = array();
    while (($data = fgetcsv($journal, 10000, ";")) !== FALSE){
      $numVersion[] = $data;
    }
    fclose($journal);

    // Extraire le dernier numéros de version du journal
    $numVersion = $numVersion[0][0];

    // Envoie le numéros de version
    return $numVersion;
  }
}
?>
