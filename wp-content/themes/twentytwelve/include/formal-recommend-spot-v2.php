<?php
global $isSmartPhone, $post;
$postName = $post->post_name;
$language = Yii::app()->language;

$data_work_count = array(
    'ja' => 70,
    'tw' => 70,
    'cn' => 70,
    'ko' => 70,
    'en' => 20
);
$work_count = isset($data_work_count[$language]) ? $data_work_count[$language] : 25;

$is_yukata_plan_new = is_page('yukata/plan');
$page_shinjuku_yukata = is_page('access/tokyo-area/shinjuku-area/shinjuku-station/yukata');
$page_sendai_parco2_yukata = is_page('formal/access/tohoku-area/sendai-parco2/yukata');
$page_sapporo_susukinostation_yukata = is_page('formal/access/sapporo-area/sapporo-susukinostation/yukata');

// Term by shop
$term_shop = array(
    'ginza-honten' => array(
        'link' => '/spot/tokyo-area/ginza-area',
        'slug' => 'ginza-area-spot',
        'text' => Yii::t('product', 'おすすめをもっと見る'),
    ),
    'asakusa' => array(
        'link' => '/spot/tokyo-area/asakusa-area',
        'slug' => 'asakusa-area-spot',
        'text' => Yii::t('product', 'おすすめをもっと見る'),
    ),
    'kamakura' => array(
        'link' => '/spot/tokyo-area/kamakura-area',
        'slug' => 'kamakura-area-spot',
        'text' => Yii::t('product', 'もっと鎌倉のコラムを読む....'),
    ),
	'kanazawa' => array(
        'link' => '/spot/tokyo-area/kanazawa-area',
        'slug' => 'kanazawa-area-spot',
        'text' => Yii::t('product', 'もっと金沢のコラムを読む....'),
    ),
    'yukata' => array(
		'slug'=>'ginza-area-spot'
	),
    'dazaifu' => array(
        'link' => '/spot/fukuoka-area',
        'slug' => 'fukuoka-area-spot',
        'text' => Yii::t('product', 'もっと太宰府のコラムを読む....'),
    ),
    'kurashiki' => array(
        'link' => '/spot/kurashiki-area',
        'slug' => 'kurashiki-area-spot',
        'text' => Yii::t('product', 'もっと倉敷のコラムを読む....'),
    ),
    'shinjuku-station' => array(
        'link' => '/spot/tokyo-area/shinjuku-area',
        'slug' => 'shinjuku-area-spot',
        'text' => Yii::t('product', 'もっと新宿のコラムを読む....'),
    ),
    'sendai-parco2' => array(
        'link' => '/spot/sendai-area',
        'slug' => 'sendai-area-spot',
        'text' => Yii::t('product', 'もっと仙台のコラムを読む....'),
    ),
    'sapporo-susukinostation' => array(
        'link' => '/spot/sapporo-area',
        'slug' => 'sapporo-area-spot',
        'text' => Yii::t('product', 'もっと札幌のコラムを読む....'),
    ),
    'osaka-shinsaibashi-opa' => array(
        'link' => '/spot/osaka-area',
        'slug' => 'osaka-area-spot',
        'text' => Yii::t('product', 'もっと心斎橋のコラムを読む....'),
    ),
    'okinawa-naha' => array(
    'link' => '/spot/okinawa-area',
    'slug' => 'okinawa-area-spot',
    'text' => Yii::t('product', 'もっと沖縄のコラムを読む....'),
    ),
    'kyotostation' => array(
        'link' => '/spot/kyoto-area/station-area',
        'slug' => 'station-area-spot',
        'text' => Yii::t('product', 'もっと京都のコラムを読む....'),
    ),
    'kanazawa-kenrokuen' => array(
        'link' => '/spot/tokyo-area/kanazawa-kenrokuen-area',
        'slug' => 'kanazawa-kenrokuen-area-spot',
        'text' => Yii::t('product', 'おすすめをもっと見る'),
    ),
    'kanazawa-area' => array(
        'link' => '/spot/tokyo-area/kanazawa-area',
        'slug' => 'kanazawa-area-spot',
        'text' => Yii::t('product', 'もっと金沢のコラムを読む'),
    ),
    'sendai-parco2' => array(
        'link' => '/spot/sendai-area',
        'slug' => 'sendai-area-spot',
        'text' => Yii::t('product', 'おすすめをもっと見る'),
    ),
    'shizuoka-area' => array(
        'link' => '/spot/shizuoka-area',
        'slug' => 'shizuoka-area-spot',
        'text' => Yii::t('product', 'もっと金沢のコラムを読む'),
    ),
    'ito' => array(
        'link' => '/spot/shizuoka-area',
        'slug' => 'shizuoka-area-spot',
        'text' => Yii::t('product', 'もっと伊豆のコラムを読む'),
    ),
    'kiyomizu-area' => array(
        'link' => '/spot/kyoto-area/kiyomizu-area',
        'slug' => 'kiyomizu-area-spot',
        'text' => Yii::t('product', 'おすすめをもっと見る'),
    ),
    'ninenzaka' => array(
        'link' => '/spot/kyoto-area/kiyomizu-area',
        'slug' => 'kiyomizu-area-spot',
        'text' => Yii::t('product', 'おすすめをもっと見る'),
    ),
);

// Post count by shop
$post_count_shop = array(
    'ginza-honten' => 4,
    'yukata' => 6,
    'asakusa' => 4,
    'kamakura' => 4,
    'kanazawa' => 4,
    'kurashiki' => 4,
    'dazaifu' => 4,
    'shinjuku-station' => 4,
    'sendai-parco2' => 4,
    'sapporo-susukinostation' => 4,
    'osaka-shinsaibashi-opa' => 4,
    'okinawa-naha' => 4,
    'kyotostation' => 4,
    'kanazawa-area' => 4,
    'kanazawa-kenrokuen' => 4,
    'shizuoka-area' => 4,
    'kiyomizu-area' => 4,
    'ninenzaka' => 4,
    'ito' => 4,
);

// Custom query for slug yukata
if ( $page_shinjuku_yukata ) {
    $post_count_shop = array(
        'yukata' => 4
    );
    $term_shop = array(
        'yukata' => array(
            'link' => '/spot/tokyo-area/shinjuku-area',
            'slug' => 'shinjuku-area-spot',
            'text' => Yii::t('product', 'もっと新宿のコラムを読む....'),
        )
    );
} elseif ( $page_sendai_parco2_yukata ) {
    $post_count_shop = array(
        'yukata' => 4
    );
    $term_shop = array(
        'yukata' => array(
            'link' => '/spot/sendai-area',
            'slug' => 'sendai-area-spot',
            'text' => Yii::t('product', 'もっと仙台のコラムを読む....'),
        )
    );
}elseif ( $page_sapporo_susukinostation_yukata ) {
    $post_count_shop = array(
        'yukata' => 4
    );
    $term_shop = array(
        'yukata' => array(
            'link' => '/spot/sapporo-area',
            'slug' => 'sapporo-area-spot',
            'text' => Yii::t('product', 'もっと札幌のコラムを読む....'),
        )
    );
}

$args = array(
    'post_type' => $is_yukata_plan_new ? 'post' : array('spot-post'),
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => $is_yukata_plan_new ? 'category' : 'spot-cate',
            'field' => 'slug',
            'terms' => $is_yukata_plan_new ? 'column_yukata' : $term_shop[$post->post_name]['slug'],
        ),
    ),
    'posts_per_page' => $is_yukata_plan_new ? 4 : $post_count_shop[$post->post_name],
    'order' => 'DESC',
    'orderby' => 'date',
);
$the_query  = new WP_Query($args);
$hasPost = $the_query->post_count;
?>

<?php if ($hasPost) : ?>
    <?php if ($attr_shortcode['layout_mode'] == 2 ) : ?>
        <div class="wrap-column-list">
            <ul class="column-list flexbox">
                <?php
                    if( $the_query->have_posts() ) :
                        $i = 0;
                        while( $the_query->have_posts() ) :
                            $i++;
                            $the_query->the_post();
                            if($isSmartPhone){
                                $image = has_post_thumbnail($post->ID) ? swe_get_the_post_thumbnail($post->ID, array(156,80), array('alt' => get_the_title())) : '<img src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
                            }else{
                                $image = has_post_thumbnail($post->ID) ? swe_get_the_post_thumbnail($post->ID, array(326,198), array('alt' => get_the_title())) : '<img src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
                            }
                            ?>
                        <li data-pid="<?php echo get_the_ID();?>">
                            <span class="post-num">0<?= $i; ?></span>
                            <div class="img"><a href="<?php the_permalink(); ?>"><?= $image; ?></a></div>
                            <?php if ($is_yukata_plan_new) { ?>
                                <ul class="list-column-title">
                                    <li class="column-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </li>
                                </ul>
                            <?php } else { ?>
                                <p class="column-title"><?php the_title(); ?></p>
                            <?php } ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="read">Read</a>
                        </li>
                    <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php endif;?>
            </ul>
            <div class="more-column">
                <?php if ($is_yukata_plan_new) : ?>
                    <a href="<?= home_url(); ?>/column/yukata" class="read-more">もっと浴衣のコラムを読む....</a>
                <?php else : ?>
                    <a href="<?= home_url() . $term_shop[$post->post_name]['link']; ?>" class="read-more"><?= $term_shop[$post->post_name]['text']; ?></a>
                <?php endif; ?>
            </div>
        </div>
    <?php elseif($attr_shortcode['layout_mode'] == 3 ): ?>
        <div class="wrap-column-list">
            <ul class="column-list column-list-<?= $postName; ?> flexbox">
                <?php
                if( $the_query->have_posts() ) :
                    $i = 0;
                    while( $the_query->have_posts() ) :
                        $i++;
                        $the_query->the_post();
                        if($isSmartPhone){
                            $image = has_post_thumbnail($post->ID) ? swe_get_the_post_thumbnail($post->ID, array(156,80), array('alt' => get_the_title())) : '<img src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
                        }else{
                            $image = has_post_thumbnail($post->ID) ? swe_get_the_post_thumbnail($post->ID, array(326,198), array('alt' => get_the_title())) : '<img src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
                        }
                        ?>
                        <li data-pid="<?php echo get_the_ID();?>">
                            <?php if ($is_yukata_plan_new) { ?>
                                <div class="img"><a href="<?php the_permalink(); ?>"><?= $image; ?></a></div>
                                <ul class="list-column-title">
                                    <li class="column-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </li>
                                </ul>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="read">click</a>
                            <?php } else { ?>
                                <a class="wrap-link-spot" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <div class="img"><?= $image; ?></div>
                                    <p class="column-title"><?php the_title(); ?></p>
                                    <p class="column-desc"><?= wp_trim_words( get_the_content(), $work_count, ' ...' ); ?></p>
                                </a>
                                <span class="read">click</span>
                            <?php } ?>
                        </li>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif;?>
            </ul>
            <div class="more-column">
                <?php if ($is_yukata_plan_new) : ?>
                    <a href="<?= home_url(); ?>/column/yukata" class="read-more">もっと浴衣のコラムを読む....</a>
                <?php else : ?>
                    <a href="<?= home_url() . $term_shop[$post->post_name]['link']; ?>" class="read-more"><?= $term_shop[$post->post_name]['text']; ?></a>
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <div class="list-content-spots">
            <ul class="list-content-spots">
                <?php
                    if( $the_query->have_posts() ) :
                        while( $the_query->have_posts() ) :
                            $the_query->the_post();
                            if($isSmartPhone){
                                $image = has_post_thumbnail($post->ID) ? swe_get_the_post_thumbnail($post->ID, array(156,80), array('alt' => get_the_title())) : '<img src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
                            }else{
                                $image = has_post_thumbnail($post->ID) ? swe_get_the_post_thumbnail($post->ID, array(326,198), array('alt' => get_the_title())) : '<img src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
                            }
                            ?>
                        <li class="item-content-spots flexbox">
                            <div class="img-content-spots">
                                <a href="<?php the_permalink(); ?>">
                                    <?= $image; ?>
                                </a>
                            </div>
                            <div class="text-content-spots">
                                <div class="title-text"><a title="<?= the_title(); ?>" href="<?php the_permalink(); ?>"><?= the_title(); ?></a></div>
                                <div class="des-text"><?= wp_trim_words( get_the_content(), $work_count, ' ...' ); ?></div>
                            </div>
                        </li>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif;?>
            </ul>
        </div>
    <?php endif; ?>
<?php endif; ?>
