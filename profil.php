<?php include './header.php'; ?>


<?php $sql = "SELECT * FROM profil ORDER BY profil__id DESC LIMIT 1;"; ?>
<?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
<?php if ($result->num_rows > 0): ?>
<?php while($row = $result->fetch_assoc()):?>

<section class="row">
  <div class="col l12">
    <h1 class="display1">Modifier votre profil</h1>
  </div>
  <form class="form body" action="./core/add__profil.php" method="post">
    <div class="col l12">
      <h2 class="headline">Coordonnées</h1>
    </div>
    <div class="col l12">
      <div class="form__input-container">
        <input type="text" name="societe" placeholder="Société" class="form__input-half form__input-seperator" <?php if (!empty( $row["profil__societe"] )) {echo 'value="'.$row["profil__societe"].'""';} ?> >
        <input type="text" name="siret" placeholder="SIRET" class="form__input-half" <?php if (!empty( $row["profil__siret"] )) {echo 'value="'.$row["profil__siret"].'""';} ?> >
        <input type="text" name="civilite" placeholder="Civilité" class="form__input-full" <?php if (!empty( $row["profil__civilite"] )) {echo 'value="'.$row["profil__civilite"].'""';} ?> >
        <input type="text" name="prenom" placeholder="Prénom" class="form__input-half form__input-seperator" <?php if (!empty( $row["profil__prenom"] )) {echo 'value="'.$row["profil__prenom"].'""';} ?> >
        <input type="text" name="nom" placeholder="Nom" class="form__input-half" <?php if (!empty( $row["profil__nom"] )) {echo 'value="'.$row["profil__nom"].'""';} ?> >
        <input type="text" name="adresse" placeholder="Adresse" class="form__input-full" <?php if (!empty( $row["profil__adresse"] )) {echo 'value="'.$row["profil__adresse"].'""';} ?> >
        <input type="text" name="code_postal" placeholder="Code postal" class="form__input-half form__input-seperator" <?php if (!empty( $row["profil__code_postal"] )) {echo 'value="'.$row["profil__code_postal"].'""';} ?> >
        <input type="text" name="ville" placeholder="Ville" class="form__input-half" <?php if (!empty( $row["profil__ville"] )) {echo 'value="'.$row["profil__ville"].'""';} ?> >
        <input type="text" name="telephone" placeholder="Téléphone" class="form__input-half form__input-seperator" <?php if (!empty( $row["profil__telephone"] )) {echo 'value="'.$row["profil__telephone"].'""';} ?> >
        <input type="text" name="email" placeholder="Email" class="form__input-half" <?php if (!empty( $row["profil__email"] )) {echo 'value="'.$row["profil__email"].'""';} ?> >
        <input type="text" name="website" placeholder="Site web" class="form__input-full" <?php if (!empty( $row["profil__website"] )) {echo 'value="'.$row["profil__website"].'""';} ?> >
      </div>
    </div>
    <div class="col l12">
      <h2 class="headline">N° de Secu et Maison des Artites</h1>
    </div>
    <div class="col l12">
      <div class="form__input-container">
        <input type="text" name="numero_secu" placeholder="N° de Sécurité sociale" class="form__input-half form__input-seperator" <?php if (!empty( $row["profil__numero_secu"] )) {echo 'value="'.$row["profil__numero_secu"].'""';} ?> >
        <input type="text" name="numero_mda" placeholder="N° MDA" class="form__input-half" <?php if (!empty( $row["profil__numero_mda"] )) {echo 'value="'.$row["profil__numero_mda"].'""';} ?> >
      </div>
    </div>
    <div class="col l12">
      <h2 class="headline">Coordonnées banquaires</h1>
    </div>
    <div class="col l12">
      <div class="form__input-container">
        <input type="text" name="titulaire_du_compte" placeholder="Titulaire du compte" class="form__input-full" <?php if (!empty( $row["profil__titulaire_du_compte"] )) {echo 'value="'.$row["profil__titulaire_du_compte"].'""';} ?> >
        <input type="text" name="iban" placeholder="IBAN" class="form__input-half form__input-seperator" <?php if (!empty( $row["profil__iban"] )) {echo 'value="'.$row["profil__iban"].'""';} ?> >
        <input type="text" name="bic" placeholder="BIC" class="form__input-half" <?php if (!empty( $row["profil__bic"] )) {echo 'value="'.$row["profil__bic"].'""';} ?> >
      </div>
    </div>
      <input type="submit" name="Enregistrer" class="btn btn--plain">
  </form>
</section>

<?php endwhile; ?>
<?php else: ?>
<p>Chef, on a rien trouvé ici...</p>
<?php endif; $conn->close(); ?>


<?php include './footer.php'; ?>
