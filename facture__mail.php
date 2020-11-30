
<style>
*{
  font-family: sans-serif;
}

</style>

<?php $facture__id = $_GET['facture__id']; ?>
<?php $sql = "SELECT * FROM Factures WHERE Factures.facture__id='".$facture__id."'"; ?>
<?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
<?php if ($result->num_rows > 0): ?>
<?php while($row = $result->fetch_assoc()):?>


        <p>Bonjour <?php echo $row["diffuseur__civilite"] ?> <?php echo $row["diffuseur__nom"] ?>
        <p>Vous trouverez ci-joint la facture pour <i><?php echo $row["projet__nom"] ?></i>.<br><br></p>

        <p><b>Attention :</b> pour vous, j'ai choisi d'être à <a href="http://www.secu-artistes-auteurs.fr/" target="_blank">la Maison des Artistes</a>. Mes charges étant peu élevées, je peux vous proposer des tarifs extrêmement compétitifs. En échange, vous devez prendre 5 min pour faire un peu de paperasse :
        <ol>
          <li>Régler par virement ce que vous me devez</li>
          <li>RDV sur le site dédié de l'URSAAF pour la Maison des Artistes afin de <a href="https://www.artistes-auteurs.urssaf.fr/accueil" target="_blank">créer votre compte</a></li>
          <li>Renseigner la <strong>Nature de l’œuvre réalisée : créations graphiques</strong> et mon <strong>N° de Sécu : 1 87 03 49 328 016 76</strong></li>
          <li>Régler par carte bancaire se que vous devez à l'URSAAF</li>
        </ol>
        <p><b>↳ Plus d'info :</b> <a href="http://www.secu-artistes-auteurs.fr/diffuseurs-arts-graphiques-plastiques/" target="_blank">www.secu-artistes-auteurs.fr</a></p>

        <p><br><br>Règlement par virement bancaire :
        <br><b>Titulaire du compte :</b> M. Rémi BOUVET
        <br><b>IBAN :</b>  DE88 1001 1001 2627 7648 96 
        <br><b>BIC :</b> NTSBDEB1XXX</p>

        <p><br><br>Je reste à votre disposition pour toutes questions.
        <br>Bonne journée.
        <br>— r.</p>


        <p><br><br></p>
        <p>Objet :</p>
        <p>Facture → <?php echo $row["projet__nom"] ?></p>
        <p><br><br></p>
        <p>Email :</p>
        <p><?php echo $row["diffuseur__email"] ?></p>



<?php endwhile; ?>
<?php else: ?>
<p>Chef, on a rien trouvé ici...</p>
<?php endif; $conn->close(); ?>
