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
        <div class="wrap-column-list">
            <ul class="column-list flexbox">
                <?php
                    if( $the_query->have_posts() ) :
                        $i = 0;
                        while( $the_query->have_posts() ) :
                            $i++;
                            $the_query->the_post();
                            $image = has_post_thumbnail($post->ID) ? swe_get_the_post_thumbnail($post->ID, 'post-thumbnail', array('alt' => get_the_title())) : '<img src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
                            ?>
                        <li data-pid="<?php echo get_the_ID();?>">
                            <span class="post-num">0<?= $i; ?></span>
                            <div class="img"><a href="<?php the_permalink(); ?>"><?= $image; ?></a></div>
                                <ul class="list-column-title">
                                    <li class="column-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </li>
                                </ul>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="read">Read</a>
                        </li>
                    <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php endif;?>
            </ul>
            <div class="more-column">
                <a href="<?= home_url(); ?>/spot/kyoto-area" class="read-more"><?php echo Yii::t('new-top-page-v2', 'もっと京都のコラムを読む....'); ?></a>
            </div>
        </div>
<?php endif; ?>