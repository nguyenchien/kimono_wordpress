<?php if ( !empty($my_query) ) : ?>
    <ul class="formal-column-list">
        <?php foreach($my_query as $post) : ?>
            <?php
            $img = has_post_thumbnail($post->ID) ? swe_get_the_post_thumbnail($post->ID, array('271','275') ) : '<img src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
            ?>
            <li class="column-item-<?= $post->ID; ?>">
                <div class="image"><?php echo $img; ?></div>
                <p class="name"><?= $post->post_title; ?></p>
                <a href="<?php the_permalink($post->ID); ?>" class="link">記事を読む></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>