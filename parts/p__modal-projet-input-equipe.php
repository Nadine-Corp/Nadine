<?php

// Ce fichier permet de controler l'affichage du champs
// permettant d'ajouter un Artistes-Auteurs à un projet
// à partir de la modale p__modal-projet

// Séparer ce fichier permet d'utiliser plus facilement
// la fonction the_projet_input_equipe()

nadine_log("Nadine ouvre le fichier p__modal-projet-input-equipe.php");


if (!isset($artisteNb)) {
  $artisteNb = 1;
}
$inputName = 'artiste__' . $artisteNb;
?>

<div class="m-form__label m-form__select-list m-form__with-btn m-form__artiste">
  <select name="<?php echo $inputName ?>" data-selected="<?php echo $artiste__id ?>">
    <?php the_artistes_list(); ?>
  </select>
  <button class="btn btn__outline btn__ico" type="button"><?php include(__DIR__ . '/../assets/img/ico_modifier.svg.php'); ?></button>
  <button class="btn btn__outline btn__ico btn__remove-artiste" type="button"><?php include(__DIR__ . '/../assets/img/ico_enlever.svg.php'); ?></button>
</div>