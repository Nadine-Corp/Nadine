<?php

// Ce fichier permet de controler l'affichage d'un projet
// dans les listes de projets comme sur la page Projets.

?>

<article class="l-projets__projet <?php the_projet_class($row) ?>">
  <a href="projet__single.php?projet__id=<?php the_projet_id($row) ?>">
    <div class="l-projets__thumbnail">
      <?php the_projet_thumbnail($row) ?>
    </div>
    <div class="col">
      <h2 class="l-projets__name lead_para"><?php the_projet_name($row) ?></h2>
      <span class="l-projets__date caption"><?php the_projet_date($row) ?></span>
    </div>
    <div class="col">
      <span class="l-projets__diffuseur-societe lead_para"><?php the_diffuseur_societe($row) ?></span>
      <span class="l-projets__diffuseur-nom caption"><?php the_diffuseur_nom($row) ?></span>
    </div>
    <div class="l-projets__statut">
      <span class="caption"><?php the_projet_statut($row) ?></span>
    </div>
  </a>
</article>
