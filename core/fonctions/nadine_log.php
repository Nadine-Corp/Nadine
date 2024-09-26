<?php

/**
 * La fonction nadine_log(), surnommée TheMadManagerMode™
 * par le service marketing de NadineCorp.©, permet aux équipes
 * du NadineCrew et du NadineLab© de déboguer Nadine plus efficacement
 * en espionnant ses moindres faits et gestes.
 */

function nadine_log($msg)
{
  // Permet d'activer ou désactiver le MadManagerMode™
  $MadManagerMode = false;

  if (isset($msg) && $MadManagerMode == true) {
    $error_msg = date('Y-m-d H:i:s') . ' - ' . __FILE__ . "\n";
    $error_msg .= $msg . "\n";
    error_log($error_msg . PHP_EOL, 3, 'nadine__journal.log');
  }
}
