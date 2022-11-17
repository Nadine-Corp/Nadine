<?php include './header.php'; ?>



<section class="toolbar is--sticky">
  <div class="toolbar__container">
    <h1 class="m-lead">Liste des diffuseurs</h1>
    <div class="toolbar__btn">
      <a href="./diffuseur__new.php" class="btn btn__plain">Ajouter un diffuseur</a>
    </div>
  </div>
</section>


<section class="m-rom">
  <div class="m-col">
  <?php $sql = "SELECT * FROM Diffuseurs"; ?>
  <?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
  <?php if ($result->num_rows > 0): ?>
    <table class="m-table m-body">
      <thead>
        <tr>
          <th>Société</th>
          <th>Siret</th>
          <th>Prénom</th>
          <th>Nom</th>
          <th>Téléphone</th>
          <th>Email</th>
          <th>Modifier</th>
        </tr>
      </thead>
      <tbody>
      <?php while($row = $result->fetch_assoc()):?>
        <tr onclick="document.location = 'diffuseur__modifier.php?diffuseur__id=<?php echo $row["diffuseur__id"] ?>';">
          <td><?php echo $row["diffuseur__societe"] ?></td>
          <td><?php echo $row["diffuseur__siret"] ?></td>
          <td><?php echo $row["diffuseur__prenom"] ?></td>
          <td><?php echo $row["diffuseur__nom"] ?></td>
          <td><?php echo $row["diffuseur__telephone"] ?></td>
          <td><a href="mailto:<?php echo $row["diffuseur__email"] ?>"><?php echo $row["diffuseur__email"] ?></a></td>
          <td><a href="diffuseur__modifier.php?diffuseur__id=<?php echo $row["diffuseur__id"] ?>">Modifier</a></td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
      <p>Chef, on n'a pas trouvé de Diffuseurs...</p>
  <?php endif; $conn->close(); ?>
</div>
</section>

<?php include './footer.php'; ?>
