<?php include 'header.php'; ?>

<?php
/**
* Créer la liste des diffuseurs
*/

$sql = "SELECT * FROM Diffuseurs";
include './core/query.php'; $result = $conn->query($sql) or die($conn->error);

if ($result->num_rows > 0) :
  $listdiffuseur = '[';
  while($row = $result->fetch_assoc()):
    $diffuseur = $row["diffuseur__societe"];
    $diffuseur = str_replace("'","", $diffuseur);
    $listdiffuseur.= "'".$diffuseur."', ";
  endwhile;
  $listdiffuseur = rtrim($listdiffuseur, ", "); // On efface la dernière virgule
  $listdiffuseur.= ']';
else:
  $listdiffuseur = "Aucun Diffuseur. Rien. Quel dalle. Nada.";
endif; $conn->close();



/**
* Créer la liste des artistes
*/

$sql = "SELECT * FROM Artistes";
include './core/query.php'; $result = $conn->query($sql) or die($conn->error);

if ($result->num_rows > 0) :
  $listartiste = '[';
  while($row = $result->fetch_assoc()):
    $artiste = $row["artiste__societe"];
    $artiste = str_replace("'","", $artiste);
    $listartiste.= "'".$artiste."', ";
  endwhile;
  $listartiste = rtrim($listartiste, ", "); // On efface la dernière virgule
  $listartiste.= ']';
else:
  $listdiffuseur = "Aucun Artiste. Rien. Quel dalle. Nada.";
endif; $conn->close();



/**
* Création du formulaire
*/
?>



<section class="row">
  <div class="col l12">
    <h1 class="display1">Modifier un projet</h1>
  </div>
  <div class="col l12">

    <?php
    $projet__id = $_GET['projet__id'];
    $sql = "SELECT * FROM Projets,Diffuseurs WHERE Projets.projet__id='".$projet__id."' AND Projets.diffuseur__id = Diffuseurs.diffuseur__id";
    include './core/query.php'; $result = $conn->query($sql) or die($conn->error);
    if ($result->num_rows > 0):
      while($row = $result->fetch_assoc()):

        if( $row["diffuseur__societe"] ):
          $diffuseur__societe = $row["diffuseur__societe"];
          $diffuseur = '["'.$diffuseur__societe.'"]';
          $diffuseur = htmlspecialchars($diffuseur);
        endif;
      ?>

        <form class="form body" action="./core/modifier__projet.php" method="post">
          <div class="form__input-container">
            <input type="hidden" name="projet__id" placeholder="Id Projet" class="form__input-half" value="<?php echo $row["projet__id"] ?>">
            <input type="text" name="nom_du_projet" placeholder="Nom du projet" class="form__input-full" value="<?php echo $row["projet__nom"] ?>">
            <input type="text" name="numero_du_projet" placeholder="Numéro du projet" class="form__input-half form__input-seperator" disabled>
            <input list="statut" name="projet__statut" placeholder="Statut" class="form__input-half" value="<?php echo $row["projet__statut"] ?>">
            <input type="date" name="date_de_creation" placeholder="Date de création" class="form__input-half form__input-seperator" value="<?php echo $row["projet__date_de_creation"] ?>">
            <input type="date" name="date_de_fin" placeholder="Date de fin" class="form__input-half" value="<?php echo $row["projet__date_de_fin"] ?>">
            <div class="form__input-half form__input-seperator directorist-select directorist-select-multi" <?php if($row["diffuseur__societe"]): ?>data-default="['<?php echo addslashes($row["diffuseur__societe"]) ?>']"<?php endif; ?> id="multi--diffuseurs" data-isSearch="true" data-max="1" data-placeholder="Rechercher un Diffuseur" data-multiSelect="<?php echo $listdiffuseur; ?>" >
            <?php
              if ($diffuseur) {
                echo "<input name='diffuseur__societe' type='hidden' value=\"".htmlspecialchars($diffuseur)."\">";
              }else{
                echo "<input name='diffuseur__societe' type='hidden'>";
              };
            ?>
            </div>
            <div class="form__input-half directorist-select directorist-select-multi" <?php if($row["artiste__id"]): ?>data-default="['<?php echo addslashes($row["artiste__id"]) ?>']"<?php endif; ?> id="multi--artistes" data-isSearch="true" data-placeholder="Rechercher un Artiste" data-multiSelect="<?php echo $listartiste; ?>">
              <input name="artiste__societe" type="hidden" value="">
            </div>
          </div>
          <button href="./projets" class="btn btn--outline">Annuler</button>
          <button href="./core/supprimer.php?base=projets&cible=projet__id&id=<?php echo $projet__id ?>" class="btn btn--outline">Supprimer le Projet</button>
          <input type="submit" name="Enregistrer" value="Enregistrer" class="btn btn--plain">
        </form>

      <?php endwhile; ?>
    <?php else: ?>
      <p>Chef, on n'a pas trouvé de projets...</p>
    <?php endif; $conn->close(); ?>
  </div>
</section>

<datalist id="statut">
  <option value="Projet en cours">
  <option value="Projet terminé">
  <option value="Projet annulé">
</datalist>

      <script src="./assets/js/multiple-select.js"></script>
      <script>
      pureScriptSelect('#multi--diffuseurs');
      pureScriptSelect('#multi--artistes');
      </script>

      <?php include 'footer.php'; ?>
