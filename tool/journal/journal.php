<?php include './../../header.php'; ?>

<main class="l-log">
  <section class="row cover bg__is--gradient">
    <div class="col l6">
      <h1 class="display1 is--center">Journal de dévéloppement</h1>
      <p class="body">
        <a href="http://methodic.design/">methodic.design</a> est constamant mise à jour. Si vous avez une idée pour amélioré le design ou certaine fonction, n'hésitez pas à envoyer un message à <a href="mailto:hello@methodic.design">hello@methodic.design</a>.
      </p>
      <?php if (($handle = fopen("journal.csv", "r")) !== FALSE): ?>
        <table>
          <?php while (($data = fgetcsv($handle, 1000, ";")) !== FALSE):
              $num = count($data);
              echo "<tr>";
              for ($c=0; $c < $num; $c++) {
                  echo "<td>".$data[$c]."</td>";
              }
              echo "</tr>"; ?>
        <?php endwhile; ?>
        </table>
      <?php fclose($handle); endif; ?>
    </div>
    <div class="col l6">

    </div>
  </section>
</main>

<?php include '../../footer.php'; ?>
