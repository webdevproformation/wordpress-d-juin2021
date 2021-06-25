<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(" | ", true, "right") ?> <?= bloginfo('blogname') ?></title>
    <meta name="description" content="<?= wp_strip_all_tags(get_the_excerpt()) ?>">
    <meta name="keywords" content="<?= meta() ?>">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/style.css">
    <?php wp_head() ?>
</head>
<body class="theme">
    <header class="container-fluid bg-dark">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand navbar-dark col">
                   <a href="<?= get_option("home") ?>" class="navbar-brand">Mon thème</a>
                   <?= menu3("Principale") ?>
                   <?php get_template_part("rechercher", null, ["class" => "ms-auto"]) ?>
                </nav>
            </div>
        </div>
    </header>
     <!-- composant navbar de bootstrap --> 
    <main class="container mt-3">
        