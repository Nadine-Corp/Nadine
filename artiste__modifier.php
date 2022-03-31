<?php include './header.php'; ?>


<section class="row">
  <div class="col l12">
    <h1 class="display1">Modifier un artiste</h1>
  </div>
  <div class="col l12">

    <?php  $artiste__id = $_GET['__id']; ?>
    <?php $sql = "SELECT * FROM Artistes WHERE artiste__id ='".$artiste__id."'"; ?>
    <?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
    <?php if ($result->num_rows > 0): ?>
      <?php while($row = $result->fetch_assoc()):?>

      <form class="form body" action="./core/update__artiste.php" method="post">
        <div class="form__input-container">
          <input type="hidden" name="artiste__id" placeholder="Id " class="form__input-full" value="<?php echo $row["artiste__id"] ?>">
          <input type="text" name="civilite" placeholder="Civilité" class="form__input-full" value="<?php echo $row["artiste__civilite"] ?>">
          <input type="text" name="prenom" placeholder="Prénom" class="form__input-half form__input-seperator" value="<?php echo $row["artiste__prenom"] ?>">
          <input type="text" name="nom" placeholder="Nom" class="form__input-half" value="<?php echo $row["artiste__nom"] ?>">
          <input type="text" name="numero_secu" placeholder="n° de Sécu" class="form__input-half form__input-seperator" value="<?php echo $row["artiste__numero_secu"] ?>">
          <input type="text" name="numero_mda" placeholder="n° de MDA" class="form__input-half" value="<?php echo $row["artiste__numero_mda"] ?>">
      </div>
      <div class="form__input-container">
          <input type="text" name="societe" placeholder="Société" class="form__input-half form__input-seperator" value="<?php echo $row["artiste__societe"] ?>">
          <input type="text" name="siret" placeholder="Siret" class="form__input-half" value="<?php echo $row["artiste__siret"] ?>">
          <input type="text" name="adresse" placeholder="Adresse" class="form__input-full" value="<?php echo $row["artiste__adresse"] ?>">
          <input type="text" name="code_postal" placeholder="Code postal" class="form__input-half form__input-seperator" value="<?php echo $row["artiste__code_postal"] ?>">
          <input type="text" name="ville" placeholder="Ville" class="form__input-half" value="<?php echo $row["artiste__ville"] ?>">
          <input type="text" name="telephone" placeholder="Téléphone" class="form__input-half form__input-seperator" value="<?php echo $row["artiste__telephone"] ?>">
          <input type="text" name="email" placeholder="Email" class="form__input-half" value="<?php echo $row["artiste__email"] ?>">
          <input type="text" name="website" placeholder="Site web" class="form__input-full" value="<?php echo $row["artiste__website"] ?>">
        </div>
          <a href="./artistes.php" class="btn btn--outline">Annuler</a>
          <a href="./core/supprimer.php?base=artistes&location=artistes&cible=artiste__id&id=<?php echo $artiste__id ?>" class="btn btn--outline">Supprimer</a>
          <input type="submit" name="Enregistrer" value="Enregistrer" class="btn btn--plain">
      </form>


    <?php endwhile; ?>
    <?php else: ?>
      <p>Chef, on n'a pas trouvé de projets...</p>
    <?php endif; $conn->close(); ?>
  </div>
</section>

<?php include 'footer.php'; ?>
