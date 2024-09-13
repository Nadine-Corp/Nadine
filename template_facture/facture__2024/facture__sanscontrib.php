<?php
// Ajoute les assets
include 'head.php'; ?>

<?php // Début du formulaire
?>

<form class="form" action="" method="post">
  <div class="paper template-facture__2024">
    <div class="paper__content">
      <table>
        <tr>
          <td class="facture__h-100 facture__tl" colspan="2" rowspan="2">
            <h1 class="facture__titre">FACTURE</h1>
          </td>
          <td class="facture__b-l facture__h-80 facture__tl" colspan="2">
            <p class="facture__body"><?php echo $row["profil__societe"] ?><br><?php echo $row["profil__adresse"] ?> | <?php echo $row["profil__code_postal"] ?> <?php echo $row["profil__ville"] ?><br><?php echo $row["profil__email"] ?><br><?php echo $row["profil__telephone"] ?></p>
          </td>
        </tr>
        <tr>
          <td class="facture__b-l facture__h-20 facture__bl">
            <p class="facture__body">SIRET : <?php echo $row["profil__siret"] ?></p>
          </td>
          <td class="facture__h-20 facture__br">
            <p class="facture__body">N° Secu : <?php echo $row["profil__numero_secu"] ?></p>
          </td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td class="facture__b-t facture__b-l facture__h-100 facture__tl" colspan="2" rowspan="2">
            <p class="facture__body">
              <?php echo $row["diffuseur__societe"] ?><br>
              Adressée à <?php echo $row["diffuseur__civilite"] ?> <?php echo $row["diffuseur__prenom"] ?> <?php echo $row["diffuseur__nom"] ?><br>
              <?php echo $row["diffuseur__adresse"] ?> <br> <?php echo $row["diffuseur__code_postal"] ?> <?php echo $row["diffuseur__ville"] ?><br>
            </p>
          </td>
        </tr>
        <tr>
          <td class="facture__h-100 facture__bl facture__w-25">
            <p class="facture__body">Facture n°<?php the_facture_numero($row, $table); ?></p>
          </td>
          <td class="facture__h-100 facture__br facture__w-25">
            <p class="facture__body">Fait à <?php echo $row["profil__ville"] ?>, le <?php the_facture_date($row, 'full'); ?></p>
          </td>

        </tr>
      </table>
      <?php include 'body.php'; ?>
      <table>
        <tr class="facture__h-10">
          <td class="facture__w-50" colspan="2"></td>
          <td class="facture__b-l facture__w-25 facture__tl">
            <span class="facture__subheading">Total brut</span>
          </td>
          <td class="facture__w-25 facture__tr facture__subheading form__total" style="text-align:right">
            <input type="text" name="total" placeholder="Total" class="facture__subheading form__input-total" disabled> €
          </td>
        </tr>
        <tr class="facture__h-10">
          <td class="facture__w-50" colspan="2"></td>
          <td class="facture__b-l facture__w-25 facture__tl">
            <span class="facture__subheading">TVA</span>
          </td>
          <td class="facture__w-25 facture__tr facture__subheading form__total" style="text-align:right">
            <input type="text" name="TVA" class="facture__subheading form__input-total" disabled value="0"> €
          </td>
        </tr>
        <tr class="facture__h-10">
          <td class="facture__w-50" colspan="2"></td>
          <td class="facture__b-l facture__w-25 facture__tl">
            <span class="facture__subheading">Contributions diffuseur</span>
          </td>
          <td class="facture__w-25 facture__tr facture__subheading form__total" style="text-align:right">
            <input type="text" name="total_charges" placeholder="Charges" class="facture__subheading form__input-total sanscontrib" disabled> €
          </td>
        </tr>
        <tr class="facture__h-10">
          <td class="facture__w-50" colspan="2"></td>
          <td class="facture__b-l facture__w-25 facture__tl facture__b-t">
            <span class="facture__subheading">Net à payer</span>
          </td>
          <td class="facture__w-25 facture__tr facture__subheading form__total facture__b-t" style="text-align:right">
            <input type="text" name="TotalEtCharges" placeholder="Total TTC" class="facture__subheading form__input-total" disabled> €
          </td>
        </tr>
        <tr class="facture__h-10">
          <td class="facture__w-50" colspan="2"></td>
          <td class="facture__b-l facture__tl" colspan="2">
            <span class="facture__body">TVA non applicable, article 293B du Code Général des Impôts</span>
          </td>
        </tr>
        <tr class="facture__h-80">
          <td></td>
          <td></td>
        </tr>
      </table>

      <?php // Ajout du footer 

      $the_facture_date = get_facture_date($row, 'brutfr');
      $date_limite = get_facture_date($row, 'brut');
      $date_limite = strtotime("+7 days", strtotime($date_limite));
      $date_limite = date('d/m/Y', $date_limite);
      ?>

      <table class="facture__footer facture__b-t">
        <tr>
          <td>
            <p class="facture__body">
              Délai de paiement : 7 jours francs dès réception de la facture | Date de réception de la facture : <?php echo $the_facture_date; ?> | Date limite de règlement : <?php echo $date_limite; ?>
              <br>Règlement par virement bancaire : Titulaire du compte : <?php echo $row["profil__titulaire_du_compte"] ?> | IBAN : <?php echo $row["profil__iban"] ?> | BIC : <?php echo $row["profil__bic"] ?>
            </p>
          </td>
        </tr>
        </tr>
      </table>
    </div>
  </div>


  <?php // Ajout des Conditions Générales de Ventes
  ?>

  <div class="paper">
    <div class="paper__content">
      <?php include 'cgv.php'; ?>
    </div>
  </div>