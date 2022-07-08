<?php
/**
 * Template Name: Kimono VIP List
 */
global $post;
global $is_yukata;
global $language;

get_header();
wp_register_style('font-icon-shop', get_template_directory_uri() . '/css/font-icon-shop.css', array('twentytwelve-style'));
wp_enqueue_style('font-icon-shop');
wp_register_style('kimono', get_template_directory_uri() . '/css/kimono.css', array('twentytwelve-style'));
wp_enqueue_style('kimono');
wp_register_style('kimono-vip-list', get_template_directory_uri() . '/css/kimono-vip-list.css', array('twentytwelve-style'));
wp_enqueue_style('kimono-vip-list');
wp_register_style('kimono-vip-plans', get_template_directory_uri() . '/css/kimono-vip-plans.css', array('twentytwelve-style'));
wp_enqueue_style('kimono-vip-plans');
wp_register_script('qtip-js', WP_HOME . '/js/qtip2/jquery.qtip.js');
wp_enqueue_script('qtip-js');
wp_register_style('qtip-css', WP_HOME . '/css/qtip2/jquery.qtip.css', array('twentytwelve-style'));
wp_enqueue_style('qtip-css');
wp_register_style('option-hotel-vip', get_template_directory_uri() . '/css/option-hotel-vip.css', array('twentytwelve-style'));
wp_enqueue_style('option-hotel-vip');

if($is_yukata){
	wp_register_style('yukata_plan', get_template_directory_uri() . '/css/yukata_plan.css', array('twentytwelve-style'));
	wp_enqueue_style('yukata_plan');
}
if(is_page('mamechiyo')){
	wp_register_style('howto-faq', get_template_directory_uri() . '/css/howto-faq.css', array('twentytwelve-style'));
	wp_enqueue_style('howto-faq');
}
$isSmartphone = Yii::app()->mobileDetect->isSmartPhone();
?>
<?php if($isSmartphone):?>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/booking.js"></script>
<script>
	// booking js use message
	var status = <?php echo json_encode(JsResources::vacancyStatus()); ?>;
	var message = <?php echo json_encode(JsResources::jsMessage('booking_msg')); ?>;
	var KimonoMessage = <?php echo json_encode(JsResources::jsMessage('booking_msg')); ?>;
	var is_admin = '<?php echo $is_admin ? 'admin' : ''; ?>';
	BookingUI.maxPerson = <?php echo Yii::app()->params['maxPersonInABook']?>;
	BookingUI.amountPersonTextSingular = "<?php echo Yii::t('booking','alone'); ?>";
	BookingUI.amountPersonTextPlural = "<?php echo Yii::t('booking','alone(s)'); ?>";
	BookingUI.currencySymbol = '<?php echo Yii::app()->locale->getCurrencySymbol('JPY')?>';
</script>
<?php endif?>
<div class="container kimono-couple-page kimono-vip-plans kimono-vip-list clearfix">

	<?php
	if (function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
	}
	?>
	<?php if($isSmartphone):?>
		<form name="formAddPlan" id="formAddPlan">
	<?php endif?>
	<?php while (have_posts()) : the_post(); ?>
		<article class="kimono-vip-list-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="box-overview-kimono-page clearfix">
                <img class="vip-image-banner pc" src="<?php echo WP_HOME.'/images/VIPbanner_PC-min-'.$language.'.png';?>"/>
                <img class="vip-image-banner sp" src="<?php echo WP_HOME.'/images/VIPbanner_mobile-min-'.$language.'.png';?>"/>
				<div class="section-top">
					<h1>
						<?php
						if (wp_nonce_field('page_h1')) {
							the_title();
						} else {
							the_field('page_h1');
						}
						?>
					</h1>
					<?php swe_the_post_thumbnail($post,'full', array('alt'=>  strip_tags(get_the_title()))); ?>
					<?php
					if (get_field('sub-title-page') && get_field('sub-title-page') != 'null') {
						echo '<h2>' . get_field('sub-title-page') . '</h2>';
					}
					?>
					<?php if (!empty($post->post_excerpt)): ?>
						<?php the_excerpt(); ?>
					<?php endif; ?>
				</div>                  
			</div><!-- end box-overview-kimono-page -->

			<?php
			$current_page = $post->post_name;
			$parent_page = !empty($post->post_parent) ? get_page($post->post_parent)->post_name : 0;
			$language = Yii::app()->language;
			if ($post->post_name == 'kimono'): ?>
				<div class="box-banner-graphic"><img src="<?php echo WP_HOME; ?>/images/banner-graphic-kimono-<?php echo $language; ?>.png" alt="<?php echo strip_tags(get_the_title()); ?>" /></div>
			<?php elseif ($post->ID == get_page_by_path('yukata/plan')->ID): ?>
				<div class="box-banner-graphic"><img src="<?php echo WP_HOME; ?>/images/banner-graphic-yukata-plan-<?php echo $language; ?>.png" alt="<?php echo strip_tags(get_the_title()); ?>" /></div>
			<?php endif; ?>

			<div class="box-content-page <?php echo $post->post_name; ?> clearfix content-couple">
				<div class="cont-page-left clearfix">
					<?php
						the_content();
						get_template_part('temp-small/kimono-list-vip-template');
					if (get_field('is_plan_page') === true) :
						// plan pages
						Yii::app()->controller->widget('application.components.widgets.ListKimono', array('plan_type_id' => get_field('plan_type_id')));
					endif;
					?>
				</div>
				<!-- end cont-page-left -->

				<?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'twentytwelve'), 'after' => '</div>')); ?>
			</div>
			<!-- .box-content-page -->
			<div class="entry-meta sixteen columns">
				<?php edit_post_link(__('Edit', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?>
			</div>
			<!-- .entry-meta -->

		</article><!-- #post -->

	<?php endwhile; // end of the loop.  ?>
	<?php if($isSmartphone):?>
	</form>
	<?php endif?>
</div><!-- end container -->
	<div class="wrap-option-hotel" style="display: none;">
		<?php echo Yii::t('qtip-hotel-vip', 'qtip-hotel-content'); ?>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#opt-hotel').qtip({
				content: {
					text: $('.wrap-option-hotel')
				},
				position: {
					my: 'top center',  // Position my top left...
					at: 'bottom center', // at the bottom right of...
					target: $('#opt-hotel') // my target
				},
				hide: {
					fixed: true,
					delay: 300
				},
				show: {
					effect: function(offset) {
						$(this).addClass('qtip-hotel').show();
					}
				}
			});

			$(document).on('click','.qtip-hotel .wrap-option-hotel', function(){
				$('#opt-hotel').qtip('hide');
			});
		})
	</script>
<?php get_footer(); ?>