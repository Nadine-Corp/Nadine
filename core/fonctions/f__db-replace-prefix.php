<?php

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
