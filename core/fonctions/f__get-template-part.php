<?php

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
