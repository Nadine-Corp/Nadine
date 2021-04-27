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

    <form class="form" action="./core/update__projet.php" method="post">

      <section class="toolbar is--sticky">
        <div class="toolbar__container">
          <h1 class="display1">Modifier un projet</h1>
          <div class="toolbar__btn">
            <button href="./projets" class="btn btn--outline">Annuler</button>
            <button href="./core/supprimer.php?base=projets&cible=projet__id&id=<?php echo $projet__id ?>" class="btn btn--outline">Supprimer le Projet</button>
            <input type="submit" name="Enregistrer" value="Enregistrer" class="btn btn--plain">
          </div>
        </div>
      </section>

      <section class="row">
        <div class="accordion col l12">
          <div class="accordion__titre">
            <h2 class="subheading">Informations générales</h2>
            <div class="accordion__icon">
              <?php include './assets/img/inline-icon_arrow_accordion.svg.php'; ?>
            </div>
          </div>
          <div class="accordion__container">
            <div class="form__input-container body">
              <input type="hidden" name="projet__id" placeholder="Id Projet" class="form__input-half" value="<?php echo $row["projet__id"] ?>">
              <input type="text" name="nom_du_projet" placeholder="Nom du projet" class="form__input-full" value="<?php echo $row["projet__nom"] ?>">
              <input type="text" name="numero_du_projet" placeholder="Numéro du projet" class="form__input-half form__input-seperator" disabled>
              <input list="statut" name="projet__statut" placeholder="Statut" class="form__input-half" value="<?php echo $row["projet__statut"] ?>">
              <input type="date" name="date_de_creation" placeholder="Date de création" class="form__input-half form__input-seperator" value="<?php echo $row["projet__date_de_creation"] ?>">
              <input type="date" name="date_de_fin" placeholder="Date de fin" class="form__input-half" value="<?php echo $row["projet__date_de_fin"] ?>">
            </div>
          </div>
        </div>


        <?php
        /**
        * Informations concernant le Diffuseur
        */
        ?>

        <div class="accordion col l12">
          <div class="accordion__titre">
            <h2 class="subheading">Diffuseurs</h2>
            <div class="accordion__icon">
              <?php include './assets/img/inline-icon_arrow_accordion.svg.php'; ?>
            </div>
          </div>
          <div class="accordion__container">
            <div class="form__slider-container body">
              <p class="lead_paragraph">Est-ce une vente à un particulier ou un galeriste ou une société étrangère ?</p>
              <span>Non</span>
              <label class="switch">
                <input name="precompte" type="checkbox">
                <span class="slider  is--fullsize round"></span>
              </label>
              <span>Oui</span>
            </div>
            <div class="form__input-container body">
              <div class="form__input-half form__input-seperator directorist-select directorist-select-multi" <?php if($row["diffuseur__societe"]): ?>data-default="['<?php echo addslashes($row["diffuseur__societe"]) ?>']"<?php endif; ?> id="multi--diffuseurs" data-isSearch="true" data-max="1" data-placeholder="Rechercher un Diffuseur" data-multiSelect="<?php echo $listdiffuseur; ?>" >
                <?php
                if ($diffuseur) {
                  echo "<input name='diffuseur__societe' type='hidden' value=\"".htmlspecialchars($diffuseur)."\">";
                }else{
                  echo "<input name='diffuseur__societe' type='hidden'>";
                };
                ?>
              </div>
            </div>
          </div>
        </div>


        <?php
        /**
        * Informations concernant les rétrocessions d’honoraires
        */
        ?>

        <div class="accordion col l12">
          <div class="accordion__titre">
            <h2 class="subheading">Rétrocessions d’honoraires</h2>
            <div class="accordion__icon">
              <?php include './assets/img/inline-icon_arrow_accordion.svg.php'; ?>
            </div>
          </div>
          <div class="accordion__container">
            <div class="form__slider-container">
              <p class="lead_paragraph">Êtes-vous plusieurs Artistes-Auteurs à travailler sur ce projet ?</p>
              <span>Non</span>
              <label class="switch">
                <input name="retrocession" type="checkbox">
                <span class="slider  is--fullsize round"></span>
              </label>
              <span>Oui</span>
            </div>
            <div class="form__slider-container">
              <p class="lead_paragraph">Êtes-vous le porteur du projet ? Est-ce vous qui allez facturer au diffuseur ?</p>
              <span>Non</span>
              <label class="switch">
                <input name="porteurduprojet" type="checkbox">
                <span class="slider  is--fullsize round"></span>
              </label>
              <span>Oui</span>
            </div>
            <div class="form__input-container body">
              <div class="form__input-half directorist-select directorist-select-multi" <?php if($row["artiste__id"]): ?>data-default="['<?php echo addslashes($row["artiste__id"]) ?>']"<?php endif; ?> id="multi--artistes" data-isSearch="true" data-placeholder="Rechercher un Artiste" data-multiSelect="<?php echo $listartiste; ?>">
                <input name="artiste__societe" type="hidden" value="">
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>

  <?php endwhile; ?>
<?php else: ?>
  <section>
    <div class="col l12">
      <p>Chef, on n'a pas trouvé de projets...</p>
    </div>
  </section>
<?php endif; $conn->close(); ?>


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
