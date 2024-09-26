<?php

/**
 * La fonction sanitize() convertie des chaînes de caractère
 * pour les transformer en .class plus classe
 */

function sanitize($string)
{
  // Translitération des caractères avec des accents
  $string = transliterator_transliterate('Any-Latin; Latin-ASCII', $string);
  // Modifie tous les caractères spéciaux et les espaces
  $string = filter_var($string, FILTER_SANITIZE_URL);
  // Met tous les caractères en minuscules
  $string = mb_strtolower($string);
  // Retourne la chaîne de caractères modifiée
  return $string;
}
