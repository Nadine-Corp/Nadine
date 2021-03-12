<?php include './header.php'; ?>


<?php
  if (!isset($_GET['annee'])) {
    $year = date("Y");
  } else {
    $year = $_GET['annee'];
  }
?>




<section class="row">
  <div class="col l12">
    <h1 class="display1">Bilan annuel <?php echo $year; ?></h1>
  </div>
  <div class="col l12">
    <a href="bilan.php?annee=2018" class="btn btn--outline">2018</a>
    <a href="bilan.php?annee=2019" class="btn btn--outline">2019</a>
    <a href="bilan.php?annee=2020" class="btn btn--outline">2020</a>
  </div>
  <div class="col l12">

  <?php $sql = "SELECT * FROM Projets, Diffuseurs WHERE Projets.diffuseur__id = Diffuseurs.diffuseur__id AND projet__statut = 'Projet terminé' AND projet__date_de_fin BETWEEN CAST('".$year."-01-01' AS DATE) AND CAST('".$year."-12-31' AS DATE) ORDER BY projet__date_de_fin ASC;"; ?>
  <?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
  <?php if ($result->num_rows > 0): ?>
    <table class="table body">
      <tr>
        <th>#Nature de l'activité</th>
        <th>#Diffuseur</th>
        <th>#Date</th>
        <th>#Montant HT</th>
        <th>#Voir</th>
      </tr>

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


      <tr>
        <td>Créations graphiques</td>
        <td><?php echo $row["diffuseur__societe"] ?><br><?php echo $row["diffuseur__adresse"] ?>, <?php echo $row["diffuseur__code_postal"] ?> <?php echo $row["diffuseur__ville"] ?><br>Siret : <?php echo $row["diffuseur__siret"] ?></td>
        <td><?php echo $date_de_fin; ?></td>
        <td></td>
        <td><a href="projet__single?projet__id=<?php echo $row["projet__id"] ?>">Voir</a></td>
      </tr>
    <?php endwhile; ?>
  </table>
  <?php else: ?>
      <p>Chef, on a pas trouvé de projet cette année...</p>
  <?php endif; $conn->close(); ?>
</div>
</section>

<?php include './footer.php'; ?>
