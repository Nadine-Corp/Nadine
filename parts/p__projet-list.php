<?php

// Ce fichier permet de controler l'affichage d'un projet
// dans les listes de projets comme sur les pages Projets ou Bilan

?>

<article class="p-projet__single <?php the_projet_class($row) ?>">
  <a href="projet__single.php?projet__id=<?php the_projet_id($row) ?>">
    <div class="l-projets__thumbnail">
      <?php the_projet_thumbnail($row) ?>
    </div>
    <div class="m-col">
      <h2 class="l-projets__name m-body-l"><?php the_projet_name($row) ?></h2>
      <span class="l-projets__date m-body-s"><?php the_projet_date($row) ?></span>
    </div>
    <div class="m-col">
      <span class="l-projets__diffuseur-societe m-body-l"><?php the_diffuseur_societe($row) ?></span>
      <span class="l-projets__diffuseur-nom m-body-s"><?php the_diffuseur_name($row) ?></span>
    </div>
    <div class="m-col">
      <span class="l-projets__diffuseur-societe m-body-l"><?php the_projet_last_ht($row) ?></span>
      <span class="l-projets__diffuseur-nom m-body-s"><?php the_projet_last_total_auteur($row) ?></span>
    </div>
    <div class="l-projets__statut">
      <span class="m-body-s"><?php the_projet_statut($row) ?></span>
    </div>
  </a>
</article>