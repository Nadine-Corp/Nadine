<?php

  $sql = "DROP DATABASE nadine";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);

  $sql = "CREATE DATABASE IF NOT EXISTS Nadine";
  $servername = "localhost";
  $username = "root";
  $password = "";

  $conn = new mysqli($servername, $username, $password);
  if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
  $result = $conn->query($sql) or die($conn->error);



  $sql = "CREATE TABLE diffuseurs(
  diffuseur__id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  diffuseur__societe VARCHAR(255),
  diffuseur__siret VARCHAR(255),
  diffuseur__civilite VARCHAR(255),
  diffuseur__prenom VARCHAR(255),
  diffuseur__nom VARCHAR(255),
  diffuseur__adresse VARCHAR(255),
  diffuseur__code_postal VARCHAR(255),
  diffuseur__ville VARCHAR(255),
  diffuseur__telephone VARCHAR(255),
  diffuseur__email VARCHAR(255),
  diffuseur__website VARCHAR(255)
  )";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);

  $sql = "CREATE TABLE artistes(
  artiste__id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  artiste__societe VARCHAR(255),
  artiste__siret VARCHAR(255),
  artiste__societe VARCHAR(255),
  artiste__siret VARCHAR(255),
  artiste__civilite VARCHAR(255),
  artiste__prenom VARCHAR(255),
  artiste__nom VARCHAR(255),
  artiste__numero_secu VARCHAR(255)
  artiste__numero_mda VARCHAR(255)
  artiste__adresse VARCHAR(255),
  artiste__code_postal VARCHAR(255),
  artiste__ville VARCHAR(255),
  artiste__telephone VARCHAR(255),
  artiste__email VARCHAR(255),
  artiste__website VARCHAR(255)
  )";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);




  $sql = "CREATE TABLE Projets (
  projet__id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  projet__nom VARCHAR(255),
  projet__numero VARCHAR(255),
  projet__date_de_creation VARCHAR(255),
  projet__date_de_fin DATE NULL DEFAULT NULL,
  projet__statut VARCHAR(255),
  diffuseur__id VARCHAR(255)
  )";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);



  $sql = "CREATE TABLE Factures (
  facture__id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  facture__date VARCHAR(255),
  facture__numero VARCHAR(255),
  facture__statut VARCHAR(255),
  facture__tache_1 VARCHAR(255),
  facture__prix_1 VARCHAR(255),
  facture__tache_2 VARCHAR(255),
  facture__prix_2 VARCHAR(255),
  facture__tache_3 VARCHAR(255),
  facture__prix_3 VARCHAR(255),
  facture__tache_4 VARCHAR(255),
  facture__prix_4 VARCHAR(255),
  facture__tache_5 VARCHAR(255),
  facture__prix_5 VARCHAR(255),
  facture__tache_6 VARCHAR(255),
  facture__prix_6 VARCHAR(255),
  facture__tache_7 VARCHAR(255),
  facture__prix_7 VARCHAR(255),
  facture__total VARCHAR(255),
  projet__id VARCHAR(255),
  projet__nom VARCHAR(255),
  projet__numero VARCHAR(255),
  diffuseur__id VARCHAR(255),
  diffuseur__societe VARCHAR(255),
  diffuseur__siret VARCHAR(255),
  diffuseur__civilite VARCHAR(255),
  diffuseur__prenom VARCHAR(255),
  diffuseur__nom VARCHAR(255),
  diffuseur__adresse VARCHAR(255),
  diffuseur__code_postal VARCHAR(255),
  diffuseur__ville VARCHAR(255),
  diffuseur__telephone VARCHAR(255),
  diffuseur__email VARCHAR(255),
  diffuseur__website VARCHAR(255),
  profil__id VARCHAR(255)
  )";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);



  $sql = "CREATE TABLE Devis (
  devis__id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  devis__date VARCHAR(255),
  devis__numero VARCHAR(255),
  devis__statut VARCHAR(255),
  devis__tache_1 VARCHAR(255),
  devis__prix_1 VARCHAR(255),
  devis__tache_2 VARCHAR(255),
  devis__prix_2 VARCHAR(255),
  devis__tache_3 VARCHAR(255),
  devis__prix_3 VARCHAR(255),
  devis__tache_4 VARCHAR(255),
  devis__prix_4 VARCHAR(255),
  devis__tache_5 VARCHAR(255),
  devis__prix_5 VARCHAR(255),
  devis__tache_6 VARCHAR(255),
  devis__prix_6 VARCHAR(255),
  devis__tache_7 VARCHAR(255),
  devis__prix_7 VARCHAR(255),
  devis__total VARCHAR(255),
  projet__id VARCHAR(255),
  projet__nom VARCHAR(255),
  projet__numero VARCHAR(255),
  diffuseur__id VARCHAR(255),
  diffuseur__societe VARCHAR(255),
  diffuseur__siret VARCHAR(255),
  diffuseur__civilite VARCHAR(255),
  diffuseur__prenom VARCHAR(255),
  diffuseur__nom VARCHAR(255),
  diffuseur__adresse VARCHAR(255),
  diffuseur__code_postal VARCHAR(255),
  diffuseur__ville VARCHAR(255),
  diffuseur__telephone VARCHAR(255),
  diffuseur__email VARCHAR(255),
  diffuseur__website VARCHAR(255),
  profil__id VARCHAR(255),
  )";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);



  $sql = "CREATE TABLE Profil (
  profil__id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  profil__societe VARCHAR(255),
  profil__civilite VARCHAR(255),
  profil__prenom VARCHAR(255),
  profil__nom VARCHAR(255),
  profil__adresse VARCHAR(255),
  profil__code_postal VARCHAR(255),
  profil__ville VARCHAR(255),
  profil__telephone VARCHAR(255),
  profil__email VARCHAR(255),
  profil__website VARCHAR(255),
  profil__siret VARCHAR(255),
  profil__numero_secu VARCHAR(255)
  profil__numero_mda VARCHAR(255)
  profil__titulaire_du_compte VARCHAR(255),
  profil__iban VARCHAR(255),
  profil__bic VARCHAR(255)
  )";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);



header('Location: ../index.php');
?>
