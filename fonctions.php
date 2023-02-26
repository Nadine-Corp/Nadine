<?php

// Ce fichier permet de centraliser tous les trucs
// que l'on demande tout le temps à Nadine.
// C'est peut-être le plus important de tous.


/**
 * La fonction nadine_query() simplifie les requêtes à la base de données
 */

function nadine_query($args)
{

  // Crée la variable $sql
  $sql = 'SELECT *';

  // Ajoute les propriété demandées
  foreach ($args as $key => $value) {
    // Traite le cas particulier de ORDER
    if ($key == 'ORDER') {
      $sql .= ' ' . $value;
    } else {
      $sql .= ' ' . $key . ' ' . $value;
    }
  };

  // Importe les info de connection à la base de donnée
  include 'config.php';

  // Vérifie si la connection à la base de donnée fonctionne
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

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

function nadine_insert($table, $data)
{

  $columns = implode(", ", array_keys($data));
  $values  = implode("', '", array_values($data));

  $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

  include 'query.php';
  $result = $conn->query($sql) or die($conn->error);
  $conn->close();
}


/**
 * La fonction the_projet_id() affiche l'ID d'un projet demandé
 */

function the_projet_id($row)
{
  // Récupère les infos du projet
  $projet__id = $row["projet__id"];

  // Retourne le résultat au template
  echo $projet__id;
}


/**
 * La fonction the_projet_name() affiche le nom d'un projet demandé
 */

function the_projet_name($row)
{
  // Récupère les infos du projet
  $projet__name = $row["projet__nom"];

  // Retourne le résultat au template
  echo $projet__name;
}


/**
 * La fonction the_projet_statut() affiche le statut d'un projet demandé
 */

function the_projet_statut($row)
{
  // Récupère les infos du projet
  $projet__statut = $row["projet__statut"];

  // Retourne le résultat au template
  echo $projet__statut;
}


/**
 * La fonction the_projet_class() affiche qq class dans la balise <article>
 */

function the_projet_class($row)
{
  $class  = 'l-projets__' . $row["projet__id"] . ' ';
  if ($row["projet__statut"] == 'Projet en cours') {
    $class .= 'l-projets__encours';
  } elseif ($row["projet__statut"] == 'Projet terminé') {
    $class .= 'l-projets__termine';
  } elseif ($row["projet__statut"] == 'Projet annulé') {
    $class .= 'l-projets__annule';
  }

  echo $class;
}


/**
 * La fonction the_projet_thumbnail() affiche une icone en fonction
 * du statut du projet demandé
 */

function the_projet_thumbnail($row)
{
  if ($row["projet__statut"] == 'Projet en cours') {
    $ico = get_template_part('./assets/img/ico_slightly-smiling-face.svg.php');
  } elseif ($row["projet__statut"] == 'Projet terminé') {
    $ico = get_template_part('./assets/img/ico_succes.svg.php');
  } else {
    $ico = get_template_part('./assets/img/ico_slightly-frowning-face.svg.php');
  }

  echo $ico;
}


/**
 * La fonction the_projet_date() affiche les dates
 * début et de fin du projet demandé
 */

function the_projet_date($row)
{

  // Récupère et formate la date du début du projet
  $date_de_debut = date_create($row["projet__date_de_creation"]);
  $date_de_debut = nadine_date($date_de_debut);

  // Récupère et formate la date de fin du projet (si elle existe)
  if (!empty($row["projet__date_de_fin"])) {
    $date_de_fin = date_create($row["projet__date_de_fin"]);
    $date_de_fin = " — " . nadine_date($date_de_fin);
  } else {
    $date_de_fin = "";
  };

  // Retourne le résultat au template
  echo $date_de_debut . $date_de_fin;
}


/**
 * La fonction the_projet_equipe() affiche les dates
 * début et de fin du projet demandé
 */

function the_projet_equipe($row)
{
  // Récupère la liste des artistes du projet
  $artistes = $row['artiste__id'];

  // Transforme la liste des artistes du projet en Array
  $artistes = unserialize($artistes);

  // Ajoute une variable pour stocker les info de chaque Artiste
  $list = '';


  // Récupère les infos du profil


  // Récupère les infos de chaque artistes du projet
  foreach ($artistes as $key => $artiste__id) {
    $args = array(
      'FROM'     => 'Artistes',
      'WHERE'    => 'Artistes.artiste__id =' . $artiste__id,
    );
    $loop = nadine_query($args);
    if ($loop->num_rows > 0) :
      while ($row = $loop->fetch_assoc()) :
        // Récupère les infos de l'artiste
        $civilite = $row["artiste__civilite"];
        $prenom = $row["artiste__prenom"];
        $nom = $row["artiste__nom"];

        // Retourne le résultat au template
        $artiste = nadine_nom($civilite, $prenom, $nom);
        $artiste = '<span class="m-body-s">' . $artiste . '</span>';
        $artiste = $artiste . '<span class="m-body-s">Artiste-Auteur</span>';

        $list .= '<li class="m-cover__artiste">' . $artiste . '</li>';
      endwhile;
    endif;
  }

  // Formate le résultat
  $list = '<ul>' . $list . '</ul>';

  // Retourne le résultat au template
  echo $list;
}


/**
 * La fonction the_diffuseur_societe() affiche le nom de société
 * des diffuseurs du projet demandé
 */

function the_diffuseur_societe($row)
{
  echo $row["diffuseur__societe"];
}


/**
 * La fonction the_diffuseur_nom() affiche la civilité, le Prénom
 * et le nom des diffuseurs du projet demandé
 */

function the_diffuseur_nom($row)
{
  // Récupère les infos du diffuseur
  $civilite = $row["diffuseur__civilite"];
  $prenom = $row["diffuseur__prenom"];
  $nom = $row["diffuseur__nom"];

  // Formate le nom
  $diffuseur_nom = nadine_nom($civilite, $prenom, $nom);

  // Retourne le résultat au template
  echo $diffuseur_nom;
}


/**
 * La fonction the_diffuseur_website() affiche le site internet
 * des diffuseurs du projet demandé
 */

function the_diffuseur_website($row)
{
  if (!empty($row['diffuseur__website'])) {
    // Récupère les infos du diffuseur
    $diffuseur__website = $row['diffuseur__website'];

    // Formate le titre du lien
    $link_title = $diffuseur__website;
    $link_title = str_replace('www.', '', $diffuseur__website);
    $link_title = str_replace('https://', '', $link_title);
    $link_title = str_replace('http://', '', $link_title);
    if (substr($link_title, -1) == '/') {
      $link_title = rtrim($link_title, "/");
    };
    $link_title = 'www.' . $link_title;

    // Formate l'URL du lien
    $link_url = $link_title;
    $link_url = 'https://' . $link_url;

    // Formate le résultat
    $link = '<a href="' . $link_url . '" target="_blank">' . $link_title . '</a>';

    // Retourne le résultat au template
    echo $link;
  }
}


/**
 * La fonction the_diffuseur_email() affiche l'email
 * des diffuseurs du projet demandé
 */

function the_diffuseur_email($row)
{
  if (!empty($row['diffuseur__email'])) {
    // Récupère les infos du diffuseur
    $diffuseur__email = $row['diffuseur__email'];

    // Formate le résultat
    $email = '<a href="mailto:' . $diffuseur__email . '" target="_blank">' . $diffuseur__email . '</a>';

    // Retourne le résultat au template
    echo $email;
  }
}


/**
 * La fonction the_diffuseur_telephone() affiche le numéro de téléphone
 * des diffuseurs du projet demandé
 */

function the_diffuseur_telephone($row)
{
  if (!empty($row['diffuseur__telephone'])) {
    // Récupère les infos du diffuseur
    $diffuseur__telephone = $row['diffuseur__telephone'];

    // Reset le format du numero de téléphone
    $phone_formated = $diffuseur__telephone;
    $phone_formated = str_replace(' ', '', $phone_formated);
    $phone_formated = str_replace('.', '', $phone_formated);

    // Formate le titre du numero de téléphone
    $phone_title = chunk_split($phone_formated, 2, " ");

    // Formate l'URL du numero de téléphone
    $phone_url = '+33' . $phone_formated;

    // Formate le résultat
    $phone = '<a href="tel:' . $phone_url . '" target="_blank">' . $phone_title . '</a>';

    // Retourne le résultat au template
    echo $phone;
  }
}


/**
 * La fonction the_diffuseur_adresse() affiche l'adresse
 * des diffuseurs du projet demandé
 */

function the_diffuseur_adresse($row)
{
  // Récupère les infos du diffuseur
  $adresse = $row['diffuseur__adresse'];
  $code_postal = $row['diffuseur__code_postal'];
  $ville = $row['diffuseur__ville'];

  // Formate l'adresse
  $link_title = $adresse . '<br>' . $code_postal . ' ' . $ville;

  // Formate l'URL
  $link_url = str_replace('<br>', ' ', $link_title);
  $link_url = str_replace(' ', '+', $link_url);
  $link_url = 'https://www.google.fr/maps/place/' . $link_url;

  // Formate le résultat
  $link = '<a href="' . $link_url . '" target="_blank">' . $link_title . '</a>';

  // Retourne le résultat au template
  echo $link;
}


/**
 * La fonction the_diffuseurs_list() permet d'afficher
 * la liste de tous les diffuseurs
 */

function the_diffuseurs_list()
{
  // Demande tous les diffuseurs à la base de donnée
  $args = array(
    'FROM'     => 'Diffuseurs',
    'ORDER BY' => 'diffuseur__societe'
  );
  $loop = nadine_query($args);


  // Formate chaque diffuseurs et les Retourne au template
  if ($loop->num_rows > 0) :
    while ($row = $loop->fetch_assoc()) :

      // Ajoute l'ID sur diffuseur en valeur
      echo '<option value=' . $row["diffuseur__id"] . '>';

      // Affiche le nom de société ou le nom et prenom du diffuseur
      // en fonction du type de diffuseur
      if ($row["diffuseur__type"] == 'particulier') {
        the_diffuseur_nom($row);
      } else {
        the_diffuseur_societe($row);
      }
      echo '</option>';

    endwhile;
  endif;
}


/**
 * La fonction the_artiste_societe() affiche le nom de société
 * des diffuseurs du projet demandé
 */

function the_artiste_societe($row)
{
  echo $row["artiste__societe"];
}


/**
 * La fonction the_artiste_nom() affiche la civilité, le Prénom
 * et le nom des artistes demandés
 */

function the_artiste_nom($row)
{
  // Récupère les infos de l'artiste
  $civilite = $row["artiste__civilite"];
  $prenom = $row["artiste__prenom"];
  $nom = $row["artiste__nom"];

  // Formate le nom
  $artiste_nom = nadine_nom($civilite, $prenom, $nom);

  // Retourne le résultat au template
  echo $artiste_nom;
}


/**
 * La fonction the_artistes_list() permet d'afficher
 * la liste de tous les diffuseurs
 */

function the_artistes_list()
{
  // Demande tous les diffuseurs à la base de donnée
  $args = array(
    'FROM'     => 'Artistes',
    'ORDER BY' => 'artiste__societe'
  );
  $loop = nadine_query($args);


  // Formate chaque diffuseurs et les Retourne au template
  if ($loop->num_rows > 0) :
    while ($row = $loop->fetch_assoc()) :

      // Ajoute l'ID sur diffuseur en valeur
      echo '<option value=' . $row["artiste__id"] . '>';

      // Affiche le nom de société ou le nom et prenom du diffuseur
      // en fonction du type de diffuseur
      if ($row["artiste__societe"]) {
        the_artiste_societe($row);
        echo ' — ';
        the_artiste_nom($row);
      } else {
        the_artiste_nom($row);
      }
      echo '</option>';

    endwhile;
  endif;
}


/**
 * La fonction the_date_today() permet de connaître
 * la date du jour
 */

function the_date_today()
{
  // Défini le fuseau horaire
  date_default_timezone_set('Europe/Paris');

  // Récupère la date du jour
  $date = new DateTime('now', new DateTimeZone('Europe/Paris'));

  // Formate la date «À la française»
  $dateFormatted  = IntlDateFormatter::formatObject($date, 'Y-MM-dd');

  // Retourne le résultat au template
  echo $dateFormatted;
}


/**
 * La fonction nadine_date() permet d'harmoniser
 * l'affichage des dates de Nadine
 */

function nadine_date($date)
{
  return date_format($date, 'M. Y');
}


/**
 * La fonction nadine_nom() permet d'harmoniser
 * l'affichage des noms de Nadine
 */

function nadine_nom($civilite, $prenom, $nom)
{
  return $civilite . ' ' . $prenom . ' ' . $nom;
}

/**
 * La fonction get_template_part() permet de stocker des fichiers
 * dans des variables
 */

function get_template_part($filename)
{
  if (is_file($filename)) {
    ob_start();
    include $filename;
    return ob_get_clean();
  }
  return 'Nadine n\'a pas trouvé le fichier ' . $filename;
}


/**
 * La fonction sanitize() convertie des chaînes de caractère
 * pour les transformer en .class plus classe
 */

function sanitize($string)
{
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

function get_num_version()
{
  if (($journal = fopen("./assets/csv/journal.csv", "r")) !== FALSE) {
    $numVersion = array();
    while (($data = fgetcsv($journal, 10000, ";")) !== FALSE) {
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

function check_if_precompte($diffuseur__id)
{

  // Vérifie si un Diffuseur ID a été envoyé avec la demande
  if (!empty($diffuseur__id)) {
    // Récupère les info du diffuseur dans la base de donnée
    $args = array(
      'FROM'     => 'Diffuseurs',
      'WHERE'    => 'diffuseur__id =' . $diffuseur__id
    );
    $loop = nadine_query($args);

    // Récupère le type du diffuseur
    if ($loop->num_rows > 0) :
      while ($row = $loop->fetch_assoc()) :
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
  if ($loop->num_rows > 0) :
    while ($row = $loop->fetch_assoc()) :
      $profil__precompte = $row['profil__precompte'];
    endwhile;
  endif;

  // Vérifie la valeur du précompte dans le dernier profil
  if ($profil__precompte == '1') {
    if (!empty($diffuseur__type)) {
      // Vérifie si le diffuseur est assujetti au precompte
      if (!$diffuseur__type == 'autre') {
        return false;
      }
    } else {
      // Retourne le résultat au template
      return true;
    }
  } else {
    // Retourne le résultat au template
    return false;
  }
}
