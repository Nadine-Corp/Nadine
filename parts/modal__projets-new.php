<?php

// Ce fichier permet de controler l'affichage de la modale
// permettant d'ajouter un nouveau projet

?>

<div class="m-modal__add-projet m-modal is--active">
  <div class="m-modal__denko">
    <div class="is--denko__container">
      <ul>
        <li class="is--denko">
          <span class="display13">Ajouter un projet</span>
        </li>
      </ul>
    </div>
  </div>
  <div class="m-modal__wrapper">
    <nav  class="m-modal__nav">
      <ul>
        <li class="display1 is--active"><a href="">Information</a></li>
        <li class="display1"><a href="">Diffuseur</a></li>
        <li class="display1"><a href="">Équipe</a></li>
      </ul>
    </nav>
    <form class="m-form">
      <div class="m-form__wrapper">
        <div class="m-form__label-amimate">
          <label for="nom_du_projet">Nom du projet</label>
          <input type="text" name="nom_du_projet" placeholder="Nom du projet" required>
        </div>
        <div class="m-form__label-simple m-form__half">
          <label for="date_de_creation">Date de création</label>
          <input type="date" name="date_de_creation" placeholder="Date de création" value="<?php the_date_today() ?>" required>
        </div>
        <div class="m-form__label-simple m-form__half">
          <label for="date_de_fin">Date de fin</label>
          <input type="date" name="date_de_fin" placeholder="Date de fin" value="">
        </div>
        <div class="m-form__label-simple m-form__select-tab">
          <label for="projet__statut">État du projet</label>
          <select name="projet__statut">
            <option value="Projet en cours" selected>Projet en cours</option>
            <option value="Projet terminé">Projet terminé</option>
            <option value="Projet annulé">Projet annulé</option>
          </select>
        </div>
      </div>
      <div class="m-form__btns m-btn__grp">
        <button href="#" class="btn btn__outline btn__ico"><?php include './assets/img/ico_corbeille.svg.php'; ?></button>
        <button href="#" class="btn btn__outline">Annuler</button>
        <button href="#" class="btn btn__plain">Suivant</button>
      </div>
    </form>
  </div>
</div>
