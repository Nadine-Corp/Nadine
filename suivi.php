
<?php include 'header.php'; ?>

<section class="row">
  <div class="col l12">
    <h1 class="display1">Suivi</h1>
  </div>


  <!-- Liste des devis -->

  <div class="col l6">
    <h2 class="headline">Devis non signés</h2>
    <?php $thisYear = date("Y") ?>
    <?php $sql = "SELECT * FROM Devis WHERE devis__statut = 'Envoyé' "; ?>
    <?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
    <?php if ($result->num_rows > 0): ?>
      <table class="table">
        <tr>
          <th>#N°</th>
          <th>#Nom du projet</th>
          <th>#</th>
          <th>#Voir</th>
        </tr>

      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row["devis__numero"] ?></td>
          <td><?php echo $row["projet__nom"] ?></td>
          <td><?php echo $row["diffuseur__societe"] ?></td>
          <td><a href="projet__single?projet__id=<?php echo $row["projet__id"] ?>">Voir</a></td>
        </tr>
      <?php endwhile; ?>
    </table>
    <?php else: ?>
        <p>Chef, on n'a pas trouvé de devis en attente...</p>
    <?php endif; $conn->close(); ?>
  </div>
  </div>


  <!-- Liste des factures -->


    <div class="col l6">
        <h2 class="headline">Factures impayées</h2>
        <?php $thisYear = date("Y") ?>
        <?php $sql = "SELECT * FROM Factures WHERE facture__statut = 'Envoyée' "; ?>
        <?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
        <?php if ($result->num_rows > 0): ?>
          <table class="table">
            <tr>
              <th>#N°</th>
              <th>#Nom du projet</th>
              <th>#</th>
              <th>#Voir</th>
            </tr>

          <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?php echo $row["facture__numero"] ?></td>
              <td><?php echo $row["projet__nom"] ?></td>
              <td><?php echo $row["diffuseur__societe"] ?></td>
              <td><a href="projet__single?projet__id=<?php echo $row["projet__id"] ?>">Voir</a></td>
            </tr>
          <?php endwhile; ?>
        </table>
        <?php else: ?>
            <p>Chef, on n'a pas trouvé de factures impayées...</p>
        <?php endif; $conn->close(); ?>
      </div>
    </div>









</section>
<?php include './footer.php'; ?>
