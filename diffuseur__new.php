<?php include 'header.php'; ?>


<section class="row">
  <div class="col l12">
    <h1 class="display1">Ajouter un nouveau diffuseur</h1>
  </div>
  <div class="col l12">
    <form class="form body" action="./core/add__diffuseur.php" method="post">
      <div class="form__input-container">
        <input type="text" name="societe" placeholder="Société" class="form__input-half form__input-seperator">
        <input type="text" name="siret" placeholder="Siret" class="form__input-half">
        <input type="text" name="civilite" placeholder="Civilité" class="form__input-full">
        <input type="text" name="prenom" placeholder="Prénom" class="form__input-half form__input-seperator">
        <input type="text" name="nom" placeholder="Nom" class="form__input-half">
        <input type="text" name="adresse" placeholder="Adresse" class="form__input-full">
        <input type="text" name="code_postal" placeholder="Code postal" class="form__input-half form__input-seperator">
        <input type="text" name="ville" placeholder="Ville" class="form__input-half">
        <input type="text" name="telephone" placeholder="Téléphone" class="form__input-half form__input-seperator">
        <input type="text" name="email" placeholder="Email" class="form__input-half">
        <input type="text" name="website" placeholder="Site web" class="form__input-full">
      </div>
        <input type="submit" name="Enregistrer" value="Enregistrer" class="btn btn--plain">
    </form>
  </div>
</section>

<?php include 'footer.php'; ?>
