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
      <h1 class="m-headline">Suivi</h1>
    </div>

    <?php
    /**
     * Liste des devis
     */
    ?>

    <div class="m-col l6">
      <?php $sql = "SELECT * FROM Devis WHERE devis__statut = 'Envoyé' AND devis__corbeille = 0 OR devis__statut = 'Relancé' AND devis__corbeille = 0"; ?>
      <?php include './core/query.php';
      $result = $conn->query($sql) or die($conn->error); ?>
      <?php if ($result->num_rows > 0) : ?>
        <h2 class="m-lead">Devis non signés</h2>
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
      <?php else : msg_nothing('Aucun devis en attente', "Cette section centralise tous les <i>Devis</i> ayant le statut <i>« Envoyé » ou « Relancé »</i>.");
      endif;
      $conn->close(); ?>
    </div>


    <?php
    /**
     * Liste des factures
     */
    ?>

    <div class="m-col l6">
      <?php $thisYear = date("Y") ?>
      <?php $sql = "SELECT * FROM Factures WHERE facture__statut = 'Envoyée' OR facture__statut = 'Relancé'"; ?>
      <?php include './core/query.php';
      $result = $conn->query($sql) or die($conn->error); ?>
      <?php if ($result->num_rows > 0) : ?>
        <h2 class="m-lead">Factures impayées</h2>
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
      <?php else : msg_nothing('Aucun factures impayées', "Nadine n'a trouvé aucune <i>Facture</i> avec le statut <i>« Envoyé » ou « Relancé »</i> dans la <i>Base de données</i>.");
      endif;
      $conn->close(); ?>
    </div>


  </section>
  <?php include './footer.php'; ?>