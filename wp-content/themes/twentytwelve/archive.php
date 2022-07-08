<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Twelve already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $post;
if ('lesson-news' == $post->post_type) {
	get_template_part( 'lesson/archive', 'lesson-news' );
	return;
}
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
									<section id="primary" class="site-content">
										<div id="content" role="main">

											<?php if ( have_posts() ) : ?>
												<header class="archive-header">
													<h1 class="archive-title"><?php
														if ( is_day() ) :
															printf( __( 'Daily Archives: %s', 'twentytwelve' ), '<span>' . get_the_date() . '</span>' );
														elseif ( is_month() ) :
															printf( __( 'Monthly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentytwelve' ) ) . '</span>' );
														elseif ( is_year() ) :
															printf( __( 'Yearly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentytwelve' ) ) . '</span>' );
														else :
															_e( 'Archives', 'twentytwelve' );
														endif;
														?></h1>
												</header><!-- .archive-header -->

												<?php
												/* Start the Loop */
												while ( have_posts() ) : the_post();

													/* Include the post format-specific template for the content. If you want to
													 * this in a child theme then include a file called called content-___.php
													 * (where ___ is the post format) and that will be used instead.
													 */
													get_template_part( 'content', get_post_format() );

												endwhile;

												twentytwelve_content_nav( 'nav-below' );
												?>

											<?php else : ?>
												<?php get_template_part( 'content', 'none' ); ?>
											<?php endif; ?>

										</div><!-- #content -->
									</section><!-- #primary -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end wrap-highend-v2 -->
	</div><!-- end container -->


<?php get_sidebar(); ?>
<?php get_footer('new-kimono') ; ?>