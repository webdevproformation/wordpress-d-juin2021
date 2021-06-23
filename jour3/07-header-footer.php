dans notre site on vient de faire la page d'accueil 

=> créer plusieurs pages 
=> présenter uniquement 1 article 
=> la page de contact 
=> mentions légales 

pour éviter répéter le même code html / PHP wordpress 

dans le dossier mon-theme, créer deux nouveaux fichiers 

header.php 
footer.php 

retourner dans le fichier index.php 

retirer une partie du fichier index.php 
du début du fichier => balise ouvrant <main class="container mt-3">
    => le coller dans le fichier header.php 

retirer une deuxième  du fichier index.php 
balise fermante </main> => jusqu'à la fin 
=> le coller dans le fichier footer.php 

get_header() ; require("header.php"); include("header.php");
get_footer() ; require("footer.php"); include("header.php");

get_template_parts()

rechercher.php