<?php include 'header.php'; ?>

<section class="row">
  <?php  $projet__id = $_GET['projet__id']; ?>
  <?php $sql = "SELECT * FROM Projets, diffuseurs WHERE Projets.projet__id='".$projet__id."' AND Projets.diffuseur__id = Diffuseurs.diffuseur__id "; ?>
  <?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
  <?php if ($result->num_rows > 0): ?>
    <?php while($row = $result->fetch_assoc()):?>

      <div class="col l12">
        <h1 class="display1"><?php echo $row["projet__nom"] ?></h1>
      </div>

      <div class="col l4">
        <p><?php echo $row["diffuseur__societe"] ?>
        <br><?php echo $row["diffuseur__civilite"] ?> <?php echo $row["diffuseur__prenom"] ?> <?php echo $row["diffuseur__nom"] ?></p>
      </div>
      <div class="col l4">
        <p><?php echo $row["diffuseur__adresse"] ?>
        <br><?php echo $row["diffuseur__code_postal"] ?> <?php echo $row["diffuseur__ville"] ?></p>
      </div>
      <div class="col l4">
        <p><?php echo $row["diffuseur__telephone"] ?>
        <br><a href="mailto:<?php echo $row["diffuseur__email"] ?>"><?php echo $row["diffuseur__email"] ?></a>
        <br><?php echo $row["diffuseur__website"] ?></p>
      </div>

    <?php endwhile; ?>
  <?php else: ?>
    <p>Chef, on pas trouvé de projets...</p>
  <?php endif; $conn->close(); ?>



  <!-- Liste des devis -->

  <div class="col l6">
    <h2 class="headline">Devis</h2>
      <?php $sql = "SELECT * FROM Projets, Devis WHERE Projets.projet__id='".$projet__id."' AND Devis.projet__id = Projets.projet__id"; ?>
      <?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
      <?php if ($result->num_rows > 0): ?>
        <table class="table">
          <tr>
            <th>#N°</th>
            <th>#Date</th>
            <th>#Total</th>
            <th>#Statut</th>
            <th>#Modifier</th>
          </tr>
        <?php while($row = $result->fetch_assoc()):?>

            <?php
              $devis__date = date_create($row["devis__date"]);
              $devis__date = date_format($devis__date, 'd M. Y');
            ?>

          <tr>
            <td><?php echo $row["devis__numero"] ?></td>
            <td><?php echo $devis__date ?></td>
            <td><?php echo $row["devis__total"] ?></td>
            <td><?php echo $row["devis__statut"] ?></td>
            <td><a href="./devis__modifier?devis__id=<?php echo $row["devis__id"] ?>">Voir</a></td>
          </tr>
      <?php endwhile; ?>
        </table>
    <?php else: ?>
      <p>Chef, on a pas trouvé de devis...</p>
    <?php endif; $conn->close(); ?>
    <a href="./devis__new?projet__id=<?php echo $projet__id ?>" class="btn btn--plain">Ajouter un devis</a>
  </div>


  <!-- Liste des factures -->


    <div class="col l6">
        <h2 class="headline">Factures</h2>
        <?php $sql = "SELECT * FROM Projets, Factures WHERE Projets.projet__id='".$projet__id."' AND Factures.projet__id = Projets.projet__id"; ?>
        <?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
        <?php if ($result->num_rows > 0): ?>
          <table class="table">
            <tr>
              <th>#N°</th>
              <th>#Date</th>
              <th>#Total</th>
              <th>#Statut</th>
              <th>#Modifier</th>
            </tr>
          <?php while($row = $result->fetch_assoc()):?>
            <?php
              $facture__date = date_create($row["facture__date"]);
              $facture__date = date_format($facture__date, 'd M. Y');
            ?>

            <tr>
              <td><?php echo $row["facture__numero"] ?></td>
              <td><?php echo $facture__date ?></td>
              <td><?php echo $row["facture__total"] ?></td>
              <td><?php echo $row["facture__statut"] ?></td>
              <td><a href="./facture__modifier?facture__id=<?php echo $row["facture__id"] ?>">Voir</a></td>
            </tr>
        <?php endwhile; ?>
          </table>
      <?php else: ?>
        <p>Chef, on a pas trouvé de factures...</p>
      <?php endif; $conn->close(); ?>
      <a href="./facture__new?projet__id=<?php echo $projet__id ?>" class="btn btn--plain">Ajouter une facture</a>
    </div>



    <div class="col l12">
      <a href="./projet__modifier?projet__id=<?php echo $projet__id ?>" class="btn btn--outline">Modifier le Projet</a>
    </div>

</section>
<?php include './footer.php'; ?>
