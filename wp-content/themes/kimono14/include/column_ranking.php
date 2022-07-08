<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 2/6/2018
 * Time: 5:30 PM
 */
if(function_exists('swe_pvc_most_viewed_posts')){
    global $custom_post_type;
    $args = array(
        'number_of_posts' => 5,
        'order' => 'desc',
        'thumbnail_size' => 'thumbnail',
        'show_post_views' => true,
        'show_post_excerpt' => false,
        'title' => '人気の記事',
        'no_posts_message' => Yii::t('wp_theme', 'No Posts found'),
        'post_type' => array($custom_post_type['blog'])
    );
    $posts = swe_pvc_most_viewed_posts($args, false, true);
    if (!empty($posts) && is_array($posts)) {
        ?>
        <ul class="list-col-cate list-col-cate-blog list-col-cate-column sp flexbox">
            <?php
            $colors = array(1 => 'gold', 2 => 'silver', 3 => 'bronze');
            $i = 1;
            foreach ($posts as $post) {
                setup_postdata($post);
                $color = array_key_exists($i, $colors) ? $colors[$i] : '';
                $img = has_post_thumbnail() ? swe_get_the_post_thumbnail($post->ID) : '<img src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
                //$img = '<img src="'.WP_HOMES.'/images/formal-rental/img-blog-cat.jpg" alt="">';
                $view_count = do_shortcode('[post-views]');
                ?>
                <li class="item-col-cate">
                    <div class="box-content-cate flexbox">
                        <div class="wrap-image-cate"><a href="<?php the_permalink();?>" title="<?php the_title();?>"> <?php echo $img; ?><span class="circle-num <?php echo $color; ?> flexbox align-items-center justify-content-center"><var class="num"><?php echo $i; ?></var></span></a></div>
                        <div class="info-inner-cate">
                            <div class="wrap-post-date flexbox pc">
                                <div class="pc post-date"><?php the_date(); ?></div>
                                <div class="pc wrap-feature">特集</div>
                            </div>
                            <div class="box-title-inner-info flexbox"><p class="title-inner-info-name"><?php the_title();?></p></div>
                            <div class="box-bottom-inner-info flexbox justify-content-between">
                                <div class="wrap-view-feature flexbox">
                                    <div class="sp wrap-feature">特集</div>
                                    <div class="wrap-num-view flexbox"><span class="num-view"><?php echo $view_count;?></span><span class="name-view">view</span></div>
                                </div>
                                <div class="read-more-info"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><span>&gt;</span>記事を読む</a></div>
                            </div>
                        </div>
                </li>
                <?php
                $i++;
            }
            ?>
        </ul>
        <?php
    }
}
