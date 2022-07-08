<?php
global $post;
$is_front_page = is_front_page();
$isYukata = is_page('yukata');
$isYukataPlan = is_page('yukata/plan');
$is_takuhai_yukata_page = is_page('takuhai/yukata');
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();

// Term by shop
if($isYukataPlan){
    $data_type="lazy";
}else{
    $data_type="src";
}
if ($isYukata or $isYukataPlan) {
    $args = array(
        'post_type' => 'post',
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'column_yukata',
            ),
        ),
        'posts_per_page' => 4,
        'order' => 'DESC',
        'orderby' => 'date',
    );
} else {
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
}


$the_query  = new WP_Query($args);
$hasPost = $the_query->post_count;
?>

<?php if ($hasPost) : ?>
    <div class="wrap-kimono-column">
        <ul class="list-kimono-column slick-slider" id="kimono-column">
            <?php
            if( $the_query->have_posts() ) :
                $i = 0;
                while( $the_query->have_posts() ) :
                    $i++;
                    $the_query->the_post();
                    $image = has_post_thumbnail($post->ID) ? swe_get_the_post_thumbnail($post->ID, array(281,187), array('alt' => get_the_title())) : '<img data-'.$data_type.'="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
                    ?>
                    <li data-pid="<?php echo get_the_ID();?>" class="column-item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="img">
                                <?= $image; ?>
                            </div>
                        </a>
                        <p class="desc"><?php the_title(); ?></p>
                        <a class="see-more" href="<?php the_permalink(); ?>">もっと読む</a>
                    </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif;?>
        </ul>
        <div class="wrap-link-btn flexbox justify-content-center">
            <?php if($isYukata or $isYukataPlan): ?>
                <a class="link-to" href="<?= home_url()?>/column/yukata"><?= Yii::t('access-v2', 'もっと着物のコラムを見る')?></a>
            <?php else: ?>
                <a class="link-to" href="<?= home_url()?>/column"><?= Yii::t('access-v2', 'もっと着物のコラムを見る')?></a>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
