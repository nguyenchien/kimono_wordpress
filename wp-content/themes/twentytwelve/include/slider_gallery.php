<div class="slider-gallery" id="slider-gallery">
    <?php
    $posts = $query->posts;
    $newPosts = array();
    $numberPosts = count($posts);
    $index_group = 0;
$isFrontPage = is_front_page();

    for ($index = 0; $index < $numberPosts; $index++) {
        if ($index > 0 && !($index%2)) {
	        $index_group++;
        }
	    $newPosts[$index_group][] = $posts[$index];
    }

   if($isFrontPage) : ?>
        <div class="slider-gallery-item">
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/01.jpg" alt="着物コーディネートに注目" />
            </div>
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/05.jpg" alt="着物コーディネートに注目" />
            </div>
        </div>
        <div class="slider-gallery-item">
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/02.jpg" alt="着物コーディネートに注目" />
            </div>
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/06.jpg" alt="着物コーディネートに注目" />
            </div>
        </div>
        <div class="slider-gallery-item">
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/03.jpg" alt="着物コーディネートに注目" />
            </div>
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/07.jpg" alt="着物コーディネートに注目" />
            </div>
        </div>
        <div class="slider-gallery-item">
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/04.jpg" alt="着物コーディネートに注目" />
            </div>
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/08.jpg" alt="着物コーディネートに注目" />
            </div>
        </div>
        <div class="slider-gallery-item">
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/09.jpg" alt="着物コーディネートに注目" />
            </div>
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/13.jpg" alt="着物コーディネートに注目" />
            </div>
        </div>
        <div class="slider-gallery-item">
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/10.jpg" alt="着物コーディネートに注目" />
            </div>
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/14.jpg" alt="着物コーディネートに注目" />
            </div>
        </div>
        <div class="slider-gallery-item">
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/11.jpg" alt="着物コーディネートに注目" />
            </div>
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/15.jpg" alt="着物コーディネートに注目" />
            </div>
        </div>
        <div class="slider-gallery-item">
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/12.jpg" alt="着物コーディネートに注目" />
            </div>
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/16.jpg" alt="着物コーディネートに注目" />
            </div>
        </div>
        <div class="slider-gallery-item">
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/17.jpg" alt="着物コーディネートに注目" />
            </div>
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/21.jpg" alt="着物コーディネートに注目" />
            </div>
        </div>
        <div class="slider-gallery-item">
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/18.jpg" alt="着物コーディネートに注目" />
            </div>
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/22.jpg" alt="着物コーディネートに注目" />
            </div>
        </div>
        <div class="slider-gallery-item">
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/19.jpg" alt="着物コーディネートに注目" />
            </div>
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/23.jpg" alt="着物コーディネートに注目" />
            </div>
        </div>
        <div class="slider-gallery-item">
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/20.jpg" alt="着物コーディネートに注目" />
            </div>
            <div class="wrap-gallery-img">
                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/instagram-gallery/24.jpg" alt="着物コーディネートに注目" />
            </div>
        </div>
    <?php else: ?>
        <?php if($newPosts):
    ?>
    <?php
        foreach($newPosts as $postsList) :
        ?>
            <div class="slider-gallery-item">
        <?php
            foreach($postsList as $postItem) :
                $planGroup = get_field('yukata_kimono_plan', $postItem->ID);
                $planTypeName = '';

                if($planGroup == 1) {
                    $planTypeName = get_field('kimono_plan_type', $postItem->ID);
                }elseif($planGroup == 3){
                    $planTypeName = get_field('yukata_plan_type', $postItem->ID);
                }

                $customerGalleryImage = get_field('customer_gallery_image', $postItem->ID);
	            $customerGalleryImage = swe_wp_get_attachment_image_src($customerGalleryImage, array(150, 150));
	            $imageSource = !empty($customerGalleryImage[0]) ? $customerGalleryImage[0]: null;
                $shopName = Yii::t('wp_theme', get_field('shop', $postItem->ID));
                $planName = Yii::t('wp_theme', $planTypeName);
            ?>
                <div class="wrap-gallery-img"><img data-post="<?php echo $postItem->ID;?>" <?php echo (!empty($imageSource) ? 'data-src="'.$imageSource.'"': '');?> alt="<?php echo $shopName." ".$planName ?>" /></div>
            <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="margin-bottom: 20px;text-align: center;font-size: 17px;"><?= Yii::t('wp_theme','申し訳ありません、現在準備中です', array(), null, $langC);?></p>
    <?php endif; ?>
<?php endif; ?>
</div>
<script type="text/javascript">
$(document).ready(function () {
	if ($('.slider-gallery').length) {
		$('.slider-gallery').not('.slick-initialized').slick({
			infinite: true,
			slidesToShow: 4,
			slidesToScroll: 4,
			arrows: true,
			lazyLoad: 'ondemand',
			responsive: [
				{
					breakpoint: 750,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3
					}
				}
			]
		});
	}
});
</script>
