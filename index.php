<?php

  // La page index.php est la première page a être chargée
  // au lancement de Nadine. Elle vérifie notament que Nadine
  // a bien accès à la base de donnée. Si ce n'est pas le cas,
  // elle lance le TurboTuto™.


   /**
   *  Test de la base de donnée : si pas Profil, lancement du TurboTuto™
   */

   $sql = "SELECT * FROM Profil ORDER BY profil__id DESC LIMIT 1;";
   include './core/query.php'; $result = $conn->query($sql) or include './core/init__tuto.php';
   if ($result &&  $result->num_rows > 0):
     include './projets.php';
  endif;
?>
