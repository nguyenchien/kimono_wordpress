<?php
/**
 * Template Name: Fireworks Event
 * Links: /fireworks-event, ...
 */
global $language;
$language = Yii::app()->language;
get_header('new-kimono');
wp_register_style('style-fireworks-event', get_template_directory_uri() . '/css/fireworks-event.css', array('twentytwelve-style'));
wp_enqueue_style('style-fireworks-event');
?>
<div class="container-box">
	<?php
	if (function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
	}
	?>
	<div class="wrap-highend-v2">
		<div class="wrap-content-v2">
			<div class="container-box">
				<div class="wrap-column-content flexbox">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
				</div>
			</div>
		</div>
	</div><!-- end wrap-highend-v2 -->
</div><!-- end container -->
<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>
