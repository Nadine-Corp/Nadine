<?php include './header.php'; ?>

<section class="row">
  <div class="col l12">
    <h1 class="display1">Liste des artistes</h1>
  </div>
  <div class="col l12">
  <?php $sql = "SELECT * FROM Artistes"; ?>
  <?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
  <?php if ($result->num_rows > 0): ?>
    <table class="table">
      <tr>
        <th>#Société</th>
        <th>#b° Mda</th>
        <th>#Prénom</th>
        <th>#Nom</th>
        <th>#Téléphone</th>
        <th>#Email</th>
        <th>#Modifier</th>
      </tr>
      <?php while($row = $result->fetch_assoc()):?>
        <tr onclick="document.location = 'artiste__modifier?__id=<?php echo $row["artiste__id"] ?>';">
          <td><?php echo $row["artiste__societe"] ?></td>
          <td><?php echo $row["artiste__numero_mda"] ?></td>
          <td><?php echo $row["artiste__prenom"] ?></td>
          <td><?php echo $row["artiste__nom"] ?></td>
          <td><?php echo $row["artiste__telephone"] ?></td>
          <td><a href="mailto:<?php echo $row["artiste__email"] ?>"><?php echo $row["artiste__email"] ?></a></td>
          <td><a href="artiste__modifier?__id=<?php echo $row["artiste__id"] ?>">Modifier</a></td>
        </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
      <p>Chef, on a pas trouvé d'Artistes...</p>
  <?php endif; $conn->close(); ?>
</div>
<div class="col l12">
  <a href="./artiste__new" class="btn btn--plain">Ajouter un artiste</a>
</div>
</section>

<?php include './footer.php'; ?>
