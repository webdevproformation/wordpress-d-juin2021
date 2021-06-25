<?php get_header()?>
<?php //$data = get_post(107); ?> <!-- SELECT * FROM wp_posts WHERE id = 107 -->
<?php // var_dump( $data ) ?><!--  Fatal error: Uncaught Error: Object of class WP_Post could not be converted to string  -->
<div class="row">
    <?php if(have_posts()) : ?>
        <?php while(have_posts()) : ?>
            <?php the_post() ?>
             <h1><?= the_title() ?></h1>
             <div>
                 <?= the_content() ?>
             </div>
        <?php endwhile ?>
    <?php endif ?>
</div>

<?php get_footer()?>