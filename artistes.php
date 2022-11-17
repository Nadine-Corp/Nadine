<?php include './header.php'; ?>


<section class="toolbar is--sticky">
  <div class="toolbar__container">
    <h1 class="m-lead">Liste des artistes</h1>
    <div class="toolbar__btn">
      <a href="./artiste__new.php" class="btn btn__plain">Ajouter un artiste</a>
    </div>
  </div>
</section>
<section class="m-rom">
  <div class="m-col">
    <?php $sql = "SELECT * FROM Artistes"; ?>
    <?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
    <?php if ($result->num_rows > 0): ?>
      <table class="m-table m-body">
        <thead>
          <tr>
            <th>Société</th>
            <th>N° Mda</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Modifier</th>
          </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()):?>
          <tr onclick="document.location = 'artiste__modifier.php?__id=<?php echo $row["artiste__id"] ?>';">
            <td><?php echo $row["artiste__societe"] ?></td>
            <td><?php echo $row["artiste__numero_mda"] ?></td>
            <td><?php echo $row["artiste__prenom"] ?></td>
            <td><?php echo $row["artiste__nom"] ?></td>
            <td><?php echo $row["artiste__telephone"] ?></td>
            <td><a href="mailto:<?php echo $row["artiste__email"] ?>"><?php echo $row["artiste__email"] ?></a></td>
            <td><a href="artiste__modifier.php?__id=<?php echo $row["artiste__id"] ?>">Modifier</a></td>
          </tr>
        <?php endwhile; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>Chef, on n'a pas trouvé d'Artistes...</p>
    <?php endif; $conn->close(); ?>
  </div>
</section>

<?php include './footer.php'; ?>
