  <?php

  // Ce fichier du TurboTuto™ permet de modifier
  // un fichier nommé config.php. Ce fichier permet
  // à Nadine de mémoriser les informations de connexion
  // a la base de données.


  /**
   * Récupère les infos du formulaire
   */

  $servername = $_POST['db__serveur'];
  $username = $_POST['db__username'];
  $password = $_POST['db__password'];
  $dbname = $_POST['db__name'];


  /**
   * Modifie le fichier config.php
   */

  // lire le contenu de config.php
  $config_content = file_get_contents('../config.php');

  // remplacer les valeurs
  $config_content = preg_replace('/\$servername\s*=\s*".*";/', "\$servername = \"$servername\";", $config_content);
  $config_content = preg_replace('/\$username\s*=\s*".*";/', "\$username = \"$username\";", $config_content);
  $config_content = preg_replace('/\$password\s*=\s*".*";/', "\$password = \"$password\";", $config_content);
  $config_content = preg_replace('/\$dbname\s*=\s*".*";/', "\$dbname = \"$dbname\";", $config_content);

  // écrire le nouveau contenu dans config.php
  file_put_contents('../config.php', $config_content);


  /**
   * Teste la connexion à la base de données
   */

  try {
    $conn = new mysqli($servername, $username, $password, $dbname);
  } catch (mysqli_sql_exception $e) {
    // Si test échoue, lancement du TurboTuto™
    header('Location: ../../index.php?modal=tt04');
    die();
  }
  // Si test réussi, retour à la page d'index
  header('Location: ../../index.php');
  die();
