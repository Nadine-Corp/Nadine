<?php

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
