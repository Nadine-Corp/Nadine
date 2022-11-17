<?php include './header.php'; ?>


<section class="m-rom">
  <div class="m-col">
    <h1 class="m-lead">Ajouter un nouvel artiste</h1>
  </div>
  <div class="m-col">
    <form class="form m-body" action="./core/add__artiste.php" method="post">
      <div class="form__input-container">
        <input type="text" name="civilite" placeholder="Civilité" class="form__input-full">
        <input type="text" name="prenom" placeholder="Prénom" class="form__input-half form__input-seperator">
        <input type="text" name="nom" placeholder="Nom" class="form__input-half">
        <input type="text" name="numero_secu" placeholder="n° de Sécu" class="form__input-half form__input-seperator">
        <input type="text" name="numero_mda" placeholder="n° de MDA" class="form__input-half">
      </div>
      <div class="form__input-container">
        <input type="text" name="societe" placeholder="Société" class="form__input-half form__input-seperator">
        <input type="text" name="siret" placeholder="Siret" class="form__input-half">
        <input type="text" name="adresse" placeholder="Adresse" class="form__input-full">
        <input type="text" name="code_postal" placeholder="Code postal" class="form__input-half form__input-seperator">
        <input type="text" name="ville" placeholder="Ville" class="form__input-half">
        <input type="text" name="telephone" placeholder="Téléphone" class="form__input-half form__input-seperator">
        <input type="text" name="email" placeholder="Email" class="form__input-half">
        <input type="text" name="website" placeholder="Site web" class="form__input-full">
      </div>
        <input type="submit" name="Enregistrer" value="Enregistrer" class="btn btn__plain">
    </form>
  </div>
</section>

<?php include 'footer.php'; ?>
