<?php
/**
 * Template Name: Kimono Girl Contest
 * Links: /kimono-girl-contest
 */

wp_register_style('kimono-girl-contest', get_template_directory_uri() . '/css/kimono-girl-contest.css', array('twentytwelve-style'));
wp_enqueue_style('kimono-girl-contest');

global $post;
get_header();

?>
	<div class="container clearfix">

		<?php if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
		} ?>

		<?php while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="box-content-page page-<?php echo basename(get_permalink()); ?> clearfix">

					<?php
						the_content();
					?>

					<script>
						$(document).ready(function(){
							$('ul.recruitment').each(function(){
								var $active, $content, $links = $(this).find('a');
								$active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
								$active.addClass('active');
								$content = $($active[0].hash);
								$links.not($active).each(function () {
									$(this.hash).hide();
								});
								$('#jobtitle').val($active.text());							
								$(this).on('click', 'a', function(e){
									$active.removeClass('active');
									$content.hide();
									$active = $(this);
									$content = $(this.hash);
									$active.addClass('active');
									$content.show();
									e.preventDefault();
									$('#jobtitle').val($active.text());					
								});
							});
						});
					</script><!-- end script -->
					<?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'twentytwelve'), 'after' => '</div>')); ?>
				</div><!-- end div.box-content-page -->
                                
                                <?php Yii::app()->controller->widget('application.components.widgets.EventTrackingContactForm'); ?>

				<div class="entry-meta sixteen columns">
					<?php edit_post_link(__('Edit', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?>
				</div><!-- .entry-meta -->

			</article><!-- #post -->
		<?php endwhile; // end of the loop. ?>

	</div><!-- end container -->
<?php get_footer(); ?>
