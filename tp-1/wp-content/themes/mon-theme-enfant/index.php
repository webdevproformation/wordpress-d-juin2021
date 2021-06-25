<?php get_header() ?>
    <section class="row">
        <div class="col">
            <h1>Bienvenu dans mon site utilisant un thème enfant</h1>
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
                            <h2 class="fs-3"><?= the_title() ?></h2>
                            <?php edit_post_link( "Modifier" , "<div>" , "</div>" , $post ) ?>
                            <!-- <div><a href="http://localhost/wordpress/tp-1/wp-admin/post.php?post=107&action=edit">Modifier</a></div> -->
                        </header>
                        <!-- ajouter une image  l'image --> 
                        <?php get_template_part("part/miniature") ?>
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
        <div class="d-flex justify-content-center my-3">
            <?php echo paginate_links(); ?>
        </div>
       
    </section>
<?php get_footer() ?>