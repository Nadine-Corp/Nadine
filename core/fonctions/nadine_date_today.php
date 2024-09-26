<?php

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
