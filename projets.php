<?php include './header.php'; ?>




<section class="toolbar is--sticky">
  <div class="toolbar__container">
    <h1 class="display1">Liste des projets</h1>
    <div class="toolbar__btn">
      <a href="./projet__new" class="btn btn--plain">Ajouter un Projet</a>
    </div>
  </div>
</section>


<section class="l-projet row">
  <div class="col l12">
    <?php $sql = "SELECT * FROM Projets, Diffuseurs WHERE Projets.diffuseur__id = Diffuseurs.diffuseur__id ORDER BY projet__date_de_creation DESC"; ?>
    <?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
    <?php if ($result->num_rows > 0): ?>
      <table class="table body">
        <thead>
          <tr>
            <th>Nom du projet</th>
            <th>Diffuseur</th>
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


            <tr class="<?php echo $row["projet__statut"] ?>" onclick="document.location = 'projet__single?projet__id=<?php echo $row["projet__id"] ?>';">
              <td><?php echo $row["projet__nom"] ?></td>
              <td><?php echo $row["diffuseur__societe"] ?></td>
              <td><?php echo $date_de_debut; ?></td>
              <td><?php echo $date_de_fin; ?></td>
              <td><?php echo $row["projet__statut"] ?></td>
              <td><a href="projet__single?projet__id=<?php echo $row["projet__id"] ?>">Voir</a></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>Chef, on a pas trouvé de projets...</p>
    <?php endif; $conn->close(); ?>

  </div>
</section>
<?php include './footer.php'; ?>
