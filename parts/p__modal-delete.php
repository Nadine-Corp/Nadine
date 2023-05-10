<?php

// Ce fichier permet de controler l'affichage de la modale
// permettant de supprimer un élèment de la base de données

?>

<div class="m-modal__delete m-modal m-modal__error m-modal__m">
  <div class="m-modal__wrapper">
    <form class="m-form" action="./core/form__contact.php" method="post">
      <div class="m-form__wrapper">
        <p class="m-display">Attention :</p>
        <p class="m-body">Vous êtes sur le point de supprimer définitivement un élément de la <i>Base de données</i>. Nadine apprend doucement (mais surement) : elle ne connait pas encore le concept de <i>Corbeille</i>. À la place, elle va simplement oublier cette information à jamais.
        <p class="m-body">Taper <i>KonMari</i> pour confirmer.</p>
        <input type="text" name="doyouconfirm" placeholder="Taper KonMari pour confirmer" class="">
      </div>

      <?php // Ajout la barre avec les boutons 
      ?>

      <div class="m-form__submit-bar m-btn__grp">
        <button class="btn btn__outline btn__cancel" type="button">Annuler</button>
        <button class="btn btn__plain btn__submit" type="submit">Supprimer</button>
      </div>
  </div>
  </form>
</div>