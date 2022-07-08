<?php
global $post;
$is_front_page = is_front_page();
// Term by shop


// Post count by shop
$post_count_shop = array(
    'kyoto' => 4,
);

$args = array(
    'post_type' => array('spot-post'),
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'spot-cate',
            'field' => 'slug',
            'terms' =>  'kyoto-area-spot',
        ),
    ),
    'posts_per_page' => 4,
    'order' => 'DESC',
    'orderby' => 'date',
);

$the_query  = new WP_Query($args);
$hasPost = $the_query->post_count;
?>

<?php if ($hasPost) : ?>
    <div class="wrap-kyoto-column">
        <ul class="list-column slick-slider" id="kyoto-column">
            <?php
            if( $the_query->have_posts() ) :
                $i = 0;
                while( $the_query->have_posts() ) :
                    $i++;
                    $the_query->the_post();
                    $image = has_post_thumbnail($post->ID) ? swe_get_the_post_thumbnail($post->ID, array(220,220), array('alt' => get_the_title())) : '<img src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
                    ?>
                    <li data-pid="<?php echo get_the_ID();?>">
                        <div class="img">
                            <a href="<?php the_permalink(); ?>">
                                <?= $image; ?>
                            </a>
                        </div>
                        <p class="desc"><?php the_title(); ?></p>
                    </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif;?>
        </ul>
        <div class="wrap-link-btn flexbox justify-content-center">
            <a class="link-to" href="<?= home_url()?>/spot/kyoto-area">もっと京都のコラムを見る</a>
        </div>
    </div>
<?php endif; ?>
