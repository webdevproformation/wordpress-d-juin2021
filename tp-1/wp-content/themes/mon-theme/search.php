<?php get_header() ?>
    <h1 class="mb-3">Résultat de la recherche pour : <span class="text-warning"><?= get_search_query() ?></span></h1>
    <?php if(have_posts()) : ?>
        <section class="row">
            <?php while(have_posts()) : ?>
                <article class="col-3">
                <?php the_post() ?>
                    <h2 class="fs-5"><?php the_title() ?></h2>
                    <?php get_template_part("part/miniature") ?>
                    <a href="<?php the_permalink() ?>" class="btn btn-sm btn-danger mt-3">
                        voir &rarr;
                    </a>
                </article>
            <?php endwhile ?>
        </section>
    <?php else : ?>
        <p>Aucun résultat trouvé dans le site, veuillez lancer une autre recherche :</p>
        <?php get_template_part("rechercher"); ?>
    <?php endif ?>
<?php get_footer()?>