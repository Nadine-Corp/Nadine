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
if (isset($_GET['devis__id'])) {
  $table = 'devis';
  $prefix = 'devis';
} elseif (isset($_GET['facturea__id'])) {
  $table = 'facturesacompte';
  $prefix = 'facturea';
} elseif (isset($_GET['facture__id'])) {
  $table = 'factures';
  $prefix = 'facture';
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
      'FROM'     => 'Projets, Diffuseurs, Profil',
      'WHERE'    => 'Projets.projet__id =' . $projet__id,
      'AND'      => 'Projets.diffuseur__id = Diffuseurs.diffuseur__id',
      'AND'      => 'Profil.profil__id = (SELECT MAX(profil__id) FROM Profil)',
      'LIMIT'    => 1
    );
  } else {
    $args = array(
      'FROM'     => $table . ', Profil',
      'WHERE'    => $prefix . '__id' . ' = ' . $facture__id,
      'AND'      => $table . '.profil__id = Profil.profil__id',
      'LIMIT'    => 1
    );
  }
  $loop = nadine_query($args);


  /**
   * Récupère le numéros de la facture
   */


  ?>
  <?php if ($loop->num_rows > 0) : ?>
    <?php while ($row = $loop->fetch_assoc()) : ?>

      <?php // Ajout du formulaire 
      ?>

      <form class="m-form m-row" action="./core/add__facture.php" method="post">

        <?php // Ajout du fil d'Ariane 
        ?>
        <section class="m-breadcrumb">
          <a href="./projets.php" class="m-breadcrumb__link m-body">Projets</a>
          <a href="./projet__single.php?projet__id=<?php the_projet_id($row) ?>" class="m-breadcrumb__link m-body"><?php the_projet_name($row) ?></a>
          <a href="<?php the_facture_link($row) ?>" class="m-breadcrumb__link m-body"><?php the_facture_numero($row, $table) ?></a>
        </section>

        <?php
        /**
         * Aside
         */
        ?>

        <aside class="m-aside">
          <div class="m-form__label m-form__select-tab">
            <label for="facture__statut">État de la facture</label>
            <select name="facture__statut" data-selected="">
              <option value="Brouillon">Brouillon</option>
              <option value="Envoyé">Envoyé</option>
              <option value="Relancé">Relancé</option>
              <option value="Signé">Signé</option>
              <option value="Payé">Payé</option>
              <option value="Annulé">Annulé</option>
            </select>
          </div>

          <div class="m-btn__grp m-btn__grp-v">
            <a href="javascript:window.print()" class="btn btn__outline">
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

            <?php
            // Ajoute des champs caché pour simplifier l'ajout
            // et la modification des factures ou devis dans la base de données

            ?>

            <input type="hidden" name="facture__id" placeholder="facture__id" value="<?php the_facture_id($row) ?>">
            <input type="hidden" name="facture__table" placeholder="facture__table" value="<?php echo get_facture_table($row, $table) ?>">
            <input type="hidden" name="facture__template" placeholder="facture__template" value="<?php the_facture_template($row, $table) ?>">
            <input type="hidden" name="facture__prefix" placeholder="facture__prefix" value="<?php the_facture_prefix($table) ?>">
            <input type="hidden" name="facture__date" placeholder="date" value="<?php the_facture_date($row, 'brut'); ?>">
            <input type="hidden" name="facture__numero" placeholder="facture__numero" value="<?php the_facture_numero($row, $table) ?>">
            <input type="hidden" name="projet__nom" placeholder="projet__nom" value="<?php echo $row["projet__nom"] ?>">
            <input type="hidden" name="projet__numero" placeholder="projet__numero" value="<?php echo $row["projet__numero"] ?>">
            <input type="hidden" name="diffuseur__id" placeholder="__id" value="<?php echo $row["diffuseur__id"] ?>">
            <input type="hidden" name="diffuseur__societe" placeholder="__societe" value="<?php echo $row["diffuseur__societe"] ?>">
            <input type="hidden" name="diffuseur__siret" placeholder="__siret" value="<?php echo $row["diffuseur__siret"] ?>">
            <input type="hidden" name="diffuseur__civilite" placeholder="__civilite" value="<?php echo $row["diffuseur__civilite"] ?>">
            <input type="hidden" name="diffuseur__prenom" placeholder="__prenom" value="<?php echo $row["diffuseur__prenom"] ?>">
            <input type="hidden" name="diffuseur__nom" placeholder="__nom" value="<?php echo $row["diffuseur__nom"] ?>">
            <input type="hidden" name="diffuseur__adresse" placeholder="__adresse" value="<?php echo $row["diffuseur__adresse"] ?>">
            <input type="hidden" name="diffuseur__code_postal" placeholder="__code_postal" value="<?php echo $row["diffuseur__code_postal"] ?>">
            <input type="hidden" name="diffuseur__ville" placeholder="__ville" value="<?php echo $row["diffuseur__ville"] ?>">
            <input type="hidden" name="diffuseur__telephone" placeholder="__telephone" value="<?php echo $row["diffuseur__telephone"] ?>">
            <input type="hidden" name="diffuseur__email" placeholder="__email" value="<?php echo $row["diffuseur__email"] ?>">
            <input type="hidden" name="diffuseur__website" placeholder="__website" value="<?php echo $row["diffuseur__website"] ?>">
            <input type="hidden" name="facture__total" placeholder="Total" class="facture__subheading">
            <input type="hidden" name="projet__id" placeholder="projet__id" value="<?php the_projet_id($row) ?>">
            <input type="hidden" name="profil__id" placeholder="projet__id" value="<?php the_profil_id($row) ?>">

            <?php
            // Affiche le Template de facture ou devis
            include(__DIR__ . the_facture_template_url($projet__id, $table, $facture__id));
            ?>
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
