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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                </nav>
            </div>
        </div>
    </header>
     <!-- composant navbar de bootstrap --> 
    <main class="container mt-3">
        <section class="row">
            <div class="col">
                <h1>Bienvenu dans mon site</h1>
            </div>
        </section>
        <section class="row">

            <!-- loop -->
            <?php if( have_posts() ) : ?><!--  ?? réussit à récupérer de données ?? -->
                <!-- si on a récupéré des données => afficher -->
                <?php while( have_posts() ) : ?>
                    <?php the_post() ?> <!-- données récupérées -->
                    <div class="col-4">
                        <article class="card">
                            <header class="card-header">
                                <h2><?= the_title() ?></h2>
                                <?php edit_post_link( "Modifier" , "<div>" , "</div>" , $post ) ?>
                                <?= ma_fonction( $post ) ?>
                                <!-- <div><a href="http://localhost/wordpress/tp-1/wp-admin/post.php?post=107&action=edit">Modifier</a></div> -->
                            </header>
                            <!-- ajouter une image  l'image --> 
                            <?php if(has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('post-thumbnail' , ["class" => "img-fluid"]) ?>
                            <?php else : ?>
                                <img src="http://via.placeholder.com/300x200" alt="">
                            <?php endif ; ?>
                            <div class="card-body">
                                <?php the_excerpt() ?>
                                <!--  petit résumé => méta information extrait ou les premiers mots
                                the_content() => pendre l'intégralité du contenu de la zone de texte dans Gutenberg    
                            --> 
                            </div>
                        </article>
                    </div>

                <?php endwhile ?>
            <?php else : ?>
                    <p>Aucune donnée pour la page demandée </p>
            <?php endif ?>
        </section>
    </main>
    <footer class="container text-center mb-3">
        <hr>
        &copy; Malik H - <?= date("Y") ?>
    </footer>
    <?php wp_footer() ?>
</body>
</html>