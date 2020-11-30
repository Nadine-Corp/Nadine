<?php include 'header.php'; ?>


<?php
  date_default_timezone_set('UTC');
  $today = date("Y-m-d");
  setlocale(LC_TIME, "fr_FR","French");
  $date = strftime("%d %B %Y", strtotime($today));
 ?>


<section class="row">
  <div class="col l12">
    <h1 class="display1">Ajouter un nouveau projet</h1>
  </div>
  <div class="col l12">
    <form class="form" action="./core/add__projet.php" method="post">
      <div class="form__input-container">
        <input type="text" name="nom_du_projet" placeholder="Nom du projet" class="form__input-full">
        <input type="text" name="numero_du_projet" placeholder="Numéro du projet" class="form__input-half form__input-seperator" disabled>
        <input type="date" name="date_de_creation" placeholder="Date de création" class="form__input-half" value="<?php echo $today; ?>">
        <input type="text" name="diffuseur__societe" placeholder="Diffuseur" list="diffuseurs" class="form__input-full">
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
<?php include 'footer.php'; ?>
