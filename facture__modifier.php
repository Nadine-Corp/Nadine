<?php include 'header.php'; ?>


<?php
date_default_timezone_set('UTC');
$today = date("Y-m-d");
setlocale(LC_TIME, "fr_FR","French");
$date = strftime("%d %B %Y", strtotime($today));
?>


<?php $facture__id = $_GET['facture__id']; ?>
<?php $sql = "SELECT * FROM Factures, Profil WHERE Factures.facture__id='".$facture__id."' AND Factures.profil__id = Profil.profil__id "; ?>
<?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
<?php if ($result->num_rows > 0): ?>
  <?php while($row = $result->fetch_assoc()):?>

    <form class="form" action="./core/modifier__facture.php" method="post">

      <?php $facture__numero = $row["facture__numero"]; ?>
      <?php $facture__tache_1 = $row["facture__tache_1"]; $facture__prix_1 = $row["facture__prix_1"]; ?>
      <?php $facture__tache_2 = $row["facture__tache_2"]; $facture__prix_2 = $row["facture__prix_2"]; ?>
      <?php $facture__tache_3 = $row["facture__tache_3"]; $facture__prix_3 = $row["facture__prix_3"]; ?>
      <?php $facture__tache_4 = $row["facture__tache_4"]; $facture__prix_4 = $row["facture__prix_4"]; ?>
      <?php $facture__tache_5 = $row["facture__tache_5"]; $facture__prix_5 = $row["facture__prix_5"]; ?>
      <?php $facture__tache_6 = $row["facture__tache_6"]; $facture__prix_6 = $row["facture__prix_6"]; ?>
      <?php $facture__tache_7 = $row["facture__tache_7"]; $facture__prix_7 = $row["facture__prix_7"]; ?>
      <input type="hidden" name="facture__id" placeholder="facture__id" value="<?php echo $facture__id ?>">
      <input type="hidden" name="projet__id" placeholder="projet__id" value="<?php echo $row["projet__id"] ?>">
      <input type="hidden" name="projet__nom" placeholder="projet__nom" value="<?php echo $row["projet__nom"] ?>">
      <input type="hidden" name="projet__numero" placeholder="projet__numero" value="<?php echo $row["projet__numero"] ?>">
      <input type="hidden" name="diffuseur__id" placeholder="diffuseur__id" value="<?php echo $row["diffuseur__id"] ?>">
      <input type="hidden" name="diffuseur__societe" placeholder="diffuseur__societe" value="<?php echo $row["diffuseur__societe"] ?>">
      <input type="hidden" name="diffuseur__siret" placeholder="diffuseur__siret" value="<?php echo $row["diffuseur__siret"] ?>">
      <input type="hidden" name="diffuseur__civilite" placeholder="diffuseur__civilite" value="<?php echo $row["diffuseur__civilite"] ?>">
      <input type="hidden" name="diffuseur__prenom" placeholder="diffuseur__prenom" value="<?php echo $row["diffuseur__prenom"] ?>">
      <input type="hidden" name="diffuseur__nom" placeholder="diffuseur__nom" value="<?php echo $row["diffuseur__nom"] ?>">
      <input type="hidden" name="diffuseur__adresse" placeholder="diffuseur__adresse" value="<?php echo $row["diffuseur__adresse"] ?>">
      <input type="hidden" name="diffuseur__code_postal" placeholder="diffuseur__code_postal" value="<?php echo $row["diffuseur__code_postal"] ?>">
      <input type="hidden" name="diffuseur__ville" placeholder="diffuseur__ville" value="<?php echo $row["diffuseur__ville"] ?>">
      <input type="hidden" name="diffuseur__telephone" placeholder="diffuseur__telephone" value="<?php echo $row["diffuseur__telephone"] ?>">
      <input type="hidden" name="diffuseur__email" placeholder="diffuseur__email" value="<?php echo $row["diffuseur__email"] ?>">
      <input type="hidden" name="diffuseur__website" placeholder="diffuseur__website" value="<?php echo $row["diffuseur__website"] ?>">
      <input type="hidden" name="facture__total" placeholder="Total" class="facture__subheading">


      <section class="toolbar is--sticky">
        <div class="toolbar__container">
          <h1 class="display1">Modifier une facture</h1>
          <div class="toolbar__btn">
            <button href="./projet__single?projet__id=<?php echo $row["projet__id"] ?>" class="btn btn--outline">Annuler</button>
            <button href="./core/supprimer?base=Factures&cible=facture__id&id=<?php echo $facture__id ?>" class="btn btn--outline">Supprimer</button>
            <button href="./facture__mail?facture__id=<?php echo $facture__id ?>" class="btn btn--outline" class="btn btn--plain">Générer email</button>
            <input list="statut" class="btn btn--outline" name="facture__statut" value="<?php echo $row["facture__statut"] ?>">
            <datalist id="statut">
              <option value="Brouillon">
              <option value="Envoyée">
              <option value="Payée">
              <option value="Annulée">
            </datalist>
            <button href="javascript:window.print()" class="btn btn--plain">Imprimer en PDF</button>
            <input type="submit" name="Enregistrer" value="Enregistrer" class="btn btn--plain">
          </div>
        </div>
      </section>



      <section class="row l_facture">
        <div class="col l12">
          <?php include './template_facture/facture__v3/facture.php'; ?>
        </div>
      </section>
      </form>

          <?php endwhile; ?>
        <?php else: ?>
          <p>Chef, on a rien trouvé ici...</p>
        <?php endif; $conn->close(); ?>

        <?php include 'footer.php'; ?>
