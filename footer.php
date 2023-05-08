<?php

// Ce fichier est le dernier a être exécuter lors de la construction
// des pages. C'est ici que tout s'arrête.



/**
 * Ajout du Footer
 */

// Permet d'injecter des parts à la fin du main. 
?>
</main>



<footer class="l-footer">
	<?php
	/**
	 * Injection de l'Overlay Universel
	 */

	// Cette modale div.m-overlay permet à Nadine de recouvrir l'écran.
	// C'est utile lorsqu'elle veut afficher une modal par exemple.

	?>
	<div class="m-overlay is--fullsize"></div>


	<?php
	/**
	 * Ajout du reste du footer
	 */
	?>

	<script src="./assets/js/tablesorter.min.js"></script>
	<script src="./assets/js/nadine.js"></script>
</footer>

</body>

</html>