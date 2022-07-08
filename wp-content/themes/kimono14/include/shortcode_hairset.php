<?php
global $post;
$args = array (
    'post_status'            => 'publish',
    'posts_per_page'         => '1200',
    'order'                  => 'DESC',
    'orderby'                => 'date',
);
if(post_type_exists('hairset')){
    $args['post_type'] = 'hairset';
}
$the_query = new WP_Query( $args );
$plan_type_attr = $attr['plan_type'];
if (empty($plan_type_attr)) {
    return;
}
if($the_query -> have_posts()):
?>
    <div class="content-list clearfix">
<?php
    while ($the_query -> have_posts()){
        $the_query -> the_post();
        $plan_type = get_field('plan_type');
        if ($plan_type != $plan_type_attr) {
            continue;
        }
        $main_image_obj = get_field('main_image');
        $main_image_url = '';
        if(!empty($main_image_obj)){
            $main_image_obj = swe_wp_get_attachment_image_src($main_image_obj);
            $main_image_url = $main_image_obj[0];
        }
        $sub_image_1_obj = get_field('sub_image_1');
        $sub_image_1_url = '';
        if(!empty($sub_image_1_obj)){
            $sub_image_1_obj = swe_wp_get_attachment_image_src($sub_image_1_obj);
            $sub_image_1_url = $imag_obj[0];
        }
        $sub_image_2_obj = get_field('sub_image_2');
        $sub_image_2_url = '';
        if(!empty($sub_image_2_obj)){
            $sub_image_2_obj = swe_wp_get_attachment_image_src($sub_image_2_obj);
            $sub_image_2_url = $sub_image_2_obj[0];
        }
        $description = get_field('description');
        $recommend_scene = get_field('recommend_scene');
        $recommend_scene = !empty($recommend_scene) ? implode("・", $recommend_scene) : '';
        $recommend_kimono = get_field('recommend_kimono');
        $recommend_kimono = !empty($recommend_kimono) ? $recommend_kimono : array();

?>
        <div class="product">
            <h4 class="title-product"><?php echo the_title(); ?></h4>
            <div class="wrap-product clearfix">
                <div class="main-image">
                    <?php if (!empty($main_image_url)) : ?>
                    <img width="200" height="280" src="<?php echo $main_image_url; ?>" class="attachment-full 4742" alt="">
                    <?php endif; ?>
                </div>
                <div class="list-image">
                    <ul class="thumb">
                        <li class="active">
                            <?php if (!empty($main_image_url)) : ?>
                                <img data-src="<?php echo $main_image_url; ?>" src="<?php echo $main_image_url; ?>" class="lazy-loaded">
                            <?php endif; ?>
                        </li>
                        <li>
                            <?php if (!empty($sub_image_1_url)) : ?>
                            <img data-src="<?php echo $sub_image_1_url; ?>" src="<?php echo $sub_image_1_url; ?>" class="lazy-loaded"></li>
                            <?php endif; ?>
                        <li>
                            <?php if (!empty($sub_image_2_url)) : ?>
                            <img data-src="<?php echo $sub_image_2_url; ?>" src="<?php echo $sub_image_2_url; ?>" class="lazy-loaded">
                            <?php endif; ?>
                        </li>
                    </ul></div>
                <p></p></div>
            <div class="desc">
                <p class="text-p"><?php echo $description; ?></p>
            </div>
            <div class="re-item scene"><h5>オススメシーン</h5><p class="text-p"><?php echo $recommend_scene; ?></p></div>
            <div class="re-item kimono">
                <h5>オススメ着物</h5>
                <ul>
                    <?php if (in_array("homongi", $recommend_kimono)) { ?><li class="homongi <?php echo  "enable"; ?>"><a href="/homongi">訪問着</a></li> <?php } ?>
                    <?php if (in_array("seijin", $recommend_kimono)) { ?><li class="sejin <?php echo "enable"; ?>"><a href="/seijin">振袖</a></li> <?php } ?>
                    <?php if (in_array("sotsugyou", $recommend_kimono)) { ?><li class="sotsugyou <?php echo  "enable"; ?>"><a href="/sotsugyou">袴&amp;二尺袖</a></li> <?php } ?>
                    <?php if (in_array("irotomesode", $recommend_kimono)) { ?><li class="irotomesode <?php echo "enable"; ?>"><a href="/irotomesode">色留袖</a></li> <?php } ?>
                    <?php if (in_array("kurotomesode", $recommend_kimono)) { ?><li class="kurotomesode <?php echo "enable"; ?>"><a href="/kurotomesode">黒留袖</a></li> <?php } ?>
                </ul>
            </div>
        </div>
<?php
    }
?>
    </div>
<?php
endif;
wp_reset_postdata();
?>
