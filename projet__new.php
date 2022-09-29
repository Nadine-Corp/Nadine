<?php include './header.php'; ?>

<?php
date_default_timezone_set('UTC');
$today = date("Y-m-d");
setlocale(LC_TIME, "fr_FR","French");
$date = strftime("%d %B %Y", strtotime($today));




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

<form class="form" action="./core/add__projet.php" method="post">

  <section class="toolbar is--sticky">
    <div class="toolbar__container">
      <h1 class="display1">Ajouter un nouveau projet</h1>
      <div class="toolbar__btn">
        <a href="./projets.php" class="btn btn--outline">Annuler</a>
        <input type="submit" name="Enregistrer" value="Enregistrer" class="btn btn--plain">
      </div>
    </div>
  </section>

  <section class="row">
    <div class="accordion col l12">
      <div class="accordion__titre">
        <h2 class="subheading">Informations générales</h2>
        <div class="accordion__icon">
          <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
        </div>
      </div>
      <div class="accordion__container">
        <div class="form__input-container body">
          <input type="text" name="nom_du_projet" placeholder="Nom du projet" class="form__input-full">
          <input type="text" name="numero_du_projet" placeholder="Numéro du projet" class="form__input-half form__input-seperator" disabled>
          <input type="date" name="date_de_creation" placeholder="Date de création" class="form__input-half" value="<?php echo $today; ?>">
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
          <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
        </div>
      </div>
      <div id="l-projet__diffuseurs-accordion" class="accordion__container">
        <div class="form__slider-container">
          <p class="lead_paragraph">Est-ce une vente à un particulier ou un galeriste ou une société étrangère ?</p>
          <span>Non</span>
          <label class="switch">
            <input name="precompte" type="checkbox">
            <span class="slider  is--fullsize round"></span>
          </label>
          <span>Oui</span>
        </div>
        <div class="form__input-container body">
          <div class="form__input-half form__input-seperator directorist-select directorist-select-multi" id="multi--diffuseurs" data-isSearch="true" data-max="1" data-placeholder="Rechercher un Diffuseur" data-multiSelect="<?php echo $listdiffuseur; ?>" >
            <input name="diffuseur__societe" type="hidden">
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
          <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
        </div>
      </div>
      <div  id="l-projet__retrocessions-accordion"  class="accordion__container">
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
          <p class="lead_paragraph">Êtes-vous le porteur du projet ? Allez-vous facturer au diffuseur ?</p>
          <span>Non</span>
          <label class="switch">
            <input name="porteurduprojet" type="checkbox" checked>
            <span class="slider  is--fullsize round"></span>
          </label>
          <span>Oui</span>
        </div>
        <div class="form__input-container body">
          <div class="form__input-half directorist-select directorist-select-multi" id="multi--artistes" data-isSearch="true" data-placeholder="Rechercher un Artiste" data-multiSelect="<?php echo $listartiste; ?>">
            <input name="artiste__societe" type="hidden">
          </div>
        </div>
      </div>

    </form>
  </section>


  <script src="./assets/js/multiple-select.js"></script>
  <script>
  pureScriptSelect('#multi--diffuseurs');
  pureScriptSelect('#multi--artistes');
</script>

<?php include 'footer.php'; ?>
