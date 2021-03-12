<?php include './header.php'; ?>

<section class="row">
  <div class="col l12">
    <h1 class="display1">Liste des diffuseurs</h1>
  </div>
  <div class="col l12">
  <?php $sql = "SELECT * FROM Diffuseurs"; ?>
  <?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
  <?php if ($result->num_rows > 0): ?>
    <table class="table body">
      <tr>
        <th>#Société</th>
        <th>#Siret</th>
        <th>#Prénom</th>
        <th>#Nom</th>
        <th>#Téléphone</th>
        <th>#Email</th>
        <th>#Modifier</th>
      </tr>
      <?php while($row = $result->fetch_assoc()):?>
        <tr onclick="document.location = 'diffuseur__modifier?__id=<?php echo $row["diffuseur__id"] ?>';">
          <td><?php echo $row["diffuseur__societe"] ?></td>
          <td><?php echo $row["diffuseur__siret"] ?></td>
          <td><?php echo $row["diffuseur__prenom"] ?></td>
          <td><?php echo $row["diffuseur__nom"] ?></td>
          <td><?php echo $row["diffuseur__telephone"] ?></td>
          <td><a href="mailto:<?php echo $row["diffuseur__email"] ?>"><?php echo $row["diffuseur__email"] ?></a></td>
          <td><a href="diffuseur__modifier?__id=<?php echo $row["diffuseur__id"] ?>">Modifier</a></td>
        </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
      <p>Chef, on a pas trouvé de s...</p>
  <?php endif; $conn->close(); ?>
</div>
<div class="col l12">
  <button href="./diffuseur__new" class="btn btn--plain">Ajouter un diffuseur</button>
</div>
</section>

<?php include './footer.php'; ?>
