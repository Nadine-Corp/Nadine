<?php

// Ce fichier permet de controler l'affichage d'un projet
// dans les listes de projets comme sur la page Projets.

?>

<?php
if ( !empty( $row["projet__date_de_fin"] ) ):
  $date_de_fin = date_create($row["projet__date_de_fin"]);
  $date_de_fin = date_format($date_de_fin, 'M. Y');
else:
  $date_de_fin = "-";
endif;

$date_de_debut = date_create($row["projet__date_de_creation"]);
$date_de_debut = date_format($date_de_debut, 'M. Y');
?>


<article class="l-projets__projet <?php the_projet_class($row) ?>">
  <a href="projet__single.php?projet__id=<?php the_projet_id($row) ?>">
    <div class="l-projets__thumbnail">
      <?php the_projet_thumbnail($row) ?>
    </div>
    <div class="col m6">
      <h2 class="l-projets__name lead_para"><?php the_projet_name($row) ?></h2>
      <span class="l-projets__date caption"><?php the_projet_name($row) ?></span>
    </div>

  </a>
</article>
