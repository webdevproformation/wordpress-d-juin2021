<?php 

function ma_fonction($object_post){
    /*  var_dump(); */
    return "nb commentaires : $object_post->comment_count" ;
}
// wordpress => librairie 
//en PHP require()
// 16h00 bon café @ toute suite !!

function readStyle(){
    $dir = str_replace("functions.php","", __FILE__);

    // $t = "bonjour les amis";
    // $nouvellePhrase = str_replace("amis", "copains", $t);
    // $nouvellePhrase = "bonjour les copains";
    // C:\xampp\htdocs\wordpress\tp-1\wp-content\themes\mon-theme\functions.php
    // C:\xampp\htdocs\wordpress\tp-1\wp-content\themes\mon-theme\
    ob_start();
    include("$dir/autre-style.css");
    $variable = ob_get_clean(); // string 
    var_dump(explode("\n", $variable));
    die();

}

//readStyle();