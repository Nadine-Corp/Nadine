<?php

// Ce fichier permet de centraliser tous les trucs
// que l'on demande tout le temps à Nadine.
// C'est peut-être le plus important de tous.


/**
* La fonction nadine_query() simplifie les requêtes à la base de données
*/

function nadine_query($args, $sql = 'SELECT *'){

  if ( $sql == 'SELECT *') {
    // Ajoute les propriétés demandées
    foreach($args as $key => $value) {
      // Traite le cas particulier de ORDER
      if ($key == 'ORDER') {
        $sql .= ' '.$value;
      }else {
        $sql .= ' '.$key.' '.$value;
      }
    };
  };

  // Importe les info de connexion à la base de donnée
  include 'config.php';

  // Vérifie si la connection à la base de donnée fonctionne
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

  // Modification du jeu de résultats en utf8mb4 (pour support des emojis)
  if (!$conn->set_charset("utf8mb4")) {
    printf("Erreur lors du chargement du jeu de caractères utf8mb4 : %s\n", $mysqli->error);
    exit();
  } else {
    $conn->character_set_name();
  }

  // Envoie la requête demandée à la base de données
  $result = $conn->query($sql) or die($conn->error);

  // Retourne le résultat au template
  return $result;
}


/**
* La fonction nadine_insert() simplifie l'ajout à la base de données
*/

function nadine_insert($table, $data){

  $columns = implode(", ",array_keys($data));
  $values  = implode("', '", array_values($data));

  $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

  include 'query.php'; $result = $conn->query($sql) or die($conn->error);
  $conn->close();
}


/**
* La fonction the_projet_id() affiche l'ID d'un projet demandé
*/

function the_projet_id($row){
  echo $row["projet__id"];
}


/**
* La fonction the_projet_name() affiche le nom d'un projet demandé
*/

function the_projet_name($row){
  echo $row["projet__nom"];
}


/**
* La fonction the_projet_statut() affiche le statut d'un projet demandé
*/

function the_projet_statut($row){
  echo $row["projet__statut"];
}


/**
* La fonction the_projet_class() affiche qq class dans la balise <article>
*/

function the_projet_class($row){

  // Ajoute l'id comme class
  $class  = 'l-projets__'.$row['projet__id'].' ';

  // Ajoute le statut comme class
  if ( $row['projet__statut'] == 'Projet en cours' ) {
    $class .= 'l-projets__encours';
  }elseif ($row['projet__statut'] == 'Projet terminé' ) {
    $class .= 'l-projets__termine';
  }elseif ($row['projet__statut'] == 'Projet annulé' ) {
    $class .= 'l-projets__annule';
  }

  // Retourne le résultat au template
  echo $class;
}


/**
* La fonction the_projet_thumbnail() affiche une icone en fonction
* du statut du projet demandé
*/

function the_projet_thumbnail($row){
  if ( $row["projet__statut"] == 'Projet en cours' ) {
    $ico = get_template_part('./assets/img/ico_slightly-smiling-face.svg.php');
  }elseif ($row["projet__statut"] == 'Projet terminé' ) {
    $ico = get_template_part('./assets/img/ico_succes.svg.php');
  }else {
    $ico = get_template_part('./assets/img/ico_slightly-frowning-face.svg.php');
  }

  echo $ico;
}


/**
* La fonction the_projet_date() affiche les dates
* début et de fin du projet demandé
*/

function the_projet_date($row){

  // Récupère et formate la date du début du projet
  $date_de_debut = date_create($row["projet__date_de_creation"]);
  $date_de_debut = nadine_date($date_de_debut);

  // Récupère et formate la date de fin du projet (si elle existe)
  if ( !empty( $row["projet__date_de_fin"] ) ){
    $date_de_fin = date_create($row["projet__date_de_fin"]);
    $date_de_fin = " — ".nadine_date($date_de_fin);
  }else{
    $date_de_fin = "";
  };

  // Retourne le résultat au template
  echo $date_de_debut.$date_de_fin;
}


/**
* La fonction the_projet_equipe() affiche les dates
* début et de fin du projet demandé
*/

function the_projet_equipe($row){
  // Récupère la liste des artistes du projet
  $artistes = $row['artiste__id'];

  // Transforme la liste des artistes du projet en Array
  $artistes = unserialize($artistes);

  // Ajoute une variable pour stocker les info de chaque Artiste
  $list = '';


  // Récupère les infos du profil
  if (isset($row['profil__id'])) {
    $args = array(
      'FROM'     => 'Profil',
      'WHERE'    => 'Profil.profil__id ='.$row['profil__id'],
    );
  }else {
    $args = array(
      'FROM'     => 'Profil',
      'ORDER BY' => 'profil__id',
      'ORDER'    => 'DESC',
      'LIMIT'    => 1
    );
  }

  $loop = nadine_query($args);
  if ($loop->num_rows > 0):
    while($row = $loop->fetch_assoc()):
      // Récupère les infos du profil
      $civilite = $row['profil__civilite'];
      $prenom = $row['profil__prenom'];
      $nom = $row['profil__nom'];

      // Formate les infos du profil
      $profil = nadine_nom($civilite, $prenom, $nom);
      $profil = '<span class="m-body-s"><em>'.$profil.'</em></span>';
      $profil = $profil.'<span class="m-body-s">Artiste-Auteur</span>';

      // Ajoute profil au résultat
      $list .= '<li class="m-cover__artiste">'.$profil.'</li>';
    endwhile;
  endif;

  // Récupère les infos de chaque artistes du projet
  foreach($artistes as $key => $artiste__id) {
    $args = array(
      'FROM'     => 'Artistes',
      'WHERE'    => 'Artistes.artiste__id ='.$artiste__id,
    );
    $loop = nadine_query($args);
    if ($loop->num_rows > 0):
      while($row = $loop->fetch_assoc()):
        // Récupère les infos de l'artiste
        $civilite = $row['artiste__civilite'];
        $prenom = $row['artiste__prenom'];
        $nom = $row['artiste__nom'];

        // Formate les infos du diffuseur
        $artiste = nadine_nom($civilite, $prenom, $nom);
        $artiste = '<span class="m-body-s"><em>'.$artiste.'</em></span>';
        $artiste = $artiste.'<span class="m-body-s">Artiste-Auteur</span>';

        // Ajoute l'artiste au résultat
        $list .= '<li class="m-cover__artiste">'.$artiste.'</li>';
      endwhile;
    endif;
  }

  // Formate le résultat
  $list = '<ul>'.$list.'</ul>';

  // Retourne le résultat au template
  echo $list;
}


/**
* La fonction get_diffuseur_societe() affiche le nom de société
* des diffuseurs du projet demandé
*/

function get_diffuseur_societe($row){
  // Récupère les infos du diffuseur
  $diffuseur_societe = $row["diffuseur__societe"];

  // Retourne le résultat au template
  return $diffuseur_societe;
}


/**
* La fonction the_diffuseur_societe() affiche le nom de société
* des diffuseurs du projet demandé
*/

function the_diffuseur_societe($row){
  // Récupère les infos du diffuseur
  $diffuseur_societe = get_diffuseur_societe($row);

  // Retourne le résultat au template
  echo $diffuseur_societe;
}


/**
* La fonction get_diffuseur_nom() affiche la civilité, le Prénom
* et le nom des diffuseurs du projet demandé
*/

function get_diffuseur_nom($row){
  // Récupère les infos du diffuseur
  $civilite = $row["diffuseur__civilite"];
  $prenom = $row["diffuseur__prenom"];
  $nom = $row["diffuseur__nom"];

  // Formate le nom
  $diffuseur_nom = nadine_nom($civilite, $prenom, $nom);

  // Retourne le résultat au template
  return $diffuseur_nom;
}


/**
* La fonction the_diffuseur_nom() affiche la civilité, le Prénom
* et le nom des diffuseurs du projet demandé
*/

function the_diffuseur_nom($row){
  // Récupère les infos du diffuseur
  $diffuseur_nom = get_diffuseur_nom($row);

  // Retourne le résultat au template
  echo $diffuseur_nom;
}


/**
* La fonction the_diffuseur_website() affiche le site internet
* des diffuseurs du projet demandé
*/

function the_diffuseur_website($row){
  if ( !empty( $row['diffuseur__website'] ) ){
    // Récupère les infos du diffuseur
    $diffuseur__website = $row['diffuseur__website'];

    // Formate le titre du lien
    $link_title = $diffuseur__website;
    $link_title = str_replace('www.','',$diffuseur__website);
    $link_title = str_replace('https://','',$link_title);
    $link_title = str_replace('http://','',$link_title);
    if ( substr($link_title, -1) == '/' ) {
      $link_title = rtrim($link_title, "/");
    };
    $link_title = 'www.'.$link_title;

    // Formate l'URL du lien
    $link_url = $link_title;
    $link_url = 'https://'.$link_url;

    // Formate le résultat
    $link = '<a href="'.$link_url.'" target="_blank">'.$link_title.'</a>';

    // Retourne le résultat au template
    echo $link;
  }
}


/**
* La fonction the_diffuseur_email() affiche l'email
* des diffuseurs du projet demandé
*/

function the_diffuseur_email($row){
  if ( !empty( $row['diffuseur__email'] ) ){
    // Récupère les infos du diffuseur
    $diffuseur__email = $row['diffuseur__email'];

    // Formate le résultat
    $email = '<a href="mailto:'.$diffuseur__email.'" target="_blank">'.$diffuseur__email.'</a>';

    // Retourne le résultat au template
    echo $email;
  }
}


/**
* La fonction the_diffuseur_telephone() affiche le numéro de téléphone
* des diffuseurs du projet demandé
*/

function the_diffuseur_telephone($row){
  if ( !empty( $row['diffuseur__telephone'] ) ){
    // Récupère les infos du diffuseur
    $diffuseur__telephone = $row['diffuseur__telephone'];

    // Reset le format du numero de téléphone
    $phone_formated = $diffuseur__telephone;
    $phone_formated = str_replace(' ','',$phone_formated);
    $phone_formated = str_replace('.','',$phone_formated);

    // Formate le titre du numero de téléphone
    $phone_title = chunk_split($phone_formated, 2, " ");

    // Formate l'URL du numero de téléphone
    $phone_url = '+33'.$phone_formated;

    // Formate le résultat
    $phone = '<a href="tel:'.$phone_url.'" target="_blank">'.$phone_title.'</a>';

    // Retourne le résultat au template
    echo $phone;
  }
}


/**
* La fonction the_diffuseur_adresse() affiche l'adresse
* des diffuseurs du projet demandé
*/

function the_diffuseur_adresse($row){
  // Récupère les infos du diffuseur
  $adresse = $row['diffuseur__adresse'];
  $code_postal = $row['diffuseur__code_postal'];
  $ville = $row['diffuseur__ville'];

  // Formate l'adresse
  $link_title = $adresse.'<br>'.$code_postal.' '.$ville;

  // Formate l'URL
  $link_url = str_replace('<br>',' ',$link_title);
  $link_url = str_replace(' ','+',$link_url);
  $link_url = 'https://www.google.fr/maps/place/'.$link_url;

  // Formate le résultat
  $link = '<a href="'.$link_url.'" target="_blank">'.$link_title.'</a>';

  // Retourne le résultat au template
  echo $link;
}


/**
* La fonction the_diffuseurs_list() permet d'afficher
* la liste de tous les diffuseurs
*/

function the_diffuseurs_list(){
  // Demande tous les diffuseurs à la base de donnée
  $args = array(
    'FROM'     => 'Diffuseurs',
    'ORDER BY' => 'diffuseur__societe'
  );
  $loop = nadine_query($args);


  // Formate chaque diffuseurs et les Retourne au template
  if ($loop->num_rows > 0):
    while($row = $loop->fetch_assoc()):

      // Ajoute l'ID sur diffuseur en valeur
      echo '<option value='.$row["diffuseur__id"].'>';

      // Affiche le nom de société ou le nom et prenom du diffuseur
      // en fonction du type de diffuseur
      if ($row["diffuseur__type"] == 'particulier') {
        the_diffuseur_nom($row);
      }else {
        the_diffuseur_societe($row);
      }
      echo '</option>';

    endwhile;
  endif;
}


/**
* La fonction get_artiste_societe() affiche le nom de société
* des artistes du projet demandé
*/

function get_artiste_societe($row){
  // Récupère les infos de l'artiste
  $artiste_societe = $row["artiste__societe"];

  // Retourne le résultat au template
  return $artiste_societe;
}



/**
* La fonction the_artiste_societe() affiche le nom de société
* des artistes du projet demandé
*/

function the_artiste_societe($row){
  // Récupère les infos de l'artiste
  $artiste_societe = get_artiste_societe($row);

  // Retourne le résultat au template
  echo $row["artiste__societe"];
}


/**
* La fonction get_artiste_nom() affiche la civilité, le Prénom
* et le nom des artistes demandés
*/

function get_artiste_nom($row){
  // Récupère les infos de l'artiste
  $civilite = $row["artiste__civilite"];
  $prenom = $row["artiste__prenom"];
  $nom = $row["artiste__nom"];

  // Formate le nom
  $artiste_nom = nadine_nom($civilite, $prenom, $nom);

  // Retourne le résultat au template
  return $artiste_nom;
}


/**
* La fonction the_artiste_nom() affiche la civilité, le Prénom
* et le nom des artistes demandés
*/

function the_artiste_nom($row){
  // Récupère les infos de l'artiste
  $artiste_nom = get_artiste_nom($row);

  // Retourne le résultat au template
  echo $artiste_nom;
}



/**
* La fonction the_artistes_list() permet d'afficher
* la liste de tous les diffuseurs
*/

function the_artistes_list(){
  // Demande tous les diffuseurs à la base de donnée
  $args = array(
    'FROM'     => 'Artistes',
    'ORDER BY' => 'artiste__societe'
  );
  $loop = nadine_query($args);


  // Formate chaque diffuseurs et les Retourne au template
  if ($loop->num_rows > 0):
    while($row = $loop->fetch_assoc()):

      // Ajoute l'ID sur diffuseur en valeur
      echo '<option value='.$row["artiste__id"].'>';

      // Affiche le nom de société ou le nom et prenom du diffuseur
      // en fonction du type de diffuseur
      if ($row["artiste__societe"]) {
        the_artiste_societe($row);
        echo ' — ';
        the_artiste_nom($row);
      }else {
        the_artiste_nom($row);
      }
      echo '</option>';

    endwhile;
  endif;
}


/**
* La fonction the_contact_societe() affiche la civilité, le Prénom
* et le nom d'un contact
*/

function the_contact_societe($row){
  // Récupére la bonne table
  $table = get_contact_table($row);

  // Récupère les infos du contact
  if ($table == 'Artistes') {
    $contact_societe = get_artiste_societe($row);
  }else {
    $contact_societe = get_diffuseur_societe($row);
  }

  // Retourne le résultat au template
  echo $contact_societe;
}


/**
* La fonction the_contact_name() affiche la civilité, le Prénom
* et le nom d'un contact
*/

function the_contact_name($row){
  // Récupére la bonne table
  $table = get_contact_table($row);

  // Récupère les infos du contact
  if ($table == 'Artistes') {
    $contact_nom = get_artiste_nom($row);
  }else {
    $contact_nom = get_diffuseur_nom($row);
  }

  // Retourne le résultat au template
  echo $contact_nom;
}


/**
* La fonction the_contact_id() affiche l'ID d'un contact demandé
*/

function the_contact_id($row){
  echo "string";
}


/**
* La fonction the_contact_class() affiche qq class
* dans la balise <article> des contacts
*/

function the_contact_class($row){
  echo "string";
}


/**
* La fonction get_contact_table() savoir si le template
* doit afficher les infos d'un devis ou d'une facture
*/

function get_contact_table($row){
  if ( !empty( $row['diffuseur__id'] ) ){
    $table = 'Diffuseurs';
  }else {
    $table = 'Artistes';
  };
  return $table;
}


/**
* La fonction the_facture_numero() permet d'afficher
* le numero d'un devis ou d'une facture
*/

function the_facture_numero($row){
  // Récupére la bonne table
  $table = get_facture_table($row);

  // Recupère le numero de facture
  $facture_numero = $row[$table.'__numero'];

  // Retourne le résultat au template
  echo $facture_numero;
}


/**
* La fonction the_facture_class() affiche qq class
* dans la balise <article> des devis ou des facture
*/

function the_facture_class($row){
  // Récupére la bonne table
  $table = get_facture_table($row);

  // Ajoute l'id comme class
  $class = 'p-facture__'.$row[$table.'__id'].' ';

  // Recupère le statut de facture
  $facture_statut = $row[$table.'__statut'];
  $class .= sanitize('p-facture__'.$facture_statut);

  // Retourne le résultat au template
  echo $class;
}


/**
* La fonction the_facture_statut() permet d'afficher
* le staut d'un devis ou d'une facture
*/

function the_facture_statut($row){
  // Récupére la bonne table
  $table = get_facture_table($row);

  // Recupère le statut de facture
  $facture_statut = $row[$table.'__statut'];

  // Retourne le résultat au template
  echo $facture_statut;
}


/**
* La fonction the_facture_link() permet d'afficher
* le lien vers la page devis ou  facture
*/

function the_facture_link($row){
  // Récupére la bonne table
  $table = get_facture_table($row);

  // Recupère le numero de facture
  $facture_id = $row[$table.'__id'];

  // Recupère le résultat de facture
  $facture_link = './'.$table.'__modifier.php?'.$table.'__id='.$facture_id;

  // Retourne le résultat au template
  echo $facture_link;
}


/**
* La fonction the_facture_date() permet d'afficher
* la date de création du devis ou de la facture
*/

function the_facture_date($row){
  // Récupére la bonne table
  $table = get_facture_table($row);

  // Recupère le numero de facture
  $facture_date = date_create($row[$table.'__date']);

  // Formate la réponse
  $facture_date = nadine_date($facture_date);

  // Retourne le résultat au template
  echo $facture_date;
}


/**
* La fonction the_facture_total_auteur() permet d'afficher
* le total d'un devis ou d'une facture
*/

function the_facture_total_auteur($row){
  // Récupére la bonne table
  $table = get_facture_table($row);

  // Recupère le total de facture
  $facture_total = $row[$table.'__total'];

  // Formate le résultat
  $facture_total = nadine_prix($facture_total);

  // Retourne le résultat au template
  echo $facture_total;
}


/**
* La fonction the_facture_total_ht() permet d'afficher
* le total hors taxe d'un devis ou d'une facture
*/

function the_facture_total_ht($row){
  // Récupére la bonne table
  $table = get_facture_table($row);

  // Ajoute une variable pour calculer le total
  $facture_total_ht = 0;

  // Recupère le prix de chaque de tâche de la facture
  for ($i = 1; $i <= 7; $i++) {
    $prix = $row[$table.'__prix_'.$i];
    $prix = floatval($prix);
    $facture_total_ht += $prix;
  }

  // Formate le résultat
  $facture_total_ht = nadine_prix($facture_total_ht);

  // Retourne le résultat au template
  echo $facture_total_ht;
}


/**
* La fonction the_facture_table() d'afficher si le template
* doit afficher les infos d'un devis ou d'une facture
*/

function the_facture_table($row){
  if ( !empty( $row['devis__numero'] ) ){
    $table = 'Devis';
  }else {
    if ( !empty( $row['facture__numero'] ) ){
      $table = 'Facture';
    }else {
      $table = "Facture d'acompte";
    }
  };
  echo $table;
}


/**
* La fonction get_facture_table() savoir si le template
* doit afficher les infos d'un devis ou d'une facture
*/

function get_facture_table($row){
  if ( !empty( $row['devis__numero'] ) ){
    $table = 'devis';
  }else {
    if ( !empty( $row['facture__numero'] ) ){
      $table = 'facture';
    }else {
      $table = 'facturesacompte';
    }
  };
  return $table;
}


/**
* La fonction the_date_today() permet de connaître
* la date du jour
*/

function the_date_today(){
  // Défini le fuseau horaire
  date_default_timezone_set('Europe/Paris');

  // Récupère la date du jour
  $date = new DateTime('now', new DateTimeZone('Europe/Paris'));

  // Formate la date «À la française»
  $dateFormatted  = IntlDateFormatter::formatObject($date,'Y-MM-dd');

  // Retourne le résultat au template
  echo $dateFormatted;
}


/**
* La fonction nadine_date() permet d'harmoniser
* l'affichage des dates de Nadine
*/

function nadine_date($date) {
  // Défini le fuseau horaire
  date_default_timezone_set('Europe/Paris');

  // Formate la date «À la française»
  $dateFormatted = IntlDateFormatter::formatObject($date,'LLL Y');
  $dateFormatted = ucwords($dateFormatted);

  // Retourne le résultat au template
  return $dateFormatted;
}


/**
* La fonction nadine_nom() permet d'harmoniser
* l'affichage des noms sur Nadine
*/

function nadine_nom($civilite, $prenom, $nom) {
  return $civilite.' '.$prenom.' '.$nom;
}


/**
* La fonction nadine_prix() permet d'harmoniser
* l'affichage de prix sur Nadine
*/

function nadine_prix($prix) {
  $prix = number_format($prix, 2, ',' , ' ').' €';
  return $prix;
}


/**
* La fonction get_template_part() permet de stocker des fichiers
* dans des variables
*/

function get_template_part($filename) {
  if (is_file($filename)) {
    ob_start();
    include $filename;
    return ob_get_clean();
  }
  return 'Nadine n\'a pas trouvé le fichier '.$filename;
}


/**
* La fonction sanitize() convertie des chaînes de caractère
* pour les transformer en .class plus classe
*/

function sanitize($string){
  // Change les caractères accentués
  $string = strtr(utf8_decode($string), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
  // Modifie tous les caractères spéciaux et les espaces
  $string = filter_var($string, FILTER_SANITIZE_URL);
  // Met tous les caractères en minuscules
  $string = mb_strtolower($string);
  // Revoie la chaine de caractère modifiée
  return $string;
}


/**
* La fonction get_num_version() récupère le dernier Numéros de version de Nadine.
* dans le journal de développement
*/

function get_num_version(){
  if (($journal = fopen("./assets/csv/journal.csv", "r")) !== FALSE){
    $numVersion = array();
    while (($data = fgetcsv($journal, 10000, ";")) !== FALSE){
      $numVersion[] = $data;
    }
    fclose($journal);

    // Extraire le dernier numéros de version du journal
    $numVersion = $numVersion[0][0];

    // Envoie le numéros de version
    return $numVersion;
  }
}


/**
* La fonction check_if_precompte() permet de savoir si un projet doit utiliser
* ou pas le systeme de précompte
*/

function check_if_precompte($diffuseur__id){

  // Vérifie si un Diffuseur ID a été envoyé avec la demande
  if ( !empty( $diffuseur__id ) ){
    // Récupère les info du diffuseur dans la base de donnée
    $args = array(
      'FROM'     => 'Diffuseurs',
      'WHERE'    => 'diffuseur__id ='.$diffuseur__id
    );
    $loop = nadine_query($args);

    // Récupère le type du diffuseur
    if ($loop->num_rows > 0):
      while($row = $loop->fetch_assoc()):
        $diffuseur__type = $row['diffuseur__type'];
      endwhile;
    endif;
  }

  // Récupère le dernier profil dans la base de donnée
  $args = array(
    'FROM'     => 'Profil',
    'ORDER BY' => 'profil__id',
    'ORDER'    => 'DESC',
    'LIMIT'    => 1
  );
  $loop = nadine_query($args);

  // Récupère la valeur du précompte dans le dernier profil
  if ($loop->num_rows > 0):
    while($row = $loop->fetch_assoc()):
      $profil__precompte = $row['profil__precompte'];
    endwhile;
  endif;

  // Vérifie la valeur du précompte dans le dernier profil
  if ($profil__precompte == '1') {
    if ( !empty( $diffuseur__type ) ){
      // Vérifie si le diffuseur est assujetti au precompte
      if (!$diffuseur__type == 'autre') {
        return false;
      }
    }else{
      // Retourne le résultat au template
      return true;
    }
  }else{
    // Retourne le résultat au template
    return false;
  }
}

?>
