<?php
/**
 * Template Name: Column Detail Page 
 * Links: /course/{last-child-page}, /restaurant/{last-child-page}
 */
wp_register_style( 'style-column', get_template_directory_uri() . '/css/column.css', array('twentytwelve-style'));
wp_enqueue_style( 'style-column' );
get_header();
?>

<script type="text/javascript">
	$(document).ready(function() {
		$(".main-content").addClass("main-content-column");
	});
</script>

<div class="container container-column-page clearfix">
	<?php
	if (function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
	}
	?>


	<div class="content-column-page content-course-page hd-page-template hd-column">

		<div class="box-title">
			<div class="wrap">
				<h1 class="title"><?php the_title(); ?></h1>
				<div class="desc-col"><?php the_excerpt(); ?></div>
				<div class="list-social-net">				
					<?php
					if (function_exists('wp_social_bookmarking_light_output_e')){
						wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false));
					}
					?>
				</div>
			</div>
		</div><!-- end box-title -->

		<div class="wrap-con clearfix">
			<div class="con-left">

				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('content', 'column'); ?>
					<?php // comments_template('', true); ?>
				<?php endwhile; // end of the loop. ?>
				<?php
				
				/*-------------------------------------------------------------*/
				/* other page in sample parent*/
				/*-------------------------------------------------------------*/
				global $post;
				if ($post->post_parent > 0) {
					$pages = getChildPages($post->post_parent,3);
					if (count($pages)) {
						?>
						<div class="other_pages h2-block h2-block-second">
							
							<h2 class="h2-title-bar">
								<?php echo Yii::t('wp_theme', '関連トピック'); ?>
							</h2>
							<ul class="clearfix">
								<?php foreach ($pages as $page): ?>
									<li>
										<a href="<?php echo get_permalink($page->ID) ?>" title="<?php echo get_the_title($page->ID) ?>">
											<?php swe_the_post_thumbnail($page, 'thumbnail', array('alt' => strip_tags(get_the_title()))); ?>
										</a>
										<p>
											<a href="<?php echo get_permalink($page->ID) ?>" title="<?php echo get_the_title($page->ID) ?>">
												<?php echo get_the_title($page->ID) ?>
											</a>
										</p>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php
					}
				}
				?>
				<?php addBannerInColumnPage();?>
			</div>

			<div class="con-right">
				<?php get_sidebar('column'); ?>
			</div>
		</div><!-- end wrap-cont -->

	</div><!-- end content-column-page -->

</div><!-- end container -->

<?php get_footer(); ?>
