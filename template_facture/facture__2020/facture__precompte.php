<link rel='stylesheet' type='text/css' media="all" href='./template_facture/facture__2020/style.css'>
<script src="./template_facture/facture__2020/facture.js"></script>


<form class="form" action="" method="post">
  <div class="paper">
    <div class="paper__content">
      <table>
        <tr>
          <td class="facture__h-100 facture__tl" colspan="2" rowspan="2">
            <h1 class="facture__titre">Facture</h1>
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
        <tr class="facture__h-20">
          <td class="facture__w-50" colspan="2"></td>
          <td class="facture__b-l facture__w-25 facture__tl">
            <span class="facture__subheading">Montant HT</span>
          </td>
          <td class="facture__w-25 facture__tr facture__subheading form__total">
            <input type="text" name="total" placeholder="Total" class="facture__subheading" disabled> €
          </td>
        </tr>
        <tr class="facture__h-20">
          <td class="facture__w-50" colspan="2"></td>
          <td class="facture__b-l facture__w-25 facture__tl">
            <span class="facture__subheading">Montant TTC</span>
          </td>
          <td class="facture__w-25 facture__tr facture__subheading form__total">
            <input type="text" name="TotalEtCharges" placeholder="Total TTC" class="facture__subheading" disabled> €
          </td>
        <tr class="facture__h-80">
          <td></td>
          <td></td>
        </tr>
      </table>
      <table class="facture__h-100 facture__b-t">
        <tr>
          <td class="facture__w-40 facture__tl">
            <p class="facture__caption">Cotisation Sécurité sociale<br>0,40% du Montant HT</p>
          </td>
          <td class="facture__w-10 facture__tr">
            <p class="facture__caption"><input type="text" name="contribution-secu-sociales" placeholder="Montant" class="facture__caption" disabled> €</p>
          </td>
          <td class="facture__b-ld facture__w-40 facture__tl">
            <p class="facture__caption">Cotisations / contributions sociales<br>1% du Total</p>
          </td>
          <td class="facture__w-10 facture__tr">
            <p class="facture__caption"><input type="text" name="contribution-sociales" placeholder="Montant" class="facture__caption" disabled> €</p>
          </td>
        </tr>
        <tr>
          <td class="facture__w-40 facture__tl">
            <p class="facture__caption">Cotisation vieillesse plafonnée<br>6,90 % du montant HT s’il est inférieur à 40 524 €</p>
          </td>
          <td class="facture__w-10 facture__tr">
            <p class="facture__caption"><input type="text" name="cotisation-maladies-vieillesse" placeholder="Montant" class="facture__caption" disabled> €</p>
          </td>
          <td class="facture__b-ld facture__w-40 facture__tl">
            <p class="facture__caption">Contribution à la formation professionnelle<br>0,10% du Total</p>
          </td>
          <td class="facture__w-10 facture__tr">
            <p class="facture__caption"><input type="text" name="contribution-a-la-formation-professionnelle" placeholder="Montant" class="facture__caption" disabled> €</p>
          </td>
        </tr>
        <tr>
          <td class="facture__w-40 facture__tl">
            <p class="facture__caption">Contibution sociale généralisée (CSG)<br>9,20% de 98,25% du Montant HT</p>
          </td>
          <td class="facture__w-10 facture__tr">
            <p class="facture__caption"><input type="text" name="CSG" placeholder="Montant" class="facture__caption" disabled> €</p>
          </td>
          <td class="facture__b-ld facture__w-40 facture__tl">
            <p class="facture__caption">Total des contributions diffuseur (2)</p>
          </td>
          <td class="facture__w-10 facture__tr">
            <p class="facture__caption"><input type="text" name="total-des-contributions-diffuseur" placeholder="Total" class="facture__caption" disabled> €</p>
          </td>
        </tr>
        <tr>
          <td class="facture__w-40 facture__tl">
            <p class="facture__caption">Contribution pour le remboursement de la dette sociale (CRDS)<br>0,50% de 98,25% du Montant HT</p>
          </td>
          <td class="facture__w-10 facture__tr">
            <p class="facture__caption"><input type="text" name="CRDS" placeholder="Montant" class="facture__caption" disabled> €</p>
          </td>
          <td class="facture__b-ld facture__w-40 facture__tl">
            <p class="facture__caption"></p>
          </td>
          <td class="facture__w-10 facture__tr">
            <p class="facture__caption"></p>
          </td>
        </tr>
        <tr>
          <td class="facture__w-40 facture__tl">
            <p class="facture__caption">Contribution à la formation professionnelle (CFP)<br>0,35 % du montant brut HT</p>
          </td>
          <td class="facture__w-10 facture__tr">
            <p class="facture__caption"><input type="text" name="CFPC" placeholder="Montant" class="facture__caption" disabled> €</p>
          </td>
          <td class="facture__b-ld facture__w-40 facture__tl">
            <p class="facture__caption"></p>
          </td>
          <td class="facture__w-10 facture__tr">
            <p class="facture__caption"></p>
          </td>
        </tr>
        <tr>
          <td class="facture__w-40 facture__tl">
            <p class="facture__caption">Total Précomptes (1)</p>
          </td>
          <td class="facture__w-10 facture__tr">
            <p class="facture__caption"><input type="text" name="total-precompte" placeholder="Total" class="facture__caption" disabled> €</p>
          </td>
          <td class="facture__b-ld facture__w-40 facture__tl">
            <p class="facture__caption"></p>
          </td>
          <td class="facture__w-10 facture__tr">
            <p class="facture__caption"></p>
          </td>
        </tr>
      </table>

      <table>
        <tr class="facture__h-200">
          <td class="facture__w-50 facture__total">
            <p class="facture__display2">Total à verser<br>à l'artiste auteur</p>
            <p class="facture__caption">Montant HT − Total du précompte (1)</p>
            <img src="./template_facture/facture__2020/arrow.png" alt="">
          </td>
          <td class="facture__w-50 facture__b-ld facture__total">
            <p class="facture__display2">Total à verser<br>à L’URSSAF *</p>
            <p class="facture__caption">Total du précompte (1) + Total des contributions diffuseur (2)</p>
            <p class="facture__caption">* Taux en vigueur en 2019 </p>
            <img src="./template_facture/facture__2020/arrow.png" alt="">
          </td>
        </tr>
        <tr class="facture__h-20 facture__b-t">
          <td id="total-artiste" class="facture__w-50 facture__total facture__display2">
          </td>
          <td id="total-mda" class="facture__w-50 facture__b-ld facture__total facture__display2">
            <input type="hidden" name="total-mda" placeholder="Total" class="facture__subheading">
          </td>
        </tr>
        <tr class="facture__h-80"></tr>
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
            <p class="facture__body">Délai de paiement : 7 jours francs dès réception de la facture | Date de réception de la facture : <?php echo $the_facture_date; ?> | Date limite de règlement : <?php echo $date_limite; ?> </p>
            <p class="facture__body">Règlement par virement bancaire : Titulaire du compte : <?php echo $row["profil__titulaire_du_compte"] ?> | IBAN : <?php echo $row["profil__iban"] ?> | BIC : <?php echo $row["profil__bic"] ?></p>
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