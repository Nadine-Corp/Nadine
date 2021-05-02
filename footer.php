<?php

// Ce fichier est le dernier a être exécuter lors de la construction
// des pages. C'est ici que tout s'arrête.



/**
* Récuparation du dernier Numéros de version de Nadine.
*/
if (($journal = fopen("./assets/csv/journal.csv", "r")) !== FALSE):
	$numVersion = array();
	while (($data = fgetcsv($journal, 10000, ";")) !== FALSE):
		$numVersion[] = $data;
	endwhile;
	fclose($journal);

	// Extraire le dernier numéros de version du journal
	$numVersion = $numVersion[1][0];
endif;


	/**
	* Injection de la modale de confirmation
	*/

	// Cette modale est cachée. Elle s'affiche de temps en temps
	// pour que l'utilisateur confirme quelques chose.

	include './parts/modal__doyouconfirm.php';



	/**
	* Injection du message pour Smartphone
	*/

	// Cette modale est cachée. Elle s'affiche lorsque l'utilsaeur utiliser
	// un smartphone pour lui conseiler de bien vouloir utiliser
	// Nadine uniqument sur ses ordinateurs.

	include './parts/msg__msg-smartphone.php';
	?>



</main>
<footer class="l-footer row">
	<p class="col body">
		<strong>Numéro de version :</strong> Nadine Alpha <?php echo $numVersion;?>  | 	<a href="https://github.com/Nadine-Corp/Nadine/commits/main" target="_blank">Pensez à mettre à jour Nadine de temps en temps.</a>
			<br><a href="./log">Nadine travaille tellement dur pour s'améliorer !</a>
		</p>
	<p class="col body"><a href="https://discord.gg/Fg2m8gvdWR" target="_blank">Conseillez Nadine : rejoingnez le NadineClub©</a></p>
	<script src="./assets/js/tablesorter.min.js"></script>
	<script src="./assets/js/nadine.js"></script>
</footer>

</body>
</html>
