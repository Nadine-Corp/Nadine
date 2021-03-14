<?php include 'header.php'; ?>


<?php
date_default_timezone_set('UTC');
$today = date("Y-m-d");
setlocale(LC_TIME, "fr_FR","French");
$date = strftime("%d %B %Y", strtotime($today));


// Créer la liste des diffuseurs

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
  echo $listdiffuseur;
else:
  $listdiffuseur = "Aucun Diffuseur. Rien. Quel dalle. Nada.";
endif; $conn->close();

// Créer la liste des artistes

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
  echo $listartiste;
else:
  $listdiffuseur = "Aucun Diffuseur. Rien. Quel dalle. Nada.";
endif; $conn->close();
?>











<section class="row">
  <div class="col l12">
    <h1 class="display1">Ajouter un nouveau projet</h1>
  </div>
  <div class="col l12">
    <form class="form body" action="./core/add__projet.php" method="post">
      <div class="form__input-container">
        <input type="text" name="nom_du_projet" placeholder="Nom du projet" class="form__input-full">
        <input type="text" name="numero_du_projet" placeholder="Numéro du projet" class="form__input-half form__input-seperator" disabled>
        <input type="date" name="date_de_creation" placeholder="Date de création" class="form__input-half" value="<?php echo $today; ?>">
        <input type="text" name="diffuseur__societe" placeholder="Diffuseur" list="diffuseurs" class="form__input-full">
      </div>

      <h2 class="headline">Ici, on test des trucs. Merci de ne pas toucher.</h1>
        <div class="form__input-container">
          <div class="form__input-half form__input-seperator directorist-select directorist-select-multi" id="multiSelect1" data-isSearch="true" data-max="1" data-multiSelect="<?php echo $listdiffuseur; ?>" >
            <input type="hidden">
          </div>

          <div class="form__input-half directorist-select directorist-select-multi" id="multiSelect" data-isSearch="true" data-multiSelect="<?php echo $listartiste; ?>" >
            <input type="hidden">
          </div>
        </div>
        <a href="./projets" class="btn btn--outline">Annuler</a>
        <input type="submit" name="Enregistrer" value="Enregistrer" class="btn btn--plain">
      </form>
    </div>
  </section>


  <datalist id="diffuseurs">
    <?php $sql = "SELECT * FROM Diffuseurs"; ?>
    <?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>

    <?php if ($result->num_rows > 0) : ?>
      <?php while($row = $result->fetch_assoc()): ?>
        <option value="<?php echo $row["diffuseur__societe"] ?>">
        <?php endwhile; ?>
      <?php else: ?>
        <p>Chef, on pas trouvé de diffuseurs...</p>
      <?php endif; $conn->close(); ?>
    </datalist>




    <script src="./assets/js/multiple-select.js"></script>
    <script>
      pureScriptSelect('#multiSelect1');
      pureScriptSelect('#multiSelect');
    </script>

    <?php include 'footer.php'; ?>
