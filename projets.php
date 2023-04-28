<?php

// C'est grâce à ce fichier que seront affiché la liste
// de tous vos glorieux projets. C'est donc ce fichier
// qui gère la page d'accueil de Nadine


/**
 * Ajout du Header
 */


include(__DIR__ . '/header.php');
?>

<main class="l-projets" role="main">

  <?php
  /**
   * Aside
   */
  ?>

  <aside class="m-aside">
    <h1 class="m-headline">Projets</h1>
    <a href="./p__modal-projets" class="btn btn__big btn__plain btn__modal" data-modal='projet'>
      <div class="btn__big-ico"><?php include './assets/img/ico_ajouter--plain.svg.php'; ?></div>
      <div class="btn__big-txt">
        <span class="m-lead m-ss">Ajouter</span>
        <span class="m-body-l">Projet</span>
      </div>
    </a>
    <div class="m-accordion is--active">
      <div class="m-accordion__titre">
        <span class="m-lead">Grouper</span>
        <div class="m-accordion__ico">
          <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
        </div>
      </div>
      <div class="m-accordion__wrapper">
        <form class="m-form">
          <div class="m-form__radio-vert">
            <div class="m-form__radio m-body">
              Par états du projets
              <input type="radio" name="grouper" checked="checked">
              <span class="checkmark"></span>
            </div>
            <div class="m-form__radio m-body">
              Par Diffuseurs
              <input type="radio" name="grouper">
              <span class="checkmark"></span>
            </div>
            <div class="m-form__radio m-body">
              Par Artistes-Auteurs
              <input type="radio" name="grouper">
              <span class="checkmark"></span>
            </div>
            <div class="m-form__radio m-body">
              Par années
              <input type="radio" name="grouper">
              <span class="checkmark"></span>
            </div>
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

  <section class="m-rom with--aside">

    <div class="m-accordion is--active">
      <div class="m-accordion__titre">
        <span class="m-lead">Projets en cours</span>
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

        <?php if ($loop->num_rows > 0) : ?>
          <?php while ($row = $loop->fetch_assoc()) : ?>
            <?php include './parts/p__projets-single.php'; ?>
          <?php endwhile; ?>
        <?php else : ?>
          <p>Chef, on n'a pas trouvé de projets en cours...</p>
        <?php endif; ?>
      </div>
    </div>


    <?php
    /**
     * Liste de projets terminés
     */
    ?>

    <div class="m-accordion">
      <div class="m-accordion__titre">
        <span class="m-lead">Projets terminés</span>
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
        $loop = nadine_query($args); ?>
        <?php if ($loop->num_rows > 0) : ?>
          <?php while ($row = $loop->fetch_assoc()) : ?>
            <?php include './parts/p__projets-single.php'; ?>
          <?php endwhile; ?>

        <?php else : ?>
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
        <span class="m-lead">Projets annulés</span>
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

        <?php if ($loop->num_rows > 0) : ?>
          <?php while ($row = $loop->fetch_assoc()) : ?>
            <?php include './parts/p__projets-single.php'; ?>
          <?php endwhile; ?>

        <?php else : ?>
          <p>Chef, on n'a pas trouvé de projets en terminés ou annulés...</p>
        <?php endif; ?>
      </div>
    </div>
  </section>


  <?php
  /**
   * Ajout des modales
   */

  include './parts/p__modal-projet.php';


  /**
   * Ajout du Footer
   */

  include './footer.php';
