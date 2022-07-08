<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
wp_register_style('howto-faq', get_template_directory_uri() . '/css/howto-faq.css', array('twentytwelve-style'));
wp_enqueue_style('howto-faq');
get_header('new-kimono'); ?>
<?php /*
<script type="text/javascript" src="<?php echo get_bloginfo('url') ?>/js/jquery.simple-dtpicker.js"></script>
<link type="text/css" href="<?php echo get_bloginfo('url') ?>/css/jquery.simple-dtpicker.css" rel="stylesheet" />
	*/ ?>
	<div class="container-box clearfix">
		<?php
		if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
		}
		?>
		<div class="wrap-highend-v2">
			<div class="wrap-content-v2">
				<div class="container-box">
					<div class="wrap-column-content flexbox">
						<div class="left-column-content">
							<div class="wrap-boths-column flexbox">
								<div class="left-column hidden-sidebar">
									<?php get_sidebar('top-page-left') ?>
								</div>
								<div class="right-column">
									<div class="container">
										<!--<div id="primary" class="site-content">
										<div id="content" role="main">-->
										<?php while ( have_posts() ) : the_post(); ?>
											<?php get_template_part( 'content', 'page' ); ?>
											<?php comments_template( '', true ); ?>
										<?php endwhile; // end of the loop. ?>
										<!--</div>
										</div>-->

										<?php //get_sidebar(); ?>

									</div><!-- end container -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end wrap-highend-v2 -->
	</div><!-- end container -->

<?php /*
<script type="text/javascript">
$(function (){
	$('input#book-time').dtpicker({
		"locale": "ja"
	});
});
</script>
*/ ?>
<?php get_footer('new-kimono') ; ?>