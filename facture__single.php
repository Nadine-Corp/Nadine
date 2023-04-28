<?php

// Ce fichier gére l'affichage des factures et devis.
// C'est grâce à ce fichier que l'utilisateur peut éditer
// et envoyer ses factures et devis. Ce fichier est donc essentiel
// pour gagner de l'argent.

/**
 * Récupère les infos dans l'URL de la page
 */

// Récupère l'ID du projet
if (isset($_GET['projet__id'])) {
  $projet__id = $_GET['projet__id'];
}

// Récupère la bonne table
if (isset($_GET['facture__id'])) {
  $table = 'factures';
  $prefix = 'facture';
} elseif (isset($_GET['devis__id'])) {
  $table = 'devis';
  $prefix = 'devis';
}

// Récupère l'id de la facture ou devis
if (isset($_GET[$prefix . '__id'])) {
  $facture__id = $_GET[$prefix . '__id'];
}


/**
 * Si les infos de la facture ou devis n'existe pas : redirection vers la page Projets
 */

if (!isset($projet__id) || !isset($table) || !isset($facture__id)) {
  header('Location: ./projets.php');
  die();
}
+

/**
 * Ajout du Header
 */

include './header.php';
?>

<main class="l-facture" role="main">

  <?php

  /**
   * Récupère les infos dans la base de données
   */


  // Vérifie s'il s'agit d'une nouvelle facture
  if ($facture__id == 'new') {
    $args = array(
      'FROM'     => 'Projets, Diffuseurs',
      'WHERE'    => 'Projets.projet__id =' . $projet__id,
      'AND'      => 'Projets.diffuseur__id = Diffuseurs.diffuseur__id'
    );
  } else {
    $args = array(
      'FROM'     => $table . ', Profil',
      'WHERE'    => $prefix . '__id' . ' = ' . $facture__id,
      'AND'      => $table . '.profil__id = Profil.profil__id'
    );
  }
  $loop = nadine_query($args);


  /**
   * Récupère le numéros de la facture
   */


  $facture__numero = 'coucou';


  /**
   * Récupère les dates
   */

  // Récupère et formate la date du jour
  $today = get_date_today();
  $today = date('d/m/Y', strtotime($today));

  ?>
  <?php if ($loop->num_rows > 0) : ?>
    <?php while ($row = $loop->fetch_assoc()) : ?>

      <?php // Ajout du formulaire 
      ?>

      <form class="m-form m-row" action="./core/add__projet.php" method="post">

        <?php // Ajout du fil d'Ariane 
        ?>
        <section class="m-breadcrumb">
          <a href="./projets.php" class="m-breadcrumb__link m-body">Projets</a>
          <a href="./projet__single.php?projet__id=<?php the_projet_id($row) ?>" class="m-breadcrumb__link m-body"><?php the_projet_name($row) ?></a>
          <a href="<?php the_facture_link($row) ?>" class="m-breadcrumb__link m-body"><?php the_facture_numero($row) ?></a>
        </section>

        <?php
        /**
         * Aside
         */
        ?>

        <aside class="m-aside">
          <div class="m-form__label m-form__select-tab not--for--new--projet">
            <label for="projet__statut">État de la facture</label>
            <select name="projet__statut" data-selected="">
              <option value="Brouillon">Brouillon</option>
              <option value="Envoyé">Envoyé</option>
              <option value="Relancé">Relancé</option>
              <option value="Signé">Signé</option>
              <option value="Payé">Payé</option>
              <option value="Annulé">Annulé</option>
            </select>
          </div>

          <div class="m-btn__grp m-btn__grp-v">
            <a href="" class="btn btn__outline">
              Imprimer en PDF
            </a>
            <a href="" class="btn btn__outline">
              Générer le couriel
            </a>
            <a href="" class="btn btn__outline">
              Dupliquer
            </a>
            <a href="" class="btn btn__outline">
              Générer la facture
            </a>
          </div>
          <div class="m-form__submit-bar m-btn__grp">
            <button class="btn btn__outline btn__ico"><?php include(__DIR__ . '/assets/img/ico_corbeille.svg.php'); ?></button>
            <a href="projet__single.php?projet__id=<?php the_projet_id($row) ?>" class="btn btn__outline btn__cancel">Annuler</a>
            <button class="btn btn__plain btn__submit" type="submit">Enregistrer</button>
          </div>
        </aside>

        <?php
        /**
         * Sélection du bon Template de facture
         */

        ?>
        <section class="m-rom with--aside">
          <div class="m-col">
            <?php include the_facture_template($projet__id, $table, $facture__id); ?>
          </div>
        </section>

      </form>
    <?php endwhile; ?>
  <?php else : ?>
    <section class="m-rom">
      <p>Chef, on n'a pas trouvé de facture en cours...</p>
    </section>
  <?php endif; ?>


  <?php
  /**
   * Ajout du Footer
   */

  include './footer.php';
