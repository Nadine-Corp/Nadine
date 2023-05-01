<?php

// C'est grâce à ce fichier que le détail de chaque projet.
// On retrouve ici la liste des devis et facture,
// l'historique du projet, etc. Bref : que des choses passionnantes !

/**
 * Récupère l'ID du projet dans l'URL de la page
 */

$projet__id = $_GET['projet__id'];


/**
 * Si l'ID du projet n'existe pas : redirection vers la page Projets
 */

if (!isset($projet__id)) {
  header('Location: ./projets.php');
  die();
}


/**
 * Ajout du Header
 */

include './header.php';
?>

<main class="l-projet" role="main">

  <?php
  $args = array(
    'FROM'     => 'Projets, Diffuseurs',
    'WHERE'    => 'Projets.projet__id =' . $projet__id,
    'AND'      => 'Projets.diffuseur__id = Diffuseurs.diffuseur__id'
  );
  $loop = nadine_query($args);
  ?>
  <?php if ($loop->num_rows > 0) : ?>
    <?php while ($row = $loop->fetch_assoc()) : ?>

      <?php // Ajout du fil d'Ariane 
      ?>
      <section class="m-breadcrumb">
        <a href="./projets.php" class="m-breadcrumb__link m-body">Projets</a>
        <a href="./projet__single.php?projet__id=<?php the_projet_id($row) ?>" class="m-breadcrumb__link m-body"><?php the_projet_name($row) ?></a>
      </section>

      <?php // Ajout de la couverture 
      ?>
      <section class="m-cover m-row">
        <div class="m-rom">
          <?php // Ajout du nom du projet 
          ?>
          <h1 class="l-projets__name m-headline"><?php the_projet_name($row) ?></h1>
          <?php // Ajout du statut du projet 
          ?>
          <div class="m-cover__bigbadge">
            <span class="m-body-s">
              <?php the_projet_statut($row) ?>
            </span>
          </div>
          <?php // Ajout des boutons 
          ?>
          <div class="m-cover__toolbar m-btn__grp">
            <button class="btn btn__outline btn__ico"><?php include './assets/img/ico_corbeille.svg.php'; ?></button>
            <button class="btn btn__outline btn__modal" data-modal="projet" data-table="projet" data-id="<?php the_projet_id($row) ?>">
              <?php // include './assets/img/ico_modifier.svg.php';
              ?>Modifier le projet</button>
            <?php if ($row['projet__precompte'] == 1) : ?>
              <span class="m-body-s">Le précompte est activé pour ce projet.</span>
            <?php else : ?>
              <span class="m-body-s">Le précompte est désactivé pour ce projet.</span>
            <?php endif; ?>
          </div>
          <div class="m-cover__cdvs">
            <?php // Ajout des infos Diffuseur 
            ?>
            <div class="m-cover__diffuseur m-cover__cdv">
              <span class="m-cover__diffuseur-societe m-lead"><?php the_diffuseur_societe($row) ?></span>
              <span class="m-cover__diffuseur-nom m-body-l"><em><?php the_diffuseur_name($row) ?></em></span>
              <span class="m-cover__diffuseur-info m-body-s">Diffuseur</span>
              <div class="m-cover__diffuseur-half">
                <div>
                  <span class="m-body-s"><?php the_diffuseur_website($row) ?></span>
                  <span class="m-body-s"><?php the_diffuseur_email($row) ?></span>
                  <span class="m-body-s"><?php the_diffuseur_telephone($row) ?></span>
                </div>
                <div>
                  <span class="m-cover__diffuseur-ads m-body-s"><?php the_diffuseur_full_adresse($row); ?></span>
                </div>
              </div>
              <button class="btn btn__outline">Modifier le diffuseur</button>
            </div>

            <?php // Ajout des infos Artistes 
            ?>
            <div class="m-cover__artistes m-cover__cdv">
              <?php the_projet_equipe($row); ?>
              <div class="m-cover__cdv-bottom">
                <button class="btn btn__outline">Modifier l'équipe</button>
              </div>
            </div>
          </div>

        </div>
        <?php // Ajout la frise en bas de la cover 
        ?>
        <div class="m-cover__frise m-row">
          <div class="m-cover__frise-01"></div>
          <div class="m-cover__frise-02"></div>
          <div class="m-cover__frise-03"></div>
          <div class="m-cover__frise-04"></div>
          <div class="m-cover__frise-05"></div>
        </div>
      </section>

      <section class="m-rom">
        <?php // Ajout des devis 
        ?>
        <div class="m-accordion">
          <div class="m-accordion__titre">
            <h2>Devis</h2>
            <div class="m-accordion__ico">
              <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
            </div>
          </div>
          <div class="m-accordion__wrapper">
            <?php
            $args = array(
              'FROM'     => 'Projets, Devis',
              'WHERE'    => 'Projets.projet__id =' . $projet__id,
              'AND'      => 'Devis.projet__id = Projets.projet__id'
            );
            $loop = nadine_query($args);
            ?>
            <?php if ($loop->num_rows > 0) : ?>
              <?php while ($row = $loop->fetch_assoc()) : ?>
                <?php // Ajout du template du Devis 
                ?>
                <?php include './parts/p__facture-single.php'; ?>
              <?php endwhile; ?>
            <?php endif; ?>
            <?php // Ajout du bouton Ajouter un Devis 
            ?>
            <a href="./facture__single.php?projet__id=<?php echo $projet__id ?>&devis__id=new" class="p-facture xxs6 m4 l3 xl2 btn btn__big btn__plain">
              <div class="p-facture__paper">
                <div class="is--fullsize">
                  <div class="btn__big-ico"><?php include './assets/img/ico_ajouter--plain.svg.php'; ?></div>
                  <div class="btn__big-txt">
                    <span class=" m-lead">Ajouter</span>
                    <span class="m-body-l">Devis</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>


        <?php // Ajout des factures d'acompte 
        ?>
        <div class="m-accordion">
          <div class="m-accordion__titre">
            <h2>Facture d'acompte</h2>
            <div class="m-accordion__ico">
              <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
            </div>
          </div>
          <div class="m-accordion__wrapper">
            <?php
            $args = array(
              'FROM'     => 'Projets, Facturesacompte',
              'WHERE'    => 'Projets.projet__id =' . $projet__id,
              'AND'      => 'Facturesacompte.projet__id = Projets.projet__id'
            );
            $loop = nadine_query($args);
            ?>
            <?php if ($loop->num_rows > 0) : ?>
              <?php while ($row = $loop->fetch_assoc()) : ?>
                <?php // Ajout du template des Factures d'acompte 
                ?>
                <?php include './parts/p__facture-single.php'; ?>
              <?php endwhile; ?>
            <?php endif; ?>
            <?php // Ajout du bouton Ajouter une Facture 
            ?>
            <a href="./facture__single.php?projet__id=<?php echo $projet__id ?>&facturea__id=new" class="p-facture xxs6 m4 l3 xl2 btn btn__big btn__plain">
              <div class="p-facture__paper">
                <div class="is--fullsize">
                  <div class="btn__big-ico"><?php include './assets/img/ico_ajouter--plain.svg.php'; ?></div>
                  <div class="btn__big-txt">
                    <span class=" m-lead">Ajouter</span>
                    <span class="m-body-l">Facture d'accompte</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

        <?php // Ajout des factures 
        ?>
        <div class="m-accordion is--active">
          <div class="m-accordion__titre">
            <h2>Facture</h2>
            <div class="m-accordion__ico">
              <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
            </div>
          </div>
          <div class="m-accordion__wrapper">
            <?php
            $args = array(
              'FROM'     => 'Projets, Factures',
              'WHERE'    => 'Projets.projet__id =' . $projet__id,
              'AND'      => 'Factures.projet__id = Projets.projet__id'
            );
            $loop = nadine_query($args);
            ?>
            <?php if ($loop->num_rows > 0) : ?>
              <?php while ($row = $loop->fetch_assoc()) : ?>
                <?php // Ajout du template des Factures 
                ?>
                <?php include './parts/p__facture-single.php'; ?>
              <?php endwhile; ?>
            <?php endif; ?>
            <?php // Ajout du bouton Ajouter une Facture 
            ?>
            <a href="./facture__single.php?projet__id=<?php echo $projet__id ?>&facture__id=new" class="p-facture xxs6 m4 l3 xl2 btn btn__big btn__plain">
              <div class="p-facture__paper">
                <div class="is--fullsize">
                  <div class="btn__big-ico"><?php include './assets/img/ico_ajouter--plain.svg.php'; ?></div>
                  <div class="btn__big-txt">
                    <span class=" m-lead">Ajouter</span>
                    <span class="m-body-l">Facture</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </section>
    <?php endwhile; ?>
  <?php else : ?>
    <section class="m-rom">
      <p>Chef, on n'a pas trouvé de projets en cours...</p>
    </section>
  <?php endif; ?>


  <?php
  /**
   * Ajout des modals
   */

  include_once(__DIR__ . '/parts/p__modal-projet.php');


  /**
   * Ajout du Footer
   */

  include './footer.php';
