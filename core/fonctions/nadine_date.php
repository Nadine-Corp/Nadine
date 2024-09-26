<?php

/**
 * La fonction nadine_date() permet d'harmoniser
 * l'affichage des dates de Nadine
 */
function nadine_date($date, $format = 'abrv')
{
  if (!isset($date)) {
    return null; // Gère le cas où la date n'est pas définie
  }

  // Défini le fuseau horaire
  date_default_timezone_set('Europe/Paris');
  $locale = 'fr_FR';

  // Définition des formats selon les types
  $formats = [
    'abrv'    => 'LLL Y',        // Exemple : Sept. 2021
    'full'    => 'eee dd LLL Y', // Exemple : Sam. 18 Sept. 2021
    'brutfr'  => 'dd/LL/Y',      // Exemple : 18/09/2021
    'brut'    => 'Y-LL-dd'       // Exemple : 2021-09-18
  ];

  // Vérifie si le format est valide
  $datePattern = $formats[$format] ?? $formats['abrv'];

  // Crée l'instance d'IntlDateFormatter
  $formatter = new IntlDateFormatter($locale, IntlDateFormatter::FULL, IntlDateFormatter::FULL);
  $formatter->setPattern($datePattern);

  // Formate la date selon le format défini
  $dateFormatted = $formatter->format($date);

  // Applique ucwords si le format n'est pas brut
  if ($format == 'abrv' || $format == 'full') {
    $dateFormatted = ucwords($dateFormatted);
  }

  // Retourne le résultat au template
  return $dateFormatted;
}
