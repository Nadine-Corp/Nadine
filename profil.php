<?php include './header.php'; ?>


<?php $sql = "SELECT * FROM Profil ORDER BY profil__id DESC LIMIT 1;"; ?>
<?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
<?php if ($result->num_rows > 0): ?>
  <?php while($row = $result->fetch_assoc()):?>



    <section class="row">
      <div class="col l12">
        <h1 class="display1">Modifier votre profil</h1>
      </div>
      <form class="form" action="./core/add__profil.php" method="post">


        <?php
        /**
        * Modifier vos coordonnées
        */
        ?>

        <div class="m-accordion col l12">
          <div class="m-accordion__titre">
            <h2 class="subheading">Modifier vos coordonnées</h2>
            <div class="m-accordion__ico">
              <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
            </div>
          </div>
          <div class="m-accordion__wrapper">
            <div class="form__input-container body">
              <input type="text" name="civilite" placeholder="Civilité" class="form__input-full" <?php if (!empty( $row["profil__civilite"] )) {echo 'value="'.$row["profil__civilite"].'""';} ?> >
              <input type="text" name="prenom" placeholder="Prénom" class="form__input-half form__input-seperator" <?php if (!empty( $row["profil__prenom"] )) {echo 'value="'.$row["profil__prenom"].'""';} ?> >
              <input type="text" name="nom" placeholder="Nom" class="form__input-half" <?php if (!empty( $row["profil__nom"] )) {echo 'value="'.$row["profil__nom"].'""';} ?> >
              <input type="text" name="adresse" placeholder="Adresse" class="form__input-full" <?php if (!empty( $row["profil__adresse"] )) {echo 'value="'.$row["profil__adresse"].'""';} ?> >
              <input type="text" name="code_postal" placeholder="Code postal" class="form__input-half form__input-seperator" <?php if (!empty( $row["profil__code_postal"] )) {echo 'value="'.$row["profil__code_postal"].'""';} ?> >
              <input type="text" name="ville" placeholder="Ville" class="form__input-half" <?php if (!empty( $row["profil__ville"] )) {echo 'value="'.$row["profil__ville"].'""';} ?> >
              <input type="text" name="societe" placeholder="Société" class="form__input-half form__input-seperator" <?php if (!empty( $row["profil__societe"] )) {echo 'value="'.$row["profil__societe"].'""';} ?> >
              <input type="text" name="siret" placeholder="SIRET" class="form__input-half" <?php if (!empty( $row["profil__siret"] )) {echo 'value="'.$row["profil__siret"].'""';} ?> >
              <input type="text" name="telephone" placeholder="Téléphone" class="form__input-half form__input-seperator" <?php if (!empty( $row["profil__telephone"] )) {echo 'value="'.$row["profil__telephone"].'""';} ?> >
              <input type="text" name="email" placeholder="Email" class="form__input-half" <?php if (!empty( $row["profil__email"] )) {echo 'value="'.$row["profil__email"].'""';} ?> >
              <input type="text" name="website" placeholder="Site web" class="form__input-full" <?php if (!empty( $row["profil__website"] )) {echo 'value="'.$row["profil__website"].'""';} ?> >
            </div>
          </div>
        </div>


        <?php
        /**
        * N° de Secu & Maison des Artistes
        */
        ?>

        <div class="m-accordion col l12">
          <div class="m-accordion__titre">
            <h2 class="subheading">N° de Secu & Maison des Artistes</h2>
            <div class="m-accordion__ico">
              <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
            </div>
          </div>
          <div class="m-accordion__wrapper">
            <div class="form__slider-container">
              <p class="lead_paragraph">Êtes-vous assujetti⸱e au précompte ?</p>
              <span>Non</span>
              <label class="switch">
                <?php
                  if($row["profil__precompte"] == "1"){
                    echo '<input name="precompte" type="checkbox" checked>';
                  }else{
                    echo '<input name="precompte" type="checkbox">';
                  };
                 ?>
                <span class="slider  is--fullsize round"></span>
              </label>
              <span>Oui</span>
            </div>
            <div class="form__input-container body">
              <input type="text" name="numero_secu" placeholder="N° de Sécurité sociale" class="form__input-half form__input-seperator" <?php if (!empty( $row["profil__numero_secu"] )) {echo 'value="'.$row["profil__numero_secu"].'""';} ?> >
              <input type="text" name="numero_mda" placeholder="N° MDA" class="form__input-half" <?php if (!empty( $row["profil__numero_mda"] )) {echo 'value="'.$row["profil__numero_mda"].'""';} ?> >
            </div>
          </div>
        </div>


        <?php
        /**
        * Coordonnées bancaires
        */
        ?>

        <div class="m-accordion col l12">
          <div class="m-accordion__titre">
            <h2 class="subheading">Coordonnées bancaires</h2>
            <div class="m-accordion__ico">
              <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
            </div>
          </div>
          <div class="m-accordion__wrapper">
            <div class="form__input-container body">
              <input type="text" name="titulaire_du_compte" placeholder="Titulaire du compte" class="form__input-full" <?php if (!empty( $row["profil__titulaire_du_compte"] )) {echo 'value="'.$row["profil__titulaire_du_compte"].'""';} ?> >
              <input type="text" name="iban" placeholder="IBAN" class="form__input-half form__input-seperator" <?php if (!empty( $row["profil__iban"] )) {echo 'value="'.$row["profil__iban"].'""';} ?> >
              <input type="text" name="bic" placeholder="BIC" class="form__input-half" <?php if (!empty( $row["profil__bic"] )) {echo 'value="'.$row["profil__bic"].'""';} ?> >
            </div>
          </div>
        </div>


        <?php
        /**
        * Gabarits d'email des devis et facture
        */
        ?>

        <div class="m-accordion col l12">
          <div class="m-accordion__titre">
            <h2 class="subheading">Gabarits d'email des devis et facture</h2>
            <div class="m-accordion__ico">
              <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
            </div>
          </div>
          <div class="m-accordion__wrapper">
            <div class="form__input-container body">
              <p>Liste des variables :
                <ul>
                  <li>{{diffuseur__civilite}}</li>
                  <li>{{diffuseur__prenom}}</li>
                  <li>{{diffuseur__nom}}</li>
                  <li>{{diffuseur__societe}}</li>
                  <li>{{diffuseur__email}}</li>
                  <li>{{projet__nom}}</li>
                  <li>{{profil__societe}}</li>
                  <li>{{profil__civilite}}</li>
                  <li>{{profil__prenom}}</li>
                  <li>{{profil__nom}}</li>
                  <li>{{profil__numero_secu}}</li>
                  <li>{{profil__titulaire_du_compte}}</li>
                  <li>{{profil__iban}}</li>
                  <li>{{profil__bic}}</li>
                </ul>
              </p>
              <textarea name="profil__msg_devis" class="form__input-full" rows="10"><?php if (!empty( $row["profil__msg_devis"] )) {echo $row["profil__msg_devis"];} ?></textarea>
              <textarea name="profil__msg_facture" class="form__input-full" rows="10"><?php if (!empty( $row["profil__msg_facture"] )) {echo $row["profil__msg_facture"];} ?></textarea>
            </div>
          </div>
        </div>


        <input type="submit" name="Enregistrer" class="btn btn--plain" value="Enregistrer">

      </form>
    </section>

  <?php endwhile; ?>
<?php else: ?>
  <section class="row">
    <div class="col l12">
      <p class="display1">Chef, on n'a rien trouvé ici...</p>
    </div>
  </section>
<?php endif; $conn->close(); ?>


<?php include './footer.php'; ?>
