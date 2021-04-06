<link rel='stylesheet' type='text/css' media="all" href='./template_facture/facture__v3/style.css'>
<script src="./template_facture/facture__v3/facture.js"></script>


<form class="form" action="" method="post">
  <div class="paper">
    <div class="paper__content">
      <table>
        <tr>
          <td class="facture__h-100 facture__tl" colspan="2" rowspan="2">
            <h1 class="facture__titre">Devis</h1>
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
              Adressée à  <?php echo $row["diffuseur__civilite"] ?> <?php echo $row["diffuseur__prenom"] ?> <?php echo $row["diffuseur__nom"] ?><br>
              <?php echo $row["diffuseur__adresse"] ?> <br> <?php echo $row["diffuseur__code_postal"] ?> <?php echo $row["diffuseur__ville"] ?><br>
            </p>
          </td>
        </tr>
        <tr>
          <td class="facture__h-100 facture__bl facture__w-25">
            <p class="facture__body">Devis n°<input type="text" name="facture__numero" placeholder="Numéro de facture" class="facture__body" style="text-align:left;" value="<?php echo $facture__numero ?>
        "></p>
          </td>
          <td class="facture__h-100 facture__br facture__w-25">
            <p class="facture__body">Fait à <?php echo $row["profil__ville"] ?>, le <?php echo utf8_encode(strftime("%d %B %Y", strtotime($today))) ?></p>
            <input type="hidden" name="facture__date" placeholder="date" value="<?php echo $today ?>">
          </td>

        </tr>
      </table>
      <?php include 'body.php'; ?>
      <table class="facture__h-100">
        <tr>
          <td class="facture__w-50"></td>
          <td class="facture__w-25">
            <span class="facture__subheading">Montant HT</span>
          </td>
          <td class="facture__w-25 facture__tr facture__subheading form__total">
            <input type="text" name="total" placeholder="Total" class="facture__subheading" disabled> €
          </td>
        </tr>
        <tr>
          <td class="facture__w-50"></td>
          <td class="facture__w-25">
            <span class="facture__subheading">Charges</span>
          </td>
          <td class="facture__w-25 facture__tr facture__subheading form__total">
            <input type="text" name="total_charges" placeholder="Charges" class="facture__subheading" disabled> €
          </td>
        </tr>
        <tr>
          <td class="facture__w-50"></td>
          <td class="facture__w-25 facture__b-t">
            <span class="facture__subheading">Total</span>
          </td>
          <td class="facture__w-25 facture__tr facture__subheading form__total facture__b-t">
            <input type="text" name="TotalEtCharges" placeholder="Total" class="facture__subheading" disabled> €
          </td>
        </tr>
        <tr class="facture__h-50">
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table>
      <table class="facture__h-200"></table>
      <table>
        <tr class="facture__h-20">
          <td class="facture__w-25 facture__b-b">
            <p class="facture__body">Le :</p>
          </td>
          <td class="facture__w-25 facture__b-b facture__b-l">
            <p class="facture__body">À :</p>
          </td>
          <td class="facture__w-50"></td>
        </tr>
        <tr class="facture__h-100"></tr>
        <tr class="facture__h-20">
          <td class="facture__w-25 facture__b-b" colspan="2">
            <p class="facture__body">Signature précédée de la mention «Lu et approuvé»</p>
          </td>
          <td class="facture__w-50"></td>
        </tr>
      </table>
      <table class="facture__h-100"></table>
      <table class="facture__footer facture__b-t">
        <tr>
          <td>
            <p class="facture__body">Règlement par virement bancaire : Titulaire du compte : <?php echo $row["profil__titulaire_du_compte"] ?> | IBAN : <?php echo $row["profil__iban"] ?> | BIC : <?php echo $row["profil__bic"] ?></p>
          </td>
        </tr>
        </tr>
      </table>
    </div>
  </div>
  <div class="paper">
    <div class="paper__content">
      <?php include 'cgv.php'; ?>
    </div>
  </div>
