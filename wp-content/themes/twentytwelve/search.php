<?php
// store the post type from the URL string
$post_type = isset($_GET['post_type']) ? $_GET['post_type'] : get_query_var('post_type');
global $language;
$language = Yii::app()->language;
if (!empty($post_type) && $post_type!='any'){
	if ($post_type == 'customer-remark') {
		get_template_part('formal_search');
	}elseif(locate_template('search-' . $post_type . '.php')) {
		get_template_part('search', $post_type);
	}
}else{ ?>
<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

    get_header('new-kimono'); ?>
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
									<div class="container clearfix">
										<section id="primary" class="site-content">
											<div id="content" role="main">

												<?php if ( have_posts() ) : ?>

													<header class="page-header">
														<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
													</header>

													<?php twentytwelve_content_nav( 'nav-above' ); ?>

													<?php /* Start the Loop */ ?>
													<?php while ( have_posts() ) : the_post(); ?>
														<?php get_template_part( 'content', get_post_format() ); ?>
													<?php endwhile; ?>

													<?php twentytwelve_content_nav( 'nav-below' ); ?>
								
												<?php else : ?>

												<article id="post-0" class="post no-results not-found">
													<header class="entry-header">
														<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
													</header>

													<div class="entry-content">
														<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
														<?php //get_search_form(); ?>
														<br>
													</div><!-- .entry-content -->
												</article><!-- #post-0 -->

												<?php endif; ?>

											</div><!-- #content -->
										</section><!-- #primary -->
									</div>
									<?php //get_sidebar(); ?>
								</div>
							</div>
						</div>
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
<?php } ?>