<!-- ce fichier page-nous-contacter.php  dédié à la page contact -->

<?php get_header() ?>

<!--  PHP Requête SQL  dans projet wp => loop (boucle wp) -->
<article class="row">
    <?php if(have_posts()) : ?>
        <?php while(have_posts()) : ?>
            <?php the_post() ?>
            <header class="col-12 d-flex justify-content-between align-items-center">
                <h1><?php the_title() ?></h1>
                <time><?php the_date() ?></time>
            </header>
            <?php edit_post_link( "Modifier" , "<div class='col-12'>" , "</div>" , $post ) ?>
            <div class="col-6">
                <?php if(has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail( "large", ["class" => "img-thumbnail"] ) ?>
                <?php else : ?>
                    <img src="http://via.placeholder.com/700x400" alt="" class="img-thumbnail">
                <?php endif ?>
            </div>
            <div class="col-6">
                <ul>
                    <li>téléphone : <?= get_post_meta($post->ID, "tel" , true) ?></li>
                    <li>adresse : <?= get_post_meta($post->ID, "adresse" , true) ?></li>
                </ul>
                <?= get_post_meta($post->ID, "map" , true) ?>
            </div>
            <div class="col-12 mt-3">
                <?php the_content() ?>
            </div>
        <?php endwhile ?>
    <?php else : ?>
        <p>aucune page trouvée </p>
    <?php endif ?>
</article>

<?php get_footer() ?>