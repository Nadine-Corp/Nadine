<?php

// Ce fichier gére l'affichage de la liste des tâches
// et des prix des factures et devis.
// Il est commun aux devis et aux factures.

?>


<table class="facture__h-200 facture__b-b facture__b-t">


  <tr class="facture__b-td">
    <td class="facture__w-75 facture__tl facture__subheading" colspan="3">
      <input type="text" name="facture__tache_1" style="text-align:left;" value="<?php the_facture_tache($row, 1) ?>">
    </td>
    <td class="facture__w-25 facture__tr facture__subheading">
      <input type="text" name="facture__prix_1" class="facture__subheading form__input-prix" value="<?php the_facture_prix($row, 1) ?>"> €
    </td>
  </tr>


  <tr class="facture__b-td">
    <td class="facture__w-75 facture__tl facture__subheading" colspan="3">
      <input type="text" name="facture__tache_2" style="text-align:left;" value="<?php the_facture_tache($row, 2) ?>">
    </td>
    <td class="facture__w-25 facture__tr facture__subheading">
      <input type="text" name="facture__prix_2" class="facture__subheading form__input-prix" value="<?php the_facture_prix($row, 2) ?>"> €
    </td>
  </tr>


  <tr class="facture__b-td">
    <td class="facture__w-75 facture__tl facture__subheading" colspan="3">
      <input type="text" name="facture__tache_3" style="text-align:left;" value="<?php the_facture_tache($row, 3) ?>">
    </td>
    <td class="facture__w-25 facture__tr facture__subheading">
      <input type="text" name="facture__prix_3" class="facture__subheading form__input-prix" value="<?php the_facture_prix($row, 3) ?>"> €
    </td>
  </tr>


  <tr class="facture__b-td">
    <td class="facture__w-75 facture__tl facture__subheading" colspan="3">
      <input type="text" name="facture__tache_4" style="text-align:left;" value="<?php the_facture_tache($row, 4) ?>">
    </td>
    <td class="facture__w-25 facture__tr facture__subheading">
      <input type="text" name="facture__prix_4" class="facture__subheading form__input-prix" value="<?php the_facture_prix($row, 4) ?>"> €
    </td>
  </tr>


  <tr class="facture__b-td">
    <td class="facture__w-75 facture__tl facture__subheading" colspan="3">
      <input type="text" name="facture__tache_5" style="text-align:left;" value="<?php the_facture_tache($row, 5) ?>">
    </td>
    <td class="facture__w-25 facture__tr facture__subheading">
      <input type="text" name="facture__prix_5" class="facture__subheading form__input-prix" value="<?php the_facture_prix($row, 5) ?>"> €
    </td>
  </tr>


  <tr class="facture__b-td">
    <td class="facture__w-75 facture__tl facture__subheading" colspan="3">
      <input type="text" name="facture__tache_6" style="text-align:left;" value="<?php the_facture_tache($row, 6) ?>">
    </td>
    <td class="facture__w-25 facture__tr facture__subheading">
      <input type="text" name="facture__prix_6" class="facture__subheading form__input-prix" value="<?php the_facture_prix($row, 6) ?>"> €
    </td>
  </tr>


  <tr>
    <td class="facture__w-75 facture__tl facture__subheading" colspan="3">
      <input type="text" name="facture__tache_7" style="text-align:left;" value="<?php the_facture_tache($row, 7) ?>">
    </td>
    <td class="facture__w-25 facture__tr facture__subheading">
      <input type="text" name="facture__prix_7" class="facture__subheading form__input-prix" value="<?php the_facture_prix($row, 7) ?>"> €
    </td>
  </tr>


</table>