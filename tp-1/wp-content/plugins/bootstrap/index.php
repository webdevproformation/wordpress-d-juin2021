<?php 

/**
 * Plugin Name: Bootstrap 5.3
 * Author: Malik H
 * Description: Ajouter la librairie Bootstrap 5 dans mon thème
 * Version: 1.2
 */

if ( ! defined( 'ABSPATH' ) ) {
    echo "arrêt de m'attaquer !!!";
    exit;
}

add_action( "wp_enqueue_scripts", function(){
    wp_enqueue_style("bootstrap5-style" , "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css", [],"5.0.2");
    wp_enqueue_script("bootstrap5-script" , "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" , [] , "5.0.2" , true);
} ); // javascript 

// document.querySelector("element").addEventListener("click" , function(){})
// template => template hierarchy 
// loop => WP_Query
// rdv 13h40 bon appétit !!! 
