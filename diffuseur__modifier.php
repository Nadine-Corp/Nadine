<?php include './header.php'; ?>


<section class="row">
  <div class="col l12">
    <h1 class="display1">Modifier un diffuseur</h1>
  </div>
  <div class="col l12">

    <?php  $diffuseur__id = $_GET['diffuseur__id']; ?>
    <?php $sql = "SELECT * FROM Diffuseurs WHERE diffuseur__id ='".$diffuseur__id."'"; ?>
    <?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
    <?php if ($result->num_rows > 0): ?>
      <?php while($row = $result->fetch_assoc()):?>

      <form class="form body" action="./core/update__diffuseur.php" method="post">
        <div class="form__input-container">
          <input type="hidden" name="diffuseur__id" placeholder="Id " class="form__input-full" value="<?php echo $row["diffuseur__id"] ?>">
          <input type="text" name="societe" placeholder="Société" class="form__input-half form__input-seperator" value="<?php echo $row["diffuseur__societe"] ?>">
          <input type="text" name="siret" placeholder="Siret" class="form__input-half" value="<?php echo $row["diffuseur__siret"] ?>">
          <input type="text" name="civilite" placeholder="Civilité" class="form__input-full" value="<?php echo $row["diffuseur__civilite"] ?>">
          <input type="text" name="prenom" placeholder="Prénom" class="form__input-half form__input-seperator" value="<?php echo $row["diffuseur__prenom"] ?>">
          <input type="text" name="nom" placeholder="Nom" class="form__input-half" value="<?php echo $row["diffuseur__nom"] ?>">
          <input type="text" name="adresse" placeholder="Adresse" class="form__input-full" value="<?php echo $row["diffuseur__adresse"] ?>">
          <input type="text" name="code_postal" placeholder="Code postal" class="form__input-half form__input-seperator" value="<?php echo $row["diffuseur__code_postal"] ?>">
          <input type="text" name="ville" placeholder="Ville" class="form__input-half" value="<?php echo $row["diffuseur__ville"] ?>">
          <input type="text" name="telephone" placeholder="Téléphone" class="form__input-half form__input-seperator" value="<?php echo $row["diffuseur__telephone"] ?>">
          <input type="text" name="email" placeholder="Email" class="form__input-half" value="<?php echo $row["diffuseur__email"] ?>">
          <input type="text" name="website" placeholder="Site web" class="form__input-full" value="<?php echo $row["diffuseur__website"] ?>">
        </div>
          <a href="./diffuseurs" class="btn btn--outline">Annuler</a>
          <a href="./core/supprimer?base=diffuseurs&id=<?php echo $diffuseur__id ?> ?>" class="btn btn--outline">Supprimer</a>
          <input type="submit" name="Enregistrer" value="Enregistrer" class="btn btn--plain">
      </form>


    <?php endwhile; ?>
    <?php else: ?>
      <p>Chef, on n'a pas trouvé de projets...</p>
    <?php endif; $conn->close(); ?>
  </div>
</section>

<?php include 'footer.php'; ?>
