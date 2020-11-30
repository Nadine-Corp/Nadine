<?php include './header.php'; ?>


<?php $sql = "SELECT * FROM profil ORDER BY profil__id DESC LIMIT 1;"; ?>
<?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
<?php if ($result->num_rows > 0): ?>
<?php while($row = $result->fetch_assoc()):?>

<section class="row">
  <div class="col l12">
    <h1 class="display1">Options</h1>
  </div>
  <form class="form" action="./core/add__profil.php" method="post">
    <div class="col l12">
      <h2 class="headline">Message Devis</h1>
    </div>
    <div class="col l12">
      <div class="form__input-container">
        <textarea></textarea>
      </div>
    </div>
    <div class="col l12">
      <h2 class="headline">Message Facture</h1>
    </div>
    <div class="col l12">
      <div class="form__input-container">
        <textarea></textarea>
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
