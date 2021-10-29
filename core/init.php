<?php

  // Le fichier init.php permet de reset de la base donnée et de repartir à zéro



  /**
  *  Importation des paramètres
  */

  include 'config.php';



  /**
  *  Suppression de l'ancienne base
  */

  $sql = "DROP DATABASE IF EXISTS $dbname";
  $conn = new mysqli($servername, $username, $password);
  if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
  $result = $conn->query($sql) or die($conn->error);



  /**
  *  Création de la nouvelle base
  */

  $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

  $conn = new mysqli($servername, $username, $password);
  if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
  $result = $conn->query($sql) or die($conn->error);



  /**
  *  Paramètre de création des Tables
  */

  $interclassement = "utf8mb4_unicode_ci";



  /**
  *  Création de la table Options
  */

  $sql = "CREATE TABLE Options(
  option__id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  option__nom VARCHAR(255) COLLATE '$interclassement',
  option__valeur VARCHAR(255) COLLATE '$interclassement'
  )";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);

  // Ajout des options par defaut de Nadine

  $sql = "INSERT INTO Options ( option__nom, option__valeur)
  VALUES ('option__couleur','rouge-trash')";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);



  /**
  *  Création de la table Diffuseurs
  */

  $sql = "CREATE TABLE Diffuseurs(
  diffuseur__id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  diffuseur__corbeille TINYINT(1) DEFAULT 0,
  diffuseur__societe VARCHAR(255) COLLATE '$interclassement',
  diffuseur__siret VARCHAR(255) COLLATE '$interclassement',
  diffuseur__civilite VARCHAR(255) COLLATE '$interclassement',
  diffuseur__prenom VARCHAR(255) COLLATE '$interclassement',
  diffuseur__nom VARCHAR(255) COLLATE '$interclassement',
  diffuseur__adresse VARCHAR(255) COLLATE '$interclassement',
  diffuseur__code_postal VARCHAR(255) COLLATE '$interclassement',
  diffuseur__ville VARCHAR(255) COLLATE '$interclassement',
  diffuseur__telephone VARCHAR(255) COLLATE '$interclassement',
  diffuseur__email VARCHAR(255) COLLATE '$interclassement',
  diffuseur__website VARCHAR(255) COLLATE '$interclassement',
  diffuseur__notes VARCHAR(255) COLLATE '$interclassement'
  )";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);



  /**
  *  Création de la table Artistes
  */

  $sql = "CREATE TABLE Artistes(
  artiste__id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  artiste__corbeille TINYINT(1) DEFAULT 0,
  artiste__societe VARCHAR(255) COLLATE '$interclassement',
  artiste__siret VARCHAR(255) COLLATE '$interclassement',
  artiste__civilite VARCHAR(255) COLLATE '$interclassement',
  artiste__prenom VARCHAR(255) COLLATE '$interclassement',
  artiste__nom VARCHAR(255) COLLATE '$interclassement',
  artiste__numero_secu VARCHAR(255) COLLATE '$interclassement',
  artiste__numero_mda VARCHAR(255) COLLATE '$interclassement',
  artiste__adresse VARCHAR(255) COLLATE '$interclassement',
  artiste__code_postal VARCHAR(255) COLLATE '$interclassement',
  artiste__ville VARCHAR(255) COLLATE '$interclassement',
  artiste__telephone VARCHAR(255) COLLATE '$interclassement',
  artiste__email VARCHAR(255) COLLATE '$interclassement',
  artiste__website VARCHAR(255) COLLATE '$interclassement',
  artiste__notes VARCHAR(255) COLLATE '$interclassement'
  )";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);



  /**
  *  Création de la table Projets
  */

  $sql = "CREATE TABLE Projets (
  projet__id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  projet__corbeille TINYINT(1) DEFAULT 0,
  projet__nom VARCHAR(255) COLLATE '$interclassement',
  projet__numero VARCHAR(255) COLLATE '$interclassement',
  projet__precompte TINYINT(1) DEFAULT 0,
  projet__retrocession TINYINT(1) DEFAULT 0,
  projet__porteurduprojet TINYINT(1) DEFAULT 0,
  projet__date_de_creation VARCHAR(255) COLLATE '$interclassement',
  projet__date_de_fin DATE NULL DEFAULT NULL,
  projet__statut VARCHAR(255) COLLATE '$interclassement',
  projet__historique VARCHAR(255) COLLATE '$interclassement',
  projet__notes VARCHAR(255) COLLATE '$interclassement',
  diffuseur__id VARCHAR(255) COLLATE '$interclassement',
  artiste__id VARCHAR(255) COLLATE '$interclassement'
  )";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);



  /**
  *  Création de la table Factures
  */

  $sql = "CREATE TABLE Factures (
  facture__id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  facture__corbeille TINYINT(1) DEFAULT 0,
  facture__template VARCHAR(255) COLLATE '$interclassement',
  facture__date VARCHAR(255) COLLATE '$interclassement',
  facture__numero VARCHAR(255) COLLATE '$interclassement',
  facture__statut VARCHAR(255) COLLATE '$interclassement',
  facture__notes VARCHAR(255) COLLATE '$interclassement',
  facture__tache_1 VARCHAR(255) COLLATE '$interclassement',
  facture__prix_1 VARCHAR(255) COLLATE '$interclassement',
  facture__tache_2 VARCHAR(255) COLLATE '$interclassement',
  facture__prix_2 VARCHAR(255) COLLATE '$interclassement',
  facture__tache_3 VARCHAR(255) COLLATE '$interclassement',
  facture__prix_3 VARCHAR(255) COLLATE '$interclassement',
  facture__tache_4 VARCHAR(255) COLLATE '$interclassement',
  facture__prix_4 VARCHAR(255) COLLATE '$interclassement',
  facture__tache_5 VARCHAR(255) COLLATE '$interclassement',
  facture__prix_5 VARCHAR(255) COLLATE '$interclassement',
  facture__tache_6 VARCHAR(255) COLLATE '$interclassement',
  facture__prix_6 VARCHAR(255) COLLATE '$interclassement',
  facture__tache_7 VARCHAR(255) COLLATE '$interclassement',
  facture__prix_7 VARCHAR(255) COLLATE '$interclassement',
  facture__total VARCHAR(255) COLLATE '$interclassement',
  projet__id VARCHAR(255) COLLATE '$interclassement',
  projet__nom VARCHAR(255) COLLATE '$interclassement',
  projet__numero VARCHAR(255) COLLATE '$interclassement',
  diffuseur__id VARCHAR(255) COLLATE '$interclassement',
  diffuseur__societe VARCHAR(255) COLLATE '$interclassement',
  diffuseur__siret VARCHAR(255) COLLATE '$interclassement',
  diffuseur__civilite VARCHAR(255) COLLATE '$interclassement',
  diffuseur__prenom VARCHAR(255) COLLATE '$interclassement',
  diffuseur__nom VARCHAR(255) COLLATE '$interclassement',
  diffuseur__adresse VARCHAR(255) COLLATE '$interclassement',
  diffuseur__code_postal VARCHAR(255) COLLATE '$interclassement',
  diffuseur__ville VARCHAR(255) COLLATE '$interclassement',
  diffuseur__telephone VARCHAR(255) COLLATE '$interclassement',
  diffuseur__email VARCHAR(255) COLLATE '$interclassement',
  diffuseur__website VARCHAR(255) COLLATE '$interclassement',
  profil__id VARCHAR(255) COLLATE '$interclassement'
  )";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);



  /**
  *  Création de la table Devis
  */

  $sql = "CREATE TABLE Devis (
  devis__id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  devis__corbeille TINYINT(1) DEFAULT 0,
  devis__template VARCHAR(255) COLLATE '$interclassement',
  devis__date VARCHAR(255) COLLATE '$interclassement',
  devis__numero VARCHAR(255) COLLATE '$interclassement',
  devis__statut VARCHAR(255) COLLATE '$interclassement',
  devis__notes VARCHAR(255) COLLATE '$interclassement',
  devis__tache_1 VARCHAR(255) COLLATE '$interclassement',
  devis__prix_1 VARCHAR(255) COLLATE '$interclassement',
  devis__tache_2 VARCHAR(255) COLLATE '$interclassement',
  devis__prix_2 VARCHAR(255) COLLATE '$interclassement',
  devis__tache_3 VARCHAR(255) COLLATE '$interclassement',
  devis__prix_3 VARCHAR(255) COLLATE '$interclassement',
  devis__tache_4 VARCHAR(255) COLLATE '$interclassement',
  devis__prix_4 VARCHAR(255) COLLATE '$interclassement',
  devis__tache_5 VARCHAR(255) COLLATE '$interclassement',
  devis__prix_5 VARCHAR(255) COLLATE '$interclassement',
  devis__tache_6 VARCHAR(255) COLLATE '$interclassement',
  devis__prix_6 VARCHAR(255) COLLATE '$interclassement',
  devis__tache_7 VARCHAR(255) COLLATE '$interclassement',
  devis__prix_7 VARCHAR(255) COLLATE '$interclassement',
  devis__total VARCHAR(255) COLLATE '$interclassement',
  projet__id VARCHAR(255) COLLATE '$interclassement',
  projet__nom VARCHAR(255) COLLATE '$interclassement',
  projet__numero VARCHAR(255) COLLATE '$interclassement',
  diffuseur__id VARCHAR(255) COLLATE '$interclassement',
  diffuseur__societe VARCHAR(255) COLLATE '$interclassement',
  diffuseur__siret VARCHAR(255) COLLATE '$interclassement',
  diffuseur__civilite VARCHAR(255) COLLATE '$interclassement',
  diffuseur__prenom VARCHAR(255) COLLATE '$interclassement',
  diffuseur__nom VARCHAR(255) COLLATE '$interclassement',
  diffuseur__adresse VARCHAR(255) COLLATE '$interclassement',
  diffuseur__code_postal VARCHAR(255) COLLATE '$interclassement',
  diffuseur__ville VARCHAR(255) COLLATE '$interclassement',
  diffuseur__telephone VARCHAR(255) COLLATE '$interclassement',
  diffuseur__email VARCHAR(255) COLLATE '$interclassement',
  diffuseur__website VARCHAR(255) COLLATE '$interclassement',
  profil__id VARCHAR(255) COLLATE '$interclassement'
  )";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);



  /**
  *  Création de la table Profil
  */

  $sql = "CREATE TABLE Profil (
  profil__id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  profil__societe VARCHAR(255) COLLATE '$interclassement',
  profil__civilite VARCHAR(255) COLLATE '$interclassement',
  profil__prenom VARCHAR(255) COLLATE '$interclassement',
  profil__nom VARCHAR(255) COLLATE '$interclassement',
  profil__adresse VARCHAR(255) COLLATE '$interclassement',
  profil__code_postal VARCHAR(255) COLLATE '$interclassement',
  profil__ville VARCHAR(255) COLLATE '$interclassement',
  profil__telephone VARCHAR(255) COLLATE '$interclassement',
  profil__email VARCHAR(255) COLLATE '$interclassement',
  profil__website VARCHAR(255) COLLATE '$interclassement',
  profil__siret VARCHAR(255) COLLATE '$interclassement',
  profil__numero_secu VARCHAR(255) COLLATE '$interclassement',
  profil__numero_mda VARCHAR(255) COLLATE '$interclassement',
  profil__precompte TINYINT(1) DEFAULT 0,
  profil__titulaire_du_compte VARCHAR(255) COLLATE '$interclassement',
  profil__iban VARCHAR(255) COLLATE '$interclassement',
  profil__bic VARCHAR(255) COLLATE '$interclassement',
  profil__msg_facture TEXT COLLATE '$interclassement',
  profil__msg_devis TEXT COLLATE '$interclassement'
  )";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);



  /**
  *  Redirection vers la page index.php pour que l'utilisateur
  *  entre des infos pour créer son premier profil.
  */

header('Location: ../index.php');
?>
