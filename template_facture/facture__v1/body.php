



  <table class="body" width="100%">
    <tr>
      <th class="caption" width="80%">#Désignation</th>
      <th class="caption" width="20%">#Montant</th>
    </tr>
    <tr>
      <td width="80%"><input type="text" name="facture__tache_1"></td>
      <td width="20%"><input type="number" name="facture__prix_1" class="form__input-prix"> €</td>
    </tr>
    <tr>
      <td width="80%"><input type="text" name="facture__tache_2"></td>
      <td width="20%"><input type="number" name="facture__prix_2" class="form__input-prix"> €</td>
    </tr>
    <tr>
      <td width="80%"><input type="text" name="facture__tache_3"></td>
      <td width="20%"><input type="number" name="facture__prix_3" class="form__input-prix"> €</td>
    </tr>
    <tr>
      <td width="80%"><input type="text" name="facture__tache_4"></td>
      <td width="20%"><input type="number" name="facture__prix_4" class="form__input-prix"> €</td>
    </tr>
    <tr>
      <td width="80%"><input type="text" name="facture__tache_5"></td>
      <td width="20%"><input type="number" name="facture__prix_5" class="form__input-prix"> €</td>
    </tr>
    <tr>
      <td width="80%"><input type="text" name="facture__tache_6"></td>
      <td width="20%"><input type="number" name="facture__prix_6" class="form__input-prix"> €</td>
    </tr>
    <tr>
      <td width="80%">
        <span class="subheading">Total</span>
        <span class="caption">TVA non applicable, article 293 B du CGI</span>
      </td>
      <td class="form__total" width="20%"><input type="number" name="total" placeholder="Total" class="subheading" disabled> €</td>
    </tr>
  </table>


  <h2 class="subheading">Contributions de l'auteur précomptées par le diffuseur</h2>


  <table class="body" width="100%">
    <tr>
      <th class="caption" width="60%">#Désignation</th>
      <th class="caption" width="20%">#Base de calcul</th>
      <th class="caption" width="20%">#Montant</th>
    </tr>
    <tr>
      <td width="60%">
        <span>Cotisation maladies & vieillesse déplafonnée à précompter</span>
        <span class="caption">0,4% du Total</span>
      </td>
      <td width="20%"><input type="number" name="total" placeholder="Base de calcul" disabled> €</td>
      <td width="20%"><input type="number" name="cotisation-maladies-vieillesse" placeholder="Montant" disabled> €</td>
    </tr>
    <tr>
      <td width="60%">
        <span>Contibution sociale généralisée (CSG)</span>
        <span class="caption">9,20% de 98,25% du Total</span>
      </td>
      <td width="20%"><input type="number" name="base_98-25" placeholder="Base de calcul" disabled> €</td>
      <td width="20%"><input type="number" name="CSG" placeholder="Montant" disabled> €</td>
    </tr>
    <tr>
      <td>
        <span>CRDS</span>
        <span class="caption">0,50% de 98,25% du Total</span>
      </td>
      <td width="20%"><input type="number" name="base_98-25" placeholder="Base de calcul" disabled> €</td>
      <td width="20%"><input type="number" name="CRDS" placeholder="Montant" disabled> €</td>
    </tr>
    <tr>
      <td width="60%">
        <span>CFPC</span>
        <span class="caption">0,35% de 98,25% du Total</span>
      </td>
      <td width="20%"><input type="number" name="base_98-25" placeholder="Base de calcul" disabled> €</td>
      <td width="20%"><input type="number" name="CFPC" placeholder="Montant" disabled> €</td>
    </tr>
    <tr>
      <td width="60%"><span>Total Précomptes (1)</span></td>
      <td width="20%"></td>
      <td width="20%"><input type="number" name="total-precompte" placeholder="Total" disabled> €</td>
    </tr>
    <tr>
      <td width="60%">
        <span class="subheading">Total à verser à l'artiste auteur</span>
        <span class="caption">Montant TTC	− Total du précompte</span>
      </td>
      <td width="20%"></td>
      <td class="form__total" width="20%"><input type="number" name="total-artiste" placeholder="Total" class="subheading" disabled> €</td>
    </tr>
  </table>


  <h2 class="subheading">Contributions dues par le diffuseur à la Maison des Artistes</h2>


  <table class="body" width="100%">
    <tr>
      <th class="caption" width="60%">#Désignation</th>
      <th class="caption" width="20%">#Base de calcul</th>
      <th class="caption" width="20%">#Montant</th>
    </tr>
    <tr>
      <td width="60%">
        <span class="body">Contributions sociales</span>
        <span class="caption">1% du Total</span>
      </td>
      <td width="20%"><input type="number" name="total" placeholder="Base de calcul" disabled> €</td>
      <td width="20%"><input type="number" name="contribution-sociales" placeholder="Prix" disabled> €</td>
    </tr>
    <tr>
      <td width="60%">
        <span class="body">Contribution à la formation professionnelle</span>
        <span class="caption">0,1% du Total</span>
      </td>
      <td width="20%"><input type="number" name="total" placeholder="Base de calcul" disabled> €</td>
      <td width="20%"><input type="number" name="contribution-a-la-formation-professionnelle" placeholder="Prix" disabled> €</td>
    </tr>
    <tr>
      <td width="60%"><span class="body">Total des contributions diffuseur (2)</span></td>
      <td width="20%"></td>
      <td width="20%"><input type="number" name="total-des-contributions-diffuseur" placeholder="Total" disabled> €</td>
    </tr>
    <tr>
      <td width="60%">
        <span class="subheading">Total à verser à la maison des artistes (1+2)</span>
        <span class="caption">Total des précomptes + Total des contributions diffuseur</span>
      </td>
      <td width="20%"></td>
      <td class="form__total" width="20%"><input type="number" name="total-mda" placeholder="Total" class="subheading" disabled> €</td>
    </tr>
  </table>
