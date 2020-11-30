
<style>
*{
  font-family: sans-serif;
}

</style>

<?php $devis__id = $_GET['devis__id']; ?>
<?php $sql = "SELECT * FROM Devis WHERE Devis.devis__id='".$devis__id."'"; ?>
<?php include './core/query.php'; $result = $conn->query($sql) or die($conn->error); ?>
<?php if ($result->num_rows > 0): ?>
<?php while($row = $result->fetch_assoc()):?>


        <p>Bonjour <?php echo $row["diffuseur__civilite"] ?> <?php echo $row["diffuseur__nom"] ?>
        <p>Vous trouverez ci-joint notre proposition commerciale pour <i><?php echo $row["projet__nom"] ?></i>.</p>



        <p><br><br>Nous restons à votre disposition pour toutes questions.
        <br>Bonne journée.
        <br>Yoko & Rémi</p>


        <p><br><br></p>
        <p>Objet :</p>
        <p>Devis → <?php echo $row["projet__nom"] ?></p>
        <p><br><br></p>
        <p>Email :</p>
        <p><?php echo $row["diffuseur__email"] ?></p>



<?php endwhile; ?>
<?php else: ?>
<p>Chef, on a rien trouvé ici...</p>
<?php endif; $conn->close(); ?>
