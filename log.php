<?php

  // Ce fichier permet d'afficher le journal de developpement.
  // Chaque mise à jour est consignée dans le fichier
  // ./assets/csv/journal.csv
?>


<?php include './header.php'; ?>

<section class="m-rom">
  <div class="m-col">
    <h1 class="m-lead">Journal de dévéloppement</h1>
    <p>Nadine est constamant mise à jour : vérifiez de temps en temps qu'une nouvelle version n'est pas sortie sur <a href="https://github.com/Nadine-Corp/Nadine/commits/main" target="_blank">github.com/Nadine-Corp</a>. Vous pouvez aussi partager vos idées pour améliorer le design ou certaines fonctions : n'hésitez pas à envoyer un message à <a href="mailto:bonjour@nadinecorp.net">bonjour@nadinecorp.net</a> ou passer au <a href="https://discord.gg/Fg2m8gvdWR" target="_blank">NadineClub©</a>.</p>
  </div>
  <div class="m-col">

    <?php if (($journal = fopen("./assets/csv/journal.csv", "r")) !== FALSE): ?>
      <table class="m-table m-body">
        <thead>
          <tr>
            <th width="10%">Version</th>
            <th width="10%">Date</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <?php while (($data = fgetcsv($journal, 10000, ";")) !== FALSE):
            $num = count($data);
            echo "<tr>";
            for ($c=0; $c < $num; $c++) {
              echo "<td>".$data[$c]."</td>";
            }
            echo "</tr>"; ?>
          <?php endwhile; ?>
        </tbody>
      </table>
      <?php fclose($journal); endif; ?>
    </div>
  </section>

  <?php include './footer.php'; ?>
