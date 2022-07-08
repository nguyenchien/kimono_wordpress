<?php
    $isYukata = is_page('yukata');
    if ($isYukata) {
        $args = array(
            'post_type' => 'customer-gallery',
            'post_status' => 'publish',
            'posts_per_page' => 6,
            'order' => 'DESC',
            'orderby' => 'date',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'yukata_kimono_plan',
                    'value' => 3,
                ),
            )
        );
    } else {
        $args = array(
            'post_type' => 'customer-gallery',
            'post_status' => 'publish',
            'posts_per_page' => 6,
            'order' => 'DESC',
            'orderby' => 'date',
        );
    }

    $the_query  = new WP_Query($args);
    $hasPost = $the_query->post_count;
?>
<ul class="slider-photo-gallery slick-slider" id="slider-photo-gallery">
    <?php
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ) :
            $the_query->the_post();

            $planGroup = get_field("yukata_kimono_plan");

            $planTypeName = "";
            if($planGroup == 1){
                $classTitleBg = 'title-img-gallery-kimono';
                $planTypeName = get_field("kimono_plan_type");
            }elseif($planGroup == 3){
                $classTitleBg = 'title-img-gallery-yukata';
                $planTypeName = get_field("yukata_plan_type");
            }
            $langC = (isset($_GET['langC'])) ? $_GET['langC'] : "ja";
            $shopName = Yii::t('new-kimono-gallery-shop',get_field('shop'), array(), null, $langC);
            $planName = Yii::t('new-kimono-gallery-plan',$planTypeName, array(), null, $langC);
            $customerGalleryImage = get_field("customer_gallery_image");
            $customerGalleryImage = swe_wp_get_attachment_image_src($customerGalleryImage, array(304,306))[0];
            ?>
            <li class="item">
                <div class="img">
                    <img data-src="<?= $customerGalleryImage; ?>" alt="<?php echo $shopName." ".$planName ?>">
                </div>
            </li>
            <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif;?>
</ul>
