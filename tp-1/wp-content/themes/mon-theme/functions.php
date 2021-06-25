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
// activer la gestion du menu dans le back office > apparence
// permet de créer deux zones qui vont contenir 2 barres de menu 
register_nav_menus([ "top" => "Principal" , "bottom" => "Pied" ]);


//readStyle();


function menu3(string $name){
    $m = wp_get_nav_menu_items($name); // retourner une tableau avec élément mis dans ce menu 
    
    $tab = [];

    foreach($m as $lien){
        if($lien->menu_item_parent === "0"){
            // éléments qui n'ont pas de parent 
            $tab[$lien->ID] = [ "url" => $lien->url , "title" => $lien->title ];
        } else {
            // élément qui ont un parent 
            $tab[$lien->menu_item_parent][$lien->ID] = [ "url" => $lien->url , "title" => $lien->title ];
        }
    }
    // concaténation 
    $html = '<ul class="navbar-nav">';
    foreach($tab as $id => $item){
        if(count($item) == 2){
             // éléments qui n'ont pas de parent 
            $html .= '<li class="nav-item"><a href="'.$item["url"].'" class="nav-link">'.$item["title"].'</a></li>';
        } else {
             // élément qui ont un ou plusieurs enfants  
            $html .= '<li class="nav-item dropdown">
                      <a href="'.$item["url"].'" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" role="button" id="navbarDropdown-'.$id.'">'.$item["title"].'</a>';
            $html .= '<ul class="dropdown-menu" aria-labelledby="navbarDropdown-'.$id.'">';
            array_splice($item, 0, 2);
            foreach($item as $subitem){
                $html .= '<li><a class="dropdown-item" href="'.$subitem["url"].'">'.$subitem["title"].'</a></li>';
            }
            $html .= '</ul>';
            $html .= "</li>";
        }
    }
    $html .= '</ul>';
    return $html ; 
}

// ajouter la fonctionnalité image mise en avant dans tous les articles / les pages 
function starter_support(){
    add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'starter_support' );

function meta(){
    $m = get_the_tags(); // rien // [{},{}]
    $me = "";
    if(is_array($m)){
       foreach($m as $e){
            $me .= $e->name .",";
        }
      return $me ;
    }
    return "";
}