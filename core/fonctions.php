<?php

// Ce fichier permet de centraliser tous les trucs
// que l'on demande tout le temps à Nadine.
// C'est peut-être le plus important de tous.


/**
 * La fonction nadine_query() simplifie les requêtes à la base de données
 */

function nadine_query($args, $sql = 'SELECT *')
{

  if ($sql == 'SELECT *') {
    // Ajoute les propriétés demandées
    foreach ($args as $key => $value) {
      // Traite le cas particulier de ORDER
      if ($key == 'ORDER') {
        $sql .= ' ' . $value;
      } else {
        $sql .= ' ' . $key . ' ' . $value;
      }
    };
  };


  // Importe les info de connexion à la base de donnée
  require(__DIR__ . '/config.php');

  // Vérifie si la connection à la base de donnée fonctionne
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } else {
    //echo 'Test de connection ok<br>';
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
  $conn->close();

  // Retourne le résultat au template
  return $result;
}


/**
 * La fonction nadine_insert() simplifie l'ajout à la base de données
 */

function nadine_insert($table, $primaryKey, $data)
{
  // Vérifie la structure de la base de données
  include_once(__DIR__ . '/database/db__check.php');

  // Exclure la colonne diffuseur__id
  unset($data[$primaryKey]);

  // Formate la requête SQL
  $columns = implode(", ", array_keys($data));
  $values  = implode("', '", array_values($data));

  $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

  require(__DIR__ . '/query.php');
  $conn->query($sql) or die($conn->error);
  $conn->close();
}


/**
 * La fonction nadine_update() simplifie la mise à jour de la base de données
 */

function nadine_update($table, $primaryKey, $data)
{
  // Vérifie la structure de la base de données
  include_once(__DIR__ . '/database/db__check.php');

  // Formate la requête SQL
  $sql = "UPDATE $table SET ";

  // Formate la requête SQL
  foreach ($data as $key => $value) {
    if ($key != $primaryKey) {
      $sql .= $key . " = '" . $value . "', ";
    }
  };

  $sql = substr($sql, 0, -2);

  // Formate la requête SQL
  $sql .= " WHERE " . $primaryKey . " = " . $data[$primaryKey];

  require(__DIR__ . '/query.php');
  $conn->query($sql) or die($conn->error);
  $conn->close();
}


/**
 * La fonction the_projet_id() affiche l'ID d'un projet demandé
 */

function the_projet_id($row)
{
  if (isset($row)) {
    // Retourne le résultat au template
    echo $row["projet__id"];
  }
}


/**
 * La fonction the_projet_name() affiche le nom d'un projet demandé
 */

function the_projet_name($row)
{
  if (isset($row)) {
    // Retourne le résultat au template
    echo $row["projet__nom"];
  }
}


/**
 * La fonction the_projet_statut() affiche le statut d'un projet demandé
 */

function the_projet_statut($row)
{
  if (isset($row)) {
    // Retourne le résultat au template
    echo $row["projet__statut"];
  }
}


/**
 * La fonction get_projet_retrocession() affiche l'ID d'un projet demandé
 */

function get_projet_retrocession($row)
{
  if (isset($row)) {
    // Récupère la liste des artistes du projet
    $artistes = $row['artiste__id'];

    // Transforme la liste des artistes du projet en Array
    $artistes = unserialize($artistes);

    if (is_array($artistes) && count($artistes) > 0) {
      // Retourne le résultat au template
      return 1;
    } else {
      // Retourne le résultat au template
      return 0;
    }
  }
}


/**
 * La fonction the_projet_class() affiche qq class dans la balise <article>
 */

function the_projet_class($row)
{
  if (isset($row)) {

    // Ajoute l'id comme class
    $class  = 'l-projets__' . $row['projet__id'] . ' ';

    // Ajoute le statut comme class
    if ($row['projet__statut'] == 'Projet en cours') {
      $class .= 'l-projets__encours';
    } elseif ($row['projet__statut'] == 'Projet terminé') {
      $class .= 'l-projets__termine';
    } elseif ($row['projet__statut'] == 'Projet annulé') {
      $class .= 'l-projets__annule';
    }

    // Retourne le résultat au template
    echo $class;
  }
}


/**
 * La fonction the_projet_thumbnail() affiche une icone en fonction
 * du statut du projet demandé
 */

function the_projet_thumbnail($row)
{
  if (isset($row)) {
    if ($row["projet__statut"] == 'Projet en cours') {
      $ico = get_template_part('./assets/img/ico_slightly-smiling-face.svg.php');
    } elseif ($row["projet__statut"] == 'Projet terminé') {
      $ico = get_template_part('./assets/img/ico_succes.svg.php');
    } else {
      $ico = get_template_part('./assets/img/ico_slightly-frowning-face.svg.php');
    }

    // Retourne le résultat au template
    echo $ico;
  }
}


/**
 * La fonction the_projet_date_de_creation()
 * affiche la date du début du projet demandé
 */

function the_projet_date_de_creation($row)
{
  if (isset($row)) {
    // Récupère et formate la date du début du projet
    $date_de_debut = $row["projet__date_de_creation"];

    // Retourne le résultat au template
    echo $date_de_debut;
  } else {
    // Sinon : Récupère, formate et retourne
    // la date du jour au template
    the_date_today();
  }
}


/**
 * La fonction the_projet_date_de_fin()
 * affiche la date de fin du projet demandé
 */

function the_projet_date_de_fin($row)
{
  if (isset($row)) {
    // Récupère et formate la date du début du projet
    $date_de_fin = $row["projet__date_de_fin"];

    // Retourne le résultat au template
    echo $date_de_fin;
  }
}


/**
 * La fonction the_projet_date() affiche les dates
 * début et de fin du projet demandé
 */

function the_projet_date($row)
{
  if (isset($row)) {
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
}



/**
 * La fonction the_projet_equipe() affiche la liste
 * des artites travaillant sur un projet
 */

function the_projet_equipe($row)
{
  if (isset($row)) {
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
        'WHERE'    => 'Profil.profil__id =' . $row['profil__id'],
      );
    } else {
      $args = array(
        'FROM'     => 'Profil',
        'ORDER BY' => 'profil__id',
        'ORDER'    => 'DESC',
        'LIMIT'    => 1
      );
    }

    $loop = nadine_query($args);
    if ($loop->num_rows > 0) :
      while ($row = $loop->fetch_assoc()) :
        // Récupère les infos du profil
        $civilite = $row['profil__civilite'];
        $prenom = $row['profil__prenom'];
        $nom = $row['profil__nom'];

        // Formate les infos du profil
        $profil = nadine_name($civilite, $prenom, $nom);
        $profil = '<span class="m-body-s"><em>' . $profil . '</em></span>';
        $profil = $profil . '<span class="m-body-s">Artiste-Auteur</span>';

        // Ajoute profil au résultat
        $list .= '<li class="m-cover__artiste">' . $profil . '</li>';
      endwhile;
    endif;

    // Récupère les infos de chaque artistes du projet
    if ($artistes) {
      foreach ($artistes as $key => $artiste__id) {
        $args = array(
          'FROM'     => 'Artistes',
          'WHERE'    => 'Artistes.artiste__id =' . $artiste__id,
        );
        $loop = nadine_query($args);
        if ($loop->num_rows > 0) :
          while ($row = $loop->fetch_assoc()) :
            // Récupère les infos de l'artiste
            $civilite = get_artiste_civilite($row);
            $prenom = get_artiste_prenom($row);
            $nom = get_artiste_nom($row);

            // Formate les infos du diffuseur
            $artiste = nadine_name($civilite, $prenom, $nom);
            $artiste = '<span class="m-body-s"><em>' . $artiste . '</em></span>';
            $artiste = $artiste . '<span class="m-body-s">Artiste-Auteur</span>';

            // Ajoute l'artiste au résultat
            $list .= '<li class="m-cover__artiste">' . $artiste . '</li>';
          endwhile;
        endif;
      }
    }

    // Formate le résultat
    $list = '<ul>' . $list . '</ul>';

    // Retourne le résultat au template
    echo $list;
  }
}


/**
 * La fonction the_projet_input_equipe() affiche les inputs
 * permettant de modifier les équipiers dans la modal ajout un projet
 */

function the_projet_input_equipe($row)
{
  if (isset($row)) {

    // Récupère la liste des artistes du projet
    $artistes = $row['artiste__id'];

    // Transforme la liste des artistes du projet en Array
    $artistes = unserialize($artistes);

    // Récupère les infos de chaque artistes du projet
    if (is_array($artistes) && count($artistes) > 0) {

      //Ajoute un compteur
      $artisteNb = 0;

      foreach ($artistes as $key => $artiste__id) {
        // Incrémente le compteur
        $artisteNb++;

        // Ajoute l'artiste au résultat
        include(__DIR__ . '/../parts/p__modal-projet-input-equipe.php');
      }
    } else {
      include(__DIR__ . '/../parts/p__modal-projet-input-equipe.php');
    }
  } else {
    include(__DIR__ . '/../parts/p__modal-projet-input-equipe.php');
  }
}


/**
 * La fonction get_diffuseur_id() affiche l'ID du diffuseur demandé
 */

function get_diffuseur_id($row)
{
  if (isset($row)) {
    // Retourne le résultat au template
    return $row["diffuseur__id"];
  }
}


/**
 * La fonction the_diffuseur_id() affiche l'ID du diffuseur demandé
 */

function the_diffuseur_id($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur_id = get_diffuseur_id($row);

    // Retourne le résultat au template
    echo $diffuseur_id;
  }
}


/**
 * La fonction get_diffuseur_societe() affiche le nom de société
 * des diffuseurs du projet demandé
 */

function get_diffuseur_societe($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur_societe = $row["diffuseur__societe"];

    // Retourne le résultat au template
    return $diffuseur_societe;
  }
}


/**
 * La fonction the_diffuseur_societe() affiche le nom de société
 * des diffuseurs du projet demandé
 */

function the_diffuseur_societe($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur_societe = get_diffuseur_societe($row);

    // Retourne le résultat au template
    echo $diffuseur_societe;
  }
}


/**
 * La fonction get_diffuseur_siret() affiche
 * le SIRET d'un artiste
 */

function get_diffuseur_siret($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur_siret = $row["diffuseur__siret"];

    // Retourne le résultat au template
    return $diffuseur_siret;
  }
}


/**
 * La fonction get_diffuseur_civilite() affiche la civilité d'un difffuseur
 */

function get_diffuseur_civilite($row)
{
  if (isset($row)) {
    if (!empty($row['diffuseur__civilite'])) {
      // Récupère les infos du diffuseur
      $diffuseur_civilite = $row["diffuseur__civilite"];

      // Formate le résultat
      if (strpos($diffuseur_civilite, 'Mme') === 0) {
        $diffuseur_civilite = "Mme";
      }

      // Retourne le résultat au template
      return $diffuseur_civilite;
    }
  }
}


/**
 * La fonction get_diffuseur_nom() affiche le nom d'un difffuseur demandé
 */

function get_diffuseur_nom($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur_nom = $row["diffuseur__nom"];

    // Formate le résultat
    $diffuseur_nom = ucwords(strtolower($diffuseur_nom));

    // Retourne le résultat au template
    return $diffuseur_nom;
  }
}


/**
 * La fonction the_diffuseur_nom() affiche le nom d'un difffuseur demandé
 */

function the_diffuseur_nom($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur_nom = get_diffuseur_nom($row);

    // Retourne le résultat au template
    return $diffuseur_nom;
  }
}


/**
 * La fonction get_diffuseur_prenom() affiche le prénom d'un difffuseur demandé
 */

function get_diffuseur_prenom($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur_prenom = $row["diffuseur__prenom"];

    // Formate le résultat
    $diffuseur_prenom = ucwords(strtolower($diffuseur_prenom));

    // Retourne le résultat au template
    return $diffuseur_prenom;
  }
}


/**
 * La fonction get_diffuseur_name() affiche la civilité, le Prénom
 * et le nom des diffuseurs du projet demandé
 */

function get_diffuseur_name($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $civilite = get_diffuseur_civilite($row);
    $prenom = get_diffuseur_prenom($row);
    $nom = get_diffuseur_nom($row);

    // Formate le nom
    $diffuseur_name = nadine_name($civilite, $prenom, $nom);

    // Retourne le résultat au template
    return $diffuseur_name;
  }
}


/**
 * La fonction the_diffuseur_name() affiche la civilité, le Prénom
 * et le nom des diffuseurs du projet demandé
 */

function the_diffuseur_name($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur_name = get_diffuseur_name($row);

    // Retourne le résultat au template
    echo $diffuseur_name;
  }
}


/**
 * La fonction get_diffuseur_website() affiche le site internet
 * des diffuseurs du projet demandé
 */

function get_diffuseur_website($row)
{
  if (isset($row)) {
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

      // Retourne le résultat au template
      return $link_title;
    }
  }
}


/**
 * La fonction the_diffuseur_website() affiche le site internet
 * des diffuseurs du projet demandé
 */

function the_diffuseur_website($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur__website = get_diffuseur_website($row);

    // Formate l'URL du lien
    $link_url = $diffuseur__website;
    $link_url = 'https://' . $link_url;

    // Formate le résultat
    $link = '<a href="' . $link_url . '" target="_blank">' . $diffuseur__website . '</a>';

    // Retourne le résultat au template
    echo $link;
  }
}


/**
 * La fonction get_diffuseur_email() affiche l'email
 * des diffuseurs du projet demandé
 */

function get_diffuseur_email($row)
{
  if (isset($row)) {
    if (!empty($row['diffuseur__email'])) {
      // Récupère les infos du diffuseur
      $diffuseur__email = $row['diffuseur__email'];

      // Retourne le résultat au template
      return $diffuseur__email;
    }
  }
}


/**
 * La fonction the_diffuseur_email() affiche l'email
 * des diffuseurs du projet demandé
 */

function the_diffuseur_email($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur__email = get_diffuseur_email($row);

    // Formate le résultat
    $email = '<a href="mailto:' . $diffuseur__email . '" target="_blank">' . $diffuseur__email . '</a>';

    // Retourne le résultat au template
    echo $diffuseur__email;
  }
}


/**
 * La fonction the_diffuseur_telephone() affiche le numéro de téléphone
 * des diffuseurs du projet demandé
 */

function get_diffuseur_telephone($row)
{
  if (isset($row)) {
    if (!empty($row['diffuseur__telephone'])) {
      // Récupère les infos du diffuseur
      $diffuseur__telephone = $row['diffuseur__telephone'];

      // Reset le format du numero de téléphone
      $phone_formated = $diffuseur__telephone;
      $phone_formated = str_replace(' ', '', $phone_formated);
      $phone_formated = str_replace('.', '', $phone_formated);

      // Formate le titre du numero de téléphone
      $phone_title = chunk_split($phone_formated, 2, " ");

      // Retourne le résultat au template
      return $phone_title;
    }
  }
}


/**
 * La fonction the_diffuseur_telephone() affiche le numéro de téléphone
 * des diffuseurs du projet demandé
 */

function the_diffuseur_telephone($row)
{
  if (isset($row)) {
    if (!empty($row['diffuseur__telephone'])) {
      // Récupère les infos du diffuseur
      $diffuseur__telephone = get_diffuseur_telephone($row);

      // Formate l'URL du numero de téléphone
      $phone_url = str_replace(' ', '', $diffuseur__telephone);
      $phone_url = '+33' . $phone_url;

      // Formate le résultat
      $diffuseur__telephone = '<a href="tel:' . $phone_url . '" target="_blank">' . $diffuseur__telephone . '</a>';

      // Retourne le résultat au template
      echo $diffuseur__telephone;
    }
  }
}


/**
 * La fonction get_diffuseur_adresse() affiche l'adresse
 * des diffuseurs du projet demandé
 */

function get_diffuseur_adresse($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur__adresse = $row['diffuseur__adresse'];

    // Retourne le résultat au template
    return $diffuseur__adresse;
  }
}


/**
 * La fonction get_diffuseur_code_postal() affiche le code postal
 * des diffuseurs du projet demandé
 */

function get_diffuseur_code_postal($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur__code_postal = $row['diffuseur__code_postal'];

    // Formate le résultat
    $diffuseur__code_postal = str_replace(' ', '', $diffuseur__code_postal);

    // Retourne le résultat au template
    return $diffuseur__code_postal;
  }
}


/**
 * La fonction get_diffuseur_ville() affiche le code postal
 * des diffuseurs du projet demandé
 */

function get_diffuseur_ville($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur__ville = $row['diffuseur__ville'];

    // Retourne le résultat au template
    return $diffuseur__ville;
  }
}


/**
 * La fonction get_diffuseur_pays() affiche le pays
 * des diffuseyr du projet demandé
 */

function get_diffuseur_pays($row)
{
  if (isset($row)) {
    if (!empty($row['diffuseur__pays'])) {
      // Récupère les infos du artiste
      $diffuseur__pays = $row['diffuseur__pays'];

      // Formate le résultat
      $diffuseur__pays = ucwords(strtolower($diffuseur__pays));

      // Retourne le résultat au template
      return $diffuseur__pays;
    }
  }
}


/**
 * La fonction the_diffuseur_full_adresse() affiche l'adresse
 * des diffuseurs du projet demandé
 */

function the_diffuseur_full_adresse($row)
{
  if (isset($row)) {
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
}


/**
 * La fonction the_diffuseur_type() permet d'afficher
 * le type de diffuseur
 */

function the_diffuseur_type($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseyr
    $diffuseur__type = $row["diffuseur__type"];

    // Retourne le résultat au template
    echo $diffuseur__type;
  }
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
 * La fonction get_artiste_id() affiche l'ID de l'artiste demandé
 */

function get_artiste_id($row)
{
  if (isset($row)) {
    // Récupère les infos de l'artiste
    $artiste__id = $row["artiste__id"];

    // Retourne le résultat au template
    return $artiste__id;
  }
}



/**
 * La fonction get_artiste_societe() affiche le nom de société
 * des artistes du projet demandé
 */

function get_artiste_societe($row)
{
  if (isset($row)) {
    // Récupère les infos de l'artiste
    $artiste__societe = $row["artiste__societe"];

    // Retourne le résultat au template
    return $artiste__societe;
  }
}



/**
 * La fonction the_artiste_societe() affiche le nom de société
 * des artistes du projet demandé
 */

function the_artiste_societe($row)
{
  if (isset($row)) {
    // Récupère les infos de l'artiste
    $artiste__societe = get_artiste_societe($row);

    // Retourne le résultat au template
    echo $artiste__societe;
  }
}



/**
 * La fonction get_artiste_siret() affiche
 * le SIRET d'un artiste
 */

function get_artiste_siret($row)
{
  if (isset($row)) {
    // Récupère les infos de l'artiste
    $artiste_siret = $row["artiste__siret"];

    // Retourne le résultat au template
    return $artiste_siret;
  }
}


/**
 * La fonction the_artiste_numero_secu() affiche le numéro
 * de sécurité sociale de l'artiste demandé
 */

function the_artiste_numero_secu($row)
{
  if (isset($row)) {
    if (!empty($row['artiste__numero_secu'])) {
      // Récupère les infos de l'artiste
      $artiste__numero_secu = $row['artiste__numero_secu'];

      // Retourne le résultat au template
      echo $artiste__numero_secu;
    }
  }
}


/**
 * La fonction the_artiste_numero_mda() affiche le numéro
 * de Maison des Artistes de l'artiste demandé
 */

function the_artiste_numero_mda($row)
{
  if (isset($row)) {
    if (!empty($row['artiste__numero_mda'])) {
      // Récupère les infos de l'artiste
      $artiste__numero_mda = $row['artiste__numero_mda'];

      // Retourne le résultat au template
      echo $artiste__numero_mda;
    }
  }
}

/**
 * La fonction get_artiste_civilite() affiche la civilité d'un artiste
 */

function get_artiste_civilite($row)
{
  if (isset($row)) {
    if (!empty($row['artiste__civilite'])) {
      // Récupère les infos de l'artiste
      $artiste_civilite = $row["artiste__civilite"];

      // Formate le résultat
      if (strpos($artiste_civilite, 'Mme') === 0) {
        $artiste_civilite = "Mme";
      }

      // Retourne le résultat au template
      return $artiste_civilite;
    }
  }
}


/**
 * La fonction get_artiste_nom() affiche le nom d'un artiste demandé
 */

function get_artiste_nom($row)
{
  if (isset($row)) {
    // Récupère les infos de l'artiste
    $artiste_nom = $row["artiste__nom"];

    // Formate le résultat
    $artiste_nom = ucwords(strtolower($artiste_nom));

    // Retourne le résultat au template
    return $artiste_nom;
  }
}


/**
 * La fonction get_artiste_prenom() affiche le prénom d'un artiste demandé
 */

function get_artiste_prenom($row)
{
  if (isset($row)) {
    // Récupère les infos de l'artiste
    $artiste_prenom = $row["artiste__prenom"];

    // Formate le résultat
    $artiste_prenom = ucwords(strtolower($artiste_prenom));

    // Retourne le résultat au template
    return $artiste_prenom;
  }
}


/**
 * La fonction get_artiste_name() affiche la civilité, le Prénom
 * et le nom des artistes demandés
 */

function get_artiste_name($row)
{
  if (isset($row)) {
    // Récupère les infos de l'artiste
    $civilite = get_artiste_civilite($row);
    $prenom = get_artiste_prenom($row);
    $nom = get_artiste_nom($row);

    // Formate le nom
    $artiste_name = nadine_name($civilite, $prenom, $nom);

    // Retourne le résultat au template
    return $artiste_name;
  }
}


/**
 * La fonction the_artiste_name() affiche la civilité, le Prénom
 * et le nom des artistes demandés
 */

function the_artiste_name($row)
{
  if (isset($row)) {
    // Récupère les infos de l'artiste
    $artiste_name = get_artiste_name($row);

    // Retourne le résultat au template
    echo $artiste_name;
  }
}


/**
 * La fonction get_artiste_website() affiche le site internet
 * des artistes du projet demandé
 */

function get_artiste_website($row)
{
  if (isset($row)) {
    if (!empty($row['artiste__website'])) {
      // Récupère les infos du artiste
      $artiste__website = $row['artiste__website'];

      // Formate le titre du lien
      $link_title = $artiste__website;
      $link_title = str_replace('www.', '', $artiste__website);
      $link_title = str_replace('https://', '', $link_title);
      $link_title = str_replace('http://', '', $link_title);
      if (substr($link_title, -1) == '/') {
        $link_title = rtrim($link_title, "/");
      };
      $link_title = 'www.' . $link_title;

      // Retourne le résultat au template
      return $link_title;
    }
  }
}


/**
 * La fonction the_artiste_website() affiche le site internet
 * des artistes du projet demandé
 */

function the_artiste_website($row)
{
  if (isset($row)) {
    // Récupère les infos du artiste
    $artiste__website = get_artiste_website($row);

    // Formate l'URL du lien
    $link_url = $artiste__website;
    $link_url = 'https://' . $link_url;

    // Formate le résultat
    $link = '<a href="' . $link_url . '" target="_blank">' . $artiste__website . '</a>';

    // Retourne le résultat au template
    echo $link;
  }
}


/**
 * La fonction get_artiste_email() affiche l'email
 * des artistes du projet demandé
 */

function get_artiste_email($row)
{
  if (isset($row)) {
    if (!empty($row['artiste__email'])) {
      // Récupère les infos du artiste
      $artiste__email = $row['artiste__email'];

      // Retourne le résultat au template
      return $artiste__email;
    }
  }
}


/**
 * La fonction the_artiste_email() affiche l'email
 * des artistes du projet demandé
 */

function the_artiste_email($row)
{
  if (isset($row)) {
    // Récupère les infos du artiste
    $artiste__email = get_artiste_email($row);

    // Formate le résultat
    $artiste__email = '<a href="mailto:' . $artiste__email . '" target="_blank">' . $artiste__email . '</a>';

    // Retourne le résultat au template
    echo $artiste__email;
  }
}


/**
 * La fonction the_artiste_telephone() affiche le numéro de téléphone
 * des artistes du projet demandé
 */

function get_artiste_telephone($row)
{
  if (isset($row)) {
    if (!empty($row['artiste__telephone'])) {
      // Récupère les infos du artiste
      $artiste__telephone = $row['artiste__telephone'];

      // Reset le format du numero de téléphone
      $phone_formated = $artiste__telephone;
      $phone_formated = str_replace(' ', '', $phone_formated);
      $phone_formated = str_replace('.', '', $phone_formated);

      // Formate le titre du numero de téléphone
      $phone_title = chunk_split($phone_formated, 2, " ");

      // Retourne le résultat au template
      return $phone_title;
    }
  }
}


/**
 * La fonction the_artiste_telephone() affiche le numéro de téléphone
 * des artistes du projet demandé
 */

function the_artiste_telephone($row)
{
  if (isset($row)) {
    // Récupère les infos du artiste
    $artiste__telephone = get_artiste_telephone($row);

    // Formate l'URL du numero de téléphone
    $phone_url = str_replace(' ', '', $artiste__telephone);
    $phone_url = '+33' . $phone_url;

    // Formate le résultat
    $artiste__telephone = '<a href="tel:' . $phone_url . '" target="_blank">' . $artiste__telephone . '</a>';

    // Retourne le résultat au template
    echo $artiste__telephone;
  }
}


/**
 * La fonction get_artiste_adresse() affiche l'adresse
 * des artistes du projet demandé
 */

function get_artiste_adresse($row)
{
  if (isset($row)) {
    // Récupère les infos du artiste
    $artiste__adresse = $row['artiste__adresse'];

    // Retourne le résultat au template
    return $artiste__adresse;
  }
}


/**
 * La fonction get_artiste_code_postal() affiche le code postal
 * des artistes du projet demandé
 */

function get_artiste_code_postal($row)
{
  if (isset($row)) {
    // Récupère les infos du artiste
    $artiste__code_postal = $row['artiste__code_postal'];

    // Formate le résultat
    $artiste__code_postal = str_replace(' ', '', $artiste__code_postal);

    // Retourne le résultat au template
    return $artiste__code_postal;
  }
}


/**
 * La fonction get_artiste_ville() affiche le code postal
 * des artistes du projet demandé
 */

function get_artiste_ville($row)
{
  if (isset($row)) {
    // Récupère les infos du artiste
    $artiste__ville = $row['artiste__ville'];

    // Retourne le résultat au template
    return $artiste__ville;
  }
}


/**
 * La fonction get_artiste_pays() affiche le pays
 * des artistes du projet demandé
 */

function get_artiste_pays($row)
{
  if (isset($row)) {
    if (!empty($row['artiste__pays'])) {
      // Récupère les infos du artiste
      $artiste__pays = $row['artiste__pays'];

      // Formate le résultat
      $artiste__pays = ucwords(strtolower($artiste__pays));

      // Retourne le résultat au template
      return $artiste__pays;
    }
  }
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
        the_artiste_name($row);
      } else {
        the_artiste_name($row);
      }
      echo '</option>';

    endwhile;
  endif;
}


/**
 * La fonction the_contact_societe() affiche la civilité, le Prénom
 * et le nom d'un contact
 */

function the_contact_societe($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact_societe = get_artiste_societe($row);
    } else {
      $contact_societe = get_diffuseur_societe($row);
    }

    // Retourne le résultat au template
    echo $contact_societe;
  }
}


/**
 * La fonction the_contact_siret() affiche le SIRET de la société d'un contact
 */

function the_contact_siret($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact_siret = get_artiste_siret($row);
    } else {
      $contact_siret = get_diffuseur_siret($row);
    }

    // Retourne le résultat au template
    echo $contact_siret;
  }
}

/**
 * La fonction get_contact_civilite() affiche la civilité d'un contact
 */

function get_contact_civilite($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact_civilite = get_artiste_civilite($row);
    } else {
      $contact_civilite = get_diffuseur_civilite($row);
    }

    // Retourne le résultat au template
    return $contact_civilite;
  }
}


/**
 * La fonction the_contact_civilite() affiche la civilité d'un contact
 */

function the_contact_civilite($row)
{
  if (isset($row)) {
    // Récupère les infos du contact
    $contact_civilite = get_contact_civilite($row);

    // Retourne le résultat au template
    echo $contact_civilite;
  }
}


/**
 * La fonction the_contact_nom() affiche le nom d'un contact
 */

function the_contact_nom($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact_nom = get_artiste_nom($row);
    } else {
      $contact_nom = get_diffuseur_nom($row);
    }

    // Retourne le résultat au template
    echo $contact_nom;
  }
}


/**
 * La fonction the_contact_prenom() affiche le prénom d'un contact
 */

function the_contact_prenom($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact_prenom = get_artiste_prenom($row);
    } else {
      $contact_prenom = get_diffuseur_prenom($row);
    }

    // Retourne le résultat au template
    echo $contact_prenom;
  }
}


/**
 * La fonction the_contact_name() affiche la civilité, le Prénom
 * et le nom d'un contact
 */

function the_contact_name($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact_name = get_artiste_name($row);
    } else {
      $contact_name = get_diffuseur_name($row);
    }

    // Retourne le résultat au template
    echo $contact_name;
  }
}


/**
 * La fonction the_contact_telephone() affiche
 * le numéro de téléphone d'un contact
 */

function the_contact_telephone($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact__telephone = get_artiste_telephone($row);
    } else {
      $contact__telephone = get_diffuseur_telephone($row);
    }

    // Retourne le résultat au template
    echo $contact__telephone;
  }
}


/**
 * La fonction the_contact_email() affiche
 * le courriel d'un contact
 */

function the_contact_email($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact__email = get_artiste_email($row);
    } else {
      $contact__email = get_diffuseur_email($row);
    }

    // Retourne le résultat au template
    echo $contact__email;
  }
}


/**
 * La fonction the_contact_website() affiche
 * le site web d'un contact
 */

function the_contact_website($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact__website = get_artiste_website($row);
    } else {
      $contact__website = get_diffuseur_website($row);
    }

    // Retourne le résultat au template
    echo $contact__website;
  }
}


/**
 * La fonction the_contact_adresse() affiche
 * l'adresse d'un contact
 */

function the_contact_adresse($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact__adresse = get_artiste_adresse($row);
    } else {
      $contact__adresse = get_diffuseur_adresse($row);
    }

    // Retourne le résultat au template
    echo $contact__adresse;
  }
}


/**
 * La fonction the_contact_code_postal() affiche
 * le code postal d'un contact
 */

function the_contact_code_postal($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact__code_postal = get_artiste_code_postal($row);
    } else {
      $contact__code_postal = get_diffuseur_code_postal($row);
    }

    // Retourne le résultat au template
    echo $contact__code_postal;
  }
}


/**
 * La fonction the_contact_ville() affiche
 * la ville d'un contact
 */

function the_contact_ville($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact__ville = get_artiste_ville($row);
    } else {
      $contact__ville = get_diffuseur_ville($row);
    }

    // Retourne le résultat au template
    echo $contact__ville;
  }
}


/**
 * La fonction the_contact_pays() affiche
 * le pays d'un contact
 */

function the_contact_pays($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact__pays = get_artiste_pays($row);
    } else {
      $contact__pays = get_diffuseur_pays($row);
    }

    // Retourne le résultat au template
    echo $contact__pays;
  }
}


/**
 * La fonction the_contact_id() affiche l'ID d'un contact demandé
 */

function the_contact_id($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact_id = get_artiste_id($row);
    } else {
      $contact_id = get_diffuseur_id($row);
    }

    // Retourne le résultat au template
    echo $contact_id;
  }
}


/**
 * La fonction the_contact_class() affiche qq class
 * dans la balise <article> des contacts
 */

function the_contact_class($row)
{
  if (isset($row)) {
    // Retourne le résultat au template
    echo "string";
  }
}


/**
 * La fonction get_contact_table() permet de savoir si le template
 * doit afficher les infos d'un diffuseur ou d'un artiste
 */

function get_contact_table($row)
{
  if (isset($row)) {
    if (!empty($row['diffuseur__id']) || isset($row['diffuseur__id'])) {
      $table = 'Diffuseurs';
    } else {
      $table = 'Artistes';
    };

    // Retourne le résultat au template
    return $table;
  }
}


/**
 * La fonction the_contact_table() permet de retourner
 * la table de contact
 */

function the_contact_table($row)

{
  if (isset($row)) {
    $table = get_contact_table($row);

    // Retourne le résultat au template
    echo $table;
  }
}


/**
 * La fonction the_contact_type() permet de retourner
 * le type de contact
 */

function the_contact_type($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    if ($table == 'Diffuseurs') {
      $contact__type = 'Diffuseur';
    } else {
      $contact__type = 'Artiste-Auteur';
    };

    // Retourne le résultat au template
    echo $contact__type;
  }
}


/**
 * La fonction the_facture_id() permet d'afficher
 * l'ID d'une facture ou devis
 */

function the_facture_id($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_facture_table($row);

    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Récupére l'ID de la facture ou du devis
    if (isset($row[$prefix . '__id'])) {
      $facture__id = $row[$prefix . '__id'];
    } else {
      $facture__id = 'new';
    }

    // Retourne le résultat au template
    echo $facture__id;
  }
}


/**
 * La fonction get_facture_new_numero() permet de créer
 * un nouveau numero de devis ou de facture
 */

function get_facture_new_numero($table)
{
  if (isset($table)) {
    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Récupère le dernier numéros de facture ou devis dans la base de donnée
    $args = array(
      'FROM'     => $table,
      'ORDER BY' => $prefix . '__id',
      'ORDER'    => 'DESC',
      'LIMIT'    => '1',
    );
    $loop = nadine_query($args);

    // Récupère le dernier numéros de facture ou devis
    if ($loop->num_rows > 0) {
      while ($row = $loop->fetch_assoc()) {
        $facture__id = $row[$prefix . '__id'];
      }
    }

    // Récupère les infos du dernier profil
    $args = array(
      'FROM'     => 'Profil',
      'ORDER BY' => 'Profil__id',
      'ORDER'    => 'DESC',
      'LIMIT'    => '1',
    );
    $loop = nadine_query($args);

    // Récupère les initiales du profil de l'utilisateur
    if ($loop->num_rows > 0) {
      while ($row = $loop->fetch_assoc()) {

        // Vérifie si le numero de facture existe
        if (isset($row['profil__initiales'])) {
          $initiales = $row['profil__initiales'];
        } else {
          $initiales = 'NA';
        }
      }
    }


    // Récupére le bon acronyme
    if ($table == 'devis') {
      $initiales = 'D' . $initiales;
    };
    if ($table == 'facturesacompte') {
      $initiales = 'A' . $initiales;
    };
    if ($table == 'factures') {
      $initiales = 'F' . $initiales;
    };



    // Récupére l'année en cours
    $year = date('Y');

    // Formate le résultat
    $facture_new_numero = $facture__id + 1;
    $facture_new_numero = $initiales . '.' . $year . '.' . $facture_new_numero;

    // Retourne le résultat au template
    return $facture_new_numero;
  }
}


/**
 * La fonction get_facture_numero() permet de récupérer
 * le numero d'un devis ou d'une facture
 */

function get_facture_numero($row, $table = '')
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_facture_table($row, $table);

    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Vérifie si le numero de facture existe
    if (isset($row[$prefix . '__numero'])) {
      $facture_numero = $row[$prefix . '__numero'];
      // Formate le résultat
      $facture_numero = str_replace(' ', '', $facture_numero);
    } else {
      $facture_numero = get_facture_new_numero($table);
    };

    // Retourne le résultat au template
    return $facture_numero;
  }
}


/**
 * La fonction the_facture_numero() permet d'afficher
 * le numero d'un devis ou d'une facture
 */

function the_facture_numero($row, $table = '')
{
  if (isset($row)) {
    // Recupère le numero de facture
    $facture_numero = get_facture_numero($row, $table);

    // Retourne le résultat au template
    echo $facture_numero;
  }
}


/**
 * La fonction the_facture_class() affiche qq class
 * dans la balise <article> des devis ou des facture
 */

function the_facture_class($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_facture_table($row);

    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Ajoute l'id comme class
    $class = 'p-facture__' . $row[$prefix . '__id'] . ' ';

    // Recupère le statut de facture
    $facture_statut = $row[$prefix . '__statut'];
    $class .= sanitize('p-facture__' . $facture_statut);

    // Retourne le résultat au template
    echo $class;
  }
}


/**
 * La fonction the_facture_statut() permet d'afficher
 * le staut d'un devis ou d'une facture
 */

function the_facture_statut($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_facture_table($row);

    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Recupère le statut de facture
    $facture_statut = $row[$prefix . '__statut'];

    // Retourne le résultat au template
    echo $facture_statut;
  }
}


/**
 * La fonction the_facture_link() permet d'afficher
 * le lien vers la page devis ou facture
 */

function the_facture_link($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_facture_table($row);

    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Vérifie si la facture a déjà un numéros
    // ou s'il s'agit d'une nouvelle facture
    if (isset($row[$prefix . '__id'])) {
      // Recupère le numero de facture
      $facture__id = $row[$prefix . '__id'];

      // Recupère le numero de facture
      $projet__id = $row['projet__id'];

      // Formate le résultat
      $facture__link = './facture__single.php?projet__id=' . $projet__id . '&' . $prefix . '__id=' . $facture__id;

      // Retourne le résultat au template
      echo $facture__link;
    }
  }
}


/**
 * La fonction get_facture_template() permet de récupérer
 * le bon template pour afficher les devis ou facture
 */

function get_facture_template($row, $table)
{
  if (isset($row) && isset($table)) {
    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Récupère le nom du template
    if (isset($row[$prefix . '__template'])) {
      $facture__template = $row[$prefix . '__template'];
    } else {
      $facture__template = 'facture__2023';
    }

    // Retourne le résultat au template
    return $facture__template;
  }
}


/**
 * La fonction the_facture_template() permet d'afficher
 * le bon template pour afficher les devis ou facture
 */

function the_facture_template($row, $table)
{
  if (isset($row) && isset($table)) {
    // Récupère le nom du template
    $facture__template = get_facture_template($row, $table);

    // Retourne le résultat au template
    echo $facture__template;
  }
}



/**
 * La fonction the_facture_template_url() permet de sélectionner
 * le bon template pour afficher les devis ou facture
 */

function the_facture_template_url($projet__id, $table, $facture__id)
{
  if (isset($projet__id) && isset($table) && isset($facture__id)) {
    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Récupére la bon nom de fichier
    if ($table == 'factures') {
      $facture__file = 'facture';
    } elseif ($table == 'devis') {
      $facture__file = 'devis';
    } else {
      $facture__file = 'facturesacompte';
    }

    // Récupère les infos du Diffuseur
    if ($facture__id == 'new') {
      $args = array(
        'FROM'     => 'Projets, Diffuseurs',
        'WHERE'    => 'Projets.projet__id =' . $projet__id,
        'AND'      => 'Projets.diffuseur__id = Diffuseurs.diffuseur__id'
      );
    } else {
      $args = array(
        'FROM'     => $table,
        'WHERE'    => $prefix . '__id' . ' = ' . $facture__id
      );
    }
    $loop = nadine_query($args);

    // Récupère l'ID du Diffuseur
    // et le Template (si la facture exite déjà)
    if ($loop->num_rows > 0) {

      $row = $loop->fetch_assoc();
      $diffuseur__id = $row['diffuseur__id'];

      // Vérifie si le précompte doit être appliqué
      if ($facture__file != 'devis') {
        if (check_if_precompte($diffuseur__id, $table, $facture__id)) {
          $facture__file .= '__precompte';
        }
      };

      // Formate le nom du fichier
      $facture__file = $facture__file . '.php';

      // Récupère le nom du template
      $facture__folder = get_facture_template($row, $table);

      // Formate le résultat
      $facture__templateurl = '/template_facture/' . $facture__folder . '/' . $facture__file;

      // Retourne le résultat au template
      return $facture__templateurl;
    }
  }
}


/**
 * La fonction get_facture_date() permet de récupérer
 * la date de création du devis ou de la facture
 */

function get_facture_date($row, $format = 'abrv')
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_facture_table($row);

    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);


    // Vérifie si la date existe
    if (isset($row[$prefix . '__date'])) {
      // Recupère la date
      $facture_date = date_create($row[$prefix . '__date']);

      // Formate la réponse
      $facture_date = nadine_date($facture_date, $format);

      // Retourne le résultat au template
      return $facture_date;
    }
  }

  // Sinon : Récupère, formate et retourne
  // la date du jour au template
  return get_date_today($format);
}


/**
 * La fonction the_facture_date() permet d'afficher
 * la date de création du devis ou de la facture
 */

function the_facture_date($row, $format = 'abrv')
{
  if (isset($row)) {
    // Récupère la date de création du devis ou de la facture
    $facture_date = get_facture_date($row, $format);

    // Retourne le résultat au template
    echo $facture_date;
  }
}


/**
 * La fonction the_facture_tache() permet d'afficher
 * la description de la tâche  dans une facture ou un devis
 */

function the_facture_tache($row, $numTache = 1)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_facture_table($row);

    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Vérifie si la tache existe
    if (isset($row[$prefix . '__tache_' . $numTache])) {
      // Recupère la tâche 
      $facture_tache = $row[$prefix . '__tache_' . $numTache];

      // Retourne le résultat au template
      echo $facture_tache;
    }
  }
}


/**
 * La fonction the_facture_prix() permet d'afficher
 * le prix d'une la tâche dans une facture ou un devis
 */

function the_facture_prix($row, $numTache = 1)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_facture_table($row);

    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Vérifie si le prix existe
    if (isset($row[$prefix . '__prix_' . $numTache])) {
      // Recupère le prix 
      $facture_prix = $row[$prefix . '__prix_' . $numTache];

      // Retourne le résultat au template
      echo $facture_prix;
    }
  }
}


/**
 * La fonction the_facture_total_auteur() permet d'afficher
 * le total d'un devis ou d'une facture
 */

function the_facture_total_auteur($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_facture_table($row);

    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Recupère le total de facture
    $facture_total = $row[$prefix  . '__total'];

    // Formate le résultat
    $facture_total = nadine_prix($facture_total);

    // Retourne le résultat au template
    echo $facture_total;
  }
}


/**
 * La fonction the_facture_total_ht() permet d'afficher
 * le total hors taxe d'un devis ou d'une facture
 */

function the_facture_total_ht($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_facture_table($row);

    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Ajoute une variable pour calculer le total
    $facture_total_ht = 0;

    // Recupère le prix de chaque de tâche de la facture
    for ($i = 1; $i <= 7; $i++) {
      $prix = $row[$prefix  . '__prix_' . $i];
      $prix = floatval($prix);
      $facture_total_ht += $prix;
    }

    // Formate le résultat
    $facture_total_ht = nadine_prix($facture_total_ht);

    // Retourne le résultat au template
    echo $facture_total_ht;
  }
}


/**
 * La fonction get_facture_table() permet de savoir si le template
 * doit afficher les infos d'un devis ou d'une facture
 */

function get_facture_table($row, $table = '')
{
  if (isset($row)) {
    // Récupére la bonne table
    if ($table != '') {
      // Retourne le résultat au template
      return $table;
    }

    // Récupére la bonne table
    if (!empty($row['devis__numero'])) {
      $table = 'devis';
    };
    if (!empty($row['facture__numero'])) {
      $table = 'factures';
    };
    if (!empty($row['facturea__numero'])) {
      $table = 'facturesacompte';
    };

    // Retourne le résultat au template
    return $table;
  }
}


/**
 * La fonction the_facture_table() d'afficher si le template
 * doit afficher les infos d'un devis ou d'une facture
 */

function the_facture_table($row)
{
  if (isset($row)) {
    if (!empty($row['devis__numero'])) {
      $table = 'Devis';
    };
    if (!empty($row['facture__numero'])) {
      $table = 'Facture';
    };
    if (!empty($row['facturea__numero'])) {
      $table = "Facture d'acompte";
    };

    // Retourne le résultat au template
    echo $table;
  }
}


/**
 * La fonction get_facture_prefix() permet de savoir si les requêtes
 * doivent être prefixé pour un devis ou une facture
 */

function get_facture_prefix($table)
{
  if (isset($table)) {

    // Récupére le bon prefix
    if ($table == 'factures') {
      $prefix = 'facture';
    } elseif ($table == 'devis') {
      $prefix = 'devis';
    } else {
      $prefix = 'facturea';
    }

    // Retourne le résultat au template
    return $prefix;
  }
}


/**
 * La fonction the_facture_prefix() permet d'afficher si les requêtes
 * doivent être prefixé pour un devis ou une facture
 */

function the_facture_prefix($table)
{
  if (isset($table)) {
    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Retourne le résultat au template
    echo $prefix;
  }
}


/**
 * La fonction get_profil_last_id() permet de récupérer
 * le numéros du dernier profil utilisateur
 */

function get_profil_last_id()
{
  // Récupère l'ID du dernier profil dans la base de donnée
  $args = array(
    'FROM'     => 'Profil',
    'ORDER BY' => 'profil__id',
    'ORDER'    => 'DESC',
    'LIMIT'    => 1
  );

  $loop = nadine_query($args);
  if ($loop->num_rows > 0) :
    while ($row = $loop->fetch_assoc()) :
      $profil__id = $row['profil__id'];
    endwhile;
  endif;

  // Retourne le résultat au template
  return $profil__id;
}


/**
 * La fonction get_profil_id() permet de récupérer
 * le numéros du profil utilisateur
 */

function get_profil_id($row)
{
  if (isset($row)) {

    // Récupère les infos du profil
    if (isset($row['profil__id'])) {
      $profil__id = $row['profil__id'];
    } else {
      $profil__id = get_profil_last_id();
    };

    // Retourne le résultat au template
    return $profil__id;
  }
}


/**
 * La fonction the_profil_id() permet d'afficher
 * le numéros du profil utilisateur
 */

function the_profil_id($row)
{
  if (isset($row)) {
    // Récupère les infos du profil
    $profil__id = get_profil_id($row);

    // Retourne le résultat au template
    echo $profil__id;
  }
}


/**
 * La fonction the_profil_societe() affiche
 * le nom de société de l'utilisateur
 */

function the_profil_societe($row)
{
  if (isset($row)) {
    // Récupère les infos du profil
    $profil__societe = $row['profil__societe'];

    // Retourne le résultat au template
    echo $profil__societe;
  }
}


/**
 * La fonction the_profil_siret() affiche
 * le nom de société de l'utilisateur
 */

function the_profil_siret($row)
{
  if (isset($row)) {
    // Récupère les infos du profil
    $profil__siret = $row['profil__siret'];

    // Retourne le résultat au template
    echo $profil__siret;
  }
}


/**
 * La fonction the_profil_numero_secu() affiche
 * le Numéro de sécurité sociale de l'utilisateur
 */

function the_profil_numero_secu($row)
{
  if (isset($row)) {
    // Récupère les infos du profil
    $profil__numero_secu = $row['profil__numero_secu'];

    // Retourne le résultat au template
    echo $profil__numero_secu;
  }
}


/**
 * La fonction the_profil_numero_mda() affiche
 * le Numéro de Maison des Artistes de l'utilisateur
 */

function the_profil_numero_mda($row)
{
  if (isset($row)) {
    // Récupère les infos du profil
    $profil__numero_mda = $row['profil__numero_mda'];

    // Retourne le résultat au template
    echo $profil__numero_mda;
  }
}


/**
 * La fonction get_profil_precompte() permet de savoir
 * si l'utilisateur est dispensé de précompte ou pas
 */

function get_profil_precompte($row)
{
  if (isset($row)) {
    if (!empty($row['profil__precompte'])) {
      // Récupère les infos du diffuseur
      $profil__precompte = $row["profil__precompte"];

      // Retourne le résultat au template
      return $profil__precompte;
    }
  }
}


/**
 * La fonction get_profil_civilite() permet de récupérer
 * la civilité de l'utilisateur
 */

function get_profil_civilite($row)
{
  if (isset($row)) {
    if (!empty($row['profil__civilite'])) {
      // Récupère les infos du diffuseur
      $profil__civilite = $row["profil__civilite"];

      // Formate le résultat
      if (strpos($profil__civilite, 'Mme') === 0) {
        $profil__civilite = "Mme";
      }

      // Retourne le résultat au template
      return $profil__civilite;
    }
  }
}

/**
 * La fonction the_profil_prenom() affiche
 * le prénom de l'utilisateur
 */

function the_profil_prenom($row)
{
  if (isset($row)) {
    // Récupère les infos du profil
    $profil__prenom = $row['profil__prenom'];

    // Retourne le résultat au template
    echo $profil__prenom;
  }
}


/**
 * La fonction the_profil_nom() affiche
 * le prénom de l'utilisateur
 */

function the_profil_nom($row)
{
  if (isset($row)) {
    if (!empty($row['profil__nom'])) {
      // Récupère les infos du profil
      $profil__nom = $row['profil__nom'];

      // Retourne le résultat au template
      echo $profil__nom;
    }
  }
}


/**
 * La fonction the_profil_pseudo() affiche
 * le pseudonyme de l'utilisateur
 */

function the_profil_pseudo($row)
{
  if (isset($row)) {
    if (!empty($row['profil__pseudo'])) {
      // Récupère les infos du profil
      $profil__pseudo = $row['profil__pseudo'];

      // Retourne le résultat au template
      echo $profil__pseudo;
    }
  }
}


/**
 * La fonction the_profil_initiales() affiche les initiales
 * de l'utilisateur. Ces initiales sont notament utilisé
 * dans la nomenclature des factures et devis
 */

function the_profil_initiales($row)
{
  if (isset($row)) {
    if (!empty($row['profil__initiales'])) {
      // Récupère les infos du profil
      $profil__initiales = $row['profil__initiales'];

      // Retourne le résultat au template
      echo $profil__initiales;
    }
  }
}


/**
 * La fonction the_profil_adresse() affiche
 * l'adresse de l'utilisateur
 */

function the_profil_adresse($row)
{
  if (isset($row)) {
    // Récupère les infos du profil
    $profil__adresse = $row['profil__adresse'];

    // Retourne le résultat au template
    echo $profil__adresse;
  }
}


/**
 * La fonction the_profil_code_postal() affiche
 * le code postal de l'utilisateur
 */

function the_profil_code_postal($row)
{
  if (isset($row)) {
    // Récupère les infos du profil
    $profil__code_postal = $row['profil__code_postal'];

    // Formate le résultat
    $profil__code_postal = str_replace(' ', '', $profil__code_postal);

    // Retourne le résultat au template
    echo $profil__code_postal;
  }
}


/**
 * La fonction the_profil_ville() affiche
 * la ville de l'utilisateur
 */

function the_profil_ville($row)
{
  if (isset($row)) {
    // Récupère les infos du profil
    $profil__ville = $row['profil__ville'];

    // Retourne le résultat au template
    echo $profil__ville;
  }
}


/**
 * La fonction the_profil_pays() affiche
 * le pays de l'utilisateur
 */

function the_profil_pays($row)
{
  if (isset($row)) {
    if (!empty($row['profil__pays'])) {
      $profil__pays = $row['profil__pays'];

      // Formate le résultat
      $profil__pays = ucwords(strtolower($profil__pays));

      // Retourne le résultat au template
      echo $profil__pays;
    }
  }
}


/**
 * La fonction the_profil_telephone() affiche
 * le numéros de téléphone de l'utilisateur
 */

function the_profil_telephone($row)
{
  if (isset($row)) {
    if (!empty($row['profil__telephone'])) {
      // Récupère les infos du profil
      $profil__telephone = $row['profil__telephone'];

      // Reset le format du numero de téléphone
      $phone_formated = $profil__telephone;
      $phone_formated = str_replace(' ', '', $phone_formated);
      $phone_formated = str_replace('.', '', $phone_formated);

      // Formate le titre du numero de téléphone
      $phone_title = chunk_split($phone_formated, 2, " ");

      // Retourne le résultat au template
      echo $phone_title;
    }
  }
}


/**
 * La fonction the_profil_email() affiche
 * le courriel de l'utilisateur
 */

function the_profil_email($row)
{
  if (isset($row)) {
    if (!empty($row['profil__email'])) {
      // Récupère les infos du diffuseur
      $profil__email = $row['profil__email'];

      // Retourne le résultat au template
      echo $profil__email;
    }
  }
}


/**
 * La fonction the_profil_website() affiche
 * le site internet de l'utilisateur
 */

function the_profil_website($row)
{
  if (isset($row)) {
    if (!empty($row['profil__website'])) {
      // Récupère les infos du diffuseur
      $profil__website = $row['profil__website'];

      // Retourne le résultat au template
      echo $profil__website;
    }
  }
}


/**
 * La fonction the_profil_titulaire_du_compte() affiche
 * le titulaire du compte bancaire de l'utilisateur
 */

function the_profil_titulaire_du_compte($row)
{
  if (isset($row)) {
    if (!empty($row['profil__titulaire_du_compte'])) {
      // Récupère les infos du diffuseur
      $profil__titulaire_du_compte = $row['profil__titulaire_du_compte'];

      // Retourne le résultat au template
      echo $profil__titulaire_du_compte;
    }
  }
}

/**
 * La fonction the_profil_iban() affiche
 * l'IBAN du compte bancaire de l'utilisateur
 */

function the_profil_iban($row)
{
  if (isset($row)) {
    if (!empty($row['profil__iban'])) {
      // Récupère les infos du diffuseur
      $profil__iban = $row['profil__iban'];

      // Retourne le résultat au template
      echo $profil__iban;
    }
  }
}

/**
 * La fonction the_profil_bic() affiche
 * le BIC du compte bancaire de l'utilisateur
 */

function the_profil_bic($row)
{
  if (isset($row)) {
    if (!empty($row['profil__bic'])) {
      // Récupère les infos du diffuseur
      $profil__bic = $row['profil__bic'];

      // Retourne le résultat au template
      echo $profil__bic;
    }
  }
}

/**
 * La fonction get_date_today() permet de connaître
 * la date du jour
 */

function get_date_today($format = 'abrv')
{

  // Récupère la date du jour
  $date_today = new DateTime('now', new DateTimeZone('Europe/Paris'));

  // Formate la réponse
  $dateFormatted = nadine_date($date_today, $format);

  // Retourne le résultat au template
  return $dateFormatted;
}


/**
 * La fonction the_date_today() permet de connaître
 * la date du jour
 */

function the_date_today($format = 'abrv')
{
  // Récupère la date du jour
  $dateToday = get_date_today($format);

  // Retourne le résultat au template
  echo $dateToday;
}


/**
 * La fonction nadine_date() permet d'harmoniser
 * l'affichage des dates de Nadine
 */

function nadine_date($date, $format = 'abrv')
{
  if (isset($date)) {
    // Défini le fuseau horaire
    date_default_timezone_set('Europe/Paris');

    // Formate la date en abrv
    // Exemple : Sept. 2021
    if ($format == 'abrv') {
      $dateFormatted = IntlDateFormatter::formatObject($date, 'LLL Y');
      $dateFormatted = ucwords($dateFormatted);
    }

    // Formate la date en full
    // Exemple : Sam. 18 Sept. 2021
    if ($format == 'full') {
      $dateFormatted = IntlDateFormatter::formatObject($date, 'eee dd LLL Y');
      $dateFormatted = ucwords($dateFormatted);
    }

    // Formate la date en brut
    // Exemple : 18/09/2021
    if ($format == 'brutfr') {
      $dateFormatted = IntlDateFormatter::formatObject($date, 'dd/LL/Y');
    }

    // Formate la date en brut
    // Exemple : 2021-09-18
    if ($format == 'brut') {
      $dateFormatted = IntlDateFormatter::formatObject($date, 'Y-LL-dd');
    }

    // Retourne le résultat au template
    return $dateFormatted;
  }
}


/**
 * La fonction nadine_name() permet d'harmoniser
 * l'affichage des noms sur Nadine
 */

function nadine_name($civilite, $prenom, $nom)
{
  // Formate le prénom et le nom 

  $prenom = ucwords(strtolower($prenom));
  $nom = ucwords(strtolower($nom));

  // Retourne le résultat au template
  return $civilite . ' ' . $prenom . ' ' . $nom;
}


/**
 * La fonction nadine_prix() permet d'harmoniser
 * l'affichage de prix sur Nadine
 */

function nadine_prix($prix)
{
  if (isset($prix)) {
    // Formate le résultat
    $prix = number_format($prix, 2, ',', ' ') . ' €';

    // Retourne le résultat au template
    return $prix;
  }
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

function check_if_precompte($diffuseur__id = '', $table = '', $facture__id = '')
{
  // Vérifie si une facture ou devis ID a été envoyé avec la demande
  if ($facture__id !== 'new' && $facture__id !== '') {
    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);


    // Récupère les info de la facture ou devis dans la base de donnée
    $args = array(
      'FROM'     => $table,
      'WHERE'    => $prefix . '__id' . ' = ' . $facture__id,
    );
    $loop = nadine_query($args);


    // Récupère les options de précompte de la facture ou devis
    if ($loop->num_rows > 0) :
      while ($row = $loop->fetch_assoc()) :
        $facture__precompte = $row['facture__precompte'];
      endwhile;
    endif;


    // Retourne le résultat au template
    if ($facture__precompte == 0) {
      return false;
    } else {
      return true;
    }
  };

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


/**
 * La fonction db__format_column() permet d'extraire et de formater
 * des rêquetes SQL depuis la core/database/db__structure.php
 */

function db__format_column($column_info)
{
  if (isset($column_info)) {

    // Extrait les infos de la colonne depuis la Structure
    $type = $column_info['type'];
    $auto_increment = isset($column_info['auto_increment']) ? 'AUTO_INCREMENT' : '';
    $primary_key = isset($column_info['primary_key']) ? 'PRIMARY KEY' : '';
    $collate = isset($column_info['collate']) ? 'COLLATE ' . $column_info['collate'] : '';
    $default = isset($column_info['default']) ? 'DEFAULT ' . $column_info['default'] : '';

    // Formate le résultat
    $column_format = "$type $collate $default $auto_increment $primary_key";

    // Retourne le résultat au template
    return $column_format;
  }
}


/**
 * La fonction db__replace_prefix() permet de formater
 * les data avant des rêquetes SQL
 */

function db__replace_prefix($data, $prefix, $prefix_new)
{
  // Formate le résultat
  foreach ($data as $key => $value) {
    if (strpos($key, $prefix) === 0) {
      $new_key = str_replace($prefix, $prefix_new, $key);
      $data[$new_key] = $value;
      unset($data[$key]);
    }
  }

  // Retourne le résultat au template
  return $data;
}
