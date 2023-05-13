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
              <input type="radio" name="grouper">
              <span class="checkmark"></span>
            </div>
            <div class="m-form__radio m-body">
              Particuliers
              <input type="radio" name="grouper">
              <span class="checkmark"></span>
            </div>
            <div class="m-form__radio m-body">
              Par Artistes-Auteurs
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
   * Liste des Contacts
   */
  ?>
  <section class="m-rom with--aside">
    <div class="l-contacts__list">

      <?php
      /**
       * Ajoute une variable pour rassembler les résultats
       */

      $combined_results = array();


      /**
       * Liste et ajoute les diffuseurs aux résultats
       */

      $args = array(
        'FROM'     => 'Diffuseurs',
        'WHERE'    => 'Diffuseurs.diffuseur__corbeille = 0'
      );
      $loop__diffuseurs = nadine_query($args);

      if ($loop__diffuseurs->num_rows > 0) :
        while ($row__diffuseurs = $loop__diffuseurs->fetch_assoc()) :
          $combined_results[] = $row__diffuseurs;
        endwhile;
      endif;


      /**
       * Liste et ajoute les artiste aux résultats
       */

      $args = array(
        'FROM'     => 'Artistes',
        'WHERE'    => 'Artistes.artiste__corbeille = 0'
      );
      $loop__artistes = nadine_query($args);

      if ($loop__artistes->num_rows > 0) :
        while ($row__artistes = $loop__artistes->fetch_assoc()) :
          $combined_results[] = $row__artistes;
        endwhile;
      endif;


      /**
       * Affiche les résultats
       */

      if (isset($combined_results)) :
        foreach ($combined_results as $row) :
          include './parts/p__single-contact.php';
        endforeach;

        // Reset la varibale $row pour ne pas interféré
        // avec le chargement de la modale Contact
        $row = array();

      else : msg_nothing('Aucun Contact', "<i>Nadine</i> n'a trouvé aucun <i>Contact</i> dans la <i>base de données</i>. Commencez par ajouter un <i>Contact</i> de type <i>Diffuseur</i> pour envoyer vos premiers <i>Devis</i> ou <i>Facture</i>");
      endif;
      ?>
    </div>
  </section>


  <?php
  /**
   * Ajout des modales
   */

  include './parts/p__modal-contact.php';
  include './parts/p__modal-delete.php';


  /**
   * Ajout du Footer
   */

  include './footer.php';
