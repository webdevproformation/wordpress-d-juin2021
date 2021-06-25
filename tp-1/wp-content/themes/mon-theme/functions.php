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
    $m = wp_get_nav_menu_items($name);
    
    $tab = [];
    foreach($m as $lien){
        if($lien->menu_item_parent === "0"){
            $tab[$lien->ID] = [ "url" => $lien->url , "title" => $lien->title ];
        } else {
            $tab[$lien->menu_item_parent][$lien->ID] = [ "url" => $lien->url , "title" => $lien->title ];
        }
    }
    $html = '<ul class="navbar-nav">';
    foreach($tab as $id => $item){
        if(count($item) == 2){
            $html .= '<li class="nav-item"><a href="'.$item["url"].'" class="nav-link">'.$item["title"].'</a></li>';
        } else {
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