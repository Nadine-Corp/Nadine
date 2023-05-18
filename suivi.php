<?php

// Ce fichier permet à Nadine de traquer plus facilement
// les mauvais payeurs et les devis qui trainent un peu.


/**
 * Ajout du Header
 */

include(__DIR__ . '/header.php');
?>

<main class="l-suivi" role="main">
  <section class="m-row">
    <div class="m-rom">
      <h1 class="m-headline">Suivi</h1>
    </div>

    <div class="l-suivi__cols">

      <?php

      // Prépare une LoopLoop

      $LoopLoop = array(
        array("title" => "Devis", "table" => "devis", "prefix" => "devis", "etat" => array("Brouillon", "Envoyé", "Relancé")),
        array("title" => "Factures d'acompte", "table" => "facturesacompte", "prefix" => "facturea", "etat" => array("Brouillon", "Envoyé", "Relancé")),
        array("title" => "Factures", "table" => "factures", "prefix" => "facture", "etat" => array("Brouillon", "Envoyé", "Relancé")),
      );

      /**
       * Liste de projets en cours
       */

      foreach ($LoopLoop as $loopItem) {
        echo '<div class="l-suivi__row l-suivi__row-' . $loopItem['prefix'] . '">';
        echo '<div class="l-suivi__title"><h2 class="m-lead m-ss">' . $loopItem['title'] . '</h2></div>';
        echo '<div class="l-suivi__cols">';
        foreach ($loopItem['etat'] as $etat) {

          echo '<div class="l-suivi__col l-suivi__col-' . $loopItem['prefix'] . sanitize($etat) . '">';
          echo '<div class="l-suivi__subtitle"><h3 class="m-body-l"><i>' . $etat . '</i></h3></div>';

          $args = array(
            'FROM'     => $loopItem['table'],
            'WHERE'    => $loopItem['table'] . '.' . $loopItem['prefix'] . '__statut ="' . $etat . '"',
          );
          $loop = nadine_query($args);

          if ($loop->num_rows > 0) :
            while ($row = $loop->fetch_assoc()) :
              // Affiche chaque projet sous forme de liste
              include './parts/p__single-facture-mini.php';
            endwhile;
          endif;
          echo '</div>';
        }
        echo '</div></div>';
      }
      ?>
    </div>
  </section>
  <?php include './footer.php'; ?>