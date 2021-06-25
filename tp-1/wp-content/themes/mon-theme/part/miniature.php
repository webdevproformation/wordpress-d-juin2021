<?php if(has_post_thumbnail()) : ?>
    <?php the_post_thumbnail( "large", ["class" => "img-thumbnail"] ) ?>
<?php else : ?>
    <img src="http://via.placeholder.com/700x400" alt="" class="img-thumbnail">
<?php endif ?>