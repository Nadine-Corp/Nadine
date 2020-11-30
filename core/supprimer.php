<?php

  $base = $_GET['base'];
  $cible = $_GET['cible'];
  $id =  $_GET['id'];




  $sql = "DELETE FROM $base WHERE $cible = $id";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error); $conn->close();

  $conn->close();

  header('Location: ../index.php');
?>
