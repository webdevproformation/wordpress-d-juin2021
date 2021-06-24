    </main>
    <footer class="container d-flex justify-content-center py-3 align-items-center">
        <p class="me-2 mb-0">&copy; Malik H - <?= date("Y") ?></p>
        <?php $m = wp_get_nav_menu_items("Footer"); ?>
        <?php foreach($m as $lien) : ?>
            <?php $balise = "<a href=\"$lien->url\" class=\"mx-2\">$lien->title</a>" ?>
            <?= $balise ?>
        <?php endforeach ?>
        <?php get_template_part("rechercher" ) ?>
    </footer>
   
    <?php wp_footer() ?>
</body>
</html>

<!-- rdv 10h45 @ toute suite !! -->