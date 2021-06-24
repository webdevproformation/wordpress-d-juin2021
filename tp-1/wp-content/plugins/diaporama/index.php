<?php 

/**
 * Plugin Name: diaporama
 * Author: Malik H
 * Version: 1.0
 * Description: comment créer un plugin dans wordpress 
*/

// au lieu d'insérer le code directement dans le thème 
// on va faire les même ajout MAIS via un plugin 

// pour ajouter le html 

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function generateHtmlDiaporama(){
    ob_start();
    include("diaporama.php");
    $htmlDiaporama = ob_get_clean();
   
    return $htmlDiaporama;
}

add_shortcode("diaporama", "generateHtmlDiaporama");
// ajouter dans Gutenberg => bloc code court => [diaporama]

// ajouter le javascript => footer.php 
// pas loin d'une fonction de wordpress wp_footer()
// ajouter le fichier diaporama.js dans notre thème via la fonction wp_footer()

// ajouter le css  => header.php 
// pas loin d'une fonction de wordpress wp_head()
// ajouter le fichier diaporama.css via la fonction wp_head()

// ajouter une comportement supplémentaire à des fonctions natives de Wordpress 
// Hook => point d'accroche 

function ajouterJsCssDiaporama(){
    wp_enqueue_style("style-diaporama",plugins_url("diaporama/diaporama.css"),[],"1.1"); // wp
    wp_enqueue_script("script-diaporama",plugins_url("diaporama/diaporama.js"),[],"1.2",true); // fonction de wordpress 
}

add_action("wp_enqueue_scripts", "ajouterJsCssDiaporama");
