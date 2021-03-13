<?php include 'header.php'; ?>


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
      ?>

      <form class="form" action="./core/modifier__projet.php" method="post">
        <div class="form__input-container">
          <input type="hidden" name="projet__id" placeholder="Id Projet" class="form__input-half" value="<?php echo $row["projet__id"] ?>">
          <input type="text" name="nom_du_projet" placeholder="Nom du projet" class="form__input-half form__input-seperator" value="<?php echo $row["projet__nom"] ?>">
          <input type="text" name="diffuseur__societe" placeholder="" list="diffuseurs" class="form__input-half" value="<?php echo $row["diffuseur__societe"] ?>">
          <input type="text" name="numero_du_projet" placeholder="Numéro du projet" class="form__input-half form__input-seperator" disabled>
          <input list="statut" name="projet__statut" placeholder="Statut" class="form__input-half" value="<?php echo $row["projet__statut"] ?>">
          <input type="date" name="date_de_creation" placeholder="Date de création" class="form__input-half form__input-seperator" value="<?php echo $row["projet__date_de_creation"] ?>">
          <input type="date" name="date_de_fin" placeholder="Date de fin" class="form__input-half" value="<?php echo $row["projet__date_de_fin"] ?>">
        </div>
          <button href="./projets" class="btn btn--outline">Annuler</button>
          <button href="./core/supprimer.php?base=projets&cible=projet__id&id=<?php echo $projet__id ?>" class="btn btn--outline">Supprimer le Projet</button>
          <input type="submit" name="Enregistrer" value="Enregistrer" class="btn btn--plain">
      </form>

    <?php endwhile; ?>
    <?php else: ?>
      <p>Chef, on a pas trouvé de projets...</p>
    <?php endif; $conn->close(); ?>
  </div>
</section>

<datalist id="statut">
  <option value="Projet en cours">
  <option value="Projet terminé">
  <option value="Projet annulé">
</datalist>

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




<?php include 'footer.php'; ?>
