<?php get_header() ?>
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
                        <footer class="card-footer">
                            <a href="<?= the_permalink() ?>" class="btn btn-dark btn-sm">Lire la suite &rarr;</a>
                        </footer>
                    </article>
                </div>

            <?php endwhile ?>
        <?php else : ?>
                <p>Aucune donnée pour la page demandée </p>
        <?php endif ?>
    </section>
<?php get_footer() ?>