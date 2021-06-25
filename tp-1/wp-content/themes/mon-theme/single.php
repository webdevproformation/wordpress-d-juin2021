<?php get_header()?>

<article class="row">
    <?php if(have_posts()) : ?>
        <?php while(have_posts()) : ?>
            <?php the_post() ?>

            <div class="col-3">
                <h1><?= the_title() ?></h1>

                <?php if(has_post_thumbnail()): ?>
                    <?php the_post_thumbnail("medium" , ["class" => "img-thumbnail" , "title" => get_the_title()]) ?>
                    <!--  taille voulue : thumbnail , medium , large , original -->
                <?php else : ?>
                    <img src="http://via.placeholder.com/300x200?text=no-image" alt="" title="<?= get_the_title() ?>" class="img-thumbnail">
                <?php endif ?>

                <?php edit_post_link( "Modifier" , "<div>" , "</div>" , $post ) ?>
                <h3 class="fs-5">Catégories associées</h3>
                <?php the_category(); ?><!-- le ou les catégories sélectionnées dans le back office -->
                <?php $tags = get_the_tags() ?>
                <?php if($tags) : ?>
                <h3 class="fs-5">Tags associés</h3>
                <div class="mb-3">
                    <?php the_tags(); ?>
                </div>
                <?php endif ?>
                <h3 class="fs-5">Publiée le :</h3>
                <?php the_date() ?>

            </div>
            <div class="col-9 contenu">
                <?= str_replace( "&nbsp;", " ", get_the_content() ) ?> 
                <hr>
                <h3 class="text-center">Voir un autre article ?? </h3>
                <div class="d-flex justify-content-between">
                    <?php previous_post_link("%link" , "<span>%title</span>"); ?>
                    <?php next_post_link("%link" , "<span>%title</span>"); ?>
                </div>
            </div>
        <?php endwhile ?>
    <?php endif ?>
</article>

<?php get_footer()?>