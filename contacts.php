<?php

// C'est grâce à ce fichier que seront tous vos merveilleux
// collaborateurs, amis, artistes et diffuseurs


/**
* Ajout du Header
*/

include './header.php';
?>

<main class="l-contacts" role="main">

<?php
/**
* Aside
*/
?>

<aside class="m-aside">
  <h1 class="m-headline">Contacts</h1>
  <a href="./p__modal-contacts" class="btn btn__big btn__plain btn__modal" data-modal='contact'>
    <div class="btn__big-ico"><?php include './assets/img/ico_ajouter--plain.svg.php'; ?></div>
    <div class="btn__big-txt">
      <span class="m-lead m-ss">Ajouter</span>
      <span class="m-body-l">Contact</span>
    </div>
  </a>
  <div class="m-accordion is--active">
    <div class="m-accordion__titre">
      <span class="m-lead">Filtres</span>
      <div class="m-accordion__ico">
        <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
      </div>
    </div>
    <div class="m-accordion__wrapper">
      <form class="m-form">
        <div class="m-form__radio-vert">
          <div class="m-form__radio m-body">
            Tous les contacts
            <input type="radio" name="grouper" checked="checked">
            <span class="checkmark"></span>
          </div>
          <div class="m-form__radio m-body">
            Diffuseurs
            <input type="radio" name="grouper" >
            <span class="checkmark"></span>
          </div>
          <div class="m-form__radio m-body">
            Particuliers
            <input type="radio" name="grouper" >
            <span class="checkmark"></span>
          </div>
          <div class="m-form__radio m-body">
            Par Artistes-Auteurs
            <input type="radio" name="grouper" >
            <span class="checkmark"></span>
          </div>
        </div>
      </form>
    </div>
  </div>
</aside>


<?php
/**
* Liste des Contacts
*/
?>
<section class="m-rom with--aside">
  <div class="l-contacts__list">
    <?php
    $args = array(
      'FROM'     => 'Diffuseurs, Artistes'
    );

    $sql = "SELECT * FROM Diffuseurs LEFT OUTER JOIN Artistes ON diffuseur__id = artiste__nom UNION SELECT * FROM Diffuseurs RIGHT OUTER JOIN Artistes ON diffuseur__id = artiste__nom";
    $loop = nadine_query($args, $sql);
    ?>

    <?php if ($loop->num_rows > 0): ?>
      <?php while($row = $loop->fetch_assoc()): ?>
        <?php include './parts/p__contacts-single.php'; ?>
      <?php endwhile; ?>
    <?php else: ?>
      <p>Chef, on n'a pas trouvé de contacts</p>
    <?php endif;?>
  </div>
</section>


<?php
/**
* Ajout des modales
*/

include './parts/p__modal-contacts.php';


/**
* Ajout du Footer
*/

include './footer.php';
