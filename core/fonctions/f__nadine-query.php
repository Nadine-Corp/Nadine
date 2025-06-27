<?php

/**
 * La fonction nadine_query() simplifie les requêtes à la base de données
 */

function nadine_query($args, $sql = 'SELECT *')
{
  if ($sql == 'SELECT *') {
    // Ajoute les propriétés demandées
    foreach ($args as $key => $value) {
      // Traite le cas particulier de ORDER
      if ($key == 'ORDER') {
        $sql .= ' ' . $value;
      }
      // Traite le cas particulier de FROM
      elseif ($key == 'FROM') {
        $sql .= ' ' . $key . ' ' . ucfirst($value);
      }
      // Cas général
      else {
        $sql .= ' ' . $key . ' ' . $value;
      }
    };
  };

  nadine_log("Nadine utilise la fonction nadine_query() et demande des infos à la base de données :" . "\n" . $sql);

  // Vérifie si la connection à la base de donnée fonctionne
  global $servername, $username, $password, $dbname;
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } else {
    //echo 'Test de connection ok<br>';
  }

  // Modification du jeu de résultats en utf8mb4 (pour support des emojis)
  if (!$conn->set_charset("utf8mb4")) {
    printf("Erreur lors du chargement du jeu de caractères utf8mb4 : %s\n", $mysqli->error);
    exit();
  } else {
    $conn->character_set_name();
  }

  // Envoie la requête demandée à la base de données
  $result = $conn->query($sql) or die($conn->error);
  $conn->close();

  // Retourne le résultat au template
  return $result;
}
