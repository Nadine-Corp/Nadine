<?php

// Ce fichier permet à Nadine de traquer plus facilement
// les mauvais payeurs et les devis qui trainent un peu.


/**
 * Ajout du Header
 */

include(__DIR__ . '/header.php');
?>

<main class="l-suivi" role="main">
  <section class="m-rom">
    <div class="m-col">
      <h1 class="m-lead">Suivi</h1>
    </div>

    <?php
    /**
     * Liste des devis
     */
    ?>

    <div class="m-col l6">
      <h2 class="m-headline">Devis non signés</h2>
      <?php $thisYear = date("Y") ?>
      <?php $sql = "SELECT * FROM Devis WHERE devis__statut = 'Envoyé' "; ?>
      <?php include './core/query.php';
      $result = $conn->query($sql) or die($conn->error); ?>
      <?php if ($result->num_rows > 0) : ?>
        <table class="m-table m-body">
          <thead>
            <tr>
              <th>N°</th>
              <th>Nom du projet</th>
              <th></th>
              <th>Voir</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
              <tr onclick="document.location = 'projet__single.php?projet__id=<?php echo $row["projet__id"] ?>';">
                <td><?php echo $row["devis__numero"] ?></td>
                <td><?php echo $row["projet__nom"] ?></td>
                <td><?php echo $row["diffuseur__societe"] ?></td>
                <td><a href="./projet__single.php?projet__id=<?php echo $row["projet__id"] ?>">Voir</a></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      <?php else : ?>
        <p>Chef, on n'a pas trouvé de devis en attente...</p>
      <?php endif;
      $conn->close(); ?>
    </div>


    <?php
    /**
     * Liste des factures
     */
    ?>

    <div class="m-col l6">
      <h2 class="m-headline">Factures impayées</h2>
      <?php $thisYear = date("Y") ?>
      <?php $sql = "SELECT * FROM Factures WHERE facture__statut = 'Envoyée' "; ?>
      <?php include './core/query.php';
      $result = $conn->query($sql) or die($conn->error); ?>
      <?php if ($result->num_rows > 0) : ?>
        <table class="m-table m-body">
          <thead>
            <tr>
              <th>N°</th>
              <th>Nom du projet</th>
              <th></th>
              <th>Voir</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
              <tr onclick="document.location = 'projet__single.php?projet__id=<?php echo $row["projet__id"] ?>';">
                <td><?php echo $row["facture__numero"] ?></td>
                <td><?php echo $row["projet__nom"] ?></td>
                <td><?php echo $row["diffuseur__societe"] ?></td>
                <td><a href="./projet__single.php?projet__id=<?php echo $row["projet__id"] ?>">Voir</a></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      <?php else : ?>
        <p>Chef, on n'a pas trouvé de factures impayées...</p>
      <?php endif;
      $conn->close(); ?>
    </div>


  </section>
  <?php include './footer.php'; ?>