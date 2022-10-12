<?php

// C'est grace à ce fichier que seront affiché la liste
// de tous vos glorieux projets. C'est donc ce fichier
// qui gère la page d'accueil de Nadine


include './header.php'; ?>


<?php
/**
* Aside
*/
?>

<aside class="m-aside">
  <h1 class="display9">Projets</h1>
  <a href="./projet__new.php" class="btn btn__big btn__plain btn__modal" data-modal='add-projet'>
    <div class="btn__big-ico"><?php include './assets/img/ico_ajouter.svg.php'; ?></div>
    <div class="btn__big-txt">
      <span class=" display1">Ajouter</span>
      <span class="lead_para">Projet</span>
    </div>
  </a>
  <div class="m-accordion is--active">
    <div class="m-accordion__titre">
      <span class="display1"> Grouper</span>
      <div class="m-accordion__ico">
        <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
      </div>
    </div>
    <div class="m-accordion__wrapper">
      <form class="m-form">
        <div class="m-form__input-container">
          <label class="m-form__btnradio body">
            Par états du projets
            <input type="radio" name="grouper" checked="checked">
            <span class="checkmark"></span>
          </label>
          <label class="m-form__btnradio body">
            Par Diffuseurs
            <input type="radio" name="grouper" >
            <span class="checkmark"></span>
          </label>
          <label class="m-form__btnradio body">
            Par Artistes-Auteurs
            <input type="radio" name="grouper" >
            <span class="checkmark"></span>
          </label>
          <label class="m-form__btnradio body">
            Par années
            <input type="radio" name="grouper" >
            <span class="checkmark"></span>
          </label>
        </div>
      </form>
    </div>
  </div>
</aside>


<?php
/**
* Liste de projets en cours
*/
?>

<section class="l-projets row with--aside">

  <div class="m-accordion is--active">
    <div class="m-accordion__titre">
      <span class="display1">Projets en cours</span>
      <div class="m-accordion__ico">
        <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
      </div>
    </div>
    <div class="l-projets__list m-accordion__wrapper">
      <?php
      $args = array(
        'FROM'     => 'Projets, Diffuseurs',
        'WHERE'    => 'Projets.diffuseur__id = Diffuseurs.diffuseur__id',
        'AND'      => 'Projets.projet__statut = "Projet en cours"',
        'ORDER BY' => 'projet__date_de_creation',
        'ORDER'    => 'DESC'
      );
      $loop = nadine_query($args);
      ?>

      <?php if ($loop->num_rows > 0): ?>
        <?php while($row = $loop->fetch_assoc()): ?>
          <?php include './parts/p__projets-single.php'; ?>
        <?php endwhile; ?>
      <?php else: ?>
        <p>Chef, on n'a pas trouvé de projets en cours...</p>
      <?php endif;?>
    </div>
  </div>


  <?php
  /**
  * Liste de projets terminés
  */
  ?>

  <div class="m-accordion">
    <div class="m-accordion__titre">
      <span class="display1">Projets terminés</span>
      <div class="m-accordion__ico">
        <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
      </div>
    </div>

    <div class="l-projets__list m-accordion__wrapper">
      <?php
      $args = array(
        'FROM'     => 'Projets, Diffuseurs',
        'WHERE'    => 'Projets.diffuseur__id = Diffuseurs.diffuseur__id',
        'AND'      => 'Projets.projet__statut = "Projet terminé"',
        'ORDER BY' => 'projet__date_de_creation',
        'ORDER'    => 'DESC'
      );
      $loop = nadine_query($args);?>
      <?php if ($loop->num_rows > 0): ?>
        <?php while($row = $loop->fetch_assoc()): ?>
          <?php include './parts/p__projets-single.php'; ?>
        <?php endwhile; ?>

      <?php else: ?>
        <p>Chef, on n'a pas trouvé de projets en terminés ou annulés...</p>
      <?php endif; ?>
    </div>
  </div>


  <?php
  /**
  * Liste de projets annulés
  */
  ?>

  <div class="m-accordion">
    <div class="m-accordion__titre">
      <span class="display1">Projets annulés</span>
      <div class="m-accordion__ico">
        <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
      </div>
    </div>

    <div class="l-projets__list m-accordion__wrapper">
      <?php
      $args = array(
        'FROM'     => 'Projets, Diffuseurs',
        'WHERE'    => 'Projets.diffuseur__id = Diffuseurs.diffuseur__id',
        'AND'      => 'Projets.projet__statut = "Projet annulé"',
        'ORDER BY' => 'projet__date_de_creation',
        'ORDER'    => 'DESC'
      );
      $loop = nadine_query($args);
      ?>

      <?php if ($loop->num_rows > 0): ?>
        <?php while($row = $loop->fetch_assoc()): ?>
          <?php include './parts/p__projets-single.php'; ?>
        <?php endwhile; ?>

      <?php else: ?>
        <p>Chef, on n'a pas trouvé de projets en terminés ou annulés...</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php include './parts/modal__projets-new.php'; ?>
<?php include './footer.php'; ?>
