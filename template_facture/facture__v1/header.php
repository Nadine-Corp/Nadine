

<table width="100%">
  <tr>
    <td width="100%"><h1 class="display3">Facture</h1></td>
  </tr>
</table>
<table width="100%">
    <tr>
      <td width="50%"><input type="text" name="numero_du_projet" placeholder="Numéro de facture" class="form__input-half"></td>
      <td width="50%"><input type="text" name="date_de_creation" placeholder="Date de création" class="form__input-half" value="<?php echo $today; ?>"></td>
    </tr>
    <tr>
      <td class="body" width="50%">
        methodic.design</br>
        2 boulevard de Stalingrad</br>44000 Nantes</br>
        06 63 79 05 59</br>hello@methic.design</br>www.methic.design</br>
        SIRET : 75012214500014</br>N°d'ordre MDA : B996167</br>
      </td>
      <td class="body" width="50%">
        <?php echo $row["diffuseur__societe"] ?></br>Adressée à  <?php echo $row["diffuseur__civilite"] ?> <?php echo $row["diffuseur__prenom"] ?> <?php echo $row["diffuseur__nom"] ?></br>
        <?php echo $row["diffuseur__adresse"] ?></br><?php echo $row["diffuseur__code_postal"] ?> <?php echo $row["diffuseur__ville"] ?></br>
        <?php echo $row["diffuseur__telephone"] ?></br><?php echo $row["diffuseur__email"] ?></br><?php echo $row["diffuseur__website"] ?></br>
      </td>
    </tr>
  </table>
