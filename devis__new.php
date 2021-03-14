<?php include 'header.php'; ?>


<?php
  date_default_timezone_set('UTC');
  $today = date("Y-m-d");
  setlocale(LC_TIME, "fr_FR","French");
  $date = strftime("%d %B %Y", strtotime($today));

  /* Créer le numéro de devis */

  $sql = "SELECT MAX(devis__id) AS LastID FROM Devis";
  include './core/query.php'; $result = $conn->query($sql) or die($conn->error);
  $row = $result->fetch_assoc();
  if($row){
    $facture__numero = "DMD." . date("Y"). "." . ( $row["LastID"] + 1 );
  }

   /* Récupérer le dernier Profil créer */

   $sql = "SELECT MAX(profil__id) AS LastProfil FROM Profil";
   include './core/query.php'; $result = $conn->query($sql) or die($conn->error);
   $row = $result->fetch_assoc();
   if($row){
     $profil__id =  $row["LastProfil"];
   }

  /* Récupérer les infos du projet */

  ?>
  <?php $projet__id = $_GET['projet__id']; ?>
  <?php $sql = "SELECT * FROM Projets,Diffuseurs,Profil WHERE Projets.projet__id='".$projet__id."' AND Projets.diffuseur__id = Diffuseurs.diffuseur__id AND Profil.profil__id = '".$profil__id."'"; ?>
  <?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
  <?php if ($result->num_rows > 0): ?>
  <?php while($row = $result->fetch_assoc()):?>

 <form class="form" action="./core/add__devis.php" method="post">


  <input type="hidden" name="projet__id" placeholder="projet__id" value="<?php echo $projet__id ?>">
  <input type="hidden" name="profil__id" placeholder="projet__id" value="<?php echo $profil__id ?>">
  <input type="hidden" name="projet__nom" placeholder="projet__nom" value="<?php echo $row["projet__nom"] ?>">
  <input type="hidden" name="projet__numero" placeholder="projet__numero" value="<?php echo $row["projet__numero"] ?>">
  <input type="hidden" name="diffuseur__id" placeholder="__id" value="<?php echo $row["diffuseur__id"] ?>">
  <input type="hidden" name="diffuseur__societe" placeholder="__societe" value="<?php echo $row["diffuseur__societe"] ?>">
  <input type="hidden" name="diffuseur__siret" placeholder="__siret" value="<?php echo $row["diffuseur__siret"] ?>">
  <input type="hidden" name="diffuseur__civilite" placeholder="__civilite" value="<?php echo $row["diffuseur__civilite"] ?>">
  <input type="hidden" name="diffuseur__prenom" placeholder="__prenom" value="<?php echo $row["diffuseur__prenom"] ?>">
  <input type="hidden" name="diffuseur__nom" placeholder="__nom" value="<?php echo $row["diffuseur__nom"] ?>">
  <input type="hidden" name="diffuseur__adresse" placeholder="__adresse" value="<?php echo $row["diffuseur__adresse"] ?>">
  <input type="hidden" name="diffuseur__code_postal" placeholder="__code_postal" value="<?php echo $row["diffuseur__code_postal"] ?>">
  <input type="hidden" name="diffuseur__ville" placeholder="__ville" value="<?php echo $row["diffuseur__ville"] ?>">
  <input type="hidden" name="diffuseur__telephone" placeholder="__telephone" value="<?php echo $row["diffuseur__telephone"] ?>">
  <input type="hidden" name="diffuseur__email" placeholder="__email" value="<?php echo $row["diffuseur__email"] ?>">
  <input type="hidden" name="diffuseur__website" placeholder="__website" value="<?php echo $row["diffuseur__website"] ?>">
  <input type="hidden" name="devis__total" placeholder="Total">




  <section class="toolbar is--sticky">
    <div class="toolbar__container">
      <h1 class="display1">Créer un devis</h1>
      <div class="toolbar__btn">
        <a href="./projet__single?projet__id=<?php echo $projet__id ?>" class="btn btn--outline">Annuler</a>
        <input type="submit" name="Enregistrer" value="Enregistrer" class="btn btn--plain">
      </div>
    </div>
  </section>




  <section class="row l_facture">
    <div class="col l12">
      <?php include './template_facture/facture__v3/devis.php'; ?>
    </div>
  </section>
</form>

<?php endwhile; ?>
<?php else: ?>
<p>Chef, on a rien trouvé ici...</p>
<?php endif; $conn->close(); ?>

<?php include 'footer.php'; ?>
