<?php

/**
 * Fonction get_view_from_url()
 * 
 * Permet de récupérer le bon template en fonction de l'URL
 */

function get_view_from_url()
{
    // Ajoute qq variable
    $path = __DIR__ . '/../../views/v__';
    $view = 'projets';


    // Vérifie si une URL a été envoyé via .htacces
    if (isset($_GET['url'])) {
        // Récupère l'URL
        $url = $_GET['url'];

        // Supprime les paramètres éventuels
        $url = parse_url($url, PHP_URL_PATH);

        // Supprime l'extension éventuelle
        $url = preg_replace('/\.(php|html|htm)$/', '', $url);

        // Construit le chemin complet vers le template
        $view_file = $path . $url . '.php';

        // Vérifie si le fichier du template existe
        if (file_exists($view_file)) {
            $view = $url;
        }
    };

    // Formate le résulat
    $view = $path . $view . '.php';

    // Retourne le résultat
    return $view;
}


/**
 * Fonction the_view_from_url()
 * 
 * Permet d'afficher le bon template en fonction de l'URL
 */

function the_view_from_url()
{
    // Récupère les infos
    $view = get_view_from_url();

    // Retourne le résultat au template
    include($view);
}
