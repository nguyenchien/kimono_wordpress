<?php
global $post;
$is_front_page = is_front_page();
$is_takuhai_yukata_page = is_page('takuhai/yukata');
// Term by shop
$args = array(
    'post_type' => 'post',
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' =>  $is_takuhai_yukata_page ? 'column_yukata' : 'column',
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
                <?php if ($is_takuhai_yukata_page) { ?>
                    <a href="<?= home_url()?>/column/yukata" class="read-more"><?php echo Yii::t('new-top-page-v2', 'もっと浴衣のコラムを読む....'); ?></a>
                <?php } else { ?>
                    <a href="<?= home_url()?>/column" class="read-more"><?php echo Yii::t('new-top-page-v2', 'もっと着物のコラムを読む....'); ?></a>
                <?php } ?>
            </div>
        </div>
<?php endif; ?>