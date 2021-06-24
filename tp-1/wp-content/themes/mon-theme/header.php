<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- télécharger bootstrap 
        google > bootstrap > https://getbootstrap.com/ > Get started > CSS > copy
    -->
 
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/style.css">
    
    <!-- http://localhost/wordpress/tp-1/wp-content/themes/mon-theme == get_template_directory_uri() -->
    <?php wp_head() ?>
</head>
<body class="theme">
    <header class="container-fluid bg-dark">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand navbar-dark col">
                    <a href="#" class="navbar-brand">Mon thème</a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Accueil</a>
                        </li>
                    </ul>
                   <?php get_template_part("rechercher", null, ["class" => "ms-auto"]) ?>
                </nav>
            </div>
        </div>
    </header>
     <!-- composant navbar de bootstrap --> 
    <main class="container mt-3">