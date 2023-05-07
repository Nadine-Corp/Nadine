<?php

// Ce fichier permet d'afficher un récap' de chaque année
// facilitant votre déclaration à l'URSSAF

/**
 * Ajout du Header
 */

include(__DIR__ . '/header.php');


/**
 * Affiche le bilan de l'année en cour
 * sauf si un bilan archivé a été demandé
 */

if (isset($_GET['annee'])) :
  $year = $_GET['annee'];
else :
  $year = date("Y");
endif;

?>

<main class="l-bilan" role="main">

  <?php
  /**
   * Aside
   */
  ?>

  <aside class="m-aside">
    <h1 class="m-headline">Bilan annuel <?php echo $year; ?></h1>
    <div class="m-btn__grp m-btn__grp-v">
      <?php
      // Permet de créer les boutons pour chaque années dynamiquement
      $args = array(
        'FROM'     => 'Projets',
        'WHERE'    => 'projet__statut = "Projet terminé"',
        'ORDER BY' => 'projet__date_de_fin',
        'ORDER'    => 'DESC'
      );
      $loop = nadine_query($args);

      if ($loop->num_rows > 0) :
        $date_last = '1972';

        while ($row = $loop->fetch_assoc()) :
          if (isset($row['projet__date_de_fin'])) :
            $date_de_fin = date_create($row["projet__date_de_fin"]);
            $date_de_fin = date_format($date_de_fin, 'Y');
            if ($date_de_fin != $date_last) :
              echo '<a href="bilan.php?annee=' . $date_de_fin . '" class="btn btn__outline">' . $date_de_fin . '</a>';
              $date_last = $date_de_fin;
            endif;
          endif;
        endwhile;
      else : msg_nothing('Aucun projet terminé', "<i>Nadine</i> classera ici vos <i>Projets terminés</i> par année. Cette page est conçue pour faciliter vos déclarations à l'URSSAF.");
      endif;
      ?>
    </div>
  </aside>

  <section class="m-rom with--aside">
    <div class="m-col">

      <?php
      /**
       * Liste des succès
       */
      ?>

      <div class="m-accordion">
        <div class="m-accordion__titre">
          <span class="m-lead">Succès Startup</span>
          <div class="m-accordion__ico">
            <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
          </div>
        </div>

        <div class=" m-accordion__wrapper p-projet__list">
          <?php msg_nothing('Aucun succès', "Mais ne vous inquiétez pas, les équipes de <i>NadineCorp.©️</i> travaillent d'arrache-pied pour ajouter cette fonctionnalité dans une prochaine mise à jour. Bientôt, vous pourrez afficher fièrement vos glorieux <i>Succès</i> dans  cette section."); ?>
        </div>
      </div>


      <?php
      /**
       * Liste de projets terminés
       */

      $args = array(
        'FROM'     => 'Projets, Diffuseurs',
        'WHERE'    => 'Projets.diffuseur__id = Diffuseurs.diffuseur__id AND projet__statut = "Projet terminé" AND projet__date_de_fin BETWEEN CAST("' . $year . '-01-01" AS DATE) AND CAST("' . $year . '-12-31" AS DATE)',
        'ORDER BY' => 'projet__date_de_fin',
        'ORDER'    => 'ASC'
      );
      $loop = nadine_query($args);
      ?>

      <div class="m-accordion is--active">
        <div class="m-accordion__titre">
          <span class="m-lead">Liste des projets terminés</span>
          <div class="m-accordion__ico">
            <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
          </div>
        </div>

        <div class="l-bilan__list p-projet__list m-accordion__wrapper">
          <?php if ($loop->num_rows > 0) :
            while ($row = $loop->fetch_assoc()) :
              // Affiche chaque projet sous forme de liste
              include './parts/p__projet-list.php';
            endwhile;
          else : msg_nothing('Aucun projet terminé', "<i>Nadine</i> classera ici vos <i>Projets terminés</i> par année. Cette page est conçue pour faciliter vos déclarations à l'URSSAF.");
          endif;
          ?>
        </div>
      </div>
    </div>
  </section>


  <?php
  /**
   * Ajout du Footer
   */

  include './footer.php';
