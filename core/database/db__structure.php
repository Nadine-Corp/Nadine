<?php


// Le fichier db__structure.php contient la structure
// de la base de données de Nadine



/**
 *  Paramètre de création des Tables
 */

$interclassement = "utf8mb4_unicode_ci";


/**
 *  Ajoute une variable pour stocker la structure de la base de données
 */

$tables = array(

  // Table Options
  'Options' => array(
    'option__id' => array('type' => 'INT(6)', 'auto_increment' => true, 'primary_key' => true),
    'option__nom' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'option__valeur' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL')
  ),

  // Table Diffuseurs
  'Diffuseurs' => array(
    'diffuseur__id' => array('type' => 'INT(6)', 'auto_increment' => true, 'primary_key' => true),
    'diffuseur__corbeille' => array('type' => 'TINYINT(1)', 'default' => '0'),
    'diffuseur__type' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__societe' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__siret' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__civilite' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__prenom' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__nom' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__adresse' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__code_postal' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__ville' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__pays' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__telephone' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__email' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__website' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__notes' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL')
  ),

  // Table Artistes
  'Artistes' => array(
    'artiste__id' => array('type' => 'INT(6)', 'auto_increment' => true, 'primary_key' => true),
    'artiste__corbeille' => array('type' => 'TINYINT(1)', 'default' => '0'),
    'artiste__societe' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'artiste__siret' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'artiste__civilite' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'artiste__prenom' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'artiste__nom' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'artiste__numero_secu' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'artiste__numero_mda' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'artiste__adresse' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'artiste__code_postal' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'artiste__ville' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'artiste__pays' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'artiste__telephone' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'artiste__email' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'artiste__website' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'artiste__notes' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
  ),

  // Table Projets
  'Projets' => array(
    'projet__id' => array('type' => 'INT(6)', 'auto_increment' => true, 'primary_key' => true),
    'projet__corbeille' => array('type' => 'TINYINT(1)', 'default' => 0),
    'projet__nom' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'projet__numero' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'projet__precompte' => array('type' => 'TINYINT(1)', 'default' => 0),
    'projet__retrocession' => array('type' => 'TINYINT(1)', 'default' => 0),
    'projet__porteurduprojet' => array('type' => 'TINYINT(1)', 'default' => 0),
    'projet__date_de_creation' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'projet__date_de_fin' => array('type' => 'DATE', 'null' => true, 'default' => null),
    'projet__statut' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'projet__historique' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'projet__notes' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__id' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'artiste__id' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__id' => array('type' => 'INT(6)', 'default' => 'NULL'),
  ),

  // Table Factures
  'Factures' => array(
    'facture__id' => array('type' => 'INT(6)', 'auto_increment' => true, 'primary_key' => true),
    'facture__corbeille' => array('type' => 'TINYINT(1)', 'default' => 0),
    'facture__precompte' => array('type' => 'TINYINT(1)', 'default' => 0),
    'facture__template' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__date' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__numero' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__statut' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__notes' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__tache_1' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__prix_1' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__tache_2' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__prix_2' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__tache_3' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__prix_3' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__tache_4' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__prix_4' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__tache_5' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__prix_5' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__tache_5' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__tache_6' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__prix_6' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__tache_7' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__prix_7' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facture__total' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'projet__id' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'projet__nom' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'projet__numero' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__id' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__societe' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__siret' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__civilite' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__prenom' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__nom' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__adresse' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__code_postal' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__ville' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__pays' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__telephone' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__email' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__website' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__id' => array('type' => 'INT(6)', 'default' => 'NULL')
  ),

  // Table Factures Acompte
  'Facturesacompte' => array(
    'facturea__id' => array('type' => 'INT(6)', 'auto_increment' => true, 'primary_key' => true),
    'facturea__corbeille' => array('type' => 'TINYINT', 'constraint' => 1, 'default' => 0),
    'facturea__precompte' => array('type' => 'TINYINT', 'constraint' => 1, 'default' => 0),
    'facturea__template' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__date' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__numero' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__statut' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__notes' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__tache_1' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__prix_1' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__tache_2' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__prix_2' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__tache_3' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__prix_3' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__tache_4' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__prix_4' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__tache_5' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__prix_5' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__tache_5' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__tache_6' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__prix_6' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__tache_7' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__prix_7' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'facturea__total' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'projet__id' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'projet__nom' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'projet__numero' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__id' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__societe' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__siret' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__civilite' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__prenom' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__nom' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__adresse' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__code_postal' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__ville' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__pays' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__telephone' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__email' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__website' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__id' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL')
  ),

  // Table Devis
  'Devis' => array(
    'devis__id' => array('type' => 'INT(6)', 'auto_increment' => true, 'primary_key' => true),
    'devis__corbeille' => array('type' => 'TINYINT(1)', 'default' => 0),
    'devis__precompte' => array('type' => 'TINYINT(1)', 'default' => 0),
    'devis__template' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__date' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__numero' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__statut' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__notes' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__tache_1' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__prix_1' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__tache_2' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__prix_2' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__tache_3' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__prix_3' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__tache_4' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__prix_4' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__tache_5' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__prix_5' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__tache_5' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__tache_6' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__prix_6' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__tache_7' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__prix_7' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'devis__total' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'projet__id' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'projet__nom' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'projet__numero' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__id' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__societe' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__siret' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__civilite' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__prenom' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__nom' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__adresse' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__code_postal' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__ville' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__pays' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__telephone' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__email' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'diffuseur__website' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__id' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL')
  ),

  // Table Profil
  'Profil' => array(
    'profil__id' => array('type' => 'INT(6)', 'auto_increment' => true, 'primary_key' => true),
    'profil__societe' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__civilite' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__prenom' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__nom' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__pseudo' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__initiales' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__adresse' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__code_postal' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__ville' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__pays' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__telephone' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__email' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__website' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__siret' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__numero_secu' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__numero_mda' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__precompte' => array('type' => 'TINYINT(1)', 'default' => 0),
    'profil__titulaire_du_compte' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__iban' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__bic' => array('type' => 'VARCHAR(255)', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__msg_facture' => array('type' => 'TEXT', 'collate' => $interclassement, 'default' => 'NULL'),
    'profil__msg_devis' => array('type' => 'TEXT', 'collate' => $interclassement, 'default' => 'NULL')
  ),
);
