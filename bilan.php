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




/**
 * Affiche la sticky barre
 */
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
      else :
        echo "<p>Chef, on n'a pas trouvé de projets en cours...</p>";
      endif;
      ?>
    </div>
  </aside>

  <section class="m-rom with--aside">
    <div class="m-col">

      <?php $sql = "SELECT * FROM Projets, Diffuseurs WHERE Projets.diffuseur__id = Diffuseurs.diffuseur__id AND projet__statut = 'Projet terminé' AND projet__date_de_fin BETWEEN CAST('" . $year . "-01-01' AS DATE) AND CAST('" . $year . "-12-31' AS DATE) ORDER BY projet__date_de_fin ASC;"; ?>
      <?php include './core/query.php';
      $result = $conn->query($sql) or die($conn->error); ?>
      <?php if ($result->num_rows > 0) : ?>
        <table class="m-table m-body">
          <tr>
            <th>Nature de l'activité</th>
            <th>Diffuseur</th>
            <th>Date</th>
            <th>Montant HT</th>
            <th>Voir</th>
          </tr>

          <?php while ($row = $result->fetch_assoc()) :

            if (!empty($row["projet__date_de_fin"])) :
              $date_de_fin = date_create($row["projet__date_de_fin"]);
              $date_de_fin = date_format($date_de_fin, 'M. Y');
            else :
              $date_de_fin = "-";
            endif;


            $date_de_debut = date_create($row["projet__date_de_creation"]);
            $date_de_debut = date_format($date_de_debut, 'M. Y');


          ?>


            <tr>
              <td>Créations graphiques</td>
              <td><?php echo $row["diffuseur__societe"] ?><br><?php echo $row["diffuseur__adresse"] ?>, <?php echo $row["diffuseur__code_postal"] ?> <?php echo $row["diffuseur__ville"] ?><br>Siret : <?php echo $row["diffuseur__siret"] ?></td>
              <td><?php echo $date_de_fin; ?></td>
              <td></td>
              <td><a href="projet__single?projet__id=<?php echo $row["projet__id"] ?>">Voir</a></td>
            </tr>
          <?php endwhile; ?>
        </table>
      <?php else : ?>
        <p>Chef, on n'a pas trouvé de projet cette année...</p>
      <?php endif;
      $conn->close(); ?>
    </div>
  </section>


  <?php
  /**
   * Ajout du Footer
   */

  include './footer.php';
