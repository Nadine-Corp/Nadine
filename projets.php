<?php include './header.php'; ?>




<section class="toolbar is--sticky">
  <div class="toolbar__container">
    <h1 class="display1">Liste des projets</h1>
    <div class="toolbar__btn">
      <a href="./projet__new" class="btn btn--plain">Ajouter un Projet</a>
    </div>
  </div>
</section>


<?php
/**
* Liste de projets en cours
*/
?>

<section class="l-projet row">

  <div class="col l12">
    <h2 class="lead_paragraph">Projets en cours</h2>
  </div>

  <div class="col l12">
    <?php $sql = "SELECT * FROM Projets, Diffuseurs
    WHERE Projets.diffuseur__id = Diffuseurs.diffuseur__id
    -- AND Projets.projet__id = Factures.projet__id
    -- AND Projets.projet__id = Devis.projet__id
    AND Projets.projet__statut = 'Projet en cours'
    -- CONCAT(Devis.Devis__numero, ', ')
    -- GROUP BY Projets.projet__id
    ORDER BY projet__date_de_creation DESC"; ?>
    <?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
    <?php if ($result->num_rows > 0): ?>
      <table class="table body">
        <thead>
          <tr>
            <th>Nom du projet</th>
            <th>Diffuseur</th>
            <!-- <th class="hidden">Facture</th>
            <th class="hidden">Devis</th> -->
            <th data-sorter="shortDate" data-date-format="M. Y">Date du début</th>
            <th data-sorter="shortDate" data-date-format="M. Y">Date de fin</th>
            <th>État</th>
            <th>Voir</th>
          </tr>
        </thead>
        <tbody>

          <?php while($row = $result->fetch_assoc()):

            if ( !empty( $row["projet__date_de_fin"] ) ):
              $date_de_fin = date_create($row["projet__date_de_fin"]);
              $date_de_fin = date_format($date_de_fin, 'M. Y');
            else:
              $date_de_fin = "-";
            endif;

            $date_de_debut = date_create($row["projet__date_de_creation"]);
            $date_de_debut = date_format($date_de_debut, 'M. Y');
            ?>


            <tr onclick="document.location = 'projet__single?projet__id=<?php echo $row["projet__id"] ?>';" class="projet__<?php echo $row["projet__id"] ?>">
              <td><?php echo $row["projet__nom"] ?></td>
              <td><?php echo $row["diffuseur__societe"] ?></td>
              <!-- <td class="hidden"><?php echo $row["facture__numero"] ?></td>
              <td class="hidden"><?php echo $row["devis__numero"] ?></td> -->
              <td><?php echo $date_de_debut; ?></td>
              <td><?php echo $date_de_fin; ?></td>
              <td><?php echo $row["projet__statut"] ?></td>
              <td><a href="projet__single?projet__id=<?php echo $row["projet__id"] ?>">Voir</a></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>Chef, on n'a pas trouvé de projets en cours...</p>
    <?php endif; $conn->close(); ?>
  </div>
</section>


<?php
/**
* Liste de projet terminé ou annulé
*/
?>

<section class="l-projet row">

  <div class="col l12">
    <h2 class="lead_paragraph">Projets terminés ou annulés</h2>
  </div>

  <div class="col l12">
    <?php $sql = "SELECT * FROM Projets, Diffuseurs
    WHERE Projets.diffuseur__id = Diffuseurs.diffuseur__id
    -- AND Projets.projet__id = Factures.projet__id
    -- AND Projets.projet__id = Devis.projet__id
    AND Projets.projet__statut != 'Projet en cours'
    -- GROUP BY Projets.projet__id
    ORDER BY projet__date_de_creation DESC"; ?>
    <?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
    <?php if ($result->num_rows > 0): ?>
      <table class="table body">
        <thead>
          <tr>
            <th>Nom du projet</th>
            <th>Diffuseur</th>
            <!-- <th class="hidden">Facture</th>
            <th class="hidden">Devis</th> -->
            <th data-sorter="shortDate" data-date-format="M. Y">Date du début</th>
            <th data-sorter="shortDate" data-date-format="M. Y">Date de fin</th>
            <th>État</th>
            <th>Voir</th>
          </tr>
        </thead>
        <tbody>

          <?php while($row = $result->fetch_assoc()):

            if ( !empty( $row["projet__date_de_fin"] ) ):
              $date_de_fin = date_create($row["projet__date_de_fin"]);
              $date_de_fin = date_format($date_de_fin, 'M. Y');
            else:
              $date_de_fin = "-";
            endif;

            $date_de_debut = date_create($row["projet__date_de_creation"]);
            $date_de_debut = date_format($date_de_debut, 'M. Y');
            ?>


            <tr onclick="document.location = 'projet__single?projet__id=<?php echo $row["projet__id"] ?>';">
              <td><?php echo $row["projet__nom"] ?></td>
              <td><?php echo $row["diffuseur__societe"] ?></td>
              <!-- <td class="hidden"><?php echo $row["facture__numero"] ?></td>
              <td class="hidden"><?php echo $row["devis__numero"] ?></td> -->
              <td><?php echo $date_de_debut; ?></td>
              <td><?php echo $date_de_fin; ?></td>
              <td><?php echo $row["projet__statut"] ?></td>
              <td><a href="projet__single?projet__id=<?php echo $row["projet__id"] ?>">Voir</a></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>Chef, on n'a pas trouvé de projets en terminés ou annulés...</p>
    <?php endif; $conn->close(); ?>
  </div>
</section>


<?php include './footer.php'; ?>
