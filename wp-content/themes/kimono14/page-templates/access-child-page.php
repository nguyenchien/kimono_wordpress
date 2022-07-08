<?php
/**
 * Template Name: Access Child Page
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
wp_register_style('access-style', get_template_directory_uri() . '/css/access.css', array('twentytwelve-style'), '20180112');
wp_enqueue_style('access-style');
wp_register_style('access-style-flexslider', WP_HOME . '/css/flexslider.css', array('twentytwelve-style'));

$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$styleCss = '';
if(!$isSmartPhone){
	$styleCss = '-pc';
}
wp_enqueue_style('box-customer-for-top-page-style', get_template_directory_uri() . '/css/box-customer-for-top-page'.$styleCss.'.css', array('twentytwelve-style'));
wp_register_style('access-style-flexslider', get_template_directory_uri() . '/css/flexslider.css', array('twentytwelve-style'));
wp_enqueue_style('access-style-flexslider');
wp_register_style('box-slider', get_template_directory_uri() . '/css/box-slider.css', array('twentytwelve-style'));
wp_enqueue_style('box-slider');
if (!$isSmartPhone) {
	wp_register_style('box-slider-pc', get_template_directory_uri() . '/css/box-slider-pc.css', array('twentytwelve-style'));
	wp_enqueue_style('box-slider-pc');
}
wp_enqueue_script('access-script-flexslider', WP_HOME . '/js/jquery.flexslider.js');
get_header();
global $post, $custom_post_type, $custom_taxonomies, $is_yukata, $sites;
$detect = Yii::app()->mobileDetect;
$useOtherStyleForNewShop = $detect->isSmartPhone() && ($post->post_name == 'kamakura');
$shopPetit = array(
	MasterValues::SHOP_GIONSHIRAKAWA_ID,
	MasterValues::SHOP_PETIT_KYOTOSTATION_ID
);
$shop_id = get_field('shop_id');
//add_shortcode( 'abc', 'getAbc' );
//function getAbc(){
//    echo 'abc' ;
//}

//shop_discount_december
$arr_shop_discount_december = array(2,5,6,8,9,10,11);
$arr_language_discount_december = array('ja','en','tw');
$language = Yii::app()->language;
$arrLangClosedShop = array(
    'ms' => 'https://kyotokimono-rental.com/wp-content/uploads/sites/2/2020/09/ms-page-add.jpg',
    'hi' => 'https://kyotokimono-rental.com/wp-content/uploads/sites/2/2020/09/hi-page-add.jpg',
    'ru' => 'https://kyotokimono-rental.com/wp-content/uploads/sites/2/2020/09/ru-page-add.jpg',
);
$arrClosedShop = array(6,8,9,11,18);
?>
<div class="container clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
    }
    ?>
    <div class="access-child-page hd-access <?php echo $post->post_name; ?>">
		<div class="container top-shop">
			<div class="shop-page-title shop-icon <?php echo $post->post_name; ?> clearfix">
				<?php $arr_icon = array(
					'access/kyotostation',
					'access/gion-shijo',
					'access/arashiyama',
                    '/access/arashiyama-togetsukyo',
					'access/kiyomizuzaka',
					'/asakusa/asakusa-access/asakusa',
                    '/access/tokyoskytree',
					'access/kamakura',
					'access/kanazawa');
				?>
				<div class="left" >
					<div class="clearfix">
						<h1 class="page-title <?php echo in_array($shop_id, MasterValues::$SHOP_CLOSE_SERVICE)?'page-title-shop-close-service':'';?>"><?php the_title(); ?></h1>
                        <span class='shop-name-en <?php echo in_array($shop_id, MasterValues::$SHOP_CLOSE_SERVICE)?'shop-name-en-close-service':'';?>'>
                            <?php if(Yii::app()->language == "ja") { ?>
                                <?php the_field('shop_name_en'); ?>
                            <?php } ?>
                            <?php if(in_array($shop_id, MasterValues::$SHOP_CLOSE_SERVICE)) { ?>
                                <?php the_field('shop_close_service'); ?>
                            <?php } ?>
                        </span>
					</div>
					<?php if(get_field('shop_detail_2')): ?>
					<p class="shop_detail_2 clearfix"><?php the_field('shop_detail_2'); ?></p>
					<?php endif; ?>
				</div>
				<?php if(!$detect->isSmartphone()):?>
					<div class='right list-icon-shop'>
						<?php foreach ($arr_icon as $v): $t = get_page_by_path($v); ?>
							<a class='icon-shop <?php echo $t->post_name . ($post->post_name == $t->post_name ? ' active ' : ""); ?>'
							   href='<?php echo ($post->post_name != $t->post_name ? get_permalink($t->ID)  : 'javascript:void(0)' ); ?>'
							   title='<?php echo strip_tags(get_the_title($t->ID)); ?>'><span><?php echo strip_tags(get_the_title($t->ID)); ?></span></a>
						<?php endforeach; ?>
					</div>
				<?php endif;?>
			</div>
            <?php if(array_key_exists($language, $arrLangClosedShop)): ?>
                <?php if(in_array($shop_id, $arrClosedShop)): ?>
                    <div class="close-info" style="text-align:center;margin:15px 0;">
                        <img src="<?= $arrLangClosedShop[$language]; ?>">
                    </div>
                <?php endif; ?>
            <?php endif; ?>
			<div class="shop-info clearfix">
				<?php
				$listGalery = getGaleryFromPost($post);
				if (!empty($post->post_content)):
					$content = strip_shortcode_gallery(get_the_content());
					?>
					<div class="shop-list">
						<div class="slide-images">
							<div class="gallery-item">
								<div class="main-image">
									<?php echo php_set_base_url($content); ?>
								</div><!-- end main-image -->
								<?php if($useOtherStyleForNewShop == false) :?>
                                    <?php if(!in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE)): ?>
                                        <div class="list-image right">
                                            <ul class="clearfix">
                                                <?php
                                                $shop_title = strip_tags(get_the_title());
                                                    if (!empty($listGalery) && is_array($listGalery)) :
						                            foreach ($listGalery as $galery) :
                                                    $galery = $galery['ids'];

                                                    if (!empty($galery) && count($galery) != 0) :
                                                        $i = 0;
                                                        foreach ($galery as $attachment_id):

                                                            $ok = swe_wp_get_attachment_image_src($attachment_id);
                                                            if (!empty($ok)) {
                                                                $image = swe_wp_get_attachment_image_src($attachment_id, 'full', false);
                                                                    $thumb = swe_wp_get_attachment_image_src($attachment_id, array(133, 100));
                                                                }
                                                            if (!empty($ok)) {
                                                                $i = $i + 1;
                                                                ?><li <?php if ($i % 5 == 0) echo "class='last'"; ?>>
                                                                    <a href="<?php echo $image[0]; ?>" rel="lightbox">
                                                                        <img src="<?php echo $thumb[0]; ?>"
                                                                             alt="<?php echo $shop_title; ?>"/>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div><!-- end list-image -->
                                    <?php
                                        else:
                                            wp_register_style('box-slider', get_template_directory_uri() . '/css/box-slider.css', array('twentytwelve-style'));
                                            wp_enqueue_style('box-slider');
                                            if (!$isSmartPhone) {
                                                wp_register_style('box-slider-pc', get_template_directory_uri() . '/css/box-slider-pc.css', array('twentytwelve-style'));
                                                wp_enqueue_style('box-slider-pc');
                                            }
                                    ?>
                                        <?php if(in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE)){ ?>
                                             <div class="shop-has-slide flexslider <?php echo (in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE_TEXT)?'shop-has-slide-text':'');?>" id="slide_shop_<?= $shop_id; ?>">
                                                <ul class="slides">
                                                    <?php
                                                    if (!empty($listGalery) && is_array($listGalery)) :
                                                    foreach ($listGalery as $galery) :
                                                        $galery = $galery['ids'];

                                                        if (!empty($galery) && count($galery) != 0) :
                                                            $i = 0;
                                                            foreach ($galery as $attachment_id):
                                                                ?>
                                                                <?php
                                                                $ok = swe_wp_get_attachment_image($attachment_id);
                                                                if(checkPostIDInSiteMedia($attachment_id)){
                                                                    switch_to_blog($sites['blog_media']);
                                                                    //Get title, description image
                                                                    $attachment = get_post($attachment_id);
                                                                    $title = get_the_title($attachment_id);
                                                                    $description = getTranslateContent($attachment->post_content);
                                                                    restore_current_blog();
                                                                } else {
                                                                    //Get title, description image
                                                                    $attachment = get_post($attachment_id);
                                                                    $title = get_the_title($attachment_id);
                                                                    $description = getTranslateContent($attachment->post_content);
                                                                }
                                                                if (!empty($ok)) {
                                                                    $i = $i + 1;
                                                                    $image = swe_wp_get_attachment_image_src($attachment_id, 'full', false);
                                                                    $thumb = swe_wp_get_attachment_image_src($attachment_id, array(230, 173));
                                                                    ?>
                                                                    <li <?php if ($i % 5 == 0) echo "class='last'"; ?>>
                                                                        <a href="<?php echo $image[0]; ?>" rel="lightbox">
                                                                            <img src="<?php echo $thumb[0]; ?>"
                                                                                 alt="<?php echo strip_tags(get_the_title()) ?>"/>
                                                                        </a>
                                                                        <?php if(Yii::app()->language === 'ja' && in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE_TEXT)): ?>
                                                                            <div class="description-shop-slide <?php echo 'description-shop-slide-'.$shop_id; ?>">
                                                                                <h4 class="title-des-shop-slide"><?php echo $title ?></h4>
                                                                                <p class="text-des-shop-slide"><?php echo $description ?></p>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    </li>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach;
                                                    endif; ?>

                                                </ul>
                                            </div>
                                            <script type="text/javascript">
                                                /* Slider for shop - start */
                                                var shopId = $(".shop-has-slide").attr("id");
                                                var itemShopWidth = 230;
                                                var itemMarginShopWidth = 10;
                                                var minItemsShop = 4;
                                                var maxItemsShop = 4;
                                                if(typeof mobile === 'number' && mobile === 1) {
                                                    minItemsShop = 2;
                                                    maxItemsShop = 2;
                                                }
                                                var shop_has_slider = function($) {
                                                    $('#'+shopId).flexslider({
                                                        slideshowSpeed:6000,
                                                        animationSpeed:400,
                                                        animation:"slide",
                                                        itemWidth: itemShopWidth,
                                                        itemMargin: itemMarginShopWidth,
                                                        controlNav:true,
                                                        directionNav:true,
                                                        pauseOnHover:true,
                                                        direction:"horizontal",
                                                        reverse:false,
                                                        prevText:"",
                                                        nextText:"",
                                                        easing:"linear",
                                                        slideshow:true,
                                                        useCSS:false,
                                                        minItems:minItemsShop,
                                                        maxItems:maxItemsShop
                                                    });
                                                };
                                                var timer_metaslider_shop = function() {
                                                    !window.jQuery ? window.setTimeout(timer_metaslider_shop, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_shop, 100) : shop_has_slider(window.jQuery);
                                                };
                                                timer_metaslider_shop();
                                                /* Slider for shop - end */
                                            </script>
                                        <?php } ?>
                                        <div class="shop-detail">
                                            <div class="title"><?php echo Yii::t('wp_theme', '店舗情報'); ?></div>
                                            <?php echo do_shortcode(get_field('shop_detail_3')); ?>
                                        </div>
                                    <?php endif; ?>
								<?php endif?>
								<div class="<?php echo (!in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE)) ? 'page-excerpt' : 'page-excerpt page-excerpt-shop-has-slide';?> left"><?php the_excerpt(); ?></div>
							</div><!-- gallery-item -->
						</div><!-- end slide-images -->
					</div><!-- end shop-list -->
					<?php
				else:
					if (!empty($post->post_excerpt)):
						?>
						<div class="page-excerpt no-gallery"><?php the_excerpt(); ?></div>
						<?php
					endif;
				endif; // end if($listGalery){
				?>
                <?php if(!in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE)): ?>
                    <div class="shop-detail">
                        <div class="title"><?php echo Yii::t('wp_theme', '店舗情報'); ?></div>
                        <?php echo do_shortcode(get_field('shop_detail_3')); ?>
                    </div>
                <?php endif; ?>
                <?php
                    if(in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE_TEXT)){
                ?>
                    <div class="section-access-shop">
                        <div class="title-access"><h2 class="access"><span class="icon-user"></span><?php echo Yii::t('wp_theme', 'Access<span>アクセスマップ</span>'); ?></h2></div>
                        <div class="container">
                            <div class="shop-instruction clearfix">
                                <?php if($shop_id == MasterValues::SHOP_KANAZAWA_KOURINBOU_ID): ?>
                                    <div class="instruction_full_width kanazawa_full_width">
                                        <?php
                                        $shop_distance_time = get_field('shop_distance_time');
                                        if(!empty($shop_distance_time)){
                                            the_field('shop_instruction');
                                        }
                                        ?>
                                        <a href="<?php echo WP_HOME;?>/tourist-spots/kanazawa"><img class="img-tourists-spot" src="<?php echo WP_HOME;?>/images/tourist-spots/banner-tourist-kanazawa.jpg"/></a>
                                    </div>
                                <?php else: ?>
                                <div class="instruction_full_width">
                                    <?php
                                    $shop_distance_time = get_field('shop_distance_time');
                                    if(!empty($shop_distance_time)){
                                        the_field('shop_instruction');
                                    }
                                    ?>
                                </div>
                                <?php endif; ?>
                                <div class="map shop left">
                                    <?php the_field('google_map'); ?>
                                </div>
                                <div class="instruction right">
                                    <?php
                                    if(!empty($shop_distance_time)){
                                        echo $shop_distance_time;
                                    }else{
                                        the_field('shop_instruction');
                                    }
                                    ?>
                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                        var carousel_option = {};
                                        var slider_option = {};
                                        <?php
                                        if (!$detect->isSmartPhone()){ // pc ?>
                                        slider_option = {
                                            animation: "slide",
                                            animationLoop: false,
                                            slideshow: true,
                                            itemWidth: 50,
                                            itemMargin: 5,
                                            minItems:2,
                                            maxItems: 2,
                                            pausePlay: false,
                                            controlNav: true,
                                            slideshowSpeed: 4000,
                                            animationSpeed: 400,
                                            start: function ($slider) {
                                                $('.navNext').on('click', function () {
                                                    $slider.flexAnimate($slider.getTarget("next"), true);
                                                });
                                                $('.navPrev').on('click', function () {
                                                    $slider.flexAnimate($slider.getTarget("prev"), true);
                                                });
                                                $('.cus-flex-play').on('click', function () {
                                                    if ($(this).hasClass('navPause')) {
                                                        $(this).removeClass('navPause').addClass('navPlay');
                                                        $slider.pause();
                                                    } else if($(this).hasClass('navPlay')){
                                                        $(this).removeClass('navPlay').addClass('navPause');
                                                        $slider.play();
                                                    }
                                                });
                                                $('body').removeClass('loading');
                                            },
                                            init: function () {
                                                setTimeout(function () {
                                                    $('.tool').css('display', 'flex');
                                                }, 1000);
                                            }
                                        };
                                        $('#carousel').hide();
                                        <?php } else { ?>
                                        carousel_option = {
                                            animation: "slide",
                                            controlNav: false,
                                            animationLoop: true,
                                            slideshow: false,
                                            itemWidth: 100,
                                            itemMargin: 5,
                                            pausePlay: false,
                                            minItems:1,
                                            maxItems: 6,
                                            asNavFor: '#slider'
                                        };
                                        slider_option = {
                                            animation: "fade",
                                            animationLoop: true,
                                            slideshow: false,
                                            sync: "#carousel",
                                            pausePlay: false,
                                            controlNav: false,
                                            slideshowSpeed: 4000,
                                            animationSpeed: 400,
                                            start: function ($slider) {
                                                $('.navNext').on('click', function () {
                                                    $slider.flexAnimate($slider.getTarget("next"), true);
                                                });
                                                $('.navPrev').on('click', function () {
                                                    $slider.flexAnimate($slider.getTarget("prev"), true);
                                                });
                                                $('.cus-flex-play').on('click', function () {
                                                    if ($(this).hasClass('navPause')) {
                                                        $(this).removeClass('navPause').addClass('navPlay');
                                                        $slider.pause();
                                                    } else if($(this).hasClass('navPlay')){
                                                        $(this).removeClass('navPlay').addClass('navPause');
                                                        $slider.play();
                                                    }
                                                });
                                                $('body').removeClass('loading');
                                            },
                                            init: function () {
                                                setTimeout(function () {
                                                    $('.tool').css('display', 'flex');
                                                }, 1000);
                                            }
                                        };
                                        $('#carousel').flexslider(carousel_option);
                                        <?php } ?>
                                        $('#slider').flexslider(slider_option);
                                    });
                                </script>
                                <script type="text/javascript">
                                    var metaslider_46 = function($) {
                                        $('#metaslider_46').flexslider({
                                            slideshowSpeed:6000,
                                            animationSpeed:400,
                                            animation:"slide",
                                            controlNav:true,
                                            directionNav:true,
                                            pauseOnHover:true,
                                            direction:"horizontal",
                                            reverse:false,
                                            prevText:"",
                                            nextText:"",
                                            easing:"linear",
                                            slideshow:true,
                                            useCSS:false
                                        });
                                    };
                                    var timer_metaslider_46 = function() {
                                        var slider = !window.jQuery ? window.setTimeout(timer_metaslider_46, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_46, 100) : metaslider_46(window.jQuery);
                                    };
                                    timer_metaslider_46();

                                    /* Slider for Blog - start */
                                    var itemBlogWidth = 228;
                                    var itemMarginBlogWidth = 13;
                                    if(typeof mobile === 'number' && mobile === 1) {
                                        itemBlogWidth = 0;
                                        itemMarginBlogWidth = 0
                                    }
                                    var blog_shop_slider = function($) {
                                        $('#blog_shop_slides').flexslider({
                                            slideshowSpeed:6000,
                                            animationSpeed:400,
                                            animation:"slide",
                                            itemWidth: itemBlogWidth,
                                            itemMargin: itemMarginBlogWidth,
                                            controlNav:true,
                                            directionNav:true,
                                            pauseOnHover:true,
                                            direction:"horizontal",
                                            reverse:false,
                                            prevText:"",
                                            nextText:"",
                                            easing:"linear",
                                            slideshow:true,
                                            useCSS:false
                                        });
                                    };
                                    var timer_metaslider_blog = function() {
                                        !window.jQuery ? window.setTimeout(timer_metaslider_blog, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_blog, 100) : blog_shop_slider(window.jQuery);
                                    };
                                    timer_metaslider_blog();
                                    /* Slider for Blog - end */
                                </script>
                            </div>
                        </div>
                    </div>
                <?php } ?>

				<?php if ($useOtherStyleForNewShop == true):?>
					<div class="list-image-new">
						<ul class="clearfix">
							<?php
							foreach ($listGalery as $galery) :
								$galery = $galery['ids'];

								if (!empty($galery) && count($galery) != 0) :
									$i = 0;
									foreach ($galery as $attachment_id):
                                        $ok = swe_wp_get_attachment_image_src($attachment_id);
                                        if (!empty($ok)) {
                                            $image = swe_wp_get_attachment_image_src($attachment_id, 'full', false);
                                            $thumb = swe_wp_get_attachment_image_src($attachment_id, array(133, 100));
                                        }
                                        if (!empty($ok)) {
                                            $i = $i + 1;
                                        ?>
                                        <li <?php if ($i % 5 == 0) echo "class='last'"; ?>>
                                            <a href="<?php echo $image[0]; ?>" rel="lightbox">
                                            <img src="<?php echo $thumb[0]; ?>"
                                                 alt="<?php echo $shop_title; ?>"/>
                                            </a>
                                        </li>
                                        <?php } ?>
									<?php endforeach; ?>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div><!-- end list-image -->
				<?php endif ?>
				<?php if($detect->isSmartPhone()){?>
						<div class="title-icon-shop"><?php echo Yii::t('wp_theme', '着物レンタル店舗一覧'); ?></div>
						<div class="shop-page-title shop-icon <?php echo $post->post_name; ?> clearfix">
							<div class='right list-icon-shop'>
								<?php foreach ($arr_icon as $v): $t = get_page_by_path($v); ?>
									<a class='icon-shop <?php echo $t->post_name . ($post->post_name == $t->post_name ? ' active ' : ""); ?>'
									   href='<?php echo ($post->post_name != $t->post_name ? get_permalink($t->ID)  : 'javascript:void(0)' ); ?>'
									   title='<?php echo strip_tags(get_the_title($t->ID)); ?>'><span><?php echo strip_tags(get_the_title($t->ID)); ?></span></a>
								<?php endforeach; ?>
							</div>
						</div>
				<?php }?>
				<?php echo Yii::t('wp_theme.access', 'banner_sale'); ?>
				<?php if (Yii::app()->language === 'ja' && !in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE_TEXT)): ?>
					<?php
					if ($shop_blog = get_field('shop_blog')):
						$taxonomy = $custom_taxonomies['blog'];
						$post_type = $custom_post_type['blog'];
						$term = get_term_by('slug', $shop_blog, $taxonomy);
						$data = get_category_data($term);

						// Restore original Post Data
						wp_reset_postdata();
						// WP_Query arguments
						$args = array(
							$taxonomy => $shop_blog,
							'post_type' => $post_type,
							'post_status' => 'publish',
							'posts_per_page' => 12,
							'order' => 'DESC',
							'orderby' => 'date',
						);

						// The Query
						$my_query = new WP_Query($args);

						// The Loop
						if ($my_query->have_posts()) {
							$i = 1;
                            $title = $data['shop'];
							?>
							<h2 class="blog"><?php echo yii::t('wp_theme', 'Blog<span>ブログ</span>') . '<span class="right">' . strip_tags(get_the_title()) . '</span>' ?></h2>
							<div class="blog-shop clearfix container">
								<div id="blog_shop_slides" class="flexslider">
									<ul class="slides">
									<?php
								while ($my_query->have_posts()) {
									$my_query->the_post();
									$thumbnail_id = get_post_thumbnail_id();
									$link = get_the_permalink();
									?>
									<li class="post-item <?php echo $i == 1 ? 'first' : "" ?>">
										<div class="featured-post">
											<?php if ($thumbnail_id): ?>
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                    <?php echo swe_wp_get_attachment_image($thumbnail_id, array(369, 277), false, array('alt' => strip_tags(get_the_title()))); ?>
                                                </a>
                                            <?php endif; ?>
										</div>
										<p>
											<a class="shop_name" href="<?php echo get_term_link($term->term_id, $taxonomy); ?>"><span ><?php echo $data['shop']; ?></span></a>
											<span class="blog-date"><?php echo get_the_date(); ?></span>
										</p>
										<h3>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
										</h3>
									</li>
									<?php
									$i++;
								}
								?></ul>
								</div>
                                <div>
                                <a class="buttonBlog" href="<?php echo get_term_link($term->term_id, $taxonomy); ?>"><span ><?php echo $title.yii::t('wp_theme','のブログをもっと見る').'        &#9658;' ; ?></span></a>
                                </div>
							</div>
							<?php
						} else {
							// no posts found
						}
						// Restore original Post Data
						wp_reset_postdata();
						?>
					<?php endif; //get_field('shop_blog')?>
				<?php endif; ?>
				<!-- banners -->
				<?php
					$lang = (Yii::app()->language=='ja' ? '' : '_'.Yii::app()->language);
					$ext = (Yii::app()->language=='ja' ? '.jpg' : '.png');
				?>
                <?php
				$banner_plan = php_set_base_url(get_field('banner_plan'));
				if($banner_plan) {
					echo htmlspecialchars_decode($banner_plan);
				}else{
					?>
					<div class="topics clearfix">
						<ul class="topic-1 two-columns clearfix">
							<li>
								<a href="<?php echo esc_url(home_url('kimono/hairset'));?>"><img alt="<?php echo Yii::t('wp_theme.access','banner_hairset');?>" src="<?php echo WP_HOME.'/images/topics/topic_banner_hairset'.$lang.'.png';?>"></a>
							</li>
							<li>
								<a href="<?php echo esc_url(home_url('group'));?>"><img alt="<?php echo Yii::t('wp_theme.access','banner_group');?>" src="<?php echo WP_HOME.'/images/topics/topic_banner_group'.$lang.'.png';?>"></a>
							</li>
						</ul>
						<ul class="topic-2 three-columns clearfix">
							<li>
								<?php if ("ja" == Yii::app()->language) : ?>
									<a href="<?php echo esc_url(home_url('kimono/couple'));?>"><img alt="<?php echo Yii::t('wp_theme.access','banner_couple');?>" src="<?php echo WP_HOME.'/images/topics/access-topic-banner-couple.jpg';?>"></a>
								<?php else : ?>
									<a href="<?php echo esc_url(home_url('kimono/tenimotsu'));?>"><img alt="<?php echo Yii::t('wp_theme.access','banner_bring');?>" src="<?php echo WP_HOME.'/images/topics/access-topic-banner-tenimotsu'.$lang.$ext;?>"></a>
								<?php endif; ?>
							</li>
							<li>
								<?php if ("ja" == Yii::app()->language) : ?>
									<a href="<?php echo esc_url(home_url('bring'));?>"><img alt="<?php echo Yii::t('wp_theme.access','banner_bring');?>" src="<?php echo WP_HOME.'/images/topics/access-topic-banner-motikomi.jpg';?>"></a>
								<?php else : ?>
									<a href="<?php echo esc_url(home_url('yukata'));?>"><img alt="<?php echo Yii::t('wp_theme.access','banner_yukata');?>" src="<?php echo WP_HOME.'/images/topics/access-topic-banner-yukata'.$lang.$ext;?>"></a>
								<?php endif; ?>
							</li>
							<li>
								<a href="<?php echo esc_url(home_url('kimono/photo-studio'));?>"><img alt="<?php echo Yii::t('wp_theme.access','banner_photostudio');?>" src="<?php echo WP_HOME.'/images/topics/access-topic-banner-photostudio'.$lang.$ext;?>"></a>
							</li>
						</ul>
					</div>
					<?php
				}
				    //Detect shop kanazawa and create slide
                    if (Yii::app()->language === 'ja' && in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE_TEXT)){?>
                        <!-- //Slide for Gion-Shijo -->
                        <?php if ($shop_id == MasterValues::SHOP_GIONSIJO_ID){?>
                        <h2 class="title-kanazawa-korobo"><?php echo Yii::t('wp_theme.access', '★祇園四条店のおすすめプラン') ?></h2>
                        <div class="section-kanazawa-korobo-slide">
                            <div id="kanazawa-korobo-slider" class="wrap-kanazawa-korobo flexslider">
                                <ul class="slides">
                                    <li><a title="祇園四条店おすすめ!豆千代モダン着物プラン" class="slide-kanazawa-korobo" href="/reserve#Mamechiyo-Kimono"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/mamechiyo_plan.jpg" alt="祇園四条店おすすめ!豆千代モダン着物プラン" /></a></li>
                                    <li> <a title="カップルならお得!カップル着物プラン" class="slide-kanazawa-korobo" href="/reserve#Couple-Standard-Kimono"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/couple_plan.jpg" alt="カップルならお得!カップル着物プラン" /></a></li>
                                    <li> <a title="お散歩振袖プラン" class="slide-kanazawa-korobo" href="/reserve#Furisode-Hanhaba"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/sanpoFurisode_plan.jpg" alt="お散歩振袖プラン" /></a></li>
                                    <li> <a title="スタンダード着物プラン" class="slide-kanazawa-korobo" href="/reserve#Standard-Kimono"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/standard_plan.jpg" alt="スタンダード着物プラン" /></a></li>
                                    <li> <a title="プレミアム着物プラン" class="slide-kanazawa-korobo" href="/reserve#Premium-Kimono"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/premium_plan.jpg" alt="プレミアム着物プラン" /></a></li>
                                    <li> <a title="ハイエンド着物プラン" class="slide-kanazawa-korobo" href="/reserve#High-end-Kimono"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/highend_plan.jpg" alt="ハイエンド着物プラン" /></a></li>
                                    <li> <a title="メンズ着物プラン" class="slide-kanazawa-korobo" href="/reserve#Men-Kimono"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/mens_plan.jpg" alt="メンズ着物プラン" /></a></li>
                                    <li> <a title="子供着物プラン" class="slide-kanazawa-korobo" href="/reserve#Kimono-Girl"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/kodomo_plan.jpg" alt="子供着物プラン" /></a></li>
                                    <li> <a title="1日5組限定!VIP着物プラン" class="slide-kanazawa-korobo" href="/vip/reserve"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/vip_main_960.png" alt="1日5組限定!VIP着物プラン" /></a></li>
                            </div>
                        </div>
                        <?php }?>

                       <!--//Slide for shop kanazawa -->
                       <?php if ($shop_id == MasterValues::SHOP_KANAZAWA_KOURINBOU_ID){?>
                        <h2 class="title-kanazawa-korobo"><?php echo Yii::t('wp_theme.access', '★金沢香林坊店のおすすめプラン') ?></h2>
                        <div class="section-kanazawa-korobo-slide">
                            <div id="kanazawa-korobo-slider" class="wrap-kanazawa-korobo flexslider">
                                <ul class="slides">
                                    <li><a title="金沢香林坊店おすすめ!豆千代モダン着物プラン" class="slide-kanazawa-korobo" href="/reserve#Mamechiyo-Kimono"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/mamechiyo_plan.jpg" alt="金沢香林坊店おすすめ!豆千代モダン着物プラン" /></a></li>
                                    <li> <a title="カップルならお得!カップル着物プラン" class="slide-kanazawa-korobo" href="/reserve#Couple-Standard-Kimono"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/couple_plan.jpg" alt="カップルならお得!カップル着物プラン" /></a></li>
                                    <li> <a title="スタンダード着物プラン" class="slide-kanazawa-korobo" href="/reserve#Standard-Kimono"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/standard_plan.jpg" alt="スタンダード着物プラン" /></a></li>
                                    <li> <a title="プレミアム着物プラン" class="slide-kanazawa-korobo" href="/reserve#Premium-Kimono"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/premium_plan.jpg" alt="プレミアム着物プラン" /></a></li>
                                    <li> <a title="ハイエンド着物プラン" class="slide-kanazawa-korobo" href="/reserve#High-end-Kimono"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/highend_plan.jpg" alt="ハイエンド着物プラン" /></a></li>
                                    <li> <a title="メンズ着物プラン" class="slide-kanazawa-korobo" href="/reserve#Men-Kimono"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/mens_plan.jpg" alt="メンズ着物プラン" /></a></li>
                                    <li> <a title="子供着物プラン" class="slide-kanazawa-korobo" href="/reserve#Kimono-Girl"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/kodomo_plan.jpg" alt="子供着物プラン" /></a></li>
                                </ul>
                            </div>
                        </div>
                        <?php }?>

                        <!-- //Slide for kyoto -->
                        <?php if ($shop_id == MasterValues::SHOP_KYOTO_STATION_ID){?>
                            <h2 class="title-kanazawa-korobo"><?php echo Yii::t('wp_theme.access', '京都駅前京都タワー店のおすすめプラン') ?></h2>
                            <div class="section-kanazawa-korobo-slide">
                                <div id="kanazawa-korobo-slider" class="wrap-kanazawa-korobo flexslider">
                                    <ul class="slides">
                                        <li><a title="祇園四条店おすすめ!豆千代モダン着物プラン" class="slide-kanazawa-korobo" href="/reserve#Mamechiyo-Kimono"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/mamechiyo_plan.jpg" alt="祇園四条店おすすめ!豆千代モダン着物プラン" /></a></li>
                                        <li> <a title="カップルならお得!カップル着物プラン" class="slide-kanazawa-korobo" href="/reserve#Couple-Standard-Kimono"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/couple_plan.jpg" alt="カップルならお得!カップル着物プラン" /></a></li>
                                        <li> <a title="お散歩振袖プラン" class="slide-kanazawa-korobo" href="/reserve#Furisode-Hanhaba"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/sanpoFurisode_plan.jpg" alt="お散歩振袖プラン" /></a></li>
                                        <li> <a title="スタンダード着物プラン" class="slide-kanazawa-korobo" href="/reserve#Standard-Kimono"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/standard_plan.jpg" alt="スタンダード着物プラン" /></a></li>
                                        <li> <a title="プレミアム着物プラン" class="slide-kanazawa-korobo" href="/reserve#Premium-Kimono"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/premium_plan.jpg" alt="プレミアム着物プラン" /></a></li>
                                        <li> <a title="ハイエンド着物プラン" class="slide-kanazawa-korobo" href="/reserve#High-end-Kimono"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/highend_plan.jpg" alt="ハイエンド着物プラン" /></a></li>
                                        <li> <a title="メンズ着物プラン" class="slide-kanazawa-korobo" href="/reserve#Men-Kimono"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/mens_plan.jpg" alt="メンズ着物プラン" /></a></li>
                                        <li> <a title="子供着物プラン" class="slide-kanazawa-korobo" href="/reserve#Kimono-Girl"><img src="<?php echo WP_HOME; ?>/images/kanazawa_banner/kodomo_plan.jpg" alt="子供着物プラン" /></a></li>
                                </div>
                            </div>
                        <?php }?>

                        <script type="text/javascript">
                            var itemShopWidthKanazawa = 476;
                            var itemMarginShopWidthKanazawa = 10;
                            var minItemsShopKanazawa = 2;
                            var maxItemsShopKanazawa = 2;
                            if(typeof mobile === 'number' && mobile === 1) {
                                minItemsShopKanazawa = 1;
                                maxItemsShopKanazawa  = 1;
                            }
                            var shop_has_slider_kanazawa = function($) {
                                $('#kanazawa-korobo-slider').flexslider({
                                    slideshowSpeed:6000,
                                    animationSpeed:400,
                                    animation:"slide",
                                    itemWidth: itemShopWidthKanazawa,
                                    itemMargin: itemMarginShopWidthKanazawa,
                                    controlNav:true,
                                    directionNav:true,
                                    pauseOnHover:true,
                                    direction:"horizontal",
                                    reverse:false,
                                    prevText:"",
                                    nextText:"",
                                    easing:"linear",
                                    slideshow:true,
                                    useCSS:false,
                                    minItems:minItemsShopKanazawa,
                                    maxItems:maxItemsShopKanazawa
                                });
                            };
                            var timer_metaslider_shop_kanazawa= function() {
                                !window.jQuery ? window.setTimeout(timer_metaslider_shop_kanazawa, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_shop_kanazawa, 100) : shop_has_slider_kanazawa(window.jQuery);
                            };
                            timer_metaslider_shop_kanazawa();
                        </script>
                    <?php }?>
                <?php
                //$shop_id = get_field('shop_id');
				if($shop_id){
					?>
					<div class="container section-booking-top-page">
						<section class="block-viewbooking-top-page">
							<div class="block-title-top-page-title bg-top-page-title booking">
								<h2><span class="icon-icon-booking"></span><?= Yii::t('access','<span class="en">Booking</span><span class="ja">予約状況</span>')?></h2>
							</div>
                            <div class="banner-december-discount" id="BannerDecemberDiscount">
                                <?php if(in_array($shop_id, $arr_shop_discount_december) && in_array(Yii::app()->language, $arr_language_discount_december)):?>
                                    <?php
                                        if($isSmartPhone){
                                            echo Yii::t('banner_discount_december', 'banner_discount_december_sp');
                                        }else{
                                            echo Yii::t('banner_discount_december', 'banner_discount_december');
                                        }
                                    ?>
                                <?php endif; ?>
                            </div>
							<div id="box-calendar" class="sixteen columns row">
								<?php
//								$clientScript = Yii::app()->clientScript;
//								$baseUrl = Yii::app()->baseUrl;
//								$detect = Yii::app()->mobileDetect;
//								$clientScript->registerCssFile($baseUrl.'/css/booking.css');

//								if ($detect->isSmartPhone()) {
//									$clientScript->registerCssFile($baseUrl.'/css/booking_mobile.css');
//									if(in_array(Yii::app()->language,array('en','vi','tw','th'))){
//										$clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/multi_lang_'.Yii::app()->language.'.css');
//									}
//								}
								$shopId = get_field('shop_id');
								if(in_array($shopId, $shopPetit)){
									echo  ReserveStatus(array('shop_ids'=>array($shopId),'isPetit' => true, 'isPetitYukata' => $is_yukata));
								}else{
									echo  ReserveStatus(array('shop_ids'=>array($shopId)));
								}
								?>
							</div>
						</section>
					</div>
					<?php
				}
				?>
                <?php if (Yii::app()->language === 'ja' && in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE_TEXT)): ?>
                    <?php
                    if ($shop_blog = get_field('shop_blog')):
                        $taxonomy = $custom_taxonomies['blog'];
                        $post_type = $custom_post_type['blog'];
                        $term = get_term_by('slug', $shop_blog, $taxonomy);
                        $data = get_category_data($term);

                        // Restore original Post Data
                        wp_reset_postdata();
                        // WP_Query arguments
                        $args = array(
                            $taxonomy => $shop_blog,
                            'post_type' => $post_type,
                            'post_status' => 'publish',
                            'posts_per_page' => 12,
                            'order' => 'DESC',
                            'orderby' => 'date',
                        );

                        // The Query
                        $my_query = new WP_Query($args);

                        // The Loop
                        if ($my_query->have_posts()) {
                            $i = 1;
                            $title = $data['shop'];
                            ?>
                            <h2 class="blog"><?php echo yii::t('wp_theme', 'Blog<span>ブログ</span>') . '<span class="right">' . strip_tags(get_the_title()) . '</span>' ?></h2>
                            <div class="blog-shop clearfix container">
                                <div id="blog_shop_slides" class="flexslider">
                                    <ul class="slides">
                                        <?php
                                        while ($my_query->have_posts()) {
                                            $my_query->the_post();
                                            ?>
                                            <li class="post-item <?php echo $i == 1 ? 'first' : "" ?>">
                                                <div class="featured-post">
                                                    <?php if (get_post_thumbnail_id()): ?>
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                            <?php echo swe_wp_get_attachment_image(get_post_thumbnail_id(), array(369, 277), false, array('alt' => strip_tags(get_the_title()))); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                                <p>
                                                    <a class="shop_name" href="<?php echo get_term_link($term->term_id, $taxonomy); ?>"><span ><?php echo $data['shop']; ?></span></a>
                                                    <span class="blog-date"><?php echo get_the_date(); ?></span>
                                                </p>
                                                <h3>
                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                                </h3>
                                            </li>
                                            <?php
                                            $i++;
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div>
                                    <a class="buttonBlog" href="<?php echo get_term_link($term->term_id, $taxonomy); ?>"><span ><?php echo $title.yii::t('wp_theme','のブログをもっと見る').'        &#9658;' ; ?></span></a>
                                </div>
                            </div>
                            <?php
                        } else {
                            // no posts found
                        }
                        // Restore original Post Data
                        wp_reset_postdata();
                        ?>
                    <?php endif; //get_field('shop_blog')?>
                <?php endif; ?>

			</div>
		</div>
        <?php if(!in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE_TEXT)){ ?>
        <div class="title-access"><h2 class="access"><span class="icon-user"></span><?php echo Yii::t('wp_theme', 'Access<span>アクセスマップ</span>'); ?></h2></div>
		<div class="container">
			<div class="shop-instruction clearfix">
				<?php if ($shop_id == MasterValues::SHOP_ASAKUSA_ID){?>
				<div class="asakusa_full_width">
					<?php
						$shop_distance_time = get_field('shop_distance_time');
						if(!empty($shop_distance_time)){
							the_field('shop_instruction');
						}
					?>
				</div>
				<?php } ?>
				<?php if($shop_id != MasterValues::SHOP_ASAKUSA_ID)  {?>
				<div class="instruction_full_width">
						<?php
						$shop_distance_time = get_field('shop_distance_time');
						if(!empty($shop_distance_time)){
							the_field('shop_instruction');
						}
						?>
				</div>
				<?php }?>
				<div class="map shop left">
					<?php the_field('google_map'); ?>
				</div>
				<div class="instruction right">
					<?php
						if(!empty($shop_distance_time)){
							echo $shop_distance_time;
						}else{
							the_field('shop_instruction');
						}
					?>
				</div>
				<script type="text/javascript">
					$(function () {
						var carousel_option = {};
						var slider_option = {};
						<?php
							if (!$detect->isSmartPhone()){ // pc ?>
								slider_option = {
									animation: "slide",
									animationLoop: false,
									slideshow: true,
									itemWidth: 50,
									itemMargin: 5,
									minItems:2,
									maxItems: 2,
									pausePlay: false,
									controlNav: true,
									slideshowSpeed: 4000,
									animationSpeed: 400,
									start: function ($slider) {
										$('.navNext').on('click', function () {
											$slider.flexAnimate($slider.getTarget("next"), true);
										});
										$('.navPrev').on('click', function () {
											$slider.flexAnimate($slider.getTarget("prev"), true);
										});
										$('.cus-flex-play').on('click', function () {
											if ($(this).hasClass('navPause')) {
												$(this).removeClass('navPause').addClass('navPlay');
												$slider.pause();
											} else if($(this).hasClass('navPlay')){
												$(this).removeClass('navPlay').addClass('navPause');
												$slider.play();
											}
										});
										$('body').removeClass('loading');
									},
									init: function () {
										setTimeout(function () {
											$('.tool').css('display', 'flex');
										}, 1000);
									}
								};
								$('#carousel').hide();
							<?php } else { ?>
								carousel_option = {
									animation: "slide",
									controlNav: false,
									animationLoop: true,
									slideshow: false,
									itemWidth: 100,
									itemMargin: 5,
									pausePlay: false,
									minItems:1,
									maxItems: 6,
									asNavFor: '#slider'
								};
								slider_option = {
									animation: "fade",
									animationLoop: true,
									slideshow: false,
									sync: "#carousel",
									pausePlay: false,
									controlNav: false,
									slideshowSpeed: 4000,
									animationSpeed: 400,
									start: function ($slider) {
										$('.navNext').on('click', function () {
											$slider.flexAnimate($slider.getTarget("next"), true);
										});
										$('.navPrev').on('click', function () {
											$slider.flexAnimate($slider.getTarget("prev"), true);
										});
										$('.cus-flex-play').on('click', function () {
											if ($(this).hasClass('navPause')) {
												$(this).removeClass('navPause').addClass('navPlay');
												$slider.pause();
											} else if($(this).hasClass('navPlay')){
												$(this).removeClass('navPlay').addClass('navPause');
												$slider.play();
											}
										});
										$('body').removeClass('loading');
									},
									init: function () {
										setTimeout(function () {
											$('.tool').css('display', 'flex');
										}, 1000);
									}
								};
						$('#carousel').flexslider(carousel_option);
							<?php } ?>
						$('#slider').flexslider(slider_option);
					});
				</script>
				<script type="text/javascript">
					var metaslider_46 = function($) {
						$('#metaslider_46').flexslider({
							slideshowSpeed:6000,
							animationSpeed:400,
							animation:"slide",
							controlNav:true,
							directionNav:true,
							pauseOnHover:true,
							direction:"horizontal",
							reverse:false,
							prevText:"",
							nextText:"",
							easing:"linear",
							slideshow:true,
							useCSS:false
						});
					};
					var timer_metaslider_46 = function() {
						var slider = !window.jQuery ? window.setTimeout(timer_metaslider_46, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_46, 100) : metaslider_46(window.jQuery);
					};
					timer_metaslider_46();

					/* Slider for Blog - start */
					var itemBlogWidth = 228;
					var itemMarginBlogWidth = 13;
					if(typeof mobile === 'number' && mobile === 1) {
						itemBlogWidth = 0;
						itemMarginBlogWidth = 0
					}
					var blog_shop_slider = function($) {
						$('#blog_shop_slides').flexslider({
							slideshowSpeed:6000,
							animationSpeed:400,
							animation:"slide",
							itemWidth: itemBlogWidth,
							itemMargin: itemMarginBlogWidth,
							controlNav:true,
							directionNav:true,
							pauseOnHover:true,
							direction:"horizontal",
							reverse:false,
							prevText:"",
							nextText:"",
							easing:"linear",
							slideshow:true,
							useCSS:false
						});
					};
					var timer_metaslider_blog = function() {
						!window.jQuery ? window.setTimeout(timer_metaslider_blog, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_blog, 100) : blog_shop_slider(window.jQuery);
					};
					timer_metaslider_blog();
					/* Slider for Blog - end */
				</script>
			</div>
			<?php if (get_field('link_youtube') || get_field('link_youtube2')): ?>
			<div class="youtube clearfix">
				<h3><?php echo Yii::t('wp_theme', 'お店までの道順'); ?></h3>
				<?php if (get_field('link_youtube')): ?>
				<div class="youtube-1 left">
					<?php the_field('link_youtube'); ?>
				</div>
					<?php endif; ?>
				<?php if (get_field('link_youtube2')): ?>
				<div class="youtube-2 left">
					<?php the_field('link_youtube_2'); ?>
				</div>
					<?php endif; ?>
			</div>
			<?php endif; ?>
			<?php if (get_field('google_map_see_inside')): ?>
			<div class="google_map_see_inside map images clearfix">
				<?php the_field('google_map_see_inside'); ?>
			</div>
			<?php endif; ?>
		</div>
    <?php } ?>
    <?php the_field('access_instruction');?>

    <?php if($shop_id == MasterValues::SHOP_GIONSIJO_ID){ ?>
        <?php if (get_field('link_youtube') || get_field('link_youtube2')): ?>
            <div class="youtube clearfix">
                <h3><?php echo Yii::t('wp_theme', '店舗への行き方'); ?></h3>
                <?php if (get_field('link_youtube')): ?>
                    <div class="youtube-1 left">
                        <?php the_field('link_youtube'); ?>
                    </div>
                <?php endif; ?>
                <?php if (get_field('link_youtube2')): ?>
                    <div class="youtube-2 left">
                        <?php the_field('link_youtube_2'); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if (get_field('google_map_see_inside')): ?>
            <div class="google_map_see_inside map images clearfix">
                <?php the_field('google_map_see_inside'); ?>
            </div>
        <?php endif; ?>
    <?php } ?>

    </div><!-- end content-column-page -->

</div><!-- end container -->

<?php get_footer() ;?>

<script>
    $(document).ready(function(){
        // Hide banner december discount on 2018/1/1
        var today       = new Date();
        var target_day  = new Date(2018,1,1);
        if(today >= target_day){
            $("#BannerDecemberDiscount").hide();
        }
    });
</script>
