<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
wp_register_style('customer-gallery', get_template_directory_uri() . '/css/customer-gallery.css', array('twentytwelve-style'));
wp_enqueue_style('customer-gallery');
//redirect_canonical( null, esc_url(home_url('news')) );
get_header();
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$plugin = 'wp-pagenavi/wp-pagenavi.php';
if(is_plugin_active($plugin)){
	$css_file = plugins_url( 'pagenavi-css.css', $plugin );
	wp_enqueue_style( 'wp-pagenavi', $css_file, false, '2.70' );
}

//plan type id
$planTypeKimonoSlug = array(
	1 => 'standard-kimono',
	2 => 'premium-kimono',
	3 => 'mamechiyo-kimono',
	4 => 'men-kimono',
	6 => 'couple-standard-kimono',
	8 => 'couple-mamechiyo-kimono',
	26 => 'high-end-kimono',
	35 => 'furisode-hanhaba',
	36 => 'furisode-fukuro',
	37 => 'couple-highend-kimono',
	39 => 'antique-kimono',
	40 => 'couple-antique-kimono',
	82 => 'kimono-girl',
	83 => 'kimono-boy'
);
$planTypeYukataSlug = array(
	12 => 'standard-yukata',
	13 => 'premium-yukata',
	14 => 'high-end-yukata',
	15 => 'mamechiyo-yukata',
	16 => 'summer-kimono',
	17 => 'girl-yukata',
	18 => 'men-yukata',
	19 => 'boy-yukata',
	20 => 'couple-standard-yukata',
	21 => 'couple-premium-yukata',
	22 => 'couple-high-end-yukata',
	23 => 'couple-mamechiyo-yukata',
	79 => 'brand-yukata'
);

wp_reset_postdata();
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$queried_obj = get_queried_object();
$category = $queried_obj->slug;

$keyPlanType = array_search($category, $planTypeYukataSlug);
if(empty($keyPlanType)){
	$keyPlanType = array_search($category, $planTypeKimonoSlug);
}

$classText = '';
if(in_array($keyPlanType, $planTypeKimonoSlug)){
	$classText = 'kimono-text';
	$classPaging = 'kimono-paging-gallery';
	$reserveLink = '/reserve#kimono';
}else{
	$classText = 'yukata-text';
	$classPaging = 'yukata-paging-gallery';
	$reserveLink = '/reserve#yukata';
}
?>

	<div class="container">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">','</div>');
		} ?>
		<section class="wrap-customer-gallery">
			<!-- start top-banner-gallery -->
			<div class="top-banner-gallery dx-flex-gallery">
				<div class="banner-gallery">
					<img src="<?= get_template_directory_uri();?>/images/customer-gallery/top-banner-gallery.jpg" alt="">
				</div>
				<div class="info-banner-gallery">
					<div class="title"><img src="<?= get_template_directory_uri();?>/images/customer-gallery/text-title-gallery.jpg" alt=""></div>
					<div class="descript-gallery">
						<img src="<?= get_template_directory_uri();?>/images/customer-gallery/text-des-gallery.png" alt="">
					</div>
				</div>
			</div>
			<!--end top-banner-gallery-->
			<ul class="tab-choose-gallery dx-flex-gallery">
				<li class="item-tab-gallery yukata-gallery">
					<a class="gallery-tab" data-tab-type="3" href="#">浴衣プラン</a>
					<div class="wrap-sub-item">
						<ul class="list-item">
							<?php foreach ($planTypeYukataSlug as $id => $slug) { ?>
								<li><a data-plan-type-id="<?= $id?>" href="<?=WP_HOME?>/gallery/<?= $slug?>"><?= Yii::t('wp_theme','plan_type_'.$id)?></a></li>
							<?php } ?>
						</ul>
					</div>
				</li>
				<li class="item-tab-gallery kimono-gallery">
					<a class="gallery-tab" data-tab-type="1" href="#">糊勿スラン</a>
					<div class="wrap-sub-item">
						<ul class="list-item">
							<?php foreach ($planTypeKimonoSlug as $id => $slug) { ?>
								<li><a data-plan-type-id="<?= $id?>" href="<?=WP_HOME?>/gallery/<?= $slug?>"><?= Yii::t('wp_theme','plan_type_'.$id)?></a></li>
							<?php } ?>
						</ul>
					</div>
				</li>
			</ul>
			<div class="plan-type-text <?= $classText?>">
				<div class="get-plan-type-text"><?= Yii::t('wp_theme','plan_type_'.$keyPlanType)?></div>
			</div>

			<?php
			$args=array(
				'post_status' => 'publish',
				'tax_query' => array( // filter following category slug
					array(
						'taxonomy' => 'gallery-kimono-type', // taxonomy type
						'field' => 'slug', // filter following slug
						'terms' => $category// category slug name
					)
				),
				'post_type' => 'customer-gallery',
				'pagination' => true,
				'paged' => $paged,
				'posts_per_page' => 10,
				'order' => 'DESC',
				'orderby' => 'date',
			);

			$query = new WP_Query($args);

			if ( $query->have_posts() ) { ?>


				<!-- start content -->
				<?php if(Yii::app()->language ==='ja') { ?>

					<div class="wrap-info-gallery">
						<div class="container-gallery">
							<div class="container-box-img-gallery dx-flex-gallery">
								<?php
								while( $query->have_posts() ) {
									$query->the_post();
									$shopId = get_field('shop');
									$shopName = 'shop_name_'.$shopId;
									$planTypeName = 'plan_type_'.$keyPlanType;
									$customerGalleryImage = get_field("customer_gallery_image");
									?>

									<div class="box-img-gallery">
										<div class="title-img-gallery">
											<?= get_the_title()?>
										</div>
										<div class="img-gallery">
											<?php if(!empty($customerGalleryImage)){ ?>
												<img src="<?php echo $customerGalleryImage['url']; ?>" alt="<?php echo $customerGalleryImage['alt']; ?>" />
											<?php } ?>
										</div>
										<div class="sub-tt-gallery dx-flex-gallery"><span class="line"></span><span class="text">ご利用店舗/プラン</span></div>
										<div class="list-text-tt-gallery">
											<p><?= Yii::t('wp_theme','shop_name_lb')?> : <?= Yii::t('wp_theme',$shopName)?></p>
											<p><?= Yii::t('wp_theme','plan_type_name_lb')?> : <?= Yii::t('wp_theme',$planTypeName)?></p>
										</div>
									</div>
								<?php } ?>
							</div><!--end container-box-img-gallery-->
							<div class="wrap-button-gallery">
								<a class="link-to" href="<?=WP_HOME.$reserveLink?>">予約する</a>
							</div>

							<div class="wrap-paging-gallery <?= $classPaging?>">
								<div class="paging-gallery">
									<?php wp_pagenavi(array('query' => $query)); ?>
								</div>
							</div>

						</div>
					</div>
				<?php } else { ?>
					<div class="">
						<p><?php echo Yii::t('wp_theme', '<p>This is somewhat embarrassing, isn’t it?</p><p>It seems we can’t find what you’re looking for.</p>') ?></p>
						<!--					<p>--><?php //echo Yii::t('wp_theme', 'Sorry, this entry is only available in') ; ?><!-- <a href="--><?php //echo WP_HOME.'/ja/news' ?><!--">--><?php //echo Yii::t('wp_theme','日本語'); ?><!--.</a></p>-->
						<?php //get_template_part(404); ?>
					</div>
				<?php } ?>
			<?php }else { ?>
				<?= Yii::t('wp_theme', 'Sorry, no posts were found.') ?>
			<?php } ?>

		</section>
	</div>

	<script>
		$(document).ready(function(){
			$(".nextpostslink").text('次へ');
			$(".list-item").hide();
			$(".tab-choose-gallery .item-tab-gallery a.gallery-tab").click(function(){
				var allItem = $(this).closest('li').siblings().find('.wrap-sub-item .list-item');
				var elParent = $(this).closest('li');
//				if($(this).attr('data-tab-type') == 1){ // kimono
//					$('.wrap-paging-gallery').addClass('kimono-paging-gallery').removeClass('yukata-paging-gallery');
//					$('.plan-type-text').addClass('kimono-text').removeClass('yukata-text');
//				}else{ // yukata
//					$('.wrap-paging-gallery').addClass('yukata-paging-gallery').removeClass('kimono-paging-gallery');
//					$('.plan-type-text').addClass('yukata-text').removeClass('kimono-text');
//				}
				allItem.hide();
				elParent.find('.wrap-sub-item .list-item').toggle();
				return false;
			});

//			$(".plan-type-text").hide();
//			$(".tab-choose-gallery .item-tab-gallery ul li a").click(function(){
//				var planTypeText = $(this).text();
//				$(".get-plan-type-text").text(planTypeText);
//				$(".plan-type-text").show();
//				$(this).parents('.wrap-sub-item .list-item').hide();
//
//				return false;
//			})
		});
	</script>
<?php get_footer(); ?>