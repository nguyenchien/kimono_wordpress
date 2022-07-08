<?php
    global $post, $custom_taxonomies, $custom_post_type;
?>
<?php if( $query->have_posts() ) :?>
    <div class="wrap-blog-and-banner-plan wrap-blog-and-banner-plan-for-group">
    <div class="title-general-new-group text-center flexbox"><h3 class="title-h3-new-group">団体プランをご利用されたグループ様のご紹介</h3></div>
    <div class="content-new-info wrap-wg-fm-information wrap-wg-fm-information-access">
    <div class="item-info item-info-work">
    <ul class="list-info flexbox">
    <?php
    while( $query->have_posts() ) :
        $query->the_post();
        $blog_link = dirname(get_permalink( $post->ID ));

        // Get shop name
        $post_terms = wp_get_post_terms($post->ID, 'shop-blog');
        $shop_name = '';
        foreach ($post_terms as $post_term) {
            if ($post_term->parent){
                $shop_name = $post_term->name;
            }
        }
        ?>
        <li class="sub-item-info">
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                <div class="image"><?php echo swe_wp_get_attachment_image(get_post_thumbnail_id(), array(369, 277), false, array('alt' => strip_tags(get_the_title()))); ?></div>
                <?php else: ?>
                    <div class="image"><img src="<?php echo WP_HOME; ?>/images/no-image.png" alt=""></div>
                <?php endif; ?>
                <p class="date"><?php echo get_the_date('Y.m.d'); ?></p>
                <p class="name overflow-content"><?php the_title();?></p>
            </a>
            <div class="status-view"><a class="shop_name" href="<?= $blog_link; ?>"><span class="text-view"><?= $shop_name; ?></span></a></div>
            <p class="link-to"><a href="<?php the_permalink(); ?>">続きを読む</a></p>
        </li>
    <?php endwhile;?>
    </ul>
    <?php wp_reset_postdata(); ?>
    </div>
    </div>
    </div>
<?php endif;?>

